<div class="content-left fl">

    <div class="breadcrumb grey99 fnt11"> Breadcrumbs here.</div>

    <div class="page-title mt10">
        <h2 class="page-title-block fl">Artists</h2>
        <div class="share-elements fr">
        <div class="fb-like" data-href="http://www.facebook.com/artistaloud" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false" data-font="tahoma"></div>
        </div>
        <div class="clr"></div>
    </div>

    <div class="top-pagination mb10">
        <ul id="pagination">

            <?php echo CHtml::link('A', array('artist/directory', 'char' => 'A')); ?>
            <?php echo CHtml::link('B', array('artist/directory', 'char' => 'B')); ?>
            <?php echo CHtml::link('C', array('artist/directory', 'char' => 'C')); ?>
            <?php echo CHtml::link('D', array('artist/directory', 'char' => 'D')); ?>
            <?php echo CHtml::link('E', array('artist/directory', 'char' => 'E')); ?>
            <?php echo CHtml::link('F', array('artist/directory', 'char' => 'F')); ?>
            <?php echo CHtml::link('G', array('artist/directory', 'char' => 'G')); ?>
            <?php echo CHtml::link('H', array('artist/directory', 'char' => 'H')); ?>
            <?php echo CHtml::link('I', array('artist/directory', 'char' => 'I')); ?>
            <?php echo CHtml::link('J', array('artist/directory', 'char' => 'J')); ?>
            <?php echo CHtml::link('K', array('artist/directory', 'char' => 'K')); ?>
            <?php echo CHtml::link('L', array('artist/directory', 'char' => 'L')); ?>
            <?php echo CHtml::link('M', array('artist/directory', 'char' => 'M')); ?>
            <?php echo CHtml::link('N', array('artist/directory', 'char' => 'N')); ?>
            <?php echo CHtml::link('O', array('artist/directory', 'char' => 'O')); ?>
            <?php echo CHtml::link('P', array('artist/directory', 'char' => 'P')); ?>
            <?php echo CHtml::link('Q', array('artist/directory', 'char' => 'Q')); ?>
            <?php echo CHtml::link('R', array('artist/directory', 'char' => 'R')); ?>
            <?php echo CHtml::link('S', array('artist/directory', 'char' => 'S')); ?>
            <?php echo CHtml::link('T', array('artist/directory', 'char' => 'T')); ?>
            <?php echo CHtml::link('U', array('artist/directory', 'char' => 'U')); ?>
            <?php echo CHtml::link('V', array('artist/directory', 'char' => 'V')); ?>
            <?php echo CHtml::link('W', array('artist/directory', 'char' => 'W')); ?>
            <?php echo CHtml::link('X', array('artist/directory', 'char' => 'X')); ?>
            <?php echo CHtml::link('Y', array('artist/directory', 'char' => 'Y')); ?>
            <?php echo CHtml::link('Z', array('artist/directory', 'char' => 'Z')); ?>
        </ul>
    </div>
    <div class="clr"></div>
    <div class="top-buttons">
        <div class="buttons">

          <ul class="blue">
			<li>
		<?php echo CHtml::link('<span class="font-mole">Artists</span>', CController::createUrl("artist/index"),array('class'=>'current')); ?>
		</li>
	
		<li>
		<?php echo CHtml::link('<span class="font-mole">Popular artists</span>', CController::createUrl("artist/popularartist")); ?>
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
          for ($i = 0; $i < 32; $i++) {
            ?>
           

              <li><a href="javascript: void(0)">
                  <?php echo CHtml::link('' . $genrelist[$i]['GENRE_NAME'], CController::createUrl("artist/genresdir/id/" . $genrelist[$i]['GENRE_ID'])); ?>
                </a>
              </li>
            <?php if(($i+1)%8==0) {?>
			
			 </ul>
			 </div>
			 <div class="panal-list">
			<ul class="each-list">
			<?php } ?>
          <?php } ?>
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
                  <?php echo CHtml::link('' . $langlist[$i]['LANGUAGE_TITLE'], CController::createUrl("artist/languagedir/id/" . $langlist[$i]['LANGUAGE_ID'])); ?>
                </a></li>   
           

			<?php if(($i+1)%8==0) {?>
			
			 </ul>
			 </div>
			 <div class="panal-list">
			<ul class="each-list">
			<?php } ?>
          <?php } ?>

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

    
    <div class="section-title"><?php echo $char; ?></div>
    <div class="clr"></div>
    <div class="artist-list mt10 pt10">

        <?php
        if (count($result) > 0) {
            for ($i = 0; $i < count($result); $i++) {



                if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $result[$i]['ARTIST_ID'] . ".xml")) {
                    $j;


                    $artistfile = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $result[$i]['ARTIST_ID'] . ".xml");
                    ?>


                    <div class="img-block fl">
                        	
							<div>
							  <a href="javascript: void(0)" rel="web" title="<?php echo $artistfile->artistName; ?>">
							  
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
                                    <h3 class="art_title"><?php echo $artistfile->artistName; ?></h3>
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
									
									
									
									
                                    <span class="fnt11 grey99">Genre: <?php echo substr($genrename,0,16);?>  <br>
									Language: <?php echo  substr($languagename,0,16); ?></span>
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
					<?php  if(strlen($songlist[$r]['songPath'])!='') { ?>
					<a href="javascript:;" url="<?php echo $songlist[$r]['songPath']; ?>" value="" file_id="<?php echo $songlist[$r]['fileId']; ?>" artist_id="<?php echo $artistfile->artistId; ?>" content_id="<?php echo $songlist[$r]['contentId']; ?>" class="play fl mt4">&nbsp;</a>
					 <?php } ?>
					<span class="song-title pl5 grey99">
                        <?php
                        $str = $songlist[$r]['songName'];
                        if (strlen($str) > 15) {
                          $str = substr($songlist[$r]['songName'], 0, 15);
                          $str.="...";
                        } else {
                          $str = $songlist[$r]['songName'];
                        }

                        echo $str . "&nbsp";
                        ?>
                      </span>
                    </div>
					
					<?php } ?>
										
                                    </div>
                                    <div class="artist_more fl">
									
						<?php echo CHtml::link('' . MORE, CController::createUrl("artist/artistdetail/id/".$artistfile->artistId),
						array('class' => 'orange')); ?>
					
                                    </div>
                     <!-- <div class="artist_more fl"><a class="orange" href="<?php //echo Yii::app()->baseUrl;  ?>/artist/artistdetail">More</a></div>
                                    -->
                                    <div class="fr"> <img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/like.gif"></div>
                                </span>
                            </div>


                        </div><!-- End Caption --> 
                    </div>

            <?php $k = $j + 1;


            if ($k % 3 == 0) { ?>
                        <div class="clr pt15"></div>
                    <?php } ?>

                    <?php $j++;
                }
            }
        } else
            echo "<h2 class=" . orange . ">No Result Found</h2>"; ?>

    </div>

    <div class="clr pt15"></div>
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


</div>