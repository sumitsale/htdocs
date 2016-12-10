<?php

class BlogsController extends Controller
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
				'actions'=>array('create','update','bloglist','statuschange'),
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
		$model=new ArtistaloudBlog;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ArtistaloudBlog']))
		{
		
			//print_r($_POST);exit;
			
	
				$model->attributes=$_POST['ArtistaloudBlog'];
					
				$bfile_name=$_FILES['ArtistaloudBlog']['name']['blog_image'];	
				$model->blog_image=$bfile_name;
				
			

			if($model->save())
			{
			
			
			$ext =explode('.', $bfile_name);
			
			$ext = strtolower($ext[count($ext)-1]);
			
			$highest_id = $model->primaryKey;
			
			$model->blog_image=$highest_id.".".$ext;
			
			$model->save();
			
			if(isset($bfile_name) && $bfile_name!="")
				{
			
			if(!is_dir("images/blogs/"))
														{
										
														 mkdir("images/blogs/", 0777);
														}
														
				$model->blog_image=CUploadedFile::getInstance($model,'blog_image');
				$model->blog_image->saveAs(Yii::app()->basePath . '/../images/blogs/'.  $highest_id.".".$ext);			
					
				$image = Yii::app()->image->load(Yii::app()->basePath . '/../images/blogs/'.  $highest_id.".".$ext);			
                $image->resize(80, 80);
                $image->save();
				}
				
			Yii::app()->user->setFlash('success',"Blog Added Successfully");
			
				$this->redirect(array('bloglist'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	
	
	public function actionBlogList()
	{
	
	if($_POST)
	{
		$id=$_POST['id'];
						
		 $command=Yii::app()->db->createCommand()
						->update('artistaloud_blog',
		   		        array('blog_status'=>'DL'),
		   		        'id=:id',array(':id'=>$id));				
						
	}
	
		$model=new ArtistaloudBlog;
		
		 $result=Yii::app()->db->createCommand()
	       ->select('*')
		   ->from('artistaloud_blog')
		   ->where('blog_status!=:id',array(':id'=>'DL'))
		   ->order('date desc')
		   ->queryAll();
		
		//print_r($result);exit;
		
			///////////////////////////////////////////////////////////////////code for pagination
						$page_size =5;
		
						$criteria = new CDbCriteria();
																				
						$item_count = count($result);
						  
						$pages = new CPagination($item_count);
						$pages->setPageSize($page_size);
						$pages->applyLimit($criteria);
						
						$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
						
						$sample =range($pages->offset+1, $end);
						
		
		//////////////////////////////////////////////////////////////////	
		
		
		$this->render('bloglist',array(
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
		if(isset($_POST['id']) && $_POST['id']!='')
		{
				$id= $_POST['id'];
			$post=ArtistaloudBlog::model()->findByPk($id);
			$post->blog_status=$status;
			$post->save();
		}
		
		$this->redirect(array('bloglist'));
						 
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
		
		$existing_name = $model->blog_image;

		$row=Yii::app()->db->createCommand()
								->select('*')
								->from('artistaloud_blog')
								->where('id=:id',array(':id'=>$id))
								->queryRow();
		
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ArtistaloudBlog']) && $_POST['ArtistaloudBlog']!='')
		{
				$model->attributes=$_POST['ArtistaloudBlog'];
					
			$bfile_name=$_FILES['ArtistaloudBlog']['name']['blog_image'];

			if(isset($bfile_name) && $bfile_name!='')
			{
				
			$ext =explode('.', $bfile_name);
			
			$ext = strtolower($ext[count($ext)-1]);
			
			$model->blog_image=$id.".".$ext;
			}
			
			else
				{
				$model->blog_image=$existing_name;
				}
			
			if($model->save())
			{
		
				if(isset($bfile_name) && $bfile_name!="")
				{
				
				if(!is_dir("images/blogs/"))
								{
											
								mkdir("images/blogs/", 0777);
								}							
															
					$model->blog_image=CUploadedFile::getInstance($model,'blog_image');
					$model->blog_image->saveAs(Yii::app()->basePath . '/../images/blogs/'.  $id.".".$ext);		

					$image = Yii::app()->image->load(Yii::app()->basePath . '/../images/blogs/'.  $id.".".$ext);			
					$image->resize(80, 80);
					$image->save();
				}		
				Yii::app()->user->setFlash('success',"Blog Updated Successfully");
					$this->redirect(array('bloglist'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'row'=>$row,
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
		$dataProvider=new CActiveDataProvider('ArtistaloudBlog');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ArtistaloudBlog('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ArtistaloudBlog']))
			$model->attributes=$_GET['ArtistaloudBlog'];

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
		$model=ArtistaloudBlog::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='artistaloud-blog-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
