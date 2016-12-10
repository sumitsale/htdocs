<?php

class LanguagesController extends Controller
{
	public function actionIndex()
	{
	
	
		$this->layout='column1';
	
		$lang= Yii::app()->db2->createCommand()
						->select('*')
						->from('TBL_LANGUAGES')
						->order('LANGUAGE_TITLE asc')
						->queryAll();
						
	// modification for pagination
		$page_size =10;
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
		$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
		
		$sample =range($pages->offset+1, $end);
	
	//print_r($lang);exit;
	
		$this->render('languages',array(
			'lang'=>$lang,
			'item_count'=>$item_count,
			'page_size'=>$page_size,
			'items_count'=>$item_count,
			'pages'=>$pages,
			'sample'=>$sample,
		));
	}
	
	
	
	
	
					public function actionSearch($char)
					{
									$this->layout='column1';
								
									$lang= Yii::app()->db2->createCommand()
													->select('*')
													->from('TBL_LANGUAGES')
													 ->where(array('like','LANGUAGE_ID', $char.'%'))
													->order('LANGUAGE_TITLE asc')
													->queryAll();
													
													
													
									$genrelist= Yii::app()->db2->createCommand()
											->select('*')
											->from('TBL_GENRES')
											->order('GENRE_NAME asc')
											->queryAll();
		
									$langlist= Yii::app()->db2->createCommand()
											->select('*')
											->from('TBL_LANGUAGES')
											->order('LANGUAGE_TITLE asc')
											->queryAll();	
											
											
					$obj=new hideartist;
	
					$hiddenartistid=$obj->hideartist();
					
					$hide = implode(",", $hiddenartistid);
											
												
											for($a=0;$a<count($lang);$a++)
											{
											
											
											if(strlen($hiddenartistid[0])==0)
																{
											
											$languageimage[]=Yii::app()->db2->createCommand()
														->selectdistinct('ar.ARTIST_ID')
														->from('TBL_CONTENT_LANGUAGE_MAP clm')
														->join('TBL_CNT_ART_ROLE_MAP ca','ca.CONTENT_ID = clm.CONTENT_ID')
														->join('TBL_ARTIST_ROLE_MAP ar','ar.ARTIST_ROLE_MAP_ID = ca.ARTIST_ROLE_MAP_ID')
														->where('ar.ARTIST_ROLE_ID=31 and clm.LANGUAGE_ID=:lang_id',array('lang_id'=>$lang[$a]['LANGUAGE_ID']))
														->limit(4)														
														->queryAll();
														
														}
														else
														{
															
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
											
											
											
													
								// modification for pagination
									$page_size =10;
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
									$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
									
									$sample =range($pages->offset+1, $end);
								
								//print_r($lang);exit;
								
									$this->render('languages',array(
										'lang'=>$lang,
										'item_count'=>$item_count,
										'page_size'=>$page_size,
										'items_count'=>$item_count,
										'pages'=>$pages,
										'sample'=>$sample,
										'genrelist'=>$genrelist,
										'langlist'=>$langlist,
										'languageimage'=>$languageimage,
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