
<script type="text/javascript">
$(document).ready(function() {
$("ul#pagination_bottom li a").click(function() { 
		var cur = this.id;
		link(cur);
	
		});
		
		$("ul#pagination_bottom li").first().click(function() {
		var cur = $("#hdn_pag").val();
		link(cur);		
		});
		
		$("ul#pagination_bottom li").last().click(function() {
		var cur = $("#hdn_pag_last").val();
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
			$('ul#pagination_bottom li a').css('background-color', '#666');
			$('#'+cur).css('background-color', '#06C'); 
		var dataString = 'currentPage='+ cur;
										$.ajax({  
															type: "POST",
															async:false,															
															url: "<?php echo CController::createUrl("videos/ajaxPage");  ?>	",  
															data: dataString,															
															success: function(data) {
																if(data){
																$("div#con").html(data);
																}

															}  
														});
		}
		
		var fileURL='';
		var iPath='';
	
		 fileURL="<?php echo urlencode($defaultvideo); ?>";
		 iPath="<?php echo $defaultvideoIpad; ?>";
			
		
playStream(fileURL,iPath);
})

$("div.vid").live("click", function(){
var sid = this.id;
var albumName = $("#"+sid+" #album_name").val();
var videoName = $("#"+sid+" #video_name").val();
var artistName = $("#"+sid+" #artist_name").val();
if(videoName=='')
{
videoName = albumName;
}
var mix;
if(artistName!='')
{
 mix = artistName;
}
if(artistName!='' && videoName!='')
{
mix += ' - ';
}
if(videoName!='')
{
mix += videoName;
}

var videoGenre = $("#"+sid+" #video_genre").val();
var videoPath = $("#"+sid+" #video_path").val();
var ipadpath =  $("#"+sid+" #ipad_path").val();
var videoDesc = $("#"+sid+" #video_description").val();
$("div.desc div h3").html(mix);
$("div.desc div h4").html(videoGenre);
$("div.desc div p").html(videoDesc);
var process = $("#processing").html();
		$("div.main-video #player").html(process);
  playStream(videoPath,ipadpath);


});

</script>

<?php $this->pageTitle ="Popular Videos "." | India Music Videos"." | Music Artist videos - "."ArtistAloud.com"; ?>

<?php Yii::app()->clientScript->registerMetaTag('Get to see the popular videos among the independent music videos only at ArtistAloud.com a premium destination for independent songs and music by independent artists.','description'); ?>
<?php Yii::app()->clientScript->registerMetaTag('popular videos, popular band videos, independent artists videos, independent artists India, upload, upload video, independent music video, music India, independent music India, artists, artists in India, India, music, latest music, new music videos, bands, bands India','keywords'); ?>

<div class="content-left fl">

    <div class="breadcrumb grey99 fnt11">
								<?php echo CHtml::link('Home', CController::createUrl("site/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
								Popular Videos
								</div>

    <div class="page-title mt10">
        <h2 class="page-title-block fl">Popular Videos</h2>
        <div class="share-elements fr">
        <div class="fb-like" data-href="http://www.facebook.com/artistaloud" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false" data-font="tahoma"></div>
        </div>
        <div class="clr"></div>
    </div>


    <div class="top-buttons">

        <div class="buttons">

            <ul class="blue">
                <li><?php echo CHtml::link('<span class="font-mole">Videos</span>', CController::createUrl("videos/index")); ?></li>
								<li><?php echo CHtml::link('<span class="font-mole">Popular videos</span>', CController::createUrl("videos/popularvideos"),array('class'=>'current')); ?></li>
                <li><a class="trigger-l" title="languages"><span class="font-mole">Languages</span></a></li>
								<li><a class="trigger" title="categories" ><span class="font-mole">Genres</span></a></li>
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
								<?php for($i=0;$i<count($genrelist);$i++) { ?>
                   
				   
                        
											<li>
											<?php echo CHtml::link('' . $genrelist[$i]['GENRE_NAME'], $this->createUrl('videos/genredirectory',array(
				  'id' => $genrelist[$i]['GENRE_ID'],'name'=> str_replace(' ','-',$genrelist[$i]['GENRE_NAME'])))); ?>
											</li>
										

										<?php if(($i+1)%8==0) { ?>
								
											 </ul>
											 </div>
											 <div class="panal-list">
											<ul class="each-list">
											
											
											<?php } ?>
								<?php if($i==31) {break;} } ?>
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
                <?php for($i=0;$i<count($langlist);$i++) { ?>
                   
                          <li>
						  
						 <?php echo CHtml::link('' . $langlist[$i]['LANGUAGE_TITLE'], $this->createUrl('videos/langdirectory',array(
				  'id' =>  $langlist[$i]['LANGUAGE_ID'],'name'=> str_replace(' ','-',$langlist[$i]['LANGUAGE_TITLE'])))); ?>
						  </li> 
                    <?php if(($i+1)%8==0) { ?>
			
						 </ul>
						 </div>
						 <div class="panal-list">
						<ul class="each-list">
						<?php } ?>
                  <?php if($i==31) {break;} } ?>
                </div>
            </div>
        </div>



        <?php //include 'button-nav.php'; ?>
    </div>
    <div class="clr"></div>

    <div class="video-list ">
		 <script language="javascript" src="http://cdn.vdopia.com/advertisements/js/ivdopia/ivdopia.js"></script>
            <script language="javascript">
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
          //web:{width:625,height:350,connectURL:connectURL, videoFileURL:"vdopia"+type+"://0|"+videoFile ,apikey:"6507ff7d020d71a340321ccb6df9bf2b",adFormat:"preroll",runtime:100,title:"Orphan",apitest:false,videoPoster:"http://www.pep.ph/images/guide/904fc97c5.jpg", category:"EN",autoplay:true},
					//mobile:{width:625,height:350,videoFileURL:murl,title:"Orphan",videoPoster:"http://i2.vdopia.com/dev/satyam/HTML5/video.png",runtime:100, apikey:"9120d7ef826c62e89e6b554bcfb07f35",title:"Orphan",logo:"http://fs02.androidpit.info/aico/x14/23714.png",Skin:"ArtistAloud"}
          <!--Player for WEB-->
          web:{width:625,height:350,connectURL:connectURL, videoFileURL:"vdopia"+type+"://0|"+videoFile ,apikey:"6507ff7d020d71a340321ccb6df9bf2b",adFormat:"preroll",runtime:100,title:"",apitest:false,videoPoster:"<?php echo Yii::app()->baseUrl . "/themes/aaloud/images/video.png"; ?>", category:"EN",autoplay:true},

          <!--Player for Ipad-->
          mobile:{width:640,height:360,videoFileURL:murl,title:"",videoPoster:"<?php echo Yii::app()->baseUrl . "/themes/aaloud/images/video.png"; ?>",runtime:100, apikey:"9120d7ef826c62e89e6b554bcfb07f35",title:"",logo:"http://fs02.androidpit.info/aico/x14/23714.png",Skin:"ArtistAloud"}
        });
      }
				  //window.addEventListener("load",playStream,false);
				  //window.onload=playStream;
            </script>
		   <div class="main-video">
				<div id="player"></div>
			</div>
        <div class="desc">
            <div>
                <h3 class="singer-name"><?php 
								if(isset($artistName) && $artistName !='')
								{
								echo $artistName;
								}			
								if(isset($artistName) && isset($videoName) && $artistName !='' && $videoName !='')
								{
								echo " - ";
								}	
								
								echo $videoName; ?></h3>
            </div>

            <div>
                <h4 class="genre-name"><?php echo $genre; ?></h4>
            </div>



            <div class="grey99 para">
                <p><?php echo $videoDescription; ?></p>
            </div> 

            <div class="clr"></div>

        </div>
        <div class="page-title mt10">
            <h3 class="sub-page-title-block fl">More Videos:</h3>
            <div class="clr"></div>
        </div>
        <div class="vid-wrapper">

            <?php
						$j=0;
            if (count($result) > 0) {
                for ($i = 0; $i < count($result); $i++) 
								{
                    if (file_exists(Yii::app()->basePath . '/../xml/content/videos/' . "video-" . $result[$i]['content_id'] . ".xml"))
										{
                        $j;

												$videolisting =  simplexml_load_file(Yii::app()->basePath . '/../xml/content/videos/'."video-" . $result[$i]['content_id'] . ".xml");
												//echo "<pre>";
												//print_r($videolisting);exit;
                        ?>

												<?php
												 $videoPath = '';
												  //echo "<pre>";
												  //print_r($videolisting);exit;
												  //var_dump($videolisting->paths->path[0]['type']);echo count($videolisting->paths->path);
												  for ($h = 0; $h < count($videolisting->paths->path); $h++) {

													if ($videolisting->paths->path[$h]->attributes() == 191) {
													  $videoPath =urlencode($videolisting->paths->path[$h]->videopath);
													  break;
													}
												  }
												  $ipadpath = '';
												  $ipath='';
												  //echo count($videolisting->paths->path);exit;

												  for ($l = 0; $l < count($videolisting->paths->path); $l++) {

													if ((integer)$videolisting->paths->path[$l]->attributes() == '32') {
													
													$ipath=str_replace('http://','',$videolisting->paths->path[$l]->videopath);
				
													$ipadpath=str_replace('CONTENT_URL',$ipath,Yii::app()->params['WOWZA_URL']);
													  break;
													}
												  }
												?>
												
                        <div class="vid" id="video_<?php echo $i; ?>">
																		<input type="hidden" id="video_name" value="<?php echo $videolisting->videoName;?>">
																		<input type="hidden" id="album_name" value="<?php echo $videolisting->videodetail->videoAlbum;?>">
																		<input type="hidden" id="video_path" value="<?php echo $videoPath; ?>">
																		<input type="hidden" id="ipad_path" value="<?php echo $ipadpath; ?>">
																		<input type="hidden" id="artist_name" value="<?php echo $videolisting->names->artistName->name[0]; ?>">
																		<input type="hidden" id="video_genre" value="<?php echo $videolisting->genre;?>">
																		<input type="hidden" id="video_description" value="<?php echo $videolisting->videodetail->videoDescription; ?>">
																		
                            <!--<div class="new-button">
                            </div>-->
                            <div class="video">
                                <div style="cursor:pointer;" class="block" href="">
																																<?php 
																$imgpath ='';
																$size = count($videolisting->previews->preview);
																for($p=0;$p<$size;$p++)
																{
																		foreach($videolisting->previews->preview[$p]->attributes() as $a => $b)
																		{
																		 
																		 if($a=='type' && $b=='520')
																		 {
																		 $imgpath = $videolisting->previews->preview[$p]->videoPreview;
																		 
																		 }
																		}
																
																}
															
																if($imgpath != '') { ?>
                                <img src="<?php echo $imgpath;?>" width="130" height="75"  />
																<?php } else { ?>
															
																 <img src="<?php echo  Yii::app()->baseUrl."/themes/aaloud/images/Thumbnails/135x75.jpg"; ?>" width="130" height="75"  />
																<?php } ?>
																</div>
                            </div>
                           <div class="vid-bottom">
                                <div class="play-button" style="cursor:pointer;" href="">
                                    
                                </div>
                                <div class="name-list">
                                    <div class="name fnt11">
                                        <b><?php 
																				$name='';
																				$size=count($videolisting->names->artistName);
																				for($q=0;$q<$size;$q++)
																					{
																						foreach($videolisting->names->artistName[$q]->attributes() as $a => $b)
																							{
																		 
																							if($a=='id' && $b=='31')
																							{
																							$name = $videolisting->names->artistName[$q]->name;
																							}
																							}
																					}
																				
																					if($name != '')
																					{ 
																						if(strlen($name)>18)
																						{
																						$artname = substr($name,0,16);
																						$artname.="..";
																						}
																						else
																						{
																						$artname = $name;
																						}
																					echo $artname;
																					}
																				?></b>
                                    </div>
																		
                                    <div class="song fnt11 grey99" style="cursor:pointer;">
                                        <?php
																					$str = $videolisting->videoName;
																							if(strlen($str)>20)
																							{
																							$str = substr($videolisting->videoName,0,18);
																							$str.="..";
																							}
																							else
																							{
																							$str = $videolisting->videoName;
																							}
																				
																				echo $str;
																				?>
                                    </div>
                                </div>
                            </div>
                        </div>

            <?php $k = $j + 1;


            if ($k % 4 == 0) { ?>
                            <div class="clr"></div>
                        <?php } ?>

                        <?php $j++;
                    }
                }
            } else
                echo "<h2 class=" . 'orange' . ">No Result Found</h2>"; ?>



        </div>                      

        <?php //include 'video-list.php';  ?>
        <div class="clr"></div>
    </div>

		<!--
    <div class="bottom-pagination mt10">

        <ul id="pagination_bottom">
            <li><<</li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
            <li><a href="" style="background-color:#06C">&nbsp;&nbsp;&nbsp;</a></li>
            <li>of</li>
            <li><a href="">23</a></li>
            <li>>></li>
        </ul>
				

        <?php //include 'bottom-paginate.php';  ?>
    </div>
-->

</div>