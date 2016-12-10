<?php

class ProfileController extends Controller
{
	public function actionIndex()
	{
	
		$this->locationtop= 35;
		$this->locationright= 36;
	
		if(!isset (Yii::app()->session['H_USERID'])){
			$this->redirect(array('site/index'));
			}
	
	
		$this->layout='column1';
		
		$id=Yii::app()->session['H_USERID'];
		
		//$id=27;
		
		//echo $id;exit;
		
		$profile=Yii::app()->db->createCommand()
											->select('*')
											->from('tbl_user_profile')
											->where('USER_ID=:user_id',array(':user_id'=>$id))
											->queryAll();
		
		
		
		
		$this->render('index',array(
		'profile'=>$profile
		));
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