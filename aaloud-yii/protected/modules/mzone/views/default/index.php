<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>M-Zone - Artist Aloud</title>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.jscrollpane.css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/prettyPhoto.css" type="text/css" media="screen" title="" charset="utf-8" />

<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jplayer.css" type="text/css" media="screen" title="" charset="utf-8" />

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/DIN_Medium_500.font.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/organictabs.jquery.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mousewheel.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jscrollpane.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jwplayer.js" type="text/javascript" ></script>
<!--<script src="js/jquery.jplayer.min.js" type="text/javascript">-->
 <script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook', social_tools:false, autoplay_slideshow: false, wmode: 'opaque'});
				$(".preetyPhotoA").prettyPhoto({theme:'facebook', social_tools:false, autoplay_slideshow: false, wmode: 'opaque'});
			});
			</script>
<script type="text/javascript">
        /*Call back for Custom font*/
		Cufon.replace('.font-dinmed');
		/*Tabs call out*/
		 $(function() {
            $("#playlist, #playlist-1").organicTabs({
                "speed": 300
            });
        });
		/*Scroll pane*/
		$(function()
			{
				$('.scroll-pane-after, .scroll-pane-after-1, .scroll-pane-after-2').jScrollPane(
					{
						verticalDragMinHeight: 20,
						verticalDragMaxHeight: 20,
						horizontalDragMinWidth: 20,
						horizontalDragMaxWidth: 20,
						showArrows: true,
						autoReinitialise: true,
						verticalArrowPositions: 'after',
						horizontalArrowPositions: 'after'
					}
				);
			});
</script>
<script type="text/javascript">
$(document).ready(function() {
  //Get all the LI from the #tabMenu UL
  $('#tabMenu li').click(function(){
    //perform the actions when it's not selected
    if (!$(this).hasClass('selected')) {    
	    //remove the selected class from all LI    
	    $('#tabMenu li').removeClass('selected');
	    //Reassign the LI
	    $(this).addClass('selected');
	    //Hide all the DIV in .boxBody
	    $('.boxBody div.parent').slideUp('1500');
	    //Look for the right DIV in boxBody according to the Navigation UL index, therefore, the arrangement is very important.
	    $('.boxBody div.parent:eq(' + $('#tabMenu > li').index(this) + ')').slideDown('1500');
	 }
  });
	//Mouseover effect for Posts, Comments, Famous Posts and Random Posts menu list.
  $('#.boxBody li').click(function(){
    window.location = $(this).children().attr('href');
  });
});
</script>
</head>

<body>
<div id="container">
  <!--Left sidebar-->
  <div id="sidebar1" class="FL">
    <div class="logo"> <a href="#"></a> </div>
    <div class="sign-up MT30">
      <div class="FL MT7 ML20 gallery"><span class="font-dinmed"><a href="#login" rel="prettyPhoto[inline]" title="login">login</a></span> <span class="whfff">|</span> <span class="font-dinmed"><a href="#register" rel="prettyPhoto[inline]" title="sign up">Sign up</a></span>		
      </div>
      <div class="FR MT7 MR10"><span class="font-dinmed"><a href="<?php echo Yii::app()->baseUrl; ?>/index.php">artistaloud.com</a></span></div>
    </div>
    
    <div class="sidebar1-in MT30">
      <div class="side1-top"></div>
      <div class="side1-mid">
        <div class="search-wrap">
          <input class="search-input" type="text"  value="Search M-zone..." onClick="if(this.value=='Search M-zone...'){this.value=''}" onBlur="if(this.value==''){this.value='Search M-zone...'}" />
        </div>
        <div class="tabs">
          
          
          <div id="playlist">
            <ul class="nav">
              <li class="nav-one"><a href="#featured2" class="current"><span class="">popular</span></a></li>
              <li class="nav-two"><a href="#core2"><span class="">latest</span></a></li>
            </ul>
            <div class="list-wrap scroll-pane-after">
              <ul id="featured2">
                
								
								<?php
									for($i=0;$i<count($topsongxml);$i++)
									{
								?>
                  		<li class="even">
											<div class="thumb-50 FL">
											<?php if(strlen($topsongxml->song[$i]->preview)!=0){?>
											<img src="<?php echo $topsongxml->song[$i]->preview; ?>" alt="" title="thumb" />
											<?php } else { ?>
											<img src="<?php echo Yii::app()->baseUrl."/themes/aaloud/images/Thumbnails/50x50.jpg"; ?>" alt="" title="thumb" />
											<?php } ?>
											</div>
                        
                       <div class=" w160 FL"> 
                        <div class="FL ML3"><a class="play FL" href="<?php echo $topsongxml->song[$i]->mp3; ?>">&nbsp;</a></div>
                        <div class="FL ML3 fnt12"><a href="#" class="bold"><?php 
												
												
												$str = $topsongxml->song[$i]->title;
												if(strlen($str)>12)
												{
												$str = substr($topsongxml->song[$i]->title,0,10);
												$str.="..";
												}
												else
												{
												$str = $topsongxml->song[$i]->title;
												}
												
												echo $str; ?></a> <div class="CL"></div><span>by <?php 
												
												$str1 = $topsongxml->song[$i]->artistName;
												if(strlen($str1)>12)
												{
												$str1 = substr($topsongxml->song[$i]->artistName,0,10);
												$str1.="..";
												}
												else
												{
												$str1 = $topsongxml->song[$i]->artistName;
												}
												
												
												echo $str1; ?></span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                 
                        </div>
                        
                       </div>
                        
                        <div class="CL"></div>
                      </li>
									<?php } ?>

              </ul>
              <ul id="core2" class="hide">
               
                	    <li class="even"><div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>
                        
                       <div class=" w160 FL"> 
                        <div class="FL ML3"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML3 fnt12"><a href="#" class="bold">Aag hi aag</a> <div class="CL"></div><span>by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                        
                       </div>
                        
                        <div class="CL"></div>
                        </li>
                        
                         <li class="odd"><div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>
                        
                       <div class=" w160 FL"> 
                        <div class="FL ML3"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML3 fnt12"><a href="#" class="bold">Aag hi aag</a> <div class="CL"></div><span>by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                        
                       </div>
                        
                        <div class="CL"></div>
                        </li>
                        
                        <li class="even"><div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>
                        
                       <div class=" w160 FL"> 
                        <div class="FL ML3"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML3 fnt12"><a href="#" class="bold">Aag hi aag</a> <div class="CL"></div><span>by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                        
                       </div>
                        
                        <div class="CL"></div>
                        </li>
                        
                         <li class="odd"><div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>
                        
                       <div class=" w160 FL"> 
                        <div class="FL ML3"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML3 fnt12"><a href="#" class="bold">Aag hi aag</a> <div class="CL"></div><span>by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                        
                       </div>
                        
                        <div class="CL"></div>
                        </li>
                        
                        <li class="even"><div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>
                        
                       <div class=" w160 FL"> 
                        <div class="FL ML3"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML3 fnt12"><a href="#" class="bold">Aag hi aag</a> <div class="CL"></div><span>by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                        
                       </div>
                        
                        <div class="CL"></div>
                        </li>
                         <li class="odd"><div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>
                        
                       <div class=" w160 FL"> 
                        <div class="FL ML3"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML3 fnt12"><a href="#" class="bold">Aag hi aag</a> <div class="CL"></div><span>by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                        
                       </div>
                        
                        <div class="CL"></div>
                        </li>
                        
                        <li class="even"><div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>
                        
                       <div class=" w160 FL"> 
                        <div class="FL ML3"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML3 fnt12"><a href="#" class="bold">Aag hi aag</a> <div class="CL"></div><span>by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                        
                       </div>
                        
                        <div class="CL"></div>
                        </li>
                        
                         <li class="odd"><div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>
                        
                       <div class=" w160 FL"> 
                        <div class="FL ML3"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML3 fnt12"><a href="#" class="bold">Aag hi aag</a> <div class="CL"></div><span>by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                        
                       </div>
                        
                        <div class="CL"></div>
                        </li>
                        
                        <li class="even"><div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>
                        
                       <div class=" w160 FL"> 
                        <div class="FL ML3"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML3 fnt12"><a href="#" class="bold">Aag hi aag</a> <div class="CL"></div><span>by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                        
                       </div>
                        
                        <div class="CL"></div>
                        </li>
                        
                         <li class="odd"><div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>
                        
                       <div class=" w160 FL"> 
                        <div class="FL ML3"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML3 fnt12"><a href="#" class="bold">Aag hi aag</a> <div class="CL"></div><span>by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                        
                       </div>
                        
                        <div class="CL"></div>
                        </li>
                        
                        <li class="even"><div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>
                        
                       <div class=" w160 FL"> 
                        <div class="FL ML3"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML3 fnt12"><a href="#" class="bold">Aag hi aag</a> <div class="CL"></div><span>by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                        
                       </div>
                        
                        <div class="CL"></div>
                        </li>
                        
                        <li class="odd"><div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>
                        
                       <div class=" w160 FL"> 
                        <div class="FL ML3"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML3 fnt12"><a href="#" class="bold">Aag hi aag</a> <div class="CL"></div><span>by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                        
                       </div>
                        
                        <div class="CL"></div>
                        </li>
                        
                        <li class="even"><div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>
                        
                       <div class=" w160 FL"> 
                        <div class="FL ML3"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML3 fnt12"><a href="#" class="bold">Aag hi aag</a> <div class="CL"></div><span>by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                        
                       </div>
                        
                        <div class="CL"></div>
                        </li>
                        
                
              </ul>
            </div>
            <!-- END List Wrap -->
          </div>
          
          
        </div>
      </div>
      <div class="side1-bot"></div>
    </div>
  </div>
  <!--Left sidebar-->
  <div class="content-wrap FR">
    <!--Mid container-->
    <div id="mainContent" class="FL">
      	<div class="player-bg">
        	<script type="text/javascript">
			$(document).ready(function() {
			 /* $("#jpId").jPlayer( {
				ready: function () {
				  $(this).jPlayer("setMedia", {
					mp3: "audio/kailasa.mp3" // Defines the mp3 url
				  });
				}
			  });*/
			  
			  
			  $("#jquery_jplayer_1").jPlayer({
		ready: function (event) {
			$(this).jPlayer("setMedia", {
				mp3: "http://localhost.localdomain/artistaloud/m-zone/audio/kailasa.mp3" // Defines the mp3 url
			});
		},
		swfPath: "../m-zone/js",
		supplied: "mp3",
		wmode: "window"
	});

			  
			  
			}); </script>
        	<div id="jquery_jplayer_1" class="jp-jplayer"></div>
            
            <div id="jp_container_1" class="jp-audio">

			<div class="jp-type-single">

				<div class="jp-gui jp-interface">

					<ul class="jp-controls">
						<li><a href="javascript:;" class="jp-next" tabindex="1">back</a></li>
						
						<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>

						<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>

						<li><a href="javascript:;" class="jp-next" tabindex="1">stop</a></li>

						<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>

						<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>

						<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>

					</ul>

					<div class="jp-progress">

						<div class="jp-seek-bar">

							<div class="jp-play-bar"></div>



						</div>

					</div>

					<div class="jp-volume-bar">

						<div class="jp-volume-bar-value"></div>

					</div>

					<!--<div class="jp-current-time"></div>

					<div class="jp-duration"></div>-->

					

				</div>

			</div>

		</div>

        </div>
      	<div class="tabs-bg MT20">

            <div id="playlist-1">
            <ul class="nav">
              <li class="nav-one"><a href="#featured2" class="current"><span class=""></span></a></li>
              <li class="nav-two"><a href="#core2"><span class=""></span></a></li>
               <li class="nav-three"><a href="#core3"><span class=""></span></a></li>
            </ul>
            <div class="list-wrap">
             <div>
              <div id="featured2">
                
                  	<div class="padlr20">
                    <div class="div1">
                    		<div class="thumb FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb.jpg" alt="thumb" title="Shefali" /></div>
                            <div class="desc FR">
                            	<h2 class="track-title">Could this be love</h2><span class="art-name FL">by Shefali Alvares</span>
                                <div class="CL"></div>
                                <div class="share">
                                	<div class="FL">FB like</div><div class="FR">Other sharing</div>
                                    <div class="CL"></div>
                                </div>
                            	<div class="review MT5"><span class="bold">Review:</span> The song is little more than light, frothy pop, but that may be exactly what you need today when dreaming about the summer and a few m... <a href="#" class="pink bold">Read More</a>
                            	</div>
                            </div>
                    	</div>
                        
                        <div class="CL"></div>
                        <div class="div2">
                        	<div class="MT10">
                                <!--<img src="images/data/video.jpg" alt="thumb" title="Shefali" />-->
                                <div id="video">Loading video</div> 
								
												<script type='text/javascript'>
                                          jwplayer('video').setup({
                                            'flashplayer': '<?php echo Yii::app()->theme->baseUrl; ?>/swf/player.swf',
                                            'file': '<?php echo Yii::app()->theme->baseUrl; ?>/video/video.mp4',
                                            'controlbar': 'bottom',
                                            'width': '404',
                                            'height': '213',
																						'autostart': 'true'
                                          });
                        </script>
                          </div>
                        </div>
                         <div class="CL"></div>
                        <div class="div3">
                        	<div class="MT20">
                                <h3 class="title-youmay">You may also like :</h3>
                                <div class="wrap-list">
                                    <div class="scroll-pane-after-2">
                                        <ul>
                                            <li>
                                            <a class="pause FL" href="#">&nbsp;</a><div class="FL ML5 MT3 bold">Yaaron jashn manao</div><div class="FL MT3 ML5">by Kailash Kher</div>
                                            <div class="FL MT3 ML5"><span class="font-dinmed links-gen">
                                            	<a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-gen"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-gen"><a class="pink" href="#">Info</a></span>
                                                </div>
                                            
                                           	</li>
                                            <li>
                                            <a class="plus FL" href="#">&nbsp;</a><div class="FL ML5 MT3 bold">Yaaron jashn manao</div><div class="FL MT3 ML5">by Kailash Kher</div>
                                            <div class="FL MT3 ML5"><span class="font-dinmed links-gen"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-gen"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-gen"><a class="pink" href="#">Info</a></span>
                                            </div>
                                            
                                           	</li>
                                             <li>
                                            <a class="minus FL" href="#">&nbsp;</a><div class="FL ML5 MT3 bold">Yaaron jashn manao</div><div class="FL MT3 ML5">by Kailash Kher</div>
                                           
                                            <div class="FL MT3 ML5"><span class="font-dinmed links-gen"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-gen"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-gen"><a class="pink" href="#">Info</a></span>
                                            </div>
                                        
                                           	</li>
                                             <li>
                                            <a class="play FL" href="#">&nbsp;</a><div class="FL ML5 MT3 bold">Yaaron jashn manao</div><div class="FL MT3 ML5">by Kailash Kher</div>

                                            <div class="FL MT3 ML5"><span class="font-dinmed links-gen"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-gen"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-gen"><a class="pink" href="#">Info</a></span>
                                            </div>
                                            
                                           	</li>
                                             <li>
                                            <a class="play FL" href="#">&nbsp;</a><div class="FL ML5 MT3 bold">Yaaron jashn manao</div><div class="FL MT3 ML5">by Kailash Kher</div>

                                            <div class="FL MT3 ML5"><span class="font-dinmed links-gen"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-gen"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-gen"><a class="pink" href="#">Info</a></span>
                                            </div>
                                            
                                           	</li>
                                             <li>
                                            <a class="play FL" href="#">&nbsp;</a><div class="FL ML5 MT3 bold">Yaaron jashn manao</div><div class="FL MT3 ML5">by Kailash Kher</div>

                                            <div class="FL MT3 ML5"><span class="font-dinmed links-gen"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-gen"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-gen"><a class="pink" href="#">Info</a></span>
                                            </div>
                                            
                                           	</li>
                                           
                                        </ul>
                                    </div>
                                </div>
                          </div>
                        </div> 
                    </div>
              </div>
              </div>
              
              <!--Tab2-->
                <div>
              <div id="core2" class="hide">
         
                    <div class="PL20 PR10">
                    
                    
                    
                    <div class="scroll-pane-after-1">
                    <ul>
                        <li class="odd"><div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>
                        <div class="padtb10 w330 FL"> 
                        <div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        	<div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>                        
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                        <li class="even">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                        <li class="odd">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                       
                        <li class="even">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                         <li class="odd">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                         <li class="even">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                         <li class="odd">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                          <li class="even">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                          <li class="odd">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                          <li class="even">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                          <li class="odd">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                          <li class="even">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                      </ul>
                    </div>
                    </div>
                        

                    </div>
                        
                
              </div>
              
              
              <!-- Tab 3-->
              
              <div>
              <div id="core3" class="hide">
         
				<div class="PL20 PR10">
                    <div class="scroll-pane-after-1">
                    <ul>
                        <li class="odd"><div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>
                        <div class="padtb10 w330 FL"> 
                        <div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        	<div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>                        
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                        <li class="even">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                        <li class="odd">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                       
                        <li class="even">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                         <li class="odd">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                         <li class="even">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                         <li class="odd">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                          <li class="even">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                          <li class="odd">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                          <li class="even">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                          <li class="odd">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                          <li class="even">
                        <div class="thumb-50 FL"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/data/thumb50x50.gif" alt="" title="thumb" /></div>                        
                       <div class="padtb10 w330 FL">
                       	<div class="FL ML5"><a class="play FL" href="#">&nbsp;</a></div>
                        <div class="FL ML5 fnt12"><a href="#" class="bold">Aag hi aag</a> <span class="ML5">by Pralay</span>
                        <div class="CL"></div>
                        <span class="font-dinmed links-playlist"><a href="#" class="pink">Buy</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Share</a></span> . <span class="font-dinmed links-playlist"><a class="pink" href="#">Info</a></span>
                        </div>
                        <div class="FR"><a class="plus FR preetyPhotoA" href="#addtopl">&nbsp;</a>
                       </div>
                        <div class="CL"></div>
                        </li>
                        
                      </ul>
                    </div>
                    </div>
                    
                        

                    </div>
                        
                
              </div>
              
            </div>
            <!-- END List Wrap -->
          </div>
            
            
            
            
            
            
            
        <div class="tab-bottom"></div>
        
        
        </div>
      
      
    </div>
    <!--Mid container-->
    <!--Right sidebar-->
    <div id="sidebar2" class="FR"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/banner.png" alt="banner" /> </div>
    <!--Right sidebar-->
    <div class="CL"></div>
    <!--Bottom section-->
    
	<div class="bottom-section MT20">
    	<div class="bot-sect-top"> 	<div class="bot-sect-title"><span class="font-dinmed">Find Music</span></div></div>
        <div class="bot-sect-mid">
       		<div class="bot-mod-bg FL">
            	<div class="bot-mod">
                	<div class="title font-dinmed">Alphabetically</div>
                    
                    <div id="letters" class="MT7">
                        <ul>
                            <li><a title="A" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/A" class="letter_A"><span class="first"><span>A</span></span></a></li>
                            <li><a title="B" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/B" class="letter_B"><span class="first"><span>B</span></span></a></li>
                            <li><a title="C" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/C" class="letter_C"><span class="first"><span>C</span></span></a></li>
                            <li><a title="D" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/D" class="letter_D"><span class="first"><span>D</span></span></a></li>
                            <li><a title="E" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/E" class="letter_E"><span class="first"><span>E</span></span></a></li>
                            <li><a title="F" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/F" class="letter_F"><span class="first"><span>F</span></span></a></li>
                            <li><a title="G" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/G" class="letter_G"><span class="first"><span>G</span></span></a></li>        
                            <li><a title="H" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/H" class="letter_H"><span class="first"><span>H</span></span></a></li>
                            <li><a title="I" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/I" class="letter_I"><span class="first"><span>I</span></span></a></li>
                            <li><a title="J" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/J" class="letter_J"><span class="first"><span>J</span></span></a></li>
                            <li><a title="K" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/K" class="letter_K"><span class="first"><span>K</span></span></a></li>
                            <li><a title="L" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/L" class="letter_L"><span class="first"><span>L</span></span></a></li>
                            <li><a title="M" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/M" class="letter_M"><span class="first"><span>M</span></span></a></li>
                            <li><a title="N" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/N" class="letter_N"><span class="first"><span>N</span></span></a></li>
                            <li><a title="O" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/O" class="letter_O"><span class="first"><span>O</span></span></a></li>
                            <li><a title="P" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/P" class="letter_P"><span class="first"><span>P</span></span></a></li>
                            <li><a title="Q" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/Q" class="letter_Q"><span class="first"><span>Q</span></span></a></li>
                            <li><a title="R" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/R" class="letter_R"><span class="first"><span>R</span></span></a></li>
                            <li><a title="S" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/S" class="letter_S"><span class="first"><span>S</span></span></a></li>
                            <li><a title="T" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/T" class="letter_T"><span class="first"><span>T</span></span></a></li>
                            <li><a title="U" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/U" class="letter_U"><span class="first"><span>U</span></span></a></li>
                            <li><a title="V" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/V" class="letter_V"><span class="first"><span>V</span></span></a></li>
                            <li><a title="W" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/W" class="letter_W"><span class="first"><span>W</span></span></a></li>
                            <li><a title="X" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/X" class="letter_X"><span class="first"><span>X</span></span></a></li>
                            <li><a title="Y" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/Y" class="letter_Y"><span class="first"><span>Y</span></span></a></li>
                            <li><a title="Z" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/directory/char/Z" class="letter_Z"><span class="first"><span>Z</span></span></a></li>
                        </ul>
										</div>	
                    
               </div>
          </div>
            <div class="bot-mod-bg FL">
                <div class="bot-mod">
                   <div class="title font-dinmed">genres</div>
                     <div id="generes" class="MT7">
										 
                        <ul>    
														<?php for ($i = 0; $i < 5; $i++) { ?> 												
                            <li><a title="A" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/genresdir?id=<?php echo $genre[$i]['GENRE_ID']; ?>" class="letter_A"><span class="first"><span><?php echo $genre[$i]['GENRE_NAME']; ?></span></span></a></li>
														<?php } ?> 
                        </ul>
											
										 </div>	
                </div>
            </div>
            <div class="bot-mod-bg FL">
            	<div class="bot-mod">
                	<div class="title font-dinmed">languages</div>
                    <div id="generes" class="MT7">
                        <ul>  
														<?php for ($i = 0; $i < 5; $i++) { ?>												
                            <li><a title="A" href="<?php echo Yii::app()->baseUrl; ?>/index.php/artist/languagedir?id=<?php echo $lang[$i]['LANGUAGE_ID']; ?>" class="letter_A"><span class="first"><span><?php echo $lang[$i]['LANGUAGE_TITLE']; ?></span></span></a></li>
                            <?php } ?> 
                           
                        </ul>
                        
                       
			
            
			<div id="login" style="display:none;">
				<h2 class="font-dinmed">Login form</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
            
      <div id="register" style="display:none;">
				<h2 class="font-dinmed">Register</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
            
      <div id="addtopl" style="display:none;">
				<h2 class="font-dinmed">add to playlist</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
           
                        
									 </div>	
                </div>
            </div>
            <div class="CL"></div>
        </div>
        <div class="bot-sect-bot"></div>
   </div>
    
    <!--Bottom section-->
    
    <div class="subscribe-section MT30">
    	<div class="FL sub-lable font-dinmed">subscribe to updates</div>
    	<div class="FR"><input class="sub-input" type="text" value="Enter your mail id" onClick="if(this.value=='Enter your mail id'){this.value=''}" onBlur="if(this.value==''){this.value='Enter your mail id'}" /></div>
    </div>
    
    
  </div>
  <div class="CL"></div>
</div>
<div id="footer">
  <div class=" footer-container">
  	<a href="#">Conditions of Use</a> <span class="whfff">|</span> <a href="#">Privacy Policy</a> <span class="whfff">|</span> <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/partners/index">Payment Partners</a>  <span class="whfff">|</span> <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/disclaimer/index">Disclaimer</a> <span class="whfff">|</span> <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/feedback/index">Feedback</a>
  	
  </div>
</div>
</body>
</html>
