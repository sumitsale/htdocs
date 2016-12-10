<?php

class PurchaseController extends Controller
{
	public function fetchstorefrontinfo($STORE_ID = '') {
    $hostip = sprintf('%u', ip2long($_SERVER['REMOTE_ADDR']));
    $url = Yii::app()->params['STORE_WEBSITE_SECURE_URL'] . "/store_details_api.php";
    $fields = "hostip=" . $hostip;
    if ($STORE_ID) {
      $fields = "store_front_id=" . $STORE_ID;
    }
    $method = "GET";
    $package = $this->sendDataOverPost($url, $fields, $method);
    $data = unserialize($package);

    global $STORE_FRONT_NAME;
    global $STORE_COUNTRY_ID;
    global $STORE_CURRENCY;
    global $STORE_LANGUAGE_ID;
    global $STORE_WEBSITE_URL;
    global $STORE_WEBSITE_PATH;
    global $STORE_ADMIN_EMAIL;
    global $STORE_TEMPLATE_FOLDER;
    global $STORE_FRONT_ID;
    global $STORE_WEBSITE_SECURE_URL;
    global $MAX_DOWNLOAD_COUNT;
    global $GLOBAL_CART;
    global $STORE_PAYMENT_URL;
    global $STORE_DELIVERY_URL;
    global $MERCHANT_ID;
    global $MERCHANT_PASSWORD;
    global $STORE_PARENT_URL;

    $GLOBALS['STORE_FRONT_NAME'] = $data['STORE_FRONT_NAME'];
    $GLOBALS['STORE_COUNTRY_ID'] = $data['STORE_COUNTRY_ID'];
    $GLOBALS['STORE_CURRENCY'] = $data['STORE_CURRENCY'];
    $GLOBALS['STORE_LANGUAGE_ID'] = $data['STORE_LANGUAGE_ID'];
    $GLOBALS['STORE_WEBSITE_URL'] = $data['STORE_WEBSITE_URL'];
    $GLOBALS['STORE_WEBSITE_PATH'] = $data['STORE_WEBSITE_PATH'];
    $GLOBALS['STORE_ADMIN_EMAIL'] = $data['STORE_ADMIN_EMAIL'];
    $GLOBALS['STORE_TEMPLATE_FOLDER'] = $data['STORE_TEMPLATE_FOLDER'];
    $GLOBALS['STORE_FRONT_ID'] = $data['STORE_FRONT_ID'];
    $GLOBALS['STORE_WEBSITE_SECURE_URL'] = $data['STORE_WEBSITE_SECURE_URL'];
    $GLOBALS['MAX_DOWNLOAD_COUNT'] = $data['MAX_DOWNLOAD_COUNT'];
    $GLOBALS['GLOBAL_CART'] = $data['GLOBAL_CART'];
    $GLOBALS['STORE_PAYMENT_URL'] = $data['STORE_PAYMENT_URL'];
    $GLOBALS['STORE_DELIVERY_URL'] = $data['STORE_DELIVERY_URL'];
    $GLOBALS['MERCHANT_ID'] = $data['MERCHANT_ID']; //"hungama123";
    $GLOBALS['MERCHANT_PASSWORD'] = $data['MERCHANT_PASSWORD']; //"hungama123";
    $GLOBALS['STORE_PARENT_URL'] = $data['STORE_PARENT_URL'];

    $GLOBALS['EMAILER_PWD_URL'] = $data['EMAILER_PWD_URL'];
    $GLOBALS['EMAILER_CONTACT_URL'] = $data['EMAILER_CONTACT_URL'];
    $GLOBALS['EMAILER_CONTACTING_URL'] = $data['EMAILER_CONTACTING_URL'];

    //echo $GLOBALS['STORE_WEBSITE_SECURE_URL'];exit;


    $_SESSION["STORE_ID"] = $GLOBALS['STORE_FRONT_ID'];
    $url = $GLOBALS['STORE_WEBSITE_URL'];
    $url_explode = explode(".", $url);
    $url_explode_count = count($url_explode);
    $url_val = "";
    if ($url_explode_count > 2) {
      $url_val = "." . $url_explode[$url_explode_count - 2] . "." . $url_explode[$url_explode_count - 1];
    }
    $GLOBALS['STORE_WEBSITE_ID'] = $url_val;
  }

	public function sendDataOverPost($url, $fields, $method) {
		$ch = curl_init();
		if (strtoupper($method) == 'POST'){   
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		}else{
			curl_setopt($ch, CURLOPT_URL, $url . '?' . $fields);   
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT,20);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result	= curl_exec($ch);
		if($result === false){
			error_log("Curl cannot connect with remote host ".curl_error($ch)." URL :".$url);
			die("Request Timeout");
		}
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
		curl_close($ch);
		return $result;
	}

	public function actionIndex()
	{
		$this->locationtop= 39;
		$this->locationright= 40;
	
	  $content_xml='';
		if(!isset (Yii::app()->session['H_USERID'])){
			$this->redirect(array('site/index'));
			}
			
	
	
		$session=new CHttpSession;
		$session->open();
		//print_r($_SESSION);
		$STORE_ID=STORE_FRONT_ID;
		$this->fetchstorefrontinfo(Yii::app()->params['STORE_FRONT_ID']);
		$userid = Yii::app()->session['H_USERID'];
		$RecordsPerPage = 1000;
		$resultpage = 1;

		$url = $GLOBALS['STORE_WEBSITE_SECURE_URL']."/api/api_my_collection.php";
		$fields = "store=".$STORE_ID."&userid=".$userid."&display_cnt=".$RecordsPerPage."&page=".$resultpage;
		$method = "POST";
		$orders = $this->sendDataOverPost($url, $fields, $method);
		
		if($orders!='No')
		{
		$content_xml = simplexml_load_string($orders);
		}
		else
		{
		$content_xml->Content=0;
		}

		//echo "<pre>";
		//print_r($content_xml);exit;
		
		$page_size =13;
		$criteria = new CDbCriteria();
    //$criteria->condition = 'Press_News_Status = :id';
		//$criteria->params = array (':id'=>'P');
       
			
       $item_count = count($content_xml->Content);
        $pages = new CPagination($item_count);
        $pages->setPageSize($page_size);
        $pages->applyLimit($criteria);  // the trick is here
			 

		$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
		
		$sample =range($pages->offset+1, $end);

		$this->layout='column1';
		$this->render('index',array(
		'content_xml'=>$content_xml,
		'item_count'=>$item_count,
		'page_size'=>$page_size,
		'pages'=>$pages,
		'sample'=>$sample,
		));
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