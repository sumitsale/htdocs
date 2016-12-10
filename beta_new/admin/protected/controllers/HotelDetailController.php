<?php

class HotelDetailController extends Controller
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
				'actions'=>array('admin','delete','deleteroom'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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
	
	 public function loadhotelmnodel($id)
	{
		$model=Hotel::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionDeleteroom()
	{
		
		if(isset($_POST['id']))
			{
				$id =$_POST['id'];
				
				$command = Yii::app()->db->createCommand()
					 ->delete('hotel_room',
						'id =:id', array(':id'=>$id));
						
						echo 200;
			}
	
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id ='')
	{
	
		$hotelid = $id;
		$hotel = $this->loadhotelmnodel($id);
		
		$model=new HotelDetail;
		
		$hotel_detail=Yii::app()->db->createCommand()
								->select('*')
								->from('hotel_detail')
								->where('hotel_id=:id',array(':id'=>$id))
								->queryAll();
								
		if(count($hotel_detail)>0)
		{
			$model=$this->loadModel($hotel_detail[0]['id']);
			$hotel_room=Yii::app()->db->createCommand()
								->select('*')
								->from('hotel_room')
								->where('hotel_detail_id=:id',array(':id'=>$hotel_detail[0]['id']))
								->queryAll();
			
		}
		else
		{
			$model=new HotelDetail;
			$hotel_room=array();
		}
		
		$thumbnail_1 = $model->thumbnail_1;
		$thumbnail_2= $model->thumbnail_2;
		$thumbnail_3= $model->thumbnail_3;
		$thumbnail_4= $model->thumbnail_4;
		$thumbnail_5= $model->thumbnail_5;
		
		$room_1_thumbnail	= $model->room_1_thumbnail;
		$room_2_thumbnail	= $model->room_2_thumbnail;
		$room_3_thumbnail	= $model->room_3_thumbnail;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['HotelDetail']))
		{
			$model->attributes=$_POST['HotelDetail'];
			
			$model->thumbnail_1 = isset($_FILES['HotelDetail']['name']['thumbnail_1']) && $_FILES['HotelDetail']['name']['thumbnail_1']!=''  ? $_FILES['HotelDetail']['name']['thumbnail_1'] : $thumbnail_1;
			$model->thumbnail_2 = isset($_FILES['HotelDetail']['name']['thumbnail_2']) && $_FILES['HotelDetail']['name']['thumbnail_2']!=''  ? $_FILES['HotelDetail']['name']['thumbnail_2'] : $thumbnail_2;
			$model->thumbnail_3 = isset($_FILES['HotelDetail']['name']['thumbnail_3']) && $_FILES['HotelDetail']['name']['thumbnail_3']!=''  ? $_FILES['HotelDetail']['name']['thumbnail_3'] : $thumbnail_3;
			$model->thumbnail_4 = isset($_FILES['HotelDetail']['name']['thumbnail_4']) && $_FILES['HotelDetail']['name']['thumbnail_4']!=''  ? $_FILES['HotelDetail']['name']['thumbnail_4'] : $thumbnail_4;
			$model->thumbnail_5 = isset($_FILES['HotelDetail']['name']['thumbnail_5']) && $_FILES['HotelDetail']['name']['thumbnail_5']!=''  ? $_FILES['HotelDetail']['name']['thumbnail_5'] : $thumbnail_5;
			
			
			
			
			$model->overview_paragraph_1 	= isset($_POST['overview_paragraph_1']) && $_POST['overview_paragraph_1']!='' ? $_POST['overview_paragraph_1'] : '';
			$model->overview_paragraph_2 	= isset($_POST['overview_paragraph_2']) && $_POST['overview_paragraph_2']!='' ? $_POST['overview_paragraph_2'] : '';
			$model->overview_paragraph_3 	= isset($_POST['overview_paragraph_3']) && $_POST['overview_paragraph_3']!='' ? $_POST['overview_paragraph_3'] : '';
			
			$model->room_1_thumbnail = isset($_FILES['HotelDetail']['name']['room_1_thumbnail']) && $_FILES['HotelDetail']['name']['room_1_thumbnail']!=''  ? $_FILES['HotelDetail']['name']['room_1_thumbnail'] : $room_1_thumbnail;
			$model->room_2_thumbnail = isset($_FILES['HotelDetail']['name']['room_2_thumbnail']) && $_FILES['HotelDetail']['name']['room_2_thumbnail']!=''  ? $_FILES['HotelDetail']['name']['room_2_thumbnail'] : $room_2_thumbnail;
			$model->room_3_thumbnail = isset($_FILES['HotelDetail']['name']['room_3_thumbnail']) && $_FILES['HotelDetail']['name']['room_3_thumbnail']!=''  ? $_FILES['HotelDetail']['name']['room_3_thumbnail'] : $room_3_thumbnail;
			
			
			
			$model->date_added = date("Y-m-d H:i:s");
			$model->date_modified = date("Y-m-d H:i:s");
			
				// if($model->room_1_amunities != '')
			// {
			
				// $model->room_1_amunities	= implode(',',$model->room_1_amunities );
							
			// }
			
				// if($model->room_2_amunities != '')
			// {
			
				// $model->room_2_amunities	= implode(',',$model->room_2_amunities );
							
			// }
			
			
				// if($model->room_3_amunities != '')
			// {
			
				// $model->room_3_amunities	= implode(',',$model->room_3_amunities );
							
			// }
				// if($model->hotel_amunities != '')
			// {
			
				// $model->hotel_amunities	= implode(',',$model->hotel_amunities );
							
			// }
			
				if(isset($_POST['hotel_amunities']) && $_POST['hotel_amunities'] != '')
			{
			
				$model->hotel_amunities	= implode(',',$_POST['hotel_amunities']);
							
			}
			else
			{
				$model->hotel_amunities='';
			}
			
			
			
				if(isset($_POST['room_amunitie']) && $_POST['room_amunitie'] != '')
			{
			
				$model->room_amunitie	= implode(',',$_POST['room_amunitie']);
							
			}
			else
			{
				$model->room_amunitie='';
			}
			
			// echo "<pre>";
			// print_r($model->attributes);exit;
			
			
			if($model->save(false))
			{
			
				// if($model->room_1_thumbnail !='' && $model->room_1_thumbnail !=$room_1_thumbnail)
				// {
					// $model->room_1_thumbnail=CUploadedFile::getInstance($model,'room_1_thumbnail');
					// $model->room_1_thumbnail->saveAs(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->room_1_thumbnail );			
				
					// $room_1_thumbnail = new EasyImage(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->room_1_thumbnail );
					// $room_1_thumbnail->resize(217, 129);
					// $room_1_thumbnail->save(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->room_1_thumbnail);
				
				
				// }
				
				// if($model->room_2_thumbnail !='' && $model->room_2_thumbnail !=$room_2_thumbnail)
				// {
					// $model->room_2_thumbnail=CUploadedFile::getInstance($model,'room_2_thumbnail');
					// $model->room_2_thumbnail->saveAs(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->room_2_thumbnail );			
				
					// $room_2_thumbnail = new EasyImage(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->room_2_thumbnail );
					// $room_2_thumbnail->resize(217, 129);
					// $room_2_thumbnail->save(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->room_2_thumbnail);
				// }
				
				// if($model->room_3_thumbnail !='' && $model->room_3_thumbnail !=$room_3_thumbnail)
				// {
					// $model->room_3_thumbnail=CUploadedFile::getInstance($model,'room_3_thumbnail');
					// $model->room_3_thumbnail->saveAs(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->room_3_thumbnail );			
				
					// $room_3_thumbnail = new EasyImage(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->room_3_thumbnail );
					// $room_3_thumbnail->resize(217, 129);
					// $room_3_thumbnail->save(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->room_3_thumbnail);
				// }
				
				if($model->thumbnail_1 !='' && $model->thumbnail_1 !=$thumbnail_1)
				{
				
					$model->thumbnail_1=CUploadedFile::getInstance($model,'thumbnail_1');
					$model->thumbnail_1->saveAs(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->thumbnail_1 );			
				
					$thumbnail_1 = new EasyImage(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->thumbnail_1 );
					$thumbnail_1->resize(712, 360);
					$thumbnail_1->save(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->thumbnail_1);
				}		
					
				
				if($model->thumbnail_2 !='' && $model->thumbnail_2 !=$thumbnail_2)
				{	
					$model->thumbnail_2=CUploadedFile::getInstance($model,'thumbnail_2');
					$model->thumbnail_2->saveAs(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->thumbnail_2 );			
						
					$thumbnail_2 = new EasyImage(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->thumbnail_2 );
					$thumbnail_2->resize(712, 360);
					$thumbnail_2->save(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->thumbnail_2);
				}	
					
				
				if($model->thumbnail_3 !='' && $model->thumbnail_3 !=$thumbnail_3)
				{	
					
					$model->thumbnail_3=CUploadedFile::getInstance($model,'thumbnail_3');
					$model->thumbnail_3->saveAs(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->thumbnail_3 );			
						
					$thumbnail_3 = new EasyImage(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->thumbnail_3 );
					$thumbnail_3->resize(712, 360);
					$thumbnail_3->save(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->thumbnail_3);
					
					}
					
				if($model->thumbnail_4 !='' && $model->thumbnail_4 !=$thumbnail_4)
				{
					
					$model->thumbnail_4=CUploadedFile::getInstance($model,'thumbnail_4');
					$model->thumbnail_4->saveAs(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->thumbnail_4 );			
						
					$thumbnail_4 = new EasyImage(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->thumbnail_4 );
					$thumbnail_4->resize(712, 360);
					$thumbnail_4->save(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->thumbnail_4);
					
				}

				if($model->thumbnail_5 !=''  && $model->thumbnail_5 !=$thumbnail_5)
				{				
					
					$model->thumbnail_5=CUploadedFile::getInstance($model,'thumbnail_5');
					$model->thumbnail_5->saveAs(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->thumbnail_5 );			
						
					$thumbnail_5 = new EasyImage(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->thumbnail_5 );
					$thumbnail_5->resize(712, 360);
					$thumbnail_5->save(Yii::app()->basePath . '/../../images/hoteldetail/'. $model->thumbnail_5);
				}
				
				
				$hotel_detail_id = $model->primaryKey;
				/////room type
				
				// echo "<pre>";
				// print_r($_POST);
				// print_r($_FILES);exit;
				
				for($i=1;$i<=15;$i++)
				{
				
				
					if(isset($_POST['room_type_'.$i]) && $_POST['room_type_'.$i]!='')
					{
						$HotelRoom= new HotelRoom;
						
						$hotel_room=Yii::app()->db->createCommand()
								->select('*')
								->from('hotel_room')
								->where('room_id=:room_id and hotel_detail_id=:hotel_detail_id',
								array(':room_id'=>$i,':hotel_detail_id'=>$hotel_detail_id))
								->queryAll();
						
						// print_r($hotel_room);
						// echo "<br>";
						
						if(count($hotel_room) == 0)
						{
						// echo "if<br>";
						
							// if($_POST['room_'.$i.'_amunities'] != '')
								// {
								
									// $HotelRoom->room_amunities	= implode(',',$_POST['room_'.$i.'_amunities']);
												
								// }
								// else
								// {
									$HotelRoom->room_amunities	= '';
								// }
											
						$accomodation_charges_array = array();		
						$accomodation_charges_array['extra_adult']   		 = $_POST['extra_adult_'.$i];  
						$accomodation_charges_array['chiled_with_bed']     = $_POST['chiled_with_bed_'.$i];  
						$accomodation_charges_array['chiled_no_bed']    	 = $_POST['chiled_no_bed_'.$i];  
						$accomodation_charges_array['notes']   			 = $_POST['notes_'.$i]; 
						
						
						$HotelRoom->room_id 				= 	$i ;
						$HotelRoom->hotel_detail_id			= 	$hotel_detail_id;
						$HotelRoom->room_type				= $_POST['room_type_'.$i];
						
						$HotelRoom->thumbnail				= (isset($_FILES['room_thubnail_'.$i]['name']) && $_FILES['room_thubnail_'.$i] ['name'])!='' ? $_FILES['room_thubnail_'.$i] ['name']  :'';
						$HotelRoom->inclusion				=  $_POST['room_inclusion_'.$i];
						$HotelRoom->exclusion				=  $_POST['room_exclusion_'.$i];
						$HotelRoom->charges					=  $_POST['room_charges_'.$i];
						// $HotelRoom->accomodation_charges	=  $_POST['room_accomodation_charges_'.$i];
						$HotelRoom->accomodation_charges	=  json_encode($accomodation_charges_array);
						$HotelRoom->price_with_offer		=  $_POST['room_charges_with_offer_'.$i];
						
						
						$HotelRoom->save(false);
						
						if($HotelRoom->thumbnail!='')
						{
						// $HotelRoom->thumbnail=CUploadedFile::getInstance($HotelRoom,'thumbnail');
						// $HotelRoom->thumbnail->saveAs(Yii::app()->basePath . '/../../images/hoteldetail/'. $HotelRoom->thumbnail);			
						move_uploaded_file($_FILES['room_thubnail_'.$i]['tmp_name'], Yii::app()->basePath . '/../../images/hoteldetail/'.$HotelRoom->thumbnail);
				
				
						$room_humbnail = new EasyImage(Yii::app()->basePath . '/../../images/hoteldetail/'. $HotelRoom->thumbnail );
						$room_humbnail->resize(217, 129);
						$room_humbnail->save(Yii::app()->basePath . '/../../images/hoteldetail/'. $HotelRoom->thumbnail);
						}
						
						}
						else
						{
							// echo "else<br>";
						
						$room_id = $i;
						
						// if($_POST['room_'.$i.'_amunities'] != '')
								// {
								
									// $room_amunities	= implode(',',$_POST['room_'.$i.'_amunities']);
												
								// }
								// else
								// {
									$room_amunities	= '';
								// }
								
						$accomodation_charges_array = array();		
						$accomodation_charges_array['extra_adult']   		 = $_POST['extra_adult_'.$i];  
						$accomodation_charges_array['chiled_with_bed']     = $_POST['chiled_with_bed_'.$i];  
						$accomodation_charges_array['chiled_no_bed']    	 = $_POST['chiled_no_bed_'.$i];  
						$accomodation_charges_array['notes']   			 = $_POST['notes_'.$i]; 
						
						$room_type = $_POST['room_type_'.$i];
						$thumbnail = (isset($_FILES['room_thubnail_'.$i]['name']) && $_FILES['room_thubnail_'.$i] ['name'])!='' ? $_FILES['room_thubnail_'.$i] ['name']  :$hotel_room[0]['thumbnail'];
						$inclusion				=  $_POST['room_inclusion_'.$i];
						$exclusion				=  $_POST['room_exclusion_'.$i];
						$charges					=  $_POST['room_charges_'.$i];
						//$accomodation_charges	=  $_POST['room_accomodation_charges_'.$i];
						$offer_price	=  $_POST['room_charges_with_offer_'.$i];
						
							$result = Yii::app()->db->createCommand()
							->update('hotel_room', 
								array('room_id' =>$room_id,
									'hotel_detail_id' =>$hotel_detail_id,
									'room_type' =>$room_type,
									'room_amunities' =>$room_amunities,
									'thumbnail' =>$thumbnail,
									'inclusion' =>$inclusion,
									'exclusion' =>$exclusion,
									'charges' =>$charges,
									// 'accomodation_charges' =>$accomodation_charges,
									'accomodation_charges' =>json_encode($accomodation_charges_array),
									'price_with_offer' =>$offer_price,
									), 
								'id =:id', array(':id' => $hotel_room[0]['id']));
						
						
						
							if($thumbnail != $hotel_room[0]['thumbnail'])
							{
							
							move_uploaded_file($_FILES['room_thubnail_'.$i]['tmp_name'], Yii::app()->basePath . '/../../images/hoteldetail/'.$thumbnail);
				
				
							$room_humbnail = new EasyImage(Yii::app()->basePath . '/../../images/hoteldetail/'. $thumbnail);
							$room_humbnail->resize(217, 129);
							$room_humbnail->save(Yii::app()->basePath . '/../../images/hoteldetail/'. $thumbnail);
							}
						
						}
						
						
						// echo "<pre>";
						// print_r($HotelRoom->attributes);exit;
						
					}
				
						
				}
				// exit;		
				
				
				$this->redirect(array('view','id'=>$model->id));
			}	
		}

		$this->render('create',array(
			'model'=>$model,
			'hotel'=>$hotel,
			'hotelid'=>$hotelid,
			'hotel_room'=>$hotel_room,
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

		if(isset($_POST['HotelDetail']))
		{
			$model->attributes=$_POST['HotelDetail'];
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
		$dataProvider=new CActiveDataProvider('HotelDetail');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new HotelDetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['HotelDetail']))
			$model->attributes=$_GET['HotelDetail'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return HotelDetail the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=HotelDetail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param HotelDetail $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='hotel-detail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
