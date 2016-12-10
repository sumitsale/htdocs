<?php

class TblFindMusicController extends Controller
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
				'actions'=>array('create','update','generatxml'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','generatxml'),
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
		$model=new TblFindMusic;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblFindMusic']))
		{
		
		$totalrecord = Yii::app()->db->createCommand()
					->select('*')
					->from('tbl_find_music')
                    ->queryAll();
		
		// echo "<pre>";
		// print_r($totalrecord);exit;
		
		
		if(count($totalrecord)==10)
		{
			 Yii::app()->user->setFlash('success', "<h2>Artist can not be more than 10</h2>");
			$this->redirect('create');
		}
		
		
			$model->attributes=$_POST['TblFindMusic'];
			if($model->save())
				 Yii::app()->user->setFlash('success', "<h2>Artist detail added successfully</h2>");
				$this->redirect('admin');
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

		if(isset($_POST['TblFindMusic']))
		{
			$model->attributes=$_POST['TblFindMusic'];
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
		$dataProvider=new CActiveDataProvider('TblFindMusic');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblFindMusic('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblFindMusic']))
			$model->attributes=$_GET['TblFindMusic'];

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
		$model=TblFindMusic::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-find-music-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionGeneratxml()
	{
		$totalrecord = Yii::app()->db->createCommand()
					->select('*')
					->from('tbl_find_music')
                    ->queryAll();
					
					$detail='';
					// echo "<pre>";
					// print_r($totalrecord);exit;
					
					if(count($totalrecord)==0)
					{
					 Yii::app()->user->setFlash('success', "<h2>No  data present in table</h2>");
					$this->redirect('admin');
					}
					
					for($i=0;$i<count($totalrecord);$i++)
					{
					
					    $profileimage200 = Yii::app()->db2->createCommand()
							->select('tf.FILE_PATH,taf.FILE_SUB_TYPE_ID')
							->from('TBL_ARTIST_FILES taf')
							->join('TBL_FILES tf', 'taf.FILE_ID=tf.FILE_ID')
							->where('taf.ARTIST_FILE_TYPE_ID=1 and taf.FILE_SUB_TYPE_ID=146 and taf.ARTIST_ID=:artist_id',array(':artist_id'=>$totalrecord[$i]['artist_id']))
							->queryAll();
							
							// echo "<pre>";
							// print_r($profileimage200);exit;
							
							$artistprofileimage='';
							
									if(count($profileimage200)>0)
									{
										$artistprofileimage=$profileimage200[0]['FILE_PATH'];
									}
									else
									{
										$artistprofileimage='';
									}
							
										$detail[]=array(
											'artistid'=>array('@cdata'=>$totalrecord[$i]['artist_id']),
											'artistname'=>array('@cdata'=>$totalrecord[$i]['artist_name']),
											'profileimage'=>array('@cdata'=>$artistprofileimage),
											'hungamalink'=>array('@cdata'=>$totalrecord[$i]['hungama_link']),
											'ovilink'=>array('@cdata'=>$totalrecord[$i]['ovi_link']),
											'itunelink'=>array('@cdata'=>$totalrecord[$i]['itune_link']),
											'smslink'=>array('@cdata'=>$totalrecord[$i]['sms_download_link']),
										);
					
					
					
						
					}
					
					// echo "<pre>";
					// print_r($detail);exit;
					
					$sql1['firstone']=$detail;
					
					$xml = Array2XML::createXML('firstones', $sql1);
					$xml->save(Yii::app()->basePath . '/../xml/frontend/firstmusic.xml');
			
			 Yii::app()->user->setFlash('success', "<h2>Xml has been generated successfully</h2>");
			$this->redirect('admin');
					
	
	}
}
