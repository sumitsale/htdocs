<?php

class FindmusicController extends Controller
{
	public function actionIndex()
	{
	
		$this->locationtop = 64;
		$this->locationright = 65;
	
		$findmusic='';
		
		
		if(file_exists(Yii::app()->basePath . '/../xml/frontend/firstmusic.xml'))
		
		{
		
		
					$findmusic=simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/firstmusic.xml');
	
	
	    }
		
		// echo "<pre>";
		// print_r($findmusic);exit;
		$this->render('index',array(
		'findmusic'=>$findmusic,
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