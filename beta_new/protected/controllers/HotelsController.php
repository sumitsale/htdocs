<?php

class HotelsController extends Controller
{

  public $layout = '';
  public $activemenu ="hotel";
  public $detaildata ="";
  
	public function actionIndex_temp()
	{
	
	$this->layout = '//layouts/hotel';
	
		$common_model  = New Common_model;
		
		$result['hotel_listing']=$common_model->fetch_hotel_listing();
		
		// echo "<pre>";print_r($result['package_listing']);exit;
		$this->render('index',array(
			'result'=>$result,
		));
	}
	
	public function actionIndex()
	{
	
	$this->layout = '//layouts/hotel';
	
		$common_model  = New Common_model;
		
		// $result['hotel_listing']=$common_model->fetch_hotel_listing();
		
		$result['PortBlair']=$common_model->hotel_listing_by_city("Port Blair");
		$result['HavelockIsland']=$common_model->hotel_listing_by_city("Havelock Island");
		$result['NeilIsland']=$common_model->hotel_listing_by_city("Neil Island");
		$result['Diglipur']=$common_model->hotel_listing_by_city("Diglipur");
		
		// echo "<pre>";print_r($result);exit;
		// $this->render('index',array(
			// 'result'=>$result,
		// ));
		
		$this->render('indextab',array(
			'result'=>$result,
		));
	}
	public function actionDetail($id='')
	{
	
	$category = isset($_GET['category']) ? $_GET['category'] : '' ;
	$name = isset($_GET['name'])? $_GET['name'] : '';
	
	$category = str_replace('-and-',' & ',$category);
	$name = str_replace('-and-',' & ',$name);
	
	// echo $category."<br>";
	// echo $name."<br>";exit;
	
	
	$hotel_listing=Yii::app()->db->createCommand()
								->select('id')
								->from('hotel')
								->where('city=:catetory and hotel_name=:name',array(strtolower(':catetory')=>strtolower(str_replace('-',' ',$category)),strtolower(':name')=>strtolower(str_replace('-',' ',$name))))
								
								->queryAll();
	
		if(count($hotel_listing)>0)
	{
		$id = $hotel_listing[0]['id'];
	}
			$this->layout = '//layouts/hotel_detail';
	 
			$common_model  = New Common_model;
		
		$result['detail']=$common_model->fetch_hotel_detail($id);
		
		
		if(count($result['detail']) == 0)
		{
			$this->redirect(Yii::app()->homeUrl);
		}
		
		$result['hotel_room']=$common_model->fetch_hotel_room($result['detail'][0]['id']);
		// echo "<pre>";print_r($result);exit;
		
		$this->detaildata = $result;
		
		$this->render('detail',array(
			'result'=>$result,
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