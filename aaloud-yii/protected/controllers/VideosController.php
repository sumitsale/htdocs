<?php
 
class VideosController extends Controller {

  public $perPage = 12;
	public $locationtop= 47;
  public $locationright= 46;

  public function actionPlayer() {
    $path = '';
    $ipadpath = '';

    if (isset($_POST['path'])) {
      $path = $_POST['path'];
    } else {
      $path = '';
    }

    if (isset($_POST['ipath'])) {
      $ipadpath = $_POST['ipath'];
    } else {
      $ipadpath = '';
    }

    if (strlen($ipadpath) == '') {
      $defaultvideoArr = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/' . "defaultvideo.xml");
      //$defaultvideo=$defaultvideoArr->videoLink;
      //echo count($defaultvideoArr->videoLink->link);exit;



      for ($j = 0; $j < count($defaultvideoArr->videoLink->link); $j++) {

        if ($defaultvideoArr->videoLink->link[$j]->attributes() == 527) {
          $ipadpath = urlencode($defaultvideoArr->videoLink->link[$j]->file_path);
          break;
        }
      }
    }

    $filePaths = array(
        'url' => $path,
        'murl' => $ipadpath
    );
    
    echo json_encode($filePaths); exit;

    $res = $this->renderPartial('player', array(
        'path' => $path,
        'ipadpath' => $ipadpath,
            ));
    echo $res;
  }

  public function actionAjaxPage() {
    $var = $_POST['currentPage'];
    $arr = explode('_', $var);
    if (count($arr) > 1) {
      $currentPage = $arr[1];
      $char = $arr[0];
      $resultArr = Yii::app()->db2->createCommand()
              ->select('crd.CONTENT_ID,cd.CONTENT_TITLE')
              ->from('TBL_CONTENTS c')
              ->join('TBL_CONTENT_RELEASE_DATES crd', 'c.CONTENT_ID=crd.CONTENT_ID')
              ->join('TBL_CONTENT_DETAILS cd', 'c.CONTENT_ID=cd.CONTENT_ID')
              ->where(array('and', array('in', 'c.CONTENT_TYPE_ID', array(22, 53)), array('like', 'cd.CONTENT_TITLE', $char . '%')))
              ->queryAll();
    } else {
      $currentPage = $var;
      $resultArr = Yii::app()->db2->createCommand()
              ->selectDistinct('cf.CONTENT_ID')
              ->from('TBL_CONTENT_FILES cf')
              ->join('TBL_CONTENT_RELEASE_DATES crd', 'cf.CONTENT_ID=crd.CONTENT_ID')
              ->where('cf.CONTENT_FILE_TYPE_ID =:cont_file_type_id', array('cont_file_type_id' => 3))
              ->order('crd.RELEASE_DATE desc')
              ->queryAll();
    }

    $start = $this->perPage * ($currentPage - 1);
    $end = $start + $this->perPage;



    $j = 0;
    $k = 0;
    $result1 = array();
    if (count($resultArr) > 0) {

      for ($i = 0; $i < count($resultArr); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $resultArr[$i]['CONTENT_ID'] . ".xml")) {
          if ($resultArr[$i]['CONTENT_ID'] != '') {
            $result1[$j]['CONTENT_ID'] = $resultArr[$i]['CONTENT_ID'];
            $j+=1;
          }
        }
      }
    }

    for ($i = $start; $i < $end; $i++) {
      if (isset($result1[$i]['CONTENT_ID']) && $result1[$i]['CONTENT_ID'] != '') {
        $result[$k]['CONTENT_ID'] = $result1[$i]['CONTENT_ID'];
        $k+=1;
      }
    }

    $genre = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_GENRES')
            ->order('GENRE_NAME asc')
            ->queryAll();

    //echo "<pre>";
    //print_r($genre);exit;		

    $defaultvideo = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/' . "defaultvideo.xml");


    //echo "<pre>";
    //print_r($defaultvideo);exit;

    $res = $this->renderPartial('videosajax', array(
        'result' => $result,
        'perPage' => $this->perPage
            ));
    echo $res;
  }

  public function actionAjaxGenre() {
    $var = $_POST['currentPage'];
    $arr = explode('_', $var);
    $currentPage = $arr[1];
    $genreId = $arr[0];
    $start = $this->perPage * ($currentPage - 1);
    $end = $start + $this->perPage;

    $resultArr = Yii::app()->db2->createCommand()
            ->selectdistinct('cf.CONTENT_ID')
            ->from('TBL_CONTENT_GENRE_MAP cgm')
            ->join('TBL_CONTENT_FILES cf', 'cgm.CONTENT_ID = cf.CONTENT_ID')
            ->where('cgm.GENRE_ID=:genreId and cf.CONTENT_FILE_TYPE_ID=:cont_file_id', array(':genreId' => $genreId, ':cont_file_id' => 3))
            ->queryAll();

    $j = 0;
    $k = 0;
    $result1 = array();
    if (count($resultArr) > 0) {

      for ($i = 0; $i < count($resultArr); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $resultArr[$i]['CONTENT_ID'] . ".xml")) {
          if ($resultArr[$i]['CONTENT_ID'] != '') {
            $result1[$j]['CONTENT_ID'] = $resultArr[$i]['CONTENT_ID'];
            $j+=1;
          }
        }
      }
    }

    for ($i = $start; $i < $end; $i++) {
      if (isset($result1[$i]['CONTENT_ID']) && $result1[$i]['CONTENT_ID'] != '') {
        $result[$k]['CONTENT_ID'] = $result1[$i]['CONTENT_ID'];
        $k+=1;
      }
    }

    $genre = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_GENRES')
            ->order('GENRE_NAME asc')
            ->queryAll();

    //echo "<pre>";
    //print_r($genre);exit;		
    //$defaultvideo =  simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/'."defaultvideo.xml");
    //echo "<pre>";
    //print_r($defaultvideo);exit;

    $res = $this->renderPartial('videosajax', array(
        'result' => $result,
        'perPage' => $this->perPage
            ));
    echo $res;
  }

  public function actionAjaxLang() {
    $var = $_POST['currentPage'];
    $arr = explode('_', $var);
    $currentPage = $arr[1];
    $langId = $arr[0];
    $start = $this->perPage * ($currentPage - 1);
    $end = $start + $this->perPage;

    $resultArr = Yii::app()->db2->createCommand()
            ->selectDistinct('cf.CONTENT_ID')
            ->from('TBL_CONTENT_LANGUAGE_MAP clm')
            ->join('TBL_CONTENT_FILES cf', 'clm.CONTENT_ID = cf.CONTENT_ID')
            ->where('clm.LANGUAGE_ID=:lang_id and cf.CONTENT_FILE_TYPE_ID=:cont_file_id', array(':lang_id' => $langId, ':cont_file_id' => 3))
            ->queryAll();


    $j = 0;
    $k = 0;
    $result1 = array();
    if (count($resultArr) > 0) {

      for ($i = 0; $i < count($resultArr); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $resultArr[$i]['CONTENT_ID'] . ".xml")) {
          if ($resultArr[$i]['CONTENT_ID'] != '') {
            $result1[$j]['CONTENT_ID'] = $resultArr[$i]['CONTENT_ID'];
            $j+=1;
          }
        }
      }
    }

    for ($i = $start; $i < $end; $i++) {
      if (isset($result1[$i]['CONTENT_ID']) && $result1[$i]['CONTENT_ID'] != '') {
        $result[$k]['CONTENT_ID'] = $result1[$i]['CONTENT_ID'];
        $k+=1;
      }
    }



    $res = $this->renderPartial('langdirecajax', array(
        'result' => $result,
        'perPage' => $this->perPage,
        'langId' => $langId
            ));
    echo $res;
  }

  public function actionIndex($id='') {
    $this->layout = 'column1';
    $defaultvideoIpad = '';
	$defaultvideo='';
	$ipath='';
	$char='';

    $genre = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_GENRES')
            ->order('GENRE_NAME asc')
            ->queryAll();
						

    $genrelist = Yii::app()->db2->createCommand()
            ->selectDistinct('g.GENRE_ID,g.GENRE_NAME')
            ->from('TBL_CONTENTS c')
						->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
						->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
						->where('c.CONTENT_TYPE_ID =2 or c.CONTENT_TYPE_ID =53')
            ->order('g.GENRE_NAME asc')
            ->queryAll();
						

    $langlist = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_LANGUAGES')
            ->order('LANGUAGE_TITLE asc')
            ->queryAll();

    $resultArr = Yii::app()->db2->createCommand()
            ->selectDistinct('cf.CONTENT_ID')
            ->from('TBL_CONTENT_FILES cf')
            ->join('TBL_CONTENT_RELEASE_DATES crd', 'cf.CONTENT_ID=crd.CONTENT_ID')
            ->where('cf.CONTENT_FILE_TYPE_ID =:cont_file_type_id', array('cont_file_type_id' => 3))
            ->order('crd.RELEASE_DATE desc')
            ->queryAll();

    $j = 0;
    $k = 0;

    if (count($resultArr) > 0) {

      for ($i = 0; $i < count($resultArr); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $resultArr[$i]['CONTENT_ID'] . ".xml")) {
          if ($resultArr[$i]['CONTENT_ID'] != '') {
            $result[$j]['CONTENT_ID'] = $resultArr[$i]['CONTENT_ID'];
            $j+=1;
          }
        }
      }
    }


    $totalPage = ceil(count($result) / $this->perPage);


    if (isset($id) && $id != '' && file_exists(Yii::app()->basePath . '/../xml/content/videos/video-' . $id . ".xml")) {

      $defaultvideoArr = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/video-' . $id . ".xml");
	  
	
/*
      $last_index = count($defaultvideoArr->paths->path) - 1;

      for ($t = $last_index; $t >= 0; $t--) {
        if ($defaultvideoArr->paths->path[$t]->videopath ==191) {
          $defaultvideo = $defaultvideoArr->paths->path[$t]->videopath;
          break;
        }
      }
	*/

  for ($i = 0; $i < count($defaultvideoArr->paths->path); $i++) {

			if ($defaultvideoArr->paths->path[$i]->attributes() == 191) {
			  $defaultvideo = $defaultvideoArr->paths->path[$i]->videopath;
			  break;
			}
		  }


		  for ($j = 0; $j < count($defaultvideoArr->paths->path); $j++) {

			if ((integer)$defaultvideoArr->paths->path[$j]->attributes() == '32') {
			
			 $ipath=str_replace('http://','',$defaultvideoArr->paths->path[$j]->videopath);
				
             $defaultvideoIpad=str_replace('CONTENT_URL',$ipath,Yii::app()->params['WOWZA_URL']);
			  
			  break;
			}
		  }
	 

      $artistName = $defaultvideoArr->names->artistName->name[0];
      $videoDescription = $defaultvideoArr->videodetail->videoDescription;
      $videoAlbum = $defaultvideoArr->videodetail->videoAlbum;
      $videoName = $defaultvideoArr->videoName;
      $genre = $defaultvideoArr->genre;
    } else {
      $defaultvideoArr = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/' . "defaultvideo.xml");
      //$defaultvideo=$defaultvideoArr->videoLink;
      //echo count($defaultvideoArr->videoLink->link);exit;

      for ($i = 0; $i < count($defaultvideoArr->videoLink->link); $i++) {

        if ($defaultvideoArr->videoLink->link[$i]->attributes() == 191) {
          $defaultvideo = $defaultvideoArr->videoLink->link[$i]->file_path;
          break;
        }
      }


      for ($j = 0; $j < count($defaultvideoArr->videoLink->link); $j++) {

        if ((integer)$defaultvideoArr->videoLink->link[$j]->attributes() == '32') {
		
			
      $ipath=str_replace('http://','',$defaultvideoArr->paths->path[$j]->videopath);
				
       $defaultvideoIpad=str_replace('CONTENT_URL',$ipath,Yii::app()->params['WOWZA_URL']);
       
          break;
        }
      }


      $artistName = $defaultvideoArr->artistName[0];
      $videoDescription = $defaultvideoArr->videodescription;
      $videoAlbum = $defaultvideoArr->videoAlbum;
      $videoName = $defaultvideoArr->videoName;
      $genre = $defaultvideoArr->genre;
    }

	/*
	echo $defaultvideo."<br>";
	echo $defaultvideoIpad;exit;
    */
	
	
	$this->render('videos', array(
        'result' => $result,
        'genre' => $genre,
        'genrelist' => $genrelist,
        'langlist' => $langlist,
        'defaultvideo' => $defaultvideo,
        'defaultvideoArr' => $defaultvideoArr,
        'artistName' => $artistName,
        'videoDescription' => $videoDescription,
        'videoAlbum' => $videoAlbum,
        'videoName' => $videoName,
        'totalPage' => $totalPage,
        'defaultvideoIpad' => $defaultvideoIpad,
        'perPage' => $this->perPage,
		'char'=>$char
    ));
  }

  public function actionGenrelist() {

    $this->layout = 'column1';

    $genre = Yii::app()->db2->createCommand()
            ->selectDistinct('g.GENRE_ID,g.GENRE_NAME')
            ->from('TBL_CONTENTS c')
						->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
						->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
						->where('c.CONTENT_TYPE_ID =2 or c.CONTENT_TYPE_ID =53')
            ->order('g.GENRE_NAME asc')
            ->queryAll();

    $genrelist = Yii::app()->db2->createCommand()
            ->selectDistinct('g.GENRE_ID,g.GENRE_NAME')
            ->from('TBL_CONTENTS c')
						->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
						->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
						->where('c.CONTENT_TYPE_ID =2 or c.CONTENT_TYPE_ID =53')
            ->order('g.GENRE_NAME asc')
            ->queryAll();

    $langlist = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_LANGUAGES')
            ->order('LANGUAGE_TITLE asc')
            ->queryAll();
	
	$allgenreimages=array();
    for ($a = 0; $a < count($genrelist); $a++) {
      $allgenreimages[] = Yii::app()->db2->createCommand()
              ->selectDistinct('crd.CONTENT_ID,cd.CONTENT_TITLE')
              ->from('TBL_CONTENTS c')
              ->join('TBL_CONTENT_FILES cf', 'cf.CONTENT_ID = c.CONTENT_ID')
              ->join('TBL_CONTENT_RELEASE_DATES crd', 'cf.CONTENT_ID=crd.CONTENT_ID')
              ->join('TBL_CONTENT_GENRE_MAP cgm', 'cgm.CONTENT_ID=crd.CONTENT_ID')
			    ->join('TBL_CONTENT_DETAILS cd', 'c.CONTENT_ID=cd.CONTENT_ID')
              ->where('(c.CONTENT_TYPE_ID=22 or c.CONTENT_TYPE_ID=53) and (cgm.GENRE_ID=:genre_id)', array(':genre_id' => $genrelist[$a]['GENRE_ID']))
              ->order('crd.RELEASE_DATE desc')
              ->limit(3)
              ->queryAll();
    }

    //echo "<pre>";
    //print_r($allgenreimages);exit;


    $page_size = 10;
    $criteria = new CDbCriteria();

    $item_count = count($genre);

    $pages = new CPagination($item_count);
    $pages->setPageSize($page_size);
    $pages->applyLimit($criteria);  // the trick is here

    $end = ($pages->offset + $pages->limit <= $item_count ? $pages->offset + $pages->limit : $item_count);

    $sample = range($pages->offset + 1, $end);

    $this->render('genrelist', array(
        'genre' => $genre,
        'genrelist' => $genrelist,
        'langlist' => $langlist,
        'allgenreimages' =>$allgenreimages,
        'item_count' => $item_count,
        'page_size' => $page_size,
        'items_count' => $item_count,
        'pages' => $pages,
        'sample' => $sample
    ));
  }

  public function actionGenredirectory() {

    $this->layout = 'column1';
    $totalPage = '';
    $firstvideo = '';
    $result = array();

    $id = $_GET['id'];
	
	// echo $id;exit;

    $genre = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_GENRES')
            ->where('GENRE_ID=:id', array(':id' => $id))
            ->queryAll();

    $genrelist = Yii::app()->db2->createCommand()
            ->selectDistinct('g.GENRE_ID,g.GENRE_NAME')
            ->from('TBL_CONTENTS c')
						->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
						->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
						->where('c.CONTENT_TYPE_ID =2 or c.CONTENT_TYPE_ID =53')
            ->order('g.GENRE_NAME asc')
            ->queryAll();

    $langlist = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_LANGUAGES')
            ->order('LANGUAGE_TITLE asc')
            ->queryAll();


    $resultArr = Yii::app()->db2->createCommand()
            ->selectDistinct('cf.CONTENT_ID')
            ->from('TBL_CONTENT_GENRE_MAP cgm')
            ->join('TBL_CONTENT_FILES cf', 'cgm.CONTENT_ID = cf.CONTENT_ID')
            ->where('cgm.GENRE_ID=:genre_id and cf.CONTENT_FILE_TYPE_ID=:cont_file_id', array(':genre_id' => $id, ':cont_file_id' => 3))
            ->queryAll();


    $j = 0;
    $k = 0;
	$defaultvideo='';
	$defaultvideoIpad='';
    if (count($resultArr) > 0) {

      for ($i = 0; $i < count($resultArr); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $resultArr[$i]['CONTENT_ID'] . ".xml")) {
          if ($resultArr[$i]['CONTENT_ID'] != '') {
            $result[$j]['CONTENT_ID'] = $resultArr[$i]['CONTENT_ID'];
            $j+=1;
          }
        }
      }
		$defaultvideo='';
		$defaultvideoIpad='';
		$ipath='';
      $firstvideo = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $result[0]['CONTENT_ID'] . ".xml");
	  
		   for ($i = 0; $i < count($firstvideo->paths->path); $i++) {

			if ($firstvideo->paths->path[$i]->attributes() == 191) {
			  $defaultvideo = $firstvideo->paths->path[$i]->videopath;
			  break;
			}
		  }


		  for ($j = 0; $j < count($firstvideo->paths->path); $j++) {

			if ((integer)$firstvideo->paths->path[$j]->attributes() == '32') {
			
			 $ipath=str_replace('http://','',$firstvideo->paths->path[$j]->videopath);
				
             $defaultvideoIpad=str_replace('CONTENT_URL',$ipath,Yii::app()->params['WOWZA_URL']);
			  
			  break;
			}
		  }
	  
    }
    $totalPage = ceil(count($result) / $this->perPage);


    //echo "<pre>";
    //print_r($firstvideo);exit;

    $this->render('genredirec', array(
        'genre' => $genre,
        'genrelist' => $genrelist,
        'langlist' => $langlist,
        'result' => $result,
        'defaultvideo' =>$defaultvideo,
		'defaultvideoIpad'=>$defaultvideoIpad,
        'totalPage' => $totalPage,
        'perPage' => $this->perPage,
        'genreId' => $id,
		'firstvideo'=>$firstvideo,
    ));
  }

  public function actionLanglist() {

    $this->layout = 'column1';
/*
    $lang = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_LANGUAGES')
            ->order('LANGUAGE_TITLE asc')
            ->queryAll();
*/

$sql="    SELECT LANGUAGE_ID,LANGUAGE_TITLE
        FROM TBL_LANGUAGES
        WHERE LANGUAGE_ID IN (
        SELECT DISTINCT  LANGUAGE_ID
        FROM TBL_CONTENT_LANGUAGE_MAP
        WHERE CONTENT_ID IN (
        
        SELECT c.CONTENT_ID
        FROM TBL_CONTENTS c
        JOIN TBL_CONTENT_LANGUAGE_MAP clm ON c.CONTENT_ID=clm.CONTENT_ID
        WHERE  c.CONTENT_TYPE_ID IN (22,53) AND LANGUAGE_ID IN (
        SELECT LANGUAGE_ID
        FROM TBL_LANGUAGES
        )))
        ";
		
					$connection = Yii::app()->db2;
					$command = $connection->createCommand($sql);
					$lang = $command->queryAll();




    $genrelist = Yii::app()->db2->createCommand()
            ->selectDistinct('g.GENRE_ID,g.GENRE_NAME')
            ->from('TBL_CONTENTS c')
						->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
						->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
						->where('c.CONTENT_TYPE_ID =2 or c.CONTENT_TYPE_ID =53')
            ->order('g.GENRE_NAME asc')
            ->queryAll();
	
	
    $langlist = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_LANGUAGES')
            ->order('LANGUAGE_TITLE asc')
            ->queryAll();


    for ($a = 0; $a < count($lang); $a++) {

      $langimages[] = Yii::app()->db2->createCommand()
              ->selectDistinct('crd.CONTENT_ID,cd.CONTENT_TITLE')
              ->from('TBL_CONTENTS c')
              ->join('TBL_CONTENT_FILES cf', 'c.CONTENT_ID = cf.CONTENT_ID')
              ->join('TBL_CONTENT_RELEASE_DATES crd', 'cf.CONTENT_ID=crd.CONTENT_ID')
              ->join('TBL_CONTENT_LANGUAGE_MAP clm', 'clm.CONTENT_ID=crd.CONTENT_ID')
			  ->join('TBL_CONTENT_DETAILS cd', 'c.CONTENT_ID=cd.CONTENT_ID')
              ->where('(c.CONTENT_TYPE_ID=22 or c.CONTENT_TYPE_ID=53) and (clm.LANGUAGE_ID=:lang_id)', array(':lang_id' => $lang[$a]['LANGUAGE_ID']))
              ->order('crd.RELEASE_DATE desc')
              ->limit(3)
              ->queryAll();
    }


    // modification for pagination
    $page_size = 10;
    $criteria = new CDbCriteria();

    $item_count = count($lang);

    $pages = new CPagination($item_count);
    $pages->setPageSize($page_size);
    $pages->applyLimit($criteria);  // the trick is here

    $end = ($pages->offset + $pages->limit <= $item_count ? $pages->offset + $pages->limit : $item_count);

    $sample = range($pages->offset + 1, $end);

    $this->render('langlist', array(
        'lang' => $lang,
        'item_count' => $item_count,
        'page_size' => $page_size,
        'items_count' => $item_count,
        'pages' => $pages,
        'sample' => $sample,
        'genrelist' => $genrelist,
       'langlist' => $langlist,
        'langimages' => $langimages,
    ));
  }

  public function actionLangdirectory() {
    //$char='char';	
    $this->layout = 'column1';
    $result = array();
    $firstvideo = '';


    $id = $_GET['id'];



    $lang = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_LANGUAGES')
            ->where('LANGUAGE_ID=:id', array(':id' => $id))
            ->queryAll();

    $genrelist = Yii::app()->db2->createCommand()
            ->selectDistinct('g.GENRE_ID,g.GENRE_NAME')
            ->from('TBL_CONTENTS c')
						->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
						->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
						->where('c.CONTENT_TYPE_ID =2 or c.CONTENT_TYPE_ID =53')
            ->order('g.GENRE_NAME asc')
            ->queryAll();

    $langlist = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_LANGUAGES')
            ->order('LANGUAGE_TITLE asc')
            ->queryAll();


    $resultArr = Yii::app()->db2->createCommand()
            ->selectDistinct('cf.CONTENT_ID')
            ->from('TBL_CONTENT_LANGUAGE_MAP clm')
            ->join('TBL_CONTENT_FILES cf', 'clm.CONTENT_ID = cf.CONTENT_ID')
            ->where('clm.LANGUAGE_ID=:lang_id and cf.CONTENT_FILE_TYPE_ID=:cont_file_id', array(':lang_id' => $id, ':cont_file_id' => 3))
            ->queryAll();

    $j = 0;
    $k = 0;
$defaultvideoIpad='';
$defaultvideo='';
$ipath='';
    if (count($resultArr) > 0) {

      for ($i = 0; $i < count($resultArr); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $resultArr[$i]['CONTENT_ID'] . ".xml")) {
          if ($resultArr[$i]['CONTENT_ID'] != '') {
            $result[$j]['CONTENT_ID'] = $resultArr[$i]['CONTENT_ID'];
            $j+=1;
          }
        }
      }
      $firstvideo = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $resultArr[0]['CONTENT_ID'] . ".xml");
	  
	  for ($i = 0; $i < count($firstvideo->paths->path); $i++) {

        if ($firstvideo->paths->path[$i]->attributes() == 191) {
          $defaultvideo = $firstvideo->paths->path[$i]->videopath;
          break;
        }
      }


      for ($j = 0; $j < count($firstvideo->paths->path); $j++) {

        if ((integer)$firstvideo->paths->path[$j]->attributes() == '32') {
		
		 $ipath=str_replace('http://','',$firstvideo->paths->path[$j]->videopath);
				
	    $defaultvideoIpad=str_replace('CONTENT_URL',$ipath,Yii::app()->params['WOWZA_URL']);
													 
       
          break;
        }
      }
	  
	  
	  
    }
    $totalPage = ceil(count($result) / $this->perPage);


    $this->render('langdirec', array(
        'lang' => $lang,
        'langlist' => $langlist,
        'genrelist' => $genrelist,
        'result' => $result,
        'defaultvideo' => $defaultvideo,
        'totalPage' => $totalPage,
        'perPage' => $this->perPage,
        'langId' => $id,
		'defaultvideoIpad'=>$defaultvideoIpad,
		'firstvideo'=>$firstvideo,
    ));
  }

  public function actionPopularvideos($id = '') {

    $result = Yii::app()->db->createCommand()
            ->select('content_id')
            ->from('topvideos')
            ->order('priority asc')
            ->queryAll();
    //echo "<pre>";
    //print_r($result);exit;

    $genre = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_GENRES')
            ->queryAll();

    $genrelist = Yii::app()->db2->createCommand()
            ->selectDistinct('g.GENRE_ID,g.GENRE_NAME')
            ->from('TBL_CONTENTS c')
						->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
						->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
						->where('c.CONTENT_TYPE_ID =2 or c.CONTENT_TYPE_ID =53')
            ->order('g.GENRE_NAME asc')
            ->queryAll();

    $langlist = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_LANGUAGES')
            ->order('LANGUAGE_TITLE asc')
            ->queryAll();
			
	  $defaultvideo='';
	  $defaultvideoIpad='';
	  $ipath='';


    if (isset($id) && $id != '' && file_exists(Yii::app()->basePath . '/../xml/content/videos/video-' . $id . ".xml")) {

      $defaultvideoArr = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/video-' . $id . ".xml");
	  /*
      $last_index = count($defaultvideoArr->paths->path) - 1;

      for ($t = $last_index; $t >= 0; $t--) {
        if ($defaultvideoArr->paths->path[$t]->videopath != "") {
          $defaultvideo = $defaultvideoArr->paths->path[$t]->videopath;
          break;
        }
      }
*/

for ($i = 0; $i < count($defaultvideoArr->paths->path); $i++) {

			if ($defaultvideoArr->paths->path[$i]->attributes() == 191) {
			  $defaultvideo = $defaultvideoArr->paths->path[$i]->videopath;
			  break;
			}
		  }


		  for ($j = 0; $j < count($defaultvideoArr->paths->path); $j++) {

			if ((integer)$defaultvideoArr->paths->path[$j]->attributes() == '32') {
			
			 $ipath=str_replace('http://','',$defaultvideoArr->paths->path[$j]->videopath);
				
             $defaultvideoIpad=str_replace('CONTENT_URL',$ipath,Yii::app()->params['WOWZA_URL']);
			  
			  break;
			}
		  }




      $artistName = $defaultvideoArr->names->artistName->name[0];
      $videoDescription = $defaultvideoArr->videodetail->videoDescription;
      $videoAlbum = $defaultvideoArr->videodetail->videoAlbum;
      $videoName = $defaultvideoArr->videoName;
      $genre = $defaultvideoArr->genre;
    } else {

      $defaultvideoArr = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/video-' . $result[0]['content_id'] . ".xml");

      //echo "<pre>";
      //print_r($defaultvideoArr);exit;

      //$defaultvideo = $defaultvideoArr->paths->path->videopath;
	 
	   for ($i = 0; $i < count($defaultvideoArr->paths->path); $i++) {

        if ($defaultvideoArr->paths->path[$i]->attributes() == 191) {
          $defaultvideo = $defaultvideoArr->paths->path[$i]->videopath;
          break;
        }
      }


      for ($j = 0; $j < count($defaultvideoArr->paths->path); $j++) {

        if ((integer)$defaultvideoArr->paths->path[$j]->attributes() == '32') {
		
			
		$ipath=str_replace('http://','',$defaultvideoArr->paths->path[$j]->videopath);
				
        $defaultvideoIpad=str_replace('CONTENT_URL',$ipath,Yii::app()->params['WOWZA_URL']);
		
         
          break;
        }
      }
	  
	  
	  
	  
	  
      $artistName = $defaultvideoArr->names->artistName->name[0];
      $videoDescription = $defaultvideoArr->videodetail->videoDescription;
      $videoAlbum = $defaultvideoArr->videodetail->videoAlbum;
      $videoName = $defaultvideoArr->videoName;
      $genre = $defaultvideoArr->genre;
    }
	
	
	//echo "<pre>";
    //print_r($result);exit;
	
	//echo $videoDescription;exit;

    $this->render('popularvideos', array(
        'result' => $result,
        'genre' => $genre,
        'genrelist' => $genrelist,
        'langlist' => $langlist,
        'defaultvideo' => $defaultvideo,
        'defaultvideoArr' => $defaultvideoArr,
        'artistName' => $artistName,
        'videoDescription' => $videoDescription,
        'videoAlbum' => $videoAlbum,
        'videoName' => $videoName,
        'genre' => $genre,
		'defaultvideoIpad'=>$defaultvideoIpad
    ));
  }

  public function actionDirectory($char) {

    $this->layout = 'column1';
    $result = array();

   $genrelist = Yii::app()->db2->createCommand()
            ->selectDistinct('g.GENRE_ID,g.GENRE_NAME')
            ->from('TBL_CONTENTS c')
						->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
						->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
						->where('c.CONTENT_TYPE_ID =2 or c.CONTENT_TYPE_ID =53')
            ->order('g.GENRE_NAME asc')
            ->queryAll();

    $langlist = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_LANGUAGES')
            ->order('LANGUAGE_TITLE asc')
            ->queryAll();

    $resultArr = Yii::app()->db2->createCommand()
            ->select('crd.CONTENT_ID,cd.CONTENT_TITLE')
            ->from('TBL_CONTENTS c')
            ->join('TBL_CONTENT_RELEASE_DATES crd', 'c.CONTENT_ID=crd.CONTENT_ID')
            ->join('TBL_CONTENT_DETAILS cd', 'c.CONTENT_ID=cd.CONTENT_ID')
            ->where(array('and', array('in', 'c.CONTENT_TYPE_ID', array(22, 53)), array('like', 'cd.CONTENT_TITLE', $char . '%')))
            ->queryAll();

    $j = 0;
    $k = 0;
	$defaultvideo='';
	$defaultvideoIpad='';
	$ipath='';

    if (count($resultArr) > 0) {

      for ($i = 0; $i < count($resultArr); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $resultArr[$i]['CONTENT_ID'] . ".xml")) {
          if ($resultArr[$i]['CONTENT_ID'] != '') {
            $result[$j]['CONTENT_ID'] = $resultArr[$i]['CONTENT_ID'];
            $j+=1;
          }
        }
      }
    }

    $totalPage = ceil(count($result) / $this->perPage);
	$defaultvideoArr='';
	
    if (isset($id) && $id != '' && file_exists(Yii::app()->basePath . '/../xml/content/videos/video-' . $id . ".xml")) {

      $defaultvideoArr = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/video-' . $id . ".xml");
      $last_index = count($defaultvideoArr->paths->path) - 1;

        for ($i = 0; $i < count($defaultvideoArr->paths->path); $i++) {

        if ($defaultvideoArr->paths->path[$i]->attributes() == 191) {
          $defaultvideo = $defaultvideoArr->paths->path[$i]->videopath;
          break;
        }
      }


      for ($j = 0; $j < count($defaultvideoArr->paths->path); $j++) {

        if ((integer)$defaultvideoArr->paths->path[$j]->attributes() == '32') {
		
	 $ipath=str_replace('http://','',$defaultvideoArr->paths->path[$l]->videopath);
				
     $defaultvideoIpad=str_replace('CONTENT_URL',$ipath,Yii::app()->params['WOWZA_URL']);
													 
        
          break;
        }
      }

      $artistName = $defaultvideoArr->names->artistName->name[0];
      $videoDescription = $defaultvideoArr->videodetail->videoDescription;
      $videoAlbum = $defaultvideoArr->videodetail->videoAlbum;
      $videoName = $defaultvideoArr->videoName;
      $genre = $defaultvideoArr->genre;
    } else {
	
		if(isset($result[0]['CONTENT_ID']) && $result[0]['CONTENT_ID']!='')
		{
      $defaultvideoArr = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/video-' . $result[0]['CONTENT_ID'] . ".xml");
	

			for ($i = 0; $i < count($defaultvideoArr->paths->path); $i++) {

			if ($defaultvideoArr->paths->path[$i]->attributes() == 191) {
			  $defaultvideo = $defaultvideoArr->paths->path[$i]->videopath;
			  break;
			}
		  }


		  for ($j = 0; $j < count($defaultvideoArr->paths->path); $j++) {

			if ((integer)$defaultvideoArr->paths->path[$j]->attributes() == '32') {
			
			$ipath=str_replace('http://','',$defaultvideoArr->paths->path[$j]->videopath);
				
		    $defaultvideoIpad=str_replace('CONTENT_URL',$ipath,Yii::app()->params['WOWZA_URL']);
	
			  
			  break;
			}
		  }
			
		  $artistName = $defaultvideoArr->names->artistName->name[0];
		  $videoDescription = $defaultvideoArr->videoDetail->videoDescription;
		  $videoAlbum = $defaultvideoArr->videoAlbum;
		  $videoName = $defaultvideoArr->videoName;
		  $genre = $defaultvideoArr->genre;
	    }
		else
		{
		 $defaultvideo='';
		 $defaultvideoIpad='';
		 $defaultvideoArr='';
		  $artistName ='';
		  $videoDescription ='';
		  $videoAlbum = '';
		  $videoName ='';
		  $genre = '';
		
		
		}
    }
//echo $artistName;exit;



    $this->render('videos', array(
        'result' => $result,
        'genre' => $genre,
        'genrelist' => $genrelist,
        'langlist' => $langlist,
        'defaultvideo' => $defaultvideo,
        'defaultvideoArr' => $defaultvideoArr,
        'artistName' => $artistName,
        'videoDescription' =>$videoDescription,
        'videoAlbum' => $videoAlbum,
        'videoName' => $videoName,
        'totalPage' => $totalPage,
        'perPage' => $this->perPage,
        'char' => $char,
		'defaultvideoIpad'=>$defaultvideoIpad,
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