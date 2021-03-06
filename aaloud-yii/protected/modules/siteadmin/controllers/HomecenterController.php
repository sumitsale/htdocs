<?php

class HomecenterController extends Controller
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
				'actions'=>array('create','update','editcenter'),
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
		$model=new model_homecenter;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['model_homecenter']))
		{
			
			$model->attributes=$_POST['model_homecenter'];
			
			$bfile_name=$_FILES['model_homecenter']['name']['center_section_image'];
			
			$model->center_section_image=$bfile_name;
			
			$model->center_section_lastupdate=time();
			$model->center_section_status='1';
			
			if($model->save())
			{
			
			
			
			$ext =explode('.', $bfile_name);
			
			$ext = strtolower($ext[count($ext)-1]);
			
			$highest_id = Yii::app()->db->createCommand()
  				->select('max(center_section_id) as max')
  				->from('tbl_home_center')
  				->queryScalar();
			
			
			$model->center_section_image=$highest_id.".".$ext;
			
			$tmp_name=$model->center_section_image;
					
					$model->save();
			
			
			
						
						
						
							if(isset($bfile_name) && $bfile_name!="")
					{
					if(!is_dir("images/homecenter/".$highest_id))
														{
										
														 mkdir("images/homecenter/".$highest_id , 0777);
														}
														
				$model->center_section_image=CUploadedFile::getInstance($model,'center_section_image');
				$model->center_section_image->saveAs(Yii::app()->basePath . '/../images/homecenter/'.$highest_id.'/' .  $highest_id.".".$ext);			
					}
			
			
			
			
				$this->redirect(array('view','id'=>$model->center_section_id));
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
	
		$id=$_POST[id];
		
		$model=$this->loadModel($id);
		
		$existing_name = $model->center_section_image;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['model_homecenter']))
		{
			$model->attributes=$_POST['model_homecenter'];
			
			$bfile_name=$_FILES['model_homecenter']['name']['center_section_image'];
			
					if(isset($bfile_name) && $bfile_name!='')
						{
								$model->center_section_image=$bfile_name;
								
								
								$ext =explode('.', $bfile_name);
								
								$ext = strtolower($ext[count($ext)-1]);
								
								$model->center_section_image=$id.".".$ext;
						}
						
						else
							{
								$model->center_section_image=$existing_name;
							}
					
			
			$model->center_section_lastupdate=time();
			$model->center_section_status='1';
			
			if($model->save())
			{
			
			
			/*
			$ext =explode('.', $bfile_name);
			
			$ext = strtolower($ext[count($ext)-1]);
			
			$highest_id = Yii::app()->db->createCommand()
  				->select('max(center_section_id) as max')
  				->from('tbl_home_center')
  				->queryScalar();
			
			
			$model->center_section_image=$highest_id.".".$ext;
			*/
			$tmp_name=$model->center_section_image;
					
					$model->save();
			
						
							if(isset($bfile_name) && $bfile_name!="")
					{
					if(!is_dir("images/homecenter/".$id))
														{
										
														 mkdir("images/homecenter/".$id , 0777);
														}
														
				$model->center_section_image=CUploadedFile::getInstance($model,'center_section_image');
				$model->center_section_image->saveAs(Yii::app()->basePath . '/../images/homecenter/'.$id.'/' .  $id.".".$ext);			
					}
			
			
			
			
				$this->redirect(array('editcenter'));
			}
		}

		$this->render('update',array(
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
		$dataProvider=new CActiveDataProvider('model_homecenter');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new model_homecenter('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['model_homecenter']))
			$model->attributes=$_GET['model_homecenter'];

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
		$model=model_homecenter::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='model-homecenter-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionEditcenter()
	{
			$model=new model_homecenter;
	
	
			$sql= Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_home_center')
						->queryAll();
	
				$this->render('editcenter',array(
					'model'=>$model,
					'sql'=>$sql,
				
				));
	
	
	}
}
