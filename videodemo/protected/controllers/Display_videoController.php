<?php

class Display_videoController extends Controller
{
	public function actionIndex()
	{
		// echo 123;
	
	 date_default_timezone_set('Asia/Calcutta');
    $start = strtotime('12:00 AM');
    $end   = strtotime('11:59 PM');
	$time= array();

	
 for($i = $start;$i<=$end;$i+=1800){  
       
		
 $time[] = date('G', $i); 
		
} 
	
	
	
	$exact_start_time = '';
	
	for($i=0;$i<count($time);$i++)
	{
			if($time[$i]>= date('G',time()))
			{
				$exact_start_time =$time[$i];
				break;
			}
	}
	
	
	
	/*
	if(date('i',time()) >= 30)
	{
		$exact_start_time = $exact_start_time .':30';
	}
	else
	{
		$exact_start_time = $exact_start_time .':00';
	}
	*/
	
	$start_hour = $exact_start_time;
	$start_minute = date('i',time());
	
	// echo $start_hour."<br>";
	// echo $start_minute."<br>";exit;
	
	// echo $exact_start_time;exit;
	$result = Yii::app()->db->createCommand()
            ->selectDistinct('*')
            ->from('video')
			// ->where('start_time ="'.$exact_start_time.'"')
			->where('start_hour ="'.$start_hour.'"')
			->order('start_minute desc')
            ->queryAll();
	
	// echo "<pre>";
	// print_r($result);exit;
	// echo $time;
	$data=array();
	if(count($result)>0)
	{
		
		$data=array();
	
		for($i=0;$i<count($result);$i++)
			{
				// echo $result[$i]['start_minute']. "  ". $start_minute."<br>";
				if($result[$i]['start_minute']<=$start_minute)
				{
					$data[] = $result[$i];
					break;
				}
					
			}
	
	 }
	// echo "<pre>";
	// print_r($data);exit;
	
	/*
	if(Count($data)>0)
	{
		$result['flag'] = 'success';  
		$result['httpurl'] = $data[0]['httpurl'];  
		
		// echo $data[0]['httpurl']; 
		
		
		echo '<video autoplay controls id="myvideo" style="position: fixed; right: 0; bottom: 0;
    min-width: 100%; min-height: 100%;
    width: auto; height: auto; z-index: -100;
    background: url(polina.jpg) no-repeat;
    background-size: cover;">
  <source id ="videosrc" src="'.$data[0]['httpurl'].'" type="video/mp4">
  Your browser does not support the video tag.
</video>';
	}
	else
	{
		
		echo 'error';
	}
	
	*/
	
	$res = $this->renderPartial('index_new', array(
        'data' => $data
            ));
			
	echo $res;
	
	
		// $this->render('index');
	}
	
	public function actionCheck_video()
	{
			date_default_timezone_set('Asia/Calcutta');
    $start = strtotime('12:00 AM');
    $end   = strtotime('11:59 PM');
	$time= array();

	
 for($i = $start;$i<=$end;$i+=1800){  
       
		
 $time[] = date('G', $i); 
		
} 
	
	
	
	$exact_start_time = '';
	
	for($i=0;$i<count($time);$i++)
	{
			if($time[$i]>= date('G',time()))
			{
				$exact_start_time =$time[$i];
				break;
			}
	}
	
	
	/*
	
	if(date('i',time()) >= 30)
	{
		$exact_start_time = $exact_start_time .':30';
	}
	else
	{
		$exact_start_time = $exact_start_time .':00';
	}
	*/
	
	
	$start_hour = $exact_start_time;
	$start_minute = date('i',time());
	
	// echo $start_hour."<br>";
	// echo $start_minute."<br>";exit;
	
	// echo $exact_start_time;exit;
	$result = Yii::app()->db->createCommand()
            ->selectDistinct('*')
            ->from('video')
			// ->where('start_time ="'.$exact_start_time.'"')
			->where('start_hour ="'.$start_hour.'"')
			->order('start_minute desc')
            ->queryAll();
	
	// echo "<pre>";
	// print_r($result);exit;
	// echo $time;
	
	if(count($result)>0)
	{
		
		$data=array();
	
		for($i=0;$i<count($result);$i++)
			{
				// echo $result[$i]['start_minute']. "  ". $start_minute."<br>";
				if($result[$i]['start_minute']<=$start_minute)
				{
					$data[] = $result[$i];
					break;
				}
					
			}
	
	 }
			
			if(count($data)>0)
			{
				echo $data[0]['httpurl'];
			}
				else
				{
					echo 'error';
				}
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