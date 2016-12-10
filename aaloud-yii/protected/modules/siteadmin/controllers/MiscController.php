<?php

class MiscController extends Controller
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
				'actions'=>array('create','update','misc'),
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

	 
	 public function actionMisc()
	{
		$model=new TblAaMisc;
	
	/*
		$query="select * from tbl_aa_misc order by MISC_ID Limit 1";	
	
							$connection = Yii::app()->db;
							$command = $connection->createCommand($query);
							$misc_query = $command->queryAll();
							
							//print_r($misc_query);exit;
	*/	
	
		 $misc_query=Yii::app()->db->createCommand()
	       ->select('*')
		   ->from('tbl_aa_misc')
		   ->order('MISC_ID desc')
		   ->limit(1)
		   ->queryAll();
		
	
		$exclusive= 	Yii::app()->db->createCommand()
						->select('Press_id,Press_News_Title')
						->from('tbl_aa_press')
						->where('Press_News_Type=:id',array(':id'=>'E'),array('in', 'Press_News_Status', 
						array('P','H')))
						->order('Press_LastUpdate desc')
						->queryAll();

							//print_r($exclusive);exit;
							
	
		$fartist= 	Yii::app()->db->createCommand()
						->select('Artist_Id,Artist_Name')
						->from('tbl_aa_artist',
						array('in', 'Artist_Status', 
						array('P','H')))
						->order('Artist_Name')
						->queryAll();
	
	
	/*for selected value in DWL*/
	foreach($misc_query as $each)
	{
	$id = $each['MISC_ID'];
	$model=$this->loadModel($id);
	}
			if(isset($_POST['TblAaMisc']))
			{
			
			$miscid=$_POST['misc_id'];
			$excluid=$_POST['TblAaMisc']['EXCLUSIVE_NEWS'];
			$fartistid=$_POST['TblAaMisc']['FEATURED_ARTIST'];
				
		
		$command=Yii::app()->db->createCommand()
		   		->update('tbl_aa_misc', 
		   		          array('EXCLUSIVE_NEWS'=>$excluid,'FEATURED_ARTIST'=>$fartistid,'LAST_UPDATE'=>time()),
        				  'MISC_ID=:id', array(':id'=>$miscid));
						Yii::app()->user->setFlash('success'," Updated Successfully");	  
						  
		$model->EXCLUSIVE_NEWS = $_POST['TblAaMisc']['EXCLUSIVE_NEWS'];
		$model->FEATURED_ARTIST = $_POST['TblAaMisc']['FEATURED_ARTIST'];
			
			}
	
		$this->render('miscupdate',array(
			'model'=>$model,
			'misc_query'=>$misc_query,
			'exclusive'=>$exclusive,
			'fartist'=>$fartist,
		));
	
	
	}
	 
	 
	public function actionCreate()
	{
		$model=new TblAaMisc;
					
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblAaMisc']))
		{
			$model->attributes=$_POST['TblAaMisc'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->MISC_ID));
		}

		$this->render('create',array(
			'model'=>$model,
			'exclusive'=>$exclusive,
			'fartist'=>$fartist,
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

		if(isset($_POST['TblAaMisc']))
		{
			$model->attributes=$_POST['TblAaMisc'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->MISC_ID));
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
		$dataProvider=new CActiveDataProvider('TblAaMisc');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblAaMisc('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblAaMisc']))
			$model->attributes=$_GET['TblAaMisc'];

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
		$model=TblAaMisc::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-aa-misc-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
