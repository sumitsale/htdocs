<?php

class TblPlanMasterController extends Controller
{
  public $model1;
  public $model;
  public $model2;
  
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
				'actions'=>array('admin','delete','planlist','planadd','editplan','statuschange','statuschangeedit','subeditplan'),
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
	 
	 
	 
	 public function actionPlanList()
	 {
		
		 $result= 	Yii::app()->db->createCommand()
						->select('m.PLAN_ID,m.PLAN_TITLE,p.CONTENT_QTY,p.PLAN_PRICE,
								p.START_DATE,p.END_DATE,p.CONTENT_VALIDITY,p.VALID_FOR,p.STATUS
								,p.STEP_MASTER_PLAN_ID,p.AFFILIATE_ID,p.EUP,p.STORE_PLAN_ID')
						->from('tbl_plan_master m')
						->join('tbl_store_plan p', 'm.PLAN_ID=p.PLAN_ID')
						->where('p.STORE_FRONT_ID=:id and p.STEP_MASTER_PLAN_ID=:id1',array(':id'=>STORE_FRONT_ID,':id1'=>0))
						->order('m.PLAN_ID asc')
						->queryAll();
		
	 
	 
	 
	 $this->render('planlist',array(
			'result'=>$result,
			//'result1'=>$result1,
			));
	 
	 }
	 
	 
	 
	 public function actionPlanAdd()
	 {	
	 
		$model=new TblPlanMaster;
		$model1=new TblStorePlan;
		$model2=new TblOperatorPlan;
		
		
		
		
		$plan=Yii::app()->db->createCommand()
	       ->select('PLAN_ID,PLAN_TITLE')
		   ->from('tbl_plan_master')
		   ->queryAll();
			
		$operators=Yii::app()->db->createCommand()
	       ->select('OPERATOR_ID,OPERATOR')
		   ->from('tbl_mobile_operators_master')
		   ->queryAll();
		   
		$result= 	Yii::app()->db->createCommand()
						->select('a.PLAN_ID,a.PLAN_TITLE')
						->from('tbl_plan_master a')
						->join('tbl_store_plan b','a.PLAN_ID=b.PLAN_ID')
						->where('b.STORE_FRONT_ID=:id and b.STATUS=:id1',array(':id'=>STORE_FRONT_ID,':id1'=>1),array('in', 'a.PLAN_FOR', 
						array('W','M','H')))
						->order('a.PLAN_ID')
						->queryAll();
  
		/*
		$planmaster="select a.PLAN_ID,a.PLAN_TITLE from tbl_plan_master a,tbl_store_plan b where 
							a.PLAN_FOR in ('W','M','H') and b.STATUS=1 and a.PLAN_ID=b.PLAN_ID and 
							b.STORE_FRONT_ID=1  order by a.PLAN_ID";
		
					$connection = Yii::app()->db;
					$command = $connection->createCommand($planmaster);
					$result = $command->queryAll();
		*/				
		
		if(isset($_POST['TblStorePlan']))
	{
		$planid=$_POST['TblStorePlan']['PLAN_ID'];
		
		$masplanid=$_POST['TblStorePlan']['STEP_MASTER_PLAN_ID'];

		$qty=$_POST['TblStorePlan']['CONTENT_QTY'];
		
		$price=$_POST['TblStorePlan']['PLAN_PRICE'];
		
	   $validity=$_POST['TblStorePlan']['CONTENT_VALIDITY'];
	  
	   $validfor=$_POST['TblStorePlan']['VALID_FOR'];
	   
	    $plantitle=$_POST['TblStorePlan']['STORE_PLAN_TITLE'];
	   
	    $stdate=$_POST['TblStorePlan']['START_DATE'];
	   
	    $eddate=$_POST['TblStorePlan']['END_DATE'];
	
	   $desc=$_POST['TblStorePlan']['STORE_PLAN_DESC'];
	    
	   $affid=$_POST['TblStorePlan']['AFFILIATE_ID'];
	   
	   $eup=$_POST['TblStorePlan']['EUP'];
	   
	   $noa=$_POST['TblStorePlan']['NO_OF_ATTEMPTS'];
	   
	   $period=$_POST['TblStorePlan']['GRACE_PERIOD'];
	   
	   $stream=$_POST['TblStorePlan']['STREAMING'];
	   
	   
	   
	$model1->PLAN_ID=$planid;
	$model1->STEP_MASTER_PLAN_ID=$masplanid;
	$model1->CONTENT_QTY=$qty;
	$model1->PLAN_PRICE=$price;
	$model1->CONTENT_VALIDITY=$validity;
	$model1->VALID_FOR=$validfor;
	$model1->START_DATE=$stdate;
	$model1->END_DATE=$eddate;
	$model1->STORE_PLAN_TITLE=$plantitle;
	$model1->STORE_PLAN_DESC=$desc;
	$model1->STATUS="1";
	$model1->OPERATORS=count($_POST['TblOperatorPlan']['OPERATOR_ID']);
	$model1->AFFILIATE_ID=$affid;
	$model1->EUP=$eup;
	$model1->NO_OF_ATTEMPTS=$noa;
	$model1->GRACE_PERIOD=$period;
	$model1->STREAMING=$stream;


      if($model1->save())
	  {
	  $highest_id = $model1->primaryKey;
	  Yii::app()->user->setFlash('success',"Plan Added Successfully");
	  
	  }
	  else
	   {
		Yii::app()->user->setFlash('unsuccess',"Sorry Plan Not Added");
	   }
	  //Operator part :
	  
	  if(isset($_POST['TblOperatorPlan']['OPERATOR_ID']))
		{
			$count_operator= count($_POST['TblOperatorPlan']['OPERATOR_ID']);
			if(is_array($_POST['TblOperatorPlan']['OPERATOR_ID'])&& $count_operator >0)
			{
					$Today_timestamp = strtotime(date('d-M-Y'));
	
		foreach($_POST['TblOperatorPlan']['OPERATOR_ID'] as $key=>$value)
		{
		
		$model2=new TblOperatorPlan;
          		$model2->STORE_PLAN_ID=$highest_id;
				$model2->OPERATOR_ID=$value;
				$model2->SMS_FIRSTTIME="";
				$model2->SMS_PRE_RENEWAL="";
				$model2->SMS_CHARGING="";
				$model2->SMS_UNSUBSCRIPTION="";
				$model2->SMS_FAILED="";
				$model2->INDATE=$Today_timestamp;
				$model2->NO_OF_ATTEMPTS="";
				$model2->GRACE_PERIOD="";
				
				$model2->save();
				
				
	   }
$this->redirect(array('planlist'));
		    }
	    }
			
	}
		
		
		$this->render('planadd',array(
			'model'=>$model,
			'model1'=>$model1,
			'model2'=>$model2,
			'plan' =>$plan,
			'operators' =>$operators,
			'planmaster' =>$planmaster,
			'result' =>$result,
			));
	 
	 }
	 
	 
	 
	 
	 public function actionEditPlan($id) 
	 {
	$id = $_REQUEST['id'];
		$model=new TblPlanMaster;
		$model1=new TblStorePlan;
		$model2=new TblOperatorPlan;
		
		//$store_plan_id = $_GET['id'];
	//$plan_id = $_GET['plan_id'];
		
		
		$result= 	Yii::app()->db->createCommand()
						->select('a.PLAN_ID,a.PLAN_TITLE')
						->from('tbl_plan_master a')
						->join('tbl_store_plan b','a.PLAN_ID=b.PLAN_ID')
						->where('b.STORE_FRONT_ID=:id and b.STATUS=:id1',array(':id'=>STORE_FRONT_ID,':id1'=>1),array('in', 'a.PLAN_FOR', 
						array('W','M','H')))
						->order('a.PLAN_ID')
						->queryAll();
		
		
		/*
		$planmaster="select a.PLAN_ID,a.PLAN_TITLE from tbl_plan_master a,tbl_store_plan b where 
							a.PLAN_FOR in ('W','M','H') and b.STATUS=1 and a.PLAN_ID=b.PLAN_ID and 
							b.STORE_FRONT_ID=1  order by a.PLAN_ID";
		
					$connection =Yii::app()->db;
					$command =$connection->createCommand($planmaster);
					$result =$command->queryAll();
		*/

		
		$operators=Yii::app()->db->createCommand()
	       ->select('OPERATOR_ID,OPERATOR')
		   ->from('tbl_mobile_operators_master')
		   ->queryAll();
		  
		   
		
	 
	 $selected_operators=Yii::app()->db->createCommand()
	       ->select('OPERATOR_PLAN_ID,OPERATOR_ID,STATUS')
		   ->from('tbl_operator_plan')
		   ->where('STORE_PLAN_ID=:id',array(':id'=>$id))
		   ->queryAll();
	 
	
	 
		$Arr_operator = array();
	
									foreach($selected_operators as $data)
									{
									$op_id = $data['OPERATOR_ID'];
									$Arr_operator[$op_id]['OPERATOR_PLAN_ID'] = $data['OPERATOR_PLAN_ID']; 
									$Arr_operator[$op_id]['OPERATOR_ID'] = $data['OPERATOR_ID'];
									$Arr_operator[$op_id]['STATUS'] = $data['STATUS'];
									}
		$uncheck_array = array();
									foreach($operators as $data1)
									{
									$op_id = $data1['OPERATOR_ID'];
									if($Arr_operator[$op_id]['OPERATOR_ID'] != $data1['OPERATOR_ID'])
									{
							$uncheck_array[] = array ('OPERATOR_ID' =>$data1['OPERATOR_ID'] ,'OPERATOR' =>$data1['OPERATOR']) ;
									} 
									
									}
									
	// print_r($arr_checked);
		$model1=$this->loadModel1($id);
		/*
		if(isset($_POST['ajax']) && $_POST['ajax']==='edit-form')
   			 {
       			 echo CActiveForm::validate($model1);
        				Yii::app()->end();
    			}
	 */
		if(isset($_POST['TblStorePlan']))
		{
		
			$model1->attributes=$_POST['TblStorePlan'];
			$model1->save();
			
			if(isset($_POST['TblOperatorPlan']['OPERATOR_ID']))
		{
			$count_operator= count($_POST['TblOperatorPlan']['OPERATOR_ID']);
			if(is_array($_POST['TblOperatorPlan']['OPERATOR_ID'])&& $count_operator >0)
			{
					$Today_timestamp = strtotime(date('d-M-Y'));
	
		foreach($_POST['TblOperatorPlan']['OPERATOR_ID'] as $key=>$value)
		{
		
		$model2=new TblOperatorPlan;
          		$model2->STORE_PLAN_ID=$id;
				$model2->OPERATOR_ID=$value;
				$model2->SMS_FIRSTTIME="";
				$model2->SMS_PRE_RENEWAL="";
				$model2->SMS_CHARGING="";
				$model2->SMS_UNSUBSCRIPTION="";
				$model2->SMS_FAILED="";
				$model2->INDATE=$Today_timestamp;
				$model2->NO_OF_ATTEMPTS="";
				$model2->GRACE_PERIOD="";
				
				$model2->save();
				
				
	   }
	   
		    }
	    }
		Yii::app()->user->setFlash('success',"Plan Updated Successfully");
$this->redirect(array('planlist'));
		}
	 
		$this->render('editplan',array(
			'model'=>$model,
			'model1'=>$model1,
			'model2'=>$model2,
			'planmaster'=>$planmaster,
			'operators'=>$operators,
			'result'=>$result,
			'selected_operators'=>$selected_operators,
			'Arr_operator'=>$Arr_operator,
			'id'=>$id,
			'store_plan_id'=>$store_plan_id,
			'plan_id'=>$plan_id,
			'uncheck_array'=>$uncheck_array,
			
			));
	 }
	 
	
	public function actionSubEditPlan($id)
	{
	
	$id = $_REQUEST['op_id'];
		
		//$model1=new TblStorePlan;
		$model2=new TblOperatorPlan;
		
		$model2=$this->loadModel2($id);
	
	if(isset($_POST['TblOperatorPlan']))
		{
		
			$model2->attributes=$_POST['TblOperatorPlan'];
			if($model2->save())
			{
			 
	  Yii::app()->user->setFlash('success',"Plan Updated Successfully");
			}
	
	//$this->redirect(array('editplan'));
		}
	
		$this->render('subeditplan',array(
			'id'=>$id,
			'model2'=>$model2,
			));
	 
	
	

	}
	
	 
	public function actionStatuschange()
	{
	
		if(isset($_GET['status']) && $_GET['status']==1){
			$status=0;
		}else{
			$status=1;
		}
		if(isset($_GET['store_id']) && $_GET['store_id']!=''){
				$store_id= $_GET['store_id'];
			$post=TblStorePlan::model()->findByPk($store_id);
			$post->STATUS=$status;
			$post->save();
		}
		
		$this->redirect(array('planlist'));
						 
	}
	 
	 
	 public function actionStatuschangeEdit()
	{
	
		if(isset($_GET['status']) && $_GET['status']==1){
			$status=0;
		}else{
			$status=1;
		}
		if(isset($_GET['store_id']) && $_GET['store_id']!=''){
				$store_id= $_GET['store_id'];
				$op_id= $_GET['op_id'];
			$post=TblOperatorPlan::model()->findByPk($op_id);
			$post->STATUS=$status;
			$post->save();
		}
		
		$this->redirect(array('editplan?id='.$store_id));
						
	}
	  
	 
	 
	public function actionCreate()
	{
		$model=new TblPlanMaster;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblPlanMaster']))
		{
			$model->attributes=$_POST['TblPlanMaster'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->PLAN_ID));
		}

		$this->render('create',array(
			'model'=>$model,
			//'model1'=>$model1,
			//'model2'=>$model2,
			//'plan' =>$plan,
			//'operators' =>$operators,
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

		if(isset($_POST['TblPlanMaster']))
		{
			$model->attributes=$_POST['TblPlanMaster'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->PLAN_ID));
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
		$dataProvider=new CActiveDataProvider('TblPlanMaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblPlanMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblPlanMaster']))
			$model->attributes=$_GET['TblPlanMaster'];

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
		$model=TblPlanMaster::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadModel1($id)
	{
		$model=TblStorePlan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadModel2($id)
	{
		$model=TblOperatorPlan::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-plan-master-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
