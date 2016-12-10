<?php

class TblUserReviewsController extends Controller
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
				'actions'=>array('index','view','manage','abusereport'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','adminabuse'),
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
	
	
	public function actionManage()
	{
		$model=new TblUserReviews;
		$model1=new TblAlbumTypes;
		/*
		$content=Yii::app()->db->createCommand()
	       ->select('ALBUM_TYPE_ID,ALBUM_TYPE_NAME')
		   ->from('tbl_album_types')
		   ->queryAll();
		
		$result= 	Yii::app()->db->createCommand()
						->selectDistinct('REVIEW_ID,REVIEW_TITLE,USER_ID,FULL_NAME,CONTENT_ID')
						->from('tbl_user_reviews')
						->queryAll();
		
		
		$contenttype=$_GET['ALBUM_TYPE_ID'];
		$filter = $_GET['User']['filter'];
		
				$searchresult=Yii::app()->db->createCommand()
		             ->select('REVIEW_ID,REVIEW_TITLE,USER_ID,FULL_NAME,CONTENT_ID')
		             ->from('tbl_user_reviews')
		             ->where('ALBUM_TYPE_ID=:alb_id and filter=:fil',array(':alb_id'=>$contenttype,':fil'=>$filter))
		             ->queryAll();
		*/
		
		
		
		$this->render('manage',array(
			'model'=>$model,
			'model1'=>$model1,
			//'content'=>$content,
			//'result'=>$result,
			//'searchresult'=>$searchresult,
			));
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	public function actionAbuseReport()
	{
		$model=new TblUserReviews;
		$model1=new TblAlbumTypes;
		
		$content=Yii::app()->db->createCommand()
	       ->select('ALBUM_TYPE_ID,ALBUM_TYPE_NAME')
		   ->from('tbl_album_types')
		   ->queryAll();
		   /*
		$planmaster="SELECT tur.REVIEW_ID,tur.REVIEW_TITLE,tur.CONTENT_ID,turra.FULL_NAME,turra.EMAIL,turra.REPORT_ABUSE_ID,turra.STATUS FROM TBL_USER_REVIEWS tur,TBL_USER_REVIEW_REPORT_ABUSE turra WHERE tur.STORE_FRONT_ID='1' AND tur.REVIEW_ID = turra.REVIEW_ID AND CONTENT_TYPE_ID = '1' AND tur.MARK_AS_SAFE = 0 AND tur.ABUSE = 1 AND (tur.STATUS = 1 OR tur.STATUS = 2) ORDER BY tur.REVIEW_ADDEDON";
		
					$connection = Yii::app()->db;
					$command = $connection->createCommand($planmaster);
					$result = $command->queryAll();  
		   */
		   
		   
		   
		$this->render('abusereport',array(
			'model'=>$model,
			'model1'=>$model1,
			'content'=>$content,
			));
	
	
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	 
	public function actionCreate()
	{
		$model=new TblUserReviews;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblUserReviews']))
		{
			$model->attributes=$_POST['TblUserReviews'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->REVIEW_ID));
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

		if(isset($_POST['TblUserReviews']))
		{
			$model->attributes=$_POST['TblUserReviews'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->REVIEW_ID));
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
		$dataProvider=new CActiveDataProvider('TblUserReviews');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblUserReviews('search');
		$model1=new TblAlbumTypes;
		
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblUserReviews']))
			$model->attributes=$_GET['TblUserReviews'];
		
		$content=Yii::app()->db->createCommand()
	       ->select('ALBUM_TYPE_ID,ALBUM_TYPE_NAME')
		   ->from('tbl_album_types')
		   ->queryAll();
			
			
			
		$this->render('admin',array(
			'model'=>$model,
			'model1'=>$model1,
			'content'=>$content,
			
		));
	}
	
	public function actionAdminAbuse()
	{
		$model=new TblUserReviews('search');
		$model1=new TblAlbumTypes;
		
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblUserReviews']))
			$model->attributes=$_GET['TblUserReviews'];
		
		$content=Yii::app()->db->createCommand()
	       ->select('ALBUM_TYPE_ID,ALBUM_TYPE_NAME')
		   ->from('tbl_album_types')
		   ->queryAll();
			
			
			
		$this->render('adminabuse',array(
			'model'=>$model,
			'model1'=>$model1,
			'content'=>$content,
			
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=TblUserReviews::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-user-reviews-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
