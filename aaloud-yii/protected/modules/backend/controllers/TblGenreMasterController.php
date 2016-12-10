<?php

class TblGenreMasterController extends Controller
{
public $formfield;
public function actionIndex()
{
	$this->render('index');
}
	
public function actionAdd_genre_banner()
{
	$this->render('add_genre_banner');
}

public function actionSelectOneGenre()
{
	$this->layout=false;
	$this->render('selectOneGenre');
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