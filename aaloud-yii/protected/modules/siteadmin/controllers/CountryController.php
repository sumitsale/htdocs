<?php

class CountryController extends Controller
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
				'actions'=>array('create','update','statuschange','del','countrylist'),
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
		$model=new CountryMaster;
		
		
		$result=Yii::app()->db->createCommand()
	       ->select('*')
		   ->from('country_master')
		   ->order('name asc')
		   ->queryAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CountryMaster']))
		{
			$model->attributes=$_POST['CountryMaster'];
			$model->indate = time();
			if($model->save())
			{
				Yii::app()->user->setFlash('success',"Country Added Successfully");
				$this->redirect(array('countrylist'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'result'=>$result,
		));
	}

	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
	
		$id=$_POST['id'];
		
		$model=$this->loadModel($id);
		
		//print_r($model->attributes);exit;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CountryMaster']))
		{
			$model->attributes=$_POST['CountryMaster'];
			$model->indate = time();
			if($model->save())
			{
				Yii::app()->user->setFlash('success',"Country Updated Successfully");
				$this->redirect(array('countrylist'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'id'=>$id,
		));
	}

	
	public function actionCountrylist()
	{
	
		$id=$_POST['id'];
						
						
	
		$model=new CountryMaster;
		
		$result=Yii::app()->db->createCommand()
	       ->select('*')
		   ->from('country_master')
		   ->order('name asc')
		   ->queryAll();
							
		
		
	
		   
		   ///////////////////////////////////////pagination
		   
		
						$page_size =10;
		
						$criteria = new CDbCriteria();
																				
						$item_count = count($result);
						  
						$pages = new CPagination($item_count);
						$pages->setPageSize($page_size);
						$pages->applyLimit($criteria);
						
						$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
						
						$sample =range($pages->offset+1, $end);
		   
		   //print_r($sample);exit;
		   
		   ///////////////////////////////////////
		   
		
		$this->render('countrylist',array(
			'model'=>$model,
			'result'=>$result,
			'item_count'=>$item_count,
            'page_size'=>$page_size,
            'pages'=>$pages,
			'sample'=>$sample,
		));
	
	}
	
	public function actionDel()
		{
			$model=new CountryMaster;
	
			$id=$_POST['id'];
	
			$command=Yii::app()->db->createCommand()
				->delete('country_master', 'id=:id', array(':id'=>$id));
	
			if($command)
			{
			Yii::app()->user->setFlash('success',"Genre Deleted Successfully");
			}
				$this->redirect('countrylist');
        }
		
		
		
		public function actionStatuschange()
	{
	
		if(isset($_POST['status']) && $_POST['status']=='P'){
			$status='H';
		}else{
			$status='P';
		}
		if(isset($_POST['id']) && $_POST['id']!=''){
				$id= $_POST['id'];
			$post=CountryMaster::model()->findByPk($id);
			$post->status=$status;
			$post->save();
		}
		
		$this->redirect(array('countrylist'));
						 
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
		$dataProvider=new CActiveDataProvider('CountryMaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CountryMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CountryMaster']))
			$model->attributes=$_GET['CountryMaster'];

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
		$model=CountryMaster::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='country-master-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
