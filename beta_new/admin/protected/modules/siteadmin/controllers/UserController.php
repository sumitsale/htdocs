<?php

class UserController extends Controller
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
				'actions'=>array('index','view','reset_password','forgot_password'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','changepassword'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
	
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

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
		$model=User::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
		public function actionChangepassword()
		{
				$user = Yii::app()->user->id; 
				
				//echo $user;
			
				$model=new User('changepassword');

				// uncomment the following code to enable ajax-based validation
				/*
				if(isset($_POST['ajax']) && $_POST['ajax']==='user-changepassword-form')
				{
						echo CActiveForm::validate($model);
						Yii::app()->end();
				}
				*/

				if(isset($_POST['User']))
				{
						$model->attributes=$_POST['User'];
				
				//print_r($_POST['User']);exit;
						if($model->validate())
						{
						$newpass = md5($_POST['User']['old_password']);
										
				/*$sql="SELECT * FROM user WHERE id=$user";
				$connection = Yii::app()->db;
				$command = $connection->createCommand($sql);
				$results = $command->queryAll();*/
				
				$results = Yii::app()->db->createCommand()
									->select('*')
									->from('user')
									->where('id=:id',array(':id'=>$user))
									->queryAll();
				
				 // echo "<pre>";
				 // print_r($results);exit;
			
				if($results[0]['password'] == $newpass)
				{					
										if($_POST['User']['new_password'] == $_POST['User']['con_password'])
										{
										$password = md5($model->new_password);
										
										// the validation has already been done, skipping it with save(false):
										
										
										$sql=Yii::app()->db->createCommand()
																 ->update('user',
																	array('password'=>$password),
																		 'id=:id',array(':id'=>$user));
										
														if(count($sql)!=0)
														{
														Yii::app()->user->setFlash('success',"Your Password has been changed successfully!");
														}
										}
										else
										{
											Yii::app()->user->setFlash('success',"New Password & Confirm Password are not Same!");
										}
				}
				else
				{
				Yii::app()->user->setFlash('success',"Old Password Entered is not same as your Current Password !!");
				}
									
								// form inputs are valid, do something here
								
						}
				}
				$this->render('changepassword',array('model'=>$model));
		}

	
		public function actionForgot_password()
		{

				$model=new User('forgotpassword');

				// uncomment the following code to enable ajax-based validation
				/*
				if(isset($_POST['ajax']) && $_POST['ajax']==='user-forgot_password-form')
				{
						echo CActiveForm::validate($model);
						Yii::app()->end();
				}
				*/

				if(isset($_POST['User']))
				{
						$model->attributes=$_POST['User'];
						if($model->validate())
						{
						$email = $model->email;
						$condition = "email = '".$email."' AND status = '1'";
							
													$resultArr=User::model()->find($condition);
													
						
										if(count($resultArr)==0)
										{
											
										Yii::app()->user->setFlash('success', "This email id is not exist");
										$this->redirect('forgot_password');
										}
										
										
										$code = md5(uniqid(rand(), true));
										
										
										$userId = $resultArr->id;
										
										$link = "user/reset_password/".base64_encode($userId)."/".base64_encode($code)."";
									
										$model=$this->loadModel($userId);
										$model->activkey =  $code;
										$dateTimeValue  							 = date('Y-mm-d H:i:s');
										$model->createtime = $dateTimeValue;
										//$model->save();
										$updateResult = $model->save(false);
							
										if($updateResult)
										{
						
										$mailResult = $this->_sendForgotPasswordMail($link,$email);
										
										}
										
										Yii::app()->user->setFlash('success',"Mail is sent on the given email address, read the email and follow the instructions to reset your password");
										//$this->redirect(array('site/login'));
										$this->refresh();
								// form inputs are valid, do something here
								return;
						}
				}
				$this->render('forgot_password',array('model'=>$model));
		}

		public function actionReset_password()
		{
			$param = $_GET;
			foreach($param as $key=>$value)
			{
			$userId = base64_decode($key);
			$key = base64_decode($value);
			}


					$model=new User('resetpassword');
					if(isset($_POST['User']))
					{
						$model->attributes=$_POST['User'];
							if($model->validate())
							{
								$condition = "id = '".$userId."' AND status = '1' AND activkey = '".$key."'";
								$resultArr = User::model()->find($condition);
								
								if(count($resultArr)>0)
								{
								$model=$this->loadModel($userId); 
								$model->password = $_POST['User']['password'];
								$model->save(false);
								Yii::app()->user->setFlash('success',"Your password has been changed successfully");
											//$this->redirect(array('site/login'));
											$this->refresh();
								}
							}
					}
				$this->render('reset_password',array('model'=>$model));
		}
		
		
	function _sendForgotPasswordMail($link,$to)
	{

		$email = Yii::app()->email;
			 $email->to 		= $to;
			 $email->subject  = "Forgot Password";  //Configure::read('FRGT_SUBJECT');
		
			 $email->from 	= "gyan.p@fortune4technologies.com";   //Configure::read('Admin.email');
			// $email->bcc 	 =  "gyan.p@fortune4technologies.com";   //Configure::read('Admin.bcc');
				$email->message = "<a href='http://elearn.welingkar.org/pmswellingkar/index.php/".$link."'>".$link."</a>";
			 $result = $email->send();
			 if($result)
			 {
				return true;
			 }
			 else
			 {
				return false;
			 }

	}


}
