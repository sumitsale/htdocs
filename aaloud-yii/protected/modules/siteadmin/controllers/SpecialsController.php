<?php

class SpecialsController extends Controller
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
				'actions'=>array('create','update','specialslist','del'),
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
		$model=new TblSpecials;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblSpecials']))
		{
		
			//print_r($_POST);exit;
			
	
				$model->attributes=$_POST['TblSpecials'];
				$model->indate = time();
					
				$bfile_name=$_FILES['TblSpecials']['name']['special_image'];
		
				$model->special_image=$bfile_name;
				
			

			if($model->save())
			{
			
			
			$ext =explode('.', $bfile_name);
			
			$ext = strtolower($ext[count($ext)-1]);
			
			$highest_id = $model->primaryKey;
			
			$model->special_image=$highest_id.".".$ext;
			
			$model->save();
			
			if(isset($bfile_name) && $bfile_name!="")
				{
			
			if(!is_dir("images/specials/"))
														{
										
														 mkdir("images/specials/", 0777);
														}
														
				$model->special_image=CUploadedFile::getInstance($model,'special_image');
				$model->special_image->saveAs(Yii::app()->basePath . '/../images/specials/'.  $highest_id.".".$ext);			
					
				$image = Yii::app()->image->load(Yii::app()->basePath . '/../images/specials/'.  $highest_id.".".$ext);			
                $image->resize(120, 120);
                $image->save();
				}
				
			Yii::app()->user->setFlash('success',"Specials Added Successfully");
			
				$this->redirect(array('specialslist'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	
	public function actionSpecialslist()
	{
	
		if($_POST)
		{
		$id=$_POST['id'];
		}			
		//$model=new TblSpecials;
		
		$result=Yii::app()->db->createCommand()
	       ->select('*')
		   ->from('tbl_specials')
		   ->order('indate desc')
		   ->queryAll();
							
		   ///////////////////////////////////////pagination
		   
		
						$page_size =10;
		
						$criteria = new CDbCriteria();
																				
						$item_count = count($result);
						  
						$pages = new CPagination($item_count);
						$pages->setPageSize($page_size);
						$pages->applyLimit($criteria);
						
						$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
						
						$sample =range($pages->offset+1, $end);
		   
		   //print_r($sample);exit;
		   
		   ///////////////////////////////////////
		   
		
		$this->render('specialslist',array(
			'result'=>$result,
			'item_count'=>$item_count,
            'page_size'=>$page_size,
            'pages'=>$pages,
			'sample'=>$sample,
		));
	
	}
	
	
	public function actionDel()
		{
			$model=new TblSpecials;
	
			$spec_id=$_POST['id'];
	
			$command=Yii::app()->db->createCommand()
				->delete('tbl_specials', 'special_id=:id', array(':id'=>$spec_id));
	
			if($command)
			{
			Yii::app()->user->setFlash('success',"Specials Deleted Successfully");
			}
				$this->redirect('specialslist');
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
		
		$existing_name = $model->special_image;

		$row=Yii::app()->db->createCommand()
								->select('*')
								->from('tbl_specials')
								->where('special_id=:id',array(':id'=>$id))
								->queryRow();
		
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblSpecials']) && $_POST['TblSpecials']!='')
		{
				$model->attributes=$_POST['TblSpecials'];
							
			$bfile_name=$_FILES['TblSpecials']['name']['special_image'];

			if(isset($bfile_name) && $bfile_name!='')
			{
				
			$ext =explode('.', $bfile_name);
			
			$ext = strtolower($ext[count($ext)-1]);
			
			$model->special_image=$id.".".$ext;
			}
			
			else
				{
				$model->special_image=$existing_name;
				}
			
			if($model->save())
			{
		
				if(isset($bfile_name) && $bfile_name!="")
				{
				
				if(!is_dir("images/specials/"))
								{
											
								mkdir("images/specials/", 0777);
								}							
															
					$model->special_image=CUploadedFile::getInstance($model,'special_image');
					$model->special_image->saveAs(Yii::app()->basePath . '/../images/specials/'.  $id.".".$ext);		

					$image = Yii::app()->image->load(Yii::app()->basePath . '/../images/specials/'.  $id.".".$ext);			
					$image->resize(120, 120);
					$image->save();
				}		
				Yii::app()->user->setFlash('success',"Specials Updated Successfully");
					$this->redirect(array('specialslist'));
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
		$dataProvider=new CActiveDataProvider('TblSpecials');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblSpecials('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblSpecials']))
			$model->attributes=$_GET['TblSpecials'];

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
		$model=TblSpecials::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-specials-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
