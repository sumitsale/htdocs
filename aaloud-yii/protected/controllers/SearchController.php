<?php

class SearchController extends Controller
{
  public $perPage = 12;
  
	public function actionIndex()
	{
	$this->locationtop = 21;
    $this->locationright = 22;
	
	$searchtext='';
	$text='';
	
	$result2='';
	$result1='';
	
	if(isset($_GET['searchtext']))
	{	
		  $parser=new CHtmlPurifier(); 
			
			$text=strip_tags($_GET['searchtext']);
		    $searchtext=$parser->purify($text);
	}
	 // echo $searchtext;exit;
	
	//$searchtext=str_replace(' ','',$searchtext);
	
	
	
	$url=str_replace('win',$searchtext,Yii::app()->params['Artist_search']);
	
	$url1=str_replace('win',$searchtext,Yii::app()->params['Video_search']);

// 	echo $url."<br><br>";
	
//	echo $url1;exit;
  
 	
	$this->layout='column1';
	
	$result2=$this->get_data($url);

	$artist ='';
	//$artist=array();
	$errorartist='';
	if(isset($result2))
	{
	
    $artist = simplexml_load_string(str_replace(':','',$result2));
	}
	else
	{
	$errorartist="Some Thing Went Wrong Please Try Again";
	}
	

/*
	echo "<pre>";
	print_r($artist);
	
	echo $errorartist; exit;
	
		*/
	$result1=$this->get_data($url1);

	$video='';
	$errorvideo='';
	if(isset($result1))
	{
    $video = simplexml_load_string(str_replace(':','',$result1));
	}
	else
	{
	$errorvideo="Some Thing Went Wrong Please Try Again";
	}
	
	
	/*
	echo "<pre>";
	print_r($video);exit;
	*/
	

		 $artist_id = '';
		 
		 if(count($artist->responsedata->autnhit)>0)
			{
					for ($i = 0; $i < count($artist->responsedata->autnhit); $i++) {
					$artist_id .= $artist->responsedata->autnhit[$i]->autncontent->DOCUMENT->ARTISTID. ",";
					}

					$artist_id= substr($artist_id, 0, -1);
			}
		
		if(isset($_REQUEST['testmode']) && $_REQUEST['testmode']=='artist')
			{
				echo "<pre>"; 
				print_r($artist); echo "</pre>";
			}
			
			
		
		$z=0;
		$artistid='';
		$artistid=array();
		
		for ($p = 0; $p < count($artist->responsedata->autnhit); $p++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $artist->responsedata->autnhit[$p]->autncontent->DOCUMENT->ARTISTID . ".xml")) {

          $artistid[$z]['ARTIST_ID'] = $artist->responsedata->autnhit[$p]->autncontent->DOCUMENT->ARTISTID;
          $z+=1;
        }
      }
	/*	 */
		// echo "<pre>";
		// print_r($artistid);exit;
			
			
			$video_id = '';
			
			if(count($video->responsedata->autnhit)>0)
			{
					 for ($j = 0; $j < count($video->responsedata->autnhit); $j++)
					 {
						$video_id .= $video->responsedata->autnhit[$j]->autncontent->DOCUMENT->DREREFERENCE. ",";
					 }

					$video_id= substr($video_id, 0, -1);
			}
			
			if(isset($_REQUEST['testmode']) && $_REQUEST['testmode']=='video')
				{
					echo "<pre>"; 
					print_r($video); echo "</pre>";
				}
			/*
		 for ($i = 0; $i < count($video->responsedata->autnhit); $i++) 
		 {

						if (file_exists(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $array_video_id[$i] . ".xml")) {
						  if ($array_video_id[$i] != '') {
							$result[$j]['CONTENT_ID'] = $array_video_id[$i];
							$j+=1;
						  }
						}
		 }
			*/
			
			
			/*
			echo "<pre>";
			print_r($artist_id);
			echo "<br>";
			print_r($video_id);
			exit;
			*/
			$news='';
			$news=array();
			$news_id = 0;
			if(strlen($searchtext)>0)
			{
			$news = Yii::app()->db->createCommand()
				->select('*')
				->from('tbl_aa_press')
				->where("Press_News_Status=:id and (Press_News_Title like '%".$searchtext."%' or Press_News_Content like '%".$searchtext."%' or Press_News_Exclusive like '%".$searchtext."%')", array(':id' => 'P'))
				->order('Press_News_Date desc')
				->limit('10')
				->queryAll();
	
			
				
				if(count($news)>0)
				{
					 for ($k = 0; $k < count($news); $k++) {
					$news_id .= $news[$k]['Press_id']. ",";
					}

					$news_id= substr($news_id, 0, -1);
			    }
			
		}
		/*
		echo "<pre>";
		print_r($news_id);exit;
		*/
					    

/*
	echo "<pre>";

	print_r($artist);exit;
	*//*	*/	

	//echo "<pre>";
	
	
	//print_r($video);exit;
		
			if(isset($_REQUEST['testmode']) && $_REQUEST['testmode']=='news')
			{
				echo "<pre>"; 
				print_r($news); echo "</pre>";
			}
			
			
	
		$this->render('index',array(
		'artist_id'=>$artist_id,
		'video_id'=>$video_id,
		'artist'=>$artist,
		'video'=>$video,
		'news'=>$news,
		'news_id'=>$news_id,
		'artistid'=>$artistid,
		'errorvideo'=>$errorvideo,
		'errorartist'=>$errorartist,
		'searchtext'=>$searchtext,
		));
	}
	
	public function actionArtist()
	{
	  $this->locationtop = 59;
    $this->locationright = 58;
    $this->layout = 'column1';
		
	$char='';
	$artistid='';
	
		$genrelist = Yii::app()->db2->createCommand()
            ->selectDistinct('g.GENRE_ID,g.GENRE_NAME')
            ->from('TBL_CONTENTS c')
						->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
						->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
						->where('c.CONTENT_TYPE_ID =1')
            ->order('g.GENRE_NAME asc')
            ->queryAll();

    $langlist = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_LANGUAGES')
            ->order('LANGUAGE_TITLE asc')
            ->queryAll();
	
	
	if(isset($_POST['artistid']))
	{
	$artistid=$_POST['artistid'];
	}
			$array_artist_id = '';
            $array_artist_id = array();
            $array_artist_id = explode(',', $artistid);
			
			
	
			
			  $start = 0;

  
    $j = 0;
    $result = array();
    if (count($array_artist_id) > 0) {

      for ($i = 0; $i < count($array_artist_id); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $array_artist_id[$i] . ".xml")) {

          $result[$j]['ARTIST_ID'] = $array_artist_id[$i];
          $j+=1;
        }
      }
    }
	

    $totalPage = ceil(count($result) / $this->perPage);


    $this->render('artists', array(
        'genrelist' => $genrelist,
        'langlist' => $langlist,
        'result' => $result,
        'totalPage' => $totalPage,
        'perPage' => $this->perPage,
		'char'=>$char,
		'artistid'=>$artistid,
    ));
			
			
			
	}
	
	public function actionAjaxPage() {
	
	
	
	$result=array();
    $genrelist = Yii::app()->db2->createCommand()
            ->select('GENRE_NAME')
            ->from('TBL_GENRES')
            ->order('GENRE_NAME asc')
            ->queryAll();

    $langlist = Yii::app()->db2->createCommand()
            ->select('LANGUAGE_TITLE')
            ->from('TBL_LANGUAGES')
            ->order('LANGUAGE_TITLE asc')
            ->queryAll();

    $var = $_POST['currentPage'];
    $arr = explode('_', $var);
    
      $currentPage = $arr[1];
	  
	  $artistid=$arr[0];
	
			$resultArr = '';
            $resultArr = array();
            $resultArr = explode(',', $artistid);
	
	  
     
   
    $start = $this->perPage * ($currentPage - 1);
    $end = $start + $this->perPage;

    $j = 0;
    $k = 0;
    $result1 = array();
    if (count($resultArr) > 0) {

      for ($i = 0; $i < count($resultArr); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $resultArr[$i]. ".xml")) {
          if ($resultArr[$i] != '') {
            $result1[$j]['ARTIST_ID'] = $resultArr[$i];
            $j+=1;
          }
        }
      }
    }
    $totalPage = ceil(count($result) / $this->perPage);
    for ($i = $start; $i < $end; $i++) {
      if (isset($result1[$i]['ARTIST_ID']) && $result1[$i]['ARTIST_ID']!= '') {
        $result[$k]['ARTIST_ID'] = $result1[$i]['ARTIST_ID'];
        $k+=1;
      }
    }

    $res = $this->renderPartial('artistsajax', array(
        'result' => $result,
        'totalPage' => $totalPage,
        'perPage' => $this->perPage
            ));
    echo $res;
  }
	
	
	
	public function actionVideo()
	{
		$this->locationtop = 61;
    $this->locationright = 60;	
			
	$videoid='';		
	$this->layout = 'column1';
  $defaultvideoIpad = '';
	$defaultvideo='';
	$ipath='';
	$char='';
	
	if(isset($_POST['videoid']))
	{
	$videoid=$_POST['videoid'];
	}
			$array_video_id = '';
            $array_video_id = array();
            $array_video_id = explode(',', $videoid);


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

    

    $j = 0;
    $k = 0;

    if (count($array_video_id) > 0) {

      for ($i = 0; $i < count($array_video_id); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $array_video_id[$i] . ".xml")) {
          if ($array_video_id[$i] != '') {
            $result[$j]['CONTENT_ID'] = $array_video_id[$i];
            $j+=1;
          }
        }
      }
    }


    $totalPage = ceil(count($result) / $this->perPage);


 
      $defaultvideoArr = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/video-' .$result[0]['CONTENT_ID'].".xml");
	  

      //$defaultvideo=$defaultvideoArr->videoLink;
      //echo count($defaultvideoArr->videoLink->link);exit;
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
		'char'=>$char,
		'videoid'=>$videoid,
    ));
  }
	
	
	public function actionVideoajax() {
	
	
    $var = $_POST['currentPage'];
    $arr = explode('_', $var);
  
      $currentPage = $arr[1];
	  
	   $videoid=$arr[0];
	
			$resultArr = '';
            $resultArr = array();
            $resultArr = explode(',', $videoid);
	  
      $char = $arr[0];
     
    
    $start = $this->perPage * ($currentPage - 1);
    $end = $start + $this->perPage;



    $j = 0;
    $k = 0;
    $result1 = array();
    if (count($resultArr) > 0) {

      for ($i = 0; $i < count($resultArr); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $resultArr[$i] . ".xml")) {
          if ($resultArr[$i] != '') {
            $result1[$j]['CONTENT_ID'] = $resultArr[$i];
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
  
  public function actionNews()
  {	
		$this->locationtop= 63;
		$this->locationright= 62;
		$this->layout='column1';
		$newsid='';
		$array_news_id = '';
        $array_news_id = array();
		
		if(isset($_POST['newsid']))
		{
		$newsid=$_POST['newsid'];
		}
			
            $array_news_id = explode(',', $newsid);
			
			
		
		$news= Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_aa_press')
						->where(array('and',"Press_News_Status='P'",array('in','Press_id', $array_news_id)))
						->order('Press_News_Date desc')
						->queryAll();
						
				
	
	// modification for pagination
		$page_size =20;
		$criteria = new CDbCriteria();
        $criteria->condition = 'Press_News_Status = :id';
		$criteria->params = array (':id'=>'P');
       
       $item_count = count($news);
		// echo $item_count;
		//var_dump($criteria);
	   
	   
	   
       // $item_count = count($cleared);
        $pages = new CPagination($item_count);
        $pages->setPageSize($page_size);
        $pages->applyLimit($criteria);  // the trick is here
		//var_dump($page);
		//exit;
		/* echo $pages->offset;
		echo $pages->limit;
		echo 
		exit; */
		$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
		
		$sample =range($pages->offset+1, $end);
	

		 $this->render('allnews',array(
			//'model'=>$model,
			'news'=>$news,
			'item_count'=>$item_count,
			'page_size'=>$page_size,
			'pages'=>$pages,
			'sample'=>$sample,
			
		));
  }
	
	public function objectsIntoArray($arrObjData, $arrSkipIndices = array()) {
		$arrData = array();
		// if input is object, convert into array
		if (is_object($arrObjData)) {
			$arrObjData = get_object_vars($arrObjData);
		}
		if (is_array($arrObjData)) {
			foreach ($arrObjData as $index => $value) {
				if (is_object($value) || is_array($value)) {
					$value = $this->objectsIntoArray($value, $arrSkipIndices); // recursive call
				}
				if (in_array($index, $arrSkipIndices)) {
					continue;
				}
				$arrData[$index] = $value;
			}
		}
		return $arrData;
	}
	
	 function get_data($url) 
	{	/*
		//echo $url;exit;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100000);
		$result = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		
		//echo $result;exit;

		return $result;
		
		*/
		
		
		
		
		 $ch = curl_init();
  $timeout = 10;
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  
 
  return $data;
		
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