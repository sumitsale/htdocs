<?php

class HomeblocksController extends Controller {

  public function actionIndex() {
    $model = FocusBlock::model()->findAll(array('order'=>'POSITION ASC'));
    $this->render('index', array(
        'model' => $model
    ));
  }

  public function actionGetArtistDesc() {
    if (isset($_POST['artist_id'])) {
      $artist_id = $_POST['artist_id'];
      $artistDetail = Yii::app()->db2->createCommand()
              ->select('ARTIST_DETAIL')
              ->from('TBL_ARTIST_DETAILS')
              ->where('ARTIST_ID=:arst_id', array(':arst_id' => $artist_id))
              ->queryAll();
      echo($artistDetail[0]['ARTIST_DETAIL']);
    } else
      throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
  }
		  
		  public function actionGetArtistbigimage()
		  {
				 

					if (isset($_POST['artist_id']))
					  $artist_id = $_POST['artist_id'];



		
							$data2 = Yii::app()->db2->createCommand()
							->select('tf.FILE_PATH,taf.FILE_SUB_TYPE_ID,tf.FILE_ID')
							->from('TBL_ARTIST_FILES taf')
							->join('TBL_FILES tf','taf.FILE_ID=tf.FILE_ID')
							->where('taf.ARTIST_FILE_TYPE_ID=1 and (taf.FILE_SUB_TYPE_ID=514 or taf.FILE_SUB_TYPE_ID=515) and taf.ARTIST_ID=:artist_id',array(':artist_id'=>$artist_id))
							->queryAll();
							
							
							
							

					/*
					  $data2 = TBLTABS::model()->findAll('MAIN_TAB_ID = :maintabid', array(':maintabid' =>$maintabid));
					 */
					$data = CHtml::listData($data2, 'FILE_PATH', 'FILE_ID');


					echo CHtml::tag('option', array('value' => 0), CHtml::encode("Select a Bigimage"), true);
					foreach ($data as $value => $name) {
					  echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
					}
		  }
		  
		  
		   public function actionGetartistthumbnail()
		  {
	

						if (isset($_POST['artist_id']))
						  $artist_id = $_POST['artist_id'];




							$data2 = Yii::app()->db2->createCommand()
							->select('tf.FILE_PATH,taf.FILE_SUB_TYPE_ID,tf.FILE_ID')
							->from('TBL_ARTIST_FILES taf')
							->join('TBL_FILES tf','taf.FILE_ID=tf.FILE_ID')
							->where('taf.ARTIST_FILE_TYPE_ID=1 and (taf.FILE_SUB_TYPE_ID=516 or taf.FILE_SUB_TYPE_ID=517) and taf.ARTIST_ID=:artist_id',array(':artist_id'=>$artist_id))
							->queryAll();



						/*
						  $data2 = TBLTABS::model()->findAll('MAIN_TAB_ID = :maintabid', array(':maintabid' =>$maintabid));
						 */
						$data = CHtml::listData($data2, 'FILE_PATH', 'FILE_ID');


						echo CHtml::tag('option', array('value' => 0), CHtml::encode("Select a Thumbnail"), true);
						foreach ($data as $value => $name) {
						  echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
						}
		  }
		  

  public function actionAddFocus() {

    if (isset($_POST)) {
	
      
      switch ($_POST['focustype']) {
        case "video on demand":
		
		
          $model = new FocusBlock;
          $model->ARTIST_ID = $_POST['videoArtistId'];
          $model->ARTIST_NAME = $_POST['videoArtistName'];
          $model->DESCRIPTION = substr($_POST['videoArtistDetails'], 0, 500);
          $model->VIDEO_ID = $_POST['videoList'];
          $model->TYPE = $_POST['focustype'];
		  $model->VIDEO_BIG_IMAGE = $_POST['videobigimage']; 
		  $model->VIDEO_THUMBNAIL = $_POST['videothumbnail'];
			  
          break;
        
        case "live event":
          $model = new FocusBlock;
          $model->ARTIST_ID = 0;
          $model->ARTIST_NAME = $_POST['eventName'];
          $model->DESCRIPTION = substr($_POST['eventVideoDetails'], 0, 500);
          $model->VIDEO_ID = '';
          $model->VIDEO_URL = $_POST['videoUrl'];
		  $model->VIDEO_URL2=$_POST['ipadUrl'];
		  $model->EVENT_URL = $_POST['eventUrl'];	
          $model->TYPE = $_POST['focustype'];
          $model->EVENT_BIG_IMAGE = CUploadedFile::getInstanceByName('eventImage');
          $model->EVENT_THUMBNAIL = CUploadedFile::getInstanceByName('eventThumb');
          break;

        default:
          break;
      }

      $maxPos = Yii::app()->db->createCommand()
              ->select('max(POSITION) as max')
              ->from('tbl_focus_block')
              ->queryScalar();
      if($maxPos == "")
        $maxPos = 0;
      $model->POSITION = $maxPos + 1;
      if($model->save()){
        echo $model->ID;
        if($model->TYPE == 'live event'){
          $model->EVENT_BIG_IMAGE->saveAs(Yii::app()->basePath . '/../files/focusblock/bigimage/' . $model->EVENT_BIG_IMAGE);
          $model->EVENT_THUMBNAIL->saveAs(Yii::app()->basePath . '/../files/focusblock/thumbnail/' . $model->EVENT_THUMBNAIL);
        }
      }else{
        print_r($model->getErrors());
      }
    } else
      throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
  }
  
  public function actionDeleteFocus(){
    if (isset($_POST)) {
      $model = FocusBlock::model()->find('ID = :id', array(':id' => $_POST['id']));
      if($model->delete()){
        echo "deleted";
      }else{
        print_r($model->getErrors());
      }
    } else
      throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
  }
  
  public function actionUpdateFocusOrder() {
    if (isset($_POST)) {
      $orderList = $_POST['order-list'];
      foreach ($orderList as $key => $value) {
        $model = FocusBlock::model()->find('ID = :id', array(':id' => $value));
        $model->POSITION = $key + 1;
        $model->save();
      }
      echo "Updated the order. Please Regenerate XML.";
    } else
      throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
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