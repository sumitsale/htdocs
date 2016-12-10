<div class="content-art" style="background-image:url(<?php echo "http://" . $_SERVER['HTTP_HOST'] .  Yii::app()->baseUrl; ?>/images/artist/<?php echo $artistTheme[0]['Artist_Id'];?>/<?php echo $artistTheme[0]['Artist_Bgimage'];?>); background-color: <?php echo $artistTheme[0]['Artist_Bgcolor'];?>;">



<script type="text/javascript">

  $(document).ready(function() {
    $('#processing').hide();
    if($('#pplay').val()>0){

	var fileURL='';
	var iPath='';
	 fileURL="<?php echo urlencode($defaultvideo); ?>";
	 iPath="<?php echo $defaultvideoIpad; ?>";
      playStream(fileURL,iPath);
    }
  })
  var playVideo = function(sid){
    var videoPath = $("#"+sid+" #video_path").val();
	var ipadPath = $("#"+sid+" #ipad_path").val();
    var process = $("#processing").html();
    $("div#play #player").html(process);
    playStream(videoPath,ipadPath);
  }
  $(".playVideo").live('click', function(){
    var currentVideo = $(this).parent().parent().parent().parent();
    playVideo(currentVideo.attr('id'));
    return false;
  });
  $(".playVideoIcon").live('click', function(){
    var currentVideo = $(this).parent().parent();
    playVideo(currentVideo.attr('id'));
    return false;
  });
  /*$("div.pad5").live("click", function(){
    var sid = this.id;
    var videoPath = $("#"+sid+" #video_path").val();
    var process = $("#processing").html();
    $("div#play").html(process);
    playStream(videoPath);
    return false;
  });*/
  
  /*$(document).ready(function(){
    /**
     * The code to play the song on click on the play button
     */
    /*$(".artistDetailsPlayList a.play").live('click', function(){
      var songUrl = $(this).attr('url');
      if(songUrl.length > 0){
        window.myPlayList.remove();
        window.myPlayList.add({
          mp3:songUrl
          //mp3:"<?php echo "http://" . $_SERVER['HTTP_HOST'] . Yii::app()->createUrl('content/song', array('id' => 123)); ?>"
          //mp3:"http://www.jplayer.org/audio/mp3/Miaow-07-Bubble.mp3",
          //oga:"http://www.jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
        });
        $("#jquery_jplayer_2").jPlayer("play");
      
        $(".artistDetailsPlayList a.pause").removeClass('pause').addClass('play');
        $(this).removeClass('play').addClass('pause');
        console.log(window.myPlayList);
        
        addToSongHistory($(this).attr('file_id'), $(this).attr('artist_id'), $(this).attr('content_id'));
      }
      return false;
    });
    
    $(".artistDetailsPlayList a.pause").live('click', function(){
      return false;
    });
  });*/

</script>


<?php  $this->pageTitle = $artistxml->artistName ." | Independent Music" . " | Latest Albums and Wallpapers - " . " ArtistAloud.com";?>
<?php Yii::app()->clientScript->registerMetaTag('Get to know more about '.$artistxml->artistName .' their songs and much more only at ArtistAloud.com a premium destination for independent songs and music by independent artists','description'); ?>
<?php Yii::app()->clientScript->registerMetaTag($artistxml->artistName." , ".$artistxml->artistName ." Music, ".$artistxml->artistName ." Songs, ".$artistxml->artistName ." Videos, ".$artistxml->artistName ." Wallpapers, music albums, mp3 songs, mp3, download mp3 songs, download wallpapers, songs, artist aloud, music albums, artists in india",'keywords'); 

//Yii::app()->clientScript->registerMetaTag('Artist Aloud','og:title', null, array('property'=>'og:title'));
Yii::app()->clientScript->registerMetaTag('actor','og:type', null, array('property'=>'og:type'));
//Yii::app()->clientScript->registerMetaTag('http://www.artistaloud.com/','og:url', null, array('property'=>'og:url'));
Yii::app()->clientScript->registerMetaTag((string)$artistxml->profileimage200->image200[0]->file_path,'og:image', null, array('property'=>'og:image'));
//Yii::app()->clientScript->registerMetaTag('Artist Aloud','og:site_name', null, array('property'=>'og:site_name'));
//Yii::app()->clientScript->registerMetaTag('661511706','fb:admins', null, array('property'=>'fb:admins'));

?>

<div id="processing" >
  <div class="process"></div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#processing').css('top', ($(window).height() / 2) - 50 + 'px');
    $('#processing').css('left', ($(window).width() / 2) - 100 + 'px');
  });
</script>
<div class="breadcrumb grey99 fnt11">
  <?php echo CHtml::link('Home', CController::createUrl("site/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
  <?php echo CHtml::link('Artists', CController::createUrl("artist/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
  <?php echo $artistxml->artistName; ?> 
</div>


<div class="top-content pl15 pt5 mt10 pb10">

<div class="artist-title mt10">
  <h2 class="artist-title-block fl"><?php echo $artistxml->artistName; ?></h2>
  <div class="fl pl30 mt5">
   <iframe src="http://www.facebook.com/plugins/like.php?href=http://<?php echo $_SERVER['HTTP_HOST']. $this->createUrl('artist/artistdetail',array('name'=>str_replace(' ','-',$artistxml->artistName),'id' => $artistxml->artistId)); ?>&amp;send=false&amp;layout=button_count&amp;width=90&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=155750401164061" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
  </div>
  
  
  <div class="clr"></div>
</div>

  <div class="left-top fl">
    <div class="artist-subtitle-genre font-mole fnt13">

      <?php
      $genrename = '';

      for ($z = 0; $z < count($artistxml->genres->genre); $z++) {
        $genrename .= $artistxml->genres->genre[$z]->genreName . ", ";
      }
      $genrename = substr($genrename, 0, -2);

      $languagename = '';
      $pr = 0;
      for ($k = 0; $k < count($artistxml->languages->language); $k++) {
        $languagename .= $artistxml->languages->language[$k]->languageName . ", ";
      }
      $languagename = substr($languagename, 0, -2);

      for ($k = 0; $k < count($artistxml->videos->video); $k++) {
        if ($artistxml->videos->video[$k]->videoName != '') {
          $pr+=1;
        }
      }
      ?>



      Genre: <?php echo $genrename; ?> &nbsp; | &nbsp; Language: <?php echo $languagename; ?>
    </div>

    <div class=" fl pl5">

      <?php if (strlen($artistxml->profileimage200->image200[0]->file_path)!='') { ?>
        <img  src="<?php echo $artistxml->profileimage200->image200[0]->file_path; ?>" />

      <?php } else { ?>
        <img alt="" src="<?php echo Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/200x200.jpg"; ?>" />

      <?php } ?>

    </div>

    <div class=" fl video-detail1">	
      <div class="scroll-pane-art-playlist fl artistDetailsPlayList">
        <?php
				
				$l =0;
        if (count($artistxml->songs->song->songName) > 0) {

          for ($i = 0; $i < count($artistxml->songs->song); $i++) {
            ?>


            <?php

            if ($artistxml->songs->song[$i]->attributes() == 181 and $artistxml->songs->song[$i]->songPath!='') {
              ?>
              <div class="pad5">
                <div>
                  <div class="fl pr5 font-mole fnt14 wd10";><?php echo ++$l; ?></div> 
                  <div>
                    <a href="javascript:;" 
                       url="<?php echo $artistxml->songs->song[$i]->songPath; ?>" 
                       value="" file_id="<?php echo $artistxml->songs->song[$i]->fileId; ?>" 
                       artist_id="<?php echo $artistxml->artistId ; ?>" 
                       content_id="<?php echo $artistxml->songs->song[$i]->contentId; ?>" class="play fl mt4 ml4">
                    </a>
                  </div>
                  <div class="fl pl10 font-mole fnt14">

                    <?php
                    $str = $artistxml->songs->song[$i]->songName;
                    if (strlen($str) > 20) {
                      $str = substr($artistxml->songs->song[$i]->songName, 0, 18);
                      $str.="....";
                    } else {
                      $str = $artistxml->songs->song[$i]->songName;
                    }
                    echo $str;
                    ?>

                  </div>
                  <div class="artistt-foncol2 ">
                         
						 <div class="fr pl10 font-mole fnt13 cap">
					
					 <a href="<?php echo CController::createUrl('artist/songinfo', array('contentid'=>$artistxml->songs->song[$i]->contentId,'fileid'=>$artistxml->songs->song[$i]->fileId)); ?>?ajax=true&width=250&height=100" class="" title="" rel="info[ajax]">
					  <img alt="Info" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/prettyPhoto/dark_square/bg_black.gif" title="" />Info
					 </a>
					 </div>
					 
                   <!-- <div class="fr pl10 font-mole fnt13 cap"><a href="javascript: void(0)">Share</a></div>-->
                    <div class="fr pl10 font-mole fnt13 cap">
										
					<?php	if(Yii::app()->session["H_FULL_NAME"]!=''){ ?>				
						<a href="javascript:;" class="fnt9 w_fff addToCart" 
						content_title="<?php echo $artistxml->songs->song[$i]->songName; ?>" 
						content_id="<?php echo $artistxml->songs->song[$i]->contentId; ?>" 
						content_type_id="1">Buy</a>
						<?php }  else {?>
						<div id="basic-modal-login" class="fl"> <a href="javascript: void(0)" class="fnt9 w_fff basic">Buy</a> </div>
			   <?php } ?>
						
						
                      <!-- <a onclick="addtocart('1025380','1','01','cart01','like01','options01','optshow_1025380_1','optshow_1025380_2','optshow_1025380_2');" class="fnt9 w_fff" href="javascript:void(0);">
                        Buy</a> -->
                    </div></div>
                </div>
                <div class="clr pt5"></div>
              </div>
            <?php } ?>

            <?php
          }
        } else {
          echo "No Songs present.";
        }
        ?>

      </div>
    </div>


    <?php //include 'artist-playlist.php';    ?>
  </div> 
  <div class="right-top fl"> 

    <div class="fl pl20">
      <div class=" mt10">
        <div class="pl20">
          <h3 class="art_title" style=" margin:0px;">Gallery( <?php
    if (strlen($artistxml->images->image[0]->thumbnail) > 0) {
      echo count($artistxml->images->image);
    } else {
      echo "0";
    }
    ?> 

          Pics)</h3>
        </div>


		
		<?php if (strlen($artistxml->images->image->thumbnail)>0) { ?>
        <ul id="more_artists" class="artist-ag-carousel jcarousel-skin-tango-ag gallery">
			
			
          <?php
			$imageCtr = 1;
			$liState = 0;
			foreach($artistxml->images->image as $imageIndex => $artistImage){
				if(($imageCtr % 4) == 1){
					echo "<li><div>";
					$liState = 0;
				}
				?>
						
					
						
						
						
						<div class="fl mr5 mt5">
							 <?php
							  if (strlen($artistImage->thumbnail)>1) {

								if (strlen($artistImage->imagePath)>0) {
								  ?>
								  <a href="<?php echo $artistImage->imagePath; ?>" title="" rel="prettyPhoto">
									<img src="<?php echo $artistImage->thumbnail; ?>" alt="" title="" width="100" height="100" />
								  </a>

								<?php } else { ?>
							   
									<img src="<?php echo $artistImage->thumbnail; ?>" alt="" title="" width="100" height="100" />
								 

								<?php } ?>

							  <?php } else { ?>

								
								  <img src="<?php echo Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/100x100.jpg"; ?>" alt="" title="" width="100" height="100" />
								</a>
							  <?php } ?>
						</div>
						
						
						
						
						
				<?php
				if(($imageCtr % 4) == 0){
					echo "</div></li>";
					$liState = 1;
				}
				$imageCtr++;
			}
			if(($imageCtr - 1) % 4 != 0 && ($liState == 0))
				echo "</div></li>";
		  ?>
			
		
        </ul>
		<?php } else { echo "<div class=\"pl20 mt10\">No data present</div>"; } ?>
		
      </div>
    </div>

    <?php //include 'artist-gallery.php';   ?>
  </div>
  <div class="clr"></div>
</div>



<div class="clr"></div>




<div class="bottom-content">

  <div class="content-left fl">
<?php if(strlen($artistxml->wallpapers->wallpaper->thumbnail)>0) { ?>
    <div class=" mt10">
      <div>
        <h3 class="art_title fl">Mobile Wallpapers</h3>
        <p class="fr">Click on any thumbnail to buy that mobile wallpaper.</p>
      </div>
      <div class="clr"></div>
	  
	  <?php if(strlen($artistxml->wallpapers->wallpaper->thumbnail)>0) { ?>
      <ul id="more_artists" class="artist-wp-carousel jcarousel-skin-tango-wp gallery-wp">
        <?php for ($v = 0; $v < count($artistxml->wallpapers->wallpaper); $v++) { ?>
		


          <?php if (strlen($artistxml->wallpapers->wallpaper[$v]->thumbnail)>1) { ?>
		  
		  <?php if(strlen($artistxml->wallpapers->wallpaper[$v]->wallpaperPath)>1) { ?>

            <li>
			
				<a href="<?php echo $artistxml->wallpapers->wallpaper[$v]->wallpaperPath; ?> title="" rel="prettyPhoto">
                   <img src="<?php echo $artistxml->wallpapers->wallpaper[$v]->thumbnail; ?>" alt="" width="80" height="80" title=""/>
                </a>
			  
            </li>
			
			<?php } else { ?>
			  <li>
			  <?php	if(Yii::app()->session["H_FULL_NAME"]!=''){ ?>	
			  <a href="javascript:;" class="fnt9 w_fff addToCart" 
						content_title="<?php echo $artistxml->artistName; ?>" 
						content_id="<?php echo $artistxml->wallpapers->wallpaper[$v]->contentId; ?>" 
						content_type_id="3">
                   <img src="<?php echo $artistxml->wallpapers->wallpaper[$v]->thumbnail; ?>" alt="" width="80" height="80" title=""/>
              <a>
			  <?php } else { ?>
			  <div id="basic-modal-login" class="fl"> <a href="javascript: void(0)" class="fnt9 w_fff basic">
			  <img src="<?php echo $artistxml->wallpapers->wallpaper[$v]->thumbnail; ?>" alt="" width="80" height="80" title=""/>
			  </a> </div>
			  <?php } ?>
            </li>

			<?php } ?>
          <?php } else { ?>

            <li>
			
			<!--<a href="<?php //echo Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/80x80.jpg"; ?>" title="description" rel="prettyPhoto">-->
                <img src="<?php echo Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/80x80.jpg"; ?>" alt="" width="80" height="80" title=""/>
              </a>
            </li>

          <?php } ?>

        <?php } ?>

      </ul>
	  
	  <?php }  else { echo "No data present"; }  ?>
	  
    </div>
<?php } ?>
    <?php //include 'artist-mobilewallpaper.php';   ?>
    <div class="clr"></div>

	
	<?php if (file_exists(Yii::app()->basePath . '/../xml/content/videos/video-' . $artistxml->videos->video[0]->attributes() . ".xml")) { ?>
	
	 <h3 class="art_title">Artist Videos</h3>
	
    <div class="pt20">

	 <div class="wd305 fl ht200">
	 <div class="fl" id="play">
      <script language="javascript" src="http://cdn.vdopia.com/advertisements/js/ivdopia/ivdopia.js"></script>
      


       <script type="text/javascript">
       
        function VDOPIAPlayBackEventHandler(status)
            {
            if(status=="PREROLL.START"||status=="VIDEO.START"){$("#jquery_jplayer_2").jPlayer("pause");}
            }

       
      function playStream(path,ipadpath){
        //alert("Loading Players");
        var fileURL = '';
        var iPath = '';
        if(path=='') {
          fileURL=" ";
        } else {
          fileURL=path;
        }

        if(ipadpath == '') {
          iPath=" ";
        } else {
          iPath=ipadpath;
        }

        PlayVideo(fileURL,iPath);
        return;
      }
      
      function PlayVideo(url,murl){
      //  alert(url+"<>"+murl);
        fileURL=url;
        var type="vod";
        if(fileURL.indexOf("rtmp")==0)
        {
          if(fileURL.indexOf("/live/")>0)
          {
            var connectURL=fileURL.substring(0,fileURL.lastIndexOf("/live/")+6);
            var videoFile=fileURL.substring((fileURL.lastIndexOf("/live/")+6),fileURL.length);
            type="live";
          }else
          {
            var connectURL=fileURL.substring(0,fileURL.lastIndexOf(":"));
            var videoFile=connectURL.substring((connectURL.lastIndexOf("/")+1),connectURL.length);
            connectURL=connectURL.substring(0,connectURL.lastIndexOf("/"));
            videoFile=videoFile+fileURL.substring(fileURL.lastIndexOf(":"),fileURL.length);
            type="vod";
          }
        }else
        {
          connectURL=null;videoFile=fileURL;
          if(fileURL.indexOf("/live/")>0){type="live";}
        }
        
        VDOPIAPlayer("player",
        {
         
          <!--Player for WEB-->
          web:{width:300,height:183,connectURL:connectURL, videoFileURL:"vdopia"+type+"://0|"+videoFile ,apikey:"045f313790130e8f47f5239306056320",adFormat:"preroll",runtime:100,title:"",apitest:false,videoPoster:"<?php echo Yii::app()->baseUrl . "/themes/aaloud/images/video.png"; ?>", category:"EN",autoplay:false},

          <!--Player for Ipad-->
          mobile:{width:300,height:183,videoFileURL:murl,title:"",videoPoster:"<?php echo Yii::app()->baseUrl . "/themes/aaloud/images/video.png"; ?>",runtime:100, apikey:"9120d7ef826c62e89e6b554bcfb07f35",title:"",logo:"http://fs02.androidpit.info/aico/x14/23714.png",Skin:"ArtistAloud"}
        });
      }
      //window.addEventListener("load",playStream,false);
      //window.onload=playStream;
    </script>

        <div id="player"></div>



      </div>
		</div>

      <div class="wd305 ml15 fl scroll-pane-vid-playlist">	


        <?php
						
				$error = '';
				
        for ($i = 0; $i < count($artistxml->videos->video); $i++) {

          if (file_exists(Yii::app()->basePath . '/../xml/content/videos/video-' . $artistxml->videos->video[$i]->attributes() . ".xml")) {

            $videoxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/video-' . $artistxml->videos->video[$i]->attributes() . ".xml");
			
			$videoPath='';
			$ipath='';
				for($h=0;$h<count($videoxml->paths->path);$h++)
												{
										
													if($videoxml->paths->path[$h]->attributes()==191)
													{
														$videoPath = urlencode($videoxml->paths->path[$h]->videopath);
														break;
													}
												}
												$ipadpath='';
												//echo count($videolisting->paths->path);exit;
												
												for($l=0;$l<count($videoxml->paths->path);$l++)
												{
										
													if((integer)$videoxml->paths->path[$l]->attributes()=='32')
													{
													
													 $ipath=str_replace('http://','',$videoxml->paths->path[$l]->videopath);
				
						                             $ipadpath=str_replace('CONTENT_URL',$ipath,Yii::app()->params['WOWZA_URL']);
														
														break;
													}
												}
            ?>
            <div class="pad5" id="video_<?php echo $i; ?>">
              <input type="hidden" id="video_path" value="<?php echo $videoPath; ?>">
			  <input type="hidden" id="ipad_path" value="<?php echo $ipadpath; ?>">
              <input type="hidden" id="pplay" value="<?php echo $pr; ?>">
              <div class="artist-border pb5">


                <?php
                $imgpath = '';
                $size = count($videoxml->previews->preview);
                for ($p = 0; $p < $size; $p++) {
                  foreach ($videoxml->previews->preview[$p]->attributes() as $a => $b) {

                    if ($a == 'type' && $b == '517') {
                      $imgpath = $videoxml->previews->preview[$p]->videoPreview;
                    }
                  }
                }
                ?>



                <div class="fl  artist-thumb-border playVideoIcon">
                  <?php if (strlen($imgpath) != 0) { ?>
                    <img src="<?php echo $imgpath; ?>">

                  <?php } else { ?>
                    <img src="<?php echo Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/80x50.jpg"; ?>">
                  <?php } ?>
                </div>


                <div class="fl"> 
                  <div class="pl5 artistt-foncol1">
                      <?php
                      $str = $artistxml->videos->video[$i]->videoName;
                      if (strlen($str) > 28) {
                        $str = substr($artistxml->videos->video[$i]->videoName, 0, 26);
                        $str.="....";
                      } else {
                        $str = $artistxml->videos->video[$i]->videoName;
                      }

                      echo $str;
                      ?>
                    </div>

                  <div class="pt5 pl5 artistt-foncol"><a href="">
                      <?php echo substr($videoxml->videodetail->videoAlbum, 0, 22); ?>
                    </a></div>

                  <div class="pt5 pl5 artistt-foncol3">
                    <a href="javascript:;" class="playVideo">
                      <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/bullet_artist.jpg" /> Play
                    </a>
                  </div>
                </div>
                <div class="clr"></div>
              </div>

            </div>

          <?php }
        } ?>

      </div> 
      <div class="clr"></div>
    </div>
	
	
	<?php } ?>
	
	
	
	

    <?php //include 'artist-videoplaylist.php';    ?>
    <div class="clr"></div>
    <div class="artistt-foncol">
      <p><?php echo $artistxml->artistDescription; ?></p>
    </div>


    <div class="artist-comment wd628 ">
      <h2 class="comment-title font-mole">Comments</h2>

	  <?php
				/* code for displaying success msg after login */
					Yii::app()->clientScript->registerScript(
					   'myHideEffect',
					   '$(".flash-success").animate({opacity: 1.0}, 10000).fadeOut("slow");',
					   CClientScript::POS_READY
					);
				?>
				 
				<?php if(Yii::app()->user->hasFlash('success')):?>
					<div class="flash-success font-mole" style="background:#FFFFFF; color:#FF0000; width:99.3%; line-height:25px; padding:5px; font-size:15px;">
						<?php echo Yii::app()->user->getFlash('success'); ?>
					</div>
				<?php endif; 
				/* Code for Success msg ends here */
				?>

      <div class="add-comments pt10">
        <div class="fl pl5"><span>Add Comments:</span></div>
        
        <div class="fl pl15 pb10" style="width:510px;">

          <?php
          $form = $this->beginWidget('CActiveForm', array(
              'id' => 'comment-form',
              'enableClientValidation' =>true,
              'clientOptions' => array(
                  'validateOnSubmit' =>true,
                  'enableAjaxValidation' =>true,
              ),
                  ));
          ?>
          <?php //echo $form->errorSummary($model);   ?>
          <?php echo $form->textArea($model,'comment', array('class' => "art-textbox")); ?>
          <?php echo $form->error($model, 'comment'); ?>
          <br/><br/>
          
          <style>
          a#yw0_button{ clear:right;}
          </style>
		  <?php 
			$error = '';
			if (CCaptcha::checkRequirements()): ?>
            <div class="row " style="width:435px;">
              <?php //echo $form->labelEx($model, 'verifyCode'); ?>
              <div>
                <?php $this->widget('CCaptcha'); ?>
                <div class="CL"></div>
                <div class="hint" style="width:280px; margin-bottom:10px; margin-top:5px;">Are you human?? Yes. Then type the code below.</div>
				 <div style="margin-bottom:10px;"><?php echo $form->textField($model, 'verifyCode'); ?></div>
                
				<?php echo $error; ?>
                 
              </div>
              
 <div class="CL"></div>
            </div>
          <?php endif; ?>
         
            <div class="row ">
			<?php echo CHtml::submitButton('Submit'); ?>
          </div>
          
          <?php $this->endWidget(); ?>
        </div>
        <div class="clr"></div>
        <div class="extra-comments fl ">
          <?php
          $i = 1;
          if (isset($commentArr) && count($commentArr) > 0) {

            foreach ($commentArr as $key => $value) {
              ?>
              <div class="artist-border1">
                <div class="commarrow  fl">
                  <div class="fl"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/FallBack_Artist_50x50.gif"></div>
                  <div class="fl pl5 ">
                    <strong>
                      <?php
                      if ($value['user_id'] == 0)
                        echo "Anonymous";
                      else {
					  
					  
					  $username=Yii::app()->db->createCommand()
										->select('*')
										->from('tbl_user_profile')
										->where('USER_ID=:user_id',array(':user_id'=>$value['user_id']))
										->queryAll();
										
										echo $username[0]['NICK_NAME'];
					  
					  /*
                        if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $value['user_id'] . ".xml")) {
                          $userxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $value['user_id'] . ".xml");
                          echo $userxml->artistName;
                        }
						*/
                      }
                      ?>
                    </strong>
                  </div><br/>
                  <div class="fl pl5 pt10"><?php
                  $time = $value['indate'];
                  $dt = date("jS M", $time);
                  echo $dt . " | " . date("H.i", $time);
                      ?><!--25th Feb | 04.46 --></div><br/>
                </div>
                <div class="fl pt20" style="width:410px;"><?php echo $value['comment']; ?></div>
              </div>
              <div class="clr"></div>
              <?php
              $i++;
            }
          }
          ?>

        </div>

      </div>
    </div>

    <?php //include 'comment.php';  ?>
  </div>

  <?php /*

    </div>
    <div class="clr"></div>
    </div> */ ?>