<?php $this->pageTitle ="Popular Artists India | Song Artists | Artist Profiles | Independent Music India - ArtistAloud.com"; ?>

<?php Yii::app()->clientScript->registerMetaTag('Independent Artists in India - Get latest information on music albums, songs from popular artists in India on Artistaloud.com, a premium destination for independent songs and music by independent artists.','description'); ?>
<?php Yii::app()->clientScript->registerMetaTag('independent artists, popular artists India, upload, upload music, independent music, music India, independent music India, artists, artists in India, India, music, latest music, new music, bands, bands India, independent bands, exclusive, artist aloud, india, upload music free, independent music artists','keywords'); 

//Yii::app()->clientScript->registerMetaTag('Artist Aloud','og:title', null, array('property'=>'og:title'));
Yii::app()->clientScript->registerMetaTag('actor','og:type', null, array('property'=>'og:type'));
//Yii::app()->clientScript->registerMetaTag('http://new.artistaloud.com/','og:url', null, array('property'=>'og:url'));
Yii::app()->clientScript->registerMetaTag('http://www.artistaloud.com/themes/aaloud/images/logo.png','og:image', null, array('property'=>'og:image'));
//Yii::app()->clientScript->registerMetaTag('Artist Aloud','og:site_name', null, array('property'=>'og:site_name'));
Yii::app()->clientScript->registerMetaTag('661511706','fb:admins', null, array('property'=>'fb:admins'));

?>

<div class="content-left fl">
            	
                <div class="breadcrumb grey99 fnt11">
								<?php echo CHtml::link('Home', CController::createUrl("site/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
								Popular Artists
								</div>
                
                <div class="page-title mt10">
                	<h2 class="page-title-block fl">Popular Artists</h2>
                    <div class="share-elements fr">
                    <iframe src="http://www.facebook.com/plugins/like.php?href=http://<?php echo $_SERVER['HTTP_HOST']. $this->createUrl('/artists/popular-artists'); ?>&amp;send=false&amp;layout=button_count&amp;width=90&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=155750401164061" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
                    </div>
                <div class="clr"></div>
                </div>
                
                <?php /*<div class="top-pagination mb10">
				
				<ul id="pagination">
							<?php echo CHtml::link('A', array('artist/directory', 'char' => 'A' )); ?>
							<?php echo CHtml::link('B', array('artist/directory', 'char' => 'B' )); ?>
							<?php echo CHtml::link('C', array('artist/directory', 'char' => 'C' )); ?>
							<?php echo CHtml::link('D', array('artist/directory', 'char' => 'D' )); ?>
							<?php echo CHtml::link('E', array('artist/directory', 'char' => 'E' )); ?>
							<?php echo CHtml::link('F', array('artist/directory', 'char' => 'F' )); ?>
							<?php echo CHtml::link('G', array('artist/directory', 'char' => 'G' )); ?>
							<?php echo CHtml::link('H', array('artist/directory', 'char' => 'H' )); ?>
							<?php echo CHtml::link('I', array('artist/directory', 'char' => 'I' )); ?>
							<?php echo CHtml::link('J', array('artist/directory', 'char' => 'J' )); ?>
							<?php echo CHtml::link('K', array('artist/directory', 'char' => 'K' )); ?>
							<?php echo CHtml::link('L', array('artist/directory', 'char' => 'L' )); ?>
							<?php echo CHtml::link('M', array('artist/directory', 'char' => 'M' )); ?>
							<?php echo CHtml::link('N', array('artist/directory', 'char' => 'N' )); ?>
							<?php echo CHtml::link('O', array('artist/directory', 'char' => 'O' )); ?>
							<?php echo CHtml::link('P', array('artist/directory', 'char' => 'P' )); ?>
							<?php echo CHtml::link('Q', array('artist/directory', 'char' => 'Q' )); ?>
							<?php echo CHtml::link('R', array('artist/directory', 'char' => 'R' )); ?>
							<?php echo CHtml::link('S', array('artist/directory', 'char' => 'S' )); ?>
							<?php echo CHtml::link('T', array('artist/directory', 'char' => 'T' )); ?>
							<?php echo CHtml::link('U', array('artist/directory', 'char' => 'U' )); ?>
							<?php echo CHtml::link('V', array('artist/directory', 'char' => 'V' )); ?>
							<?php echo CHtml::link('W', array('artist/directory', 'char' => 'W' )); ?>
							<?php echo CHtml::link('X', array('artist/directory', 'char' => 'X' )); ?>
							<?php echo CHtml::link('Y', array('artist/directory', 'char' => 'Y' )); ?>
							<?php echo CHtml::link('Z', array('artist/directory', 'char' => 'Z' )); ?>
				</ul>

				
                <?php //include 'top-paginate.php'; ?>
                </div>
                <div class="clr"></div> */ ?>
                  <div class="top-buttons">
				  
				  
                <?php //include 'button-nav.php'; ?>
				
				<div class="buttons">

<ul class="blue">
		<li>
		<?php echo CHtml::link('<span class="font-mole">Artists</span>', CController::createUrl("artist/index")); ?>
		</li>
	
		<li>
		<?php echo CHtml::link('<span class="font-mole">Popular artists</span>', CController::createUrl("artist/popularartist"),array('class'=>'current')); ?>
		</li>
		
    <li><a class="trigger-l" title="languages"><span class="font-mole">languages</span></a></li>
	<li><a class="trigger" title="Generes"><span class="font-mole">genres</span></a></li>
</ul>

</div><div class="clr"></div>





		 <div class="panel mt10">
      <div class="panal-header">
        <h3 class="sub-page-title-block fl">Genres</h3>
      </div>
      <div class="clr"></div>
      <div class="panal-content">
        <div class="panal-list">
		 <ul class="each-list">
          <?php
          for ($i = 0; $i < count($genrelist); $i++) {
            ?>
           

              <li><a href="javascript: void(0)">
                 <?php echo CHtml::link('' . $genrelist[$i]['GENRE_NAME'], 
$this->createUrl('artist/genresdir',array(
				  'id' =>  $genrelist[$i]['GENRE_ID'],'name'=> str_replace(' ','-',$genrelist[$i]['GENRE_NAME'])))); ?>
                </a>
              </li>
            <?php if(($i+1)%8==0) {?>
			
			 </ul>
			 </div>
			 <div class="panal-list">
			<ul class="each-list">
			<?php } ?>
           <?php if($i==31)
			{
			break;
			}	 } ?>
        </div>


      </div>
    </div>


    <div class="panel-l mt10">
      <div class="panal-header">
        <h3 class="sub-page-title-block fl">Languages</h3>
      </div>
      <div class="clr"></div>



      <div class="panal-content">
        <div class="panal-list">
		<ul class="each-list">
          <?php for ($i = 0; $i < count($langlist); $i++) { ?> 
            
              <li><a href="javascript: void(0)">
                  <?php echo CHtml::link('' . $langlist[$i]['LANGUAGE_TITLE'], $this->createUrl('artist/languagedir',array(
				  'id' =>  $langlist[$i]['LANGUAGE_ID'],'name'=> str_replace(' ','-',$langlist[$i]['LANGUAGE_TITLE'])))); ?>
                </a></li>   
           

			<?php if(($i+1)%8==0) {?>
			
			 </ul>
			 </div>
			 <div class="panal-list">
			<ul class="each-list">
			<?php } ?>
          <?php if($i==31){ break; }  } ?>

        </div>

      </div>


    </div>


				
				
				
                </div>
                <div class="clr"></div>
                
    <div class="top-buttons">
    	 <div class="buttons font-mole fnt14">
    Click on the images to know more.
        </div>
	</div>
     <div class="clr"></div>

                
                
				<div class="artist-list pt10">
				
            	<?php 
							$j=0;
							
                               if(count($result)>0){

                                for($i=0;$i<count($result);$i++) 
				{     


				
				if(file_exists(Yii::app()->basePath . '/../xml/content/artists/'."artist-".$result[$i]['artist_id'].".xml"))   {
				 $j;
				

					$artistfile =  simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/'."artist-".$result[$i]['artist_id'].".xml");
					
					
				?>
				
	
				
	<div class="img-block fl">
    <div>
              <a href="javascript: void(0)" rel="web" title="<?php echo $artistfile->artistName; ?>.">
			  
			  <?php if($artistfile->profileimage200->image200[0]->file_path) {
			  
			  ?>
							<img alt="" src="<?php echo $artistfile->profileimage200->image200[0]->file_path; ?>">
				
				<?php }
				
				else  { ?>
							<img alt="" src="<?php echo Yii::app()->baseUrl."/themes/aaloud/images/Thumbnails/200x200.jpg"; ?>">
				 
				 <?php } ?>
				 
				
              </a>
            </div>
         <!-- Begin Caption -->
    <div class="cover boxcaption">
        <div class="overlay_wrap">
        <span class="rollover">
			<h3 class="art_title"><?php 
																$str = $artistfile->artistName;
																		if(strlen($str)>15)
																			{
																				$str = substr($artistfile->artistName,0,13);
																				$str.="..";
																			}
																		else
																			{
																				$str = $artistfile->artistName;
																			}

																			echo $str;?></h3>
        	 <a href="javascript: void(0)" class="frame_close"></a>
			
									
 <?php 
			 	$genrename='';
				
				for($z=0;$z<count($artistfile->genres->genre);$z++)
															{												
																$genrename .= $artistfile->genres->genre[$z]->genreName.",";
																
															}
				$genrename = substr($genrename, 0, -1);
														
														$languagename='';
														
														for($k=0;$k<count($artistfile->languages->language);$k++)
															{												
																$languagename .= $artistfile->languages->language[$k]->languageName.",";
																
															}
															$languagename = substr($languagename, 0, -1);

															?>
															
									
															
			 
			 
                <span class="fnt11 grey99">Genre: 
													<?php 
															$str = $genrename;
																	if(strlen($str)>18)
																		{
																			$str = substr($genrename,0,16);
																			$str.="...";
																		}
																	else
																		{
																			$str = $genrename;
																		}
																							
																	echo $str;
																	?> <br>
								Language: <?php 
															$str1 = $languagename;
																	if(strlen($str1)>18)
																		{
																			$str1 = substr($languagename,0,16);
																			$str1.="...";
																		}
																	else
																		{
																			$str1 = $languagename;
																		}
																							
																	echo $str1; ?></span>
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

                  //	if($result[$i]['ARTIST_ID']==6843){echo "<pre>"; print_r($songlist);exit;}
                  ?>
                  <?php for ($r = 0; $r < 3; $r++) { ?>

                    <div>
					<?php  if(isset($songlist[$r]['songPath']) && $songlist[$r]['songPath']!='') { ?>
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
						 <?php echo CHtml::link('MORE', $this->createUrl('artist/artistdetail',array('name'=>str_replace(' ','-',$artistfile->artistName),
						 'id' => $artistfile->artistId)), array('class' => 'orange')); ?>

						</div>
				 <!-- <div class="artist_more fl"><a class="orange" href="<?php //echo Yii::app()->baseUrl;  ?>/artist/artistdetail">More</a></div>
                   -->
                <div class="fr"> <!--<img alt="" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/fblike.gif">-->
                
                <iframe src="http://www.facebook.com/plugins/like.php?href=http://<?php echo $_SERVER['HTTP_HOST']. $this->createUrl('artist/artistdetail',array('id' => $artistfile->artistId)); ?>&amp;send=false&amp;layout=button_count&amp;width=90&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=155750401164061" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
                
                
                </div>
                </span>
        </div>
        
       
    </div><!-- End Caption --> 
</div>

<?php $k=$j+1;


if($k%3==0) { ?>
  <div class="clr pt15"></div>
   <?php } ?>

<?php  $j++; } } } else echo "<h2 class=".'orange'.">No Result Found</h2>"; ?>
                 
                </div>
				
								  <div class="clr pt15"></div>
									

								<!--
									<div class="bottom-pagination mt10">
									 
									<ul id="pagination_bottom">
												<li>&lt;&lt;</li>
												<li><a href="">1</a></li>
												<li><a href="">2</a></li>
												<li><a href="">3</a></li>
												<li><a href="">4</a></li>
												<li><a href="">5</a></li>
												<li><a style="background-color:#06C" href="">&nbsp;&nbsp;&nbsp;</a></li>
												<li>of</li>
												<li><a href="">23</a></li>
												<li>&gt;&gt;</li>
									</ul>
									</div>
									
									-->
								
								
								</div>