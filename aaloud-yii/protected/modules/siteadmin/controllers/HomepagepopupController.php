<?php

class HomepagepopupController extends Controller
{
	public function actionIndex()
	{
	
		$model=new TblHomepagePopup;
		// echo "<pre>";
		// print_r($model);exit;
		
		$result=Yii::app()->db->createCommand()
            ->select('*')
            ->from('tbl_homepage_popup')
            ->queryAll();
			
			
			
		$defaultpopup=Yii::app()->db->createCommand()
            ->select('*')
            ->from('tbl_homepage_popup')
			->where('status=:status',array(':status'=>'D'))
            ->queryAll();
			
			// echo "<pre>";
			// print_r($defaultpopup);exit;
		
		if(isset($_POST['type']))
		{
			$type=$_POST['type'];

				// echo "<pre>";
				 // //echo $_FILES['TblHomepagePopup']['name']['image'];exit;
				// //print_r($_FILES);
				// print_r($_POST);exit;
			// // echo $type;exit;
			
			if(($_FILES['TblHomepagePopup']['name']['image'])=='')
			{
				 Yii::app()->user->setFlash('success', "<h1>Please select artist image</h1>");
						$this->redirect('index');
			}
			
			
			if($type=='video')
			{
			
			if(($_POST['Hideartist']['artistname'])=='')
			{
				 Yii::app()->user->setFlash('success', "<h1>Please select artist name</h1>");
						$this->redirect('index');
			}
			
			
			
				$model->artist_id=$_POST['TblHomepagePopup']['artist_id'];
				$model->artist_name=$_POST['Hideartist']['artistname'];
				$model->video_id=$_POST['videoList'];
				$model->image=$_FILES['TblHomepagePopup']['name']['image'];
				$model->video_url='';
				$model->ipad_url='';
				$model->event_url='';
				$model->status='P';
				$model->toptitle=$_POST['TblHomepagePopup']['toptitle'];
				$model->bottomtitle=$_POST['TblHomepagePopup']['bottomtitle'];
				$model->type=$type;
				
				$model->save(false);
				
				if(!is_dir("files/homepagepopup"))
			{
			 mkdir("files/homepagepopup", 0777);
			}
				
				if(isset($_FILES["TblHomepagePopup"]["tmp_name"]["image"]))
				{
					move_uploaded_file($_FILES["TblHomepagePopup"]["tmp_name"]["image"], Yii::app()->basePath .
                        '/../files/homepagepopup/' . $_FILES["TblHomepagePopup"]["name"]["image"]);
				}	
				
				 Yii::app()->user->setFlash('success', "<h1>1 record added successfully</h1>");
						$this->redirect('index');
			}
			else
			{
			
			if(($_POST['TblHomepagePopup']['artist_name'])=='')
			{
				 Yii::app()->user->setFlash('success', "<h1>Please select event name</h1>");
						$this->redirect('index');
			}
			
			
			
				$model->artist_id=0;
				$model->artist_name=$_POST['TblHomepagePopup']['artist_name'];
				$model->video_id=0;
				$model->image=$_FILES['TblHomepagePopup']['name']['image'];
				$model->video_url=$_POST['TblHomepagePopup']['video_url'];
				$model->ipad_url=$_POST['TblHomepagePopup']['ipad_url'];
				$model->event_url=$_POST['TblHomepagePopup']['event_url'];
				$model->status='P';
				$model->toptitle=$_POST['TblHomepagePopup']['toptitle'];
				$model->bottomtitle=$_POST['TblHomepagePopup']['bottomtitle'];
				$model->type=$type;
				
				$model->save(false);
				
				if(!is_dir("files/homepagepopup"))
			{
			 mkdir("files/homepagepopup", 0777);
			}
				
				if(isset($_FILES["TblHomepagePopup"]["tmp_name"]["image"]))
				{
					move_uploaded_file($_FILES["TblHomepagePopup"]["tmp_name"]["image"], Yii::app()->basePath .
                        '/../files/homepagepopup/' . $_FILES["TblHomepagePopup"]["name"]["image"]);
				}	
				
					 Yii::app()->user->setFlash('success', "<h1>1 record added successfully</h1>");
						$this->redirect('index');
			}
			
			
			
		}
		
		
		$this->render('index',array('model'=>$model,'result'=>$result,'defaultpopup'=>$defaultpopup));
	}
	
	public function actionDelete()
	{
		// echo "<pre>";
		// print_r($_POST);exit;
		
		$id=$_POST['id'];
		
		$command=Yii::app()->db->createCommand()
		->delete('tbl_homepage_popup', 
			'id=:id', array(':id'=>$id));
			
			echo "200";
	}
	
	public function actionSelect()
	{
		// echo "<pre>";
		// print_r($_POST);
		// exit;
		
		if($_POST['defaultpopup']=='')
		{
			 Yii::app()->user->setFlash('success', "<h1>Please select any value</h1>");
						$this->redirect('index');
		}
		
		$id=$_POST['defaultpopup'];
		
			$olddefaultpopup=Yii::app()->db->createCommand()
				->select('*')
				->from('tbl_homepage_popup')
				->where('status=:status',array('status'=>'D'))
				->queryAll();
		
		
			if(isset($olddefaultpopup[0]))
			{
				$command=Yii::app()->db->createCommand()
							->update('tbl_homepage_popup', array(
							'status'=>'P',
							 ), 'id=:id', array(':id'=>$olddefaultpopup[0]['id']));
			}
			
			$command=Yii::app()->db->createCommand()
							->update('tbl_homepage_popup', array(
							'status'=>'D',
							 ), 'id=:id', array(':id'=>$id));
		
		// Yii::app()->user->setFlash('success', "<h1>1 record added successfully</h1>");
		$this->redirect('index');
	}
	
	
	public function actionGeneratxml()
	{
	
	// echo "hi";exit;
			$result=Yii::app()->db->createCommand()
									->select('*')
									->from('tbl_homepage_popup')
									->where('status=:status',array(':status'=>'D'))
									->queryAll();
									
									// echo "<pre>";
									// print_r($result);exit;
									
					$ourFileName =Yii::app()->basePath . '/../xml/frontend/'."homepopup.xml";
					$ourFileHandle = fopen($ourFileName, 'w');
							
					$newline="\n";
						
					$detail='<?xml version="1.0" encoding="UTF-8"?>'.$newline;
					$detail.='<homepopups>'.$newline;
					
					for($i=0;$i<count($result);$i++)
					{
					$detail.='	<homepopup>'.$newline;
					$detail.='   	    <artistid><![CDATA['.$result[$i]['artist_id'].']]></artistid>'.$newline;
					$detail.='   	    <artistname><![CDATA['.$result[$i]['artist_name'].']]></artistname>'.$newline;
					$detail.='   	    <image><![CDATA['.Yii::app()->params['STORE_WEB_URL_BANNER'] . '/files/homepagepopup/'.$result[$i]['image'].']]></image>'.$newline;
					
					if($result[$i]['artist_id']!=0)
					{
					 if (file_exists(Yii::app()->basePath . '/../xml/content/videos/video-' . $result[$i]['video_id'] . '.xml')) {
					 
                $videofile = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/video-' . $result[$i]['video_id'] . '.xml');
				
				
				
				
				 for ($l = 0; $l < count($videofile->paths->path); $l++) {

				  if ((integer)$videofile->paths->path[$l]->attributes() == '191') {
					$videoPath = $videofile->paths->path[$l]->videopath;
					break;
				  }
				}
				
						$ipath='';
						$ipadUrl='';
				
						for($p=0;$p< count($videofile->paths->path);$p++)
					  {
					   if ((integer)$videofile->paths->path[$p]->attributes() == '32') {
					   
					   $ipath=str_replace('http://','',$videofile->paths->path[$p]->videopath);
				
						$ipadUrl=str_replace('CONTENT_URL',$ipath,Yii::app()->params['WOWZA_URL']);
						
							break;
						  }
					  }
					  
					  $detail.='   	    <videopath><![CDATA['.$videoPath.']]></videopath>'.$newline;
					  $detail.='   	    <ipadpath><![CDATA['.$ipadUrl.']]></ipadpath>'.$newline;
				
					}
					else
						{
						$detail.='   	    <videopath></videopath>'.$newline;
						$detail.='   	    <ipadpath></ipadpath>'.$newline;
						}
					
					}
					else
					{
						 $detail.='   	    <videopath><![CDATA['.$result[$i]['video_url'].']]></videopath>'.$newline;
						 $detail.='   	    <ipadpath><![CDATA['.$result[$i]['ipad_url'].']]></ipadpath>'.$newline;
						 $detail.='   	    <morelink><![CDATA['.$result[$i]['event_url'].']]></morelink>'.$newline;
						 
					}
					
						 $detail.='   	    <toplink><![CDATA['.$result[$i]['toptitle'].']]></toplink>'.$newline;
						 $detail.='   	    <bottomlink><![CDATA['.$result[$i]['bottomtitle'].']]></bottomlink>'.$newline;
					
					
					$detail.='	</homepopup>'.$newline;
					}
					
					$detail.='</homepopups>'.$newline;
					
						fwrite($ourFileHandle,$detail);
						fclose($ourFileHandle);
					
					Yii::app()->user->setFlash('success', "<h1>xml file written successfully</h1>");
					$this->redirect('index');
					
	}
	
	public function actionChangepopupstatus()
	{
		// echo "<pre>";
		// echo $_POST;exit;
		$status='';
		$newstatus='';
		
		if (file_exists(Yii::app()->basePath . '/../xml/frontend/homepopupstatus.xml'))
						 {
							$currnetstatus=simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/homepopupstatus.xml');
							
							// echo "<pre>";
							// print_r($currnetstatus);exit;
							
							if(isset($currnetstatus[0]))
							{
								$status=$currnetstatus[0];
							}
							
							
							if($status=="show")
								 {
									$newstatus="hide";		
								 }
						 
							if($status=="hide")
								 {
									$newstatus="show";		
								 }
								 
								if(strlen($newstatus)==0)
								{
									$newstatus="show";
								}
						 }
						 
						 
		
						// echo $newstatus;exit;
			
		
			$ourFileName =Yii::app()->basePath . '/../xml/frontend/'."homepopupstatus.xml";
					$ourFileHandle = fopen($ourFileName, 'w');
							
					$newline="\n";
						
					$detail='<?xml version="1.0" encoding="UTF-8"?>'.$newline;
					$detail.='<status>'.$newstatus.'</status>'.$newline;
					
					
					fwrite($ourFileHandle,$detail);
					fclose($ourFileHandle);
	
	$this->redirect('index');
	
		
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