<?php

class PackagesController extends Controller
{

  public $layout = '//layouts/packages';
  public $detaildata = '';
   public $activemenu ="packages";
  
	public function actionIndex($type="")
	{
	$common_model  = New Common_model;
		
	$activetab = 0;
	
	if($type== '')
	{
	$type = "holiday-packages";
	$result['list']=$common_model->fetch_package_listin_based_on_categegory('HOLIDAY PACKAGES');
	}
	
	if($type == "holiday-packages")
	{
		$activetab = 0;
		$result['list']=$common_model->fetch_package_listin_based_on_categegory('HOLIDAY PACKAGES');
	}
	if($type == "honeymoon-packages")
	{
		$activetab = 1;
		 $result['list']=$common_model->fetch_package_listin_based_on_categegory('HONEYMOON PACKAGES');
	}
	if($type == "water-sports-packages")
	{
		$activetab = 2;
		$result['list']=$common_model->fetch_package_listin_based_on_categegory('WATER SPORTS PACKAGES');
	}
	if($type == "special-packages-with-air-fair")
	{
		$activetab = 3;
		 $result['list']=$common_model->fetch_package_listin_based_on_categegory('SPECIAL PACKAGES WITH AIR FAIR');
	}
	// echo $activetab;
	$this->layout = '//layouts/packages';
	
	
	// $result['package_listing_holiday']=$common_model->fetch_package_listin_based_on_categegory('HOLIDAY PACKAGES');
	// $result['package_listing_honeymoon']=$common_model->fetch_package_listin_based_on_categegory('HONEYMOON PACKAGES');
	// $result['package_listing_confernese']=$common_model->fetch_package_listin_based_on_categegory('WATER SPORTS PACKAGES');
	// $result['package_listing_special_packages']=$common_model->fetch_package_listin_based_on_categegory('SPECIAL PACKAGES WITH AIR FAIR');
	
	 // echo "<pre>";print_r($result);exit;

		$this->render('index',array(
		'result'=>$result,
		'activetab'=>$activetab,
		'type'=>$type,
		'common_model'=>$common_model,
		
		));
	}
	
	public function actionDetail($id='')
	{
	
	// echo "<pre>";
	// print_r($_GET);exit;
	
	$category = isset($_GET['category']) ? $_GET['category'] : '' ;
	$name = isset($_GET['name'])? $_GET['name'] : '';
	
	$name = explode('-',$name);
	
	
	unset($name[count($name)-1]);
	unset($name[count($name)-1]);
	
	$name = implode('-',$name);
	
	$category = str_replace('-and-',' & ',$category);
	$name = str_replace('-and-',' & ',$name);

	
	// echo $category."<br>";
	// echo $name."<br>";exit;
	
	$packages=Yii::app()->db->createCommand()
								->select('id')
								->from('packages')
								->where('category_name=:catetory and package_name=:name',array(strtolower(':catetory')=>strtolower(str_replace('-',' ',$category)),strtolower(':name')=>strtolower(str_replace('-',' ',$name))))
								
								->queryAll();
		
	
	if(count($packages)>0)
	{
		$id = $packages[0]['id'];
	}
	
	
	
	
	$common_model  = New Common_model;
	
	$result['detail']=$common_model->package_detail($id);
	
	
	if(count($result['detail']) == 0)
	{
		$this->redirect(Yii::app()->user->returnUrl);
	} 
	$result['itinerary']=$common_model->package_detail_itinerary($result['detail'][0]['id']);
	$result['hotel_listing']=$common_model->hotel_listing($result['detail'][0]['hotel_id']);
	
	
	$this->layout = '//layouts/package_detail';
	// echo $id;exit;
	// if($result['detail'][0]['category_name'] == "SPECIAL PACKAGES WITH AIR FAIR")
	// {
		$result['rate_and_fair_data'] = $common_model->rate_and_fair_detail($id);
		$result['city'] = $common_model->fetch_city($id);
	
	// }
	
	// $week_number = 1;
// $year = 2015;
	// for($day=1; $day<=7; $day++)
// {
    // echo date('m/d/Y', strtotime($year."W".$week_number.$day))."\n";
// }exit;
	
	// echo "<pre>";print_r($result);exit;	
	
	 $this->detaildata =$result;
	
	
		$this->render('detail',array(
		'result'=>$result,
		'common_model'=>$common_model,
		));
	}
	
	public function actionChange_city()
	{
	// echo "<pre>";
	// print_r($_POST);
	
	$city_name = $_POST['city_name'];
	$package_id = $_POST['package_id'];
	
	$common_model  = New Common_model;
	
	$result['rate_and_fair_data'] = $common_model->rate_and_fair_detail_by_city_and_package($city_name,$package_id);
	
	$result['city'] = $common_model->fetch_city($package_id);
	
	
		 // echo "<pre>";print_r($result);exit;	
	
	 $res = $this->renderPartial('change_city', array(
        'result' => $result
            ));
    echo $res;
	}
	
	public function actionChange_month()
	{
	
	
	$city_name = $_POST['city_name'];
	$package_id = $_POST['package_id'];
	$month = $_POST['month'];
	
	$common_model  = New Common_model;
	
	$result['rate_and_fair_data'] = $common_model->rate_and_fair_detail_by_city_and_package($city_name,$package_id);
	
	$result['city'] = $common_model->fetch_city($package_id);
	
	
	
	 $res = $this->renderPartial('change_month', array(
        'result' => $result,
        'month' => $month
            ));
    echo $res;
	
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