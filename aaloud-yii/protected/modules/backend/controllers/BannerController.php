<?php

class BannerController extends Controller
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
				'actions'=>array('admin','delete','list','edittitle','addbanner'),
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
	
		$model=new Banner;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Banner']))
		{
			$model->attributes=$_POST['Banner'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->LOCATION_ID));
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

		if(isset($_POST['Banner']))
		{
			$model->attributes=$_POST['Banner'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->LOCATION_ID));
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
	public function actionList()
	{
	
							
					$result=Yii::app()->db->createCommand()
								->select('LOCATION_ID,KEY_ID,LOCATION,BANNER_MODULE,BANNER_TITLE ')
								->from('tbl_banner_location_master')
								->order('BANNER_MODULE, BANNER_TITLE')
								->queryAll();
								
								
							
	
		$this->render('list',array(
			'result'=>$result,
		));
	}


			public function actionEdittitle($id)
			{
						$location_id=$_GET['id'];
						
						$model1=new TblBannerLocationMaster;
						$model2=new TblBannerStorefront;
						
						
						
						//echo $location_id;exit;
						$row=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_banner_location_master')
								->where('LOCATION_ID=:locationid',array(':locationid'=>$location_id ))
								->queryAll();
								
								
								
								if(isset($_POST['TblBannerLocationMaster']) && isset($_POST['TblBannerStorefront']))
								{
								//print_r($_FILES);
								$bannerid=$_POST['banner_id'];
								$bannerid1=$_POST['banner_id1'];
								$bannerid2=$_POST['banner_id2'];
								
								//print_r($_FILES);
							
								
								if($_POST['banner_id'] !='')
								{
								//print_r($_POST['TblBannerStorefront']['BANNER_TEXT']);exit;
											
										
								 $command=Yii::app()->db->createCommand()
		   											 ->update('tbl_banner_storefront',
													 array('BANNER_TEXT'=>$_POST['TblBannerStorefront']['BANNER_TEXT'],
													 'BANNER_REDIRECT_URL'=>$_POST['TblBannerStorefront']['BANNER_REDIRECT_URL'],			                                                     'BANNER_STATUS'=> $_POST['TblBannerStorefront']['BANNER_STATUS']),
		   		        							 'BANNER_ID=:banner_id and STORE_FRONT_ID=:storeid and LOCATION_ID=:locationid',array(			                                                     ':banner_id'=>$bannerid,':storeid'=>1,':locationid'=>$location_id));
								
								
								
								
													if(!is_dir("banner"))
														{
										
														 mkdir("banner" , 0777);
														}
														
														
												
												if(isset($_FILES['User']['name']['image']) && $_FILES['User']['name']['image']!="")	
													{
													
													move_uploaded_file($_FILES["User"]["tmp_name"]["image"],
      																	"banner/" . $_FILES["User"]["name"]["image"]);
														//$model2->doc->saveAs('banner/'.$_FILES['User']['name']['image']);
								
								
													}					
								
									
		   		
								
								}
								
								
								if($_POST['banner_id1'] !='')
								{
								//print_r($_POST['TblBannerStorefront']['BANNER_TEXT']);exit;
											
								 $command1=Yii::app()->db->createCommand()
		   											 ->update('tbl_banner_storefront',
													 array('BANNER_TEXT'=>$_POST['User']['bannercode1'],
													 'BANNER_REDIRECT_URL'=>$_POST['User']['redurl1'],			                                                     'BANNER_STATUS'=> $_POST['User']['status1']),
		   		        							 'BANNER_ID=:banner_id1 and STORE_FRONT_ID=:storeid and LOCATION_ID=:locationid',array(			                                                     ':banner_id1'=>$bannerid1,':storeid'=>1,':locationid'=>$location_id));
								
								
								
								
								if(!is_dir("banner"))
														{
										
														 mkdir("banner" , 0777);
														}
														
														
												
												if(isset($_FILES['User']['name']['image1']) && $_FILES['User']['name']['image1']!="")	
													{
													
													
																move_uploaded_file($_FILES["User"]["tmp_name"]["image1"],
      																	"banner/" . $_FILES["User"]["name"]["image1"]);												
														//$model2->doc->saveAs('banner/'.$_FILES['User']['name']['image']);
								
								
													}					
								
									
		   		
								
								}
								
								
								if($_POST['banner_id2'] !='')
								{
								//print_r($_POST['TblBannerStorefront']['BANNER_TEXT']);exit;
											
								 $command2=Yii::app()->db->createCommand()
		   											 ->update('tbl_banner_storefront',
													 array('BANNER_TEXT'=>$_POST['User']['bannercode2'],
													 'BANNER_REDIRECT_URL'=>$_POST['User']['redurl2'],			                                                     'BANNER_STATUS'=> $_POST['User']['status2']),
		   		        							 'BANNER_ID=:banner_id2 and STORE_FRONT_ID=:storeid and LOCATION_ID=:locationid',array(			                                                     ':banner_id2'=>$bannerid2,':storeid'=>1,':locationid'=>$location_id));
								
								
								
										if(!is_dir("banner"))
														{
										
														 mkdir("banner" , 0777);
														}
														
														
												
												if(isset($_FILES['User']['name']['image2']) && $_FILES['User']['name']['image2']!="")	
													{
													
													
													
													
													
													move_uploaded_file($_FILES["User"]["tmp_name"]["image2"],
      																	"banner/" . $_FILES["User"]["name"]["image2"]);
														//$model2->doc->saveAs('banner/'.$_FILES['User']['name']['image']);
								
								
													}					
								
								
									
		   		
								
								}
								
								
											if($command)
											{
												 $this->redirect('list');	
											}
											
								
							
								}
										
		
								
								
								
								
								
								
						
						$row1=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_banner_storefront')
								->where('LOCATION_ID=:locationid and STORE_FRONT_ID=:id1',array(':locationid'=>$location_id ,':id1'=>1))
								->queryAll();
								
								//print_r($row1);exit;
							
								$this->render('banneradd',array(
										'row'=>$row,
										'row1'=>$row1,
										'model1'=>$model1,
										'model2'=>$model2,
										
										));
								
			}
			
			
			public function actionAddbanner()
			{
			$model=new TblBannerStorefront;
			
			
				$country= Yii::app()->db->createCommand()
						->select('COUNTRY_ID,COUNTRY_NAME')
						->from('tbl_country_master')
						->queryAll();
			
			
				if(isset($_POST['TblBannerStorefront']))
				{
				
					$model->attributes=$_POST['TblBannerStorefront'];
					if($model->save())
					{
						$this->redirect('list');
						Yii::app()->user->setFlash('success'," Add new Banner");	
					}
				}
			
			
			
			$this->render('addnewbanner',array(
			'model'=>$model,
			'country'=>$country,
			
				));
			}



	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Banner('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Banner']))
			$model->attributes=$_GET['Banner'];

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
		$model=Banner::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='banner-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
