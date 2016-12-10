<?php

class UploadController extends Controller {

  public function actionIndex() {
	
	$this->locationtop= 33;
	$this->locationright= 34;
  
  
  if(!isset (Yii::app()->session['H_USERID'])){
			$this->redirect(array('site/index'));
			}
			
  
  
    $this->layout = 'column1';

    $model = new userartisttracks;

    if (isset($_POST['userartisttracks'])) {
      $UserID = Yii::app()->session['H_USERID'];
	  

      if ($UserID != 0) {
        $path = "uploads/tracks/";

        $trackname = mysql_escape_string(trim($_POST['userartisttracks']['TRACK_NAME']));
        $bfile_name = $_FILES['userartisttracks']['name']['TRACK_FILE'];
        $bfile = $_FILES['userartisttracks']['tmp_name']['TRACK_FILE'];
        $ext = explode('.', $bfile_name);
        $ext = strtolower($ext[count($ext) - 1]);
        $ptime = time();

        $imagefile = $UserID . "_" . $ptime . "." . $ext;
        $model->USER_ID = $UserID;
        $model->TRACK_NAME = $trackname;
        $model->TRACK_FILE = $imagefile;
        $model->TRACK_INDATE = $ptime;
        $model->MODERATION_STATUS = "M";
        $model->MODERATION_COMMENT = '';
        $model->LAST_UPDATED = $ptime;

        $model->MODERATED_FILE_INDATE = $ptime;

        $model->save();

        $id = $model->primaryKey;

        $model->MODERATED_TRACK_FILE = $id . "_" . $ptime . "." . $ext;



        if ($model->save()) {
          if (isset($_FILES['userartisttracks']['name']['TRACK_FILE']) && $_FILES['userartisttracks']['name']['TRACK_FILE'] != '') {
            copy($bfile, $path . $UserID . "_" . $ptime . "." . $ext);
          }
          Yii::app()->user->setFlash('success', "Thank you for uploading your song. Your song is under approval.");
          $this->redirect(array('index'));
        }
				else
				{
				 Yii::app()->user->setFlash('success', "The file was larger than 10MB. Please upload a smaller file.");
          $this->redirect(array('index'));
				}
      }
    }

    $this->render('upload', array(
        'model' => $model,
    ));
  }

}