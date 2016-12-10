<?php

class TestimonialController extends Controller
{

 public $layout = '//layouts/testimonial';
 public $detail = '';
 public $activemenu ="";
 
	public function actionIndex($page=1)
	{
	
		if(isset($_GET['page']) && $_GET['page']!='')
		{
		$curr_page = $_GET['page'];
		$start = ($curr_page*10)-10;
		$limit =10;
		
		}
		else
		{
		$curr_page =1;
		$start = 0;
		$limit = 10;
		}
	
		
		$common_model  = New Common_model;
		
		$result['testimonial_list']	=	$common_model->fetch_testimonial($start,$limit);
		$result['count']			=	$common_model->fetch_testimonial_count();
		$result['curr_page']		=	$curr_page;
		$result['total_page']		=	ceil($result['count']/10);
		
		$this->render('index',array(
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