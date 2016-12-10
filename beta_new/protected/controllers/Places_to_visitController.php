<?php

class Places_to_visitController extends Controller
{


  public $layout = '//layouts/place_to_visit';
  public $detail = '';
  public $activemenu ="places";
	public function actionIndex($type='')
	{
		$this->layout = '//layouts/place_to_visit';
		
		$activetab = 0;
	
	if($type == "islands-at-andaman")
	{
		$activetab = 0;
	}
	if($type == "beaches-at-andaman")
	{
		$activetab = 1;
	}
	if($type == "monuments-at-andaman")
	{
		$activetab = 2;
	}
	if($type == "parks-and-shopping-points")
	{
		$activetab = 3;
	}
		
		$common_model  = New Common_model;
		
		$result['place_to_visit_Islands']=$common_model->fetch_place_to_visit_listing('Islands');
		$result['place_to_visit_Beaches']=$common_model->fetch_place_to_visit_listing('Beaches');
		$result['place_to_visit_Monument_Museums']=$common_model->fetch_place_to_visit_listing('Monument & Museums');
		$result['place_to_visit_Parks_Shopping_Points']=$common_model->fetch_place_to_visit_listing('Parks & Shopping Points');

			// echo "<pre>";print_r($result);exit;
		
		
		$this->render('index',array(
		'result'=>$result,
		'activetab'=>$activetab
		));
	}
	
	public function actionDetail($id=0)
	{
	
	$category = isset($_GET['category']) ? $_GET['category'] : '' ;
	$name = isset($_GET['name'])? $_GET['name'] : '';
	
	$category = str_replace('-and-',' & ',$category);
	$name = str_replace('-and-',' & ',$name);

	
	// echo $category."<br>";
	// echo $name."<br>";exit;
	
	$place_to_visit=Yii::app()->db->createCommand()
								->select('id')
								->from('place_to_visit')
								->where('category_name=:catetory and place_name=:name',array(strtolower(':catetory')=>strtolower(str_replace('-',' ',$category)),strtolower(':name')=>strtolower(str_replace('-',' ',$name))))
								
								->queryAll();
		
	
	if(count($place_to_visit)>0)
	{
		$id = $place_to_visit[0]['id'];
	}
								
	$this->layout = '//layouts/place_to_visit_detail';
	
	$common_model  = New Common_model;
	$result['detail']=$common_model->fetch_place_to_visit_detail($id);
	
	// echo "<pre>";print_r($result);exit;
	
	if(count($result['detail']) ==0)
	{
		$this->redirect(Yii::app()->user->returnUrl);
	}
	$this->detail = $result;
	
		$this->render('detail',array(
		'result'=>$result
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