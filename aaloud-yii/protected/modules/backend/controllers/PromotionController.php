<?php

class PromotionController extends Controller
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
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','list','add','statuschange'),
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
		$model=new TblPromotion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblPromotion']))
		{
			$model->attributes=$_POST['TblPromotion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->PROMO_ID));
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

		if(isset($_POST['TblPromotion']))
		{
			$model->attributes=$_POST['TblPromotion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->PROMO_ID));
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

	/*List promotions */
	public function actionList($title=null,$plan=null,$id=null)
	{
	
		//print_r($_POST);exit;
		//$plan_id=$_POST[TblPromotion][PLAN_ID];
	$result= Yii::app()->db->createCommand()
	->select('*')
	->from(tbl_promotion)
	->where('STORE_FRONT_ID=:id',array(':id'=>STORE_FRONT_ID))
	->order('PROMO_TITLE')
	->queryAll();

							
		$model=new TblPromotion;
		$model1=new TblPlanMaster;
		$plan_title1 = Yii::app()->db->createCommand()
						->select('PLAN_ID,PLAN_TITLE')
						->from('tbl_plan_master')
						->queryAll();
					
		if(isset($_POST['TblPromotion']) && isset($_POST['TblPlanMaster']))
		{	
		if(isset($id) && $id!='')
		{
		$model=$this->loadModel($id);
		}
			$model->attributes=$_POST['TblPromotion'];
			$model->PLAN_ID=$_POST['TblPlanMaster']['PLAN_TITLE'];
			$model->PROMO_CREATED = date('y-m-d h:i:s');
			$model->STORE_FRONT_ID = STORE_FRONT_ID;
			//print_r($model->attributes);exit;
			if($model->save())
			{
				Yii::app()->user->setFlash('success',"Promotion details gets add successfully!");
				$this->redirect(array('list'));
			}
			
		}
	//	print_r($_REQUEST['promo_id']);exit;
	
		
	$this->render('list',array(
			'model'=>$model,
			'model1'=>$model1,
			'plan_title1'=>$plan_title1,
			'result'=>$result,
			'title'=>$title,
			'plan'=>$plan,
		));
	}

	

	public function actionStatuschange()
	{
	
		$today = date("Y-m-d H:i:s");
			
		if(isset($_GET['promostatus']) && $_GET['promostatus']==1){
			$statusPromo=0;
		}else{
			$statusPromo=1;
		}
		if(isset($_GET['promo_id']) && $_GET['promo_id']!=''){
				$promo_id= $_GET['promo_id'];
			$post=TblPromotion::model()->findByPk($promo_id);
			$post->PROMO_STATUS=$statusPromo;
			$post->PROMO_MODIFIED=$today;
			$post->save();
		}
		
		$this->redirect(array('list'));
						 
		
	
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TblPromotion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblPromotion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblPromotion']))
			$model->attributes=$_GET['TblPromotion'];

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
		$model=TblPromotion::model()->findByPk($id);
		
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-promotion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
