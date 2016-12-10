<?php

class TblaaartistController extends Controller
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
				'actions'=>array('create','update','artistlist','statuschange','artist'),
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
		$model=new model_tblaaartist;
		
		$id='';
		
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['model_tblaaartist']))
		{
		$sql=0;
		
		
		$artistid=$_POST['model_tblaaartist']['Artist_Id'];
		
		//echo $artistid;exit;
		$sql = Yii::app()->db->createCommand()
              ->select('*')
              ->from('tbl_aa_artist')
              ->where('Artist_Id=:artist_id',array(':artist_id'=>$artistid))
			  ->queryAll();
	
		
		if(count($sql)==0)
		{
	
			//print_r($_FILES);exit;
				$artistid=$_POST['model_tblaaartist']['Artist_Id'];	
	
				$model->attributes=$_POST['model_tblaaartist'];
					
				$bfile_name=$_FILES['model_tblaaartist']['name']['Artist_Bgimage'];	
				
				//$bfile_artist_right_image=$_FILES['model_tblaaartist']['name']['Artist_Right_Bgimage'];	
				
				//$bfile_artist_wap_image=$_FILES['model_tblaaartist']['name']['Artist_WAP_Image'];
				
				
				$model->Artist_Bgimage=$bfile_name;
				
				//$model->Artist_Right_Bgimage=$bfile_artist_right_image;
				
				//$model->Artist_WAP_Image=$bfile_artist_wap_image;
				
				
				$model->Artist_Indate=time();
				$model->Artist_LastUpdate=time();
				$model->Artist_Status='P'; 	
			
			

			if($model->save())
			{
			
			
			
			$ext =explode('.', $bfile_name);
			
			$ext = strtolower($ext[count($ext)-1]);
			
			$model->Artist_Bgimage=$artistid.".".$ext;
			
			$tmp_name=$model->Artist_Bgimage;
			
			$model->save();
			
				if(isset($bfile_name) && $bfile_name!="")
			{
			
			if(!is_dir("images/artist/".$artistid))
														{
										
														 mkdir("images/artist/".$artistid , 0777);
														}
														
				$model->Artist_Bgimage=CUploadedFile::getInstance($model,'Artist_Bgimage');
				$model->Artist_Bgimage->saveAs(Yii::app()->basePath . '/../images/artist/'.$artistid.'/' .  $artistid.".".$ext);	

				//$image = Yii::app()->image->load(Yii::app()->basePath .'/../images/artist/'.$artistid.'/' .  $artistid.".".$ext);	
				//$image->resize(80,80);
				//$image->save();

				
			}	
			/*
				if(isset($bfile_artist_right_image) && $bfile_artist_right_image!="")
				{
					if(!is_dir("images/artist/".$artistid))
														{
										
														 mkdir("images/artist/".$artistid , 0777);
														}
														
				$model->Artist_Right_Bgimage=CUploadedFile::getInstance($model,'Artist_Right_Bgimage');
				$model->Artist_Right_Bgimage->saveAs(Yii::app()->basePath . '/../images/artist/'.$artistid.'/' .  $model->Artist_Right_Bgimage);
				
				$image = Yii::app()->image->load(Yii::app()->basePath .'/../images/artist/'.$artistid.'/' .  $model->Artist_Right_Bgimage);	
				$image->resize(80,80);
				$image->save();
				
				}
				
				if(isset($bfile_artist_wap_image) && $bfile_artist_wap_image!="")
				{
					if(!is_dir("images/artist/".$artistid))
														{
										
														 mkdir("images/artist/".$artistid , 0777);
														}
														
				$model->Artist_WAP_Image=CUploadedFile::getInstance($model,'Artist_WAP_Image');
				$model->Artist_WAP_Image->saveAs(Yii::app()->basePath . '/../images/artist/'.$artistid.'/' .  $model->Artist_WAP_Image);
				
				$image = Yii::app()->image->load(Yii::app()->basePath .'/../images/artist/'.$artistid.'/' .  $model->Artist_WAP_Image);
				$image->resize(80,80);
				$image->save();
				
				}
			
			*/
			 Yii::app()->user->setFlash('success', "Atist Detail Added Successfully !");
				$this->redirect(array('artistlist'));
				}
				
				
				
			}	
			else { 
			 Yii::app()->user->setFlash('success', "Artist already exists !");
             $this->refresh();
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'id'=>$id,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		$id=0;
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
		}
		
		$model=$this->loadModel($id);
		
		$exiting_Artist_Bgimage=$model->Artist_Bgimage; 

		//$exiting_Artist_Right_Bgimage=$model->Artist_Right_Bgimage;
		
		//$exiting_Artist_WAP_Image=$model->Artist_WAP_Image;
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		
		/*
		if(isset($_POST['model_tblaaartist']))
		{
			$model->attributes=$_POST['model_tblaaartist'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Artist_Id));
		}
        */
		
		
		
		
		
		
		
		
		
		if(isset($_POST['model_tblaaartist']))
		{
		//echo "<pre>";
		//print_r($_POST);exit;
			//print_r($_FILES);exit;
				$artistid=$_POST['id'];	
	
				$model->attributes=$_POST['model_tblaaartist'];
					
				$bfile_name=$_FILES['model_tblaaartist']['name']['Artist_Bgimage'];	
				
				//$bfile_artist_right_image=$_FILES['model_tblaaartist']['name']['Artist_Right_Bgimage'];	
				
				//$bfile_artist_wap_image=$_FILES['model_tblaaartist']['name']['Artist_WAP_Image'];
				
				
				$model->Artist_Bgimage=$bfile_name;
				
				//$model->Artist_Right_Bgimage=$bfile_artist_right_image;
				
				//$model->Artist_WAP_Image=$bfile_artist_wap_image;
				
				
				//$model->Artist_Indate=time();
				$model->Artist_LastUpdate=time();
				$model->Artist_Status='P'; 	
			
			//echo $bfile_name;exit;
			//print_r($model->attributes);exit;

			if($model->save())
			{
			
							if(isset($bfile_name) && $bfile_name!='')
							{
						
						
									$ext =explode('.', $bfile_name);
									
									$ext = strtolower($ext[count($ext)-1]);
									
									$model->Artist_Bgimage=$artistid.".".$ext;
									
									$tmp_name=$model->Artist_Bgimage;
						     }
							 else
							 {
							 $model->Artist_Bgimage=$exiting_Artist_Bgimage;
							 }
							 
							// print_r($model->attributes);exit;
							 /*
									 if(isset($bfile_artist_right_image) && $bfile_artist_right_image!='')
									{
									$model->Artist_Right_Bgimage=$bfile_artist_right_image;
									}
									 else
									 {
									 $model->Artist_Right_Bgimage=$exiting_Artist_Right_Bgimage;
									 }
							 
											    if(isset($bfile_artist_wap_image) && $bfile_artist_wap_image!='')
												{
												$model->Artist_WAP_Image=$bfile_artist_wap_image;
												}
												 else
												 {
												 $model->Artist_WAP_Image=$exiting_Artist_WAP_Image;
												 }
											
									*/
												
							 
			$model->save();

			
				if(isset($bfile_name) && $bfile_name!="")
			{
			
			if(!is_dir("images/artist/".$id))
														{
										
														 mkdir("images/artist/".$id , 0777);
														}
														
				$model->Artist_Bgimage=CUploadedFile::getInstance($model,'Artist_Bgimage');
				$model->Artist_Bgimage->saveAs(Yii::app()->basePath . '/../images/artist/'.$id.'/' .  $artistid.".".$ext);		



				//$image = Yii::app()->image->load(Yii::app()->basePath .'/../images/artist/'.$id.'/' .  $artistid.".".$ext);	
				//$image->resize(80,80);
				//$image->save();


				
			}	
/*
				if(isset($bfile_artist_right_image) && $bfile_artist_right_image!="")
				{
					if(!is_dir("images/artist/".$id))
														{
										
														 mkdir("images/artist/".$id , 0777);
														}
														
				$model->Artist_Right_Bgimage=CUploadedFile::getInstance($model,'Artist_Right_Bgimage');
				$model->Artist_Right_Bgimage->saveAs(Yii::app()->basePath . '/../images/artist/'.$id.'/' .  $model->Artist_Right_Bgimage);
				
				$image = Yii::app()->image->load(Yii::app()->basePath .'/../images/artist/'.$id.'/' .  $model->Artist_Right_Bgimage);	
				$image->resize(80,80);
				$image->save();
				
				}
				
				if(isset($bfile_artist_wap_image) && $bfile_artist_wap_image!="")
				{
					if(!is_dir("images/artist/".$id))
														{
										
														 mkdir("images/artist/".$id , 0777);
														}
														
				$model->Artist_WAP_Image=CUploadedFile::getInstance($model,'Artist_WAP_Image');
				$model->Artist_WAP_Image->saveAs(Yii::app()->basePath . '/../images/artist/'.$id.'/' .  $model->Artist_WAP_Image);
				
				
				$image = Yii::app()->image->load(Yii::app()->basePath .'/../images/artist/'.$id.'/' .  $model->Artist_WAP_Image);
				$image->resize(80,80);
				$image->save();
				}
			
		*/	
				$this->redirect(array('artistlist'));
				}
		}
		
		
		
		
		
		
		
		
		
		$this->render('edit',array(
			'model'=>$model,
			'id'=>$id,
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
		$dataProvider=new CActiveDataProvider('model_tblaaartist');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new model_tblaaartist('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['model_tblaaartist']))
			$model->attributes=$_GET['model_tblaaartist'];

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
		$model=model_tblaaartist::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='model-tblaaartist-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	public function actionArtistlist()
	{
	$model=new model_tblaaartist;
	
	$artistlist=Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_aa_artist')
						->order(array('Artist_Indate desc'))
						->queryAll();
	
	//print_r($artistlist);exit;
	
	
	////////////////////////////////////////////////////////////////////edit on 1811-2011
	
		$page_size =15;
		
		$criteria = new CDbCriteria();
				
				//code for pagination here
				
	    $item_count = count($artistlist);
		  
		$pages = new CPagination($item_count);
        $pages->setPageSize($page_size);
        $pages->applyLimit($criteria);
		
		$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
		
		$sample =range($pages->offset+1, $end);		
	
	
	
	///////////////////////////////////////////////////////////////
	
	$this->render('artistlist',array(
			'model'=>$model,
			'artistlist'=>$artistlist,
			'item_count'=>$item_count,
            'page_size'=>$page_size,
            'pages'=>$pages,
			'sample'=>$sample,
			
			));
	
	
	
	}
	
	
	
	
	public function actionStatuschange()
	{
	
		if(isset($_POST['status']) && $_POST['status']=='P'){
			$status='H';
		}else{
			$status='P';
		}
		
		
		if(isset($_POST['id']) && $_POST['id']!=''){
				$id= $_POST['id'];
				
			$post=model_tblaaartist::model()->findByPk($id);
			
			$post->Artist_Status=$status;
			
			$post->save();
			
		}
		
		$this->redirect(array('artistlist'));
						 
	}
	
	
	public function actionArtist()
	{
	
	
	
	
	
			$sql=Yii::app()->db->createCommand()
						->select('USER_ID,BAND_NAME,GENRE')
						->from('tbl_user_artist a')
						->where('a.USER_TYPE=:usertype',array(':usertype'=>A))
						->order('a.LAST_UPDATED')
						->queryAll();
						
						//print_r($sql);exit;
						
	
			
			
				
				
				
				
				$this->render('artist',array(
			                 'sql'=>$sql,
			
			));
	
	}
	
	
	
	
}
