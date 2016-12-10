<?php

class VideosController extends Controller
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
				'actions'=>array('create','update','videolist','statuschange'),
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
		$model=new TblHomeVideo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblHomeVideo']))
		{
		
			//print_r($_POST);exit;
				$model->attributes=$_POST['TblHomeVideo'];
				$model->VIDEO_INDATE = time();
				$bfile_name=$_FILES['TblHomeVideo']['name']['VIDEO_IMAGE'];	
				$model->VIDEO_IMAGE=$bfile_name;
				
			if($model->save())
			{
			
			$ext =explode('.', $bfile_name);
			
			$ext = strtolower($ext[count($ext)-1]);
			
			$highest_id = $model->primaryKey;
			
			$model->VIDEO_IMAGE=$highest_id.".".$ext;
			
				if(isset($bfile_name) && $bfile_name!="")
				{
			
					if(!is_dir("images/videos/"))
															{
											
															 mkdir("images/videos/", 0777);
															}
															
					$model->VIDEO_IMAGE=CUploadedFile::getInstance($model,'VIDEO_IMAGE');
					$model->VIDEO_IMAGE->saveAs(Yii::app()->basePath . '/../images/videos/'.  $highest_id.".".$ext);			
						
					$image = Yii::app()->image->load(Yii::app()->basePath . '/../images/videos/'.  $highest_id.".".$ext);			
					$image->resize(80, 80);
					$image->save();
				
				}
			Yii::app()->user->setFlash('success',"Video Added Successfully");
				$this->redirect(array('videolist'));
				}
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
		$id=$_POST['id'];
		
		$model=$this->loadModel($id);
		$existing_name = $model->VIDEO_IMAGE;

		
		$row=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_home_video')
								->where('VIDEO_ID=:id',array(':id'=>$id))
								->queryRow();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblHomeVideo']))
		{
	
				$model->attributes=$_POST['TblHomeVideo'];
				$model->VIDEO_INDATE = time(); 
					
			$bfile_name=$_FILES['TblHomeVideo']['name']['VIDEO_IMAGE'];	
				
				if(isset($bfile_name) && $bfile_name!='')
				{
					$ext =explode('.', $bfile_name);
					$ext = strtolower($ext[count($ext)-1]);
					$model->VIDEO_IMAGE=$id.".".$ext;
				}
				
				else
				{
				$model->VIDEO_IMAGE=$existing_name;
				}

			if($model->save())
			{
			
				if(isset($bfile_name) && $bfile_name!="")
				{
			
					if(!is_dir("images/videos/"))
							{
										
							mkdir("images/videos/", 0777);
							}							
														
					$model->VIDEO_IMAGE=CUploadedFile::getInstance($model,'VIDEO_IMAGE');
					$model->VIDEO_IMAGE->saveAs(Yii::app()->basePath . '/../images/videos/'.  $id.".".$ext);		

					$image = Yii::app()->image->load(Yii::app()->basePath . 	'/../images/videos/'.  $id.".".$ext);			
					$image->resize(80, 80);
					$image->save();
				}		
				$this->redirect(array('videolist'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'row'=>$row,
			'id'=>$id,
		));
	}

	
	public function actionVideoList()
	{
	
		$id=$_POST['id'];
						
						 $command=Yii::app()->db->createCommand()
						->update('tbl_home_video',
		   		        array('VIDEO_STATUS'=>DL),
		   		        'VIDEO_ID=:id',array(':id'=>$id));
	
	
		$model=new TblHomeVideo;
		
		 $result=Yii::app()->db->createCommand()
	       ->select('*')
		   ->from('tbl_home_video')
		   ->where('VIDEO_STATUS!=:id',array(':id'=>DL))
		   ->order('VIDEO_ID desc')
		   ->queryAll();
	
		
		$this->render('videolist',array(
			'model'=>$model,
			'result'=>$result,
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
			$post=TblHomeVideo::model()->findByPk($id);
			$post->VIDEO_STATUS=$status;
			$post->save();
		}
		
		$this->redirect(array('videolist'));
						 
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
		$dataProvider=new CActiveDataProvider('TblHomeVideo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblHomeVideo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblHomeVideo']))
			$model->attributes=$_GET['TblHomeVideo'];

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
		$model=TblHomeVideo::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-home-video-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
