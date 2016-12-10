<?php

class NewsController extends Controller
{

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),

		
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('captcha'),
				'users'=>array('*'),
			),
		);
	}
	
	public function actionAllnews()
	{
		$this->layout='column1';
		$this->locationtop= 25;
		$this->locationright= 26;
		
		$news= Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_aa_press')
						->where('Press_News_Status=:id',array(':id'=>'P'))
						->order('Press_News_Date desc')
						->queryAll();
	
	// modification for pagination
		$page_size =10;
		$criteria = new CDbCriteria();
        $criteria->condition = 'Press_News_Status = :id';
		$criteria->params = array (':id'=>'P');
       
       $item_count = count($news);
		// echo $item_count;
		//var_dump($criteria);
	   
	   
	   
       // $item_count = count($cleared);
        $pages = new CPagination($item_count);
        $pages->setPageSize($page_size);
        $pages->applyLimit($criteria);  // the trick is here
		//var_dump($page);
		//exit;
		/* echo $pages->offset;
		echo $pages->limit;
		echo 
		exit; */
		$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
		
		$sample =range($pages->offset+1, $end);
	

		 $this->render('allnews',array(
			//'model'=>$model,
			'news'=>$news,
			'item_count'=>$item_count,
			'page_size'=>$page_size,
			'pages'=>$pages,
			'sample'=>$sample,
			
		));
	}
	
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
				{
					echo CActiveForm::validate($model);
					Yii::app()->end();
				}
	}		
													

	public function actionDetails()
	{
	//$char='char';	
	$id=0;
	$id1=0;
	$error='';
	
	$this->layout='column1';
	$this->locationtop= 31;
		$this->locationright= 32;
	
	if(isset($_GET['id']))
	{
	$id=$_GET['id'];
	$id1=$_GET['id']+1;
	}

	
		$news= Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_aa_press')
						->where('Press_id=:id',array(':id'=>$id))
						->queryAll();
					
							//echo "<pre>";
							//print_r($news);exit;
						
		$newsall= Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_aa_press')
						->where('Press_News_Status=:status',array(':status'=>'P'))
						->order('Press_News_Date desc')
						->queryAll();
						
						
																	$model = new Comments();
																	
																			if(isset($_POST['Comments'] ) && count($_POST['Comments'] )>0)
																			{	
																			$comment = $_POST['Comments']['comment'] ;
																			$timestamp = time();
																			$ca = Yii::app()->getController()->createAction('captcha');
																			$error = '';
																			$captchaVal = '';
																			if (! $ca->validate($_POST['Comments']['verifyCode'], false) ) 
																			{
																			
																			$error = "The verification code is incorrect.";
																			$captchaVal = $_POST['Comments']['verifyCode'];
																			}
																			$model->artist_id= $id;
																			$model->user_id= (isset(Yii::app()->session['H_USERID']))?Yii::app()->session['H_USERID']:0;
																			$model->comment= $comment;
																			$model->indate= $timestamp;
																			$model->last_updated= $timestamp;
																			$model->comment_status= "P";
																			$model->type= "news";
																					if($error == '')
																					{
																					$model->save(false);
																					Yii::app()->user->setFlash('success', "Comment has been sent for the Approval.");
																					}
																					else
																							{
																							Yii::app()->user->setFlash('success'," Captcha You Entered is Invalid");
																							}
																					
																					
																					$this->redirect(array('news/details/id/' . $id));
																			}
																			
																			
																			if(isset($id) && $id!='')
																			{
																				$commentArr= Yii::app()->db->createCommand()
																									->select('*')
																									->from('tbl_aa_comments')
																									->where("artist_id = :id AND comment_status = 'H' and type=:type", array(':id' => $id,':type'=>'news'))
																									->queryAll();
																			}
	
			$id_array = array();
			for($i=0;$i<count($newsall);$i++)
			{
			$id_array[] = $newsall[$i]['Press_id'];
			}
			sort($id_array);
			
			
		if($error == '')
		{	
		$this->render('newsdetail',array(
			'model'=>$model,
			'news'=>$news,
			'id'=>$id,
			'id_array'=>$id_array,
			'commentArr'=>$commentArr,
		));
		}
		
			if($error != '')
		{	
		$this->render('newsdetail',array(
			'news'=>$news,
			'id'=>$id,
			'id_array'=>$id_array,
			'commentArr'=>$commentArr,
			'model'=>$model,
			'error'=>$error,
			'captchaVal'=>$captchaVal
		));
		}
		
	}
	
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}