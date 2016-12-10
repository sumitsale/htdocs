<?php

class PackagesController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('admin','delete','show_on_site'),
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
		$model=new Packages;

		
		$category=Yii::app()->db->createCommand()
								->select('*')
								->from('category')
								->queryAll();
								
		$hotel=Yii::app()->db->createCommand()
								->select('*')
								->from('hotel')
								->queryAll();
										
										
		// echo "<pre>";
// print_r($category);exit;						
								
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Packages']))
		{
			$model->attributes=$_POST['Packages'];
			$model->date_added = date("Y-m-d H:i:s");
			$model->date_modified = date("Y-m-d H:i:s");
			$model->package_thumbnail = isset($_FILES['Packages']['name']['package_thumbnail']) && $_FILES['Packages']['name']['package_thumbnail']!=''  ? $_FILES['Packages']['name']['package_thumbnail'] : '';
			
			$model->key_feature 	= isset($_POST['key_feature']) && $_POST['key_feature']!='' ? $_POST['key_feature'] : '';
			
			
			if($model->category_id !='')
			{
				$category_name=Yii::app()->db->createCommand()
								->select('*')
								->from('category')
								->where('id=:id',array(':id'=>$model->category_id))
								->queryAll();
				if(count($category_name)>0)
				{
						$model->category_name  = $category_name[0]['category_name'];
				}
								
			}
			
			// echo "<pre>";
			// print_r($_POST);exit;
			
			
			
			if(isset($_POST['standard_package']))
			{
				$model->standard_package = implode(',',$_POST['standard_package']);
			}
			else
			{
				$model->standard_package = '';
			}
			
			
			if(isset($_POST['cost_saver']))
			{
				$model->cost_saver_package = implode(',',$_POST['cost_saver']);
			}
			else
			{
				$model->cost_saver_package = '';
			}
			
			if(isset($_POST['delux_package']))
			{
				$model->delux_package = implode(',',$_POST['delux_package']);
			}
			else
			{
				$model->delux_package = '';
			}
			
			// echo "<pre>";
			// print_r($model->attributes);Exit;
			
			if($model->save(false))
			{
			
				if($model->package_thumbnail !='')
				{
				if(!is_dir("images/package/"))
															{
											
															 mkdir("images/package/", 0777);
															}
															
					$model->package_thumbnail=CUploadedFile::getInstance($model,'package_thumbnail');
					$model->package_thumbnail->saveAs(Yii::app()->basePath . '/../../images/package/'. $model->package_thumbnail );			
						
					// $image = Yii::app()->image->load(Yii::app()->basePath . '/../../images/package/'. $model->package_thumbnail );			
					// $image->resize(247, 219);
					// $image->save();
					
						$image = new EasyImage(Yii::app()->basePath . '/../../images/package/'. $model->package_thumbnail );
						$image->resize(219, 259);
						$image->save(Yii::app()->basePath . '/../../images/package/'. $model->package_thumbnail );
				}
				$this->redirect(array('view','id'=>$model->id));
			}
				
		}

		$this->render('create',array(
			'model'=>$model,
			'category'=>$category,
			'hotel'=>$hotel,
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
		
		$package_thumbnail   = $model->package_thumbnail;
		
		
		
		$category=Yii::app()->db->createCommand()
								->select('*')
								->from('category')
								->queryAll();
		
		
			$hotel=Yii::app()->db->createCommand()
								->select('*')
								->from('hotel')
								->queryAll();
										
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Packages']))
		{
			$model->attributes=$_POST['Packages'];
			$model->date_modified = date("Y-m-d H:i:s");
			$model->package_thumbnail = isset($_FILES['Packages']['name']['package_thumbnail']) && $_FILES['Packages']['name']['package_thumbnail']!=''  ? $_FILES['Packages']['name']['package_thumbnail'] : $package_thumbnail;
			
			$model->key_feature 	= isset($_POST['key_feature']) && $_POST['key_feature']!='' ? $_POST['key_feature'] : '';
			
				
			if($model->category_id !='')
			{
				$category_name=Yii::app()->db->createCommand()
								->select('*')
								->from('category')
								->where('id=:id',array(':id'=>$model->category_id))
								->queryAll();
				if(count($category_name)>0)
				{
						$model->category_name  = $category_name[0]['category_name'];
				}
								
			}
			
			if(isset($_POST['standard_package']))
			{
				$model->standard_package = implode(',',$_POST['standard_package']);
			}
			else
			{
				$model->standard_package = '';
			}
			
			
			if(isset($_POST['cost_saver']))
			{
				$model->cost_saver_package = implode(',',$_POST['cost_saver']);
			}
			else
			{
				$model->cost_saver_package = '';
			}
			
			if(isset($_POST['delux_package']))
			{
				$model->delux_package = implode(',',$_POST['delux_package']);
			}
			else
			{
				$model->delux_package = '';
			}
			
			// echo "<pre>";
			// print_r($model->attributes);exit;
			
			
			if($model->save(false))
			{
			if($model->package_thumbnail !=''  && $model->package_thumbnail !=$package_thumbnail)
			{
			if(!is_dir("images/package/"))
														{
										
														 mkdir("images/package/", 0777);
														}
														
				$model->package_thumbnail=CUploadedFile::getInstance($model,'package_thumbnail');
				$model->package_thumbnail->saveAs(Yii::app()->basePath . '/../../images/package/'. $model->package_thumbnail );			
					
						$image = new EasyImage(Yii::app()->basePath . '/../../images/package/'. $model->package_thumbnail );
						$image->resize(219, 259);
						$image->save(Yii::app()->basePath . '/../../images/package/'. $model->package_thumbnail );
			}
			
				$this->redirect(array('view','id'=>$model->id));
				
				}
		}

		
		
		$this->render('update',array(
			'model'=>$model,
			'category'=>$category,
			'hotel'=>$hotel,
		));
	}
	
	public function actionShow_on_site()
	{
		// echo "<pre>";
		// print_r($_GET);exit;
		
		if(isset($_GET['value']) && $_GET['value']!='')
		{
			$value  ='';
			$message  ='';
			
			if($_GET['value'] == 'Show')
			{
				$value = "Hide";
				$message  ='Package Hide from Site successfully.';
			}
			else if($_GET['value'] == 'Hide')
			{
				$value = "Show";
				$message  ='Package show on Site successfully.';
				
				$packages=Yii::app()->db->createCommand()
								->select('*')
								->from('packages')
								->where('show_on_site=:value',array(':value'=>$value))
								->queryAll();
					
						if(count($packages)>=5)
						{
							Yii::app()->user->setFlash('success', "<h1>You can show only 5 packages on site.</h1>");
							$this->redirect(Yii::app()->homeUrl.'/Packages/admin');
						}
								
			}
			
			if($value != '' && $_GET['id'] !='')
			{
				$result = Yii::app()->db->createCommand()
					->update('packages', 
					array('show_on_site' =>$value,), 
					'id =:id', array(':id' => $_GET['id']));
					
					
					Yii::app()->user->setFlash('success', "<h1>".$message."</h1>");
					$this->redirect(Yii::app()->homeUrl.'/Packages/admin');
			}
			else
			{
				Yii::app()->user->setFlash('success', "<h1>Some thing went wrong.</h1>");
					$this->redirect(Yii::app()->homeUrl.'/Packages/admin');
			}
			
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Packages');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Packages('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Packages']))
			$model->attributes=$_GET['Packages'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Packages the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Packages::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Packages $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='packages-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
