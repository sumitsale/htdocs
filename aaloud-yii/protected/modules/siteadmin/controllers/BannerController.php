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
				'actions'=>array('create','update','list','addnewwapbanner','generatexml','edittitle','addbanner','addwapbanner','managewapbanner','updatewapbanner','editwapbaneer'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','addnewwapbanner'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionAddwapbanner()
	{	
		//echo date("Y-m-d : H:i:s", time());exit;
		// echo Yii::app()->params['STORE_WEB_URL'];exit;
		// echo "<pre>";
		// print_r($_POST);
		
		// echo "<br>";
		// print_r($_FILES);exit;
		
		$model1=new TblAaWapBannerLocationMaster;
		$model2=new TblAaWapBannerStorefront;
		$model3=new TblAaWapBannerStorefront;
		$model4=new TblAaWapBannerStorefront;
		$model5=new TblAaWapBannerStorefront;
		
		$value=$_POST['toggler'];
		
		// echo "<pre>";
		// echo 
		// print_r($_POST);exit;
		
		// echo $value;exit;
		if(strlen($_POST['location'])==0)
		{
		Yii::app()->user->setFlash('success',"please fill the detail");
		$this->redirect('addnewwapbanner');
		}
		
		if($value==1)
		{
			$model1->LOCATION=$_POST['location'];
			$model1->BANNER_MODULE=$_POST['module'];
			$model1->BANNER_TITLE=$_POST['title'];
			$model1->CREATED=date("Y-m-d : H:i:s", time());
			
			$model1->save(false);
			
			$locationid = $model1->primaryKey;
			
			$model2->LOCATION_ID=$locationid;
			$model2->BANNER_TEXT=$_POST['bannercode'];
			$model2->BANNER_REDIRECT_URL=$_POST['redirectingurl'];
			$model2->TYPE="1";
			$model2->BANNER_STATUS=$_POST['status'];
			
			$model2->save(false);
			
			$this->redirect('Managewapbanner');
			
			
		}
		else
		{	
			if($value==0)
			{
				$model1->LOCATION=$_POST['location'];
				$model1->BANNER_MODULE=$_POST['module'];
				$model1->BANNER_TITLE=$_POST['title'];
				$model1->CREATED=date("Y-m-d : H:i:s", time());
			
				$model1->save(false);
				
				$highest_id = $model1->primaryKey;
				
					if(!is_dir("images/banner/wap"))
														{
										
														 mkdir("images/banner/wap" , 0777);
														}
													
													
						//////adding banner of dimension 230x23					
													
						if(isset($_FILES['230x23']['name']))
						{
						$path=Yii::app()->basePath . '/../images/banner/wap/';
						
						$ImgName = $_FILES['230x23']['name'];
						$ImageExt = explode('.',$ImgName);
						$ImageName = "230".'x'."23".'_'.$highest_id.'.'.$ImageExt[1];
						
						if($_FILES['230x23']['error']==0)
														{
															//Upload Image
															$uploadfile = $path.$ImageName;
															if (!move_uploaded_file($_FILES['230x23']['tmp_name'], $uploadfile)) 
															{
																die("Error while uploading Image.");
															}
														}
						
						 $url=Yii::app()->params['STORE_WEB_URL'];
						 
						 $bannertext = '<img src="'.$url . '/images/banner/wap/'.$ImageName.'" width="'."230".'" height="'."23".'" border=0 />';
					
						$model2->LOCATION_ID=$highest_id;
						$model2->BANNER_TEXT=$bannertext;
						$model2->BANNER_REDIRECT_URL=$_POST['redirectingurl'];
						$model2->TYPE="0";
						$model2->BANNER_WIDTH="230";
						$model2->BANNER_HEIGHT="23";
						$model2->BANNER_STATUS=$_POST['status'];
						
						$model2->save(false);
						
						}
						
						//////adding banner of dimension 310x23
						
						
						
						if(isset($_FILES['310x23']['name']))
						{
						$path=Yii::app()->basePath . '/../images/banner/wap/';
						
						$ImgName = $_FILES['310x23']['name'];
						$ImageExt = explode('.',$ImgName);
						$ImageName = "310".'x'."23".'_'.$highest_id.'.'.$ImageExt[1];
						
						if($_FILES['310x23']['error']==0)
														{
															//Upload Image
															$uploadfile = $path.$ImageName;
															if (!move_uploaded_file($_FILES['310x23']['tmp_name'], $uploadfile)) 
															{
																die("Error while uploading Image.");
															}
														}
						
						 $url=Yii::app()->params['STORE_WEB_URL'];
						 
						 $bannertext = '<img src="'.$url . '/images/banner/wap/'.$ImageName.'" width="'."310".'" height="'."23".'" border=0 />';
					
						$model3->LOCATION_ID=$highest_id;
						$model3->BANNER_TEXT=$bannertext;
						$model3->BANNER_REDIRECT_URL=$_POST['redirectingurl'];
						$model3->TYPE="0";
						$model3->BANNER_WIDTH="310";
						$model3->BANNER_HEIGHT="23";
						$model3->BANNER_STATUS=$_POST['status'];
						
						// echo "<pre>";
						// print_r($model2->attributes);exit;
						
						$model3->save(false);
						
						}
						
						///adding banner for image 342x23
						
						if(isset($_FILES['342x23']['name']))
						{
						$path=Yii::app()->basePath . '/../images/banner/wap/';
						
						$ImgName = $_FILES['342x23']['name'];
						$ImageExt = explode('.',$ImgName);
						$ImageName = "342".'x'."23".'_'.$highest_id.'.'.$ImageExt[1];
						
						if($_FILES['342x23']['error']==0)
														{
															//Upload Image
															$uploadfile = $path.$ImageName;
															if (!move_uploaded_file($_FILES['342x23']['tmp_name'], $uploadfile)) 
															{
																die("Error while uploading Image.");
															}
														}
						
						 $url=Yii::app()->params['STORE_WEB_URL'];
						 
						 $bannertext = '<img src="'.$url . '/images/banner/wap/'.$ImageName.'" width="'."342".'" height="'."23".'" border=0 />';
					
						$model4->LOCATION_ID=$highest_id;
						$model4->BANNER_TEXT=$bannertext;
						$model4->BANNER_REDIRECT_URL=$_POST['redirectingurl'];
						$model4->TYPE="0";
						$model4->BANNER_WIDTH="342";
						$model4->BANNER_HEIGHT="23";
						$model4->BANNER_STATUS=$_POST['status'];
						
						$model4->save(false);
						
						}
						
						//adding banner for dimension 640x23
						
						if(isset($_FILES['640x23']['name']))
						{
						$path=Yii::app()->basePath . '/../images/banner/wap/';
						
						$ImgName = $_FILES['640x23']['name'];
						$ImageExt = explode('.',$ImgName);
						$ImageName = "640".'x'."23".'_'.$highest_id.'.'.$ImageExt[1];
						
						if($_FILES['640x23']['error']==0)
														{
															//Upload Image
															$uploadfile = $path.$ImageName;
															if (!move_uploaded_file($_FILES['640x23']['tmp_name'], $uploadfile)) 
															{
																die("Error while uploading Image.");
															}
														}
						
						 $url=Yii::app()->params['STORE_WEB_URL'];
						 
						 $bannertext = '<img src="'.$url . '/images/banner/wap/'.$ImageName.'" width="'."640".'" height="'."23".'" border=0 />';
					
						$model5->LOCATION_ID=$highest_id;
						$model5->BANNER_TEXT=$bannertext;
						$model5->BANNER_REDIRECT_URL=$_POST['redirectingurl'];
						$model5->TYPE="0";
						$model5->BANNER_WIDTH="640";
						$model5->BANNER_HEIGHT="23";
						$model5->BANNER_STATUS=$_POST['status'];
						
						$model5->save(false);
						
						}
						
					$this->redirect('Managewapbanner');
				
			}
			
		
		}
	
	}
	
		public function actionAddnewwapbanner()
	{
	
	$this->render('addnewwapbanner');
	}
	
	
	
	public function actionManagewapbanner()
	{
	
	
	$result=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_aa_wap_banner_location_master')
								->queryAll();
								
		$this->render('waplist',array(
		'result'=>$result,
		));					
	
	}
	
	public function actionEditwapbaneer()
	{
		//print_r($_POST);
		
		$result='';
		if(isset($_POST['id']))
		{
		$locationid=$_POST['id'];
		
		$result=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_aa_wap_banner_location_master')
								->where('LOCATION_ID=:LOCATION_ID',array(':LOCATION_ID'=>$locationid))
								->queryAll();
		}						
								// echo "<pre>";
								// print_r($result);exit;
								
	$this->render('editwaptitle',array(
		'result'=>$result,
		));		
		
	}
	
	public function actionUpdatewapbanner()
	{
	// echo "<pre>";
	// print_r($_POST);
	
	// echo "<br>";
	// print_r($_FILES);exit;
		$model1=new TblAaWapBannerLocationMaster;
		$model2=new TblAaWapBannerStorefront;
		$model3=new TblAaWapBannerStorefront;
		$model4=new TblAaWapBannerStorefront;
		$model5=new TblAaWapBannerStorefront;
	
	
	$locationid='';
	
		if(isset($_POST['locationid']))
		{
		
				$locationid=$_POST['locationid'];
		
		}
		
		$value=$_POST['toggler'];
		
		
		
		$result = Yii::app()->db->createCommand()
		->update('tbl_aa_wap_banner_location_master', 
					array('MODIFIED' =>date("Y-m-d : H:i:s", time()), ), 
					'LOCATION_ID =:LOCATION_ID', array(':LOCATION_ID' => $locationid));
					
					if($value==1)
		{
			 $command = Yii::app()->db->createCommand()
			 ->delete('tbl_aa_wap_banner_storefront',
                'LOCATION_ID =:LOCATION_ID', array(':LOCATION_ID' => $locationid));
				
		
			
			$model2->LOCATION_ID=$locationid;
			$model2->BANNER_TEXT=$_POST['bannercode'];
			$model2->BANNER_REDIRECT_URL=$_POST['redirectingurl'];
			$model2->TYPE="1";
			$model2->BANNER_STATUS=$_POST['status'];
			
			$model2->save(false);
		}
		else
		{
			if($value==0)
			{
			$command = Yii::app()->db->createCommand()
			 ->delete('tbl_aa_wap_banner_storefront',
                'LOCATION_ID =:LOCATION_ID', array(':LOCATION_ID' => $locationid));
			
					if(!is_dir("images/banner/wap"))
														{
										
														 mkdir("images/banner/wap" , 0777);
														}
														
					//////adding banner of dimension 230x23					
													
						if(isset($_FILES['230x23']['name']))
						{
						$path=Yii::app()->basePath . '/../images/banner/wap/';
						
						$ImgName = $_FILES['230x23']['name'];
						$ImageExt = explode('.',$ImgName);
						$ImageName = "230".'x'."23".'_'.$locationid.'.'.$ImageExt[1];
						
						if($_FILES['230x23']['error']==0)
														{
															//Upload Image
															$uploadfile = $path.$ImageName;
															if (!move_uploaded_file($_FILES['230x23']['tmp_name'], $uploadfile)) 
															{
																die("Error while uploading Image.");
															}
														}
						
						 $url=Yii::app()->params['STORE_WEB_URL'];
						 
						 $bannertext = '<img src="'.$url . '/images/banner/wap/'.$ImageName.'" width="'."230".'" height="'."23".'" border=0 />';
					
						$model2->LOCATION_ID=$locationid;
						$model2->BANNER_TEXT=$bannertext;
						$model2->BANNER_REDIRECT_URL=$_POST['redirectingurl'];
						$model2->TYPE="0";
						$model2->BANNER_WIDTH="230";
						$model2->BANNER_HEIGHT="23";
						$model2->BANNER_STATUS=$_POST['status'];
						
						$model2->save(false);
						
						}
						
						
						
						
						//////adding banner of dimension 310x23
						
						
						
						if(isset($_FILES['310x23']['name']))
						{
						$path=Yii::app()->basePath . '/../images/banner/wap/';
						
						$ImgName = $_FILES['310x23']['name'];
						$ImageExt = explode('.',$ImgName);
						$ImageName = "310".'x'."23".'_'.$locationid.'.'.$ImageExt[1];
						
						if($_FILES['310x23']['error']==0)
														{
															//Upload Image
															$uploadfile = $path.$ImageName;
															if (!move_uploaded_file($_FILES['310x23']['tmp_name'], $uploadfile)) 
															{
																die("Error while uploading Image.");
															}
														}
						
						 $url=Yii::app()->params['STORE_WEB_URL'];
						 
						 $bannertext = '<img src="'.$url . '/images/banner/wap/'.$ImageName.'" width="'."310".'" height="'."23".'" border=0 />';
					
						$model3->LOCATION_ID=$locationid;
						$model3->BANNER_TEXT=$bannertext;
						$model3->BANNER_REDIRECT_URL=$_POST['redirectingurl'];
						$model3->TYPE="0";
						$model3->BANNER_WIDTH="310";
						$model3->BANNER_HEIGHT="23";
						$model3->BANNER_STATUS=$_POST['status'];
						
						// echo "<pre>";
						// print_r($model2->attributes);exit;
						
						$model3->save(false);
						
						}
						
						
						
						
							///adding banner for image 342x23
						
						if(isset($_FILES['342x23']['name']))
						{
						$path=Yii::app()->basePath . '/../images/banner/wap/';
						
						$ImgName = $_FILES['342x23']['name'];
						$ImageExt = explode('.',$ImgName);
						$ImageName = "342".'x'."23".'_'.$locationid.'.'.$ImageExt[1];
						
						if($_FILES['342x23']['error']==0)
														{
															//Upload Image
															$uploadfile = $path.$ImageName;
															if (!move_uploaded_file($_FILES['342x23']['tmp_name'], $uploadfile)) 
															{
																die("Error while uploading Image.");
															}
														}
						
						 $url=Yii::app()->params['STORE_WEB_URL'];
						 
						 $bannertext = '<img src="'.$url . '/images/banner/wap/'.$ImageName.'" width="'."342".'" height="'."23".'" border=0 />';
					
						$model4->LOCATION_ID=$locationid;
						$model4->BANNER_TEXT=$bannertext;
						$model4->BANNER_REDIRECT_URL=$_POST['redirectingurl'];
						$model4->TYPE="0";
						$model4->BANNER_WIDTH="342";
						$model4->BANNER_HEIGHT="23";
						$model4->BANNER_STATUS=$_POST['status'];
						
						$model4->save(false);
						
						}
						
						//adding banner for dimension 640x23
						
						if(isset($_FILES['640x23']['name']))
						{
						$path=Yii::app()->basePath . '/../images/banner/wap/';
						
						$ImgName = $_FILES['640x23']['name'];
						$ImageExt = explode('.',$ImgName);
						$ImageName = "640".'x'."23".'_'.$locationid.'.'.$ImageExt[1];
						
						if($_FILES['640x23']['error']==0)
														{
															//Upload Image
															$uploadfile = $path.$ImageName;
															if (!move_uploaded_file($_FILES['640x23']['tmp_name'], $uploadfile)) 
															{
																die("Error while uploading Image.");
															}
														}
						
						 $url=Yii::app()->params['STORE_WEB_URL'];
						 
						 $bannertext = '<img src="'.$url . '/images/banner/wap/'.$ImageName.'" width="'."640".'" height="'."23".'" border=0 />';
					
						$model5->LOCATION_ID=$locationid;
						$model5->BANNER_TEXT=$bannertext;
						$model5->BANNER_REDIRECT_URL=$_POST['redirectingurl'];
						$model5->TYPE="0";
						$model5->BANNER_WIDTH="640";
						$model5->BANNER_HEIGHT="23";
						$model5->BANNER_STATUS=$_POST['status'];
						
						$model5->save(false);
						
						}
													
													
													
													
			
			}
		}
		
	
	
	
					$this->redirect('Managewapbanner');
				
	
	
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
		$model=new TblBannerLocationMaster;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblBannerLocationMaster']))
		{
			$model->attributes=$_POST['TblBannerLocationMaster'];
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

		if(isset($_POST['TblBannerLocationMaster']))
		{
			$model->attributes=$_POST['TblBannerLocationMaster'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->LOCATION_ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
		public function actionList()
	{
	
							
					$result=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_aa_banner_location_master')
								->order('BANNER_MODULE, BANNER_TITLE')
								->queryAll();
								
								
								
								
								
								//////////////////////////////////////////////////////////////////////////////////code fo pagination here
								
								$page_size =15;
		
								$criteria = new CDbCriteria();
																						
								$item_count = count($result);
								  
								$pages = new CPagination($item_count);
								
								$pages->setPageSize($page_size);
								$pages->applyLimit($criteria);
								
								$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
								
								$sample =range($pages->offset+1, $end);
								
								
								//////////////////////////////////////////////////////////////////////////////////
							
	
		$this->render('list',array(
			'result'=>$result,
			'item_count'=>$item_count,
			'page_size'=>$page_size,
			'pages'=>$pages,
			'sample'=>$sample,
		));
	}

	public function actionAddbanner()
			{
			$model1=new TblBannerLocationMaster;
			$model2=new TblBannerStorefront;
			$id='';
			
			
				$country= Yii::app()->db->createCommand()
						->select('COUNTRY_ID,COUNTRY_NAME')
						->from('tbl_country_master')
						->queryAll();
			
			
			if(isset($_POST['TblBannerLocationMaster']) && isset($_POST['TblBannerStorefront']))
								{
								
								
								
								//echo "<pre>";
								//print_r($_FILES);exit;
								//print_r($_POST);exit;
								
								$bannertext = "";
								
								$model1->attributes = $_POST['TblBannerLocationMaster'];
								
							
								
								$model2->attributes = $_POST['TblBannerStorefront'];
								
								$banner_width=$model1->BANNER_WIDTH;
								$banner_height=$model1->BANNER_HEIGHT;

								
								$result1 = $model1->save();
						
											
								$highest_id = $model1->primaryKey;
											
											//echo $highest_id;exit;
								
								$model2->LOCATION_ID=$highest_id;
								
								///echo "<pre>";
								//print_r($model2->attributes);exit;
								
								//$result = $model2->save();
								
								//print_r($_FILES);exit;
														
														if(!is_dir("images/banner"))
														{
										
														 mkdir("images/banner" , 0777);
														}
																
																
													if(isset($_FILES['User']['name']['image']) && $_FILES['User']['name']['image']!="")	
													{
													
														
														$path=Yii::app()->basePath . '/../images/banner/';
														
														$ImgName = $_FILES['User']['name']['image'];
														$ImageExt = explode('.',$ImgName);
														$ImageName = $banner_width.'x'.$banner_height.'_'.$highest_id.'.'.$ImageExt[1];
														//echo $ImageName;
														
														
														
														if($_FILES['User']['error']['image']==0)
														{
															//Upload Image
															$uploadfile = $path.$ImageName;
															if (!move_uploaded_file($_FILES['User']['tmp_name']['image'], $uploadfile)) 
															{
																die("Error while uploading Image.");
															}
														}
													/*
													move_uploaded_file($_FILES["User"]["tmp_name"]["image"],
      																	"images/banner/" . $_FILES["User"]["name"]["image"]);
														//$model2->doc->saveAs('banner/'.$_FILES['User']['name']['image']);
								                     */
													 $url=Yii::app()->params['STORE_WEB_URL'];
													 
													 
													 
													$bannertext = '<img src="'.$url . '/images/banner/'.$ImageName.'" width="'.$banner_width.'" height="'.$banner_height.'" border=0 />';
													}					
													
													if(strlen($bannertext)>0)
													{
													$model2->BANNER_TEXT=$bannertext;
													}
													else
													{
													$model2->BANNER_TEXT=$_POST['TblBannerStorefront']['BANNER_TEXT'];
													}
													
													$result=$model2->save();
												
												
								Yii::app()->user->setFlash('success',"Banner Added Successfully");
								
											if($result)
											{
												 $this->redirect('list');	
											}
											
								
							
								}
			$this->render('banneradd',array(
									//	'row'=>$row,
									//	'id'=>$id,
									//	'row1'=>$row1,
										'model1'=>$model1,
										'model2'=>$model2,
										'id'=>$id,
			
				));
			}

	
				public function actionEdittitle()
			{
			//print_r($_FILES);
				$id=0;
				if(isset($_POST['id']))
				{
				$id=$_POST['id'];
				}
				else
				{
				$id=0;
				}
			$model1=new TblBannerLocationMaster;
			$model2=new TblBannerStorefront;
			
			//echo $id;exit;
						if(isset($_POST['id']) && $_POST['id']!="")
						{
						
								$location_id=$_POST['id'];
								$id=$_POST['id'];
								$model1=$this->loadModel($id);
								$model2=$this->loadModel1($id);
								
								//echo $model2->BANNER_TEXT;
								
							/*	
								$row=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_aa_banner_location_master')
								->where('LOCATION_ID=:locationid',array(':locationid'=>$location_id ))
								->queryAll();
								
								$row1=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_aa_banner_storefront')
								->where('LOCATION_ID=:locationid',array(':locationid'=>$location_id))
								->queryAll();
								*/
						}	
						
								if(isset($_POST['TblBannerLocationMaster']) && isset($_POST['TblBannerStorefront']))
								{
									$bannertext = "";
								
								$model1->attributes = $_POST['TblBannerLocationMaster'];
							
								$model2->attributes = $_POST['TblBannerStorefront'];
								$model2->BANNER_REDIRECT_URL=$_POST['TblBannerStorefront']['BANNER_REDIRECT_URL'];
								
								
								$banner_width=$model1->BANNER_WIDTH;
								$banner_height=$model1->BANNER_HEIGHT;

								
								$result1 = $model1->save();
						
											
								//$highest_id = $model1->primaryKey;
											
											//echo $highest_id;exit;
								
								//$model2->LOCATION_ID=$highest_id;
								
								///echo "<pre>";
								//print_r($model2->attributes);exit;
								
								//$result = $model2->save();
								
								//print_r($_FILES);exit;
														
														if(!is_dir("images/banner"))
														{
										
														 mkdir("images/banner" , 0777);
														}
																
																
													if(isset($_FILES['User']['name']['image']) && $_FILES['User']['name']['image']!="")	
													{
													
														
														$path=Yii::app()->basePath . '/../images/banner/';
														
														$ImgName = $_FILES['User']['name']['image'];
														$ImageExt = explode('.',$ImgName);
														$ImageName = $banner_width.'x'.$banner_height.'_'.$model2->LOCATION_ID.'.'.$ImageExt[1];
														//echo $ImageName;
														
														
														
														if($_FILES['User']['error']['image']==0)
														{
															//Upload Image
															$uploadfile = $path.$ImageName;
															if (!move_uploaded_file($_FILES['User']['tmp_name']['image'], $uploadfile)) 
															{
																die("Error while uploading Image.");
															}
														}
													/*
													move_uploaded_file($_FILES["User"]["tmp_name"]["image"],
      																	"images/banner/" . $_FILES["User"]["name"]["image"]);
														//$model2->doc->saveAs('banner/'.$_FILES['User']['name']['image']);
								                     */
													 $url=Yii::app()->params['STORE_WEB_URL_BANNER'];
													 
													 
													 
													$bannertext = '<img src="'.$url . '/images/banner/'.$ImageName.'" width="'.$banner_width.'" height="'.$banner_height.'" border=0 />';
													}					
													
													if(strlen($bannertext)>0)
													{
													$model2->BANNER_TEXT=$bannertext;
													}
													else
													{
													$model2->BANNER_TEXT=$_POST['TblBannerStorefront']['BANNER_TEXT'];
													}
													
													$result=$model2->save();
												
												
								
								Yii::app()->user->setFlash('success',"Banner Updated Successfully");
											if($result)
											{
												 $this->redirect('list');	
											}
											
								
							
								}
						
								
								//print_r($row1);exit;
							
								$this->render('banneradd',array(
									//	'row'=>$row,
										'id'=>$id,
									//	'row1'=>$row1,
										'model1'=>$model1,
										'model2'=>$model2,
										
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
		$dataProvider=new CActiveDataProvider('TblBannerLocationMaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblBannerLocationMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblBannerLocationMaster']))
			$model->attributes=$_GET['TblBannerLocationMaster'];

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
		$model=TblBannerLocationMaster::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
		public function loadModel1($id)
	{
		$model=TblBannerStorefront::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-banner-location-master-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionGeneratexml()
	{
		$result= Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_aa_wap_banner_location_master')
						->queryAll();
						
						// echo "<pre>";
						// print_r($result);exit;
						
							if(!is_dir("xml/wapbanner"))
										{
										 mkdir("xml/wapbanner", 0777);
										}
						
						for($i=0;$i<count($result);$i++)
						{
						
						// echo "<pre>";
						// print_r($result[$i]['BANNER_MODULE']);exit;
							$bannerdetail=Yii::app()->db->createCommand()
											->select('*')
											->from('tbl_aa_wap_banner_storefront')
											->where('LOCATION_ID=:LOCATION_ID',array(':LOCATION_ID'=>$result[$i]['LOCATION_ID']))
											->queryAll();
											
											// echo "<pre>";
											// print_r($bannerdetail);exit;
											
											for($j=0;$j<count($bannerdetail);$j++)
											{
												$ourFileName =Yii::app()->basePath . '/../xml/wapbanner/'.$result[$i]['BANNER_MODULE'].'_'.$bannerdetail[$j]['BANNER_WIDTH'].'_'.$bannerdetail[$j]['BANNER_HEIGHT'].'.xml';
												$ourFileHandle = fopen($ourFileName, 'w');
												
												$newline="\n";
												
												$detail='<?xml version="1.0" encoding="UTF-8"?>'.$newline;
												$detail.='<root>'.$newline;
												$detail.='<path><![CDATA['.$bannerdetail[$j]['BANNER_TEXT'].']]></path>'.$newline;
												$detail.='<redirecturl><![CDATA['.$bannerdetail[$j]['BANNER_REDIRECT_URL'].']]></redirecturl>'.$newline;
												$detail.='</root>'.$newline;
												
												fwrite($ourFileHandle,$detail);
												fclose($ourFileHandle);
	
											}		
											
											
						}
						
						$this->redirect('Managewapbanner');
						
	}
	

}
