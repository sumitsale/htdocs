<?php

class ContentController extends Controller {

  public function actionIndex() {

    $this->render('index');
  }
  
  
  public function actionPlaysong($id)
  {
		echo $id;eexit;
		
		$url="http://login.hungamatech.com/direct_download_service.php?content_id=".$id."&content_type_id=1&licence_id=brsI+hEqeSG8ZtJu1Dat4NGb/YJMHO0V8djg77N0+og=&app_id=23&notify=W";
		$result=$this->get_data($url);

		echo $result;
  }

  
  public function get_data($url) 
	{
	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$result = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		return $result;
	}
	
	
  public function actionVideo($id) {

    $video = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_FILES')
            ->where('FILE_ID=:file_id', array(':file_id' => $id))
            ->queryAll();

    //echo "<pre>";
    //print_r($video);exit;

    $s3 = new S3("1F38NQDC612C2JVTRJR2", "phWX0s/vU+RF+ICk/YpmyxYYKRl4AazEvzq03bwK");

    //$uploadName=$video[0]['FILE_PATH'];

    $uploadName = "http://content.hungama.com/events%20and%20broadcasts%20album/video%20content/flv%20640x480%20160/60189264.flv";

    $bucketName = "content.hungama.com";

    //echo $bucketname;exit;

    $response = $s3->getObject($bucketName, $uploadName);

    //$file=$response->body;
    //echo "<pre>";
    print_r($response);
    exit;
  }

  public function actionSong($url) {
    //echo $url;
    
    //die ();

    $song = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_FILES')
            ->where('FILE_ID=:file_id', array(':file_id' => $id))
            ->queryAll();

    //echo "<pre>";
    //print_r($song);exit;

    $awsAccessKey = "AKIAJ654RC66MRTLYDVA";
    $awsSecretKey = "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";
    $s3 = new S3($awsAccessKey, $awsSecretKey);

    //$bucketname = $s3->getBucket($bucketName);
    //print_r($s3->listBuckets(true));
    //print_r($s3->getBucket('repos.hungama.com', 'audio/audio content/30 mp3/', NULL, 15));
    //exit;
    $bucketName = "repos.hungama.org";

    $uploadName = $song[0]['FILE_PATH'];
    $uploadName = "audio/audio content/30 mp3/50153339.mp3";
    $uploadName = "audio/audio content/full%20mp3/3357033.mp3";

    $response = $s3->getObject($bucketName, $uploadName);
   $file = $response->body;
    
    //print_r($response);
    //exit;
    header('Content-Type: ' . $response->headers['type']);
    echo $file;

  }
  
  public function actionMove()
  {
		  // FTP access parameters
		$host = '192.168.10.62';
		$usr = 'awapxml';
		$pwd = 'Aw@PxmL@132';
		 
		// file to move:
		
		
		$dir_path =Yii::app()->basePath . '/../xml';
		$files = $this->get_files($dir_path, '.xml', 'r');
	 
		 // echo "<pre>";
		// print_r($files);
		// exit;
		
		for($i=0;$i<count($files);$i++)
		{
			
			//echo $files[$i]."<br>";
			
			$temppath= substr($files[$i],strpos($files[$i],'/xml/'));
			
			//echo $temppath;exit;
		
			$local_file = $files[$i];
			$ftp_path =  '/usr/local/apache/htdocs/awap/'.$temppath;
		
			$upload = ftp_put($conn_id, $ftp_path, $local_file, FTP_ASCII);
		}
		
		
		 
		// connect to FTP server (port 21)
		$conn_id = ftp_connect($host, 21) or die ("Cannot connect to host");
		 
		// send access parameters
		ftp_login($conn_id, $usr, $pwd) or die("Cannot login");
		 
		// turn on passive mode transfers (some servers need this)
		// ftp_pasv ($conn_id, true);
		 
		// perform file upload
		
	
	
		
		for($i=0;$i<count($files);$i++)
		{
			
			echo $files[$i];exit;
		
			$local_file = Yii::app()->basePath . '/../xml/content/artists/artist-995.xml';
			$ftp_path =  '/usr/local/apache/htdocs/awap/xml/frontend/artist-995.xml';
		
			$upload = ftp_put($conn_id, $ftp_path, $local_file, FTP_ASCII);
		}
		// check upload status:
		// print (!$upload) ? 'Cannot upload' : 'Upload complete';
		// print "\n";
		 
		 
		 
		/*
		** Chmod the file (just as example)
		*/
		 
		// If you are using PHP4 then you need to use this code:
		// (because the "ftp_chmod" command is just available in PHP5+)


		if (!function_exists('ftp_chmod')) {
		   function ftp_chmod($ftp_stream, $mode, $filename){
				return ftp_site($ftp_stream, sprintf('CHMOD %o %s', $mode, $filename));
		   }
		}
		 
		// try to chmod the new file to 666 (writeable)
		if (ftp_chmod($conn_id, 0666, $ftp_path) !== false) {
			print $ftp_path . " chmoded successfully to 666\n";
		} else {
			print "could not chmod $file\n";
		}
		 
		// close the FTP stream
		ftp_close($conn_id);



  }
  
  
  
  
  
  public function directoryToArray($directory, $recursive) {
			$array_items = array();
			if ($handle = opendir($directory)) {
			while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
			if (is_dir($directory. "/" . $file)) {
			if($recursive) {
			$array_items = array_merge($array_items, $this->directoryToArray($directory. "/" . $file, $recursive));
			}
			$file = $directory . "/" . $file;
			$array_items[] = preg_replace("/\/\//si", "/", $file);
			} else {
			$file = $directory . "/" . $file;
			$array_items[] = preg_replace("/\/\//si", "/", $file);
			}
			}
			}
			closedir($handle);
			}
			return $array_items;
}





public  function get_files($dir_path = '.', $searchPattern = '', $searchOption = '') {
 
        $files = array();
	
 
        if (is_dir($dir_path)) {
            $scan_files = scandir($dir_path);
 
            $l_searchPattern = (!empty($searchPattern) && substr($searchPattern,0,1) == '*') ? '.' . substr($searchPattern,0,1) . preg_quote(substr($searchPattern,1)) : $searchPattern;
            foreach($scan_files as $file) {
                if ($file == "." || $file == ".." ) continue;
 
                $complete_filepath = $dir_path .'/'. $file;
 
                if (is_dir($complete_filepath) && ($searchOption == 'recursive' || $searchOption == 'r')) {
                    $files = array_merge($files, $this->get_files($complete_filepath, $searchPattern, $searchOption));
                    continue;
                }
 
                if (!is_dir($complete_filepath) && empty($l_searchPattern) || preg_match("/$l_searchPattern$/i", $file)) {
                    array_push($files, $complete_filepath);
                }
            }
        }
 
        return $files;
    }
  // Uncomment the following methods and override them if needed
  /*
    public function filters()
    {
    // return the filter configuration for this controller, e.g.:
    return array(
    'inlineFilterName',
    array(
    'class'=>'path.to.FilterClass',
    'propertyName'=>'propertyValue',
    ),
    );
    }

    public function actions()
    {
    // return external action classes, e.g.:
    return array(
    'action1'=>'path.to.ActionClass',
    'action2'=>array(
    'class'=>'path.to.AnotherActionClass',
    'propertyName'=>'propertyValue',
    ),
    );
    }
   */
}