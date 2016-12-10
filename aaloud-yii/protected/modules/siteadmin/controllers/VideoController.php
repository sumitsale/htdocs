<?php

class VideoController extends Controller {

  public function actionDefaultvideo() {
    $model1 = new ContentDetails;
    $model = new TblArtists;
    $genre = new TblGenres;
    $language = new TblLanguages;

    if ($_POST) {

      $cont_id = $_POST['ContentDetails']['CONTENT_TITLE'];
      $artist_id = $_POST['TblArtists']['ARTIST_ID'];

      $obj = new generatexmlfile;

	  
	//  echo $cont_id;exit;
	  
	  
      $sql = Yii::app()->db2->createCommand()
              ->select('a.ARTIST_ID as artistId,c.CONTENT_ID as videoId,a.ARTIST_NAME as artistName,cd.CONTENT_TITLE as videoName, g.GENRE_NAME as genre, l.LANGUAGE_TITLE as language')
              ->from('TBL_CONTENTS c')
              ->join('TBL_CONTENT_GENRE_MAP cg', 'c.CONTENT_ID = cg.CONTENT_ID')
              ->join('TBL_CONTENT_LANGUAGE_MAP lg', 'c.CONTENT_ID = lg.CONTENT_ID')
              ->join('TBL_GENRES g', 'cg.GENRE_ID = g.GENRE_ID')
              ->join('TBL_LANGUAGES l', 'lg.LANGUAGE_ID = l.LANGUAGE_ID')
              ->join('TBL_CONTENT_DETAILS cd', 'c.CONTENT_ID = cd.CONTENT_ID')
              ->join('TBL_CNT_ART_ROLE_MAP ar', 'ar.CONTENT_ID = c.CONTENT_ID')
              ->join('TBL_ARTIST_ROLE_MAP am', 'am.ARTIST_ROLE_MAP_ID = ar.ARTIST_ROLE_MAP_ID')
              ->join('TBL_ARTIST_DETAILS ad', 'ad.ARTIST_ID = am.ARTIST_ID')
              ->join('TBL_ARTISTS a', 'a.ARTIST_ID = ad.ARTIST_ID')
              //->join('TBL_CONTENT_FILES cf', 'c.CONTENT_ID=cf.CONTENT_ID')
              //->join('TBL_FILES f', 'cf.FILE_ID=f.FILE_ID')
              ->where('c.CONTENT_ID=:content_id and a.ARTIST_ID = :artist_id', array(':content_id' => $cont_id, ':artist_id' => $artist_id), array('in', 'c.CONTENT_TYPE_ID', array(22, 53)))
              ->queryAll();

    //  echo "<pre>";
    //  print_r($sql);exit;
	  
				  $video=Yii::app()->db2->createCommand()
				  ->select('tf.FILE_PATH,tcf.FILE_SUB_TYPE_ID')
				  ->from('TBL_FILES tf')
				  ->join('TBL_CONTENT_FILES tcf','tf.FILE_ID=tcf.FILE_ID')
				  ->where('tcf.CONTENT_ID=:cont_id and tcf.CONTENT_FILE_TYPE_ID=:file_id and (tcf.FILE_SUB_TYPE_ID=191 or tcf.FILE_SUB_TYPE_ID=527)',array(':cont_id'=>$cont_id,':file_id'=>3))
				  ->queryAll();
				  
				 // echo "<pre>";
				 // print_r($video);exit;
				 
							$videopath = '';

							$videopath = array();
				 
				  if (count($video) > 0) {
							

							for ($i = 0; $i < count($video); $i++) {

							  $videopath[] = array(
								  '@attributes' => array(
									  'type' => $video[$i]['FILE_SUB_TYPE_ID']
								  ),
								  'file_path'=>array('@cdata' =>$video[$i]['FILE_PATH']),
								 
							  );
							}
							$video_paths['videoLink']['link'] = $videopath;
						  } else {
							$video_paths['videoLink']['link'] = '';
						  }
	 
	 
	 //echo "<pre>";
	 //print_r($video_paths);exit;
	 
	 
	 


      $sql1 = Yii::app()->db2->createCommand()
              ->select('PACKAGE_CONTENT_ID')
              ->from('TBL_PACKAGE_CONTENT_MAP ')
              ->where('CONTENT_ID=:content_id', array(':content_id' => $cont_id))
              ->queryAll();
			  
			  if(count($sql1)>0)
			  {
      $sql2 = Yii::app()->db2->createCommand()
              ->select('CONTENT_TITLE as videoAlbum,CONTENT_DESCRIPTION as videodescription')
              ->from('TBL_CONTENT_DETAILS')
              ->where('CONTENT_ID=:content_id', array(':content_id' => $sql1[0]['PACKAGE_CONTENT_ID']))
              ->queryAll();
			  }
			  else
			  {
			   $sql2 = Yii::app()->db2->createCommand()
						  ->select('CONTENT_TITLE as videoAlbum,CONTENT_DESCRIPTION as videodescription')
						  ->from('TBL_CONTENT_DETAILS')
						  ->where('CONTENT_ID=:content_id', array(':content_id' => 0))
						  ->queryAll();
			  }

												$artistdets='';
												$artistdets=array();
														
																			if(count($sql2)>0)
																					{
																						$artistdets=array('videoAlbum'=>$sql2[0]['videoAlbum'],
																										          'videodescription'=> array('@cdata' => $sql2[0]['videodescription']),
																										);
																					}
																			else
																					{
																					$artistdets=array('videoAlbum'=>'',
																														'videodescription'=>'',
																										);
																					}
   
      if (count($sql) > 0) {
        $videoDetails = array_merge($sql[0],$video_paths,$artistdets);
		
		
		 $xml = Array2XML::createXML('defaultVideo', $videoDetails);
          $xml->save(Yii::app()->basePath . '/../xml/content/videos/defaultvideo.xml');
		
		
        Yii::app()->user->setFlash('success', "Xml Generated Successfully");
      } else {
        Yii::app()->user->setFlash('success', "Sorry Xml not Generated,No Data Found");
      }
    }


    $this->render('defaultvideo', array(
        'model' => $model,
        'model1' => $model1,
        'language' => $language,
        'genre' => $genre,
    ));
  }

  public function actionAutocompleteTest() {
    $res = array();
    $model = new ContentDetails;
    if (isset($_GET['term'])) {

      /*
        $qtxt ="SELECT CONTENT_TITLE,CONTENT_ID FROM TBL_CONTENT_DETAILS WHERE CONTENT_ID in (select distinct PACKAGE_CONTENT_ID from TBL_PACKAGE_CONTENT_MAP) and CONTENT_TITLE like '".$_GET['term']."%'";
        $command =Yii::app()->db2->createCommand($qtxt);
       */

      $command = Yii::app()->db2->createCommand()
              ->selectDistinct('b.ARTIST_ID,b.ARTIST_NAME')
              ->from('TBL_ARTIST_ROLE_MAP a')
              ->join('TBL_ARTISTS b', 'a.ARTIST_ID=b.ARTIST_ID')
              ->where('b.ARTIST_NAME LIKE :ARTIST_NAME', array(':ARTIST_NAME' => $_GET['term'] . '%'));
      $res = $command->queryAll();
    }

    //echo CJSON::encode($res);

    $arr = array();
    for ($i = 0; $i < count($res); $i++) {
      $arr[] = array(
          'label' => $res[$i]['ARTIST_NAME'], // label for dropdown list    
          'value' => $res[$i]['ARTIST_NAME'],
          'id' => $res[$i]['ARTIST_ID']            // return value from autocomplete
      );
    }


    echo CJSON::encode($arr);
    Yii::app()->end();
  }

  public function actionDisplaysubtag() {
    //$model1=new TBLTABS;



    if (isset($_POST['TblArtists']['ARTIST_ID']))
      $artist_id = $_POST['TblArtists']['ARTIST_ID'];

    if (isset($_POST['artist_id']))
      $artist_id = $_POST['artist_id'];


    $sql = Yii::app()->db2->createCommand()
            ->select('ARTIST_ROLE_MAP_ID')
            ->from('TBL_ARTIST_ROLE_MAP')
            ->where('ARTIST_ID=:arst_id ', array(':arst_id' => $artist_id))
            ->queryAll();


    $role_map_id = "";
    for ($i = 0; $i < count($sql); $i++) {
      $role_map_id .= $sql[$i]['ARTIST_ROLE_MAP_ID'] . ",";
    }

    $role_map_id = substr($role_map_id, 0, -1);

    $array_role_id = explode(',', $role_map_id);



    $sql1 = Yii::app()->db2->createCommand()
            ->select('c.CONTENT_ID')
            ->from('TBL_CNT_ART_ROLE_MAP carm')
						->join('TBL_CONTENTS c','carm.CONTENT_ID=c.CONTENT_ID')
            ->where(array('and','(c.CONTENT_TYPE_ID=22 or c.CONTENT_TYPE_ID=53)',array('in', 'ARTIST_ROLE_MAP_ID', $array_role_id)))
            ->queryAll();

    $content_id = "";
    for ($i = 0; $i < count($sql1); $i++) {
      $content_id .= $sql1[$i]['CONTENT_ID'] . ",";
      //$arr_data[] = $qryContentTypes[$i]['CONTENT_TYPE_ID'];
    }

    $content_id = substr($content_id, 0, -1);


    $array_cont_id = explode(',', $content_id);


    $data2 = Yii::app()->db2->createCommand()
            ->select('CONTENT_ID,CONTENT_TITLE')
            ->from('TBL_CONTENT_DETAILS')
            ->where(array('in', 'CONTENT_ID', $array_cont_id))
            ->queryAll();



    /*
      $data2 = TBLTABS::model()->findAll('MAIN_TAB_ID = :maintabid', array(':maintabid' =>$maintabid));
     */
    $data = CHtml::listData($data2, 'CONTENT_ID', 'CONTENT_TITLE');


    echo CHtml::tag('option', array('value' => 0), CHtml::encode("Select a Video"), true);
    foreach ($data as $value => $name) {
      echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
    }
  }

  public function actionDisplaySongMinorDetails() {
    $cont_id = $_POST['contentId'];

    $sql = Yii::app()->db2->createCommand()
            ->select('g.GENRE_NAME, l.LANGUAGE_TITLE')
            ->from('TBL_CONTENTS c')
            ->join('TBL_CONTENT_GENRE_MAP cg', 'c.CONTENT_ID = cg.CONTENT_ID')
            ->join('TBL_CONTENT_LANGUAGE_MAP lg', 'c.CONTENT_ID = lg.CONTENT_ID')
            ->join('TBL_GENRES g', 'cg.GENRE_ID = g.GENRE_ID')
            ->join('TBL_LANGUAGES l', 'lg.LANGUAGE_ID = l.LANGUAGE_ID')
            ->where('c.CONTENT_ID=:cont_id', array(':cont_id' => $cont_id))
            ->queryAll();

    $values = json_encode($sql[0]);
    echo $values;
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