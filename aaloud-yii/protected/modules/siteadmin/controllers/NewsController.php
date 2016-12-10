<?php

class NewsController extends Controller
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
				'actions'=>array('create','update','newslist','statuschange'),
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
		$ptime = time();
		$model=new TblAaPress;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$artist= 	Yii::app()->db2->createCommand()
						->select('ARTIST_ID,ARTIST_NAME')
						->from('TBL_ARTISTS')
						->queryAll();
		
		$model->Press_Indate=$ptime;
		
		
		if(isset($_POST['TblAaPress']))
		{
			$model->attributes=$_POST['TblAaPress'];
			$model->Press_News_Content=$_POST['TblAaPress']['Press_News_Content'];
			$model->Press_News_Featured=$_POST['TblAaPress']['Press_News_Featured'];
			$model->Press_News_Exclusive=$_POST['TblAaPress']['Press_News_Exclusive'];
			//print_r($model->attributes);exit;
			if($model->save())
			{
			Yii::app()->user->setFlash('success',"News Added Successfully");
				$this->redirect(array('newslist'));
			}
		}

		
		$this->render('create',array(
			'model'=>$model,
			'artist'=>$artist,
		));
	}

	
	public function actionNewsList()
	{
		if($_POST)
		{
		$id=$_POST['id'];
						/*For delete*/
						 $command=Yii::app()->db->createCommand()
						->update('tbl_aa_press',
		   		        array('Press_News_Status'=>'DL'),
		   		        'Press_id=:id',array(':id'=>$id));
		}				

			$model=new TblAaPress;
		

		 $result=Yii::app()->db->createCommand()
	       ->select('*')
				 ->from('tbl_aa_press')
				 ->where('Press_News_Status!=:id',array(':id'=>'DL'))
				 ->order('Press_id desc')
				 ->queryAll();
		   
		   
		   ///////////////////////////////////////edit on 18-11-2011
		   
		   
		   $page_size =15;
		
		$criteria = new CDbCriteria();
																//code for pagination here
	    $item_count = count($result);
		  
		$pages = new CPagination($item_count);
        $pages->setPageSize($page_size);
        $pages->applyLimit($criteria);
		
		$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
		
		$sample =range($pages->offset+1, $end);	
		   
		   //print_r($sample);exit;
		   

		$this->render('newslist',array(
			'model'=>$model,
			'result'=>$result,
			'item_count'=>$item_count,
      'page_size'=>$page_size,
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
			$post=TblAaPress::model()->findByPk($id);
			$post->Press_News_Status=$status;
			$post->save();
		}
		
		$this->redirect(array('newslist'));
						 
	}
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		$id=$_POST['id'];
		$ptime = time();
		
		$model=$this->loadModel($id);
		
		$artist= 	Yii::app()->db2->createCommand()
						->select('ARTIST_ID,ARTIST_NAME')
						->from('TBL_ARTISTS')
						->queryAll();
						
						
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		
		$model->Press_LastUpdate=$ptime;
			
		if(isset($_POST['TblAaPress']))
		{
			$model->attributes=$_POST['TblAaPress'];
			$model->Press_News_Content=$_POST['TblAaPress']['Press_News_Content'];
			$model->Press_News_Featured=$_POST['TblAaPress']['Press_News_Featured'];
			$model->Press_News_Exclusive=$_POST['TblAaPress']['Press_News_Exclusive'];
		
			if($model->save())
			{
			Yii::app()->user->setFlash('success',"News Updated Successfully");
				$this->redirect(array('newslist'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'artist'=>$artist,
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
		$dataProvider=new CActiveDataProvider('TblAaPress');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblAaPress('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblAaPress']))
			$model->attributes=$_GET['TblAaPress'];

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
		$model=TblAaPress::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-aa-press-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
