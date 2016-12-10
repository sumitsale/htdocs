<?php

class UpcEventsController extends Controller
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
				'actions'=>array('create','update','eventslist','statuschange'),
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
		$model=new UpcEvents;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UpcEvents']))		
		{
		
		// echo "<pre>";
		// print_r($_POST);exit;
			$model->attributes=$_POST['UpcEvents'];
			
			// echo "<pre>";
			// print_r($model->attributes);exit;
			
			

			if($model->save())
			{
			 Yii::app()->user->setFlash('success',"Event Added Successfully");
				$this->redirect(array('eventslist'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
		
	}

	
	public function actionEventsList()
	{
	
	if($_POST)
	{
		$id=$_POST['id'];
						
		 $command=Yii::app()->db->createCommand()
						->update('upc_events',
		   		        array('event_status'=>'DL'),
		   		        'id=:id',array(':id'=>$id));				
	}
						
	
	
		$model=new UpcEvents;
		
		/*
		$sql= "select * from upc_events Where event_status!='DL' order by id desc";
	
							$connection = Yii::app()->db; 
							$command = $connection->createCommand($sql);
							$result = $command->queryAll();
		*/
					
		 $result=Yii::app()->db->createCommand()
	       ->select('*')
		   ->from('upc_events')
		   ->where('event_status!=:id',array(':id'=>'DL'))
		   ->order('id desc')
		   ->queryAll();
		
		//print_r($result);exit;
		
		$page_size =10;
		$criteria = new CDbCriteria();
       
       
        $item_count = count($result);
		// echo $item_count;
		//var_dump($criteria);
	   
	   
	   
       // $item_count = count($cleared);
        $pages = new CPagination($item_count);
        $pages->setPageSize($page_size);
        $pages->applyLimit($criteria);  // the trick is here
		//var_dump($page);
		//exit;
		/* echo $pages->offset;
		echo $pages->limit;
		echo 
		exit; */
		$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
		
		$sample =range($pages->offset+1, $end);
		
		
		$this->render('eventslist',array(
			'model'=>$model,
			'result'=>$result,
			'item_count'=>$item_count,
			'page_size'=>$page_size,
			'items_count'=>$item_count,
			'pages'=>$pages,
			'sample'=>$sample,
		));
	
	
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
			$post=UpcEvents::model()->findByPk($id);
			$post->event_status=$status;
			$post->save();
		}
		
		$this->redirect(array('eventslist'));
						 
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UpcEvents']))
		{
			$model->attributes=$_POST['UpcEvents'];
			if($model->save())
			{
			Yii::app()->user->setFlash('success',"Events Updated Successfully");
				$this->redirect(array('eventslist'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'id'=>$id,
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
		$dataProvider=new CActiveDataProvider('UpcEvents');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UpcEvents('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UpcEvents']))
			$model->attributes=$_GET['UpcEvents'];

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
		$model=UpcEvents::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='upc-events-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}