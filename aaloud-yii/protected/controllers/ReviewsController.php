<?php

class ReviewsController extends Controller
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

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionListing()
	{
		$this->layout='column1';
		$this->render('reviewlisting');
	}
	
	public function actionDetails()
	{
		$this->layout='column1';
		
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
																			$model->type= "review";
																					if($error == '')
																					{
																					$model->save(false);
																					Yii::app()->user->setFlash('success', "Comment has been sent for the Approval.");
																					}
																					else
																							{
																							Yii::app()->user->setFlash('success'," Captcha You Entered is Invalid");
																							}

																					$this->redirect(array('reviews/details/id/' . $id));
																			}
																			
																			
																			if(isset($id) && $id!='')
																			{
																				$commentArr= Yii::app()->db->createCommand()
																									->select('*')
																									->from('tbl_aa_comments')
																									->where("artist_id = :id AND comment_status = 'H' and type=:type", array(':id' => $id,':type'=>'review'))
																									->queryAll();
																			}
		if($error=='')
		{
		$this->render('reviewdetail',array(
					'model'=>$model,
					'commentArr'=>$commentArr,
					));
		}
		if($error!='')
		{
		$this->render('reviewdetail',array(
					'error'=>$error,
					'captchaVal'=>$captchaVal,
					'commentArr'=>$commentArr,
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