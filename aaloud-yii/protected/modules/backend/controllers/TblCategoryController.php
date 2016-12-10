<?php

class TblCategoryController extends Controller
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
				'actions'=>array('admin','delete','listalbum','listvideo','listtrack','listartist','listalbumpopup','listvideopopup','listtrackpopup','listartistpopup'),
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
		$model=new TblCategory;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblCategory']))
		{
			$model->attributes=$_POST['TblCategory'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->CATEGORY_ID));
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

		if(isset($_POST['TblCategory']))
		{
			$model->attributes=$_POST['TblCategory'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->CATEGORY_ID));
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



	/*list music album.....*/
	public function actionListalbum()
	{
		$result = Yii::app()->db->createCommand()
    	->select('a.CATEGORY,b.*')
    	->from('tbl_category a')
    	->join('tbl_category_details b', 'a.CATEGORY_ID=b.CATEGORY_ID')
    	->where('b.STORE_FRONT_ID=:id1 and b.CONTENT_TYPE_ID=:id2 and b.PARENT_ID=:id3 and b.STATUS=:id4', array(':id1'=>1,':id2'=>1,':id3'=>0,':id4'=>1))
		->order('a.CATEGORY,b.CONTENT_TYPE_ID')
    	->queryAll();
	
		
		
			
			
		/*	$connection = Yii::app()->db;
			$command = $connection->createCommand($sql);
			$result2= $command->queryAll();
		*/	
			$this->render('listalbum',array(
			'result'=>$result,
		//	'result2'=>$result2,
		));

	}

	/* list video of the month */
	public function actionListvideo()
	{
		$result = Yii::app()->db->createCommand()
    	->select('a.CATEGORY,b.*')
    	->from('tbl_category a')
    	->join('tbl_category_details b', 'a.CATEGORY_ID=b.CATEGORY_ID')
    	->where('b.STORE_FRONT_ID=:id1 and b.CONTENT_TYPE_ID=:id2 and b.PARENT_ID=:id3 and b.STATUS=:id4', array(':id1'=>1,':id2'=>2,':id3'=>0,':id4'=>1))
		->order('a.CATEGORY,b.CONTENT_TYPE_ID')
    	->queryAll();
		
		$this->render('listvideo',array(
			'result'=>$result,
		));

	}

	/* list track of the month*/
	
	public function actionListtrack()
	{
		$result = Yii::app()->db->createCommand()
    	->select('a.CATEGORY,b.*')
    	->from('tbl_category a')
    	->join('tbl_category_details b', 'a.CATEGORY_ID=b.CATEGORY_ID')
    	->where('b.STORE_FRONT_ID=:id1 and b.CONTENT_TYPE_ID=:id2 and b.PARENT_ID=:id3 and b.STATUS=:id4', array(':id1'=>1,':id2'=>1,':id3'=>0,':id4'=>1))
		->order('a.CATEGORY,b.CONTENT_TYPE_ID')
    	->queryAll();
		
		$this->render('listtrack',array(
			'result'=>$result,
		));

	}
	
	/* list artist of the month*/
	
	public function actionListartist()
	{
		$result = Yii::app()->db->createCommand()
    	->select('a.CATEGORY,b.*')
    	->from('tbl_category a')
    	->join('tbl_category_details b', 'a.CATEGORY_ID=b.CATEGORY_ID')
    	->where('b.STORE_FRONT_ID=:id1 and b.CONTENT_TYPE_ID=:id2 and b.PARENT_ID=:id3 and b.STATUS=:id4', array(':id1'=>1,':id2'=>1,':id3'=>0,':id4'=>1))
		->order('a.CATEGORY,b.CONTENT_TYPE_ID')
    	->queryAll();
		
		$this->render('listartist',array(
			'result'=>$result,
		));

	}
	
	
	public function actionListalbumpopup()
	{
		$this->layout = false;
		
		$this->render('listalbumpopup');

	}
	
	public function actionListvideopopup()
	{
		$this->layout = false;
		
		$this->render('listvideopopup');

	}
	public function actionListtrackpopup()
	{
	

		$this->layout = false;
		
		$this->render('listtrackpopup');

	}
	
	public function actionListartistpopup()
	{
		$this->layout = false;
		
		$this->render('listartistpopup');

	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TblCategory');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblCategory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblCategory']))
			$model->attributes=$_GET['TblCategory'];

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
		$model=TblCategory::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
