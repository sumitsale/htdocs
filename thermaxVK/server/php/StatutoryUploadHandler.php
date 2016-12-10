<?php
$options = array(
    'delete_type' => 'POST',
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pass' => '',
    'db_name' => 'thermax_vendor_konnect',
    'db_table' => 'vendor_statutory_data',
    'file_table' => 'file_data'
);

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

class StatutoryUploadHandler extends UploadHandler {

    protected function initialize() {
        $this->db = new mysqli(
            $this->options['db_host'],
            $this->options['db_user'],
            $this->options['db_pass'],
            $this->options['db_name']
        );
        parent::initialize();
        $this->db->close();
    }

    protected function handle_form_data($file, $index) {
        $valid_till_date=date('Y-m-d', strtotime(str_replace("/", "-", $_REQUEST['valid_till_date'][$index])));
        $file->valid_till_date =$valid_till_date;
        $file->vendor_id = @$_REQUEST['vendor_id'][$index];
        $file->statutory_data_id = @$_REQUEST['statutory_data_id'][$index];
        $file->document_status="1";
    }

    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error,
            $index = null, $content_range = null) {
        $file = parent::handle_file_upload(
            $uploaded_file, $name, $size, $type, $error, $index, $content_range
        );
        if (empty($file->error)) {
            $sql = 'INSERT INTO `'.$this->options['db_table']
                .'` (`name`, `size`, `type`, `valid_till_date`, `vendor_id`, `statutory_data_id`, `document_status`)'
                .' VALUES (?, ?, ?, ?,?,?,?)';
            $query = $this->db->prepare($sql);
            $query->bind_param(
                'sissiis',
                $file->name,
                $file->size,
                $file->type,
                $file->valid_till_date,
                $file->vendor_id,
                $file->statutory_data_id,
                $file->document_status
            );
            $query->execute();
            $file->id = $this->db->insert_id;
        }
        return $file;
    }

    protected function set_additional_file_properties($file) {
        parent::set_additional_file_properties($file);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $sql = 'SELECT `vendor_statutory_data_id`, `type`, `valid_till_date`,`vendor_id`,`statutory_data_id` FROM `'
                .$this->options['db_table'].'` WHERE `name`=?';
            $query = $this->db->prepare($sql);
            $query->bind_param('s', $file->name);
            $query->execute();
            $query->bind_result(
                $vendor_statutory_data_id,
                $type,
                $valid_till_date,
                $vendor_id,
                $statutory_data_id
            );
            while ($query->fetch()) {
                $file->vendor_statutory_data_id = $vendor_statutory_data_id;
                $file->type = $type;
                $file->valid_till_date = $valid_till_date;
                $file->vendor_id = $vendor_id;
                $file->statutory_data_id = $statutory_data_id;
            }
        }
    }

    public function delete($print_response = true) {
        $response = parent::delete(false);
        foreach ($response as $name => $deleted) {
            if ($deleted) {
                $sql = 'DELETE FROM `'
                    .$this->options['db_table'].'` WHERE `name`=?';
                $query = $this->db->prepare($sql);
                $query->bind_param('s', $name);
                $query->execute();
            }
        }
        return $this->generate_response($response, $print_response);
    }
   public function get($print_response = true) {
		$response = array();
		$vendor_id=isset($_REQUEST['vendor_id'])?$_REQUEST['vendor_id']:1;
	   	$statutory_data_id=isset($_REQUEST['statutory_data_id'])?$_REQUEST['statutory_data_id']:1;
	   	$document_status=1;
     	$sql = 'SELECT `vendor_statutory_data_id`, `statutory_data_id`, `vendor_id`, `valid_till_date`,`name`, `size`, `type` FROM `'
                .$this->options['db_table'].'` WHERE `vendor_id`=? and  `statutory_data_id`=? and name!="" and `document_status`=?';
                /*echo $vendor_id.$statutory_data_id.$document_status
                echo $sql;die;*/
            $query = $this->db->prepare($sql);

            $query->bind_param('iii', $vendor_id,$statutory_data_id,$document_status);
            
            $query->execute();
            $query->bind_result(
                $vendor_statutory_data_id,
                $statutory_data_id,
                $vendor_id,
                $valid_till_date,
                $name,
                $size,
                $type
            );
           
            while ($query->fetch()) {
            	$file = new stdClass();
                $file->vendor_statutory_data_id = $vendor_statutory_data_id;
                $file->statutory_data_id = $statutory_data_id;
				$file->vendor_id = $vendor_id;
                $file->valid_till_date = ($valid_till_date!="0000-00-00" && $valid_till_date!="1970-01-01")?date('d-m-Y', strtotime($valid_till_date)):"Not Set";
                $file->name = $name;
                $file->size = $size;
                $file->type = $type;
                $file->deleteType =  "DELETE";
                $file->deleteUrl ="";
                $file->url = parent::get_download_url($name);
                parent::set_additional_file_properties($file);
                array_push($response,$file);
             }
             header('Content-type: application/json');
   			 echo json_encode(array('files'=>$response));
    }

}

$upload_handler = new StatutoryUploadHandler($options);
/*echo date('Y-m-d', strtotime(str_replace("\/", "-", "24\/04\/2016")));die;
//echo strtotime(str_replace("\'", "", "24\/04\/2016"));die;
echo date('Y-m-d', strtotime("24/04/2016"));die;
*/ 
//$upload_handler->get();