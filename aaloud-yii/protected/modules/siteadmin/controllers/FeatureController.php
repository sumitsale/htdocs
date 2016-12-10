<?php

class FeatureController extends Controller
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
				'actions'=>array('create','update','feature','searchcont','updatecont'),
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
		$model=new feature;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['feature']))
		{
			$model->attributes=$_POST['feature'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->F_ID));
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

		if(isset($_POST['feature']))
		{
			$model->attributes=$_POST['feature'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->F_ID));
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
		$dataProvider=new CActiveDataProvider('feature');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new feature('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['feature']))
			$model->attributes=$_GET['feature'];

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
		$model=feature::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='feature-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionFeature()
	{
		$model=new feature;
		
		
		
		$this->render('featurecont',array(
				'model'=>$model,
				
				
				));
	}
	
		public function actionSearchcont()
	{

																		$defaultval = $_GET['cont_id'];
																		$model=new feature;	
																		if(isset($defaultval) && $defaultval!='')
																		{
																		$model->CONTENT_TYPE_ID = $defaultval;
																		$contentid = $defaultval;
																		}
																		if(isset($_POST['feature']['CONTENT_TYPE_ID']) && $_POST['feature']['CONTENT_TYPE_ID']!='')
																		{
																		$contentid=$_POST['feature']['CONTENT_TYPE_ID'];
																		$model->CONTENT_TYPE_ID = $contentid;
																		}
																		if(isset($_POST['User']['contenttype']) && $_POST['User']['contenttype']!='')
																		{
																		$contentid=$_POST['User']['contenttype'];
																		$model->CONTENT_TYPE_ID = $contentid;
																		}
																		
		
			if(isset($contentid) && $contentid>0)
				{
			
									
									$criteria=new CDbCriteria;
									$model_artist=model_tblaaartist::model()->findAll($criteria);
									
									
								    $featurearray=array();
									
									
									$select=Yii::app()->db->createCommand()
											->select('*')
											->from('tbl_aa_featured')
											->where('CONTENT_TYPE_ID=:id',array(':id'=>$contentid))
											->queryAll();
											
									
									for($i=0;$i<count($select);$i++)
									{
									$featurearray[] = $select[$i]['ARTIST_ID'];
									}
								
									
				}	
		
			
				//echo $contentid;exit;
										 if(count($_POST['artistid'])>0)
										{
									 $contentid = $_POST['cont'];
													$command=Yii::app()->db->createCommand()
													->delete('tbl_aa_featured', 'CONTENT_TYPE_ID=:id', array(':id'=>$contentid));
													//$model->attributes=$_POST['artistid'];
								
												if(isset($_POST['artistid']) && count($_POST['artistid'])>0)
												{	
														for($i=0;$i<count($_POST['artistid']);$i++)
														{
																$model_feature=new feature;
																$id[$i] = $_POST['artistid'][$i];
																$model_feature->CONTENT_TYPE_ID=$contentid;
																$model_feature->ARTIST_ID=$id[$i];
																$model_feature->LAST_UPDATE=time();
																$model_feature->save();				
														} 
												}	
												Yii::app()->user->setFlash('success',"Updated Successfully!");
												$this->redirect(array('Searchcont','cont_id'=>$contentid));
											
										}
	
										//$wap->unsetAttributes(); 
										
							$this->render('searchcont',array(
							'model'=>$model,
							'model_artist'=>$model_artist,
							'contentid'=>$contentid,
							'featurearray'=>$featurearray,
							'wap'=>$wap,
							//'contentid'=>$contentid,
							));
		
	}


	
	
	
	
	
}
