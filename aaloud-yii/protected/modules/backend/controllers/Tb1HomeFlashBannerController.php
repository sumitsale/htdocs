<?php

class Tb1HomeFlashBannerController extends Controller
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
				'actions'=>array('create','update','list','addimage','home_flash_banner'),
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
		$model=new Tb1HomeFlashBanner;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tb1HomeFlashBanner']))
		{
			$model->attributes=$_POST['Tb1HomeFlashBanner'];
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

		if(isset($_POST['Tb1HomeFlashBanner']))
		{
			$model->attributes=$_POST['Tb1HomeFlashBanner'];
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
		$dataProvider=new CActiveDataProvider('Tb1HomeFlashBanner');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	  public function actionList()
	{
		$sql="SELECT * FROM flash_banner_list ORDER BY flash_title";
		$connection = Yii::app()->db;
							$command = $connection->createCommand($sql);
							$result = $command->queryAll();
	//print_r($result);
	//exit;
		$this->render('list',array(
			'result'=>$result,
		));
	}
	 
	public function actionAdmin()
	{
		$model=new Tb1HomeFlashBanner('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tb1HomeFlashBanner']))
			$model->attributes=$_GET['Tb1HomeFlashBanner'];

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
		$model=Tb1HomeFlashBanner::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tb1-home-flash-banner-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionAddimage()
	{
		$model=new HomepageLeftBottom;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['HomepageLeftBottom']))
		{
			$model->attributes=$_POST['HomepageLeftBottom'];
			$model->created = date('Y-m-d h:i:s');
			$model->modified = date('Y-m-d h:i:s');
			$model->doc=CUploadedFile::getInstance($model,'image1');
			$model->image1 = $_FILES['HomepageLeftBottom']['name']['image1'];
			$model->image2 = $_FILES['HomepageLeftBottom']['name']['image2'];
			$model->image3 = $_FILES['HomepageLeftBottom']['name']['image3'];
			$model->image4 = $_FILES['HomepageLeftBottom']['name']['image4'];
			$model->image5 = $_FILES['HomepageLeftBottom']['name']['image5'];
		
			if($model->save())
			{
			

			if(!is_dir("homeimage"))
										{
										
										mkdir("homeimage" , 0777);
										}
			if(isset($_FILES['HomepageLeftBottom']['name']['image1']) && $_FILES['HomepageLeftBottom']['name']['image1']!="")	
													{
													
								$model->doc->saveAs('homeimage/'.$_FILES['HomepageLeftBottom']['name']['image1']);
								
								
													}							
			
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('addimage',array(
			'model'=>$model,
		));
	}
	
	public function actionHome_flash_banner()
{
    $model=new Tb1HomeFlashBanner;

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='tb1-home-flash-banner-home_flash_banner-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['Tb1HomeFlashBanner']))
    {
        $model->attributes=$_POST['Tb1HomeFlashBanner'];
		
		$model->created = date('Y-m-d h:i:s');
		$model->modified = date('Y-m-d h:i:s');
		$model->doc=CUploadedFile::getInstance($model,'flash_file');
		
		$model->flash_file =$_FILES['Tb1HomeFlashBanner']['name']['flash_file'];
		//print_r($model->attributes);
		//exit;
		if($model->save())
			{
			

			if(!is_dir("homeflashbanner"))
										{
										
										mkdir("homeflashbanner" , 0777);
										}
			if(isset($_FILES['Tb1HomeFlashBanner']['name']['flash_file']) && $_FILES['Tb1HomeFlashBanner']['name']['flash_file']!="")	
													{
													
								$model->doc->saveAs('homeflashbanner/'.$_FILES['Tb1HomeFlashBanner']['name']['flash_file']);
								
								
													}							
			
				$this->redirect(array('view','id'=>$model->id));
			}
		
        
    }
    $this->render('home_flash_banner',array('model'=>$model));
}

	
}
