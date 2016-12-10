<?php

class TblContainerMasterController extends Controller
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
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','list','show','mapping','query','updatecont','createtemp','updatetemp','ajaxmap','Updatemap','searchquerypopup'),
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
		$model=new TblContainerMaster;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);


         $containerlocation=Yii::app()->db->createCommand()
						->select('CONTAINER_LOCATION')
						->from('tbl_container_master')
						->queryAll();

      // print_r($containerlocation);exit;


		if(isset($_POST['TblContainerMaster']))
		{
			$model->attributes=$_POST['TblContainerMaster'];
			if($model->save())
			{
			Yii::app()->user->setFlash('success',"Container Added Successfully");
			$this->redirect('list');
			
			}
			else{
			Yii::app()->user->setFlash('unsuccess',"Sorry Container not added");
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'containerlocation'=>$containerlocation,
			
		));
	}

	public function actionUpdatecont($id)
	{
	
	$model=new TblContainerMaster;
	$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		 $containerlocation=Yii::app()->db->createCommand()
						->select('CONTAINER_LOCATION')
						->from('tbl_container_master')
						->queryAll();

		if(isset($_POST['TblContainerMaster']))
		{
			$model->attributes=$_POST['TblContainerMaster'];
			if($model->save())
			{
			Yii::app()->user->setFlash('success',"Container updated Successfully");
			$this->redirect('list');

			}
			else{
			Yii::app()->user->setFlash('unsuccess',"Sorry Container not Updated");
			}
		}

		$this->render('updatecont',array(
			'model'=>$model,
			'containerlocation'=>$containerlocation,
		));
	}
	



public function actionCreatetemp()
	{
		$model1=new TblTemplate;
		$model2=new TblTemplateMaster;
		$template = Yii::app()->db->createCommand()
						->select('TEMPLATE_MASTER_ID,TEMPLATE_NAME')
						->from('tbl_template_master')
						->queryAll();
					

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		
		if(isset($_POST['TblTemplate']))
		{

			$model1->attributes=$_POST['TblTemplate'];
			
			$model1->TEMPLATE_MASTER_ID=$_POST['TblTemplate']['TEMPLATE_MASTER_ID'];
			$model1->CREATED_ON = strtotime(date('y-m-d h:i:s'));
			$model1->STORE_FRONT_ID = STORE_FRONT_ID;
			//print_r($model1->attributes);
			if($model1->save())
			{
			Yii::app()->user->setFlash('success',"Template Added Successfully");
			$this->redirect('show');
			}
			else{
			Yii::app()->user->setFlash('unsuccess',"Sorry template not added");
			}
		}
		
		
		
		
/*
		if(isset($_POST['TblTemplate']) && isset($_POST['TblTemplateMaster']))
		{
		
		
			$model1->attributes=$_POST['TblTemplate'];
			
			$model1->TEMPLATE_MASTER_ID=$_POST['TblTemplateMaster']['TEMPLATE_NAME'];
			if($model1->save())
			{
			Yii::app()->user->setFlash('success',"Template Added Successfully");
			$this->redirect(array('show'));
			}
			else{
			Yii::app()->user->setFlash('unsuccess',"Sorry template not added");
			}
		} */

		$this->render('createtemp',array(
			'model1'=>$model1,
			'model2'=>$model2,
			'template'=>$template,
		));
	}





public function actionUpdatetemp($tempid=null)
	{
	
		$model1=$this->loadModel1($tempid);;
		$model2=new TblTemplateMaster;
		$template = Yii::app()->db->createCommand()
						->select('TEMPLATE_MASTER_ID,TEMPLATE_NAME')
						->from('tbl_template_master')
						->queryAll();
					
		 //$model1=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model)
		$temp_array = Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_template')
						->where('TEMPLATE_ID=:id',array(':id'=>$tempid))
						->queryRow();
						
						
						//print_r($temp_array);exit;
					
		
		if(isset($_POST['TblTemplate']))
		{

			$model1->attributes=$_POST['TblTemplate'];
			
			$model1->TEMPLATE_MASTER_ID=$_POST['TblTemplate']['TEMPLATE_MASTER_ID'];
			$model1->CREATED_ON = strtotime(date('y-m-d h:i:s'));
			$model1->STORE_FRONT_ID = STORE_FRONT_ID;
			//print_r($model1->attributes);
			if($model1->save())
			{
			Yii::app()->user->setFlash('success',"Template Added Successfully");
			$this->redirect('show');
			}
			else{
			Yii::app()->user->setFlash('unsuccess',"Sorry template not added");
			}
		} 

		$this->render('updatetemp',array(
			'model1'=>$model1,
			'model2'=>$model2,
			'template'=>$template,
			'temp_array'=>$temp_array,
			'TEMPLATE_MASTER_ID'=>$TEMPLATE_MASTER_ID,
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
	
		$model1=new TblStoreQuery;
		$model2=new TblCriteriaMaster;
		$model3=new TblAlbumTypes;
		$model4=new TblLanguages;
		$model5=new TblMoodDetails;
		$model6=new TblArtistMaster;
		$model7=new TblGenreMaster;
		$model8=new TblCategory;
		
		$query_id=$_GET['QUERY_ID'];
		
	$result=Yii::app()->db->createCommand()
	       ->select('*')
		   ->from('tbl_store_query')
		   ->where('QUERY_ID=:id',array(':id'=>$query_id))
		   ->queryAll();
		
		
		
	$content=Yii::app()->db->createCommand()
	       ->select('ALBUM_TYPE_ID,ALBUM_TYPE_NAME')
		   ->from('tbl_album_types')
		   ->queryAll();
	 
	$language=Yii::app()->db->createCommand()
	       ->select('LANGUAGE_ID,LANGUAGE_TITLE')
		   ->from('tbl_languages')
		   ->queryAll();
		   
	$criteria=Yii::app()->db->createCommand()
	       ->select('CRITERIA_ID,CRITERIA_TITLE')
		   ->from('tbl_criteria_master')
		   ->queryAll();	   
		   
	$mood=Yii::app()->db->createCommand()
	       ->select('MOOD_ID,MOOD_TITLE')
		   ->from('tbl_mood_details')
		   ->queryAll();	   
		   
	$artist=Yii::app()->db->createCommand()
	      ->select('id,title')
		  ->from('tbl_artist_master')
		  ->where('is_celebrity =1')
		  ->order('id')
		  ->queryAll();
		   
	$genre=Yii::app()->db->createCommand()
	       ->select('id,title')
		   ->from('tbl_genre_master')
		   ->queryAll();

	$category=Yii::app()->db->createCommand()
	       ->select('CATEGORY_ID,CATEGORY')
		   ->from('tbl_category')
		   ->queryAll();
	
	//	$model1=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblStoreQuery']))
		{
			$model1->attributes=$_POST['TblStoreQuery'];
			$model1->save();
		}

		$this->render('update',array(
			'model1'=>$model1,
			'model2'=>$model2,
			'model'=>$model,
			'model3'=>$model3,
			'model4'=>$model4,
			'model5'=>$model5,
			'model6'=>$model6,
			'model7'=>$model7,
			'model8'=>$model8,
			'content'=>$content,
			'language'=>$language,
			'mood'=>$mood,
			'artist'=>$artist,
			'criteria'=>$criteria,
			'result'=>$result,
			'genre'=>$genre,
			'category'=>$category,

		));
	}
	
	public function actionSearchQuerypopup()
	{
		$this->layout = false;
		
		$this->render('searchquerypopup');

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
/*    list all containers  */                             
	public function actionList()
	{
		$dataProvider=new CActiveDataProvider('TblContainerMaster',array(
														'criteria'=>array(
														'order'=>'CONTAINER_LOCATION ASC',
														),
		
												'pagination'=>array(
																 'pageSize'=>25,
																 ),
																 ));
		$this->render('list',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
/* list templates           */	
	public function actionShow()
	{
		$model1=new TblTemplate;
		$dataProvider=new CActiveDataProvider('TblTemplate',array(
												'criteria'=>array(
														'order'=>'TEMPLATE_NAME ASC',
														),
												'pagination'=>array(
																 'pageSize'=>25,
																 ),
																 ));
		$this->render('show',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
/* Container and templet Mapping */

	Public function actionMapping()
	
	{
		$model=new TblContainerMaster; 
		$model1=new TblTemplate;
		$container = Yii::app()->db->createCommand()
						->select('CONTAINER_ID,CONTAINER_NAME')
						->from('tbl_container_master')
						->queryAll();
	
		$template = Yii::app()->db->createCommand()
						->select('TEMPLATE_ID,TEMPLATE_NAME')
						->from('tbl_template')
						->queryAll(); 
						
		
	
	
  
	
		$this->render('mapping',array(
			'model'=>$model,
			'model1'=>$model1,
			'container'=>$container,
			'template'=>$template,
		));
	
	}

	Public function actionAjaxmap()
	{
					
	 $cont_id=$_POST['TblContainerMaster']['CONTAINER_ID'];
	
	 $temp_value = Yii::app()->db->createCommand()
					->select('*')
					->from('tbl_container_template_map')
					->where('CONTAINER_ID=:id',array(':id'=>$cont_id))
					->queryRow();
	
	$TEMPLATE_ID=$temp_value['TEMPLATE_ID'];
	$template = Yii::app()->db->createCommand()
						->select('TEMPLATE_ID,TEMPLATE_NAME')
						->from('TBL_TEMPLATE')
						->queryAll(); 
	
	$temp = CHtml::listData($template, 'TEMPLATE_ID', 'TEMPLATE_NAME');
	echo CHtml::tag('option', array(), CHtml::encode("select Template"), true);
		foreach ($temp as $value => $name) 
		{
			if($value == $TEMPLATE_ID)
			{
		  		echo CHtml::tag('option', array('value' => $value,'selected'=>'selected'), CHtml::encode($name), true);
			}
			else
			{
		 	echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
			}
		}
	}
	
	
	public function actionUpdatemap()
	{
		$model=new TblContainerMaster;
		$model1=new TblTemplate;
		$modelmap=new TblContainerTemplateMap;
		
		$container = Yii::app()->db->createCommand()
						->select('CONTAINER_ID,CONTAINER_NAME')
						->from('tbl_container_master')
						->queryAll();
	
		$template = Yii::app()->db->createCommand()
						->select('TEMPLATE_ID,TEMPLATE_NAME')
						->from('TBL_TEMPLATE')
						->queryAll(); 
		
		$cont_id=$_POST['TblContainerMaster']['CONTAINER_ID'];
		$temp_id=$_POST['TblTemplate']['TEMPLATE_ID'];
		
		$result = Yii::app()->db->createCommand()
				->delete('tbl_container_template_map', 'CONTAINER_ID=:id', array(':id'=>$cont_id));
		if($temp_id!=0)
		{
		$result1 = Yii::app()->db->createCommand()
				->insert('tbl_container_template_map', array(
    				'CONTAINER_ID'=>'$cont_id',
    				'TEMPLATE_ID'=>'$temp_id',
));

			Yii::app()->user->setFlash('success',"container-template mapped Successfully");
		
		}
		
		
		
		
			$this->render('mapping',array(
			'model'=>$model,
			'model1'=>$model1,
			'container'=>$container,
			'template'=>$template,));

	}
	
	
	
	/* Query Manager */
	
	public function actionQuery()
	{
		$model=new TblContainerMaster; 
		$result = Yii::app()->db->createCommand()
    ->select('u.CONTAINER_ID,u.CONTAINER_LOCATION,u.CONTAINER_NAME')
    ->from('tbl_container_master u')
    ->join('tbl_container_template_map p', 'u.CONTAINER_ID=p.CONTAINER_ID')
    ->where('p.STORE_FRONT_ID =:id', array(':id'=>STORE_FRONT_ID))
	->order('u.CONTAINER_LOCATION')
	->queryAll();
	//	print_r($result);exit;
		$rows	= count($result);
		$strLocName = "";
		$arrData = array();
		
							foreach($result as $row)
							{
							$arrContainer = array();
							if($strLocName!=$row['CONTAINER_LOCATION'])
							{
								$arrContainer["CONTAINER_ID"] = $row['CONTAINER_ID'];
								$arrContainer["CONTAINER_NAME"] = $row['CONTAINER_NAME'];
								
								$arrData[$row['CONTAINER_LOCATION']][] = $arrContainer;
								$strLocName = $row['CONTAINER_LOCATION'];
								
							}
							elseif($strLocName==$row['CONTAINER_LOCATION'])
							{
								$arrContainer["CONTAINER_ID"] = $row['CONTAINER_ID'];
								$arrContainer["CONTAINER_NAME"] = $row['CONTAINER_NAME'];
								$arrData[$row['CONTAINER_LOCATION']][] = $arrContainer;
							}
							unset($arrContainer);
						}//end for
					
		/*	
		foreach($arrData as $cont_name=>$arrContData)
	{		
		$size=count($arrContData);	
		 for($i=0; $i < $size; $i++)
			{
					$result1 = Yii::app()->db->createCommand()
   			 		->select('p.TEMPLATE_ID')
    				->from('tbl_container_master u')
   				 	->join('tbl_container_template_map p', 'u.CONTAINER_ID=p.CONTAINER_ID')
   				 	->where('p.CONTAINER_ID=:id and p.STORE_FRONT_ID =:store_id' , array(':id'=>$arrContData[$i]['CONTAINER_ID'],':store_id'=>'1'))
					->queryRow();
				//print_r($result1);exit;
							
						foreach($result1 as $template_id)
						{
						$result2 = Yii::app()->db->createCommand()
   			 			->select('p.QUERY_ID, u.TEMPLATE_NAME, p.QUERY_NAME, p.XML_FILE_NAME, p.QUERY_VARIANT, p.UPDATED_ON, p.STATUS, p.TEMPLATE_ID') 
    					->from('TBL_TEMPLATE u')
   				 		->join('TBL_STORE_QUERY p', 'u.TEMPLATE_ID=p.TEMPLATE_ID and u.STORE_FRONT_ID=p.STORE_FRONT_ID')
   				 		->where('p.TEMPLATE_ID=:id and p.STORE_FRONT_ID=:store_id', array(':id'=>$template_id ,':store_id'=>'1'))
						->queryAll();
						}
	} 
	//print_r($result2);exit;
	
}*/

		$this->render('query',array(
			'model'=>$model,
			'arrData'=>$arrData,
		//	'result2'=>$result2,
		//	'result'=>$result,
		));
	}
		
	/**
	* Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TblContainerMaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblContainerMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblContainerMaster']))
			$model->attributes=$_GET['TblContainerMaster'];

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
		$model=TblContainerMaster::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadModel1($id)
	{
		$model=TblTemplate::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-container-master-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
