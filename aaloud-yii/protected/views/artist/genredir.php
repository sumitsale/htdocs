<?php $this->pageTitle =$genre[0]['GENRE_NAME']. " Artists | " .$genre[0]['GENRE_NAME']." Songs"." | Music Genre - "."ArtistAloud.com"; ?>

<?php Yii::app()->clientScript->registerMetaTag("Get all the information on ".$genre[0]['GENRE_NAME']." artists, songs and information and listen to ".$genre[0]['GENRE_NAME']." music only at ArtistAloud.com",'description'); ?>

<?php Yii::app()->clientScript->registerMetaTag($genre[0]['GENRE_NAME']." , ".$genre[0]['GENRE_NAME']." songs, ".$genre[0]['GENRE_NAME']." music, ".$genre[0]['GENRE_NAME']." genre, Indian music, songs, independent artist, bands, artistaloud",'keywords'); ?>

<script type="text/javascript">
$(document).ready(function() {
$('#processing').hide();
var process = $("#processing").html();
$('#1').css('background-color', '#06C'); 
	$("ul#pagination_bottom li").first().hide();
var gen = $("#hdn_genre").val();	
    $("ul#pagination_bottom li a").click(function() { 
		var cur = this.id;
		$("div#con").html('');
		$("div#con").html(process);
		link(cur);
		});
		
		$("ul#pagination_bottom li").first().click(function() {
		var cur = $("#hdn_pag").val();
$("div#con").html('');
		$("div#con").html(process);		
		link(cur);		
		});
		
		$("ul#pagination_bottom li").last().click(function() {
		var cur = $("#hdn_pag_last").val();
$("div#con").html('');
		$("div#con").html(process);		
		link(cur);		
		});
		
		function link(cur)
		{
			$("#hdn_pag").val(cur-1);
			var addnum = Number(cur)+Number(1);
			$("#hdn_pag_last").val(addnum);
			var max = $("#hdn_max").val();
			
			if($("#hdn_pag").val()==0)
			{
			$("ul#pagination_bottom li").first().hide();
			}
			else
			{
			$("ul#pagination_bottom li").first().show();
			}
			
			if(cur==max)
			{
			$("ul#pagination_bottom li").last().hide();
			}
			else
			{
			$("ul#pagination_bottom li").last().show();
			}
			var newValue =gen+"_"+cur;
			$('ul#pagination_bottom li a').css('background-color', '#666');
			 
			var dataString = 'currentPage='+ newValue;
										$.ajax({  
															type: "POST",
															async:false,															
															url: "<?php echo CController::createUrl("artist/ajaxGenre");  ?>	",  
															data: dataString,															
															success: function(data) {
																if(data){
																$("div#con").html(data);
																}

															}  
														});
														$('#'+cur).css('background-color', '#06C');
						Cufon.replace('h2.page-title-block');
						Cufon.replace('h3.sub-page-title-block');
						Cufon.replace('h3.art_title');
						Cufon.replace('h2.artist-title-block');
						Cufon.replace('.font-mole');
		}
})
</script>
		<div id="processing" >
			<div class="process"></div>
		</div>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#processing').css('top', ($(window).height() / 2) - 50 + 'px');
					$('#processing').css('left', ($(window).width() / 2) - 100 + 'px');
				});
			</script>
<div class="content-left fl">
            	
                <div class="breadcrumb grey99 fnt11">
								<?php echo CHtml::link('Home', CController::createUrl("site/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
								<?php echo CHtml::link('Genre Listing', CController::createUrl("artist/genres"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
								<?php echo $genre[0]['GENRE_NAME']; ?> Artists
								</div>
                
                <div class="page-title mt10">
                	<h2 class="page-title-block fl"><?php echo $genre[0]['GENRE_NAME']; ?> Artists</h2>
                   <div class="share-elements fr">
                    <div class="fb-like" data-href="http://www.facebook.com/artistaloud" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false" data-font="tahoma"></div>
                   </div>
                <div class="clr"></div>
                </div>
                
                <div class="top-pagination mb10">
				
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
                <div class="clr"></div>
                <div class="top-buttons">
				
				<div class="buttons">

<ul class="blue">
	 <li>
		<?php echo CHtml::link('<span class="font-mole">Artists</span>', CController::createUrl("artist/index")); ?>
		</li>
	
		<li>
		<?php echo CHtml::link('<span class="font-mole">Popular artists</span>', CController::createUrl("artist/popularartist")); ?>
		</li>
     <li><a class="trigger-l" title="languages"><span class="font-mole">languages</span></a></li>
	 <li><a class="trigger current" title="Generes"><span class="font-mole">genres</span></a></li>
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
                  <?php echo CHtml::link('' . $genrelist[$i]['GENRE_NAME'], CController::createUrl("artist/genresdir/id/" . $genrelist[$i]['GENRE_ID'])); ?>
                </a>
              </li>
            <?php if(($i+1)%8==0) {?>
			
			 </ul>
			 </div>
			 <div class="panal-list">
			<ul class="each-list">
			<?php } ?>
          <?php if($i==31) { break;} } ?>
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
          <?php if($i==31) { break;} } ?>

        </div>

      </div>


    </div>


				
                <?php //include 'button-nav.php'; ?>
                </div>
                <div class="clr"></div>
	<div class="top-buttons">
    	 <div class="buttons font-mole fnt14">
    Click on the images to know more.
        </div>
	</div>
     <div class="clr"></div>

						<?php
						foreach($genre as $row)
						{
					
						?>
				
				<div class="section-title"><?php echo $row['GENRE_NAME']; ?> Artists</div>
				
					<?php } ?>
				
                <div class="clr"></div>
            	
				<div class="artist-list mt10 pt10 ht860" id='con'>
				<?php 
				$j = '';
				
			if($perPage>count($result))
					{
					$loop_count = count($result);
					}
					else
					{
					$loop_count = $perPage;
					}
					if (count($result) > 0) {

      for ($i = 0; $i < $loop_count; $i++) {

					$artistfile =  simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/'."artist-".$result[$i]['ARTIST_ID'].".xml");

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
					<?php  if(isset($songlist[$r]['songPath'])!='') { ?>
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
                <div class="fr"> <!--<img alt="fb" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/fblike.gif">--></div>
                </span>
        </div>
        
       
    </div><!-- End Caption --> 
</div>

<?php $k=$j+1;


if($k%3==0) { ?>
  <div class="clr pt15"></div>
   <?php } ?>

<?php  $j++; }  } else echo "<h2 class=".'orange'.">No Result Found</h2>"; ?>
                 
                </div>
				
								  <div class="clr pt15"></div>
						
								</div>
								 <div class="bottom-pagination mt10">
									 
		<?php 
		
if($totalPage>1)
{
?>
    <ul id="pagination_bottom">
				<input type="hidden" id="hdn_pag" value="0">
		<input type="hidden" id="hdn_pag_last" value="2">
		<input type="hidden" id="hdn_max" value="<?php echo $totalPage; ?>">
		<input type="hidden" id="hdn_genre" value="<?php echo $genreId; ?>">
      <li style="cursor:pointer;">&lt;&lt;</li>
			<?php
			for($i=1;$i<=$totalPage;$i++)
			{
			?>
      <li><a style="cursor:pointer;" id="<?php echo $i; ?>"><?php echo $i; ?></a></li>
     
     	<?php
			}
			?>
      <li style="cursor:pointer;">&gt;&gt;</li>
    </ul>
<?php
}
?>
									</div>