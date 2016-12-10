<?php

class ArtistController extends Controller {


  public $perPage = 12;
  public $locationtop= 2;
  public $locationright= 3;

  public function actions() {
    return array(
        // captcha action renders the CAPTCHA image displayed on the contact page
        'captcha' => array(
            'class' => 'CCaptchaAction',
            'backColor' => 0xFFFFFF,
        ),
    );
  }
  
  public function actionA()
	{
	 echo Yii::app()->baseUrl;
	}

  public function accessRules() {
    return array(
        array('allow', // allow all users to perform 'index' and 'view' actions
            'actions' => array('captcha'),
            'users' => array('*'),
        ),
    );
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
    if (count($arr) > 1) {
      $currentPage = $arr[1];
      $char = $arr[0];
     /* $resultArr = Yii::app()->db2->createCommand()
              ->select('ARTIST_ID')
              ->from('TBL_ARTISTS')
              ->where(array('like', 'ARTIST_NAME', $char . '%'))
              ->queryAll();
		*/	  
		/*
			  $resultArr = Yii::app()->db2->createCommand()
            ->selectdistinct('ta.ARTIST_ID')
            ->from('TBL_ARTISTS ta')
            ->join('TBL_ARTIST_ROLE_MAP tarm', 'ta.ARTIST_ID=tarm.ARTIST_ID')
            ->where(array('and', 'tarm.ARTIST_ROLE_ID=31', array('like', 'ta.ARTIST_NAME', $char . '%')))
            ->queryAll();
			*/
			
			$resultArr=Yii::app()->db2->createCommand()
            ->selectdistinct('ta.ARTIST_ID')
			->from('TBL_ARTISTS ta')
			->join('TBL_ARTIST_ROLE_MAP tarm','ta.ARTIST_ID = tarm.ARTIST_ID')
			->join('TBL_CNT_ART_ROLE_MAP carm','tarm.ARTIST_ROLE_MAP_ID=carm.ARTIST_ROLE_MAP_ID')
			->join('TBL_CONTENT_RELEASE_DATES crd','crd.CONTENT_ID=carm.CONTENT_ID')
			->where(array('and','tarm.ARTIST_ROLE_ID=31',array('like', 'ta.ARTIST_NAME', $char . '%')))
			->order('crd.RELEASE_DATE desc')
			->queryAll();
          
          
			  
			  
			  
			  
			  
			  
    } else {
      $currentPage = $var;
      $resultArr = Yii::app()->db2->createCommand()
              ->selectdistinct('arm.ARTIST_ID')
              ->from('TBL_ARTIST_ROLE_MAP arm')
              ->join('TBL_CNT_ART_ROLE_MAP carm', 'arm.ARTIST_ROLE_MAP_ID=carm.ARTIST_ROLE_MAP_ID')
              ->join('TBL_CONTENT_RELEASE_DATES crd', 'crd.CONTENT_ID=carm.CONTENT_ID')
              ->where('arm.ARTIST_ROLE_ID=:artist_role_id', array('artist_role_id' => 31))
              ->order('crd.RELEASE_DATE desc')
              //->limit($this->perPage, $start)
              ->queryAll();
    }
    $start = $this->perPage * ($currentPage - 1);
    $end = $start + $this->perPage;

    $j = 0;
    $k = 0;
    $result1 = array();
    if (count($resultArr) > 0) {
	
	$obj=new hideartist;
	
	$hiddenartistid=$obj->hideartist();

      for ($i = 0; $i < count($resultArr); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $resultArr[$i]['ARTIST_ID'] . ".xml") && (!in_array($resultArr[$i]['ARTIST_ID'], $hiddenartistid))) {
          if ($resultArr[$i]['ARTIST_ID'] != '') {
            $result1[$j]['ARTIST_ID'] = $resultArr[$i]['ARTIST_ID'];
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

  public function actionAjaxGenre() {
    $var = $_POST['currentPage'];
    $arr = explode('_', $var);
    $currentPage = $arr[1];
    $genreId = $arr[0];
    $start = $this->perPage * ($currentPage - 1);
    $end = $start + $this->perPage;

    $resultArr =Yii::app()->db2->createCommand()
            ->selectdistinct('ar.ARTIST_ID')
            ->from('TBL_CONTENT_GENRE_MAP cg')
            ->join('TBL_CNT_ART_ROLE_MAP ca', 'ca.CONTENT_ID = cg.CONTENT_ID')
            ->join('TBL_ARTIST_ROLE_MAP ar', 'ar.ARTIST_ROLE_MAP_ID = ca.ARTIST_ROLE_MAP_ID')
			->join('TBL_CONTENT_RELEASE_DATES crd', 'crd.CONTENT_ID=ca.CONTENT_ID')
            ->where('ar.ARTIST_ROLE_ID=31 and cg.GENRE_ID=:genre_id', array(':genre_id' => $genreId))   ///add code for filtering artist on actor
			->order('crd.RELEASE_DATE desc')
            ->queryAll();




    $j = 0;
    $k = 0;
    $result1 = array();
    if (count($resultArr) > 0) {
	
	$obj=new hideartist;
	
	$hiddenartistid=$obj->hideartist();

      for ($i = 0; $i < count($resultArr); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $resultArr[$i]['ARTIST_ID'] . ".xml") && (!in_array($resultArr[$i]['ARTIST_ID'], $hiddenartistid))) {
          if ($resultArr[$i]['ARTIST_ID'] != '') {
            $result1[$j]['ARTIST_ID'] = $resultArr[$i]['ARTIST_ID'];
            $j+=1;
          }
        }
      }
    }
    $totalPage = ceil(count($result1) / $this->perPage);
    for ($i = $start; $i < $end; $i++) {
      if (isset($result1[$i]['ARTIST_ID']) && $result1[$i]['ARTIST_ID']!= '') {
        $result[$k]['ARTIST_ID'] = $result1[$i]['ARTIST_ID'];
        $k+=1;
      }
    }



    $res = $this->renderPartial('genreajax', array(
        'result' => $result,
        'totalPage' => $totalPage,
        'perPage' => $this->perPage
            ));
    echo $res;
  }

  public function actionIndex() {
  $this->locationtop= 2;
$this->locationright= 3;
		
		$char='';
    $this->layout = 'column1';
	
	
	

    /*$genrelist = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_GENRES')
            ->order('GENRE_NAME asc')
            ->queryAll();*/
						
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


    $start = 0;
	
	$obj=new hideartist;
	
	$hiddenartistid=$obj->hideartist();

    $resultArr = Yii::app()->db2->createCommand()
            ->selectdistinct('arm.ARTIST_ID')
            ->from('TBL_ARTIST_ROLE_MAP arm')
            ->join('TBL_CNT_ART_ROLE_MAP carm', 'arm.ARTIST_ROLE_MAP_ID=carm.ARTIST_ROLE_MAP_ID')
            ->join('TBL_CONTENT_RELEASE_DATES crd', 'crd.CONTENT_ID=carm.CONTENT_ID')
            ->where('arm.ARTIST_ROLE_ID=:artist_role_id', array('artist_role_id' => 31))
			//->where(array('and','arm.ARTIST_ROLE_ID=31',array('not in', 'arm.ARTIST_ID',$hiddenartistid))) ///for hide and show artist
            ->order('crd.RELEASE_DATE desc')
            //->limit($this->perPage, $start)
            ->queryAll();
			
			
			
			// echo "<pre>";
			// print_r($resultArr);exit;
			
			
    $j = 0;
    $result = array();
    if (count($resultArr) > 0) {

      for ($i = 0; $i < count($resultArr); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $resultArr[$i]['ARTIST_ID'] . ".xml") && (!in_array($resultArr[$i]['ARTIST_ID'], $hiddenartistid))) {

          $result[$j]['ARTIST_ID'] = $resultArr[$i]['ARTIST_ID'];
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
    ));
  }

  public function actionPopularartist() {

	
	$obj=new hideartist;
	
	$hiddenartistid=$obj->hideartist();
	

    $result = Yii::app()->db->createCommand()
            ->select('artist_id')
            ->from('topartists')
			->where(array('not in', 'artist_id',$hiddenartistid))          //for hide and show artist
			->order('priority asc')
            ->queryAll();

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

 
    $this->render('popularratist', array(
        'result' => $result,
        'langlist' => $langlist,
        'genrelist' => $genrelist,
    ));
  }

  public function actionLanguage() {

    $this->layout = 'column1';
/*
    $lang = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_LANGUAGES')
            ->order('LANGUAGE_TITLE asc')
            ->queryAll();
*/

$sql="SELECT LANGUAGE_ID,LANGUAGE_TITLE
        FROM TBL_LANGUAGES
        WHERE LANGUAGE_ID IN (
        SELECT DISTINCT  LANGUAGE_ID
        FROM TBL_CONTENT_LANGUAGE_MAP
        WHERE CONTENT_ID IN (
        SELECT DISTINCT CONTENT_ID
        FROM TBL_CNT_ART_ROLE_MAP_DTLS
        WHERE LANGUAGE_ID IN (SELECT LANGUAGE_ID
        FROM TBL_LANGUAGES)
        ))
        ";
		
					$connection = Yii::app()->db2;
					$command = $connection->createCommand($sql);
					$lang = $command->queryAll();
	// echo "<pre>";
	// print_r($lang);


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

    //print_r($langlist);exit;

	
	$obj=new hideartist;
	
	$hiddenartistid=$obj->hideartist();
	
	$hide = implode(",", $hiddenartistid);
	
	// echo $hide;exit;
	
	// echo "<pre>";
	// print_r($hiddenartistid);exit;
	

    for ($a = 0; $a < count($lang); $a++) {
	
	if(strlen($hiddenartistid[0])==0)
	{
	

      $languageimage[] = Yii::app()->db2->createCommand()
              ->selectdistinct('ar.ARTIST_ID')
              ->from('TBL_CONTENT_LANGUAGE_MAP clm')
              ->join('TBL_CNT_ART_ROLE_MAP ca', 'ca.CONTENT_ID = clm.CONTENT_ID')
              ->join('TBL_ARTIST_ROLE_MAP ar', 'ar.ARTIST_ROLE_MAP_ID = ca.ARTIST_ROLE_MAP_ID')
              ->where('ar.ARTIST_ROLE_ID=31 and clm.LANGUAGE_ID=:lang_id', array('lang_id' => $lang[$a]['LANGUAGE_ID']))
               //->where(array('and',array('not in', 'artist_id',$hiddenartistid)))
              ->limit(4)
              ->queryAll();
	} else{ 
		
		
		
			$sql1="  SELECT DISTINCT ar.ARTIST_ID
						  FROM TBL_CONTENT_LANGUAGE_MAP clm
						  JOIN TBL_CNT_ART_ROLE_MAP ca ON ca.CONTENT_ID = clm.CONTENT_ID 
						  JOIN TBL_ARTIST_ROLE_MAP ar ON ar.ARTIST_ROLE_MAP_ID = ca.ARTIST_ROLE_MAP_ID
						  WHERE ar.ARTIST_ROLE_ID=31 AND clm.LANGUAGE_ID='".$lang[$a]['LANGUAGE_ID']."'
						  AND ar.ARTIST_ID NOT IN ($hide)
						  LIMIT 4
					";
					
					//echo $sql1;exit;
		
					$connection = Yii::app()->db2;
					$command = $connection->createCommand($sql1);
					$languageimage[] = $command->queryAll();
			}
		
		
		
		
		
			  
    }
	
	// echo "<pre>";
	// print_r($languageimage);exit;
	

    //print_r($languageimage);exit;
    // modification for pagination
    $page_size = 10;
    $criteria = new CDbCriteria();
    // $criteria->condition = '';
    //$criteria->params = array (':id'=>'P');

    $item_count = count($lang);
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
    $end = ($pages->offset + $pages->limit <= $item_count ? $pages->offset + $pages->limit : $item_count);

    $sample = range($pages->offset + 1, $end);

    //print_r($lang);exit;

    $this->render('languages', array(
        'lang' => $lang,
        'item_count' => $item_count,
        'page_size' => $page_size,
        'items_count' => $item_count,
        'pages' => $pages,
        'sample' => $sample,
        'genrelist' => $genrelist,
        'langlist' => $langlist,
        'languageimage' => $languageimage,
    ));
  }

  public function actionLanguagedir() {
    //$char='char';	
    $this->layout = 'column1';


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
						->where('c.CONTENT_TYPE_ID =1')
            ->order('g.GENRE_NAME asc')
            ->queryAll();

    $langlist = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_LANGUAGES')
            ->order('LANGUAGE_TITLE asc')
            ->queryAll();

	$obj=new hideartist;
	
	$hiddenartistid=$obj->hideartist();
			
    $resultArr = Yii::app()->db2->createCommand()
            ->selectdistinct('ar.ARTIST_ID')
            ->from('TBL_CONTENT_LANGUAGE_MAP clm')
            ->join('TBL_CNT_ART_ROLE_MAP ca', 'ca.CONTENT_ID = clm.CONTENT_ID')
            ->join('TBL_ARTIST_ROLE_MAP ar', 'ar.ARTIST_ROLE_MAP_ID = ca.ARTIST_ROLE_MAP_ID')
			->join('TBL_CONTENT_RELEASE_DATES crd', 'crd.CONTENT_ID=ca.CONTENT_ID')
            ->where('ar.ARTIST_ROLE_ID=31 and clm.LANGUAGE_ID=:lang_id', array('lang_id' => $id))        ///add code for filtering artist on actor
			->order('crd.RELEASE_DATE desc')
            ->queryAll();


    $j = 0;
    $result = array();
    if (count($resultArr) > 0) {
	
	

      for ($i = 0; $i < count($resultArr); $i++) {

        if ($resultArr[$i]['ARTIST_ID'] != '' && file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $resultArr[$i]['ARTIST_ID'] . ".xml") && (!in_array($resultArr[$i]['ARTIST_ID'], $hiddenartistid))) {

          $result[$j]['ARTIST_ID'] = $resultArr[$i]['ARTIST_ID'];
          $j+=1;
        }
      }
    }
    $totalPage = ceil(count($result) / $this->perPage);

    $this->render('langdir', array(
        'lang' => $lang,
        'result' => $result,
        'langlist' => $langlist,
        'genrelist' => $genrelist,
        'totalPage' => $totalPage,
        'perPage' => $this->perPage,
        'langId' => $id
    ));
  }

  public function actionAjaxLang() {
    $var = $_POST['currentPage'];
    $arr = explode('_', $var);
    $currentPage = $arr[1];
    $langId = $arr[0];
    $start = $this->perPage * ($currentPage - 1);
    $end = $start + $this->perPage;
    $k = 0;
    $resultArr = Yii::app()->db2->createCommand()
            ->selectdistinct('ar.ARTIST_ID')
            ->from('TBL_CONTENT_LANGUAGE_MAP clm')
            ->join('TBL_CNT_ART_ROLE_MAP ca', 'ca.CONTENT_ID = clm.CONTENT_ID')
            ->join('TBL_ARTIST_ROLE_MAP ar', 'ar.ARTIST_ROLE_MAP_ID = ca.ARTIST_ROLE_MAP_ID')
			->join('TBL_CONTENT_RELEASE_DATES crd', 'crd.CONTENT_ID=ca.CONTENT_ID')
            ->where('ar.ARTIST_ROLE_ID=31 and clm.LANGUAGE_ID=:lang_id', array('lang_id' => $langId))        ///add code for filtering artist on actor
			->order('crd.RELEASE_DATE desc')
            ->queryAll();

    $j = 0;
    $result = array();
    if (count($resultArr) > 0) {
	
	$obj=new hideartist;
	
	$hiddenartistid=$obj->hideartist();

      for ($i = 0; $i < count($resultArr); $i++) {

        if ($resultArr[$i]['ARTIST_ID'] != '' && file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $resultArr[$i]['ARTIST_ID'] . ".xml") && (!in_array($resultArr[$i]['ARTIST_ID'], $hiddenartistid))) {

          $result1[$j]['ARTIST_ID'] = $resultArr[$i]['ARTIST_ID'];
          $j+=1;
        }
      }
    }


    for ($i = $start; $i < $end; $i++) {
      if (isset($result1[$i]['ARTIST_ID']) && $result1[$i]['ARTIST_ID']!= '') {
        $result[$k]['ARTIST_ID'] = $result1[$i]['ARTIST_ID'];
        $k+=1;
      }
    }
    $res = $this->renderPartial('artistsajax', array(
        'result' => $result,
        'perPage' => $this->perPage
            ));
    echo $res;
  }

  public function actionDirectory($char) {

    $this->layout = 'column1';

	/*
    $result = Yii::app()->db2->createCommand()
            ->selectdistinct('ta.ARTIST_ID')
            ->from('TBL_ARTISTS ta')
            ->join('TBL_ARTIST_ROLE_MAP tarm', 'ta.ARTIST_ID=tarm.ARTIST_ID')
            ->where(array('and', 'tarm.ARTIST_ROLE_ID=31', array('like', 'ta.ARTIST_NAME', $char . '%')))
            ->queryAll();
		*/	
			
			
			$sql=Yii::app()->db2->createCommand()
            ->selectdistinct('ta.ARTIST_ID')
			->from('TBL_ARTISTS ta')
			->join('TBL_ARTIST_ROLE_MAP tarm','ta.ARTIST_ID = tarm.ARTIST_ID')
			->join('TBL_CNT_ART_ROLE_MAP carm','tarm.ARTIST_ROLE_MAP_ID=carm.ARTIST_ROLE_MAP_ID')
			->join('TBL_CONTENT_RELEASE_DATES crd','crd.CONTENT_ID=carm.CONTENT_ID')
			->where(array('and','tarm.ARTIST_ROLE_ID=31',array('like', 'ta.ARTIST_NAME', $char . '%')))
			->order('crd.RELEASE_DATE desc')
			->queryAll();
			
			$obj=new hideartist;
	
			$hiddenartistid=$obj->hideartist();
			
			// echo "<pre>";
			// print_r($hiddenartistid);exit;
			
			  $j = 0;
				$result = array();
				if (count($sql) > 0) {

				  for ($i = 0; $i < count($sql); $i++) {

					if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $sql[$i]['ARTIST_ID'] . ".xml") && (!in_array($sql[$i]['ARTIST_ID'], $hiddenartistid))) {

					  $result[$j]['ARTIST_ID'] = $sql[$i]['ARTIST_ID'];
					  $j+=1;
					}
				  }
				}
          
	
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

    $totalPage = ceil(count($result) / $this->perPage);

    $this->render('artists', array(
        'result' => $result,
        'char' => $char,
        'langlist' => $langlist,
        'genrelist' => $genrelist,
        'totalPage' => $totalPage,
        'perPage' => $this->perPage
    ));
  }

  public function actionGenres() {
    $this->layout = 'column1';

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
						->where('c.CONTENT_TYPE_ID =1')
            ->order('g.GENRE_NAME asc')
            ->queryAll();

    $langlist = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_LANGUAGES')
            ->order('LANGUAGE_TITLE asc')
            ->queryAll();

	// echo "<pre>";
    // print_r($genre);exit;

    $page_size = 12;
    $criteria = new CDbCriteria();

    $item_count = count($genre);

    $pages = new CPagination($item_count);
    $pages->setPageSize($page_size);
    $pages->applyLimit($criteria);  // the trick is here
	
	
	
	$obj=new hideartist;
	
	$hiddenartistid=$obj->hideartist();
	
	// echo "<pre>";
	// echo strlen($hiddenartistid[0]);exit;

	// echo count($hiddenartistid);exit;
	
	
	$hide = implode(",", $hiddenartistid);
	
	

    for ($a=0; $a < count($genre); $a++) {
	
	
	if(strlen($hiddenartistid[0])==0)
	{
	


      $genreimage[] = Yii::app()->db2->createCommand()
              ->selectdistinct('ar.ARTIST_ID')
              ->from('TBL_CONTENT_GENRE_MAP cg')
              ->join('TBL_CNT_ART_ROLE_MAP ca', 'ca.CONTENT_ID = cg.CONTENT_ID')
              ->join('TBL_ARTIST_ROLE_MAP ar', 'ar.ARTIST_ROLE_MAP_ID = ca.ARTIST_ROLE_MAP_ID')
              ->where('ar.ARTIST_ROLE_ID=31 and cg.GENRE_ID=:genre_id', array(':genre_id' => $genre[$a]['GENRE_ID']))
              ->limit(4)                    ///add code for filtering artist on actor
              ->queryAll();
	

		}
			else
				{
		
			
			
				$sql1="   SELECT DISTINCT ar.ARTIST_ID
						  FROM TBL_CONTENT_GENRE_MAP cg 
						  JOIN TBL_CNT_ART_ROLE_MAP ca ON ca.CONTENT_ID = cg.CONTENT_ID
						  JOIN TBL_ARTIST_ROLE_MAP ar ON ar.ARTIST_ROLE_MAP_ID = ca.ARTIST_ROLE_MAP_ID
						  WHERE ar.ARTIST_ROLE_ID=31 AND cg.GENRE_ID='".$genre[$a]['GENRE_ID']."'
						  AND ar.ARTIST_ID NOT IN($hide)
						  LIMIT 4   
					";
					
					//echo $sql1;exit;
		
					$connection = Yii::app()->db2;
					$command = $connection->createCommand($sql1);
					$genreimage[] = $command->queryAll();


			   }
			  
			  
			  
    }

    //print_r($genreimage);exit;															



    $end = ($pages->offset + $pages->limit <= $item_count ? $pages->offset + $pages->limit : $item_count);

    $sample = range($pages->offset + 1, $end);

    $this->render('genres', array(
        'genre' => $genre,
        'item_count' => $item_count,
        'page_size' => $page_size,
        'items_count' => $item_count,
        'pages' => $pages,
        'sample' => $sample,
        'genreimage' => $genreimage,
        'genrelist' => $genrelist,
        'langlist' => $langlist,
    ));
  }

  public function actionGenresdir() {

    $this->layout = 'column1';

    $id = $_GET['id'];

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
						->where('c.CONTENT_TYPE_ID =1')
            ->order('g.GENRE_NAME asc')
            ->queryAll();

    $langlist = Yii::app()->db2->createCommand()
            ->select('*')
            ->from('TBL_LANGUAGES')
            ->order('LANGUAGE_TITLE asc')
            ->queryAll();


    $resultArr = Yii::app()->db2->createCommand()
            ->selectdistinct('ar.ARTIST_ID')
            ->from('TBL_CONTENT_GENRE_MAP cg')
            ->join('TBL_CNT_ART_ROLE_MAP ca', 'ca.CONTENT_ID = cg.CONTENT_ID')
            ->join('TBL_ARTIST_ROLE_MAP ar', 'ar.ARTIST_ROLE_MAP_ID = ca.ARTIST_ROLE_MAP_ID')
			->join('TBL_CONTENT_RELEASE_DATES crd', 'crd.CONTENT_ID=ca.CONTENT_ID')
            ->where('ar.ARTIST_ROLE_ID=31 and cg.GENRE_ID=:genre_id', array(':genre_id' => $id))   ///add code for filtering artist on actor
			->order('crd.RELEASE_DATE desc')
            ->queryAll();
			
	$obj=new hideartist;
	
	$hiddenartistid=$obj->hideartist();

    $j = 0;
    $result = array();
    if (count($resultArr) > 0) {

      for ($i = 0; $i < count($resultArr); $i++) {

        if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $resultArr[$i]['ARTIST_ID'] . ".xml") && (!in_array($resultArr[$i]['ARTIST_ID'], $hiddenartistid))) {

          $result[$j]['ARTIST_ID'] = $resultArr[$i]['ARTIST_ID'];
          $j+=1;
        }
      }
    }
    $totalPage = ceil(count($result) / $this->perPage);


    $this->render('genredir', array(
        'genre' => $genre,
        'result' => $result,
        'langlist' => $langlist,
        'genrelist' => $genrelist,
        'totalPage' => $totalPage,
        'genreId' => $id,
        'perPage' => $this->perPage
    ));
  }

  
  
  protected function performAjaxValidation($model) {
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }

  public function actionArtistDetail($name,$id) {
	
	 $videoxml='';
	 $defaultvideo='';
	 $defaultvideoIpad='';
	 $this->locationtop= 19;
     $this->locationright= 20;
	
	 $artistTheme = Yii::app()->db->createCommand()
            ->selectdistinct('*')
            ->from('tbl_aa_artist')
            ->where('Artist_Id=:artist_id',array(':artist_id'=>$id))   
            ->queryAll();
			
			
			if(count($artistTheme)==0)
			{
			
			$artistTheme[0]['Artist_Id']='';
			$artistTheme[0]['Artist_Bgimage']='';
			$artistTheme[0]['Artist_Bgcolor']='';
			}
			
	
				//echo "<pre>";
				//print_r($artistTheme);exit;
	
	
  
    $model = new Comments();
      $error = '';
    if (isset($_POST['Comments']) && count($_POST['Comments']) > 0) {
      $comment = $_POST['Comments']['comment'];
      $timestamp = time();
      $ca = Yii::app()->getController()->createAction('captcha');
      $captchaVal = '';
      if (!$ca->validate($_POST['Comments']['verifyCode'], false)) {

        $error = "The verification code is incorrect.";
        $captchaVal = $_POST['Comments']['verifyCode'];
      }
      $model->artist_id = $id;
      $model->user_id = (isset(Yii::app()->session['H_USERID']))?Yii::app()->session['H_USERID']:0;
      $model->comment = $comment;
      $model->indate = $timestamp;
      $model->last_updated = $timestamp;
      $model->comment_status = "P";
      $model->type = "artist";
      if ($error == '') {
        if($model->save(false))
		Yii::app()->user->setFlash('success',"Your comment has been send for verification");
	
      }
	  	else
			{
			Yii::app()->user->setFlash('success'," Captcha You Entered is Invalid");
			}
	  

     
      $this->refresh();
    }

    $this->layout = 'artistdetail';
    $artistxml = '';
    if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $id . ".xml")) {
      $artistxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $id . ".xml");
    }
		
		if (file_exists(Yii::app()->basePath . '/../xml/content/videos/video-' . $artistxml->videos->video->attributes() . ".xml")) {
       $videoxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/video-' . $artistxml->videos->video->attributes() . ".xml");
    }   
		
    if (isset($id) && $id != '') {
      $commentArr= Yii::app()->db->createCommand()
              ->select('*')
              ->from('tbl_aa_comments')
              ->where("artist_id = :id AND comment_status = 'H' and type=:type", array(':id' => $id,':type'=>'artist'))
              ->queryAll();
    }
	
	  for ($i = 0; $i < count($artistxml->videos->video); $i++) 
	  {
	  if (file_exists(Yii::app()->basePath . '/../xml/content/videos/video-' . $artistxml->videos->video[$i]->attributes() . ".xml")) {

            $videoxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/video-' . $artistxml->videos->video[$i]->attributes() . ".xml");
			
			$defaultvideo = '';
       
          for ($h = 0; $h < count($videoxml->paths->path); $h++) {

            if ($videoxml->paths->path[$h]->attributes() == 191) {
              $defaultvideo =$videoxml->paths->path[$h]->videopath;
              break;
            }
          }
          $defaultvideoIpad = '';
		  $ipath='';
          //echo count($videolisting->paths->path);exit;

          for ($l = 0; $l < count($videoxml->paths->path); $l++) {

            if ((integer)$videoxml->paths->path[$l]->attributes() == '32') {
			
			 $ipath=str_replace('http://','',$videoxml->paths->path[$l]->videopath);
				
			$defaultvideoIpad=str_replace('CONTENT_URL',$ipath,Yii::app()->params['WOWZA_URL']);
            
              break;
            }
          }
			
			break;
			
			
			}
	  }
	
	
	
	
    if ($error == '') {
      $this->render('artistdetail', array(
          'artistxml' => $artistxml,
          'videoxml' => $videoxml,
          'commentArr' => $commentArr,
		  'defaultvideo'=>$defaultvideo,
		  'defaultvideoIpad'=>$defaultvideoIpad,
          'model' => $model,
          'artistTheme' => $artistTheme,
      ));
    }
    if ($error != '') {
      $this->render('artistdetail', array(
          'artistxml' => $artistxml,
          'videoxml' => $videoxml,
          'commentArr' => $commentArr,
          'model' => $model,
          'error' => $error,
					'defaultvideo'=>$defaultvideo,
					'defaultvideoIpad'=>$defaultvideoIpad,
          'captchaVal' => $captchaVal,
          'artistTheme' => $artistTheme,
      ));
    }
  }
  
  public function actionSonginfo($contentid,$fileid)
  {

	 $result = Yii::app()->db2->createCommand()
            ->selectdistinct('c.CONTENT_DESCRIPTION')
            ->from('TBL_CONTENT_DETAILS c')
            ->join('TBL_CONTENT_FILES cf', 'cf.CONTENT_ID = c.CONTENT_ID')
            ->join('TBL_FILES f', 'f.FILE_ID = cf.FILE_ID')
            ->where('cf.CONTENT_FILE_TYPE_ID=2 and cf.CONTENT_ID=:content_id and f.FILE_ID=:file_id',array(':content_id'=>$contentid,':file_id'=>$fileid))   ///add code for filtering artist on actor
            ->queryAll();
			
			
			
			echo $result[0]['CONTENT_DESCRIPTION'];
		
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