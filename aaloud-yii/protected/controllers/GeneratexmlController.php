<?php

class GeneratexmlController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionGenerateartistxml()
	{
	$this->layout=false;
	 
	
				  $artist_id = Yii::app()->db2->createCommand()
								->selectdistinct('arm.ARTIST_ID')
								->from('TBL_ARTIST_ROLE_MAP arm')
								->join('TBL_CNT_ART_ROLE_MAP carm', 'arm.ARTIST_ROLE_MAP_ID=carm.ARTIST_ROLE_MAP_ID')
								->join('TBL_CONTENT_RELEASE_DATES crd', 'crd.CONTENT_ID=carm.CONTENT_ID')
								->where('arm.ARTIST_ROLE_ID=:artist_role_id', array('artist_role_id' => 31))
								->order('crd.RELEASE_DATE desc')
								->queryAll();
				
				
				//echo count($artist_id);exit;
				
				
				/*
				->selectdistinct('ARTIST_ID')
                ->from('TBL_ARTISTS')
                ->order('ARTIST_ID')
                ->queryAll();
        */
		 
		 $e=0;
		
        if (count($artist_id) > 0) {
          for ($k = 0; $k < count($artist_id); $k++) {
            $sql = Yii::app()->db2->createCommand()
                    ->select('ARTIST_TITLE as artistName,ARTIST_DETAIL as artistDescription,ARTIST_DESCRIPTION')
                    ->from('TBL_ARTIST_DETAILS')
                    ->where('ARTIST_ID=:arst_id ', array('arst_id' => $artist_id[$k]['ARTIST_ID']))
                    ->queryAll();
					
					if(count($sql)>0)
					{
					$sql5['artistName']=$sql[0]['artistName'];
							if(strlen($sql[0]['artistDescription'])>0)
								{
								$sql5['artistDescription']= array('@cdata' => $sql[0]['artistDescription']);
								}
								else
								{
								$sql5['artistDescription']=  array('@cdata' => '');
								}
								
									if(strlen($sql[0]['ARTIST_DESCRIPTION'])>0)
									{
									$sql5['artistshortdescription']=array('@cdata'=>$sql[0]['ARTIST_DESCRIPTION']);
									}
									else
									{
									$sql5['artistshortdescription']=  array('@cdata' => '');
									}
				
					}
					else
					{
					$sql5['artistName']='';
					$sql5['artistDescription']='';
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
			
			
            $file_name = 'artist-' . $artist_id[$k]['ARTIST_ID'] . '.xml';
			if((strlen($sql1['artistDescription']['@cdata'])>0) && isset($sql1['songs']['song'][0]) && (isset($sql1['profileimage200']['image200'][0])) && (isset($sql1['images']['image'][0])))
				{
            $xml = Array2XML::createXML('artist', $sql1);
            $xml->save(Yii::app()->basePath . '/../xml/content/artists/' . $file_name);
			$e++;
				}
		  }
        }
		
		
		
		if(!is_dir("generatexmllog"))
			{
			 mkdir("generatexmllog", 0777);
			}
			$ourFileName = Yii::app()->basePath . '/../generatexmllog/'."artistlog.txt";
			//chmod($ourFileName , 0777);
			$ourFileHandle = fopen($ourFileName, 'a');
			fwrite($ourFileHandle,'');
			fclose($ourFileHandle);
		
				$output='';
				$output .="\n";
				$output .= "generate on-".date("d/m/y : H:i:s", time());
				$output .= "\n";
				
				$output .= "  total ".$e." artist xml file generated.";
				$output .= "\n";
				$filename = Yii::app()->basePath . '/../generatexmllog/'."artistlog.txt";
				
				
				if (is_writable($filename)) {
				if (!$handle = fopen($filename, 'a')) {
				
				}
				if (fwrite($handle, $output) === FALSE) {
				
				}
				
				fclose($handle);
				}
		
		echo "xml for artist generated successfully";
	
	
	
	
	
	}
	
	public function actionGeneratevideoxml()
	{
	$this->layout=false;
	
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
		
		
			if(!is_dir("generatexmllog"))
			{
			 mkdir("generatexmllog", 0777);
			}
			$ourFileName = Yii::app()->basePath . '/../generatexmllog/'."videolog.txt";
			//chmod($ourFileName , 0777);
			$ourFileHandle = fopen($ourFileName, 'a');
			fwrite($ourFileHandle,'');
			fclose($ourFileHandle);
		
				$output='';
				$output .="\n";
				$output .= "generate on-".date("d/m/y : H:i:s", time()) ."\n";
				
				
				$output .= "  total ".$k." video xml file generated.\n";
				$output .="\n";
				
				$filename = Yii::app()->basePath . '/../generatexmllog/'."videolog.txt";
				
				
				if (is_writable($filename)) {
				if (!$handle = fopen($filename, 'a')) {
				
				}
				if (fwrite($handle, $output) === FALSE) {
				
				}
				
				fclose($handle);
				}
		
		
		
		
		echo "xml for video are generated successfully";
	
	}
	
	public function actionGeneratesongxml()
	{
	
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

          $song_names['songName'] = array('@cdata' =>$song_name[0]['songName']);

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
                'songDescription' => array('@cdata' => $sql2[0]['songDescription']),
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
		
		
		if(!is_dir("generatexmllog"))
			{
			 mkdir("generatexmllog", 0777);
			}
			$ourFileName = Yii::app()->basePath . '/../generatexmllog/'."songlog.txt";
			///chmod($ourFileName , 0777);
			$ourFileHandle = fopen($ourFileName, 'a');
			fwrite($ourFileHandle,'');
			fclose($ourFileHandle);
		
				$output='';
				$output .="\n";
				$output .= 'generate on-'.date("d/m/y : H:i:s", time()) ."\n";
				
				
				
				
				$output .= "  total ".$k." song xml file generated.\n";
				$output .="\n";
				
				$filename = Yii::app()->basePath . '/../generatexmllog/'."songlog.txt";
				
				
				if (is_writable($filename)) {
				if (!$handle = fopen($filename, 'a')) {
				
				}
				if (fwrite($handle, $output) === FALSE) {
				
				}
				
				fclose($handle);
				} 
		
		
		echo "xml generated for song successfully";
	
	
	}
	
	
	public function actionArtistlist()
	{
	 $artist_id = Yii::app()->db2->createCommand()
					->selectdistinct('arm.ARTIST_ID')
								->from('TBL_ARTIST_ROLE_MAP arm')
								->join('TBL_CNT_ART_ROLE_MAP carm', 'arm.ARTIST_ROLE_MAP_ID=carm.ARTIST_ROLE_MAP_ID')
								->join('TBL_CONTENT_RELEASE_DATES crd', 'crd.CONTENT_ID=carm.CONTENT_ID')
								->where('arm.ARTIST_ROLE_ID=:artist_role_id', array('artist_role_id' => 31))
								->order('crd.RELEASE_DATE desc')
								->queryAll();
								
								if(!is_dir("xml/wap"))
										{
										 mkdir("xml/wap", 0777);
										}
										
						$obj=new hideartist;
	
						$hiddenartistid=$obj->hideartist();
						
						// echo "<pre>";
						// print_r($hiddenartistid);exit;
		  
		  
						$ourFileName =Yii::app()->basePath . '/../xml/wap/'."artistlist.xml";
						$ourFileHandle = fopen($ourFileName, 'w');
						
						$newline="\n";
						
						$detail='<?xml version="1.0" encoding="UTF-8"?>'.$newline;
						$detail.='<artists>'.$newline;
						
						for($i=0;$i<count($artist_id);$i++)
						{
							if(!in_array($artist_id[$i]['ARTIST_ID'], $hiddenartistid))
							{
								$detail.='<artistid>'.$artist_id[$i]['ARTIST_ID'].'</artistid>'.$newline;
							}
						}
						$detail.='</artists>'.$newline;
						
						fwrite($ourFileHandle,$detail);
						fclose($ourFileHandle);
		  
				echo "xml file written successfully";
								
	}
	
	
	public function actionArtistwithcharcter()
	{
	
	$char=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	
	// ECHO "<PRE>";
	// print_r($char);
	
	$obj=new hideartist;
	
	$hiddenartistid=$obj->hideartist();
	
		if(!is_dir("xml/wap"))
										{
										 mkdir("xml/wap", 0777);
										}
	
		  $ourFileName =Yii::app()->basePath . '/../xml/wap/'."artistwithcharacter.xml";
						$ourFileHandle = fopen($ourFileName, 'w');
						
						$newline="\n";
						
						$detail='<?xml version="1.0" encoding="UTF-8"?>'.$newline;
						$detail.='<artists>'.$newline;
	
	for($i=0;$i<count($char);$i++)
	{
	
	$sql=Yii::app()->db2->createCommand()
            ->selectdistinct('ta.ARTIST_ID')
			->from('TBL_ARTISTS ta')
			->join('TBL_ARTIST_ROLE_MAP tarm','ta.ARTIST_ID = tarm.ARTIST_ID')
			->join('TBL_CNT_ART_ROLE_MAP carm','tarm.ARTIST_ROLE_MAP_ID=carm.ARTIST_ROLE_MAP_ID')
			->join('TBL_CONTENT_RELEASE_DATES crd','crd.CONTENT_ID=carm.CONTENT_ID')
			->where(array('and','tarm.ARTIST_ROLE_ID=31',array('like', 'ta.ARTIST_NAME', $char[$i] . '%')))
			->order('crd.RELEASE_DATE desc')
			->queryAll();
	
	// echo "<pre>";
	// print_r($sql);exit;
			$detail.='<artist char="'.$char[$i].'">'.$newline;
			
			for($j=0;$j<count($sql);$j++)
			{	
				if(!in_array($sql[$j]['ARTIST_ID'], $hiddenartistid))
							{
			
								$detail.='<artistid>'.$sql[$j]['ARTIST_ID'].'</artistid>'.$newline;
							
							}
			
			}
	
				$detail.='</artist>'.$newline;
	
	
	
	}
	
		$detail.='</artists>'.$newline;
		fwrite($ourFileHandle,$detail);
		fclose($ourFileHandle);
	
	echo "xml file written successfully";
	}
	
	
	public function actionVideolist()
	{
	  $resultArr = Yii::app()->db2->createCommand()
            ->selectDistinct('cf.CONTENT_ID')
            ->from('TBL_CONTENT_FILES cf')
            ->join('TBL_CONTENT_RELEASE_DATES crd', 'cf.CONTENT_ID=crd.CONTENT_ID')
            ->where('cf.CONTENT_FILE_TYPE_ID =:cont_file_type_id', array('cont_file_type_id' => 3))
            ->order('crd.RELEASE_DATE desc')
            ->queryAll();
			
			// echo "<pre>";
			// print_r($resultArr);
			
			if(!is_dir("xml/wap"))
										{
										 mkdir("xml/wap", 0777);
										}
			
			 $ourFileName =Yii::app()->basePath . '/../xml/wap/'."videolist.xml";
						$ourFileHandle = fopen($ourFileName, 'w');
						
						$newline="\n";
						
						$detail='<?xml version="1.0" encoding="UTF-8"?>'.$newline;
						$detail.='<videos>'.$newline;
						
						
			for($i=0;$i<count($resultArr);$i++)
			{
					$detail.='<contentId>'.$resultArr[$i]['CONTENT_ID'].'</contentId>'.$newline;
			}
			$detail.='</videos>'.$newline;
			fwrite($ourFileHandle,$detail);
			fclose($ourFileHandle);
			
			
			echo "xml file written successfully";
	}
	
	
	public function actionVideowithcharcter()
	{
	
	$newline="\n";
	$char=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	
	// ECHO "<PRE>";
	// print_r($char);
	
		if(!is_dir("xml/wap"))
										{
										 mkdir("xml/wap", 0777);
										}
			
	
		  $ourFileName =Yii::app()->basePath . '/../xml/wap/'."videowithcharacter.xml";
						$ourFileHandle = fopen($ourFileName, 'w');
						
						$newline="\n";
						
						$detail='<?xml version="1.0" encoding="UTF-8"?>'.$newline;
						$detail.='<videos>'.$newline;
	
	for($i=0;$i<count($char);$i++)
	{
	
	
		$resultArr = Yii::app()->db2->createCommand()
            ->select('crd.CONTENT_ID,cd.CONTENT_TITLE')
            ->from('TBL_CONTENTS c')
            ->join('TBL_CONTENT_RELEASE_DATES crd', 'c.CONTENT_ID=crd.CONTENT_ID')
            ->join('TBL_CONTENT_DETAILS cd', 'c.CONTENT_ID=cd.CONTENT_ID')
            ->where(array('and', array('in', 'c.CONTENT_TYPE_ID', array(22, 53)), array('like', 'cd.CONTENT_TITLE', $char[$i] . '%')))
            ->queryAll();
			
			$detail.='<video char="'.$char[$i].'">'.$newline;
			
			for($j=0;$j<count($resultArr);$j++)
			{
				$detail.='<contentId>'.$resultArr[$j]['CONTENT_ID'].'</contentId>'.$newline;
			}
	
				$detail.='</video>'.$newline;
	
			
			
	}


			$detail.='</videos>'.$newline;
		fwrite($ourFileHandle,$detail);
		fclose($ourFileHandle);
			
			echo "xml file written successfully";
			
			
	}
	
	public function actionBlog()
	{
	  $blog = Yii::app()->db->createCommand()
            ->select('*')
            ->from('artistaloud_blog')
            ->where('blog_status!=:status', array(':status' => 'DL'))
            ->order('date desc')
            ->queryAll();
			
			
			//echo Yii::app()->params['STORE_WEB_URL_BANNER'];exit;
			// echo "<pre>";
			// print_r($blog);
			
			// exit;
			
			if(!is_dir("xml/wap"))
										{
										 mkdir("xml/wap", 0777);
										}
										
										
			$newline="\n";
			
			
			 $ourFileName =Yii::app()->basePath . '/../xml/wap/'."blog.xml";
						$ourFileHandle = fopen($ourFileName, 'w');
						
						$newline="\n";
						
						$detail='<?xml version="1.0" encoding="UTF-8"?>'.$newline;
						$detail.='<blogs>'.$newline;
						
						for($i=0;$i<count($blog);$i++)
						{
						$detail.=' <blog>'.$newline;
						$detail.='	<blog_title><![CDATA['.$blog[$i]['blog_title'].']]></blog_title>'.$newline;
						$detail.='	<blog_image><![CDATA['.Yii::app()->params['STORE_WEB_URL_BANNER'] . '/images/blogs/'.$blog[$i]['blog_image'].']]></blog_image>'.$newline;
						$detail.='	<blog_desc><![CDATA['.$blog[$i]['blog_desc'].']]></blog_desc>'.$newline;
						$detail.='	<blog_url><![CDATA['.$blog[$i]['blog_url'].']]></blog_url>'.$newline;
						$detail.='	<date><![CDATA['.$blog[$i]['date'].']]></date>'.$newline;
						$detail.=' </blog>'.$newline;
						}
						
						$detail.='</blogs>'.$newline;
						
						fwrite($ourFileHandle,$detail);
						fclose($ourFileHandle);
			
			echo "xml file written successfully";
	}
	
	public function actionEvent()
	{
	
	 $events = Yii::app()->db->createCommand()
            ->select('*')
            ->from('upc_events')
            ->where('event_status!=:id', array(':id' => 'DL'))
            ->order('event_date desc')
            ->queryAll();
			
			// echo "<pre>";
			// print_r($events);exit;
			
			
			
			if(!is_dir("xml/wap"))
										{
										 mkdir("xml/wap", 0777);
										}
										
										
			 $ourFileName =Yii::app()->basePath . '/../xml/wap/'."event.xml";
						$ourFileHandle = fopen($ourFileName, 'w');
						
						$newline="\n";
	
				$detail='<?xml version="1.0" encoding="UTF-8"?>'.$newline;
						$detail.='<events>'.$newline;
						
						foreach($events as $value)
						{
							$detail.='    <event>'.$newline;
							
								$detail.='			<event_name><![CDATA['.$value['event_name'].']]></event_name>'.$newline;
								$detail.='			<event_date><![CDATA['.$value['event_date'].']]></event_date>'.$newline;
								$detail.='			<event_time><![CDATA['.$value['event_time'].']]></event_time>'.$newline;
								$detail.='			<location><![CDATA['.$value['location'].']]></location>'.$newline;
								$detail.='			<city><![CDATA['.$value['city'].']]></city>'.$newline;
								$detail.='			<url><![CDATA['.$value['url'].']]></url>'.$newline;
						
							
							$detail.='    </event>'.$newline;
						}
						
						$detail.='</events>'.$newline;
	
						fwrite($ourFileHandle,$detail);
						fclose($ourFileHandle);
	
	
	
	echo "xml file written successfully";
	
	}
	
	
	 public function actionMove()
  {
		  // FTP access parameters
		$host = '192.168.10.62';
		$usr = 'awapxml';
		$pwd = 'Aw@PxmL@132';
		 
		// file to move:
		
		
		$dir_path =Yii::app()->basePath . '/../xml';
		$files = $this->get_files($dir_path, '.xml', 'r');
	 
		 // echo "<pre>";
		// print_r($files);
		// exit;
		
		for($i=0;$i<count($files);$i++)
		{
			
			//echo $files[$i]."<br>";
			
			$temppath= substr($files[$i],strpos($files[$i],'/xml/'));
			
			//echo $temppath;exit;
		
			$local_file = $files[$i];
			$ftp_path =  '/usr/local/apache/htdocs/awap/'.$temppath;
		
			$upload = ftp_put($conn_id, $ftp_path, $local_file, FTP_ASCII);
		}
		
		
		 
		// connect to FTP server (port 21)
		$conn_id = ftp_connect($host, 21) or die ("Cannot connect to host");
		 
		// send access parameters
		ftp_login($conn_id, $usr, $pwd) or die("Cannot login");
		 
		// turn on passive mode transfers (some servers need this)
		// ftp_pasv ($conn_id, true);
		 
		// perform file upload
		
	
	
		
		for($i=0;$i<count($files);$i++)
		{
			
			echo $files[$i];exit;
		
			$local_file = Yii::app()->basePath . '/../xml/content/artists/artist-995.xml';
			$ftp_path =  '/usr/local/apache/htdocs/awap/xml/frontend/artist-995.xml';
		
			$upload = ftp_put($conn_id, $ftp_path, $local_file, FTP_ASCII);
		}
		// check upload status:
		// print (!$upload) ? 'Cannot upload' : 'Upload complete';
		// print "\n";
		 
		 
		 
		/*
		** Chmod the file (just as example)
		*/
		 
		// If you are using PHP4 then you need to use this code:
		// (because the "ftp_chmod" command is just available in PHP5+)


		if (!function_exists('ftp_chmod')) {
		   function ftp_chmod($ftp_stream, $mode, $filename){
				return ftp_site($ftp_stream, sprintf('CHMOD %o %s', $mode, $filename));
		   }
		}
		 
		// try to chmod the new file to 666 (writeable)
		if (ftp_chmod($conn_id, 0666, $ftp_path) !== false) {
			print $ftp_path . " chmoded successfully to 666\n";
		} else {
			print "could not chmod $file\n";
		}
		 
		// close the FTP stream
		ftp_close($conn_id);



  }
  
  
  
  
  
  public function directoryToArray($directory, $recursive) {
			$array_items = array();
			if ($handle = opendir($directory)) {
			while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
			if (is_dir($directory. "/" . $file)) {
			if($recursive) {
			$array_items = array_merge($array_items, $this->directoryToArray($directory. "/" . $file, $recursive));
			}
			$file = $directory . "/" . $file;
			$array_items[] = preg_replace("/\/\//si", "/", $file);
			} else {
			$file = $directory . "/" . $file;
			$array_items[] = preg_replace("/\/\//si", "/", $file);
			}
			}
			}
			closedir($handle);
			}
			return $array_items;
}





public  function get_files($dir_path = '.', $searchPattern = '', $searchOption = '') {
 
        $files = array();
	
 
        if (is_dir($dir_path)) {
            $scan_files = scandir($dir_path);
 
            $l_searchPattern = (!empty($searchPattern) && substr($searchPattern,0,1) == '*') ? '.' . substr($searchPattern,0,1) . preg_quote(substr($searchPattern,1)) : $searchPattern;
            foreach($scan_files as $file) {
                if ($file == "." || $file == ".." ) continue;
 
                $complete_filepath = $dir_path .'/'. $file;
 
                if (is_dir($complete_filepath) && ($searchOption == 'recursive' || $searchOption == 'r')) {
                    $files = array_merge($files, $this->get_files($complete_filepath, $searchPattern, $searchOption));
                    continue;
                }
 
                if (!is_dir($complete_filepath) && empty($l_searchPattern) || preg_match("/$l_searchPattern$/i", $file)) {
                    array_push($files, $complete_filepath);
                }
            }
        }
 
        return $files;
    }
	
	
	public function actionArtisturlmap()
{
	// echo "Hiii";
	
	$sql = Yii::app()->db->createCommand()
			->truncateTable('tbl_artist_url_mapping');
			
	$artist_id = Yii::app()->db2->createCommand()
								->selectdistinct('arm.ARTIST_ID')
								->from('TBL_ARTIST_ROLE_MAP arm')
								->join('TBL_CNT_ART_ROLE_MAP carm', 'arm.ARTIST_ROLE_MAP_ID=carm.ARTIST_ROLE_MAP_ID')
								->join('TBL_CONTENT_RELEASE_DATES crd', 'crd.CONTENT_ID=carm.CONTENT_ID')
								->where('arm.ARTIST_ROLE_ID=:artist_role_id', array('artist_role_id' => 31))
								->order('crd.RELEASE_DATE desc')
								->queryAll();
								
	// echo "<pre>";
	// print_r($artist_id);
	// exit;
	
	for($i=0;$i<count($artist_id);$i++)
	{
	
		$model = new TblArtistUrlMapping;
		
		
		$model->artist_id = $artist_id[$i]['ARTIST_ID'];
	
	    $artist_name= Yii::app()->db2->createCommand()
						->select('ARTIST_TITLE')
						->from('TBL_ARTIST_DETAILS')
						->where('ARTIST_ID=:ARTIST_ID',array(':ARTIST_ID'=>$artist_id[$i]['ARTIST_ID']))
						->queryRow();
		
			// echo Yii::app()->params['artist_old_url'];exit;
			
			$old_url = str_replace('id',$artist_id[$i]['ARTIST_ID'],Yii::app()->params['artist_old_url']);
			$old_url = str_replace('artistname',str_replace(' ','-',$artist_name['ARTIST_TITLE']),$old_url);
		
		$model->old_url=$old_url;
		
			
			$new_url = str_replace('artistname',str_replace(' ','-',$artist_name['ARTIST_TITLE']),Yii::app()->params['artist_new_url']);
		$model->new_url= $new_url;

				$model->save();
	
	}
	
	echo "artist url mapping done";
}
	
	
}