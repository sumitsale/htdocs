<?php

class CommentsController extends Controller
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
				'actions'=>array('create','update','artist','statuschange','news','statuschangenews'),
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
		$model=new Comments;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Comments']))
		{
			$model->attributes=$_POST['Comments'];
			$model->indate=time();
			if($model->save())
				$this->redirect(array('view','id'=>$model->comment_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	
	
	public function actionArtist()
	{
	$id=0;
	if(isset($_POST['id']))
	{
	//print_r($_POST);exit;
	$id=$_POST['id'];
						
						/*For delete*/
						 $command=Yii::app()->db->createCommand()
						->update('tbl_aa_comments',
		   		        array('comment_status'=>'DL'),
		   		        'comment_id=:id',array(':id'=>$id));
						
						echo "200";exit;
	}
	
	
	
		 $result=Yii::app()->db->createCommand()
	       ->select('*')
				 ->from('tbl_aa_comments')
				 ->where('(comment_status=:sts1 or comment_status=:sts2) and type=:type',array(':sts1'=>'P',':sts2'=>'H',':type'=>'artist'))
				 ->queryAll();
		   
			 
			 $page_size =30;
		
		$criteria = new CDbCriteria();
																//code for pagination here
	    $item_count = count($result);
		  
		$pages = new CPagination($item_count);
        $pages->setPageSize($page_size);
        $pages->applyLimit($criteria);
		
		$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
		
		$sample =range($pages->offset+1, $end);	
		

		$this->render('list',array(
				'result'=>$result,
				'item_count'=>$item_count,
				'page_size'=>$page_size,
				'pages'=>$pages,
				'sample'=>$sample,
			
		));
	
	}
	

	public function actionNews()
	{
	$id=0;
	
	if(isset($_POST['id']))
	 {
	$id=$_POST['id'];
						
						/*For delete*/
						 $command=Yii::app()->db->createCommand()
						->update('tbl_aa_comments',
		   		        array('comment_status'=>'DL'),
		   		        'comment_id=:id',array(':id'=>$id));
						
						echo "200";exit;
	
	}
	
		 $result=Yii::app()->db->createCommand()
	       ->select('*')
				 ->from('tbl_aa_comments')
				 ->where('(comment_status=:sts1 or comment_status=:sts2) and type=:type',array(':sts1'=>'P',':sts2'=>'H',':type'=>'news'))
				 ->queryAll();
		   
		$page_size =15;
		
		$criteria = new CDbCriteria();
																//code for pagination here
	    $item_count = count($result);
		  
		$pages = new CPagination($item_count);
        $pages->setPageSize($page_size);
        $pages->applyLimit($criteria);
		
		$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
		
		$sample =range($pages->offset+1, $end);	
		

		$this->render('newslist',array(
				'result'=>$result,
				'item_count'=>$item_count,
				'page_size'=>$page_size,
				'pages'=>$pages,
				'sample'=>$sample,
		));
	
	}

	
	/*public function actionReview()
	{
	$id=0;
	if(isset($_POST['id']))
	{
	$id=$_POST['id'];
						
						//For delete
						 $command=Yii::app()->db->createCommand()
						->update('tbl_aa_comments',
		   		        array('comment_status'=>'DL'),
		   		        'comment_id=:id',array(':id'=>$id));
	}
	
	
		 $result=Yii::app()->db->createCommand()
	       ->select('*')
				 ->from('tbl_aa_comments')
				 ->where('(comment_status=:sts1 or comment_status=:sts2) and type=:type',array(':sts1'=>'P',':sts2'=>'H',':type'=>'review'))
				 ->queryAll();
		   
			 
			 $page_size =15;
		
		$criteria = new CDbCriteria();
																//code for pagination here
	    $item_count = count($result);
		  
		$pages = new CPagination($item_count);
        $pages->setPageSize($page_size);
        $pages->applyLimit($criteria);
		
		$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
		
		$sample =range($pages->offset+1, $end);	
		

		$this->render('reviewlist',array(
				'result'=>$result,
				'item_count'=>$item_count,
				'page_size'=>$page_size,
				'pages'=>$pages,
				'sample'=>$sample,
			
		));
	
	}*/
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
	
	
	//print_r($_POST);exit;
	$id=$_POST['id'];
	
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Comments']))
		{
		
	
		
		
			$model->attributes=$_POST['Comments'];
			if($model->save())
				{
				$this->redirect(array('list'));
				}
		}

		$this->render('_form',array(
			'model'=>$model,
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
						
						$post=Comments::model()->findByPk($id);
						
						//print_r($post->attributes);exit;
						
						$post->comment_status=$status;
						
						//echo $post->comment_status;exit;
						
						if($post->save())
						{
						echo "200";
						}
						else
						{
						echo "error";
						}
						
						
					}
					 //$this->refresh();
					//$this->redirect(array('artist'));
									 
				}
				
				
				
				
				
				
					public function actionStatuschangenews()
				{
				
				
					// print_r($_POST);exit;
				
				
					if(isset($_POST['status']) && $_POST['status']=='P'){
						$status='H';
					}else{
		
						$status='P';
					}
				
					//echo $status;exit;
					
					if(isset($_POST['id']) && $_POST['id']!='')
					{
					
							$id= $_POST['id'];
						
						$post=Comments::model()->findByPk($id);
						
						//print_r($post->attributes);exit;
						
						$post->comment_status=$status;
						
						//echo $post->comment_status;exit;
						
						if($post->save())
						{
						echo "200";
						}
						else
						{
						echo "error";
						}
					}
					
					//$this->redirect(array('news'));
									 
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
		$dataProvider=new CActiveDataProvider('Comments');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Comments('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Comments']))
			$model->attributes=$_GET['Comments'];

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
		$model=Comments::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='comments-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
