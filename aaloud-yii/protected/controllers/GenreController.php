<?php

class GenreController extends Controller
{
	public function actionIndex()
	{
		
		$this->layout='column1';
	
		$genre= Yii::app()->db2->createCommand()
						->select('*')
						->from('TBL_GENRES')
						->order('GENRE_NAME asc')
						->queryAll();
		
		
		$page_size =10;
		$criteria = new CDbCriteria();
       
        $item_count = count($genre);
		
        $pages = new CPagination($item_count);
        $pages->setPageSize($page_size);
        $pages->applyLimit($criteria);  // the trick is here
	
		$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
		
		$sample =range($pages->offset+1, $end);
	
		$this->render('genres',array(
			'genre'=>$genre,
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
		
	
		
		$genre= Yii::app()->db2->createCommand()
						->select('*')
						->from('TBL_GENRES')
						->where(array('like','GENRE_NAME', $char.'%'))
						->order('GENRE_NAME asc')
						->queryAll();
						
					$obj=new hideartist;
	
					$hiddenartistid=$obj->hideartist();
					
					$hide = implode(",", $hiddenartistid);
						
								for($a=0;$a<count($genre);$a++)
															{
															
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
																}else
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
											
						/*$fourimages=Yii::app()->db2->createCommand()
											->selectDistinct('arm.ARTIST_ID')
											->from('TBL_ARTIST_ROLE_MAP arm')
											->join('TBL_CNT_ART_ROLE_MAP carm','arm.ARTIST_ROLE_MAP_ID=carm.ARTIST_ROLE_MAP_ID')
											->join('TBL_CONTENT_RELEASE_DATES crd','crd.CONTENT_ID=carm.CONTENT_ID')
											->join('tbl_contents c','c.CONTENT_ID=carm.CONTENT_ID')
											->join('tbl_content_genre_map cgm','cgm.CONTENT_ID=crd.CONTENT_ID')
											->where('cgm.GENRE_ID=:genre_id',array(':genre_id'=>$genre[0]['GENRE_ID']),array('in','c.CONTENT_TYPE_ID',array(22,53)))
											->order('crd.release_date DESC')
											->queryAll();*/
		
		
											
											$page_size =10;
											$criteria = new CDbCriteria();
										   
											$item_count = count($genre);
											
											$pages = new CPagination($item_count);
											$pages->setPageSize($page_size);
											$pages->applyLimit($criteria);  // the trick is here
										
											$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
											
											$sample =range($pages->offset+1, $end);
										
											$this->render('genres',array(
												'genre'=>$genre,
												'item_count'=>$item_count,
												'page_size'=>$page_size,
												'items_count'=>$item_count,
												'pages'=>$pages,
												'sample'=>$sample,
												'genrelist'=>$genrelist,
												'langlist'=>$langlist,
												//'fourimages'=>$fourimages,
												'genreimage'=>$genreimage,
											));
											
											}
	
	
	
	
										public function actionDirectory()
									{

										$this->layout='column1';	
										
										$id=$_GET['id'];
									
										$genre= Yii::app()->db2->createCommand()
														->select('*')
														->from('TBL_GENRES')
														->where('GENRE_ID=:id',array(':id'=>$id))
														->queryAll();
														

																$result=Yii::app()->db2->createCommand()
																								->selectdistinct('ar.ARTIST_ID')
																								->from('TBL_CONTENT_GENRE_MAP cg')
																								->join('TBL_CNT_ART_ROLE_MAP ca','ca.CONTENT_ID = cg.CONTENT_ID')
																								->join('TBL_ARTIST_ROLE_MAP ar','ar.ARTIST_ROLE_MAP_ID = ca.ARTIST_ROLE_MAP_ID')
																								->where('cg.GENRE_ID=:genre_id',array(':genre_id'=>$id))
																								->queryAll();
												

									
										$this->render('genredir',array(
											'genre'=>$genre,
											'result'=>$result,
											
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