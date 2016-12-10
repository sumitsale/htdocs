<?php

class TblCategoryDetailsController extends Controller
{
	public $model;
    public $model1;
	
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
				'actions'=>array('create','update','category','categoryadd','statuschange','categoryedit'),
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
	
	public function actionCategory()
	 {
	 $model=new TblCategoryDetails;
	 $model1=new TblCategory;
	 
	
	$parent_id	= $_GET['parent_id'];
	$catid = $_GET['catid'];
	
	if(!$parent_id){
		$parent_id=0;		
	}
	if(!$catid){
		$catid=0;		
	}
	
	 $result=Yii::app()->db->createCommand()
						->select('a.CATEGORY,b.*,c.*')
						->from('tbl_category a')
						->join('tbl_category_details b', 'a.CATEGORY_ID=b.CATEGORY_ID')
						->join('tbl_album_types c', 'b.CONTENT_TYPE_ID=c.ALBUM_TYPE_ID')
						->where('b.PARENT_ID=:id and b.STORE_FRONT_ID=:id1',array(':id'=>$parent_id,':id1'=>STORE_FRONT_ID))
						->order('b.CONTENT_TYPE_ID,b.PRIORITY,a.CATEGORY')
						->queryAll();
	 
	/*
	 $query = "select a.CATEGORY,b.*,c.* from tbl_category a,tbl_category_details b,tbl_album_types c where a.CATEGORY_ID=b.CATEGORY_ID and b.CONTENT_TYPE_ID=c.ALBUM_TYPE_ID and b.PARENT_ID='".$parent_id."' and b.STORE_FRONT_ID='1' order by b.CONTENT_TYPE_ID,b.PRIORITY,a.CATEGORY";
	
							$connection = Yii::app()->db;
							$command = $connection->createCommand($query);
							$result = $command->queryAll();	
	 */
	//print_r($result);
	 
	 
	 $this->render('category',array(
			'model'=>$model,
			'model1'=>$model1,
			'result'=>$result,
			'parent_id'=>$parent_id,
			'catid'=>$catid,
			));
	 
	 }
	
	public function actionCategoryAdd()
	 {
	 $model=new TblCategoryDetails;
	 $model1=new TblCategory;
	 $model2=new TblAlbumTypes;
	 $model3=new TblLanguages;
	 
	 $content=Yii::app()->db->createCommand()
	       ->select('ALBUM_TYPE_ID,ALBUM_TYPE_NAME')
		   ->from('tbl_album_types')
		   ->queryAll();
	 
	 $language=Yii::app()->db->createCommand()
	       ->select('LANGUAGE_ID,LANGUAGE_TITLE')
		   ->from('tbl_languages')
		   ->queryAll();
	 
		if(isset($_GET['parent_id']) && $_GET['parent_id']!="")
		{
			$parent_id = $_GET['parent_id'];
		}
		else
		{
			$parent_id = 0;
		}
		if(isset($_GET['catid']) && $_GET['catid']!="")
		{
			$catid = $_GET['catid'];
		}
		else
		{
			$catid = 0;
		}
		if(isset($_POST['TblCategoryDetails']))
		{	
			$cat_created_date	=	time(); 
			$cat=$_POST['TblCategory']['CATEGORY'];
			$model1->CATEGORY=$cat;
			
			if($model1->save())
				{
					$highest_id = $model1->primaryKey;
				}
			
			
			$model->attributes=$_POST['TblCategoryDetails'];
			if(count($_POST['TblCategoryDetails']['CATEGORY_LANGUAGE_ID'])>0)
			{
			$str = implode(',',$_POST['TblCategoryDetails']['CATEGORY_LANGUAGE_ID']);
			$model->CATEGORY_LANGUAGE_ID = $str;
			}
			$model->LAST_UPDATED_ON=$cat_created_date;
			$model->STORE_FRONT_ID=1;
			$model->CATEGORY_ID=$highest_id;
			
			$model->PARENT_ID = $parent_id;
			$model->THEME_IMAGE=CUploadedFile::getInstance($model,'THEME_IMAGE');
			
            if($model->save())
            {
			$img_name = $_FILES['TblCategoryDetails']['name']['THEME_IMAGE'];
				if(isset($img_name) && $img_name!="")
				{			
			$model->THEME_IMAGE->saveAs(Yii::app()->basePath . '/../images/'.$_FILES['TblCategoryDetails']['name']['THEME_IMAGE']);
				}
			Yii::app()->user->setFlash('success',"Category Added Successfully");	
			$this->redirect(array('category?parent_id='.$parent_id.'&catid='.$catid));
                // redirect to success page
            }

		}
	 
	 
	 
	 
	 $this->render('categoryadd',array(
			'model'=>$model,
			'model1'=>$model1,
			'model2'=>$model2,
			'model3'=>$model3,
			'content'=>$content,
			'language'=>$language,
			));
	 
	 }
	
	
	public function actionCategoryEdit()
	 {
		$model=new TblCategoryDetails;
		$model1=new TblCategory;
		$model2=new TblAlbumTypes;
		$model3=new TblLanguages;
	 
	 $id = $_REQUEST['catid1'];
	 $id1 = $_REQUEST['catid2'];
	 
	 $parent_id = $_GET['parent_id'];
	$catid = $_GET['catid'];
	//$cat=$_REQUEST['TblCategoryDetails']['CATEGORY_ID'];
	 
	 $content=Yii::app()->db->createCommand()
	       ->select('ALBUM_TYPE_ID,ALBUM_TYPE_NAME')
		   ->from('tbl_album_types')
		   ->queryAll();
	 
	 $language=Yii::app()->db->createCommand()
	       ->select('LANGUAGE_ID,LANGUAGE_TITLE')
		   ->from('tbl_languages')
		   ->queryAll();
	
	
	$row=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_category_details u')
								->join('tbl_category p', 'u.CATEGORY_ID=p.CATEGORY_ID')
								->where('u.CATEGORY_DETAILS_ID=:id',array(':id'=>$id))
								->queryRow();
			
	
	$model=$this->loadModel($id);
	$model1=$this->loadModel1($id1);
	if(isset($_POST['TblCategoryDetails']))
		{
		
			$model->attributes=$_POST['TblCategoryDetails'];
			$model->THEME_IMAGE=CUploadedFile::getInstance($model,'THEME_IMAGE');
			if($model->save())
			{
			$img_name = $_FILES['TblCategoryDetails']['name']['THEME_IMAGE'];
				if(isset($img_name) && $img_name!="")
				{			
			$model->THEME_IMAGE->saveAs(Yii::app()->basePath . '/../images/'.$_FILES['TblCategoryDetails']['name']['THEME_IMAGE']);
				}
			}
			$model1->CATEGORY=$_POST['TblCategory']['CATEGORY'];
			
			$model1->save();
			
				Yii::app()->user->setFlash('success',"Category Updated Successfully");	
			$this->redirect(array('category?parent_id='.$parent_id.'&catid='.$catid));			
					
			
		}
			
	$this->render('categoryedit',array(
			'model'=>$model,
			'model1'=>$model1,
			'model2'=>$model2,
			'model3'=>$model3,
			'content'=>$content,
			'language'=>$language,
			'id'=>$id,
			'row'=>$row,
			
			));
			
	}
	
	
	public function actionStatuschange()
	{
	
	$parent_id = $_GET['parent_id'];
	$catid = $_GET['catid'];
	
	
		if(isset($_GET['status']) && $_GET['status']==1){
			$status=0;
		}else{
			$status=1;
		}
		if(isset($_GET['catedetails_id']) && $_GET['catedetails_id']!=''){
		
				$catedetails_id= $_GET['catedetails_id'];
				
			$post=TblCategoryDetails::model()->findByPk($catedetails_id);
			$post->STATUS=$status;
			$post->save();
		}
		
		$this->redirect(array('category?parent_id='.$parent_id.'&catid='.$catid));
						 
		
	
	}
	
	

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TblCategoryDetails;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblCategoryDetails']))
		{
			$model->attributes=$_POST['TblCategoryDetails'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->CATEGORY_DETAILS_ID));
		}

		$this->render('create',array(
			'model'=>$model,
			'model1'=>$model1,
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

		if(isset($_POST['TblCategoryDetails']))
		{
			$model->attributes=$_POST['TblCategoryDetails'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->CATEGORY_DETAILS_ID));
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
		$dataProvider=new CActiveDataProvider('TblCategoryDetails');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblCategoryDetails('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblCategoryDetails']))
			$model->attributes=$_GET['TblCategoryDetails'];

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
		$model=TblCategoryDetails::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function loadModel1($id)
	{
		$model=TblCategory::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-category-details-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
