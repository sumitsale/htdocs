<?php

class ReviewsController extends Controller
{
	public $layout = '//layouts/reviews';

	public function actionIndex()
	{
		$commanmodel = new Commanmodel(); 
		
		$data  =  $commanmodel->fetch_reviews(16,0);
		
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
		
		$data  =  $commanmodel->fetch_reviews(16,$start);
	
	
		$result = $this->render('pagination',array(
		'data'=>$data));
		
		echo $result;
	
	}
	
	public function actionDetail($id)
	{
	
		$this->layout = "//layouts/review_detail";
		
		$commanmodel 	= new Commanmodel(); 
		
		$data  			=  $commanmodel->fetch_reviews(15,0,$id);
		$data['detail']	=  $commanmodel->fetch_reviews_details($id);
		
		
		// echo "<pre>";
		// print_r($data);exit;
	
		
		
		$this->render('detail',array(
		'data'=>$data));
	}
	
	public  function actionDetailpagination()
	{
		$this->layout =false;
		
		$start = $_POST['start'];
		$id = $_POST['id'];
	
		$commanmodel = new Commanmodel(); 
		
		$data  =  $commanmodel->fetch_reviews(15,$start,$id);
	
	
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