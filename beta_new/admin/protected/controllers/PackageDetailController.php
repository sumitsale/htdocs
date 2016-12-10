<?php

class PackageDetailController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','deleteitinerary','rate_and_fair','submit',
				'rate_list','delete_data','update_rate','submit_udate_rate','new_rate_list',
				'add_data_for_package','submit_add_data_for_package','delete_data_for_package'
				,'honeymoon_rate_list','submit_honeymoon_rate_list',
				'submit_holiday_rate_list','holiday_rate_list'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionSubmit_holiday_rate_list()
	{
	
	
	$rate_list =Yii::app()->db->createCommand()
								->select('*')
								->from('package_rate_and_fair')
								->where('package_id=:id',array(':id'=>$_POST['package_id']))
								->queryAll();
	
	
	if(count($rate_list) == 0)
	{
	$model = new PackageRateAndFair;
	
	
	
	$model->city =    isset($_POST['city']) ? $_POST['city'] : '';
	$model->rate = json_encode($_POST['rate']);
	$model->available_date = isset($_POST['available']) && $_POST['available']!='' ? json_encode($_POST['available']) : '';
	$model->package_id = $_POST['package_id'];
	$model->default_list = isset($_POST['default_city']) ? $_POST['default_city'] : "Yes";
	$model->default_month = isset($_POST['default_month']) && $_POST['default_month']!='' ? $_POST['default_month'] : "";
	$model->rate_and_fair_notes = isset($_POST['rate_and_fair_notes']) ? $_POST['rate_and_fair_notes'] : '';
	$model->date_added = date("Y-m-d H:i:s");
	$model->date_modified = date("Y-m-d H:i:s");
	
	$model->save(false);
		 Yii::app()->user->setFlash('success', "<h1>Rate and Fair added successfully.</h1>");
                $this->redirect(array('packageDetail/rate_list/'.$_POST['package_id']));
				
				
	}
	else{
	
	$result = Yii::app()->db->createCommand()
							->update('package_rate_and_fair', 
								array('city' =>isset($_POST['city']) ? $_POST['city'] : '',
									'rate' =>json_encode($_POST['rate']),
									'default_list' =>isset($_POST['default_city']) ? $_POST['default_city'] :'Yes',
									'default_month' =>isset($_POST['default_month']) ? $_POST['default_month'] : '',
									'available_date' =>isset($_POST['available']) ? json_encode($_POST['available']) : '',
									'rate_and_fair_notes' =>isset($_POST['rate_and_fair_notes']) ? $_POST['rate_and_fair_notes'] :'',
									'date_modified' =>date("Y-m-d H:i:s"),
									), 
								'id =:id', array(':id' => $rate_list[0]['id']));
	
	
	
	 Yii::app()->user->setFlash('success', "<h1>Rate and Fair updated successfully.</h1>");
                $this->redirect(array('packageDetail/rate_list/'.$rate_list[0]['package_id']));
				
	
	}
	
	

	}
	
	
	public function actionholiday_rate_list($id)
	{
	
		
		$package=Yii::app()->db->createCommand()
								->select('*')
								->from('packages')
								->where('id=:id',array(':id'=>$id))
								->queryAll();
		
		$rate_list=Yii::app()->db->createCommand()
								->select('*')
								->from('package_rate_and_fair')
								->where('package_id=:id',array(':id'=>$id))
								->queryAll();
						
								
		$this->render('holiday_rate_list',array(
			'package'=>$package,
			'id'=>$id,
			'rate_list'=>$rate_list,
			
		));
	}
	
	public function actionSubmit_honeymoon_rate_list()
	{
	
	
	$rate_list =Yii::app()->db->createCommand()
								->select('*')
								->from('package_rate_and_fair')
								->where('package_id=:id',array(':id'=>$_POST['package_id']))
								->queryAll();
	
	
	if(count($rate_list) == 0)
	{
	$model = new PackageRateAndFair;
	
	
	
	$model->city =    isset($_POST['city']) ? $_POST['city'] : '';
	$model->rate = json_encode($_POST['rate']);
	$model->available_date = isset($_POST['available']) && $_POST['available']!='' ? json_encode($_POST['available']) : '';
	$model->package_id = $_POST['package_id'];
	$model->default_list = isset($_POST['default_city']) ? $_POST['default_city'] : "Yes";
	$model->default_month = isset($_POST['default_month']) && $_POST['default_month']!='' ? $_POST['default_month'] : "";
	$model->rate_and_fair_notes = isset($_POST['rate_and_fair_notes']) ? $_POST['rate_and_fair_notes'] : '';
	$model->date_added = date("Y-m-d H:i:s");
	$model->date_modified = date("Y-m-d H:i:s");
	
	$model->save(false);
		 Yii::app()->user->setFlash('success', "<h1>Rate and Fair added successfully.</h1>");
                $this->redirect(array('packageDetail/rate_list/'.$_POST['package_id']));
				
				
	}
	else{
	
	$result = Yii::app()->db->createCommand()
							->update('package_rate_and_fair', 
								array('city' =>isset($_POST['city']) ? $_POST['city'] : '',
									'rate' =>json_encode($_POST['rate']),
									'default_list' =>isset($_POST['default_city']) ? $_POST['default_city'] :'Yes',
									'default_month' =>isset($_POST['default_month']) ? $_POST['default_month'] : '',
									'available_date' =>isset($_POST['available']) ? json_encode($_POST['available']) : '',
									'rate_and_fair_notes' =>isset($_POST['rate_and_fair_notes']) ? $_POST['rate_and_fair_notes'] :'',
									'date_modified' =>date("Y-m-d H:i:s"),
									), 
								'id =:id', array(':id' => $rate_list[0]['id']));
	
	
	
	 Yii::app()->user->setFlash('success', "<h1>Rate and Fair updated successfully.</h1>");
                $this->redirect(array('packageDetail/rate_list/'.$rate_list[0]['package_id']));
				
	
	}
	
	

	}
	
	
	public function actionhoneymoon_rate_list($id)
	{
	
		
		$package=Yii::app()->db->createCommand()
								->select('*')
								->from('packages')
								->where('id=:id',array(':id'=>$id))
								->queryAll();
		
		$rate_list=Yii::app()->db->createCommand()
								->select('*')
								->from('package_rate_and_fair')
								->where('package_id=:id',array(':id'=>$id))
								->queryAll();
						
								
		$this->render('honeymoon_rate_list',array(
			'package'=>$package,
			'id'=>$id,
			'rate_list'=>$rate_list,
			
		));
	}
	
	public function actionDelete_data_for_package()
	{
	$package=Yii::app()->db->createCommand()
								->select('*')
								->from('packages')
								->where('id=:id',array(':id'=>$_GET['package_id']))
								->queryAll();
	
	$result = json_decode($package[0][$_GET['package_name']],true);
	
	// echo "<pre>";
	// // // print_r($package);
	// print_r($result);
	// // // print_r($_GET);
	
	unset($result['list'][$_GET['listid']]);
	
	$listdata = array_values($result['list']);
	unset($result['list']);
	$result['list'] = $listdata;
	// print_r($result);exit;
	
	$package_data = json_encode($result); 
	$result = Yii::app()->db->createCommand()
							->update('packages', 
								array($_GET['package_name']=>$package_data,
									), 
								'id =:package_id', array(':package_id' => $_GET['package_id']));
	
	Yii::app()->user->setFlash('success', "<h1>Rate and Fair updated successfully.</h1>");
                $this->redirect(array('PackageDetail/add_data_for_package/package_id/'. $_GET['package_id'].'/package_name/'.$_GET['package_name']));
	
	}
	
	public function actionSubmit_add_data_for_package()
	{
	// echo "<pre>";
	// // print_r($_POST);
	$package=Yii::app()->db->createCommand()
								->select('*')
								->from('packages')
								->where('id=:id',array(':id'=>$_POST['package_id']))
								->queryAll();
	
	$result = json_decode($package[0][$_POST['package_name']],true);
	
	// var_dump($result);
	
	
	
	
	
	
	$temp_data['city'] = $_POST['city'];
	$temp_data['hotel'] = $_POST['hotel'];
	$temp_data['room_type'] = $_POST['room_type'];
	$temp_data['no_of_nights'] = $_POST['no_of_nights'];
	
	// $data['list'] = $temp_data;
	$data['price'] = $_POST['price'];
	
	// $data['list']=
		// print_r($data);
		// print_r($result);exit;
	
	if($result!='')
	{
	
		// $list = array_merge($result['list'],$data['list']);
			// print_r($list);exit;
		// $package_data ='';
		
		for($i=0;$i<count($result['list']);$i++)
		{
		
		$data['list'][$i]= $result['list'][$i];
		
		}
		
		
		
		$data['list'][count($result['list'])]= $temp_data;
		$package_data = json_encode($data);
		
		
	}
	else
	{
		$data['list'][0]= $temp_data;
		$package_data = json_encode($data);
	}
	
	
	$result = Yii::app()->db->createCommand()
							->update('packages', 
								array($_POST['package_name']=>$package_data,
									), 
								'id =:package_id', array(':package_id' => $_POST['package_id']));
	
	Yii::app()->user->setFlash('success', "<h1>Rate and Fair updated successfully.</h1>");
                $this->redirect(array('PackageDetail/add_data_for_package/package_id/'. $_POST['package_id'].'/package_name/'.$_POST['package_name']));
	
	
	}
	
	public function actionAdd_data_for_package($package_id,$package_name)
	{
	
	
		$package=Yii::app()->db->createCommand()
								->select('*')
								->from('packages')
								->where('id=:id',array(':id'=>$package_id))
								->queryAll();
		
		
								
		$hotel=Yii::app()->db->createCommand()
								->select('*')
								->from('hotel')
								->queryAll();
								
		$this->render('add_data_for_package',array(
			'package_name'=>$package_name,
			'package_id'=>$package_id,
			'package'=>$package,
			'hotel'=>$hotel,
			
		));
		
	}
	
	
	public function actionNew_rate_list($id)
	{
		
		
		$package=Yii::app()->db->createCommand()
								->select('*')
								->from('packages')
								->where('id=:id',array(':id'=>$id))
								->queryAll();
								
								
		$this->render('new_rate_list',array(
			'package'=>$package,
			'id'=>$id,
			
		));
	}
	
	public function actionUpdate_rate($id)
	{
	
	$rate_list=Yii::app()->db->createCommand()
								->select('*')
								->from('package_rate_and_fair')
								->where('id=:id',array(':id'=>$id))
								->queryAll();
		


	$city=Yii::app()->db->createCommand()
								->select('*')
								->from('city')
								//->where('hotel_id=:id',array(':id'=>$id))
								->queryAll();
			
								
			if(count($rate_list)==0)
				{
				$this->redirect(Yii::app()->homeUrl);
				}
	
		$this->render('update_rate',array(
			'rate_list'=>$rate_list,
			'city'=>$city,
			'id'=>$id,
		));
	
	}
	
		public function actionSubmit_udate_rate()
	{
	
	// echo "<pre>";
	// print_r($_POST);exit;
	
	if(isset($_POST['city']) && $_POST['city']!='')
	{
		$rate_list=Yii::app()->db->createCommand()
								->select('*')
								->from('package_rate_and_fair')
								->where('id=:id',array(':id'=>$_POST['id']))
								->queryAll();
	
	
	if($_POST['default_city'] == "Yes")
	{
		$result = Yii::app()->db->createCommand()
							->update('package_rate_and_fair', 
								array('default_list' =>'No',
									), 
								'package_id =:package_id', array(':package_id' => $rate_list[0]['package_id']));
	
	
	}
	
	
			$result = Yii::app()->db->createCommand()
							->update('package_rate_and_fair', 
								array('city' =>$_POST['city'],
									'rate' =>json_encode($_POST['rate']),
									'default_list' =>$_POST['default_city'],
									'default_month' =>isset($_POST['default_month']) ? $_POST['default_month'] : '',
									'available_date' =>isset($_POST['available']) ? json_encode($_POST['available']) : '',
									'rate_and_fair_notes' =>$_POST['rate_and_fair_notes'],
									'date_modified' =>date("Y-m-d H:i:s"),
									), 
								'id =:id', array(':id' => $_POST['id']));
	
	
	
	 Yii::app()->user->setFlash('success', "<h1>Rate and Fair updated successfully.</h1>");
                $this->redirect(array('packageDetail/rate_list/'.$rate_list[0]['package_id']));
	
	}
	else{
	
	     Yii::app()->user->setFlash('success', "<h1>Please select city.</h1>");
                $this->redirect(array('packageDetail/update_rate/'.$_POST['id']));
	}
	}

	
	public function actionDelete_data()
	{
	
	if(isset($_POST['id']))
			{
				$id =$_POST['id'];
				
				$command = Yii::app()->db->createCommand()
					 ->delete('package_rate_and_fair',
						'id =:id', array(':id'=>$id));
						
						echo 200;
			}
			
			
	}
	
	public function actionrate_list($id)
	{
	
	
	if(isset($_POST['rate_and_fair_notes']))
	{
	
	
	$result = Yii::app()->db->createCommand()
							->update('package_detail', 
								array('rate_and_fair_notes' =>$_POST['rate_and_fair_notes']
									), 
								'package_id =:id', array(':id' => $_POST['package_id']));
						
		$this->refresh();
	}
	
	$packages=Yii::app()->db->createCommand()
								->select('*')
								->from('packages')
								->where('id=:id',array(':id'=>$id))
								->queryAll();
	// echo "<pre>";
	// print_r($packages);exit;
	
	if(count($packages) >0)
	{
	
		
		if($packages[0]['category_id'] == 2)
		{
			  $this->redirect(array('packageDetail/honeymoon_rate_list/'.$id));
	
		}
		
		if($packages[0]['category_id'] == 1)
		{
			  $this->redirect(array('packageDetail/holiday_rate_list/'.$id));
	
		}
		
	}
	
	
	$rate_list=Yii::app()->db->createCommand()
								->select('*')
								->from('package_rate_and_fair')
								->where('package_id=:id',array(':id'=>$id))
								->queryAll();
	
	
	$package_detail=Yii::app()->db->createCommand()
								->select('*')
								->from('package_detail')
								->where('package_id=:id',array(':id'=>$id))
								->queryAll();
								
								
		$this->render('rate_list',array(
			'rate_list'=>$rate_list,
			'id'=>$id,
			'package_detail'=>$package_detail,
		));
	
	}
	
	public function actionRate_and_fair($id)
	{
	
	
	$added_city  = Yii::app()->db->createCommand()
								->select('group_concat(distinct(city)) as city')
								->from('package_rate_and_fair')
								->where('package_id=:id',array(':id'=>$id))
								->queryAll();
	
	// echo "<pre>";
	// print_r($added_city);exit;
	
	
								if(isset($added_city[0]['city']) && $added_city[0]['city']!='')
								{
								$city = explode(',',$added_city[0]['city']);
								}
								else
								{
									$city = array();
								}
	
	$city=Yii::app()->db->createCommand()
								->select('*')
								->from('city')
								->where(array('not in', 'name', $city))
								->queryAll();
	
		$this->render('rate_and_fair',array(
			'city'=>$city,
			'id'=>$id,
		));
	
	}
	
	
	public function actionSubmit()
	{
	// echo"<pre>";
	// print_r($_POST);
	// exit;
	if(isset($_POST['city']) && $_POST['city']!='')
	{

	$model = new PackageRateAndFair;
	
	
	
	$model->city =    $_POST['city'];
	$model->rate = json_encode($_POST['rate']);
	$model->available_date = isset($_POST['available']) && $_POST['available']!='' ? json_encode($_POST['available']) : '';
	$model->package_id = $_POST['package_id'];
	$model->default_list = $_POST['default_city'];
	$model->default_month = isset($_POST['default_month']) && $_POST['default_month']!='' ? $_POST['default_month'] : "";
	$model->rate_and_fair_notes = $_POST['rate_and_fair_notes'];
	$model->date_added = date("Y-m-d H:i:s");
	$model->date_modified = date("Y-m-d H:i:s");
	
	
	if($model->default_list == "Yes")
	{
		$result = Yii::app()->db->createCommand()
							->update('package_rate_and_fair', 
								array('default_list' =>'No',
									), 
								'package_id =:package_id', array(':package_id' => $model->package_id));
	
	
	}
	
	
	$model->save(false);
	 Yii::app()->user->setFlash('success', "<h1>Rate and Fair added successfully.</h1>");
                $this->redirect(array('packageDetail/rate_list/'.$_POST['package_id']));
	
	}
	else{
	
	     Yii::app()->user->setFlash('success', "<h1>Please select city.</h1>");
                $this->redirect(array('packageDetail/rate_and_fair/'.$_POST['package_id']));
	}
	
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	 
	 public function loadPackageModel($id)
	{
		$model=Packages::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionDeleteitinerary()
	{
	
	if(isset($_POST['id']))
			{
				$id =$_POST['id'];
				
				$command = Yii::app()->db->createCommand()
					 ->delete('packages_itinerary',
						'id =:id', array(':id'=>$id));
						
						echo 200;
			}
	
	}
	
	public function actionCreate($id = '')
	{
		$packageid = $id;
		$pacakge = $this->loadPackageModel($id);
		$option =array();
		
		
		
		// echo "<pre>";
		// print_r($pacakge);exit;
		
		if(count($pacakge)==0)
		{
			$this->redirect(Yii::app()->homeUrl);
		}
		$hotel=Yii::app()->db->createCommand()
								->select('*')
								->from('hotel')
								->queryAll();

								
								
		$package_detail=Yii::app()->db->createCommand()
								->select('*')
								->from('package_detail')
								->where('package_id=:id',array(':id'=>$id))
								->queryAll();
								
		if(count($package_detail)>0)
		{
			$model=$this->loadModel($package_detail[0]['id']);
			
			$package_itinerary=Yii::app()->db->createCommand()
								->select('*')
								->from('packages_itinerary')
								->where('package_detail_id=:id',array(':id'=>$package_detail[0]['id']))
								->queryAll();
								
		}
		else
		{
			$model=new PackageDetail;
			$package_itinerary=array();
		}
		
		$thumbnail_1	=$model->thumbnail_1;
		$thumbnail_2	=$model->thumbnail_2;
		$thumbnail_3	=$model->thumbnail_3;
		$thumbnail_4    =$model->thumbnail_4;
		$thumbnail_5   =$model->thumbnail_5;
		
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PackageDetail']))
		{
			$model->attributes=$_POST['PackageDetail'];
			
			$model->thumbnail_1 = isset($_FILES['PackageDetail']['name']['thumbnail_1']) && $_FILES['PackageDetail']['name']['thumbnail_1']!=''  ? $_FILES['PackageDetail']['name']['thumbnail_1'] : $thumbnail_1;
			$model->thumbnail_2 = isset($_FILES['PackageDetail']['name']['thumbnail_2']) && $_FILES['PackageDetail']['name']['thumbnail_2']!=''  ? $_FILES['PackageDetail']['name']['thumbnail_2'] : $thumbnail_2;
			$model->thumbnail_3 = isset($_FILES['PackageDetail']['name']['thumbnail_3']) && $_FILES['PackageDetail']['name']['thumbnail_3']!=''  ? $_FILES['PackageDetail']['name']['thumbnail_3'] : $thumbnail_3;
			$model->thumbnail_4 = isset($_FILES['PackageDetail']['name']['thumbnail_4']) && $_FILES['PackageDetail']['name']['thumbnail_4']!=''  ? $_FILES['PackageDetail']['name']['thumbnail_4'] : $thumbnail_4;
			$model->thumbnail_5 = isset($_FILES['PackageDetail']['name']['thumbnail_5']) && $_FILES['PackageDetail']['name']['thumbnail_5']!=''  ? $_FILES['PackageDetail']['name']['thumbnail_5'] : $thumbnail_5;
			$model->date_added = date("Y-m-d H:i:s");
			$model->date_modified = date("Y-m-d H:i:s");
			
			$model->activity 	= isset($_POST['activity']) && $_POST['activity']!='' ? $_POST['activity'] : '';
			$model->description = isset($_POST['description']) && $_POST['description']!='' ? $_POST['description'] : '';
			$model->inclusion 	= isset($_POST['inclusion']) && $_POST['inclusion']!='' ? $_POST['inclusion'] : '';
			
			// echo "<pre>";
			// print_r($_POST);exit;
			// print_r($model->attributes);exit;
			
			
			if(isset($_POST['hotel_id']) && $_POST['hotel_id'] != '')
			{
			
					$hotel_name=Yii::app()->db->createCommand()
								->select('group_concat(hotel_name) as hotel_name')
								->from('hotel')
								// ->wherein('id=:id',array(':id'=>$model->hotel_id))
								->where(array('in', 'id', $_POST['hotel_id']))
								->queryAll();
								
								// echo "<pre>";
								// print_r($hotel_name);exit;
								
								if(count($hotel_name) > 0)
								{	
									$model->hotel_name  = $hotel_name[0]['hotel_name'];
									// $model->hotel_id	= '';
									
									// print_r($model->hotel_id);exit;
									 $hotel_id = implode(',',$_POST['hotel_id']);
									
									$model->hotel_id	= $hotel_id;
								}
							
			}
			
				
			
			
			
			if($model->save(false))
			{
			
				if($model->thumbnail_1 !='' && $model->thumbnail_1 !=$thumbnail_1)
			{

														
				$model->thumbnail_1=CUploadedFile::getInstance($model,'thumbnail_1');
				$model->thumbnail_1->saveAs(Yii::app()->basePath . '/../../images/packagedetail/'. $model->thumbnail_1 );			
				
				$image1 = new EasyImage(Yii::app()->basePath . '/../../images/packagedetail/'. $model->thumbnail_1);
				$image1->resize(712, 360);
				$image1->save(Yii::app()->basePath . '/../../images/packagedetail/'. $model->thumbnail_1);
			}

				if($model->thumbnail_2 !='' && $model->thumbnail_2 !=$thumbnail_2)
			{

				$model->thumbnail_2=CUploadedFile::getInstance($model,'thumbnail_2');
				$model->thumbnail_2->saveAs(Yii::app()->basePath . '/../../images/packagedetail/'. $model->thumbnail_2 );		

				
				$image2 = new EasyImage(Yii::app()->basePath . '/../../images/packagedetail/'. $model->thumbnail_2);
				$image2->resize(712, 360);
				$image2->save(Yii::app()->basePath . '/../../images/packagedetail/'. $model->thumbnail_2);
			}	
				
				
				if($model->thumbnail_3 !='' && $model->thumbnail_3 !=$thumbnail_3)
			{

				$model->thumbnail_3=CUploadedFile::getInstance($model,'thumbnail_3');
				$model->thumbnail_3->saveAs(Yii::app()->basePath . '/../../images/packagedetail/'. $model->thumbnail_3 );		

								
				
				$image3 = new EasyImage(Yii::app()->basePath . '/../../images/packagedetail/'. $model->thumbnail_3);
				$image3->resize(712, 360);
				$image3->save(Yii::app()->basePath . '/../../images/packagedetail/'. $model->thumbnail_3);
				
				
			}
			
				if($model->thumbnail_4 !='' && $model->thumbnail_4 !=$thumbnail_4)
			{

			
				$model->thumbnail_4=CUploadedFile::getInstance($model,'thumbnail_4');
				$model->thumbnail_4->saveAs(Yii::app()->basePath . '/../../images/packagedetail/'. $model->thumbnail_4 );		
			
				$image4 = new EasyImage(Yii::app()->basePath . '/../../images/packagedetail/'. $model->thumbnail_4);
				$image4->resize(712, 360);
				$image4->save(Yii::app()->basePath . '/../../images/packagedetail/'. $model->thumbnail_4);
				
			}
			
			if($model->thumbnail_5 !='' && $model->thumbnail_5 !=$thumbnail_5)
			{

				$model->thumbnail_5=CUploadedFile::getInstance($model,'thumbnail_5');
				$model->thumbnail_5->saveAs(Yii::app()->basePath . '/../../images/packagedetail/'. $model->thumbnail_5 );	
				
			
				$image5 = new EasyImage(Yii::app()->basePath . '/../../images/packagedetail/'. $model->thumbnail_5);
				$image5->resize(712, 360);
				$image5->save(Yii::app()->basePath . '/../../images/packagedetail/'. $model->thumbnail_5);
			}
			
			////////////////packages itinerary	///////////////////////
			
			$package_detail_id = $model->primaryKey;
			
			 $command = Yii::app()->db->createCommand()
			 ->delete('packages_itinerary',
                'package_detail_id =:package_detail_id', array(':package_detail_id' => $package_detail_id));
			
			
		
			
			
			for($i=1;$i<=15;$i++)
				{
				
				
					if(isset($_POST['itinerary_day_'.$i.'_heading']) && $_POST['itinerary_day_'.$i.'_heading']!='')
					{
						$PackagesItinerary= new PackagesItinerary;
						
						$PackagesItinerary->package_detail_id= 	$package_detail_id ;
						$PackagesItinerary->heading	= 	$_POST['itinerary_day_'.$i.'_heading'];
						$PackagesItinerary->description= $_POST['itinerary_day_'.$i.'_description'];
						
						// echo "<pre>";
						// print_r($PackagesItinerary->attributes);exit;
						
						$PackagesItinerary->save(false);
						
					}	
						
				}
			
			
			$this->redirect(array('view','id'=>$model->id));
			}
			
			
				
			}
		
// print_r($package_itinerary);exit;
		$this->render('create',array(
			'model'=>$model,
			'hotel'=>$hotel,
			'pacakge'=>$pacakge,
			'packageid'=>$packageid,
			'package_itinerary'=>$package_itinerary,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PackageDetail']))
		{
			$model->attributes=$_POST['PackageDetail'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PackageDetail');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PackageDetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PackageDetail']))
			$model->attributes=$_GET['PackageDetail'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PackageDetail the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PackageDetail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PackageDetail $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='package-detail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
