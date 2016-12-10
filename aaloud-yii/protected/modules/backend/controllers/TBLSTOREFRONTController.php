<?php

class TBLSTOREFRONTController extends Controller
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
				'actions'=>array('create','update','contenttype','updatestore','list','assignstore','topsearch','delassignstore','addnewkeyword','storefile','deletekeyword'),
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
		$model=new TBLSTOREFRONT;
		
		$model1=new TBLCOUNTRYMASTER;
		
			$userId = Yii::app()->user->id;	
			
					
			
			
			
			
			

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TBLSTOREFRONT']))
		{
			$model->attributes=$_POST['TBLSTOREFRONT'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->STORE_FRONT_ID));
		}

		$this->render('create',array(
			'model'=>$model,
			
		));
	}








public function actionDelassignstore($id)
{
	

	$model2=new TBLGLOBAL;
	
	$country_id=$_GET['id'];
	
	
	//echo $country_id;exit;
	
				
$command=Yii::app()->db->createCommand()
->delete('tbl_global', 'COUNTRY_ID=:id', array(':id'=>$country_id));
if($command)
{
Yii::app()->user->setFlash('success',"Country Deleted Successfully");
}
 $this->redirect('assignstore');

	
}





public function actionAssignstore()
{
$model=new TBLSTOREFRONT;


$model1=new TBLCOUNTRYMASTER;


$model2=new TBLGLOBAL;

$userId = Yii::app()->user->id;	


if(isset($_POST['TBLCOUNTRYMASTER']))
{
		$model2->GLOBAL_CART = $userId;
		$model2->COUNTRY_ID = $_POST['TBLCOUNTRYMASTER']['COUNTRY_NAME'];

		if($model2->save())
		{
			Yii::app()->user->setFlash('success',"country added Successfully");
		
		}
		 $this->redirect('assignstore');
		
		

}


	
	$userId = Yii::app()->user->id;	
	
	
/*	$sql="SELECT * FROM tbl_store_front  WHERE STORE_FRONT_ID=$userId";
	
							$connection = Yii::app()->db;                          //-------------without query builder-------------------
							$command = $connection->createCommand($sql);
							$result = $command->queryAll();
							
*/							
							
					                                                                // with query builder---------------------------------------
					
						$sql=Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_store_front')
						->where('STORE_FRONT_ID=:userId',array(':userId'=>$userId ))
						->queryAll();
					
						                                                             //without query builder
		/*
               $sqll="select DISTINCT tcm.COUNTRY_NAME,tg.COUNTRY_ID from tbl_global tg,tbl_country_master tcm
								where tg.COUNTRY_ID=tcm.COUNTRY_ID
								and tg.GLOBAL_CART=$userId";	
	
	                  $connection = Yii::app()->db;
							$command = $connection->createCommand($sqll);
							$result1 = $command->queryAll();		
							
					*/	                                                              //using query builder
						
						
						   $result1=Yii::app()->db->createCommand()
						 
						   ->selectDistinct('tcm.COUNTRY_NAME,tg.COUNTRY_ID')
						   ->from('tbl_global tg,tbl_country_master tcm')
						   ->where('tg.COUNTRY_ID=tcm.COUNTRY_ID and tg.GLOBAL_CART=:userid',array(':userid'=>$userId))
						   ->queryAll();
							
							
							
							
							
							
						/*
							$country= Yii::app()->db->createCommand()
						->select('COUNTRY_ID,COUNTRY_NAME')
						->from('tbl_country_master')
						->queryAll();
							
							*/
							
							$sql2="SELECT * FROM tbl_country_master 
							WHERE COUNTRY_ID NOT IN(SELECT COUNTRY_ID FROM tbl_global) 
							AND COUNTRY_ID NOT IN(SELECT COUNTRY_ID FROM tbl_store_front) 
							ORDER BY COUNTRY_NAME";
							
							$connection = Yii::app()->db;
							$command = $connection->createCommand($sql2);
							$country= $command->queryAll();		
							
							
							
							
							
							
							
							$this->render('assignstore',array(
			//'result'=>$result,
			'country'=>$country,
			'result1'=>	$result1,
			'model'=>$model,
			'model1'=>$model1,
			'model2'=>$model2,
			'sql'=>$sql,
			'$sqll'=>$sqll,
			
			));	
							
							
	
	}

public function actionTopsearch()
{
	$sql=Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_add_new_keyword')
						->queryAll();
						
						
	
	
	$this->render('topsearch',array(
	'sql'=>$sql,
	
	));
	
	}
	
	
	
	

public function actionDeletekeyword($id)
	{
		$keyword_id=$_GET['id'];
		
		//echo $keyword_id;
		//print_r($_POST);exit;
						
			$command=Yii::app()->db->createCommand()
			->delete('tbl_add_new_keyword', 'id=:id', array(':id'=>$keyword_id));


					if($command)
   					{
						Yii::app()->user->setFlash('success',"Keyword deleted Successfully");
					}
         
         $this->redirect('topsearch');

		
  }





	
	
	
	

public function actionAddnewkeyword()
{
     $model5=new TBLADDNEWKEYWORD;
	
	
	 if(isset($_POST['TBLADDNEWKEYWORD']))
				  {
				
				 $model5->attributes=$_POST['TBLADDNEWKEYWORD'];
				
								  if($model5->save())
								  {
								   Yii::app()->user->setFlash('success',"New keyword added!");
								  $this->redirect('topsearch');
								  	
								  }
				  }
	$this->render('addnewkeyword',array(
	'model5'=>$model5,

	));
	}

public function actionStorefile()
{
$userId = Yii::app()->user->id;	
	
	  $model=new TBLADDNEWKEYWORD;
     
	// print_r($_POST); exit;	
	/*
				  if(isset($_POST['TBLADDNEWKEYWORD']))
				  {
				 $model->attributes=$_POST['TBLADDNEWKEYWORD'];
				  
								  if($model->save())
								  {
								  $this->redirect('topsearch');
								  }
				
				
			}  */
	/*
	$keyWord = $_POST['User']['keyword'];
	
	
				$url     = $_POST['User']['url'];
			
				
				$selType  =$_POST['User']['seltype'];
			
				
				$storefront_id = $userId;
				$fontClass = $_POST['User']['fonttype'];
				
			
				$string = ltrim($keyWord)."=>".ltrim($url)."=>".$selType."=>".$fontClass."#\r\n";
				
					//$pathforgetcontact = explode(",",$GLOBALS['STORE_UPLOADS']);
			
	$model->keyword=	$keyWord;
	
	$model->url=	$url;
	
	$model->type= $selType ;
	
	$model->fontclass=	$fontClass ;
	
//print_r($model->attributes);exit;	
	

	
	if($model->save())
	{
		Yii::app()->user->setFlash('success',"File Store Successfully");
		 $this->redirect('topsearch');
	}
		
		*/ 
		
	
	
	}







	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		
		
		$country= Yii::app()->db->createCommand()
						->select('COUNTRY_ID,COUNTRY_NAME')
						->from('tbl_country_master')
						->queryAll();
						
			
			
	$courrency= Yii::app()->db->createCommand()
						->select('COUNTRY_ID,CURRENCY')
						->from('tbl_store_front')
						->queryAll();			
			
						//print_r($courrency);exit;
						

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TBLSTOREFRONT']))
		{
			$model->attributes=$_POST['TBLSTOREFRONT'];
			

			$model->image=CUploadedFile::getInstance($model,'image');
	
	//echo $model->image;exit;
			
			
			if($model->save())
			{
				if(isset($model->image) && $model->image!="")
				{
				
				if(!is_dir("images/uploadimage"))
														{
										
														 mkdir("images/uploadimage" , 0777);
														}
				$model->image->saveAs(Yii::app()->basePath . '/../images/uploadimage/' . $model->image);			
				
				}
				$this->redirect(array('view','id'=>$model->STORE_FRONT_ID));
			}
		}
														
														
													

		$this->render('update',array(
			'model'=>$model,
			'country'=>$country,
			'courrency'=>$courrency,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		
$model2=new TBLGLOBAL;
		
		
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
		$dataProvider=new CActiveDataProvider('TBLSTOREFRONT');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TBLSTOREFRONT('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TBLSTOREFRONT']))
			$model->attributes=$_GET['TBLSTOREFRONT'];

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
		$model=TBLSTOREFRONT::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tblstorefront-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionContenttype()
{
	
	$tblalbumtype=new TblAlbumTypes;
	//$TBLSTOREFRONTCONTENTPRICING=new TBLSTOREFRONTCONTENTPRICING;
	
	$result=Yii::app()->db->createCommand()
			->select('*')
			->from('tbl_album_types')
			->queryAll();
	

	   
	 
			$RATE='0.00';
			$TAXES='0.00';
			$FINAL_RATE='0.00';
			$size = count($_POST['TblAlbumTypes']);
			if(isset($_POST['TblAlbumTypes']))
			{
				for($i=1;$i<=$size;$i++)
				{
				
				}
			}
	 // print_r($result2);exit;
	
	 	$this->render('contenttype',array(
	 //	'result1'=>$result1,
	 	'tblalbumtype'=>$tblalbumtype,
	 	'result'=>$result,
	 	'TBLSTOREFRONTCONTENTPRICING'=>$TBLSTOREFRONTCONTENTPRICING,
	 	
	 	)); 			
	
	}
	
	
	public function actionUpdatestore()
	{
		$tblalbumtype=new TblAlbumTypes;
		
		
		$var=$_POST['TblAlbumTypes']['ALBUM_TYPE_ID'];
		//echo $var;exit;
		
		}	
	
	
	
	

	
	
	
	
	
	
	
}
