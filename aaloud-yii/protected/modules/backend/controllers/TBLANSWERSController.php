<?php

class TBLANSWERSController extends Controller
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
				'actions'=>array('create','update','questionlist','questionaddedit','questionadd','displaysubtag','submitbutton','add','edit','editupdate','purge','filterStoreContent'),
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
		   $model=new TBLANSWERS;
			
			$model1=new TBLTABS;
			$model2=new TBLSTOREFRONT;
			$model3=new  TBLQUESTIONS;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblAnswer']))
		{
			$model->attributes=$_POST['TblAnswer'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ANSWER_ID));
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
	public function actionUpdate($id,$store_id)
	{
		
		//$model=$this->loadModel($id);
	
   $store_id=$_GET['store_id'];


	
	$model1=new TBLTABS;
	$model=new TBLANSWERS;	
	$model2=new TBLSTOREFRONT;
	$model3=new TBLQUESTIONS;
	   
    $displayquestion=Yii::app()->db->CreateCommand()
        ->select('*')
        ->from('tbl_questions')
        ->where('QUESTION_ID=:questionid',array(':questionid'=>$id))	 
        ->queryAll();
	 
	 
	//print_r( $displayquestion);exit;
	
	foreach($displayquestion as $row)
	{
		$questionid=$row['QUESTION_ID'];
    }
			
			
	
		$sql=Yii::app()->db->createCommand()
						->select('TAB_ID,TAB_NAME')
						->from('tbl_tabs')
						->where('MAIN_TAB_ID=0')
						->queryAll();
						
						
		$sql2=Yii::app()->db->createCommand()
		            ->select('TAB_ID,TAB_NAME')
		            ->from('tbl_tabs')				
						->where('MAIN_TAB_ID=1')
						->queryAll();
						
	   $sql1=Yii::app()->db->createCommand()
						->select('STORE_FRONT_ID,STORE_FRONT_NAME')
						->from('tbl_store_front')
						->order('STORE_FRONT_ID')
						->queryAll();
						
					
					
		$answer=Yii::app()->db->createCommand()
			       ->select('*')
			       ->from('tbl_answers')
			       ->where('QUESTION_ID=:questionid and STORE_FRONT_ID=:storeid',array(':questionid'=>$questionid,':storeid'=> $store_id))
			       ->queryAll();
			       
			       //print_r($answer);exit;
			       
			       foreach($answer as $row)
			       {
			       	$ans=$row['ANSWER'];
			       	
			       	
			       }
					
	
	
			

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		//if(isset($_POST['TblAnswer']))
		//{
		//	$model->attributes=$_POST['TblAnswer'];
		//	if($model->save())
			//$this->redirect(array('view','id'=>$model->ANSWER_ID));
		//}

		$this->render('edit',array(
			'model'=>$model,
		   'model1'=>$model1,
			'model2'=>$model2,
			'model3'=>$model3,
			'sql'=>$sql,
			'sql1'=>$sql1,
			'displayquestion'=>$displayquestion,
			'sql2'=>$sql2,
			'ans'=>$ans,
			
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
		$dataProvider=new CActiveDataProvider('TBLANSWERS');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TBLANSWERS('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblAnswer']))
			$model->attributes=$_GET['TblAnswer'];

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
		$model=TBLANSWERS::model()->findByPk($id);
		
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='TBLANSWERS-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
public function actionQuestionlist()
{
	
$userId = Yii::app()->user->id;	


	$model1=new TBLTABS;
	$model=new TBLANSWERS;	
	$model2=new TBLSTOREFRONT;
	$model3=new TBLQUESTIONS;
	
	/*
				$sql="SELECT a.QUESTION_ID, a.QUESTION, b.STORE_FRONT_ID, b.MAIN_TAB_ID, b.TAB_ID, b.ANSWER, b.ANSWER_ID, b.STATUS,c.TAB_NAME
						FROM tbl_answers AS b
                  LEFT JOIN tbl_tabs AS c on ( c.TAB_ID = b.MAIN_TAB_ID )
						LEFT JOIN tbl_questions AS a ON ( a.QUESTION_ID = b.QUESTION_ID )
						WHERE b.STORE_FRONT_ID =1
						AND b.STATUS =1 
                 		 and c.TAB_ID=1
						ORDER BY a.STORE_FRONT_ID ASC";
						
				$connection = Yii::app()->db;
				$command = $connection->createCommand($sql);
				$result = $command->queryAll();		
				*/
				
				
				$result=Yii::app()->db->createCommand()
						->select('a.QUESTION_ID, a.QUESTION, b.STORE_FRONT_ID, b.MAIN_TAB_ID, b.TAB_ID, b.ANSWER, b.ANSWER_ID, b.STATUS,c.TAB_NAME')
						->from('tbl_answers b')
						->leftJoin('tbl_tabs c','c.TAB_ID = b.MAIN_TAB_ID')
						->leftJoin('tbl_questions a','a.QUESTION_ID = b.QUESTION_ID')
						->where('b.STORE_FRONT_ID =:id1 and b.STATUS =:id2 and c.TAB_ID=:id3',array(':id1'=>STORE_FRONT_ID,':id2'=>1,':id3'=>1))
						->order('a.STORE_FRONT_ID')
						->queryAll();
						
			
							
						
			
	$maintabid=Yii::app()->db->createCommand()
						->select('TAB_ID,TAB_NAME')
						->from('tbl_tabs')
						->where('MAIN_TAB_ID=0')
						->queryAll();
			

	
	
	
	$this->render('questionlist',array(
			'result'=>$result,
	       'model1'=>$model1,
			'model'=>$model,
			'maintabid'=>$maintabid,
			'result1'=>$result1,			
			
			));
	
	}	
	
	public function actionQuestionadd()
	{
		
	
		   $model=new TBLANSWERS;
			$model1=new TBLTABS;
			$model2=new TBLSTOREFRONT;
			$model3=new TBLQUESTIONS;
			
			
	
		
	$sql=Yii::app()->db->createCommand()
						->select('TAB_ID,TAB_NAME')
						->from('tbl_tabs')
						->where('MAIN_TAB_ID=0')
						->queryAll();
						
						
						
	$sql1=Yii::app()->db->createCommand()
						->select('STORE_FRONT_ID,STORE_FRONT_NAME')
						->from('tbl_store_front')
						->order('STORE_FRONT_ID')
						->queryAll();
					
		
			$this->render('questionaddedit',array(
			
			'sql'=>$sql,
			'sql1'=>$sql1,
			'model1'=>$model1,
			'model'=>$model,
			'model3'=>$model3,
			'model2'=>$model2,
			
			));
	
		
		}
	

	public function actionDisplaysubtag()
	{
		   //$model1=new TBLTABS;
			
							
			
		 $maintabid=$_POST['TBLTABS']['MAIN_TAB_ID'];

		$data2 = TBLTABS::model()->findAll('MAIN_TAB_ID = :maintabid', array(':maintabid' =>$maintabid));
		$data = CHtml::listData($data2, 'TAB_ID', 'TAB_NAME');
		
		echo CHtml::tag('option', array(), CHtml::encode("Select a Module"), true);
		foreach ($data as $value => $name) {
		  echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
		}	
		
   }
	
	public function actionSubmitbutton()
	{
		   $model=new TBLANSWERS;
			$model1=new TBLTABS;
			
			$maintabidno=$_POST['TBLTABS']['MAIN_TAB_ID'];
			$tabidno=$_POST['TBLTABS']['TAB_ID'];
			
			//echo $maintabid;
			//echo "<br>";
			//echo $tabid;exit;
		
	if(isset($_POST['TBLTABS']['MAIN_TAB_ID']) && isset($_POST['TBLTABS']['TAB_ID']) && $_POST['TBLTABS']['TAB_ID']!='' && $_POST['TBLTABS']['MAIN_TAB_ID']!='')
			{
				
				$result=Yii::app()->db->createCommand()
						->select('a.QUESTION_ID, a.QUESTION , b.STORE_FRONT_ID , b.MAIN_TAB_ID, b.TAB_ID, b.ANSWER , b.ANSWER_ID, b.STATUS')
						->from('tbl_answers b')
						->leftJoin('tbl_questions a',' a.QUESTION_ID = b.QUESTION_ID ')
					    ->where('b.STORE_FRONT_ID=1 and  b.MAIN_TAB_ID =:maintabidno and b.TAB_ID =:tabidno',array(':maintabidno'=>$maintabidno,':tabidno'=>$tabidno))
						->order('b.STORE_FRONT_ID')
						->queryAll();
						
				
			
		//querybuilder for 
		}
		else 
		{
		
		
		$maintabidno=0;
			$tabidno=0;
		
				$result=Yii::app()->db->createCommand()
						->select('a.QUESTION_ID, a.QUESTION , b.STORE_FRONT_ID , b.MAIN_TAB_ID, b.TAB_ID, b.ANSWER , b.ANSWER_ID, b.STATUS')
						->from('tbl_answers b')
						->leftJoin('tbl_questions a',' a.QUESTION_ID = b.QUESTION_ID ')
					    ->where('b.STORE_FRONT_ID=1 and  b.MAIN_TAB_ID =:maintabidno and b.TAB_ID =:tabidno',array(':maintabidno'=>$maintabidno,':tabidno'=>$tabidno))
						->order('b.STORE_FRONT_ID')
						->queryAll();
						
		
		
		
		
		}
		
      $maintabid=Yii::app()->db->createCommand()
						->select('TAB_ID,TAB_NAME')
						->from('tbl_tabs')
						->where('MAIN_TAB_ID=0')
						->queryAll();
						
		
		
		$maintabidname=Yii::app()->db->createCommand()
		             ->select('TAB_NAME')
		             ->from('tbl_tabs')
		             ->where('TAB_ID=:tab_id',array(':tab_id'=>$maintabidno))
		             ->queryAll();
		             
	   $tabidname=Yii::app()->db->createCommand()
		             ->select('TAB_NAME')
		             ->from('tbl_tabs')
		             ->where('TAB_ID=:tab_id',array(':tab_id'=>$tabidno))
		             ->queryAll();
		         
		         // print_r($tabidname);exit;

		
			$this->render('submitanswer',array(
			
			'result'=>$result,
			'maintabid'=>$maintabid,
			'model1'=>$model1,
			'maintabidname'=>$maintabidname,
			'tabidname'=>$tabidname,
			
			));
	
		
		}
		
		public function actionAdd()
		{
         $model=new TBLANSWERS;
			$model1=new TBLTABS;
			$model2=new TBLSTOREFRONT;
			$model3=new TBLQUESTIONS;

         $tblquestiondeactive=new TBLQUESTIONDEACTIVATE;
         
         
   
         

 				 $maxcountryid = Yii::app()->db->createCommand()
  				->select('max(QUESTION_ID) as max')
  				->from('tbl_questions')
  				->queryScalar();
  
  				 $maxcountryid=  $maxcountryid+1;




		$maintabid=$_POST['TBLTABS']['MAIN_TAB_ID'];

		$tabid=$_POST['TBLTABS']['TAB_ID'];
		
		$answer=$_POST['TBLANSWERS']['ANSWER'];
		
	   $question=$_POST['TBLQUESTIONS']['QUESTION'];
	  
	   $status=$_POST['TBLANSWERS']['STATUS'];
	
	   $storeid=$_POST['TBLTABS']['STORE_FRONT_ID'];
	   
	   if($status==1)
	   {
			$model3->QUESTION=  $question;
			$model3->STORE_FRONT_ID=$storeid;
			$model3->MAIN_TAB_ID=$maintabid;	
        	$model3->TAB_ID=$tabid;
            $model3->STATUS= $status;
         
			$model3->save();
			
			     
			}
			
			if($status==1)
			{
               $model->QUESTION_ID= $maxcountryid;
   			   $model->STORE_FRONT_ID= $storeid;
   			   $model->ANSWER=$answer;
   			   $model->	MAIN_TAB_ID=	$maintabid;
   			   $model->TAB_ID=$tabid;
   			   $model->	STATUS= $status;
			
			    if($model->save())
				{
				Yii::app()->user->setFlash('success',"Data added Successfully");
		
				}				
				
			
				
			}

		if($status==2)
		{
			
			
		   	 $tblquestiondeactive->STORE_FRONT_ID=	$storeid;
       	 	 $tblquestiondeactive->STATUS=	  $status;	
        	 $tblquestiondeactive->QUESTION_ID= $maxcountryid;
		   
		     if($tblquestiondeactive->save())
			 {
			 		Yii::app()->user->setFlash('success',"Data added Successfully");
			 }
			 
		      
			
		}
	
	
      
	
		
          $this->redirect('questionlist');		
		

			}
			
			public function actionEdit($id)
			{
				
			$model=new TBLANSWERS;
			$model1=new TBLTABS;
			$model2=new TBLSTOREFRONT;
			$model3=new TBLQUESTIONS;
				
			$model=$this->loadModel($id);
		
			
			
		//print_r($model);exit;
			
			
    $sql=Yii::app()->db->createCommand()
						->select('TAB_ID,TAB_NAME')
						->from('tbl_tabs')
						->where('MAIN_TAB_ID=0')
						->queryAll();
						
						
						
	$sql1=Yii::app()->db->createCommand()
						->select('STORE_FRONT_ID,STORE_FRONT_NAME')
						->from('tbl_store_front')
						->order('STORE_FRONT_ID')
						->queryAll();
								
			

			
			
		   
		   
				$this->render('edit',array(
				'model'=>$model,
				'model1'=>$model1,
				'model2'=>$model2,
				'model3'=>$model3,
				'sql'=>$sql,
				'sql1'=>$sql1,
				'id'=>$id,
				
				));
				
				
				
		   }
		
		   public function actionEditUpdate()
		   {
		   $model=new TBLANSWERS;
			$model1=new TBLTABS;
			$model2=new TBLSTOREFRONT;
			$model3=new TBLQUESTIONS;
		   	
		   	
		   $maintabid=$_POST['TBLQUESTIONS']['MAIN_TAB_ID'];
		   
		  
        	 $tabid=$_POST['TBLQUESTIONS']['TAB_ID'];
		
		  	 $answer=$_POST['TBLANSWERS']['ANSWER'];
		   
		  	 $question=$_POST['TBLQUESTIONS']['QUESTION'];
	  
	     	 $status=$_POST['TBLANSWERS']['STATUS'];
	      
	      	 $storeid=$_POST['TBLANSWERS']['STORE_FRONT_ID'];
	       
	    
		  	 $questionid=$_POST['TBLQUESTIONS']['QUESTION_ID'];
		   
		   
		   	
		   	if($storeid==1)
		   	{
		   		$command=Yii::app()->db->createCommand()
		   		->update('tbl_questions', 
		   		          array('QUESTION'=>$question),
        					 'QUESTION_ID=:questionid', array(':questionid'=>$questionid));
		   		
		   		 
		   		 
		   		 $command=Yii::app()->db->createCommand()
		   		 ->update('tbl_answers',
		   		        array('ANSWER'=>$answer,'MAIN_TAB_ID'=> $maintabid,'TAB_ID'=>$tabid),
		   		        'QUESTION_ID=:question_id',array(':question_id'=>$questionid));
		   		
		   		$this->redirect('questionlist');
		   		}
		   	
		   	}
		   	
		   	
		   	
		   	
		   	
		   	
		   	public function actionPurge()
	          {
		$model=new TBLANSWERS;
		
		$this->render('purge',array(
			'model'=>$model,
			
			));
	
	          }
	
	
	public function actionFilterStoreContent()
	{
		$model1=new TblStoreContentFilter('alert');
		if(isset($_POST['TblStoreContentFilter']))
		{
		if($model1->validate())
		{
	
		$filename = $_FILES['TblStoreContentFilter']['name']['csvfile'];
		$filepath = $_FILES['TblStoreContentFilter']['tmp_name']['csvfile'];
		$filesize = $_FILES['TblStoreContentFilter']['size']['csvfile'];
		if($_FILES['TblStoreContentFilter']['error']['csvfile']==0)
		{
				$row = 0;
		if(($handle = fopen($filepath, "r")) !== FALSE)
		{
   			 while (($data = fgetcsv($handle,$filesize, ",")) !== FALSE)
			 {
        		 $contentId = $data[0];
				 $storeId = $data[1];
				 
				//------------------------------------------------
				//check whether combination of the content id and store id is already exiost or not. 
				$result=array();
				$result=Yii::app()->db->createCommand()
						->select('CONTENT_ID')
						->from('TBL_STORE_CONTENT_FILTER')
						->where('CONTENT_ID=:id and STORE_ID=:id1',array(':id'=>$contentId,':id1'=>$storeId))
						->queryAll();
				
		if(isset($contentId) && isset($storeId) && isset($result) && $contentId!='' && $storeId!='' && count($result['CONTENT_ID'])==0)
				{
				
					$model1->CONTENT_ID = $contentId;
					$model1->STORE_ID = $storeId;
					
				}
				
				//-------------------------------------------------	
				
    		}
			if($model1->save())
			{
		Yii::app()->user->setFlash('success',"CSV content has been uploaded successfully");
			}
    	fclose($handle);
		unlink($filepath);

	   }
		}
		}
		}
		$this->render('filterstorecontent',array(
			'model1'=>$model1,
			
			));
	
	}
	
		
			
	
}
