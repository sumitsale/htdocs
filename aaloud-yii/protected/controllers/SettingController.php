<?php

class SettingController extends Controller
{
	public function actionIndex()
	{
	
	$this->locationtop= 41;
	$this->locationright= 42;
	
	if(!isset (Yii::app()->session['H_USERID'])){
			$this->redirect(array('site/index'));
			}
			
			
		$this->layout='column1';
		
		$id=Yii::app()->session['H_USERID'];
		
		//echo $id;exit;
		
		//$id=211643;
	
		$model=new UserProfile;
		
		$model1=new Users;
		
		$model2=new TblUserArtist;
		
		//print_r($model1->attributes);exit;
		
	$profile=Yii::app()->db->createCommand()
											->select('*')
											->from('tbl_user_profile')
											->where('USER_ID=:user_id',array(':user_id'=>$id))
											->queryAll();
		if(count($profile)>0)
		{
					
					$model=$this->loadModel($id);
		}	
					
					
					
					$sql=Yii::app()->db->createCommand()
											->select('*')
											->from('a_users')
											->where('A_USER_ID=:user_id',array(':user_id'=>$id))
											->queryAll();
											
										if(count($sql)>0)
										{
										$model1=$this->loadModel1($id);
										}
					
					$sql2=Yii::app()->db->createCommand()
											->select('*')
											->from('tbl_user_artist')
											->where('USER_ID=:user_id',array(':user_id'=>$id))
											->queryAll();
											
											if(count($sql2)>0)
											{
											$model2=$this->loadmodel2($id);
											} 
		
		$this->render('index',array(
		'model'=>$model,
		'model1'=>$model1,
		'model2'=>$model2,
		));
	}
	
	public function actionEditprofile()
	{
	
	//print_r($_POST);exit;
	$model=new UserProfile;
		
	
	
	
	$id=Yii::app()->session['H_USERID'];
	
	//echo $id;exit;
		$profile=Yii::app()->db->createCommand()
											->select('*')
											->from('tbl_user_profile')
											->where('USER_ID=:user_id',array(':user_id'=>$id))
											->queryAll();
											
											
		if(count($profile)>0)
		{
			


												$model=$this->loadModel($id);
												
												//print_r($model->attributes);exit;
												

												$model->NICK_NAME = $_POST['nickname'];
												$model->PROFILE_IMAGE = $_FILES['profileimage']['name'];
												$model->ABOUT_YOU = $_POST['Aboutyou'];
												$model->MUSIC_YOU_LIKE = $_POST['musicyoulike'];
												$model->FAV_ARTIST = $_POST['favoriteartist'];
												$model->LAST_UPDATED = time();
												
												if(isset($_FILES['profileimage']['name']) && $_FILES['profileimage']['name']!="")	
													{													
															$model1->PROFILE_IMAGE = $_FILES['profileimage']['name'];
															if(!is_dir("images/profileimage"))
															{
															 mkdir("images/profileimage" , 0777);
															}
															
															if(!is_dir("images/profileimage/".$id))
															{
															 mkdir("images/profileimage/".$id , 0777);
															}
														
															move_uploaded_file($_FILES['profileimage']['tmp_name'],
																					"images/profileimage/".$id."/" . $_FILES['profileimage']['name']);
																					
																					
																					
															$image = Yii::app()->image->load(Yii::app()->basePath . '/../images/profileimage/'.$id."/" . $_FILES['profileimage']['name']);			
															$image->resize(200, 200);
															$image->save();
													}
													
														$model->save();
						
		}
			else				
		{										$model->USER_ID=$id;
												$model->NICK_NAME = $_POST['nickname'];
												$model->PROFILE_IMAGE = $_FILES['profileimage']['name'];
												$model->ABOUT_YOU = $_POST['Aboutyou'];
												$model->MUSIC_YOU_LIKE = $_POST['musicyoulike'];
												$model->FAV_ARTIST = $_POST['favoriteartist'];
												$model->LAST_UPDATED = time();
												
												if(isset($_FILES['profileimage']['name']) && $_FILES['profileimage']['name']!="")	
													{													
															$model1->PROFILE_IMAGE = $_FILES['profileimage']['name'];
															if(!is_dir("images/profileimage"))
															{
															 mkdir("images/profileimage" , 0777);
															}
															
															if(!is_dir("images/profileimage/".$id))
															{
															 mkdir("images/profileimage/".$id , 0777);
															}
														
															move_uploaded_file($_FILES['profileimage']['tmp_name'],
																					"images/profileimage/".$id."/" . $_FILES['profileimage']['name']);
																					
																					
																					
															$image = Yii::app()->image->load(Yii::app()->basePath . '/../images/profileimage/'.$id."/" . $_FILES['profileimage']['name']);			
															$image->resize(200, 200);
															$image->save();
													}
													
														$model->save();
						
        }		
		
	echo "200";
	

	}
	
	
	public function actionEditaccount()
		{
		
		$id=Yii::app()->session['H_USERID'];
		
		$model1=new Users;
		
		$model2=new TblUserArtist;
		
		$sql=Yii::app()->db->createCommand()
											->select('*')
											->from('a_users')
											->where('A_USER_ID=:user_id',array(':user_id'=>$id))
											->queryAll();
											
											if(count($sql)>0)
									{
											$model1=$this->loadModel1($id);
												$model1->A_EMAIL_ID  = $_POST['emailid'];
																					$model1->A_FIRST_NAME = $_POST['firstname'];
																					$model1->A_LAST_NAME  = $_POST['lastname'];
																					$model1->A_MOBILE_NO  = $_POST['mobile'];
																					
																					$model1->save(false);
																				
									}	
									else
									{
																					$model1->A_USER_ID=$id;
																					$model1->A_EMAIL_ID  = $_POST['emailid'];
																					$model1->A_FIRST_NAME = $_POST['firstname'];
																					$model1->A_LAST_NAME  = $_POST['lastname'];
																					$model1->A_MOBILE_NO  = $_POST['mobile'];
																					$model1->A_INDATE=time();
																					
																					$model1->save(false);
									}

									
									$sql2=Yii::app()->db->createCommand()
											->select('*')
											->from('tbl_user_artist')
											->where('USER_ID=:user_id',array(':user_id'=>$id))
											->queryAll();
											
											if(count($sql2)>0)
											{
											
												$model2=$this->loadmodel2($id);

												$model2->USER_AGE=$_POST['age'];
												$model2->USER_GENDER=$_POST['gender'];	
												$model2->USER_CITY=$_POST['city'];
												$model2->USER_COUNTRY=$_POST['country'];

												$model2->save(false);
												
											}
											else
											{
												$model2->USER_ID=$id;
												$model2->USER_AGE=$_POST['age'];
												$model2->USER_GENDER=$_POST['gender'];	
												$model2->USER_CITY=$_POST['city'];
												$model2->USER_COUNTRY=$_POST['country'];

												$model2->save(false);
												
											}
			
				echo "200";
		
		}	
	
			
			public function loadModel($id)
			{
				$model=UserProfile::model()->findByPk($id);
				if($model===null)
					throw new CHttpException(404,'The requested page does not exist.');
				return $model;
			}
			
	
				public function loadModel1($id)
			{
				$model=Users::model()->findByPk($id);
				if($model===null)
					throw new CHttpException(404,'The requested page does not exist.');
				return $model;
			}
			
			
			
			
			
				public function loadModel2($id)
			{
				$model=TblUserArtist::model()->findByPk($id);
				if($model===null)
					throw new CHttpException(404,'The requested page does not exist.');
				return $model;
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