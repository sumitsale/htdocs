<?php

class BrandProductSpecificationController extends Controller
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
				'users'=>array('admin','admin1'),
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
	public function actionCreate($product_brand_id='')
	{
		$model=new BrandProductSpecification;
		$model1=new BrandProductSpecification('search');
		$model1->unsetAttributes();  // clear any default values
		if(isset($_GET['BrandProductSpecification']))
			$model1->attributes=$_GET['BrandProductSpecification'];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$brand_product_specification = Yii::app()->db->createCommand()
								->select('*')
								->from('brand_product_specification')
								->where('brand_product_id=:brand_product_id',array(':brand_product_id'=>$product_brand_id))
								->order('id asc')
								->queryAll();
		
		$product_brand = Yii::app()->db->createCommand()
								->select('*')
								->from('product_brand')
								->where('id=:brand_product_id',array(':brand_product_id'=>$product_brand_id))
								->queryAll();
		
		
		if(isset($_POST['BrandProductSpecification']))
		{
			$model->attributes=$_POST['BrandProductSpecification'];
			$model->date_added = date("Y-m-d H:i:s");
			$model->date_modified = date("Y-m-d H:i:s");
			
			$brand_product_id = $model->brand_product_id;
			
			if($model->save(false))
				// $this->redirect(array('view','id'=>$model->id));
				$this->redirect(array('create','product_brand_id'=>$brand_product_id));
		}
		
		

		$this->render('create',array(
			'model1'=>$model1,
			'model'=>$model,
			'brand_product_specification'=>$brand_product_specification,
			'product_brand_id'=>$product_brand_id,
			'product_brand'=>$product_brand,
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

		if(isset($_POST['BrandProductSpecification']))
		{
			$model->attributes=$_POST['BrandProductSpecification'];
			$model->date_modified = date("Y-m-d H:i:s");
			
			$brand_product_id = $model->brand_product_id;
			
			if($model->save())
				$this->redirect(array('create','product_brand_id'=>$brand_product_id));
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
		$dataProvider=new CActiveDataProvider('BrandProductSpecification');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BrandProductSpecification('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BrandProductSpecification']))
			$model->attributes=$_GET['BrandProductSpecification'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BrandProductSpecification the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BrandProductSpecification::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BrandProductSpecification $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='brand-product-specification-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
