<?php

class ProductBrandController extends Controller
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
				'actions'=>array('admin','delete','deletethumbnail'),
				'users'=>array('admin','admin1'),
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

	public function actionDeletethumbnail()
	{
		
		$id					= $_POST['id'];
		$thumbnail_id		= $_POST['thumbnail_id'];
		
		$result =Yii::app()->db->createCommand()
								->select('*')
								->from('product_brand')
								->where('id=:id',array(':id'=>$id))
								->queryAll();
								
			if(count($result)>0)
			{
				$thumbnail_big		 = json_decode($result[0]['thumbnail_big'],true);
				
				
				
				unset($thumbnail_big[$thumbnail_id]);
				
				
				
				// echo "<pre>";
				// print_r(($thumbnail_big));
				// print_r(array_values($thumbnail_big));exit;
				
				$result1 = Yii::app()->db->createCommand()
							->update('product_brand', 
								array('thumbnail_big' =>json_encode(array_values($thumbnail_big))
									), 
								'id =:id', array(':id' => $result[0]['id']));
				
			}
										
		echo 200;
	
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ProductBrand;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$master_category = Yii::app()->db->createCommand()
								->select('id,name')
								->from('category_master')
								->order('name')
								->queryAll();
								
		$master_brand = Yii::app()->db->createCommand()
								->select('id,name')
								->from('brand_master')
								->order('name')
								->queryAll();

		if(isset($_POST['ProductBrand']))
		{
			// // $model->attributes=$_POST['ProductBrand'];
			
			// echo "<pre>";
			// print_r($_POST);
			// print_r($_FILES);exit;
			
		$model->product_name 			= isset($_POST['product_name']) ? $_POST['product_name']:'';
		$model->available 				= isset($_POST['available']) ? $_POST['available']:'';
		$model->rating 					= isset($_POST['rating']) ? $_POST['rating']:'';
		$model->master_category_id 		= isset($_POST['ProductBrand']['master_category_id']) ? $_POST['ProductBrand']['master_category_id']:'';
		$model->master_brand_id 		= isset($_POST['ProductBrand']['master_brand_id']) ? $_POST['ProductBrand']['master_brand_id']:'';
		$model->rating 					= isset($_POST['rating']) ? $_POST['rating']:'';
		$model->thumbnail 				= isset($_FILES['thumbnail']['name']) ? $_FILES['thumbnail']['name'] : '';
			
			if($model->master_category_id !='')
			{
					$master_cat = Yii::app()->db->createCommand()
								->select('name')
								->from('category_master')
								->where('id=:id',array(':id'=>$model->master_category_id ))
								->queryAll();
			
			
				$model->master_category_name = $master_cat[0]['name'];
			}
			else
			{
				$model->master_category_name ='';
			}
			
				if($model->master_brand_id !='')
			{
					$master_brands = Yii::app()->db->createCommand()
								->select('name')
								->from('brand_master')
								->where('id=:id',array(':id'=>$model->master_brand_id ))
								->queryAll();
			
			
				$model->master_brand_name = $master_brands[0]['name'];
			}
			else
			{
				$model->master_brand_name ='';
			}
			
			
			if($model->thumbnail!='')
			{
				move_uploaded_file($_FILES['thumbnail']['tmp_name'],Yii::app()->basePath  . '/../../images/productbrand/thumbnail/'. $model->thumbnail);
				
				$resize = new ResizeImage(Yii::app()->basePath  . '/../../images/productbrand/thumbnail/'. $model->thumbnail);
				$resize->resizeTo(206, 205, 'exact');
				$resize->saveImage(Yii::app()->basePath  . '/../../images/productbrand/thumbnail/'. $model->thumbnail);
				
			}
			
			$thumbnail_big_array    = array();
			
			if(isset($_FILES['thumbnail_big_1']['name']) && $_FILES['thumbnail_big_1']['name']!='')
			{
				for($i=0;$i<15;$i++)
				{
					if(isset($_FILES['thumbnail_big_'.$i]['name'])  && $_FILES['thumbnail_big_'.$i]['name']!='' )
					{
						
						$thumbnail_big_array[] = $_FILES['thumbnail_big_'.$i]['name'];
						
						move_uploaded_file($_FILES['thumbnail_big_'.$i]['tmp_name'],Yii::app()->basePath  . '/../../images/productbrand/big_thumbnail/'. $_FILES['thumbnail_big_'.$i]['name']);
				
						$resize = new ResizeImage(Yii::app()->basePath  . '/../../images/productbrand/big_thumbnail/'. $_FILES['thumbnail_big_'.$i]['name']);
						$resize->resizeTo(904, 768, 'exact');
						$resize->saveImage(Yii::app()->basePath  . '/../../images/productbrand/big_thumbnail/'. $_FILES['thumbnail_big_'.$i]['name']);
						
					
					}
					
					
				}
				
				
			}
			
			$model->thumbnail_big	= json_encode($thumbnail_big_array);
			$model->date_added		= date("Y-m-d H:i:s",time());
			$model->date_modified	= date("Y-m-d H:i:s",time());
			
			// echo "<pre>";
			// print_r($model->attributes);exit;
			
			if($model->save(false))
				// $this->redirect(array('view','id'=>$model->id));
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
			'master_category'=>$master_category,
			'master_brand'=>$master_brand,
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
		$thumbnail 			 = $model->thumbnail;
		$thumbnail_big		 = $model->thumbnail_big;
		
		
		$master_category = Yii::app()->db->createCommand()
								->select('id,name')
								->from('category_master')
								->order('name')
								->queryAll();
								
		$master_brand = Yii::app()->db->createCommand()
								->select('id,name')
								->from('brand_master')
								->order('name')
								->queryAll();


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductBrand']))
		{
			// $model->attributes=$_POST['ProductBrand'];
			
		$model->product_name 			= isset($_POST['product_name']) ? $_POST['product_name']:'';
		$model->available 				= isset($_POST['available']) ? $_POST['available']:'';
		$model->rating 					= isset($_POST['rating']) ? $_POST['rating']:'';
		$model->master_category_id 		= isset($_POST['ProductBrand']['master_category_id']) ? $_POST['ProductBrand']['master_category_id']:'';
		$model->master_brand_id 		= isset($_POST['ProductBrand']['master_brand_id']) ? $_POST['ProductBrand']['master_brand_id']:'';
		$model->rating 					= isset($_POST['rating']) ? $_POST['rating']:'';
		$model->thumbnail 				= isset($_FILES['thumbnail']['name']) &&  $_FILES['thumbnail']['name']!=''  ? $_FILES['thumbnail']['name'] :  $thumbnail;
			
		
		$count					= $_POST['count'];
		$actual_count			= $_POST['actual_count'];	
			
			
				
			if($model->master_category_id !='')
			{
					$master_cat = Yii::app()->db->createCommand()
								->select('name')
								->from('category_master')
								->where('id=:id',array(':id'=>$model->master_category_id ))
								->queryAll();
			
			
				$model->master_category_name = $master_cat[0]['name'];
			}
			else
			{
				$model->master_category_name ='';
			}
			
				if($model->master_brand_id !='')
			{
					$master_brands = Yii::app()->db->createCommand()
								->select('name')
								->from('brand_master')
								->where('id=:id',array(':id'=>$model->master_brand_id ))
								->queryAll();
			
			
				$model->master_brand_name = $master_brands[0]['name'];
			}
			else
			{
				$model->master_brand_name ='';
			}
			
			if($model->thumbnail !='' && $model->thumbnail !=$thumbnail)
				{
					move_uploaded_file($_FILES['thumbnail']['tmp_name'],Yii::app()->basePath  . '/../../images/productbrand/thumbnail/'. $model->thumbnail);
				
					$resize = new ResizeImage(Yii::app()->basePath  . '/../../images/productbrand/thumbnail/'. $model->thumbnail);
					$resize->resizeTo(206, 205, 'exact');
					$resize->saveImage(Yii::app()->basePath  . '/../../images/productbrand/thumbnail/'. $model->thumbnail);
				
				}
				
				if($count!=$actual_count || $actual_count==1)
				{
					
					$thumbnail_big_array    = json_decode($thumbnail_big,true);
					
					// echo "<pre>";
					// print_r($_FILES);
					
					for($i=$actual_count;$i<15;$i++)
					{
						if(isset($_FILES['thumbnail_big_'.$i]['name'])  && $_FILES['thumbnail_big_'.$i]['name']!='' )
						{
							
							$thumbnail_big_array[] = $_FILES['thumbnail_big_'.$i]['name'];
							
							move_uploaded_file($_FILES['thumbnail_big_'.$i]['tmp_name'],Yii::app()->basePath  . '/../../images/productbrand/big_thumbnail/'. $_FILES['thumbnail_big_'.$i]['name']);
					
							$resize = new ResizeImage(Yii::app()->basePath  . '/../../images/productbrand/big_thumbnail/'. $_FILES['thumbnail_big_'.$i]['name']);
							$resize->resizeTo(904, 768, 'exact');
							$resize->saveImage(Yii::app()->basePath  . '/../../images/productbrand/big_thumbnail/'. $_FILES['thumbnail_big_'.$i]['name']);
							
						}
						
						
					}
					
					$model->thumbnail_big	= json_encode($thumbnail_big_array);
				
				}
				else
				{
					$model->thumbnail_big	= $thumbnail_big;
				}
				$model->date_modified	= date("Y-m-d H:i:s",time());
				
				
			
			if($model->save(false))
				// $this->redirect(array('view','id'=>$model->id));
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
			'master_category'=>$master_category,
			'master_brand'=>$master_brand,
		));
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
		$dataProvider=new CActiveDataProvider('ProductBrand');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProductBrand('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductBrand']))
			$model->attributes=$_GET['ProductBrand'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ProductBrand the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ProductBrand::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ProductBrand $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-brand-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
