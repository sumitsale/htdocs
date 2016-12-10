<?php

class PlaceToVisitController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('create','update'),
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
		$model=new PlaceToVisit;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PlaceToVisit']))
		{
			$model->attributes=$_POST['PlaceToVisit'];
			
			
			$model->small_thumbnail	 = isset($_FILES['PlaceToVisit']['name']['small_thumbnail']) && $_FILES['PlaceToVisit']['name']['small_thumbnail']!=''  ? $_FILES['PlaceToVisit']['name']['small_thumbnail'] : '';
			$model->thumbnail_1 = isset($_FILES['PlaceToVisit']['name']['thumbnail_1']) && $_FILES['PlaceToVisit']['name']['thumbnail_1']!=''  ? $_FILES['PlaceToVisit']['name']['thumbnail_1'] : '';
			$model->thumbnail_2 = isset($_FILES['PlaceToVisit']['name']['thumbnail_2']) && $_FILES['PlaceToVisit']['name']['thumbnail_2']!=''  ? $_FILES['PlaceToVisit']['name']['thumbnail_2'] : '';
			$model->thumbnail_3 = isset($_FILES['PlaceToVisit']['name']['thumbnail_3']) && $_FILES['PlaceToVisit']['name']['thumbnail_3']!=''  ? $_FILES['PlaceToVisit']['name']['thumbnail_3'] : '';
			$model->thumbnail_4 = isset($_FILES['PlaceToVisit']['name']['thumbnail_4']) && $_FILES['PlaceToVisit']['name']['thumbnail_4']!=''  ? $_FILES['PlaceToVisit']['name']['thumbnail_4'] : '';
			$model->thumbnail_5 = isset($_FILES['PlaceToVisit']['name']['thumbnail_5']) && $_FILES['PlaceToVisit']['name']['thumbnail_5']!=''  ? $_FILES['PlaceToVisit']['name']['thumbnail_5'] : '';
			
			$model->description 	= isset($_POST['description']) && $_POST['description']!='' ? $_POST['description'] : '';
			
			$model->date_added 		= date("Y-m-d H:i:s");
			$model->date_modified 	= date("Y-m-d H:i:s");
			// echo "<pre>";
			// print_r($model->attributes);exit;
			
			if($model->save())
			{
			
			
				if($model->small_thumbnail !='')
				{
				if(!is_dir("images/placestovisit/"))
															{
											
															 mkdir("images/placestovisit/", 0777);
															}
															
					$model->small_thumbnail=CUploadedFile::getInstance($model,'small_thumbnail');
					$model->small_thumbnail->saveAs(Yii::app()->basePath . '/../../images/placestovisit/'. $model->small_thumbnail );			
						
					$small_thumbnail = new EasyImage(Yii::app()->basePath . '/../../images/placestovisit/'. $model->small_thumbnail );
					$small_thumbnail->resize(219, 247);
					$small_thumbnail->save(Yii::app()->basePath . '/../../images/placestovisit/'. $model->small_thumbnail);
					
					
					
					
					$model->thumbnail_1=CUploadedFile::getInstance($model,'thumbnail_1');
					$model->thumbnail_1->saveAs(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_1 );			
						
					$thumbnail_1 = new EasyImage(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_1 );
					$thumbnail_1->resize(712, 360);
					$thumbnail_1->save(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_1);
					
					
					
					$model->thumbnail_2=CUploadedFile::getInstance($model,'thumbnail_2');
					$model->thumbnail_2->saveAs(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_2 );			
						
					$thumbnail_2 = new EasyImage(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_2 );
					$thumbnail_2->resize(712, 360);
					$thumbnail_2->save(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_2);
					
					
					
					
					$model->thumbnail_3=CUploadedFile::getInstance($model,'thumbnail_3');
					$model->thumbnail_3->saveAs(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_3 );			
						
					$thumbnail_3 = new EasyImage(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_3 );
					$thumbnail_3->resize(712, 360);
					$thumbnail_3->save(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_3);
					
					
					
					
					$model->thumbnail_4=CUploadedFile::getInstance($model,'thumbnail_4');
					$model->thumbnail_4->saveAs(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_4 );			
						
					$thumbnail_4 = new EasyImage(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_4 );
					$thumbnail_4->resize(712, 360);
					$thumbnail_4->save(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_4);
					
					
					
					$model->thumbnail_5=CUploadedFile::getInstance($model,'thumbnail_5');
					$model->thumbnail_5->saveAs(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_5 );			
						
					$thumbnail_5 = new EasyImage(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_5 );
					$thumbnail_5->resize(712, 360);
					$thumbnail_5->save(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_5);
				}
				
				$this->redirect(array('view','id'=>$model->id));
				
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$thumbnail_1  =$model->thumbnail_1;
		$thumbnail_2=$model->thumbnail_2;
		$thumbnail_3=$model->thumbnail_3;
		$thumbnail_4=$model->thumbnail_4;
		$thumbnail_5=$model->thumbnail_5;
		
		$small_thumbnail=$model->small_thumbnail;
		
		if(isset($_POST['PlaceToVisit']))
		{
			$model->attributes=$_POST['PlaceToVisit'];
			
			
			$model->small_thumbnail	 = isset($_FILES['PlaceToVisit']['name']['small_thumbnail']) && $_FILES['PlaceToVisit']['name']['small_thumbnail']!=''  ? $_FILES['PlaceToVisit']['name']['small_thumbnail'] : $small_thumbnail;
			$model->thumbnail_1 = isset($_FILES['PlaceToVisit']['name']['thumbnail_1']) && $_FILES['PlaceToVisit']['name']['thumbnail_1']!=''  ? $_FILES['PlaceToVisit']['name']['thumbnail_1'] : $thumbnail_1;
			$model->thumbnail_2 = isset($_FILES['PlaceToVisit']['name']['thumbnail_2']) && $_FILES['PlaceToVisit']['name']['thumbnail_2']!=''  ? $_FILES['PlaceToVisit']['name']['thumbnail_2'] : $thumbnail_2;
			$model->thumbnail_3 = isset($_FILES['PlaceToVisit']['name']['thumbnail_3']) && $_FILES['PlaceToVisit']['name']['thumbnail_3']!=''  ? $_FILES['PlaceToVisit']['name']['thumbnail_3'] : $thumbnail_3;
			$model->thumbnail_4 = isset($_FILES['PlaceToVisit']['name']['thumbnail_4']) && $_FILES['PlaceToVisit']['name']['thumbnail_4']!=''  ? $_FILES['PlaceToVisit']['name']['thumbnail_4'] : $thumbnail_4;
			$model->thumbnail_5 = isset($_FILES['PlaceToVisit']['name']['thumbnail_5']) && $_FILES['PlaceToVisit']['name']['thumbnail_5']!=''  ? $_FILES['PlaceToVisit']['name']['thumbnail_5'] : $thumbnail_5;
			
			$model->description 	= isset($_POST['description']) && $_POST['description']!='' ? $_POST['description'] : '';
			
			$model->date_added 		= date("Y-m-d H:i:s");
			$model->date_modified 	= date("Y-m-d H:i:s");
			// echo "<pre>";
			// print_r($model->attributes);exit;
			
			if($model->save())
			{
			
			
				if($model->small_thumbnail !='' && $model->small_thumbnail != $small_thumbnail)
				{
			
					$model->small_thumbnail=CUploadedFile::getInstance($model,'small_thumbnail');
					$model->small_thumbnail->saveAs(Yii::app()->basePath . '/../../images/placestovisit/'. $model->small_thumbnail );			
						
					$small_thumbnail = new EasyImage(Yii::app()->basePath . '/../../images/placestovisit/'. $model->small_thumbnail );
					$small_thumbnail->resize(219, 247);
					$small_thumbnail->save(Yii::app()->basePath . '/../../images/placestovisit/'. $model->small_thumbnail);
					
				}	
					
					if($model->thumbnail_1 !='' && $model->thumbnail_1 != $thumbnail_1)
				{	
					$model->thumbnail_1=CUploadedFile::getInstance($model,'thumbnail_1');
					$model->thumbnail_1->saveAs(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_1 );			
						
					$thumbnail_1 = new EasyImage(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_1 );
					$thumbnail_1->resize(712, 360);
					$thumbnail_1->save(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_1);
				}	
					
					if($model->thumbnail_2 !='' && $model->thumbnail_2 != $thumbnail_2)
				{		
					$model->thumbnail_2=CUploadedFile::getInstance($model,'thumbnail_2');
					$model->thumbnail_2->saveAs(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_2 );			
						
					$thumbnail_2 = new EasyImage(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_2 );
					$thumbnail_2->resize(712, 360);
					$thumbnail_2->save(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_2);
				}

				if($model->thumbnail_3 !='' && $model->thumbnail_3 != $thumbnail_3)
				{					
					
					
					
					$model->thumbnail_3=CUploadedFile::getInstance($model,'thumbnail_3');
					$model->thumbnail_3->saveAs(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_3 );			
						
					$thumbnail_3 = new EasyImage(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_3 );
					$thumbnail_3->resize(712, 360);
					$thumbnail_3->save(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_3);
					
				}

					if($model->thumbnail_4 !='' && $model->thumbnail_4 != $thumbnail_4)
				{	
					
					
					$model->thumbnail_4=CUploadedFile::getInstance($model,'thumbnail_4');
					$model->thumbnail_4->saveAs(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_4 );			
						
					$thumbnail_4 = new EasyImage(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_4 );
					$thumbnail_4->resize(712, 360);
					$thumbnail_4->save(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_4);
					
					
				}

				if($model->thumbnail_5 !='' && $model->thumbnail_5 != $thumbnail_5)
				{					
					
					
					$model->thumbnail_5=CUploadedFile::getInstance($model,'thumbnail_5');
					$model->thumbnail_5->saveAs(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_5 );			
						
					$thumbnail_5 = new EasyImage(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_5 );
					$thumbnail_5->resize(712, 360);
					$thumbnail_5->save(Yii::app()->basePath . '/../../images/placestovisit/'. $model->thumbnail_5);
					
				}	
				
				$this->redirect(array('view','id'=>$model->id));
				
				}
				
				
			}
		

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PlaceToVisit');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PlaceToVisit('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PlaceToVisit']))
			$model->attributes=$_GET['PlaceToVisit'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PlaceToVisit the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PlaceToVisit::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PlaceToVisit $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='place-to-visit-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
