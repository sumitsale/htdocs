<?php

class BrandsController extends Controller
{
	public $layout = '//layouts/brands';
	
	public function actionIndex()
	{
	
		$commanmodel = new Commanmodel(); 
		
		$data  =  $commanmodel->fetch_brand(16,0);
		
		// echo "<pre>";
		// print_r($data);exit;
	
	
		$this->render('index',array(
		'data'=>$data,
		'commanmodel'=>$commanmodel,
		));
	}
	
	public  function actionPagination()
	{
		$this->layout =false;
		
		$start = $_POST['start'];
	
		$commanmodel = new Commanmodel(); 
		
		$data  =  $commanmodel->fetch_brand(16,$start);
	
	
		$result = $this->render('pagination',array(
		'data'=>$data,
		'commanmodel'=>$commanmodel,
		));
		echo $result;
	
	}
	
	
	public function actionCategory($master_category_name,$master_brand_name)
	{
	
	
		$commanmodel = new Commanmodel(); 
		
		$data  =  $commanmodel->fetch_brand_by_category(15,0,0,$master_category_name,$master_brand_name);
		
		
		$this->render('category',array(
		'data'=>$data,
		'commanmodel'=>$commanmodel,
		'master_category_name'=>$master_category_name,
		'master_brand_name'=>$master_brand_name,
		));
	}
	
	
	public  function actionCategory_pagination()
	{
		$this->layout =false;
		
		$start = $_POST['start'];
		$master_category_name = $_POST['master_category_name'];
		$master_brand_name = $_POST['master_brand_name'];
	
		$commanmodel = new Commanmodel(); 
		
		$data  =  $commanmodel->fetch_brand_by_category(15,$start,0,$master_category_name,$master_brand_name);
	
	
	// echo "<pre>";
		// print_r($data);exit;
	
		$result = $this->render('categorypagination',array(
		'data'=>$data,
		'commanmodel'=>$commanmodel,
		'master_category_name'=>$master_category_name,
		'master_brand_name'=>$master_brand_name,
		));
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