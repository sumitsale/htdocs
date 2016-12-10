<?php

class ItunesController extends Controller
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
				'actions'=>array('create','update','del'),
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
		$model=new TblAaItunes;
		
		
			
		$misc_query=Yii::app()->db->createCommand()
	       ->select('*')
		   ->from('tbl_aa_itunes')
		   ->order('ALBUM_ID')
		   ->queryAll();
				
							
		
		
		$result=Yii::app()->db->createCommand()
	       ->select('*')
		   ->from('tbl_aa_itunes')
		   ->order('INDATE desc')
		   ->queryAll();	

////////////////////////////////////////////////////////////////////edit on 18-11-2011		   
							
							
							
			
		$page_size =15;
		
		$criteria = new CDbCriteria();
																//code for pagination here
	    $item_count = count($result);
		  
		$pages = new CPagination($item_count);
        $pages->setPageSize($page_size);
        $pages->applyLimit($criteria);
		
		$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
		
		$sample =range($pages->offset+1, $end);						
											
							
							
////////////////////////////////////////////////////////////////////							
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblAaItunes']))
		{
			$itunes_date	=	time();
		
			$model->attributes=$_POST['TblAaItunes'];
			$model->INDATE = $itunes_date;
			if($model->save())
			{
			Yii::app()->user->setFlash('success',"Added Successfully");
				$this->redirect(array('create'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'misc_query'=>$misc_query,
			'result'=>$result,
			'item_count'=>$item_count,
            'page_size'=>$page_size,
            'pages'=>$pages,
			'sample'=>$sample,
			
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

		if(isset($_POST['TblAaItunes']))
		{
			$model->attributes=$_POST['TblAaItunes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ALBUM_ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	
	public function actionDel()
		{
			$model=new TblAaItunes;
	
			$tunes_id=$_POST['id'];
	
			$command=Yii::app()->db->createCommand()
				->delete('tbl_aa_itunes', 'ALBUM_ID=:id', array(':id'=>$tunes_id));
	
			if($command)
			{
			Yii::app()->user->setFlash('success',"Deleted Successfully");
			}
				$this->redirect('create');
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
		$dataProvider=new CActiveDataProvider('TblAaItunes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblAaItunes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblAaItunes']))
			$model->attributes=$_GET['TblAaItunes'];

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
		$model=TblAaItunes::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-aa-itunes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
