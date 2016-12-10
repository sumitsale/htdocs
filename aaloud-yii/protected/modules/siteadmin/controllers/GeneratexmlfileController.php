<?php

class GeneratexmlfileController extends Controller {

  /**
   * In below function, the parameter id would be such as 1,2 or 3
   */
  public function actionGenerate() {

    $tableArray = array
        (
        //1 => array('table' => '', 'file' => 'newreleases.xml', 'root' => 'albums', 'child' => 'album'),
        //2 => array('table' => '', 'file' => 'newthisweek.xml', 'root' => 'newthisweeks', 'child' => 'newthisweek', 'display' => 'New This Week'),
        3 => array('table' => 'topsongs', 'file' => 'top-10-songs.xml', 'root' => 'topsongs', 'child' => 'song', 'display' => 'Top10 Songs'),
        4 => array('table' => 'topvideos', 'file' => 'popular-videos.xml', 'root' => 'popularVideos', 'child' => 'video', 'display' => 'Popular Videos'),
        5 => array('table' => 'topartists', 'file' => 'popular-artists.xml', 'root' => 'popularArtists', 'child' => 'artist', 'display' => 'Popular Artists'),
        6 => array('table' => '', 'file' => '', 'root' => '', 'child' => '', 'display' => 'All Artists'),
        7 => array('table' => '', 'file' => '', 'root' => 'video', 'child' => '', 'display' => 'All Videos'),
        8 => array('table' => '', 'file' => '', 'root' => 'song', 'child' => '', 'display' => 'All Songs'),
        9 => array('table' => '', 'file' => '', 'root' => 'song', 'child' => '', 'display' => 'Focus Area'),
	//	10=>array('table' => '', 'file' => '', 'root' => 'song', 'child' => '', 'display' => 'top 10 full song'),
		
    );


    $this->render('generatexml', array('tableArray' => $tableArray));
  }

  public function actionGeneratexml() {
    $this->layout = false;
    if (isset($_GET['id']) && $_GET['id'] != '') {
      $commandstring = $_GET['id'];
    }

//print_r($_POST);exit;
    $tableArray = array
        (
        //1 => array('table' => '', 'file' => 'newreleases.xml', 'root' => 'albums', 'child' => 'album'),
        //2 => array('table' => '', 'file' => 'newthisweek.xml', 'root' => 'newthisweeks', 'child' => 'newthisweek', 'display' => 'New This Week'),
        3 => array('table' => 'topsongs', 'file' => 'top-10-songs.xml', 'root' => 'topsongs', 'child' => 'song', 'display' => 'Top10 Songs'),
        4 => array('table' => 'topvideos', 'file' => 'popular-videos.xml', 'root' => 'popularVideos', 'child' => 'video', 'display' => 'Popular Videos'),
        5 => array('table' => 'topartists', 'file' => 'popular-artists.xml', 'root' => 'popularArtists', 'child' => 'artist', 'display' => 'Popular Artists'),
        6 => array('table' => '', 'file' => '', 'root' => '', 'child' => '', 'display' => 'All Artists'),
        7 => array('table' => '', 'file' => '', 'root' => 'video', 'child' => '', 'display' => 'All Videos'),
        8 => array('table' => '', 'file' => '', 'root' => 'song', 'child' => '', 'display' => 'All Songs'),
        9 => array('table' => '', 'file' => '', 'root' => 'song', 'child' => '', 'display' => 'Focus Area'),
		10=>array('table' => '', 'file' => '', 'root' => 'song', 'child' => '', 'display' => 'top 10 full song'),
		
    );
    if (isset($_POST) && count($_POST) > 0) {
      $xmlArray = $_POST['pages'];
    }

    $obj = new generatexmlfile;
    if (count($xmlArray) > 0 && is_array($xmlArray)) {
      foreach ($xmlArray as $index => $id) {
        $table_name = $tableArray[$id]['table'];
        $file_name = $tableArray[$id]['file'];
        $root = $tableArray[$id]['root'];
        $child = $tableArray[$id]['child'];
        $this->generate_check($id, $table_name, $file_name, $root, $child);
      }
    } else if (isset($commandstring) && $commandstring != '') {
      $table_name = $tableArray[$commandstring]['table'];
      $file_name = $tableArray[$commandstring]['file'];
      $root = $tableArray[$commandstring]['root'];
      $child = $tableArray[$commandstring]['child'];
      $sql = Yii::app()->db->createCommand()
              ->select('*')
              ->from($table_name)
              ->queryAll();

      $val = $obj->createValidXMLfromArray($sql, $root, $child);
      $obj->save(Yii::app()->basePath . '/../xml/frontend/' . $file_name, $val);
    } else {
      foreach ($tableArray as $i => $arr) {

        $table_name = $tableArray[$i]['table'];
        $file_name = $tableArray[$i]['file'];
        $root = $tableArray[$i]['root'];
        $child = $tableArray[$i]['child'];
        $this->generate_check($i, $table_name, $file_name, $root, $child);
      }
    }



    if ($_SERVER['HTTP_USER_AGENT'] != '') {
      Yii::app()->user->setFlash('success', "XML generated Successfully");
      $this->redirect(array('generate'));
    } else {
      echo "XML generated successfully";
    }
  }

  function generate_check($id, $table_name, $file_name, $root, $child) {
    $obj = new generatexmlfile;
    switch ($id) {
      /*
        case 1: $sql = Yii::app()->db->createCommand()->select('*')->from($table_name)->queryAll();
        $val = $obj->createValidXMLfromArray($sql, $root, $child);
        $obj->save(Yii::app()->basePath . '/../xml/frontend/' . $file_name, $val);
        break;
       */
      case 2:
        $sql = Yii::app()->db2->createCommand()
                ->select('a.ARTIST_NAME as artistname,h.CONTENT_TITLE as track,e.GENRE_NAME as genre,d.LANGUAGE_TITLE as language,b.ARTIST_DESCRIPTION as description,i.FILE_PATH as albumartwork')
                ->from('TBL_ARTISTS a, TBL_ARTIST_DETAILS b, TBL_ARTIST_GENRE_MAP c,TBL_LANGUAGES d,TBL_GENRES e,TBL_ARTIST_FILES f,TBL_CONTENT_FILES g,TBL_CONTENT_DETAILS h,TBL_FILES i')
                ->where('a.ARTIST_ID = b.ARTIST_ID AND b.ARTIST_ID = c.ARTIST_ID And c.GENRE_ID =e.GENRE_ID And b.LANGUAGE_ID=d.LANGUAGE_ID And f.FILE_ID=g.FILE_ID AND g.CONTENT_ID=h.CONTENT_ID And g.FILE_ID=i.FILE_ID and g.FILE_SUB_TYPE_ID=77')
                ->order('a.ARTIST_ID desc')
                ->queryAll();


        $val = $obj->createValidXMLfromArray($sql, $root, $child);
        $obj->save(Yii::app()->basePath . '/../xml/frontend/' . $file_name, $val);
        break;

      case 3:
			
				$topsongs = Yii::app()->db->createCommand()
					->select('*')
					->from('topsongs')
					->order('priority asc')
                                        ->queryAll();
          
                                    // echo "<pre>";
                                    // print_r($topsongs);exit;
          
				$newline="\n";
				$artistname='';
						
				if(isset($topsongs) && !(empty($topsongs)))		
				{
				foreach ($topsongs as $key => $value) 
					{	
						$artistdetail='';
						$artistdetail=array();
						
						$songdets[]= Yii::app()->db2->createCommand()
											->select('c.CONTENT_TITLE as title, f.FILE_PATH as mp3,cf.CONTENT_ID,FILE_SUB_TYPE_ID')
											->from('TBL_CONTENT_DETAILS c')
											->join('TBL_CONTENT_FILES cf' ,'cf.CONTENT_ID = c.CONTENT_ID')
											->join('TBL_FILES f','f.FILE_ID = cf.FILE_ID')
											->where('CONTENT_FILE_TYPE_ID=2 and FILE_SUB_TYPE_ID=181 and cf.CONTENT_ID=:cont_id'  ,array(':cont_id'=>$value['content_id']))
											->queryAll();
											
											
						$detail='';
						$url='http://europa.hungamatech.com/SecureStreaming/stream-request';
						//$url=Yii::app()->params['top10fullpath'];
						// echo $url;exit;
						
						$songdetail= Yii::app()->db2->createCommand()
											->select('c.CONTENT_TITLE as title, f.FILE_PATH as mp3,f.FILE_ID,CONTENT_FILE_TYPE_ID,FILE_SUB_TYPE_ID')
											->from('TBL_CONTENT_DETAILS c')
											->join('TBL_CONTENT_FILES cf' ,'cf.CONTENT_ID = c.CONTENT_ID')
											->join('TBL_FILES f','f.FILE_ID = cf.FILE_ID')
											->where('CONTENT_FILE_TYPE_ID=2 and FILE_SUB_TYPE_ID=181 and cf.CONTENT_ID=:cont_id'  ,array(':cont_id'=>$value['content_id']))
											->queryAll();
											
						
						 $artistdetail = Yii::app()->db2->createCommand()
							  ->select('ad.ARTIST_TITLE as artistName')
							  ->from('TBL_CNT_ART_ROLE_MAP carm')
							  ->join('TBL_ARTIST_ROLE_MAP arm', 'arm.ARTIST_ROLE_MAP_ID=carm.ARTIST_ROLE_MAP_ID')
							  ->join('TBL_ARTIST_DETAILS ad', 'ad.ARTIST_ID=arm.ARTIST_ID')
							  ->where('arm.ARTIST_ROLE_ID=31 and carm.CONTENT_ID=:CONTENT_ID',array(':CONTENT_ID'=>$value['content_id']))
							//  ->where(array('and', 'arm.ARTIST_ROLE_ID=31', array('in', 'carm.CONTENT_ID', $array_cont_id)))
							  ->queryRow();
						
						
						// echo $artistdetail['artistName'];exit;
						
						if(isset($artistdetail['artistName']))
						{
							$artistname=$artistdetail['artistName'];
						}
						else
						{
							$artistname='';
						}
						
						
						
						
						// echo "<pre>";
						// print_r($artistdetail);exit;
						
						
						// echo "<pre>";
						// print_r($songdetail);exit;
						
						// $ourFileName =Yii::app()->basePath . '/../xml/frontend/topsong/top10-'.$topsongs[$i]['content_id'].".xml";
						// $ourFileHandle = fopen($ourFileName, 'w');
						
						
						// echo "<pre>";
						// echo $detail;exit;
						
						//$rtmp = $this->sendXmlOverPost($url,$detail,60);
							
						//$rtmp=substr($http,0,strpos($rtmp,'?'));
						
						// echo $package;
                                                
                                                
                               
						// exit;
						
						
						// echo $detail1;exit;
											
							
						//$http = $this->sendXmlOverPost($url,$detail1,60);
							
											$songdetails[] = array(
												'title' => array('@cdata'=>$songdets[$key][0]['title']),
												'mp3' => array('@cdata'=>$songdets[$key][0]['mp3']),
												'content_id'=>array('@cdata'=>$songdets[$key][0]['CONTENT_ID']),
												'artistname'=>array('@cdata'=>$artistname),
												//'FILE_SUB_TYPE_ID'=>array('@cdata'=>$songdets[$key][0]['FILE_SUB_TYPE_ID']),
												
												//'rtmp'=>$package,
												//'rtmp'=>array('@cdata'=>$package),
												);		

											// echo "<pre>";
											// print_r($songdetails);exit;
					}
					
					$song=array();
					$song['song']=$songdetails;
					
					// echo "<pre>";
					// print_r($songdetails);exit;
					
					
				
				// $val=$obj->createValidXMLfromArray($songdetails,$root,$child);
				// $obj->save(Yii::app()->basePath . '/../xml/frontend/'.$file_name,$val);
				
				
				  $xml = Array2XML::createXML('topsongs', $song);
				  $xml->save(Yii::app()->basePath . '/../xml/frontend/' . $file_name);
				}
															
					break;
				
        /*$sql = Yii::app()->db->createCommand()
                ->select('*')
                ->from('topsongs')
                ->order('priority asc')
                ->queryAll();

        //echo "<pre>";
        //print_r($sql);exit;

        $content_id = '';
        if (count($sql) != 0) {
          for ($i = 0; $i < count($sql); $i++) {
            $content_id .= $sql[$i]['content_id'] . ",";
            //$arr_data[] = $qryContentTypes[$i]['CONTENT_TYPE_ID'];
          }

          $content_id = substr($content_id, 0, -1);
          $array_cont_id = explode(',', $content_id);
				
          $sql2 = Yii::app()->db2->createCommand()
                  ->select('c.CONTENT_TITLE as title, f.FILE_PATH as mp3,cf.CONTENT_ID')
                  ->from('TBL_CONTENT_DETAILS c')
                  ->join('TBL_CONTENT_FILES cf', 'cf.CONTENT_ID = c.CONTENT_ID')
                  ->join('TBL_FILES f', 'f.FILE_ID = cf.FILE_ID')
                  ->where(array('and', "cf.CONTENT_FILE_TYPE_ID=2 and cf.FILE_SUB_TYPE_ID=181 and f.FILE_PATH!=''", array('in', 'cf.CONTENT_ID', $array_cont_id)))
                  ->queryAll();

          //echo "<pre>";
          //print_r($sql2);exit;

          $sql3 = Yii::app()->db2->createCommand()
                  ->select('f.FILE_PATH as preview,cf.CONTENT_ID')
                  ->from('TBL_CONTENT_FILES cf')
									->join('TBL_FILES f','f.FILE_ID=cf.FILE_ID')
                  ->where(array('and', 'cf.FILE_SUB_TYPE_ID=2', array('in', 'cf.CONTENT_ID', $array_cont_id)))
                  ->queryAll();


          //echo "<pre>";
          //print_r($sql3);exit;

          $sql4 = Yii::app()->db2->createCommand()
                  ->select('ad.ARTIST_TITLE as artistName,carm.CONTENT_ID')
                  ->from('TBL_CNT_ART_ROLE_MAP carm')
                  ->join('TBL_ARTIST_ROLE_MAP arm', 'arm.ARTIST_ROLE_MAP_ID=carm.ARTIST_ROLE_MAP_ID')
                  ->join('TBL_ARTIST_DETAILS ad', 'ad.ARTIST_ID=arm.ARTIST_ID')
                  ->where(array('and', 'arm.ARTIST_ROLE_ID=31', array('in', 'carm.CONTENT_ID', $array_cont_id)))
                  ->queryAll();

          //echo "<pre>";
          //print_r($sql4);exit;

            $song = array();

            $songs = array();
					
          if (count($sql2) > 0) {

            for ($i = 0; $i < count($sql2); $i++) {
						if(isset($sql2[$i]['CONTENT_ID']) && isset($sql3[$i]['CONTENT_ID']))
						{
              if ($sql2[$i]['CONTENT_ID'] == $sql3[$i]['CONTENT_ID']) {
                $song[] = array(
                    'title' => $sql2[$i]['title'],
                    'mp3' => $sql2[$i]['mp3'],
                    'preview' => $sql3[$i]['preview'],
                    'contentId' => $sql2[$i]['CONTENT_ID'],
                );
              }
						} else {
                $song[] = array(
                    'title' => $sql2[$i]['title'],
                    'mp3' => $sql2[$i]['mp3'],
                    'preview' => '',
                    'contentId' => $sql2[$i]['CONTENT_ID'],
                );
              }
						
           }
					
            $songs['song'] = $song;
          } else {
            $songs['song'] = '';
          }
					

            $songdet = array();
            $songdets = array();
	
          if (count($songs) > 0) {
            
            for ($j = 0; $j < count($songs['song']); $j++) {
						
						if(isset($songs['song'][$j]['contentId']) && isset($sql4[$j]['CONTENT_ID']))
						{
              if ($songs['song'][$j]['contentId'] == $sql4[$j]['CONTENT_ID']) {
                $songdet[] = array(
                    'title' => $songs['song'][$j]['title'],
                    'mp3' => $songs['song'][$j]['mp3'],
                    'preview' => $songs['song'][$j]['preview'],
                    'artistName' => $sql4[$j]['artistName'],
                );
              } else {
                $songdet[] = array(
                    'title' => $songs['song'][$j]['title'],
                    'mp3' => $songs['song'][$j]['mp3'],
                    'preview' => $songs['song'][$j]['preview'],
                    'artistName' => '',
                );
              }
						}
            }
            $songdets['song'] = $songdet;
          } else {
            $songdets['song'] = '';
          }

					//echo "<pre>";
					//print_r($songdets);exit;
					
          $xml = Array2XML::createXML('topsongs', $songdets);
          $xml->save(Yii::app()->basePath . '/../xml/frontend/' . $file_name);
        }
        break;*/

      case 4:
        $sql = Yii::app()->db->createCommand()
								->select('content_id as videoId,video_name as videoName')
                ->from($table_name)
                ->order('priority asc')
                ->queryAll();

        $val = $obj->createValidXMLfromArray($sql, $root, $child);
        $obj->save(Yii::app()->basePath . '/../xml/frontend/' . $file_name, $val);
        break;

      case 5: $sql = Yii::app()->db->createCommand()
                ->select('artist_id as artistId,artist_name as artistName')
                ->from($table_name)
                ->order(array('priority'))
                ->queryAll();


        $val = $obj->createValidXMLfromArray($sql, $root, $child);
        $obj->save(Yii::app()->basePath . '/../xml/frontend/' . $file_name, $val);
        break;

      case 6:
        $artist_id = Yii::app()->db2->createCommand()
					->selectdistinct('arm.ARTIST_ID')
								->from('TBL_ARTIST_ROLE_MAP arm')
								->join('TBL_CNT_ART_ROLE_MAP carm', 'arm.ARTIST_ROLE_MAP_ID=carm.ARTIST_ROLE_MAP_ID')
								->join('TBL_CONTENT_RELEASE_DATES crd', 'crd.CONTENT_ID=carm.CONTENT_ID')
								->where('arm.ARTIST_ROLE_ID=:artist_role_id', array('artist_role_id' => 31))
								->order('crd.RELEASE_DATE desc')
								->queryAll();


			// echo "<pre>";
			// print_r($artist_id);exit;


/*			  ->selectdistinct('ARTIST_ID')
                ->from('TBL_ARTISTS')
                ->order('ARTIST_ID')
                ->queryAll();
				
				
  */      
  // $this->delete_directory(Yii::app()->basePath . '/../xml/content/artists');
				// rmdir(Yii::app()->basePath . '/../xml/content/artists');
				
				//mkdir(Yii::app()->basePath . '/../xml/content/artists', 0777);
				
				// rmdir(Yii::app()->basePath . '/../xml/content/artists');
				
				//$this->deleteDirectory(Yii::app()->basePath . '/../xml/content/artists');
				
				// if (!is_dir(Yii::app()->basePath . '/../xml/content/artists'))
					// {
						// mkdir(Yii::app()->basePath . '/../xml/content/artists',0777);
					// }
					
				//rmdir(Yii::app()->basePath . '/../xml/content/artists');
  
  
        if (count($artist_id) > 0) {
          for ($k = 0; $k < count($artist_id); $k++) {
            $sql = Yii::app()->db2->createCommand()
                    ->select('ARTIST_TITLE as artistName,ARTIST_DETAIL as artistDescription,ARTIST_DESCRIPTION')
                    ->from('TBL_ARTIST_DETAILS')
                    ->where('ARTIST_ID=:arst_id ', array('arst_id' => $artist_id[$k]['ARTIST_ID']))
                    ->queryAll();
					
					
					// echo "<pre>";
					// print_r($sql);exit;
					if(count($sql)>0)
					{
					$sql5['artistName']=$sql[0]['artistName'];
							if(strlen($sql[0]['artistDescription'])>0)
								{
								$sql5['artistDescription']= array('@cdata' => $sql[0]['artistDescription']);
								}
								else
								{
								$sql5['artistDescription']= array('@cdata' =>'');
								}
									if(strlen($sql[0]['ARTIST_DESCRIPTION'])>0)
									{
									$sql5['artistshortdescription']=array('@cdata'=>$sql[0]['ARTIST_DESCRIPTION']);
									}
									else
									{
									$sql5['artistshortdescription']=  array('@cdata' =>'');
									}
				
					}
					else
					{
					$sql5['artistName']='';
					$sql5['artistDescription']='';
					$sql5['artistshortdescription']='';
					}

            $sql2 = '';
            $sql2 = array();
						
						if(isset($sql[0]['artistName']) && $sql[0]['artistName']!='' && isset($sql[0]['artistDescription']) && $sql[0]['artistDescription']!='')
						{
            $sql2[0] = array('artistname' => $sql[0]['artistName']);
            $sql2[1] = array('artistDescription' => array('@cdata' => $sql[0]['artistDescription']));
						}	


            //	$artistdetail=array_merge($sql2[0],$sql2[1]);
            //////////////////////////////getting all content  of artist

            $artist_cont_id = Yii::app()->db2->createCommand()
                    ->select('content_id')
                    ->from('TBL_CNT_ART_ROLE_MAP tcarm,TBL_ARTIST_ROLE_MAP tarm')
                    ->where('tcarm.ARTIST_ROLE_MAP_ID=tarm.ARTIST_ROLE_MAP_ID and tarm.ARTIST_ID=:arst_id', array(':arst_id' => $artist_id[$k]['ARTIST_ID']))
                    ->queryAll();

            $content_id = '';

            for ($i = 0; $i < count($artist_cont_id); $i++) {
              $content_id .= $artist_cont_id[$i]['content_id'] . ",";
            }

            $content_id = substr($content_id, 0, -1);
            $array_cont_id = '';
            $array_cont_id = array();
            $array_cont_id = explode(',', $content_id);


            $artistimage = Yii::app()->db2->createCommand()
                    ->select('f.file_path')
                    ->from('TBL_CONTENT_FILES cf')
                    ->join('TBL_FILES f', 'f.FILE_ID=cf.FILE_ID')
                    ->where(array('and', 'cf.CONTENT_FILE_TYPE_ID=1 AND (cf.FILE_SUB_TYPE_ID=146 or cf.FILE_SUB_TYPE_ID=147)', array('in', 'cf.CONTENT_ID', $array_cont_id)))
                    ->queryAll();


            $artistImage200 = '';
            $artistImage200 = array();

            $artistImage200s = '';
            $artistImage200s = array();

            //echo Yii::app()->baseUrl."/themes/aaloud/images/temps/200x200.jpg"; exit;
            //echo Yii::app()->baseUrl."/themes/aaloud/images/temp/200x200.jpg";exit;
            if (count($artistimage) > 0) {




              foreach ($artistimage as $key => $value) {

                $artistImage200[] = array(
                    '@attributes' => array(
                        'id' => ($key + 1)
                    ),
                    'file_path' => $value['file_path']
                );
              }

              $artistImage200s['artistImgae200s']['artistImage200'] = $artistImage200;
            } else {

              $artistImage200s['artistImgae200s']['artistImage200'] = '';
            }

            $profileimage200 = Yii::app()->db2->createCommand()
                    ->select('tf.FILE_PATH,taf.FILE_SUB_TYPE_ID')
                    ->from('TBL_ARTIST_FILES taf')
                    ->join('TBL_FILES tf', 'taf.FILE_ID=tf.FILE_ID')
                    ->where('taf.ARTIST_FILE_TYPE_ID=1 and taf.FILE_SUB_TYPE_ID=146 and taf.ARTIST_ID=:artist_id',array(':artist_id'=>$artist_id[$k]['ARTIST_ID']))
                    ->queryAll();

            

            $profileimage = '';
            $profileimage = array();

            $profilesimages = '';
            $profilesimages = array();

            if (count($profileimage200) > 0) {
              foreach ($profileimage200 as $key => $value) {

                $profileimage[] = array(
                    '@attributes' => array(
                        'type' => $value['FILE_SUB_TYPE_ID']
                    ),
                    'file_path' => $value['FILE_PATH']
                );
              }
              $profilesimages['profileimage200']['image200'] = $profileimage;
            } else {
              $profilesimages['profileimage200']['image200'] = '';
            }

            //print_r($profilesimages);exit;
			
			
			
			
			
			
			
			$profileimage100 = Yii::app()->db2->createCommand()
                    ->select('tf.FILE_PATH,taf.FILE_SUB_TYPE_ID')
                    ->from('TBL_ARTIST_FILES taf')
                    ->join('TBL_FILES tf', 'taf.FILE_ID=tf.FILE_ID')
                    ->where('taf.ARTIST_FILE_TYPE_ID=1 and taf.FILE_SUB_TYPE_ID=38 and taf.ARTIST_ID=:artist_id',array(':artist_id'=>$artist_id[$k]['ARTIST_ID']))
                    ->queryAll();

            

            $profile100 = '';
            $profile100 = array();

            $profilesimages100 = '';
            $profilesimages100 = array();

            if (count($profileimage100) > 0) {
              foreach ($profileimage100 as $key => $value) {

                $profile100[] = array(
                    '@attributes' => array(
                        'type' => $value['FILE_SUB_TYPE_ID']
                    ),
                    'file_path' => $value['FILE_PATH']
                );
              }
              $profilesimages100['profileimage100']['image100'] = $profile100;
            } else {
              $profilesimages100['profileimage100']['image100'] = '';
            }
			
			
			
			
			
			
			
			
			
			
			
			
			


            $artistimage50 = Yii::app()->db2->createCommand()
                    ->select('tf.FILE_PATH,taf.FILE_SUB_TYPE_ID')
                    ->from('TBL_ARTIST_FILES taf')
                    ->join('TBL_FILES tf','taf.FILE_ID=tf.FILE_ID')
                    ->where('taf.ARTIST_FILE_TYPE_ID=1 and  taf.FILE_SUB_TYPE_ID=33 and taf.ARTIST_ID=:artist_id',array(':artist_id'=>$artist_id[$k]['ARTIST_ID']))
                    ->queryAll();

            //print_r($artistimage50);exit;


            $artist50 = '';
            $artist50 = array();

            $artistimage50s = '';
            $artistimage50s = array();

			

            if (count($artistimage50) > 0) {



              foreach ($artistimage50 as $key => $value) {

                $artist50[] = array(
                    '@attributes' => array(
                        'type' => $value['FILE_SUB_TYPE_ID']
                    ),
                    'file_path' => $value['FILE_PATH']
                );
              }


              $artistimage50s['profileimage50']['image50'] = $artist50;
            } else {
              $artistimage50s['profileimage50']['image50'] = '';
            }



            //print_r($artistimage50s);exit;


            /*$artistgenre = Yii::app()->db2->createCommand()
                    ->selectdistinct('tg.GENRE_NAME,tg.GENRE_ID')
                    ->from('TBL_CONTENT_GENRE_MAP tcgm')
                    ->join('TBL_GENRES tg', 'tcgm.GENRE_ID=tg.GENRE_ID')
                    ->where(array('in', 'tcgm.CONTENT_ID', $array_cont_id))
                    ->queryAll();*/
										
					$artistgenre = Yii::app()->db2->createCommand()
										->selectDistinct('g.GENRE_ID,g.GENRE_NAME')
										->from('TBL_CONTENTS c')
										->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
										->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
										->where(array('and','c.CONTENT_TYPE_ID =1 or c.CONTENT_TYPE_ID =21',array('in', 'cgm.CONTENT_ID', $array_cont_id)))
										->order('g.GENRE_NAME asc')
										->queryAll();

            $genre = array();
            $genres = array();

            if (count($artistgenre) > 0) {


              foreach ($artistgenre as $key => $value) {


                $genre[] = array(
                    '@attributes' => array(
                        'id' => $value['GENRE_ID']
                    ),
                    'genreName' => $value['GENRE_NAME'],
                );
              }

              $genres['genres']['genre'] = $genre;
            } else {
              $genres['genres']['genre'] = '';
            }


            $artistlamguage = Yii::app()->db2->createCommand()
                    ->selectdistinct('tl.LANGUAGE_TITLE,tl.LANGUAGE_ID')
                    ->from('TBL_CONTENT_LANGUAGE_MAP tclm')
                    ->join('TBL_LANGUAGES tl', 'tclm.LANGUAGE_ID=tl.LANGUAGE_ID')
                    ->where(array('in', 'tclm.CONTENT_ID', $array_cont_id))
                    ->queryAll();

            $language = array();

            if (count($artistlamguage) > 0) {


              $language = '';
              $language = array();

              $languages = '';
              $languages = array();



              foreach ($artistlamguage as $key => $value) {


                $language[] = array(
                    '@attributes' => array(
                        'id' => $value['LANGUAGE_ID']
                    ),
                    'languageName' => $value['LANGUAGE_TITLE'],
                );
              }

              $languages['languages']['language'] = $language;
            } else {
              $languages['languages']['language'] = '';
            }

/*
            $audiocontent = Yii::app()->db2->createCommand()
                    ->selectdistinct('c.CONTENT_TITLE as title, f.FILE_PATH as mp3,cf.FILE_SUB_TYPE_ID,f.FILE_ID,cf.CONTENT_ID')
                    ->from('TBL_CONTENT_DETAILS c')
                    ->join('TBL_CONTENT_FILES cf', 'cf.CONTENT_ID = c.CONTENT_ID')
                    ->join('TBL_FILES f', 'f.FILE_ID = cf.FILE_ID')
                    ->where(array('and', 'cf.CONTENT_FILE_TYPE_ID=2', array('in', 'cf.CONTENT_ID', $array_cont_id)))
                    ->queryAll();
					
					*/
	

          $audiocontent = Yii::app()->db2->createCommand()
                    ->selectdistinct('c.CONTENT_TITLE as title, f.FILE_PATH as mp3,cf.FILE_SUB_TYPE_ID,f.FILE_ID,cf.CONTENT_ID')
                    ->from('TBL_CONTENT_DETAILS c')
                    ->join('TBL_CONTENT_FILES cf', 'cf.CONTENT_ID = c.CONTENT_ID')
                    ->join('TBL_FILES f', 'f.FILE_ID = cf.FILE_ID')
					->join('TBL_PACKAGE_CONTENT_MAP z','z.CONTENT_ID=cf.CONTENT_ID')
                    ->where(array('and', 'cf.CONTENT_FILE_TYPE_ID=2', array('in', 'cf.CONTENT_ID', $array_cont_id)))
					->order('z.ORDERS desc')
                    ->queryAll();
	

	
					// echo "<pre>";
					// print_r($audiocontent);exit;


            $audio = array();

            if (count($audiocontent) > 0) {


              $audio = '';
              $audio = array();

              $audiocontents = '';
              $audiocontents = array();



              foreach ($audiocontent as $key => $value) {


                $audio[] = array(
                    '@attributes' => array(
                        'id' => $value['FILE_SUB_TYPE_ID']
                    ),
                    'fileId' => $value['FILE_ID'],
                    'songName' => $value['title'],
                    'songPath' => $value['mp3'],
                    'contentId' => $value['CONTENT_ID'],
                );
              }

              $audiocontents['songs']['song'] = $audio;
			  
            } else {
              $audiocontents['songs']['song'] = '';
            }

			
			
            $videocontent = Yii::app()->db2->createCommand()
                    ->selectdistinct('c.CONTENT_TITLE as videoName,c.CONTENT_ID')
                    ->from('TBL_CONTENT_DETAILS c')
                    ->join('TBL_CONTENT_FILES cf', 'cf.CONTENT_ID = c.CONTENT_ID')
                    ->join('TBL_FILES f', 'f.FILE_ID = cf.FILE_ID')
                    ->where(array('and', 'CONTENT_FILE_TYPE_ID=3', array('in', 'cf.CONTENT_ID', $array_cont_id)))
                    ->queryAll();


            $video = array();

            if (count($videocontent) > 0) {


              $video = '';
              $video = array();

              $videocontents = '';
              $videocontents = array();


              foreach ($videocontent as $key => $value) {


                $video[] = array(
                    '@attributes' => array(
                        'id' => $value['CONTENT_ID']
                    ),
                   // 'fileId' => $value['FILE_ID'],
                    'videoName' => array('@cdata' => $value['videoName']),
                );
              }

              $videocontents['videos']['video'] = $video;
            } else {
              $videocontents['videos']['video'] = '';
            }




            $image_thumbnail = Yii::app()->db2->createCommand()         ///image of dimension 100*100
                    ->select('f.FILE_PATH as thumbnail,cf.CONTENT_ID,cf.FILE_SUB_TYPE_ID')
                    ->from('TBL_CONTENTS c')
                    ->join('TBL_CONTENT_FILES cf', 'cf.CONTENT_ID = c.CONTENT_ID')
                    ->join('TBL_FILES f', 'f.FILE_ID = cf.FILE_ID')
                    ->where(array('and', 'c.CONTENT_TYPE_ID=40 AND cf.CONTENT_FILE_TYPE_ID=1 and cf.FILE_SUB_TYPE_ID=38', array('in', 'cf.CONTENT_ID', $array_cont_id)))
                    ->queryAll();
										
						if(count($image_thumbnail)==0)
						{
						$image_thumbnail = Yii::app()->db2->createCommand()         ///image of dimension 100*100
                    ->select('f.FILE_PATH as thumbnail,cf.CONTENT_ID,cf.FILE_SUB_TYPE_ID')
                    ->from('TBL_CONTENTS c')
                    ->join('TBL_CONTENT_FILES cf', 'cf.CONTENT_ID = c.CONTENT_ID')
                    ->join('TBL_FILES f', 'f.FILE_ID = cf.FILE_ID')
                    ->where(array('and', 'c.CONTENT_TYPE_ID=40 AND cf.CONTENT_FILE_TYPE_ID=1 and cf.FILE_SUB_TYPE_ID=4', array('in', 'cf.CONTENT_ID', $array_cont_id)))
                    ->queryAll();
						
						}




            $image_thumbnail_big = Yii::app()->db2->createCommand()        
                    ->select('f.FILE_PATH as imagePath,cf.CONTENT_ID,cf.FILE_SUB_TYPE_ID')
                    ->from('TBL_CONTENTS c')
                    ->join('TBL_CONTENT_FILES cf', 'cf.CONTENT_ID = c.CONTENT_ID')
                    ->join('TBL_FILES f', 'f.FILE_ID = cf.FILE_ID')
                    ->where(array('and', 'c.CONTENT_TYPE_ID=40 AND cf.CONTENT_FILE_TYPE_ID=1 and cf.FILE_SUB_TYPE_ID=112', array('in', 'cf.CONTENT_ID', $array_cont_id)))
                    ->queryAll();
										
						
						if(count($image_thumbnail_big)==0)
						{
						$image_thumbnail_big = Yii::app()->db2->createCommand()        
                    ->select('f.FILE_PATH as imagePath,cf.CONTENT_ID,cf.FILE_SUB_TYPE_ID')
                    ->from('TBL_CONTENTS c')
                    ->join('TBL_CONTENT_FILES cf', 'cf.CONTENT_ID = c.CONTENT_ID')
                    ->join('TBL_FILES f', 'f.FILE_ID = cf.FILE_ID')
                    ->where(array('and', 'c.CONTENT_TYPE_ID=40 AND cf.CONTENT_FILE_TYPE_ID=1 and cf.FILE_SUB_TYPE_ID=71', array('in', 'cf.CONTENT_ID', $array_cont_id)))
                    ->queryAll();
						}





            if (count($image_thumbnail) > 0) {


              $image = '';
              $image = array();

              $images = '';
              $images = array();


              for ($i = 0; $i < count($image_thumbnail); $i++) {

				//if(isset($image_thumbnail[$i]['CONTENT_ID']) && $image_thumbnail[$i]['CONTENT_ID']!='' && isset( $image_thumbnail_big[$i]['CONTENT_ID']) &&  $image_thumbnail_big[$i]['CONTENT_ID']!=''){
				if(isset($image_thumbnail[$i]['CONTENT_ID']) && $image_thumbnail[$i]['CONTENT_ID']!=''){
				
				if(isset($image_thumbnail_big[$i]['CONTENT_ID']) && $image_thumbnail_big[$i]['CONTENT_ID']!='')
				{
				
                if ($image_thumbnail[$i]['CONTENT_ID'] == $image_thumbnail_big[$i]['CONTENT_ID']) {

                  $image[] = array(
                      '@attributes' => array(
                          'id' => $image_thumbnail[$i]['FILE_SUB_TYPE_ID']
                      ),
                      'thumbnail' => $image_thumbnail[$i]['thumbnail'],
                      'imagePath' => $image_thumbnail_big[$i]['imagePath'],
                  );
                } else {

                  $image[] = array(
                      '@attributes' => array(
                          'id' => $image_thumbnail[$i]['FILE_SUB_TYPE_ID']
                      ),
                      'thumbnail' => $image_thumbnail[$i]['thumbnail'],
                      'imagePath' => '',
                  );
                }
								} else {

								$image[] = array(
								  '@attributes' => array(
									  'id' => $image_thumbnail[$i]['FILE_SUB_TYPE_ID']
								  ),
								  'thumbnail' => $image_thumbnail[$i]['thumbnail'],
								  'imagePath' => '',
							  );
								
								
								
								}								}
              }
              $images['images']['image'] = $image;
            } else {
              $images['images']['image'] = '';
            }
			
			$artistimages80='';
			$artistimages80=array();
			
			$artistimage80= Yii::app()->db2->createCommand()
									->select('f.FILE_PATH as albumArtwork')
									->from('TBL_ARTIST_FILES af')
									->join('TBL_FILES f','f.FILE_ID = af.FILE_ID')
									->where('(af.FILE_SUB_TYPE_ID=3 or af.FILE_SUB_TYPE_ID=77) and af.ARTIST_ID=:arst_id',array(':arst_id'=>$artist_id[$k]['ARTIST_ID']))
									->queryAll();								
			
															if(count($artistimage80)>0)
																					{
																					$artistimages80['images80']['image80']=$artistimage80[0]['albumArtwork'];
																					}
																					else
																					{
																					$artistimages80['images80']['image80']='';
																					}







            $mobile_wallpaper = Yii::app()->db2->createCommand()         //image of dimension 80*80
                    ->select('f.FILE_PATH as thumbnail,cf.CONTENT_ID,cf.FILE_SUB_TYPE_ID,cf.FILE_ID')
                    ->from('TBL_CONTENTS  c')
                    ->join('TBL_CONTENT_FILES cf', 'cf.CONTENT_ID = c.CONTENT_ID')
                    ->join('TBL_FILES f', 'f.FILE_ID = cf.FILE_ID')
                    ->where(array('and', 'c.CONTENT_TYPE_ID=40 and cf.CONTENT_FILE_TYPE_ID=1 and cf.FILE_SUB_TYPE_ID=2', array('in', 'cf.CONTENT_ID', $array_cont_id)))
                    ->queryAll();
					
					if(count($mobile_wallpaper)==0)
					{
					$mobile_wallpaper = Yii::app()->db2->createCommand()         //image of dimension 80*80
                    ->select('f.FILE_PATH as thumbnail,cf.CONTENT_ID,cf.FILE_SUB_TYPE_ID,cf.FILE_ID')
                    ->from('TBL_CONTENTS  c')
                    ->join('TBL_CONTENT_FILES cf', 'cf.CONTENT_ID = c.CONTENT_ID')
                    ->join('TBL_FILES f', 'f.FILE_ID = cf.FILE_ID')
                    ->where(array('and', 'c.CONTENT_TYPE_ID=40 and cf.CONTENT_FILE_TYPE_ID=1 and cf.FILE_SUB_TYPE_ID=33', array('in', 'cf.CONTENT_ID', $array_cont_id)))
                    ->queryAll();
					}




            $mobile_wallpaper_big = Yii::app()->db2->createCommand()         //image of dimension 50*50
                    ->select('f.FILE_PATH as wallpaperPath,cf.CONTENT_ID,cf.CONTENT_FILE_TYPE_ID,cf.FILE_ID')
                    ->from('TBL_CONTENTS c')
                    ->join('TBL_CONTENT_FILES cf', 'cf.CONTENT_ID = c.CONTENT_ID')
                    ->join('TBL_FILES f', 'f.FILE_ID = cf.FILE_ID')
                    ->where(array('and', 'c.CONTENT_TYPE_ID=40 and cf.CONTENT_FILE_TYPE_ID=1 and FILE_SUB_TYPE_ID=214
															', array('in', 'cf.CONTENT_ID', $array_cont_id)))
                    ->queryAll();




            $wallpaper = array();



            if (count($mobile_wallpaper) > 0) {



              $wallpaper = '';
              $wallpaper = array();

              $wallpapers = '';
              $wallpapers = array();


			  

              for ($i = 0; $i < count($mobile_wallpaper); $i++) {
							
								//if(isset($mobile_wallpaper[$i]['CONTENT_ID']) && $mobile_wallpaper[$i]['CONTENT_ID']!='' && isset($mobile_wallpaper_big[$i]['CONTENT_ID']) &&  $mobile_wallpaper_big[$i]['CONTENT_ID']!=''){
								if(isset($mobile_wallpaper[$i]['CONTENT_ID']) && $mobile_wallpaper[$i]['CONTENT_ID']!=''){
								
								if(isset($mobile_wallpaper_big[$i]['CONTENT_ID']) && $mobile_wallpaper_big[$i]['CONTENT_ID']!='')
								{
								
							
                if ($mobile_wallpaper[$i]['CONTENT_ID'] == $mobile_wallpaper_big[$i]['CONTENT_ID']) {

                  $wallpaper[] = array(
                      '@attributes' => array(
                          'id' => $mobile_wallpaper[$i]['FILE_SUB_TYPE_ID']
                      ),
                      'thumbnail' => $mobile_wallpaper[$i]['thumbnail'],
					  'contentId'=>$mobile_wallpaper[$i]['CONTENT_ID'],
					  'fileId'=>$mobile_wallpaper[$i]['FILE_ID'],
                      'wallpaperPath' => $mobile_wallpaper_big[$i]['wallpaperPath'],
                  );
                } else {


                  $wallpaper[] = array(
                      '@attributes' => array(
                          'id' => $mobile_wallpaper[$i]['FILE_SUB_TYPE_ID']
                      ),
                      'thumbnail' => $mobile_wallpaper[$i]['thumbnail'],
					  'contentId'=>$mobile_wallpaper[$i]['CONTENT_ID'],
					  'fileId'=>$mobile_wallpaper[$i]['FILE_ID'],
                      'wallpaperPath' => '',
                  );
                }
               } 
			   else {
						
                  $wallpaper[] = array(
                      '@attributes' => array(
                          'id' => $mobile_wallpaper[$i]['FILE_SUB_TYPE_ID']
                      ),
                      'thumbnail' => $mobile_wallpaper[$i]['thumbnail'],
					  'contentId'=>$mobile_wallpaper[$i]['CONTENT_ID'],
					  'fileId'=>$mobile_wallpaper[$i]['FILE_ID'],
                      'wallpaperPath' => '',
                  );
						
					}
			   
			   
			   }
              }
							$wallpapers['wallpapers']['wallpaper'] = $wallpaper;
            } else {
              $wallpapers['wallpapers']['wallpaper'] = '';
            }

            $artistId = '';
            $artistId = array();

            $artistId['artistId'] = $artist_id[$k]['ARTIST_ID'];
			

            $sql1 = array_merge($sql5, $artistId, $genres, $languages, $profilesimages, $profilesimages100 , $artistimage50s,$artistimages80, $audiocontents, $videocontents, $images, $wallpapers);
		
/*
		if($artist_id[$k]['ARTIST_ID']==995)
		{
		
		
		echo "<pre>";
		print_r($sql1);exit;
		}
*/	

			// echo "<pre>";
			// echo strlen($sql1['artistDescription']['@cdata']);exit;
				//print_r($sql1['songs']['song'][0]);exit;
				 // print_r($sql1['profileimage200']['image200'][0]['file_path']);exit;
				//echo $sql1['images']['image'][0]['thumbnail'];exit;
			// echo $sql1['artistDescription'];exit;
			// print_r($sql1);exit;
			
			// echo $sql1['artistDescription']['@cdata']."<br>";
			// echo $sql1['songs']['song'][0]."<br>";
			// echo $sql1['profileimage200']['image200'][0]."<br>";
			// echo $sql1['images']['image'][0]."<br>";
			
			// exit;
			
            $file_name = 'artist-' . $artist_id[$k]['ARTIST_ID'] . '.xml';
				if((strlen($sql1['artistDescription']['@cdata'])>0) && isset($sql1['songs']['song'][0]) && (isset($sql1['profileimage200']['image200'][0])) && (isset($sql1['images']['image'][0])))
				{
            $xml = Array2XML::createXML('artist', $sql1);
            $xml->save(Yii::app()->basePath . '/../xml/content/artists/' . $file_name);
			
			    }
          }
        }
        break;





      case 7:
				
				$sql2 = '';
				
        $cont_id = Yii::app()->db2->createCommand()
                ->select('CONTENT_ID')
                ->from('TBL_CONTENTS')
                ->where(array('in', 'CONTENT_TYPE_ID', array(22, 53)))
                ->queryAll();

        //echo "<pre>";
       // print_r($cont_id);exit;

        for ($k = 0; $k < count($cont_id); $k++) {

          $artname = Yii::app()->db2->createCommand()
                  ->select('tcarmd.CONTENT_ARTIST_TITLE,tarm.ARTIST_ROLE_ID')
                  ->from('TBL_CNT_ART_ROLE_MAP_DTLS tcarmd')
                  ->join('TBL_ARTIST_ROLE_MAP tarm', 'tcarmd.ARTIST_ROLE_MAP_ID=tarm.ARTIST_ROLE_MAP_ID')
                  ->where('CONTENT_ID=:CONT_ID', array(':CONT_ID' => $cont_id[$k]['CONTENT_ID']))
                  ->queryAll();

          /*$videogen = Yii::app()->db2->createCommand()
                  ->select('GENRE_NAME as genre')
                  ->from('TBL_CONTENT_GENRE_MAP cgm')
                  ->join('TBL_GENRES g', 'cgm.GENRE_ID = g.GENRE_ID')
                  ->where('CONTENT_ID=:CONT_ID', array(':CONT_ID' => $cont_id[$k]['CONTENT_ID']))
                  ->queryAll();*/
					
					$videogen = Yii::app()->db2->createCommand()
            ->selectDistinct('g.GENRE_NAME as genre')
            ->from('TBL_CONTENTS c')
						->join('TBL_CONTENT_GENRE_MAP cgm','c.CONTENT_ID=cgm.CONTENT_ID')
						->join('TBL_GENRES g','cgm.GENRE_ID=g.GENRE_ID')
						->where('(c.CONTENT_TYPE_ID =2 or c.CONTENT_TYPE_ID =53 or c.CONTENT_TYPE_ID =22) and c.CONTENT_ID=:CONT_ID', array(':CONT_ID' => $cont_id[$k]['CONTENT_ID']))
            ->order('g.GENRE_NAME asc')
            ->queryAll();
									
									//echo "<pre>";
									//print_r($videogen);exit;

          if (count($videogen) > 0) {
            $videogens['genre'] = $videogen[0]['genre'];
          } else {
            $videogens['genre'] = '';
          }

          $videolang = Yii::app()->db2->createCommand()
                  ->select('LANGUAGE_TITLE as language')
                  ->from('TBL_CONTENT_LANGUAGE_MAP lg')
                  ->join('TBL_LANGUAGES l', 'lg.LANGUAGE_ID = l.LANGUAGE_ID')
                  ->where('CONTENT_ID=:CONT_ID', array(':CONT_ID' => $cont_id[$k]['CONTENT_ID']))
                  ->queryAll();

          if (count($videolang) > 0) {
            $videolangs['languages'] = $videolang[0]['language'];
          } else {
            $videolangs['languages'] = '';
          }

          $video_name = Yii::app()->db2->createCommand()
                  ->select('CONTENT_TITLE as videoName')
                  ->from('TBL_CONTENT_DETAILS ')
                  ->where('CONTENT_ID=:CONT_ID', array(':CONT_ID' => $cont_id[$k]['CONTENT_ID']))
                  ->queryAll();

          $video_names['videoName'] = array('@cdata' => $video_name[0]['videoName']);


          $previewimage = Yii::app()->db2->createCommand()
                  ->select('f.FILE_PATH as videoPreview,cf.FILE_SUB_TYPE_ID,f.FILE_ID')
                  ->from('TBL_CONTENT_FILES cf')
                  ->join('TBL_FILES f', 'f.FILE_ID=cf.FILE_ID')
                  ->where('cf.CONTENT_ID=:CONT_ID and cf.CONTENT_FILE_TYPE_ID=1', array(':CONT_ID' => $cont_id[$k]['CONTENT_ID']))
                  ->queryAll();

            $videoPreview = '';
            $videoPreview = array();

          if (count($previewimage) > 0) {

            for ($i = 0; $i < count($previewimage); $i++) {

              $videoPreview[] = array(
                  '@attributes' => array(
                      'type' => $previewimage[$i]['FILE_SUB_TYPE_ID']
                  ),
                  'fileId' => $previewimage[$i]['FILE_ID'],
                  'videoPreview' => $previewimage[$i]['videoPreview'],
              );
            }
            $videoPreviews['previews']['preview'] = $videoPreview;
          } else {
            $videoPreviews['previews']['preview'] = '';
          }

            $artist_name = '';

            $artist_name = array();

          if (count($artname) > 0) {

            for ($i = 0; $i < count($artname); $i++) {

              $artist_name[] = array(
                  '@attributes' => array(
                      'id' => $artname[$i]['ARTIST_ROLE_ID']
                  ),
                  'name' => $artname[$i]['CONTENT_ARTIST_TITLE'],
              );
            }
            $artist_names['names']['artistName'] = $artist_name;
          } else {
            $artist_names['names']['artistName'] = '';
          }

          $result = Yii::app()->db2->createCommand()
                  ->select('f.FILE_PATH as videoPath,cf.FILE_SUB_TYPE_ID,f.FILE_ID')
                  ->from('TBL_CONTENTS c')
                  ->join('TBL_CONTENT_FILES cf', 'cf.CONTENT_ID=c.CONTENT_ID')
                  ->join('TBL_FILES f', 'cf.FILE_ID=f.FILE_ID')
                  ->where("cf.CONTENT_ID=:content_id and (cf.CONTENT_FILE_TYPE_ID=3 or cf.CONTENT_FILE_TYPE_ID=5) and f.FILE_PATH != ''", array(':content_id' => $cont_id[$k]['CONTENT_ID']), array('in', 'c.CONTENT_TYPE_ID', array(22, 53)))
				  ->order('cf.CONTENT_FILE_TYPE_ID ASC')
                  ->queryAll();
				  
				  
				  


				  
					 $videopath = '';
           $videopath = array();
				
          if (count($result) > 0) {
           
            for ($i = 0; $i < count($result); $i++) {

              $videopath[] = array(
                  '@attributes' => array(
                      'type' => $result[$i]['FILE_SUB_TYPE_ID']
                  ),
                  'fileId' => $result[$i]['FILE_ID'],
                  'videopath' =>array('@cdata'=>$result[$i]['videoPath']),
				  
				   
				 
              );
            }
            $video_paths['paths']['path'] = $videopath;
          } else {
            $video_paths['paths']['path'] = '';
          }


          $sql1 = Yii::app()->db2->createCommand()
                  ->select('PACKAGE_CONTENT_ID')
                  ->from('TBL_PACKAGE_CONTENT_MAP ')
                  ->where('CONTENT_ID=:content_id', array(':content_id' => $cont_id[$k]['CONTENT_ID'],))
                  ->queryAll();
									
					$videodetails = '';
					$videodetails = array();

					if(isset($sql1[0]['PACKAGE_CONTENT_ID']) && $sql1[0]['PACKAGE_CONTENT_ID'] !='') 
					{				
          $sql2 = Yii::app()->db2->createCommand()
                  ->select('CONTENT_TITLE as videoAlbum,CONTENT_DESCRIPTION as videoDescription')
                  ->from('TBL_CONTENT_DETAILS')
                  ->where('CONTENT_ID=:content_id', array(':content_id' => $sql1[0]['PACKAGE_CONTENT_ID']))
                  ->queryAll();

					}

					$sql2='';
					$sql2=array();
					
						if (count($sql2) > 0) {
							$videodetails['videodetail'] = array('videoAlbum' => $sql2[0]['videoAlbum'],
									'videoDescription' => array('@cdata' => $sql2[0]['videoDescription']),
							);
						} else {
							$videodetails['videoDetail'] = array('videoAlbum' => '',
									'videoDescription' => '',
							);
						}
					
          $videoContentId['videoId'] = $cont_id[$k]['CONTENT_ID'];

					
          $videoMaster = array_merge($videoContentId, $artist_names, $videogens, $videolangs, $video_paths, $video_names, $videoPreviews, $videodetails);

          $file_name = 'video-' . $cont_id[$k]['CONTENT_ID'] . '.xml';

          $xml = Array2XML::createXML('videos', $videoMaster);
          $xml->save(Yii::app()->basePath . '/../xml/content/videos/' . $file_name);
        }
        break;

      case 8:

         $cont_id = Yii::app()->db2->createCommand()
                ->select('CONTENT_ID')
                ->from('TBL_CONTENTS ')
                ->where('CONTENT_TYPE_ID=:cont_id', array(':cont_id' => 21))
                ->queryAll();
				
				
				//print_r($cont_id);exit;

        for ($k = 0; $k < count($cont_id); $k++) {
		
          $artname =  Yii::app()->db2->createCommand()
                  ->selectdistinct('tcarmd.CONTENT_ARTIST_TITLE,tarm.ARTIST_ROLE_ID,tarm.ARTIST_ID')
                  ->from('TBL_CNT_ART_ROLE_MAP_DTLS tcarmd')
				  ->join('TBL_CNT_ART_ROLE_MAP tcarm','tcarmd.ARTIST_ROLE_MAP_ID=tcarm.ARTIST_ROLE_MAP_ID')
				  ->join('TBL_ARTIST_ROLE_MAP tarm','tarm.ARTIST_ROLE_MAP_ID=tcarm.ARTIST_ROLE_MAP_ID')
                  ->where('tarm.ARTIST_ROLE_ID=31 and tcarmd.CONTENT_ID=:CONT_ID', array(':CONT_ID' =>$cont_id[$k]['CONTENT_ID']))
                  ->queryAll();
				  
				 // print_r($artname);exit;
				 // print_r($artname);exit;

          $song_genre = Yii::app()->db2->createCommand()
                  ->select('GENRE_NAME as genre')
                  ->from('TBL_CONTENT_GENRE_MAP cgm')
                  ->join('TBL_GENRES g', 'cgm.GENRE_ID = g.GENRE_ID')
                  ->where('CONTENT_ID=:CONT_ID', array(':CONT_ID' => $cont_id[$k]['CONTENT_ID']))
                  ->queryAll();

          //echo "<pre>";
          //print_r($song_genre);exit;		

          if (count($song_genre) > 0) {
            $song_genres['genre'] = $song_genre[0]['genre'];
          } else {
            $song_genres['genre'] = '';
          }

          $songlang = Yii::app()->db2->createCommand()
                  ->select('LANGUAGE_TITLE as language')
                  ->from('TBL_CONTENT_LANGUAGE_MAP lg')
                  ->join('TBL_LANGUAGES l', 'lg.LANGUAGE_ID = l.LANGUAGE_ID')
                  ->where('CONTENT_ID=:CONT_ID', array(':CONT_ID' => $cont_id[$k]['CONTENT_ID']))
                  ->queryAll();

          if (count($songlang) > 0) {
            $songlangs['languages'] = $songlang[0]['language'];
          } else {
            $songlangs['languages'] = '';
          }
		  
		  /*
		  
		  
		   $artist_name = Yii::app()->db2->createCommand()
                  ->selectdistinct('tcarmd.CONTENT_ARTIST_TITLE')
                  ->from('TBL_CNT_ART_ROLE_MAP_DTLS tcarmd')
				  ->join('TBL_CNT_ART_ROLE_MAP tcarm','tcarmd.ARTIST_ROLE_MAP_ID=tcarm.ARTIST_ROLE_MAP_ID')
				  ->join('TBL_ARTIST_ROLE_MAP tarm','tarm.ARTIST_ROLE_MAP_ID=tcarm.ARTIST_ROLE_MAP_ID')
                  ->where('tarm.ARTIST_ROLE_ID=31 and tcarmd.CONTENT_ID=:CONT_ID', array(':CONT_ID' =>$cont_id[$k]['CONTENT_ID']))
                  ->queryAll();
				  
				
			*/	  
				  
				  
				  
				  $artistimage=Yii::app()->db2->createCommand()
				  ->select('tf.FILE_PATH')
				  ->from('TBL_FILES tf')
				  ->join('TBL_CONTENT_FILES tcf','tf.FILE_ID=tcf.FILE_ID')
				  ->where('tcf.CONTENT_FILE_TYPE_ID=1 AND tcf.FILE_SUB_TYPE_ID=3 and tcf.CONTENT_ID=:cont_id',array(':cont_id'=>$cont_id[$k]['CONTENT_ID']))
				  ->queryAll();
				  
				  
				  
				  
				      $artistimage80 = '';

					  $artistimage80 = array();
					  
					  $artistimages80='';
					  $artistimages80=array();

				  
				     if (count($artistimage) > 0) {
        
						for ($i = 0; $i < count($artistimage); $i++) {

						  $artistimage80[] = array(
							  
							  'FilePath' => $artistimage[$i]['FILE_PATH'],
						  );
						}
						$artistimages80['artistimages']['image'] = $artistimage80;
					  } else {
						$artistimages80['artistimages']['image']= '';
					  }
					  
					  
					  
					  
					   $artistimg50=Yii::app()->db2->createCommand()
							  ->select('tf.FILE_PATH')
							  ->from('TBL_FILES tf')
							  ->join('TBL_CONTENT_FILES tcf','tf.FILE_ID=tcf.FILE_ID')
							  ->where('tcf.CONTENT_FILE_TYPE_ID=1 AND tcf.FILE_SUB_TYPE_ID=2 and tcf.CONTENT_ID=:cont_id',array(':cont_id'=>$cont_id[$k]['CONTENT_ID']))
							  ->queryAll();
							  
							  
							  
								  $artistimage50 = '';

								  $artistimage50 = array();
								  
								  $artistimages50='';
								  $artistimages50=array();

							  
								 if (count($artistimg50) > 0) {
					
									for ($i = 0; $i < count($artistimg50); $i++) {

									  $artistimage50[] = array(
										  
										  'FilePath' => $artistimg50[$i]['FILE_PATH'],
									  );
									}
									$artistimages50['artistimages50']['image'] = $artistimage50;
								  } else {
									$artistimages50['artistimages50']['image']= '';
								  }
										  


          $song_name = Yii::app()->db2->createCommand()
                  ->select('CONTENT_TITLE as songName')
                  ->from('TBL_CONTENT_DETAILS ')
                  ->where('CONTENT_ID=:CONT_ID', array(':CONT_ID' => $cont_id[$k]['CONTENT_ID']))
                  ->queryAll();

          $song_names['songName'] = $song_name[0]['songName'];

          if (count($artname) > 0) {
            $artist_name = '';

            $artist_name = array();

            for ($i = 0; $i < count($artname); $i++) {

              $artist_name[] = array(
                  '@attributes' => array(
                      'id' => $artname[$i]['ARTIST_ROLE_ID']
                  ),
                  'name' => $artname[$i]['CONTENT_ARTIST_TITLE'],
				  'artistid'=>$artname[$i]['ARTIST_ID']
              );
            }
            $artist_names['names']['artistName'] = $artist_name;
          } else {
            $artist_names['names']['artistName'] = '';
          }

          $result = Yii::app()->db2->createCommand()
                  ->select('f.FILE_PATH as songPath,cf.FILE_SUB_TYPE_ID,f.FILE_ID')
                  ->from('TBL_CONTENTS c')
                  ->join('TBL_CONTENT_FILES cf', 'cf.CONTENT_ID=c.CONTENT_ID')
                  ->join('TBL_FILES f', 'cf.FILE_ID=f.FILE_ID')
                  ->where('cf.CONTENT_ID=:content_id and cf.CONTENT_FILE_TYPE_ID=:content_file_id', array(':content_id' => $cont_id[$k]['CONTENT_ID'], ':content_file_id' => 2), array('in', 'c.CONTENT_TYPE_ID', array(21)))
                  ->queryAll();

          //echo "<pre>";
          //print_r($result);exit;

          if (count($result) > 0) {
            $songpath = '';

            $songpath = array();

            for ($i = 0; $i < count($result); $i++) {

              $songpath[] = array(
                  '@attributes' => array(
                      'type' => $result[$i]['FILE_SUB_TYPE_ID']
                  ),
                  'fileId' => $result[$i]['FILE_ID'],
                  'songpath' => $result[$i]['songPath'],
              );
            }
            $songpaths['paths']['path'] = $songpath;
          } else {
            $songpaths['paths']['path'] = '';
          }

					
          $sql1 = Yii::app()->db2->createCommand()
                  ->select('PACKAGE_CONTENT_ID')
                  ->from('TBL_PACKAGE_CONTENT_MAP ')
                  ->where('CONTENT_ID=:content_id', array(':content_id' => $cont_id[$k]['CONTENT_ID'],))
                  ->queryAll();

					$songdetails = '';
          $songdetails = array();
					
					if(isset($sql1[0]['PACKAGE_CONTENT_ID']) && $sql1[0]['PACKAGE_CONTENT_ID'] !='') 
					{		
          $sql2 = Yii::app()->db2->createCommand()
                  ->select('CONTENT_TITLE as songAlbum,CONTENT_DESCRIPTION as songDescription')
                  ->from('TBL_CONTENT_DETAILS')
                  ->where('CONTENT_ID=:content_id', array(':content_id' => $sql1[0]['PACKAGE_CONTENT_ID']))
                  ->queryAll();


          if (count($sql2) > 0) {
            $songdetails['songdetail'] = array('songAlbum' => $sql2[0]['songAlbum'],
                'songDescription' => $sql2[0]['songDescription'],
            );
          } else {
            $songdetails['songdetail'] = array('songAlbum' => '',
                'songDescription' => '',
            );
          }
					}
					
          $songId['songId'] = $cont_id[$k]['CONTENT_ID'];


          $songMaster = array_merge($songId, $artist_names,$artistimages80,$artistimages50, $song_genres, $songlangs, $songpaths, $song_names, $songdetails);

		  
		  
          $file_name = 'song-' . $cont_id[$k]['CONTENT_ID'] . '.xml';

          $xml = Array2XML::createXML('song', $songMaster);
          $xml->save(Yii::app()->basePath . '/../xml/content/songs/' . $file_name);
        }
        break;

      case 9:

        $sql = Yii::app()->db->createCommand()
                ->select('*')
                ->from('tbl_focus_block')
								->order('POSITION')
                ->queryAll();

				$videoPath='';
				$ipadUrl='';
				$ipath='';
				


        for ($i = 0; $i < count($sql); $i++) {
          if ($sql[$i]['ARTIST_ID'] != 0) {
            if (file_exists(Yii::app()->basePath . '/../xml/content/artists/artist-' . $sql[$i]['ARTIST_ID'] . ".xml")) {

              $artistxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/artist-' . $sql[$i]['ARTIST_ID'] . ".xml");

              if (file_exists(Yii::app()->basePath . '/../xml/content/videos/video-' . $sql[$i]['VIDEO_ID'] . '.xml')) {
                $videofile = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/video-' . $sql[$i]['VIDEO_ID'] . '.xml');
				
				
				
				
				 for ($l = 0; $l < count($videofile->paths->path); $l++) {

				  if ((integer)$videofile->paths->path[$l]->attributes() == '191') {
					$videoPath = $videofile->paths->path[$l]->videopath;
					break;
				  }
				}
				
				
				
						for($p=0;$p< count($videofile->paths->path);$p++)
					  {
					   if ((integer)$videofile->paths->path[$p]->attributes() == '32') {
					   
					   $ipath=str_replace('http://','',$videofile->paths->path[$p]->videopath);
				
						$ipadUrl=str_replace('CONTENT_URL',$ipath,Yii::app()->params['WOWZA_URL']);
						
							break;
						  }
					  }
				
				//print_r($videofile);exit;
              //  $videopath = array('@cdata' =>$videofile->paths->path[0]->videopath);
              } else {
                $videoPath = '';
				$ipadUrl = '';
              }
			  
			  
			  
			  
			  
			  
			  
			 // echo "<pre>";
				//echo $videoPath;exit;
			  
			 
			  $description='';
					
									if(strlen( $sql[$i]['DESCRIPTION'])!='')
										{
										$description= $sql[$i]['DESCRIPTION'];
										}
										else
										{
										$description='';
										}
										

              $tempid = $artistxml->artistId;

              $slide[] = array(
                  'artistId' => $tempid,
                  'artistName' => $sql[$i]['ARTIST_NAME'],
                  'description' => array('@cdata' => $description),
                  'genre' => $artistxml->genres->genre[0]->genreName,
                  'language' => $artistxml->languages->language[0]->languageName,
                  'bigImage' => $sql[$i]['VIDEO_BIG_IMAGE'],
                  'thumbnail' => $sql[$i]['VIDEO_THUMBNAIL'],
                  'videoPath' => array('@cdata'=>$videoPath),
				  'ipadUrl'=>array('@cdata'=>$ipadUrl),
              );
            }
          } else {
		  
		  $videopath='';
		  $ipadpath='';
		  $eventpath='';
		  $description='';
		  $bigimage='';
		  $thumbnail='';
		  
		  
			if(strlen($sql[$i]['VIDEO_URL'])!='')
			{
			$videopath=$sql[$i]['VIDEO_URL'];
			}
			else
			{
			$videopath='';
			}
			
				if(strlen($sql[$i]['VIDEO_URL2'])!='')
					{
					$ipadpath=$sql[$i]['VIDEO_URL2'];
					}
					else
					{
					$ipadpath='';
					}
					
							if(strlen($sql[$i]['EVENT_URL'])!='')
								{
								$eventpath=$sql[$i]['EVENT_URL'];
								}
								else
								{
								$eventpath='';
								}
								
									if(strlen( $sql[$i]['DESCRIPTION'])!='')
										{
										$description= $sql[$i]['DESCRIPTION'];
										}
										else
										{
										$description='';
										}
										
										if(strlen($sql[$i]['EVENT_BIG_IMAGE'])>0)
										{
										$bigimage= Yii::app()->baseUrl . "/files/focusblock/bigimage/" . $sql[$i]['EVENT_BIG_IMAGE'];
										}
										else
										{
										$bigimage='';
										}
										
										if(strlen($sql[$i]['EVENT_THUMBNAIL'])>0)
										{
										$thumbnail=Yii::app()->baseUrl . "/files/focusblock/thumbnail/" . $sql[$i]['EVENT_THUMBNAIL'];
										}
										else
										{
										$thumbnail='';
										}


            $slide[] = array(
                'artistId' => $sql[$i]['ARTIST_ID'],
                'artistName' => $sql[$i]['ARTIST_NAME'],
                'description' => array('@cdata' => $description),
                'genre' => '',
                'language' => '',
                'bigImage' => $bigimage,
                'thumbnail' => $thumbnail,
                'videoPath' => array('@cdata' =>$videopath),
				'ipadUrl'=>array('@cdata' =>$ipadpath),
				'eventPath' => array('@cdata'=>$eventpath),
				
            );
          }
        }

        $focus['slide'] = $slide;

        $xml = Array2XML::createXML('focus', $focus);

        $xml->save(Yii::app()->basePath . '/../xml/frontend/focus.xml');



        break;
		
		case 10:
		$topsongs = Yii::app()->db->createCommand()
													->select('*')
													->from('topsongs')
													->order('priority asc')
													->queryAll();
													
												//echo "<pre>";
												//print_r($topsongs);exit;
												
		if(!is_dir(Yii::app()->basePath . '/../xml/frontend/topsong'))
			{
			 mkdir(Yii::app()->basePath . '/../xml/frontend/topsong', 0777);
			}					
					$newline="\n";
					$path='';
					$url='http://europa.hungamatech.com/SecureStreaming/stream-request';
							
							
						
						
						for($i=0;$i<count($topsongs);$i++)
						{
						$detail='';
						
						$ourFileName =Yii::app()->basePath . '/../xml/frontend/topsong/top10-'.'rtmp'.$topsongs[$i]['content_id'].".xml";
						$ourFileHandle = fopen($ourFileName, 'w');
						
						$songdets= Yii::app()->db2->createCommand()
											->select('c.CONTENT_TITLE as title, f.FILE_PATH as mp3,f.FILE_ID,CONTENT_FILE_TYPE_ID,FILE_SUB_TYPE_ID')
											->from('TBL_CONTENT_DETAILS c')
											->join('TBL_CONTENT_FILES cf' ,'cf.CONTENT_ID = c.CONTENT_ID')
											->join('TBL_FILES f','f.FILE_ID = cf.FILE_ID')
											->where('CONTENT_FILE_TYPE_ID=2 and FILE_SUB_TYPE_ID=181 and cf.CONTENT_ID=:cont_id'  ,array(':cont_id'=>$topsongs[$i]['content_id']))
											->queryAll();
						
						// echo "<pre>";
						// print_r($songdets);exit;
						
						
						
						$detail='<?xml version="1.0" encoding="UTF-8"?>'.$newline;
						$detail.='      <md:ticketRequest xmlns:md="http://www.hungamatech.com/XML/schema/MolaDelivery" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.hungamatech.com/XML/schema/MolaDelivery http://www.hungamatech.com/XML/schema/MolaDelivery.xsd">'.$newline;
						$detail.='             <md:contentFile>'.$newline;
						$detail.='                   <md:contentID>'.$topsongs[$i]['content_id'].'</md:contentID>'.$newline;
						$detail.='                   <md:contentFileTypeID>'.$songdets[0]['CONTENT_FILE_TYPE_ID'].'</md:contentFileTypeID>'.$newline;
						$detail.='                   <md:fileSubtypeID>'.$songdets[0]['FILE_SUB_TYPE_ID'].'</md:fileSubtypeID>'.$newline;
						$detail.='              </md:contentFile>'.$newline;
						$detail.='              <md:constraints>'.$newline;
						$detail.='                   <md:IPs>'.$newline;
						$detail.='                       <md:IP>114.79.155.86</md:IP>'.$newline;
						$detail.='                    </md:IPs>'.$newline;
						$detail.='                   <md:duration>PT0H10M0S</md:duration>'.$newline;
						$detail.='              </md:constraints>'.$newline;
						$detail.='              <md:protocol>rtmp</md:protocol>'.$newline;
						$detail.='      </md:ticketRequest>'.$newline;
						
						/*
						$detail.='<CONTENT_ID>'.$topsongs[$i]['content_id'].'</CONTENT_ID>'.$newline;
						$detail.='<CONTENT_TITLE>'.$songdets[0]['title'].'</CONTENT_TITLE>'.$newline;
						$detail.='<FILE_PATH>'.$songdets[0]['mp3'].'</FILE_PATH>'.$newline;
						$detail.='<FILE_ID>'.$songdets[0]['FILE_ID'].'</FILE_ID>'.$newline;
						$detail.='<CONTENT_FILE_TYPE_ID>'.$songdets[0]['CONTENT_FILE_TYPE_ID'].'</CONTENT_FILE_TYPE_ID>'.$newline;
					    $detail.='<FILE_SUB_TYPE_ID>'.$songdets[0]['FILE_SUB_TYPE_ID'].'</FILE_SUB_TYPE_ID>'.$newline; 
						$detail.='</root>'.$newline;
						*/
						
						//echo $detail."<br><br>";
						
						//echo $detail."<br><br>";
						
						//$http = $this->sendXmlOverPost($url,$detail,60);
						
						//$http=substr($http,0,strpos($http,'?'));
						// if($i==0)
						// {
						// echo $http;exit;
						// //$detail.=$http;
						// }
						//$path.=$http.' '.$newline.' '.$newline;
						
						fwrite($ourFileHandle,$detail);
						fclose($ourFileHandle);
				
						}	

						
		// echo "hi";exit;
		
		break;
		
		
    }
  }
  
	public function sendXmlOverPost($url, $xml, $timeout=5) {
				 $ch = curl_init();

				 curl_setopt($ch, CURLOPT_URL, $url);

				 // For xml, change the content-type. 
				 
				  $streaminglogin	= 'YXJ0aXN0YWxvdWQ6QXJ0QWxkMjU=';
				  
				  curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml","Authorization: Basic ".$streaminglogin));

				 curl_setopt($ch, CURLOPT_POST, 1);
				 
				 curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

				 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // ask for results to be returned
				 
				 curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
				 
				 //if(CurlHelper::checkHttpsURL($url)) { 
				 //  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				 //  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				 //}

				 // Send to remote and return data to caller.
				 $result = curl_exec($ch);
				 
				 if($result === false){
				error_log("Curl cannot connect with remote host ".curl_error($ch)." URL :".$url);
				die("Request Timeout");
				 }
				 
				 $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 

				 curl_close($ch);

				 return $result;
				}
				
				
			public function deleteDirectory($dir) {
					if (!file_exists($dir)) return true;
					if (!is_dir($dir)) return unlink($dir);
					foreach (scandir($dir) as $item) {
						if ($item == '.' || $item == '..') continue;
						if (!$this->deleteDirectory($dir.DIRECTORY_SEPARATOR.$item)) return false;
					}
					return rmdir($dir);
				}

}

?>