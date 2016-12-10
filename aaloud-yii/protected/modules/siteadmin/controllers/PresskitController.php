<?php

class PresskitController extends Controller
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
				'actions'=>array('create','update','Presslist','statuschange'),
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
		$model=new model_presskit;
		
		$artistname=Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_aa_artist')
						->where('Artist_Status=:id1 or Artist_Status=:id2',array(':id1'=>P,':id2'=>H ))
						->queryAll();
		
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['model_presskit']))
		{
			$model->attributes=$_POST['model_presskit'];

			$bfile_name=$_FILES['model_presskit']['name']['Pdf_File'];
			$model->Pdf_File=$bfile_name;
			$model->Press_Kit_Indate=time();
			$model->Press_Kit_Status='P';
			/*
			$ext =explode('.', $bfile_name);
			
			$ext = strtolower($ext[count($ext)-1]);
			
			$highest_id = Yii::app()->db->createCommand()
  				->select('max(Press_Kit_Id) as max')
  				->from('tbl_aa_presskit')
  				->queryScalar();
			
			$highest_id=$highest_id+1;
			$model->Pdf_File=$highest_id.".".$ext;
			
			$tmp_name=$model->Pdf_File;
			
			*/
			//$model->Pdf_File=CUploadedFile::getInstance($model,'Pdf_File');
			
			
			//print_r($model->attributes);exit;
			if($model->save())
			{
					
					
					
					
			$ext =explode('.', $bfile_name);
			
			$ext = strtolower($ext[count($ext)-1]);
			
			$highest_id = Yii::app()->db->createCommand()
  				->select('max(Press_Kit_Id) as max')
  				->from('tbl_aa_presskit')
  				->queryScalar();
			
			
			$model->Pdf_File=$highest_id.".".$ext;
			
			$tmp_name=$model->Pdf_File;
					
					$model->save();
					
					
					
						if(isset($model->Pdf_File) && $model->Pdf_File!="")
					{
					if(!is_dir("images/presskit/".$highest_id))
														{
										
														 mkdir("images/presskit/".$highest_id , 0777);
														}
														
				$model->Pdf_File=CUploadedFile::getInstance($model,'Pdf_File');
				$model->Pdf_File->saveAs(Yii::app()->basePath . '/../images/presskit/'.$highest_id.'/' .  $highest_id.".".$ext);			
					}
					
			
				$this->redirect(array('presslist'));
				}
		}

		$this->render('create',array(
			'model'=>$model,
			'artistname'=>$artistname,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
	$id=$_POST[id];
	
		$model=$this->loadModel($id);
		$existing_name = $model->Pdf_File;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
			/*
			$artistname=Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_aa_artist')
						->where('Artist_Status=:id1 or Artist_Status=:id2',array(':id1'=>P,':id2'=>H ))
						->queryAll();
			*/
		
		$artistname= 	Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_aa_artist',
						array('in', 'Artist_Status', 
						array('P','H')))
						->queryAll();

		if(isset($_POST['model_presskit']))
		{
			$model->attributes=$_POST['model_presskit'];
			$bfile_name=$_FILES['model_presskit']['name']['Pdf_File'];
			
			if(isset($bfile_name) && $bfile_name!='')
			{
			
				$ext =explode('.', $bfile_name);
				
				$ext = strtolower($ext[count($ext)-1]);
				
				$model->Pdf_File=$id.".".$ext;
		
			}
			else 
			{ 
				$model->Pdf_File=$existing_name;
			
			}
			
			if($model->save())
			{
		
				
			
			$tmp_name=$model->Pdf_File;
				
				if(isset($bfile_name) && $bfile_name!="")
				{
					if(!is_dir("images/presskit/".$id))
														{
										
														 mkdir("images/presskit/".$id , 0777);
														}
														
				$model->Pdf_File=CUploadedFile::getInstance($model,'Pdf_File');
				$model->Pdf_File->saveAs(Yii::app()->basePath . '/../images/presskit/'.$id.'/' . $id.".".$ext);			
					
				}
			
		
				$this->redirect(array('presslist'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'artistname'=>$artistname,
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
		$dataProvider=new CActiveDataProvider('model_presskit');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new model_presskit('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['model_presskit']))
			$model->attributes=$_GET['model_presskit'];

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
		$model=model_presskit::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='model-presskit-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionPresslist()
	{
	
	/*
			$artistname=Yii::app()->db->createCommand()
						->select('a.*,b.Artist_Name')
						->from('bl_aa_presskit a,tbl_aa_artist b')
						->where(' a.Artist_Id=b.Artist_Id and and Press_Kit_Status!=DL')
						->order('Press_Kit_Id')
						->queryAll();
						
	*/				
	
	
						$id=$_POST['id'];
						//echo $id;
						
						
						
						 $command=Yii::app()->db->createCommand()
						->update('tbl_aa_presskit',
		   		        array('Press_Kit_Status'=>'DL'),
		   		        'Press_Kit_Id=:id',array(':id'=>$id));
	
			
			
						$model=new model_presskit;
						
						/*
						$sql="select a.*,b.Artist_Name from tbl_aa_presskit a,tbl_aa_artist b Where a.Artist_Id=b.Artist_Id and Press_Kit_Status!='DL' order by Press_Kit_Id desc";
	
							$connection = Yii::app()->db;                          //-------------without query builder-------------------
							$command = $connection->createCommand($sql);
							$result = $command->queryAll();
						*/
							
							
						$result= 	Yii::app()->db->createCommand()
						->select('a.*,b.Artist_Name')
						->from('tbl_aa_presskit a')
						->join('tbl_aa_artist b','a.Artist_Id=b.Artist_Id')
						->where('Press_Kit_Status!=:id',array(':id'=>'DL'))
						->order('Press_Kit_Id desc')
						->queryAll();	
						
						
						//////////////////////////////////////////////////////edit on 18-11-2011
						
						
						
							$page_size =15;
		
							$criteria = new CDbCriteria();
																					//code for pagination here
							$item_count = count($result);
							  
							$pages = new CPagination($item_count);
							$pages->setPageSize($page_size);
							$pages->applyLimit($criteria);
							
							$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
							
							$sample =range($pages->offset+1, $end);	
		   
						
						
						
						
						//////////////////////////////////////////////////////
							
							
							
							//print_r($result);exit;
							
						$this->render('presskitlist',array(
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
			$post=model_presskit::model()->findByPk($id);
			$post->Press_Kit_Status=$status;
			$post->save();
		}
		
		$this->redirect(array('presslist'));
						 
	}
	

}
