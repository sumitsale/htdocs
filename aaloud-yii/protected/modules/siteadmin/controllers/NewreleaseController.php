<?php

class NewreleaseController extends Controller
{
	public function actionIndex()
	{
		$model1=new ContentDetails;
		$model=new TblArtists;
		$genre=new TblGenres;
		$language=new TblLanguages;
		
		if($_POST){
			if(count($_POST['ContentDetails']['CONTENT_ID'])>0)
			{
						$cont_id = $_POST['ContentDetails']['CONTENT_ID'];
						$obj=new generatexmlfile;
			
						for($i=0;$i<count($cont_id);$i++)
						{
						
									$artistid=Yii::app()->db2->createCommand()
												->select('arm.ARTIST_ID')
												->from('TBL_CNT_ART_ROLE_MAP carm')
												->join('TBL_ARTIST_ROLE_MAP arm', 'carm.ARTIST_ROLE_MAP_ID=arm.ARTIST_ROLE_MAP_ID')
												->where('ARTIST_ROLE_ID=31 and carm.CONTENT_ID=:contid',array(':contid'=>$cont_id[$i]))
												->queryAll();
												
												//print_r($artistid);exit;
						
									$artistdets=array();
									$artistimages=array();
							
									if(isset($artistid[0]['ARTIST_ID']) && $artistid[0]['ARTIST_ID'] !='')
									{
						
									$artistdet= Yii::app()->db2->createCommand()
										->select('ad.ARTIST_ID as artistId,a.ARTIST_NAME as artistName')
										->from('TBL_CNT_ART_ROLE_MAP carm')
										->join('TBL_ARTIST_ROLE_MAP arm' ,'carm.ARTIST_ROLE_MAP_ID=arm.ARTIST_ROLE_MAP_ID')
										->join('TBL_ARTIST_DETAILS ad','arm.ARTIST_ID=ad.ARTIST_ID')
										->join('TBL_ARTISTS a','ad.ARTIST_ID=a.ARTIST_ID')
										->where('CONTENT_ID=:cont_id and ad.ARTIST_ID=:arst_id',array(':cont_id'=>$cont_id[$i],':arst_id'=>$artistid[0]['ARTIST_ID']))
										->queryAll();
						
									
													
													
															
																				if(count($artistdet)>0)
																						{
																							$artistdets=array('artistId'=>array('@cdata'=>$artistdet[0]['artistId']),
																																'artistName'=>array('@cdata'=>$artistdet[0]['artistName']),
																											);
																						}
																				else
																						{
																						$artistdets=array('artistId'=>'',
																															'artistName'=>'',
																											);
																						}
										//print_r($artistdet);exit;
									}
						
									$song_genre =Yii::app()->db2->createCommand()
												->select('GENRE_NAME as genre')
												->from('TBL_CONTENT_GENRE_MAP cgm')
												->join('TBL_GENRES g', 'cgm.GENRE_ID = g.GENRE_ID')
												->where('CONTENT_ID=:CONT_ID',array(':CONT_ID'=>$cont_id[$i]))
												->queryAll();
																								
												if(count($song_genre)>0)
																						{
																						$song_genres['genre']=array('@cdata'=>$song_genre[0]['genre']);
																						}
																			else
																						{
																						$song_genres['genre']='';
																						}
											//print_r($song_genre);exit;
											
									$songlang =Yii::app()->db2->createCommand()
															->select('LANGUAGE_TITLE as language')
															->from('TBL_CONTENT_LANGUAGE_MAP lg')
															->join('TBL_LANGUAGES l', 'lg.LANGUAGE_ID = l.LANGUAGE_ID')
															->where('CONTENT_ID=:CONT_ID',array(':CONT_ID'=>$cont_id[$i]))
															->queryAll();
															
															
																if(count($songlang)>0)
																						{
																						$songlangs['language']=array('@cdata'=>$songlang[0]['language']);
																						}
																		else
																						{
																						$songlangs['language']='';
																						}
																								
														//	print_r($songlang);exit;
																																													
																													
									$song_name =Yii::app()->db2->createCommand()
															->select('CONTENT_TITLE as track')
															->from('TBL_CONTENT_DETAILS ')
															->where('CONTENT_ID=:CONT_ID',array(':CONT_ID'=>$cont_id[$i]))
															->queryAll();	
																
																
																$song_names='';
																$song_names=array();
															
																		if(count($song_name)>0)
																						{
																							$song_names=array('track'=>array('@cdata'=>$song_name[0]['track']),
																															 
																											);
																						}
																		else
																						{
																						$song_names=array('track'=>'',
																															
																											);
																						}
														//print_r($song_name);exit;	
														
														$artist_cont_id='';
														
														$artist_cont_id=$cont_id[$i];
														
												
										
									if(isset($artistid[0]['ARTIST_ID']) && $artistid[0]['ARTIST_ID'] !='')
									{			
															
										$artistimage= Yii::app()->db2->createCommand()
										->select('f.FILE_PATH as albumArtwork')
										->from('TBL_ARTIST_FILES af')
										->join('TBL_FILES f','f.FILE_ID = af.FILE_ID')
										->where('(af.FILE_SUB_TYPE_ID=3 or af.FILE_SUB_TYPE_ID=77) and af.ARTIST_ID=:arst_id',array(':arst_id'=>$artistid[0]['ARTIST_ID']))
										->queryAll();								
				
																if(count($artistimage)>0)
																						{
																						$artistimages['albumArtwork']=array('@cdata'=>$artistimage[0]['albumArtwork']);
																						}
																						else
																						{
																						$artistimages['albumArtwork']='';
																						}
									}
															
																						//print_r($artistimage);exit;
																						$videoContentId['contentId']=array('@cdata'=>$cont_id[$i]);
																						
										$newRelaseMaster[]=array_merge($artistdets,$videoContentId,$song_names,$song_genres,$songlangs,$artistimages);
										
										//echo "<pre>";
										//print_r($newRelaseMaster);exit;
									
						}
										$newRelaseMaster1=array();
										$newRelaseMaster1['album']=$newRelaseMaster;
						
						
						
						
								// $val = $obj->createValidXMLfromArray($newRelaseMaster, 'albums', 'album');
								// $obj->save(Yii::app()->basePath . '/../xml/frontend/newreleases.xml', $val);
								
								$xml = Array2XML::createXML('albums', $newRelaseMaster1);
								$xml->save(Yii::app()->basePath . '/../xml/frontend/newreleases.xml');
								
								Yii::app()->user->setFlash('success',"Xml Generated Successfully");
								
									
									
						
					
			}
		}
		
						
		$newreleasesxml =  simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/'."newreleases.xml");

			for($i=0;$i<count($newreleasesxml);$i++)
			{
					$key = (string)$newreleasesxml->album[$i]->contentId;
					$val = (string)$newreleasesxml->album[$i]->track;
				
				$key_arr[$i] = $key;
				$val_arr[$i] = $val;

			}
	

		$this->render('index',array(
		'model' => $model,
		'model1'=>$model1,
		'language'=>$language,
		'genre'=>$genre,
		'key_arr'=>$key_arr,
		'val_arr'=>$val_arr
		));
	}
	


	public function actionAutocompleteTest() {
    $res = array();
    $model = new ContentDetails;
    if (isset($_GET['term'])) {
	
/*
      $qtxt ="SELECT CONTENT_TITLE,CONTENT_ID FROM tbl_content_details WHERE CONTENT_ID in (select distinct PACKAGE_CONTENT_ID from tbl_package_content_map) and CONTENT_TITLE like '".$_GET['term']."%'";
      $command =Yii::app()->db2->createCommand($qtxt);
*/

	  $command = Yii::app()->db2->createCommand()
              ->select('b.ARTIST_ID,b.ARTIST_NAME')
              ->from('TBL_ARTIST_ROLE_MAP a')
              ->join('TBL_ARTISTS b', 'a.ARTIST_ID=b.ARTIST_ID')
              ->where('b.ARTIST_NAME LIKE :ARTIST_NAME AND a.ARTIST_ROLE_ID = :ARTIST_ROLE_ID', array(':ARTIST_NAME' => $_GET['term'] . '%', ':ARTIST_ROLE_ID' => '31'));
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
	

	public function actionDisplaysubtag()
	{
	   //$model1=new TBLTABS;

		 $content_id = '';
		 
				$artist_id=$_POST['TblArtists']['ARTIST_ID'];

							$sql=Yii::app()->db2->createCommand()
										->select('ARTIST_ROLE_MAP_ID')
										->from('TBL_ARTIST_ROLE_MAP')
										->where('ARTIST_ID=:arst_id and ARTIST_ROLE_ID=31',array(':arst_id'=>$artist_id))
										->queryAll();

							$sql1=Yii::app()->db2->createCommand()
										->select('c.CONTENT_ID')
										->from('TBL_CNT_ART_ROLE_MAP carm')
										->join('TBL_CONTENTS c','carm.CONTENT_ID=c.CONTENT_ID')
										->where('ARTIST_ROLE_MAP_ID=:art_rol_id and c.CONTENT_TYPE_ID=21',array(':art_rol_id'=>$sql[0]['ARTIST_ROLE_MAP_ID']))
										->queryAll();
						

															for($i=0;$i<count($sql1);$i++)
																{												
																	$content_id .= $sql1[$i]['CONTENT_ID'].",";
																	//$arr_data[] = $qryContentTypes[$i]['CONTENT_TYPE_ID'];
																}
															
															$content_id = substr($content_id, 0, -1);
															
															
															$array_cont_id=explode(',',$content_id);
														
															$data2=Yii::app()->db2->createCommand()
																		->select('CONTENT_ID,CONTENT_TITLE')
																		->from('TBL_CONTENT_DETAILS')
																		->where(array('in','CONTENT_ID',$array_cont_id))
																		->queryAll();
						
					
															$data = CHtml::listData($data2, 'CONTENT_ID', 'CONTENT_TITLE');
															  
																
																		echo CHtml::tag('option', array(), CHtml::encode("Select a song"), true);
																		foreach ($data as $value => $name) 
																		{
																  echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
																		}	
		
	}
			
		public function actionDisplaySongMinorDetails()
		{
		 $cont_id=$_POST['contentId'];
			
			$sql=Yii::app()->db2->createCommand()
						->select('g.GENRE_NAME, l.LANGUAGE_TITLE')
						->from('TBL_CONTENTS c')
						->join('TBL_CONTENT_GENRE_MAP cg', 'c.CONTENT_ID = cg.CONTENT_ID')
						->join('TBL_CONTENT_LANGUAGE_MAP lg', 'c.CONTENT_ID = lg.CONTENT_ID')
						->join('TBL_GENRES g', 'cg.GENRE_ID = g.GENRE_ID')
						->join('TBL_LANGUAGES l', 'lg.LANGUAGE_ID = l.LANGUAGE_ID')
						->where('c.CONTENT_ID=:cont_id',array(':cont_id'=>$cont_id))
						->queryAll();
						
			$values = json_encode($sql[0]);
			echo $values;
		}
		
		public function actionGeneratexml()
		{
		print_r($_POST);
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