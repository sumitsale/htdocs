<?php

class NewsController extends Controller
{
	public $layout = '//layouts/news';
	
	public function actionIndex()
	{
	
		$commanmodel = new Commanmodel(); 
		
		$data  =  $commanmodel->fetch_news(16,0);
		
		// echo "<pre>";
		// print_r($data);exit;
	
		
		$this->render('index',array(
		'data'=>$data));
	}
	
	public  function actionPagination()
	{
		$this->layout =false;
		
		$start = $_POST['start'];
	
		$commanmodel = new Commanmodel(); 
		
		$data  =  $commanmodel->fetch_news(16,$start);
	// echo "<pre>";
	// print_r($data);exit;
	
		$result = $this->render('pagination',array(
		'data'=>$data));
		
		echo $result;
	
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