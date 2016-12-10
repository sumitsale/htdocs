<?php

class SpecificationController extends Controller
{
	public $layout = '//layouts/specification';
	
	public function actionIndex($master_category_name,$master_brand_name,$id)
	{
		// echo "<pre>";
		// print_r($_GET);
		// exit;
		
		$id 					= $_GET['id'];
		$master_category_name 	= $_GET['master_category_name'];
		$master_brand_name		= $_GET['master_brand_name'];
		
		$commanmodel 	= new Commanmodel(); 
		
		$data  			=  $commanmodel->fetch_brand_by_category(16,0,$id,$master_category_name,$master_brand_name);
		$data['detail']	=  $commanmodel->fetch_brand_details($id);
		$data['specification_main_category']	=  $commanmodel->fetch_brand_specification($id);
		
		
		// echo "<pre>";
		// print_r($data);exit;
		// echo $master_category_name;exit;
	
		$this->render('index',array(
		'data'=>$data,
		'id'=>$id,
		'master_category_name'=>$master_category_name,
		'master_brand_name'=>$master_brand_name,
		'commanmodel'=>$commanmodel,
		));
	}
	
		public  function actionPagination()
	{
		$this->layout =false;
		
		$start = $_POST['start'];
		$id = $_POST['id'];
		$master_category_name = $_POST['master_category_name'];
		$master_brand_name = $_POST['master_brand_name'];
	
		$commanmodel = new Commanmodel(); 
		
		$data  =  $commanmodel->fetch_brand_by_category(16,$start,$id,$master_category_name,$master_brand_name);
	
	
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