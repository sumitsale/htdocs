<?php

class TblFilterIpController extends Controller
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
				'actions'=>array('index','view','filteredip','delfilterip'),
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
	
	
	public function actionFilteredIP()
	{
		$model=new TblFilterIp;
		
		
		$country=Yii::app()->db->createCommand()
	       ->select('COUNTRY_ID,COUNTRY_NAME')
		   ->from('tbl_country_master')
		   ->queryAll();
		
		 $result= 	Yii::app()->db->createCommand()
						->selectDistinct('tfp.id,tfp.ipfrom,tfp.ipto,tcm.COUNTRY_NAME')
						->from('tbl_filter_ip tfp')
						->join('tbl_country_master tcm', 'tfp.COUNTRY_ID=tcm.COUNTRY_ID')
						->queryAll();
		
		if(isset($_POST['TblFilterIp']))
		{ 
			
			$model->attributes=$_POST['TblFilterIp'];
			
			if($model->save())
			Yii::app()->user->setFlash('success',"Added Successfully");
				$this->redirect(array('filteredip','id'=>$model->id));
			
		}
		
		
		$this->render('filteredip',array(
			'model'=>$model,			
			'country'=>$country,
			//'sql'=>$sql,
			'result'=>$result,
		));
		
	
	}
	
	public function actionDelFilterIP($id)
{
	
	
	$model=new TblFilterIp;
	
	$filter_id=$_GET['id'];
	
		
		$command=Yii::app()->db->createCommand()
				->delete('tbl_filter_ip', 'id=:id', array(':id'=>$filter_id));
	
	if($command)
	{
	Yii::app()->user->setFlash('success',"Deleted Successfully");
	}
				$this->redirect('filteredip');
	
	
		
}

	
	
	
	
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TblFilterIp;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblFilterIp']))
		{
			$model->attributes=$_POST['TblFilterIp'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['TblFilterIp']))
		{
			$model->attributes=$_POST['TblFilterIp'];
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
	//echo "1";exit;
		if(Yii::app()->request->isPostRequest)
		{//echo "Yes";exit;
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else 
		{//echo "No";exit;
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
			}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TblFilterIp');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblFilterIp('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblFilterIp']))
			$model->attributes=$_GET['TblFilterIp'];

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
		$model=TblFilterIp::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-filter-ip-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
