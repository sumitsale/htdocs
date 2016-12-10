	<?php  $this->pageTitle = " Independent Artists " ." | Music Artists India " ." | Artist Profiles " ." | Independent Music in India - "
	." Search results for " . $searchtext; ?>
	
	<?php if(strlen($errorartist)>1)
		{
		echo "<h1>".$errorartist."<h1>";
		} else { 
		
	?>

								<div class="breadcrumb grey99 fnt11">
									<?php echo CHtml::link('Home', CController::createUrl("site/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
									Search
								</div>
                
                <div class="page-title mt10">
                	<h2 class="page-title-block fl">Search Results</h2>
                <div class="clr"></div>
                </div>
                <div class="bt_line"></div>
                <div class="clr"></div>
                
                <!-- Search Result starts -->
                <div class="spacer20">&nbsp;</div>
                <div>
                	<strong>
					<?php 
					$q=0;
					
					if(count($artistid)>0){$q++;} if((count($video->responsedata->autnhit)>0)){$q++;}if((count($news)>0)){$q++;}
					
					
					echo (count($artistid)+count($video->responsedata->autnhit)+count($news));
					
					?> results found in <?php echo $q; ?> categories</strong>
                </div>
                <div class="spacer20 bt_line">&nbsp;</div>
                
                <!-- Search Result starts -->
                
                <!--Search-artist list starts -->
				
				<?php if(count($artistid)>0) { ?>
                <div class="spacer20">&nbsp;</div>
                <div class="bt_line">
					<strong class="search_title fl font-mole">
                    	<span>Artist </span><span class="srch_no">(<?php echo count($artistid); ?>)</span>
                    </strong>
                    <div class="fr view_all">
					

					
					<?php echo Chtml::link('View all','', array('submit'=>array('search/artist'), 
					'params'=>array('artistid'=>$artist_id)
					,'style'=>'cursor: pointer; text-decoration: none;')); 
					// echo "<pre>";
					// print_r($artist_id);exit;
					?>
						
					</div>
                    <div class="clr"></div>
                </div>
                
            	<div class="artist-list mt10 pt10">
                    <?php //include 'artist-list-search.php'; ?>
					<!-------------------------------artist-list-search start here -------------->
					
					<?php $f=0;
					for($i=0;$i<count($artistid);$i++) { ?>
					<?php 
					if(file_exists(Yii::app()->basePath . '/../xml/content/artists/artist-' . $artistid[$i]['ARTIST_ID'] . ".xml"))
					{	
						$artistfile = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/artist-' . $artistid[$i]['ARTIST_ID'] . ".xml");
					
					// echo "<pre>";
					// print_r($artistfile);exit;
					
					?>
					<div class="img-block fl">
						<div>
						<a title="<?php echo $artistfile->artistName; ?>" rel="web" href="javascript:void()">
						<?php if ($artistfile->profileimage200->image200[0]->file_path) { ?>
						
						   <img src="<?php echo $artistfile->profileimage200->image200[0]->file_path;?>" alt="fb" />
						      
							  <?php } else { ?>
							  
							<img alt="<?php echo $artistfile->artistName; ?>" src="<?php echo Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/200x200.jpg"; ?>">

						  <?php } ?>
						</a><?php //exit;?>
						</div>
							 <!-- Begin Caption -->
						<div class="cover boxcaption">
							<div class="overlay_wrap">
							<span class="rollover">
								<h3 class="art_title">
								<?php echo substr($artistfile->artistName,0,14); ?>
								</h3> <a class="frame_close" href="#"></a>
									<span class="fnt11 grey99">
									 <?php
										$genrename = '';

										for ($z = 0; $z < count($artistfile->genres->genre); $z++) {
										  $genrename .= $artistfile->genres->genre[$z]->genreName . ",";
										}
										$genrename = substr($genrename, 0, -1);

										$languagename = '';

										for ($k = 0; $k < count($artistfile->languages->language); $k++) {
										  $languagename .= $artistfile->languages->language[$k]->languageName . ",";
										}
										$languagename = substr($languagename, 0, -1);
										?>
									Genre:
									 <?php
											  $str = $genrename;
											  if (strlen($str) > 18) {
												$str = substr($genrename, 0, 16);
												$str.="...";
											  } else {
												$str = $genrename;
											  }

											  echo $str;
											  ?> 
									<br />
									Language: 
									<?php
									  $str1 = $languagename;
									  if (strlen($str1) > 18) {
										$str1 = substr($languagename, 0, 16);
										$str1.="...";
									  } else {
										$str1 = $languagename;
									  }

									  echo $str1;
										  ?>
									</span>
									 <div class="play_box">


                  <?php
                  $size = count($artistfile->songs->song);
                  $t = 0;
                  $songlist = '';
                  $songlist = array();
                  for ($g = 0; $g < $size; $g++) {
                    foreach ($artistfile->songs->song[$g]->attributes() as $x => $y) {
                      if ($x == 'id' && $y == '181' && (strlen($artistfile->songs->song[$g]->songPath) > 0)) {
                        $songlist[$t] = array(
                            'fileId' => $artistfile->songs->song[$g]->fileId,
                            'contentId' => $artistfile->songs->song[$g]->contentId,
                            'songName' => $artistfile->songs->song[$g]->songName,
                            'songPath' => $artistfile->songs->song[$g]->songPath,
                        );
                        $t++;
                      }
                    }
                  }
				  // echo "<pre>";
				  // print_r($songlist);exit;

                  //	if($result[$i]['ARTIST_ID']==6843){echo "<pre>"; print_r($songlist);exit;}
                  ?>
                  <?php for ($r = 0; $r < 3; $r++) { ?>

				  
				  
                    <div>
						<?php  

						if(isset($songlist[$r]['songPath']) && $songlist[$r]['songPath']!='') { ?>
                      <a href="javascript:;" url="<?php echo $songlist[$r]['songPath']; ?>" value="" file_id="<?php echo $songlist[$r]['fileId']; ?>" artist_id="<?php echo $artistfile->artistId; ?>" content_id="<?php echo $songlist[$r]['contentId']; ?>" class="play fl mt4">&nbsp;</a>
                     <?php } ?>
                     <span class="song-title pl5 grey99">
                        <?php
												if(isset($songlist[$r]['songName']) && !(empty ($songlist[$r]['songName'])))
												{
                        $str = $songlist[$r]['songName'];
                        if (strlen($str) > 15) {
                          $str = substr($songlist[$r]['songName'], 0, 15);
                          $str.="...";
                        } else {
                          $str = $songlist[$r]['songName'];
                        }
												
                        echo $str . "&nbsp";
												}
                        ?>
                      </span>
					 
                    </div>
					

                  <?php } ?>


                </div>
									<div class="artist_more fl">
									 <?php echo CHtml::link('MORE', $this->createUrl('artist/artistdetail',array('name'=>str_replace(' ','-',$artistfile->artistName),'id' => $artistfile->artistId)), array('class' => 'orange')); ?>
									</div>
									<div class="fr"> 
               
                <!--<img alt="" src="<?php //echo Yii::app()->theme->baseUrl; ?>/images/temp/fblike.gif">-->
                <!--<div class="fb-like" data-send="false" data-layout="button_count" data-width="80" data-show-faces="false"
                 href="http://aanew.hungamatech.com/aaloud/artist/artistdetail/id/92320 <?php /*?><?php $this->createUrl('artist/artistdetail',array('id' => $artistfile->artistId)); ?><?php */?> "></div>-->
                 
<iframe src="http://www.facebook.com/plugins/like.php?href=http://<?php echo $_SERVER['HTTP_HOST']. $this->createUrl('artist/artistdetail',array('id' => $artistfile->artistId)); ?>&amp;send=false&amp;layout=button_count&amp;width=90&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=155750401164061" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
               <?php //exit; ?>
                </div>
              </span>
            </div>
							
						   
						</div><!-- End Caption --> 
					</div>
					
					<?php if($f==2) {break;} ?>
					
				<?php $f++;} }?>

					
					<div class="clr pt15"></div>

					<!-------------------------------end here ---------------------------------->
                     <div class="clr"></div>
                </div>
				
				
				<?php } ?>
                <div class="bt_line spacer20"></div>
                <!--Search-artist list ends -->
                
                <!--Search-Video list starts -->
				<?php if(count($video->responsedata->autnhit)>0) { //echo count($video->responsedata->autnhit);exit; ?>
				
                <div class="spacer20">&nbsp;</div>
				
				
				
                <div class="bt_line">
					<strong class="search_title fl font-mole">
                    	<span>Videos </span><span class="srch_no">(<?php echo count($video->responsedata->autnhit); ?>)</span>
                    </strong>
					
							<div class="fr view_all">
					
							<?php echo Chtml::link('View all','', array('submit'=>array('search/video'), 
							'params'=>array('videoid'=>$video_id)
							,'style'=>'cursor: pointer; text-decoration: none;',)); ?>
					
					
							</div>
							
                    <div class="clr"></div>
                </div>
                
            	<div class="artist-list">
                    <?php //include 'video-list_search.php'; ?>
					<?php echo $this->renderPartial('video-list_search',array('video'=>$video)); ?>
					
                     <div class="clr"></div>
                </div>
				
				<?php } ?>
				
                <div class="bt_line spacer20"></div>	
				
                
                
            	
                <!--Search-Video list ends -->  
                
                <!--Search-News list starts -->
				<?php if(count($news)>0) { ?>
                <div class="spacer20">&nbsp;</div>
				
				
                <div class="bt_line">
					<strong class="search_title fl font-mole">
                    	<span>News </span><span class="srch_no">(<?php echo count($news); ?>)</span>
                    </strong>
                    <div class="fr view_all">
					
					<?php echo Chtml::link('View all','', array('submit'=>array('search/news'), 
					'params'=>array('newsid'=>$news_id)
					,'style'=>'cursor: pointer; text-decoration: none;',)); ?>
					
					
					<?php
					/*
					echo CHtml::link('View all', CController::createUrl("search/news"),array('class'=>'orange')); 
					*/
					?>
					
					</div>
                    <div class="clr"></div>
                </div>
                
				
				
            	<div class="artist-list">
                    <?php //include 'news-list-search.php'; ?>
                     <!-----------------news list search start here -------------------------------->
					 <?php for($k=0;$k<count($news);$k++) { 
					 $date=strtotime($news[$k]['Press_News_Date']);
					 ?>
						<div class="news-item" id="1">
								<div class="news">
								<a href="#" class="orange">
								<?php echo CHtml::link(''.$news[$k]['Press_News_Title'], CController::createUrl("news/details/id/".$news[$k]['Press_id']), array('class'=>'orange')); ?>
							
								
								</a></div>
							   <div class="info pl10 grey99"><?php echo date('dS',$date)." ".date('F',$date)." ".date('y',$date); ?>  | 
							   
							   <?php echo $news[$k]['Press_News_Source']; ?>
							   </div>
						</div>
					<?php if($k==3){break;}} ?>
						
					 
					 <!-------------------end here ------------------------------------------------>
					 
					 <div class="clr"></div>
                </div>
				
                <div class="spacer20"></div>
				<?php } ?>
                <!--Search-News list ends -->  
                <div class="spacer20 mt25">&nbsp;</div>
			<?php } ?>