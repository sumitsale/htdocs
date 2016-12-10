
    <?php
		$j=0;
    if (count($result) > 0) {

      for ($i = 0; $i < $perPage; $i++) {
				if(isset($result[$i]['ARTIST_ID']) && $result[$i]['ARTIST_ID']!='')
				{

          $artistfile = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $result[$i]['ARTIST_ID'] . ".xml");
          ?>


          <div class="img-block fl">
                 <div>
              <a href="javascript:void(0)" rel="web" title="<?php echo $artistfile->artistName; ?>">
			  
			  <?php if($artistfile->profileimage200->image200[0]->file_path) {
			  
			  ?>
							<img alt="<?php echo $artistfile->artistName; ?>" src="<?php echo $artistfile->profileimage200->image200[0]->file_path; ?>">
				
				<?php }
				
				else  { ?>
							<img alt="<?php echo $artistfile->artistName; ?>" src="<?php echo Yii::app()->baseUrl."/themes/aaloud/images/Thumbnails/200x200.jpg"; ?>">
				 
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
        	 <a href="javascript:void(0)" class="frame_close"></a>
			 
			 
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
																													
																							echo $str; ?> <br>
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
					$size=count($artistfile->songs->song); 
					$t=0;
					$songlist='';
					$songlist=array();
						for($g=0;$g<$size;$g++)
						{
					      foreach($artistfile->songs->song[$g]->attributes() as $x => $y )
							{
							 if($x=='id' && $y=='181' && (strlen($artistfile->songs->song[$g]->songPath)>0))
																				 {
																				 $songlist[$t] =array(
																				 'fileId'=>$artistfile->songs->song[$g]->fileId,
                                         'contentId' => $artistfile->songs->song[$g]->contentId,
																				 'songName'=>$artistfile->songs->song[$g]->songName,
																				 'songPath'=>$artistfile->songs->song[$g]->songPath,
																				 );
																				 $t++;
																				 }
							}

						}
						
					//	if($result[$i]['ARTIST_ID']==6843){echo "<pre>"; print_r($songlist);exit;}
					?>
				  <?php for($r=0;$r<3;$r++) { ?>
				  
                    <div>
					<?php  if(isset($songlist[$r]['songPath']) && $songlist[$r]['songPath']!='') { ?>
					<a href="javascript:;" url="<?php echo $songlist[$r]['songPath']; ?>" value="" file_id="<?php echo $songlist[$r]['fileId']; ?>" artist_id="<?php echo $artistfile->artistId; ?>" content_id="<?php echo $songlist[$r]['contentId']; ?>" class="play fl mt4"></a>
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
                <div class="fr"> <img alt="fb" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/fblike.gif"></div>
                </span>
        </div>
        
       
    </div><!-- End Caption --> 
</div>

          <?php $k = $j + 1;


          if ($k % 3 == 0) { ?>
            <div class="clr pt15"></div>
          <?php } ?>

          <?php
          $j++;
				}
      }
    } else
      echo "<h2 class=" . 'orange' . ">No Result Found</h2>";
    ?>

  </div>

  <div class="clr pt15"></div>


