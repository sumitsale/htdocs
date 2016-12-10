<?php

class UserartistController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','artistnomusic','edit','musicreview','statuschange','edit','lister','musictobereview'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new userartist;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['userartist']))
		{
			$model->attributes=$_POST['userartist'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->USER_ID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
	
		
		$id=$_POST[id];
		
		$id1=$_POST[id1];
		
		
		
		
		//$model=$this->loadModel($id);
		//$model1=$this->loadModel1($id1);
		
		
		
		
			$sql=Yii::app()->db->createCommand()
							->select('*')
							->from('tbl_user_artist_tracks')
							->where('USER_ID=:Id and MODERATION_STATUS=:status',array(':Id'=>$id,':status'=>'A'))
							->queryAll();
						
			$sql1=Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_user_artist_tracks')
						->where('USER_ID=:Id and MODERATION_STATUS=:status',array(':Id'=>$id,':status'=>'M'))
						->queryAll();

			$sql2=Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_user_artist')
						->where('USER_ID=:Id',array(':Id'=>$id))
						->queryAll();	
						
						//print_r($sql2);exit;
						
	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['userartist']))
		{
			
			$model->attributes=$_POST['userartist'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->USER_ID));
		}

		$this->render('update',array(
			'model'=>$model,
			'model1'=>$model1,
			'id'=>$id,
			'id1'=>$id1,
			'sql'=>$sql,
			'sql1'=>$sql1,
			'sql2'=>$sql2,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('userartist');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new userartist('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['userartist']))
			$model->attributes=$_GET['userartist'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=userartist::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	
	public function loadModel1($id)
	{
		$model=artisttrack::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='userartist-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionArtistnomusic()
	{
		
		
		//$sql="select * from tbl_user_artist where USER_TYPE='A' and USER_ID not in (select  USER_ID from tbl_user_artist_tracks) order by LAST_UPDATED desc";
	
		$sql="SELECT *
FROM tbl_user_artist
WHERE USER_TYPE='A'
AND USER_ID NOT IN(SELECT USER_ID FROM tbl_user_artist_tracks)
ORDER BY LAST_UPDATED desc";
							$connection = Yii::app()->db;                         
							$command = $connection->createCommand($sql);
							$result = $command->queryAll();
						
						
						//print_r($result);exit;
						
						/////////////////////////////////////////////////////////////////edit on 18-11-2011
						$page_size =30;
		
						$criteria = new CDbCriteria();
																				//code for pagination here
						$item_count = count($result);
						  
						$pages = new CPagination($item_count);
						$pages->setPageSize($page_size);
						$pages->applyLimit($criteria);
						
						$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
						
						$sample =range($pages->offset+1, $end);
						
						
						
						
						/////////////////////////////////////////////////////////////////
					
						
						
						
					$this->render('artistnomusic',array(
								'result'=>$result,
								'item_count'=>$item_count,
								'page_size'=>$page_size,
								'pages'=>$pages,
								'sample'=>$sample,
							));	
	}
	
	
	public function actionMusictobereview()
	{
	
	/*
					$sql="select a.*,b.*
							from tbl_user_artist a,tbl_user_artist_tracks b
							where a.USER_TYPE='A'
							and  a.USER_ID=b.USER_ID
							and b.MODERATION_STATUS='M'";
	
							$connection = Yii::app()->db;                         
							$command = $connection->createCommand($sql);
							$result = $command->queryAll();
							*/
							
							
						/*	$result=Yii::app()->db->createCommand()
									->select('*')
									->from('tbl_user_artist')
									->where('MODERATION_STATUS=:status',array(':status'=>M))
									->queryAll();
							*/
							
							
							
					$result=Yii::app()->db->createCommand()
						->selectdistinct('a.*,b.*')
						->from('tbl_user_artist a,tbl_user_artist_tracks b')
						->where('a.USER_ID=b.USER_ID and b.MODERATION_STATUS=:status',array(':status'=>'M'))
						->order('b.TRACK_INDATE desc')
						->queryAll();
						
						//echo "<pre>";
						//print_r($result);exit;
						
					
					
					////////////////////////////////////////////////edit on 18-11-2011
					
						$page_size =30;
		
						$criteria = new CDbCriteria();
																				//code for pagination here
						$item_count = count($result);
						  
						$pages = new CPagination($item_count);
						$pages->setPageSize($page_size);
						$pages->applyLimit($criteria);
						
						$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
						
						$sample =range($pages->offset+1, $end);
							
					////////////////////////////////////////////////////		
							
						
						//print_r($result);exit;
						
						
						$this->render('newartist',array(
								'result'=>$result,
								'item_count'=>$item_count,
								'page_size'=>$page_size,
								'pages'=>$pages,
								'sample'=>$sample,
								
							));	
	}
	
	public function actionMusicreview()
	{
	
				
							$result=Yii::app()->db->createCommand()
							       ->select('*')
								   ->from('tbl_user_artist a,tbl_user_artist_tracks b')
								   ->where('a.USER_ID =b.USER_ID and b.MODERATION_STATUS=:status',array(':status'=>'A'))
								   ->order('b.TRACK_INDATE desc')
								   ->queryAll();
						
						
						//echo "<pre>";
						//print_r($result);exit;
						
						
						///////////////////////////////edit on 18-11-2011
						
						$page_size =30;
		
						$criteria = new CDbCriteria();
																				//code for pagination here
						$item_count = count($result);
						  
						$pages = new CPagination($item_count);
						$pages->setPageSize($page_size);
						$pages->applyLimit($criteria);
						
						$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
						
						$sample =range($pages->offset+1, $end);
					
						
						///////////////////////////////////////////////////////
						
						
					$this->render('artistreview',array(
												'result'=>$result,
												'item_count'=>$item_count,
												'page_size'=>$page_size,
												'pages'=>$pages,
												'sample'=>$sample,
											));	
	}
	
	
	
	
	
	/*

public function actionStatuschange()
	{
	
		
		//echo $_GET['id'];exit;
		
		if(isset($_GET['id']) && $_GET['id']!=''){
				$id= $_GET['id'];
				
				
			$post=artisttrack::model()->findByPk($id);
			
			
			$post->MODERATION_STATUS=A;
			
		
			$post->save();
			
		}
		
		$this->redirect(array('edit'));
						 
	}
	
	*/
	
	public function actionEdit()
	{
	
	$model1=new artisttrack;
	
	$id=0;
	$id1=0;
	$id3=0;
	$id4=0;
		
		//print_r($_POST);exit;
		
		if(isset($_POST['id']) && $_POST['id']!='')
		{
			$id=$_POST['id'];
		}
		
		else if(isset($_GET['id']) && $_GET['id']!='')
		{
			$id=$_GET['id'];
		}
		
						if(isset($_POST['id']) && $_POST['id']!='')
					{
							$id1=$_POST['id1'];
					}
					
					else if(isset($_GET['id']) && $_GET['id']!='')
					{
							$id1=$_GET['id1'];
					}
					
		if(isset($_POST['id3']))
		{
		$id3= $_POST['id3'];
		//echo $id3;exit;
		}
		if(isset($_POST['id4']))
		{
		$id4=$_POST['id4'];
		}
		
		if(isset($_POST['email']))
		{
		$email=$_POST['email'];
		}
		
		if(isset($_POST['fname']))
		{
		$fname=$_POST['fname'];
		}
		
		// echo "<pre>";
		// print_r($_POST);exit;
		
		
		
		
		
			$sql=Yii::app()->db->createCommand()
							->select('*')
							->from('tbl_user_artist_tracks')
							->where('USER_ID=:Id and MODERATION_STATUS=:status',array(':Id'=>$id,':status'=>'A'))
							->order('TRACK_INDATE desc')
							->queryAll();
							
			$sql1=Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_user_artist_tracks')
						->where('USER_ID=:Id and MODERATION_STATUS=:status',array(':Id'=>$id,':status'=>'M'))
						->order('TRACK_INDATE desc')
						->queryAll();

			$sql2=Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_user_artist')
						->where('USER_ID=:Id',array(':Id'=>$id))
						->queryAll();	
						
						//echo "<pre>";
						//print_r($sql2);exit;
						

			if(isset($_POST['id3']) && $_POST['id3']!='')
				{
				
					//$email = "lavketrai@gmail.com";
					//$fname = "lavket Rai";
					
					$CCemail = "soumini.paul@hungama.com";
					$BCCemail1 = "deepika.bagaria@hungama.com";
					$BCCemail2 = "mohit.vadia@hungama.com";
				
					$this->fetchstorefrontinfo(Yii::app()->params['STORE_FRONT_ID']);
				
					$post=artisttrack::model()->findByPk($id3);
					
					$post->MODERATION_STATUS="A";	
					$post->MODERATED_FILE_INDATE=time();
					if($post->save())
					{
						$filename = Yii::app()->basePath . "/../emailers/" . Yii::app()->params['STORE_FRONT_ID'] . "/TEXT/for_music_approve.txt";
						$handle = fopen($filename, "rb");
						$textbody = fread($handle, filesize($filename));
						fclose($handle);

						$filename = Yii::app()->basePath . "/../emailers/" . Yii::app()->params['STORE_FRONT_ID'] . "/HTML/for_music_approve.html";
						$handle = fopen($filename, "rb");
						$htmlbody = fread($handle, filesize($filename));
						fclose($handle);
						$subject = "Congratulations! Your music has been successfully approved on ArtistAloud.com";
						
						$textbody = str_replace("<firstname>", $fname, $textbody);
						$textbody = str_replace("<sitename>", substr($GLOBALS['STORE_WEBSITE_ID'], 1), $textbody);
						$textbody = str_replace("<login>", $email, $textbody);
						//$textbody = str_replace("<password>", $user_password, $textbody);
						$textbody = str_replace("<changepasswordurl>", $GLOBALS['EMAILER_PWD_URL'], $textbody);
						$textbody = str_replace("<sitenameurl>", $GLOBALS['STORE_WEBSITE_URL'], $textbody);
						$textbody = str_replace("<storeid>", Yii::app()->params['STORE_FRONT_ID'], $textbody);
						$textbody = str_replace("<contactusurl>", $GLOBALS['STORE_WEBSITE_URL'] . "/writetous.php", $textbody);

						$htmlbody = str_replace("<firstname>", $fname, $htmlbody);
						$htmlbody = str_replace("<sitename>", substr($GLOBALS['STORE_WEBSITE_ID'], 1), $htmlbody);
						$htmlbody = str_replace("<login>", $email, $htmlbody);
						//$htmlbody = str_replace("<password>", $user_password, $htmlbody);
						$htmlbody = str_replace("<changepasswordurl>", $GLOBALS['EMAILER_PWD_URL'], $htmlbody);
						$htmlbody = str_replace("<sitenameurl>", $GLOBALS['STORE_WEBSITE_URL'], $htmlbody);
						$htmlbody = str_replace("<storeid>", Yii::app()->params['STORE_FRONT_ID'], $htmlbody);
						$htmlbody = str_replace("<contactusurl>", $GLOBALS['STORE_WEBSITE_URL'] . "/writetous.php", $htmlbody);

						Yii::import('application.extensions.phpmailer.JPhpMailer');
						$mail = new JPhpMailer;
						$mail->IsSMTP();
						$mail->Host = "smtpout.hungama.com";
						$mail->SMTPAuth = true;
						$mail->Port = 587;
						$mail->Username = "csout@hungama.com";  // GMAIL username
						$mail->Password = "J4cMqt5d";  // GMAIL password
						//$mail->From       = "noreply@hungama.com";
						$mail->SetFrom("noreply@hungama.com", 'No Reply @ ArtistAloud Admin');
						$mail->Subject = $subject;
						$mail->AltBody = $textbody;
						$mail->MsgHTML($htmlbody);
						$mail->AddAddress($email, $fname);
						$mail->AddCC($CCemail);
						$mail->AddCC($BCCemail1);
						$mail->AddCC($BCCemail2);
						
						$mail->Send();
					
					
						$this->redirect(array('edit','id'=>$id,'id1'=>$id1));
					}
				}	
			
				if(isset($_POST['id4']) && $_POST['id4']!='')
				{
					 $CCemail = "soumini.paul@hungama.com";
					 $BCCemail1 = "deepika.bagaria@hungama.com";
					 $BCCemail2 = "mohit.vadia@hungama.com";
				
					$this->fetchstorefrontinfo(Yii::app()->params['STORE_FRONT_ID']);
				
					$post1=artisttrack::model()->findByPk($id4);
					$post1->MODERATION_STATUS="D";	
					$post1->MODERATED_FILE_INDATE=time();
					if($post1->save())
					{
						  $filename = Yii::app()->basePath . "/../emailers/" . Yii::app()->params['STORE_FRONT_ID'] . "/TEXT/for_music_disapprove.txt";
							$handle = fopen($filename, "rb");
							$textbody = fread($handle, filesize($filename));
							fclose($handle);

							$filename = Yii::app()->basePath . "/../emailers/" . Yii::app()->params['STORE_FRONT_ID'] . "/HTML/for_music_disapprove.html";
							$handle = fopen($filename, "rb");
							$htmlbody = fread($handle, filesize($filename));
							fclose($handle);
							$subject = "Sorry! Your music has not been approved for ArtistAloud.com";
						
							$textbody = str_replace("<firstname>", $fname, $textbody);
							$textbody = str_replace("<sitename>", substr($GLOBALS['STORE_WEBSITE_ID'], 1), $textbody);
							$textbody = str_replace("<login>", $email, $textbody);
							//$textbody = str_replace("<password>", $user_password, $textbody);
							$textbody = str_replace("<changepasswordurl>", $GLOBALS['EMAILER_PWD_URL'], $textbody);
							$textbody = str_replace("<sitenameurl>", $GLOBALS['STORE_WEBSITE_URL'], $textbody);
							$textbody = str_replace("<storeid>", Yii::app()->params['STORE_FRONT_ID'], $textbody);
							$textbody = str_replace("<contactusurl>", $GLOBALS['STORE_WEBSITE_URL'] . "/writetous.php", $textbody);

							$htmlbody = str_replace("<firstname>", $fname, $htmlbody);
							$htmlbody = str_replace("<sitename>", substr($GLOBALS['STORE_WEBSITE_ID'], 1), $htmlbody);
							$htmlbody = str_replace("<login>", $email, $htmlbody);
						//	$htmlbody = str_replace("<password>", $user_password, $htmlbody);
							$htmlbody = str_replace("<changepasswordurl>", $GLOBALS['EMAILER_PWD_URL'], $htmlbody);
							$htmlbody = str_replace("<sitenameurl>", $GLOBALS['STORE_WEBSITE_URL'], $htmlbody);
							$htmlbody = str_replace("<storeid>", Yii::app()->params['STORE_FRONT_ID'], $htmlbody);
							$htmlbody = str_replace("<contactusurl>", $GLOBALS['STORE_WEBSITE_URL'] . "/writetous.php", $htmlbody);

							Yii::import('application.extensions.phpmailer.JPhpMailer');
							$mail = new JPhpMailer;
							$mail->IsSMTP();
							$mail->Host = "smtpout.hungama.com";
							$mail->SMTPAuth = true;
							$mail->Port = 587;
							$mail->Username = "csout@hungama.com";  // GMAIL username
							$mail->Password = "J4cMqt5d";  // GMAIL password
							//$mail->From       = "noreply@hungama.com";
							$mail->SetFrom("noreply@hungama.com", 'No Reply @ ArtistAloud Admin');
							$mail->Subject = $subject;
							$mail->AltBody = $textbody;
							$mail->MsgHTML($htmlbody);
							$mail->AddAddress($email, $fname);
							$mail->AddCC($CCemail);
							$mail->AddCC($BCCemail1);
							$mail->AddCC($BCCemail2);
						
							$mail->Send();
					
					
						$this->redirect(array('edit','id'=>$id,'id1'=>$id1));
					}		
				}
							
					$this->render('edit',array(
						'model1'=>$model1,
						'id'=>$id,
						'id1'=>$id1,
						'sql'=>$sql,
						'sql1'=>$sql1,
						'sql2'=>$sql2,
					));
				
	
	}
	
	
	
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
    if (strtoupper($method) == 'POST') {
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    } else {
      curl_setopt($ch, CURLOPT_URL, $url . '?' . $fields);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    if ($result === false) {
      error_log("Curl cannot connect with remote host " . curl_error($ch) . " URL :" . $url);
      die("Request Timeout");
    }
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $result;
  }
  
  public function actionLister()
  {
//	echo "hi";
	
	// SELECT *
// FROM a_users a
// JOIN tbl_user_artist b ON a.A_USER_ID=b.USER_ID
// WHERE
// b.USER_TYPE="L"
	



	$result=Yii::app()->db->createCommand()
							       ->select('*')
								   ->from('a_users a,tbl_user_artist b')
								   ->where('a.A_USER_ID=b.USER_ID and b.USER_TYPE=:type',array(':type'=>'L'))
								   ->order('b.LAST_UPDATED desc')
								   ->queryAll();


	
						
						// echo "<pre>";
						// print_r($result);exit;
						
						
						///////////////////////////////edit on 18-11-2011
						
						$page_size =30;
		
						$criteria = new CDbCriteria();
																				//code for pagination here
						$item_count = count($result);
						  
						$pages = new CPagination($item_count);
						$pages->setPageSize($page_size);
						$pages->applyLimit($criteria);
						
						$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
						
						$sample =range($pages->offset+1, $end);
					
						
						///////////////////////////////////////////////////////
						
						
					$this->render('lister',array(
												'result'=>$result,
												'item_count'=>$item_count,
												'page_size'=>$page_size,
												'pages'=>$pages,
												'sample'=>$sample,
											));	
		

  }
	
	
}
