<?php

class TblPageMasterController extends Controller
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
				'actions'=>array('create','update','movie_query_listing','store_movie_query'),
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
	 public function actionMovie_query_listing()
	 {
	 $model=new TblPageMaster;
		$model1=new TblLocationMaster;
		$user=Yii::app()->db->createCommand()
		->select('id,page_title,page_html_name,page_section')
		->from('tbl_page_master')
		->queryAll();
		if(isset($_POST['TblPageMaster']))
		{
			$model->attributes=$_POST['TblPageMaster'];
		$this->performAjaxValidation($model);	

Yii::app()->tbl_page_master->id;
	$dataProvider = new CActiveDataProvider('tbl_page_master',
		
		array('condition'=>'page_section=:movie',));
		}		
	 $this->render('movie_query_listing',array(
	 				'user'=>$user,
	 ));
	 }
	 
	 public function actionStore_movie_query()
	{
		$this->render('store_movie_query');
	}
	
	public function actionCreate()
	{
		$model=new TblPageMaster;
		$model1=new TblLocationMaster;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblPageMaster']))
		{
			$model->attributes=$_POST['TblPageMaster'];
			$this->performAjaxValidation($model);	
		}
		$userId = Yii::app()->user->id;	
		$user = Yii::app()->db->createCommand()
    ->select('*')
    ->from('tbl_page_master')
    ->where('page_section=:page_section', array(':page_section'=>'movie'))
    ->queryAll();
	/*
	$user1 = Yii::app()->db->createCommand()
	->select('*')
    ->from('tbl_location_master')
    ->where('page_id=:page_id', array(':page_id'=>'id'))
    ->queryAll();
	*/
	$this->render('movie_query_listing',array('model'=>$model,'user'=>$user));
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

		if(isset($_POST['TblPageMaster']))
		{
			$model->attributes=$_POST['TblPageMaster'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('TblPageMaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblPageMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblPageMaster']))
			$model->attributes=$_GET['TblPageMaster'];

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
		$model=TblPageMaster::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-page-master-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
