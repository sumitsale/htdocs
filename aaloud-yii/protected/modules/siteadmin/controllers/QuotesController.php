<?php

class QuotesController extends Controller
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
				'actions'=>array('create','update','quoteslist','statuschange'),
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
		$model=new TblAaQuote;

		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		
		if(isset($_POST['TblAaQuote']))
		{
	
			//print_r($_POST);exit;
		
				$model->attributes=$_POST['TblAaQuote'];
					
				$bfile_name=$_FILES['TblAaQuote']['name']['Quote_Image'];	
				$model->Quote_Image=$bfile_name;
				$model->Quote_LastUpdate=time();
			
			if($model->save())
			{
				$ext =explode('.', $bfile_name);
			
				$ext = strtolower($ext[count($ext)-1]);
			
				$highest_id = $model->primaryKey;
			
				$model->Quote_Image=$highest_id.".".$ext;
			
				if(isset($bfile_name) && $bfile_name!="")
				{
			
					if(!is_dir("images/quotes/"))
															{
											
															 mkdir("images/quotes/", 0777);
															}
															
					$model->Quote_Image=CUploadedFile::getInstance($model,'Quote_Image');
					$model->Quote_Image->saveAs(Yii::app()->basePath . '/../images/quotes/'.  $highest_id.".".$ext);			
						
					$image = Yii::app()->image->load(Yii::app()->basePath . '/../images/quotes/'.  $highest_id.".".$ext);			
					$image->resize(80, 80);
					$image->save();
				}
			
			Yii::app()->user->setFlash('success',"Quotes Added Successfully");	
				$this->redirect(array('quoteslist'));
			}
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
	public function actionUpdate()
	{
	
		$id=$_POST['id'];
		$model=$this->loadModel($id);
		$existing_name = $model->Quote_Image;
		
		
		
		$row=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_aa_quote')
								->where('Quote_Id=:id',array(':id'=>$id))
								->queryRow();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblAaQuote']))
		{
			$model->attributes=$_POST['TblAaQuote'];
			$model->Quote_LastUpdate=time();
				
			$bfile_name=$_FILES['TblAaQuote']['name']['Quote_Image'];

				if(isset($bfile_name) && $bfile_name!='')
				{
				$ext =explode('.', $bfile_name);
				
				$ext = strtolower($ext[count($ext)-1]);
				
				$model->Quote_Image=$id.".".$ext;
				}
				
				else
				{
				$model->Quote_Image=$existing_name;
				}

			if($model->save())
			{
			
				if(isset($bfile_name) && $bfile_name!="")
				{
				
				if(!is_dir("images/quotes/"))
								{
											
								mkdir("images/quotes/", 0777);
								}							
															
					$model->Quote_Image=CUploadedFile::getInstance($model,'Quote_Image');
					$model->Quote_Image->saveAs(Yii::app()->basePath . '/../images/quotes/'.  $id.".".$ext);		

					$image = Yii::app()->image->load(Yii::app()->basePath . '/../images/quotes/'.  $id.".".$ext);			
					$image->resize(80, 80);
					$image->save();
				}		
				
					Yii::app()->user->setFlash('success',"Quotes Updated Successfully");	
					
					$this->redirect(array('quoteslist'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'row'=>$row,
			'id'=>$id,
		));
	}

	
	
	public function actionQuotesList()
	{
	
		$id=$_POST['id'];
						
		 $command=Yii::app()->db->createCommand()
						->update('tbl_aa_quote',
		   		        array('Quote_Status'=>DL),
		   		        'Quote_Id=:id',array(':id'=>$id));				
						
	
	
		$model=new TblAaQuote;
		
		/*
		$sql= "select * from tbl_aa_quote Where Quote_Status!='DL' order by Quote_Id desc";
	
							$connection = Yii::app()->db; 
							$command = $connection->createCommand($sql);
							$result = $command->queryAll();
		*/
				
		 $result=Yii::app()->db->createCommand()
	       ->select('*')
		   ->from('tbl_aa_quote')
		   ->where('Quote_Status!=:id',array(':id'=>DL))
		   ->order('Quote_Id desc')
		   ->queryAll();
		
		//print_r($result);exit;
		
		
		///////////////////////////////////////////////////////code for pagination here
		
						$page_size =5;
		
						$criteria = new CDbCriteria();
																				
						$item_count = count($result);
						  
						$pages = new CPagination($item_count);
						$pages->setPageSize($page_size);
						$pages->applyLimit($criteria);
						
						$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
						
						$sample =range($pages->offset+1, $end);
		
	
		
		//////////////////////////////////////////////////////////
		
		
		
		$this->render('quoteslist',array(
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
			$post=TblAaQuote::model()->findByPk($id);
			$post->Quote_Status=$status;
			$post->save();
		}
		
		$this->redirect(array('quoteslist'));
						 
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
		$dataProvider=new CActiveDataProvider('TblAaQuote');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblAaQuote('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblAaQuote']))
			$model->attributes=$_GET['TblAaQuote'];

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
		$model=TblAaQuote::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-aa-quote-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
