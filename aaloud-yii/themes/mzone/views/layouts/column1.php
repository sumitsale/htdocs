<?php
Yii::app()->clientScript->registerScript('search', "

		$('.search-button').click(function(){
			$('.search-form').toggle();
			return false;
		});
		$('.search-form form').submit(function(){
			$.fn.yiiGridView.update('tbl-banner-location-master-grid', {
				data: $(this).serialize()
			});
			return false;
		});

");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
 <title>Artist Aloud | Artist listing</title>

 <?php //if (page_id=="home"){ ?>
 
 <?php //Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );?>
 
 <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/home.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.jscrollpane.css" rel="stylesheet" media="all" type="text/css" />
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/menu/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" id="wpmega-basic-css"  href="<?php echo Yii::app()->theme->baseUrl; ?>/css/menu/basic.css" type="text/css" media="all" />
<link rel="stylesheet" id="wpmega-grey-white-css"  href="<?php echo Yii::app()->theme->baseUrl; ?>/css/menu/greywhite.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/popup.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/buttons.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/carousel.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jplayer.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/slide.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style-slide.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/spotlight.css" type="text/css" />

 <?php //} ?>

 	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.6.4.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/cufon-yui.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/Molengo_400.font.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mousewheel.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jscrollpane.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/supersubs.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.simplemodal.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.hoverIntent.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jcarousel.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.accordion.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.lazyload.mini.js"></script>
	 <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.filestyle.js" type="text/javascript"></script>
	
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/slide.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jplayer.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jplayer.playlist.min.js" type="text/javascript"></script>
	
   <script type="text/javascript">
	$(document).ready(function() {
		$(".trigger").click(function(){
		
		$(".panel-l").slideUp();
		$(".panel").slideToggle("slow");
		});
		
		$(".trigger-l").click(function(){
		
		$(".panel").slideUp();
		$(".panel-l").slideToggle("slow");
		});
		
	});
	
	$("img").lazyload({ effect : "fadeIn" });
	
	</script>
	
      <script type="text/javascript">
        /*Call back for Custom font*/
		Cufon.replace('h2.page-title-block');
		Cufon.replace('h3.sub-page-title-block');
		Cufon.replace('h3.art_title');
		Cufon.replace('h2.artist-title-block');
		Cufon.replace('.font-mole');
		
		jQuery(document).ready(function() {
			jQuery('.artist-carousel, .artist-wp-carousel, .artist-ag-carousel').jcarousel({
        easing: 'BounceEaseOut',
        animation: 1000,
		scroll: 1
    		});
		});
		
		 $(function()
        {
            $('.scroll-pane-art-playlist, .scroll-pane-vid-playlist').jScrollPane();
        });
    </script>
    
    
    
	<script type="text/javascript">
		var wpmegasettings = {};
		wpmegasettings.noconflict = false;		
	</script>
	
	<!-- Google Analytics Tracking by Google Analyticator 6.1.1: http://ronaldheft.com/code/analyticator/ -->
	<script type="text/javascript">
	var analyticsFileTypes = [''];
	var analyticsEventTracking = 'enabled';
    </script>
    
     
     <script type="text/javascript">
			jQuery(function ($) {
			// Load dialog on page load
			//$('#basic-modal-content').modal();

			// Load dialog on click
			$('#basic-modal-signup .basic-signup').click(function (e) {
				$('#basic-modal-content-signup').modal();
		
				return false;
			});
						
			// Load dialog on click
			$('#basic-modal-login .basic').click(function (e) {
				$('#basic-modal-content-login').modal({
					minHeight:300,
					minWidth: 300
				});
		
				return false;
			});

		});
				
		$(document).ready(function(){
				/*$('.img-block').hover(function(){
					$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:500, easing:'easeOutBounce'});
				}, function() {
					$(".cover", this).stop().animate({top:'200px'},{queue:false,duration:500, easing:'easeOutBounce'});
				});*/
				var imgover = function(){
					$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:500, easing:'easeOutBounce'});
				}
        $(document).delegate(".img-block", "mouseover", imgover);
				$(document).delegate('.img-block .frame_close', 'click', function(){
					var parent= $(this).parent().parent().parent();
					$(parent).stop().animate({top:'200px'},{queue:false,duration:500, easing:'easeOutBounce'});
          $(document).undelegate(".img-block", "mouseover", imgover);
					setTimeout( function(){
            $(document).delegate(".img-block", "mouseover", imgover);
					}, 500 );
					return false;
				});
				
			});




jQuery.easing['BounceEaseOut'] = function(p, t, b, c, d) {
	if ((t/=d) < (1/2.75)) {
		return c*(7.5625*t*t) + b;
	} else if (t < (2/2.75)) {
		return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
	} else if (t < (2.5/2.75)) {
		return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
	} else {
		return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
	}
};
		
    </script>
	<script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/js/wpmegamenu.devdeae.js'></script>
	<script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/js/hoverIntentdeae.js'></script>
	<style>
		#megaMenu{
		/*margin-top:501px;*/
		width:645px;
		float:left;
		
		}
		/*#megaMenu ul .ss-nav-menu-reg > ul.sub-menu,
		#megaMenu ul .ss-nav-menu-mega ul.sub-menu-1{
			top: auto !important;
			bottom:100% !important;
		}*/
    </style>

	
	<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook', social_tools:false});
				$(".gallery-wp:first a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook', social_tools:false});
		
				
			});
			
			$(document).ready(function() {
				/*Code for assigning dynamic width to the Playlist on the top.*/
				var a = 991;
				var b= a-300;
				$('.frame-slider').css('width',b+'px');
				$('.top_img').css('width',b+'px');
			});
			
			$(window).resize(function() {
				/*Code for assigning dynamic width to the Playlist on the top.*/
				var a = 991;
				var b= a-300;
				$('.frame-slider').css('width',b+'px');
				$('.top_img').css('width',b+'px');
			});
			
			jQuery(document).ready(function() {
			jQuery('#list').jcarousel({
        animation: 500,
		scroll: 3
    		});
		});
			
			</script>
            
 <script type='text/javascript'>
			jQuery().ready(function(){
				jQuery('#list1b').accordion({
					active: false,
					alwaysOpen: false,
					autoheight: false
				});
				var accordions = jQuery('#list1b');
			});
			</script>
			
			<script type='text/javascript'>
					$(document).ready(function(){
					$("input[type=file]").filestyle({ 
					image: "<?php echo Yii::app()->theme->baseUrl; ?>/images/choose.jpg",
					imageheight : 22,
					imagewidth : 76,
					width : 200
					});
				});
			</script>
			
            <!--[if IE 9]>
            <script type='text/javascript' src='js/ie9-in.js'></script>
            <![endif]-->
            <!--[if IE 8]>
            <script type='text/javascript' src='js/ie8-in.js'></script>
            <![endif]-->
            <!--[if IE 7]>
            <script type='text/javascript' src='js/ie7-in.js'></script>
            <![endif]-->
           <style>
#jp_container_2 {
	width: 300px;
	text-align:left;
}
#jp_container_2 div.jp-current-time, #jp_container_2 div.jp-duration {
	font-size:0.8em
}
#jp_container_2 div.jp-title ul, #jp_container_2 div.jp-playlist ul {
	font-size:1em;
}
#jp_container_2 div.jp-playlist {
	overflow:auto;
	height:115px;
	width:288px;
}
#jp_container_2 div.jp-interface {
	background: url(<?php echo Yii::app()->theme->baseUrl; ?>/images/aplayer-bg.png) no-repeat;
}
a.jp-mute:hover {
	background-position:-22px -170px;
}
a.jp-volume-max:hover {
	background-position:-22px -186px;
}
</style>
<script type="text/javascript">
		//<![CDATA[
		$(document).ready(function(){
			new jPlayerPlaylist({
				jPlayer: "#jquery_jplayer_2",
				cssSelectorAncestor: "#jp_container_2"
			}, [
				{
					title:"Cro Magnon Man",
					mp3:"http://www.jplayer.org/audio/mp3/TSP-01-Cro_magnon_man.mp3",
					oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg"
				},
				{
					title:"Your Face",
					mp3:"http://www.jplayer.org/audio/mp3/TSP-05-Your_face.mp3",
					oga:"http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg"
				},
				{
					title:"Cyber Sonnet",
					mp3:"http://www.jplayer.org/audio/mp3/TSP-07-Cybersonnet.mp3",
					oga:"http://www.jplayer.org/audio/ogg/TSP-07-Cybersonnet.ogg"
				},
				{
					title:"Tempered Song",
					mp3:"http://www.jplayer.org/audio/mp3/Miaow-01-Tempered-song.mp3",
					oga:"http://www.jplayer.org/audio/ogg/Miaow-01-Tempered-song.ogg"
				},
				{
					title:"Hidden",
					mp3:"http://www.jplayer.org/audio/mp3/Miaow-02-Hidden.mp3",
					oga:"http://www.jplayer.org/audio/ogg/Miaow-02-Hidden.ogg"
				},
				{
					title:"Lentement",
					mp3:"http://www.jplayer.org/audio/mp3/Miaow-03-Lentement.mp3",
					oga:"http://www.jplayer.org/audio/ogg/Miaow-03-Lentement.ogg"
				},
				{
					title:"Tempered Song",
					mp3:"http://www.jplayer.org/audio/mp3/Miaow-01-Tempered-song.mp3",
					oga:"http://www.jplayer.org/audio/ogg/Miaow-01-Tempered-song.ogg"
				}
			], {
				swfPath: "js",
				supplied: "oga, mp3",
				wmode: "window",
				size: {
					width: "290px"
				}
			});
		});
		//]]>
	</script>
	<!--Jplayer-->
 
</head>

<body>



<div id="outer">
  <!--<div id="top">hello This is reserved for top panel</div>-->
  <div id="inner">
   
   <div class="header-wrap">
   		<div class="header">
        <!-- Panel -->
    		<?php //include 'toppanel-in.php'; ?>    
			
			
<div id="toppanel-in">
  <div id="panel">
    <div class="frame-slider">
      <div class="song-history">
        <div class="fl hist-title font-mole">Songs history - Songs you have heard</div>
        <div class="fr clear-hist font-mole"><a href="#" class="orange">Clear Histroy</a></div>
      </div>
      <div class="hist-slider">
        <div class="top_img">
          <ul id="list">
            <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Brian Colaco</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im7.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Yaron Jashan manao</div>
                </div>
               </a>
            </li>
            <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Kailash Kher</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im8.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Flying</div>
                </div>
               </a>
            </li>
            <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Brian Colaco</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im9.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Udana hai</div>
                </div>
               </a>
            </li>
            <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Brian Colaco</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im6.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Come Holy Spirit</div>
                </div>
               </a>
            </li>
         	<li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Brian Colaco</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im7.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Yaron Jashan manao</div>
                </div>
               </a>
            </li>
            <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Kailash Kher</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im8.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Flying</div>
                </div>
               </a>
            </li>
            <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Brian Colaco</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im9.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Udana hai</div>
                </div>
               </a>
            </li>
            <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Brian Colaco</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im6.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Come Holy Spirit</div>
                </div>
               </a>
            </li>
            <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Brian Colaco</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im7.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Yaron Jashan manao</div>
                </div>
               </a>
            </li>
            <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Kailash Kher</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/mages/scroller_top/im8.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Flying</div>
                </div>
               </a>
            </li>
            <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Brian Colaco</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im9.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Udana hai</div>
                </div>
               </a>
            </li>
            <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Brian Colaco</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im6.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Come Holy Spirit</div>
                </div>
               </a>
            </li>
            <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Brian Colaco</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im7.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Yaron Jashan manao</div>
                </div>
               </a>
            </li>
            <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Kailash Kher</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im8.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Flying</div>
                </div>
               </a>
            </li>
            <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Brian Colaco</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im9.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Udana hai</div>
                </div>
               </a>
            </li>
            <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Brian Colaco</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im6.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Come Holy Spirit</div>
                </div>
               </a>
            </li>
            
          </ul>
        </div>
      </div>
    </div>
    <div class="up-image-in">
      <div class="track-info-wrap">
        <div class="track-info pad5">
          <div class="track-info-thumb bg-purple pt5 pl5 fl"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/wp1.gif" alt="" /></div>
          <div class="track-info-album fr">
            <div class="art-name font-mole">Kailash Kher</div>
            <div class="song-name font-mole">"Yaron Jashan Manao"</div>
            <div class="fb-share mt5 mb5"> <img src="images/temp/fblike.gif" alt="" /></div>
            <div class="song-links artistt-foncol2 font-mole"><a href="#">buy</a> . <a href="#">share</a> . <a href="#">info</a></div>
          </div>
          <div class="clr"></div>
        </div>
        <div class="rev-exp"><strong>Song review</strong> : Ten artists Four countries one cause.Raghu Dixit is one voice, one Ten artists Four countries one cause one voice. <a href="#" class="orange"><strong>Read More</strong></a></div>
      </div>
    </div>
  </div>
  <!-- The tab on top -->
  <div class="tab">
    <div class="up-image-in">
      <!--<img src="images/temp/player.png" alt="">-->
      <div id="jquery_jplayer_2" class="jp-jplayer"></div>
      <div id="jp_container_2" class="jp-audio">
        <div class="jp-type-playlist">
          <div class="jp-gui jp-interface">
            <ul class="jp-controls">
              <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
              <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
            </ul>
            <div class="jp-progress">
              <div class="jp-seek-bar">
                <div class="jp-play-bar"></div>
              </div>
            </div>
            <!--  <img src="images/btn_sep.gif" alt="" />-->
            <div class="jp-volume-bar">
              <div class="jp-volume-bar-value"></div>
            </div>
            <div class="jp-time-holder">
              <div class="jp-current-time"></div>
            </div>
            <div class="jp-speaker">
              <ul class="jp-controls-speaker">
                <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
              </ul>
            </div>
            <div class="more_btn">
              <!--<a href="#"><img src="images/more_btn.gif" alt="" />  </a>    -->
              <ul class="login">
                <li id="toggle"> <a id="open" class="open" href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/more_btn.gif" alt="" /></a> <a id="close" style="display: none;" class="close" href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/less_btn.gif" alt="" /></a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / top -->
</div>		
			
			
			
    	<!-- Panel -->
        	<div class="logo-in"><a href="#"></a></div>
        	<!--<div class="rt-player"><img src="images/temp/player.png" alt=""></div>-->
            <div class="banner"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/banner.jpg" alt="fb" /></div>
        </div>
   </div>
   </div>
   </div>   
   
   <div id="navigation">
     
	 
	 
	 
	 
	 


<div class="menuwrap">

<div id="megaMenu" class="megaMenuContainer megaMenu-nojs wpmega-preset-grey-white megaMenuHorizontal megaMenuOnHover wpmega-withjs wpmega-noconflict">
<ul id="menu-ubermenu-demo" class="megaMenu">
     <li id="menu-item-183" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-1 ss-nav-menu-item-depth-0 ss-nav-menu-reg"><a href="#"><span class="wpmega-link-title">Hi Samanta (My cart 7)</span></a>
     <ul class="sub-menu sub-menu-1">
     
        <li id="menu-item-186" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><a href="#"><span class="wpmega-link-title">Profile</span></a></li>
          <li id="menu-item-188" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><a href="#"><span class="wpmega-link-title">Purchased</span></a></li>
          <li id="menu-item-189" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><a href="#"><span class="wpmega-link-title">Settings</span></a></li>
   <li class="detailsa mycart pl5"><a href="#">Logout</a></li>      
	 </ul>

    </li>
	 
	 <li id="menu-item-48" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-2 ss-nav-menu-item-depth-0 ss-nav-menu-mega"><?php echo CHtml::link('Artists', CController::createUrl("artist/index")); ?> 
      <ul class="sub-menu sub-menu-1">
        <li id="menu-item-61" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1" style="border-right: 1px solid #DDDDDD;"><span class="wpmega-link-title">New Artists</span>
          <ul class="sub-menu sub-menu-2">
		  
		  <?php 		
		
							$newartist=Yii::app()->db2->createCommand()
							->select('ta.ARTIST_NAME,ta.ARTIST_ID')
							->from('TBL_ARTISTS ta')
							->join('TBL_ARTIST_ROLE_MAP tarm','ta.ARTIST_ID=tarm.ARTIST_ID')
							->join('TBL_CNT_ART_ROLE_MAP tcarm','tarm.ARTIST_ROLE_MAP_ID=tcarm.ARTIST_ROLE_MAP_ID')
							->join('TBL_CONTENT_RELEASE_DATES tcr','tcarm.CONTENT_ID=tcr.CONTENT_ID')
							->order(' tcr.RELEASE_DATE desc')
							->queryAll();
					
						?>
		  <?php for($i=0;$i<5;$i++)
						{ ?>
		  <li id="menu-item-62" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><span>
	<?php echo CHtml::link('' . $newartist[$i]['ARTIST_NAME'], CController::createUrl("artist/artistdetail/name/"), array('class' => 'wpmega-link-title')); ?>
	</span></li>
			<?php
						} ?>
			
			<!--
            <li id="menu-item-63" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Zedde</span></a></li>
            <li id="menu-item-64" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Uvie</span></a></li>
            <li id="menu-item-65" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Shibani Kashyap</span></a></li>
            <li id="menu-item-66" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Raghu Dixit</span></a></li>
			-->
         
            <li class="detailsa pt10 pl5"><?php echo CHtml::link('All Artist', CController::createUrl("artist/index")); ?></li>
			
         </ul> </li>
         
         <div style="border:1px solid #dddddd; height:180px; float:left;"></div>
     
       
        
        <li id="menu-item-49" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1">
				<span class="wpmega-link-title">Popular Artists</span>
       <ul class="sub-menu sub-menu-2">
					<?php 
					$popularartist = simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/' . "popular-artists.xml");
					for ($i = 0; $i < 5; $i++) 
					{ ?>
            <li id="menu-item-50" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2">
							<span class="wpmega-link-title">
								<?php echo CHtml::link('' . $popularartist->artist[$i]->artistName, CController::createUrl("artist/artistdetail/name/"), array('class' => 'wpmega-link-title')); ?>
							</span>
						</li>						
					<?php
					} ?>
           
						<li class="detailsa pt10 pl5"><?php echo CHtml::link('More', CController::createUrl("artist/popularartist")); ?></li>
					</ul>
        </li>

        <div style="border:1px solid #dddddd; height:180px; float:left;"></div>
        
        
        <li id="menu-item-85" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1">
				<span class="wpmega-link-title">Languages</span>
         <ul class="sub-menu sub-menu-2">
					<?php 
					 $toplang = Yii::app()->db2->createCommand()
					 ->select('*')
					 ->from('TBL_LANGUAGES')
					 ->queryAll();
					
					for ($i = 0; $i < 5; $i++) 
					{ ?>
            <li id="menu-item-50" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2">
							<span class="wpmega-link-title">
								<?php echo CHtml::link('' . $toplang[$i]['LANGUAGE_TITLE'], CController::createUrl("artist/languagedir?id=" . $toplang[$i]['LANGUAGE_ID']), array('class' => 'wpmega-link-title')); ?>
							</span>
						</li>						
					<?php
					} ?>
           
						<li class="detailsa pt10 pl5"><?php echo CHtml::link('All Languages', CController::createUrl("artist/language")); ?></li>
					</ul>
        </li>
        
        
        <div style="border:1px solid #dddddd; height:180px; float:left;"></div>
        
        
        <li id="menu-item-73" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1" style="border-right:none;"><span class="wpmega-link-title">Alphabetical</span>
        	<div class="clr"></div>
        	<div style="width:280px;">
					
            	  <?php echo CHtml::link(A, array('artist/directory', 'char' => A )); ?>
				<?php echo CHtml::link(B, array('artist/directory', 'char' => B )); ?>
				<?php echo CHtml::link(C, array('artist/directory', 'char' => C )); ?>
				<?php echo CHtml::link(D, array('artist/directory', 'char' => D )); ?>
				<?php echo CHtml::link(E, array('artist/directory', 'char' => E )); ?>
				<?php echo CHtml::link(F, array('artist/directory', 'char' => F )); ?>
				<?php echo CHtml::link(G, array('artist/directory', 'char' => G )); ?>
				<?php echo CHtml::link(H, array('artist/directory', 'char' => H )); ?>
				<?php echo CHtml::link(I, array('artist/directory', 'char' => I )); ?>
			    <?php echo CHtml::link(J, array('artist/directory', 'char' => J )); ?>
			    <?php echo CHtml::link(K, array('artist/directory', 'char' => K )); ?>
           		<?php echo CHtml::link(L, array('artist/directory', 'char' => L )); ?>
				<?php echo CHtml::link(M, array('artist/directory', 'char' => M )); ?>
				<?php echo CHtml::link(N, array('artist/directory', 'char' => N )); ?>
				<?php echo CHtml::link(O, array('artist/directory', 'char' => O )); ?>
				<?php echo CHtml::link(P, array('artist/directory', 'char' => P )); ?>
				<?php echo CHtml::link(Q, array('artist/directory', 'char' => Q )); ?>
				<?php echo CHtml::link(R, array('artist/directory', 'char' => R )); ?>
				<?php echo CHtml::link(S, array('artist/directory', 'char' => S )); ?>
				<?php echo CHtml::link(T, array('artist/directory', 'char' => T )); ?>
				<?php echo CHtml::link(U, array('artist/directory', 'char' => U )); ?>
			    <?php echo CHtml::link(V, array('artist/directory', 'char' => V )); ?>
			    <?php echo CHtml::link(W, array('artist/directory', 'char' => W )); ?>
           		<?php echo CHtml::link(X, array('artist/directory', 'char' => X )); ?>
				<?php echo CHtml::link(Y, array('artist/directory', 'char' => Y )); ?>
           		<?php echo CHtml::link(Z, array('artist/directory', 'char' => Z )); ?>
				
             </div>
             <div class="clr ht15"></div>
              <span class="wpmega-link-title" >Genres</span>
            <div class="clr"></div>
           <div style="width:280px; padding:0 0 19px 0;">
					 <?php
              $topgenre = Yii::app()->db2->createCommand()
                ->select('*')
                ->from('TBL_GENRES')
                ->queryAll();
                        for ($i = 0; $i < count($topgenre); $i++) 
												{ 
													echo CHtml::link('' . $topgenre[$i]['GENRE_NAME'], CController::createUrl("artist/genresdir?id=" . $topgenre[$i]['GENRE_ID']), array('class' => 'wpmega-link-title')); 
												} ?>	

            </div>
                <ul class="sub-menu sub-menu-2">
                	<li class="detailsa pt10 pl5"><?php echo CHtml::link('All Genres', CController::createUrl("artist/genres")); ?></li>
           		</ul> 
               </li>
               
             
               
        </ul>
        
   <li id="menu-item-48" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-2 ss-nav-menu-item-depth-0 ss-nav-menu-mega"><?php echo CHtml::link('Videos', CController::createUrl("videos/index")); ?> 
      <ul class="sub-menu sub-menu-1">
        <li id="menu-item-61" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title">New Videos</span>
          <ul class="sub-menu sub-menu-2">
            <?php
                                                                                                                                                                                                                                        $video = Yii::app()->db2->createCommand()
																																									 ->select('crd.CONTENT_ID,cd.CONTENT_TITLE')
																																									->from('TBL_CONTENTS c')
																																									->join('tbl_content_release_dates crd','c.CONTENT_ID=crd.CONTENT_ID')
																																									->join('tbl_content_details cd','c.CONTENT_ID=cd.CONTENT_ID')
																																									->where(array('in','c.CONTENT_TYPE_ID',array(22,53)))
																																									->order('crd.RELEASE_DATE desc')
																																									 ->queryAll();
																																																																																																																				?>

                                                                                                                                                                                                                                        <?php for ($i = 0; $i < 5; $i++) { ?>

                                                                                                                                                               <li id="menu-item-62" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><span><?php echo CHtml::link('' .$video[$i]['CONTENT_TITLE'], CController::createUrl("videos/index/"), array('class' => 'wpmega-link-title')); ?></span></li>
																																																																																																																					<?php } ?>

                                                                                                                                                               <li class="detailsa pt10 pl5"><?php echo CHtml::link('All Video', CController::createUrl("videos/index")); ?></li>
		  </ul>
        </li>
        
        <div style="border:1px solid #dddddd; height:180px; float:left;"></div>
				
				<?php  $popularvideo = simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/' . "popular-videos.xml"); ?>
        
        <li id="menu-item-49" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title">Popular Videos</span>
          <ul class="sub-menu sub-menu-2">
             <?php
                                                                                                                                                                                                                                        for ($i = 0; $i < 5; $i++)
																																																																																																																				{
                                                                                                                                                                                                                                        ?>


                                                                                                                                                                 <li id="menu-item-50" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><span>


																		<?php echo CHtml::link('' . $popularvideo->video[$i]->videoName, CController::createUrl("videos/index/"), array('class' => 'wpmega-link-title')); ?></span></li>
                                                                                                                                                                                                                                   <?php } ?>

                                                                                                                                                                                                        <li class="detailsa pt10 pl5"><?php echo CHtml::link('More', CController::createUrl("videos/index")); ?> </li>
		  </ul>
        </li>
        
        <div style="border:1px solid #dddddd; height:180px; float:left;"></div>
        
        
        <li id="menu-item-85" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title">Categories</span>
          <ul class="sub-menu sub-menu-2">
            <li id="menu-item-86" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Interviews</span></a></li>
            <li id="menu-item-87" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Music Videos</span></a></li>
            <li id="menu-item-88" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Live Performance</span></a></li>
            <li id="menu-item-89" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2" ><a href="#"><span class="wpmega-link-title">Special</span></a></li>
        <div style="height:25px; width:50px;"></div>
     <li class="detailsa pt10 pl5" ><a href="#" >All Categories</a></li>         
		 </ul>
        </li>
        
        <div style="border:1px solid #dddddd; height:180px; float:left;"></div>
        
        <li id="menu-item-73" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title">Alphabetical</span>
         <div class="clr"></div>
        	<div style="width:280px;">
																					<?php echo CHtml::link('A', array('videos/directory', 'char' => 'A')); ?>
																					<?php echo CHtml::link('B', array('videos/directory', 'char' => 'B')); ?>
																					<?php echo CHtml::link('C', array('videos/directory', 'char' => 'C')); ?>
																					<?php echo CHtml::link('D', array('videos/directory', 'char' => 'D')); ?>
																					<?php echo CHtml::link('E', array('videos/directory', 'char' => 'E')); ?>
																					<?php echo CHtml::link('F', array('videos/directory', 'char' => 'F')); ?>
																					<?php echo CHtml::link('G', array('videos/directory', 'char' => 'G')); ?>
																					<?php echo CHtml::link('H', array('videos/directory', 'char' => 'H')); ?>
																					<?php echo CHtml::link('I', array('videos/directory', 'char' => 'I')); ?>
																					<?php echo CHtml::link('J', array('videos/directory', 'char' => 'J')); ?>
																					<?php echo CHtml::link('K', array('videos/directory', 'char' => 'K')); ?>
																					<?php echo CHtml::link('L', array('videos/directory', 'char' => 'L')); ?>
																					<?php echo CHtml::link('M', array('videos/directory', 'char' => 'M')); ?>
																					<?php echo CHtml::link('N', array('videos/directory', 'char' => 'N')); ?>
																					<?php echo CHtml::link('O', array('videos/directory', 'char' => 'O')); ?>
																					<?php echo CHtml::link('P', array('videos/directory', 'char' => 'P')); ?>
																					<?php echo CHtml::link('Q', array('videos/directory', 'char' => 'Q')); ?>
																					<?php echo CHtml::link('R', array('videos/directory', 'char' => 'R')); ?>
																					<?php echo CHtml::link('S', array('videos/directory', 'char' => 'S')); ?>
																					<?php echo CHtml::link('T', array('videos/directory', 'char' => 'T')); ?>
																					<?php echo CHtml::link('U', array('videos/directory', 'char' => 'U')); ?>
																					<?php echo CHtml::link('V', array('videos/directory', 'char' => 'V')); ?>
																					<?php echo CHtml::link('W', array('videos/directory', 'char' => 'W')); ?>
																					<?php echo CHtml::link('X', array('videos/directory', 'char' => 'X')); ?>
																					<?php echo CHtml::link('Y', array('videos/directory', 'char' => 'Y')); ?>
																					<?php echo CHtml::link('Z', array('videos/directory', 'char' => 'Z')); ?>
             </div> 
             
            	<div class="clr ht15"></div>
							
							                                                                                                                                                                  <?php
                                                                                                                                                                                     $genre = Yii::app()->db2->createCommand()
                                                                                                                                                                                                    ->select('*')
                                                                                                                                                                                                    ->from('tbl_genres')
                                                                                                                                                                                                    ->queryAll();
                                                                                                                                                                                 ?>
        		
                <span class="wpmega-link-title">Genres</span>
            	<div class="clr"></div>
          		 <div style="width:280px;padding:0 0 19px 0;">
           		  <?php
                                                                                                                                                                                                                                        for ($i = 0; $i < 5; $i++) {
                                                                                                                                                                                                                                            ?>

                                                                                                                                                                                                                                            <?php echo CHtml::link('' . $genre[$i]['GENRE_NAME'], CController::createUrl("videos/genredirectory?id=" . $topgenre[$i]['GENRE_ID']), array('class' => 'wpmega-link-title')); ?>
                                                                                                                                                                                                                                        <?php } ?>
           		</div>
                <ul class="sub-menu sub-menu-2">
                	 <li class="detailsa pt10 pl5"><?php echo CHtml::link('All Genres', CController::createUrl("videos/genrelist")); ?></li>
     		    </ul>
                </li>
                </ul>
  

  
 <li id="menu-item-108" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-4 ss-nav-menu-item-depth-0 ss-nav-menu-mega ss-nav-menu-with-img"><a href="#"><span class="wpmega-link-title">Specials</span></a>
        <ul class="sub-menu sub-menu-1">
          <li id="menu-item-120" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title font-mole">New Callertunes</span>
            <div class="" style="margin-left:10px;"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/menu-thumb.jpg" alt="" /></div>
            <div class="clr ht5"></div>
            <ul class="sub-menu sub-menu-2">
              <li class="detailsa  mycart"><a href="#">All  Specials</a></li>
            </ul>
          </li>
          <div style="border:1px solid #dddddd; height:183px; margin-left:3px; float:left;"></div>
          <li id="menu-item-131" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title font-mole">More Specials</span>
            <ul class="sub-menu sub-menu-2">
              <li id="menu-item-132" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2 "><a href="#"><span class="wpmega-link-title">Firts 1s</span></a></li>
              <li id="menu-item-133" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2 "><a href="#"><span class="wpmega-link-title">Paisa Wasool</span></a></li>
              <li id="menu-item-134" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2 "><a href="http://www.artistaloud.com/seagramsfuelyourtgirf/"><span class="wpmega-link-title">TGIRF</span></a></li>
              <li id="menu-item-136" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2 "><a href="#"><span class="wpmega-link-title">Woman's Day</span></a></li>
              <li id="menu-item-137" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2 "><a href="#"><span class="wpmega-link-title">Rock Your November</span></a></li>
              <li class="detailsa  mycart"><a href="#">All  Specials</a></li>
            </ul>
          </li>
        </ul>
      </li>
		

	
		<li class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-4 ss-nav-menu-item-depth-0 ss-nav-menu-mega ss-nav-menu-with-img"><a href="#"><span class="wpmega-link-title">M-Zone</span></a>    </li>
		
        <div id="basic-modal-signup" class="fl">
			<a href="#" class="basic-signup menu-link">Signup</a>
		</div> 
        <div id="basic-modal-login" class="fl">
			<a href="#" class="basic menu-link">Login</a>
		</div>    
          <div id="" class="fl">
			<?php echo CHtml::link('Upload', CController::createUrl("upload/index"),array('class'=>'basic menu-link')); ?>
		</div> 
  </ul>
  
 
  
  
  
</div>

<div class="connect fl"><a href="#" class="ml5"><img src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/fb.gif" alt="fb" /></a> <a href="#" class="ml5"><img src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/tw.gif" alt="tw" /></a> <a href="#" class="ml5"><img src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/yt.gif" alt="yt" /></a></div>

<div class="fr search">


<input type="text" class="search_text" value="Search..." onclick="if(this.value=='Search...'){this.value=''}" onblur="if(this.value==''){this.value='Search...'}">

</div>


</div>
	 
	 
	 
	 
	 
<?php // this part come from view  ?>	 
	 

   </div>
   <div id="content-in">
   		<div class="content">
        	<div class="content-left fl">
        

<?php /*    	
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->   */ ?>

	<?php echo $content; ?>
               
                </div>
                <div class="bottom-content">
				
            <div class="content-right fr mb10">
             
<div class="side-in mt10">
<img alt="banner" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/300-banner.gif">
</div>

<div class="side-in mt10">
<img alt="banner" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/fb-temp.gif">
</div>
<?php /*
<div class="side-in mt10">
*/ ?>




<div class="side-in mt10">
	<h2 class="mod_title">More artists</h2>
	 <div class=" jcarousel-skin-tango"><div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;"><div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;"><ul class="artist-carousel jcarousel-list jcarousel-list-horizontal" id="more_artists" style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: 0px; width: 604px;">
    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="1"><img width="50" height="50" "="" alt="fb" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/t1.gif"></li>
    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="2"><img width="50" height="50" "="" alt="fb" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/t2.gif"></li>
    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="3"><img width="50" height="50" "="" alt="fb" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/t3.gif"></li>
    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="4"><img width="50" height="50" "="" alt="fb" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/t4.gif"></li>
    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="5"><img width="50" height="50" "="" alt="fb" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/t2.gif"></li>
    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="6"><img width="50" height="50" "="" alt="fb" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/t1.gif"></li>
    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="7"><img width="50" height="50" "="" alt="fb" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/t3.gif"></li>
    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="8"><img width="50" height="50" "="" alt="fb" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/t4.gif"></li>
  </ul></div><div class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal" style="display: block;" disabled="disabled"></div><div class="jcarousel-next jcarousel-next-horizontal" style="display: block;"></div></div></div>
</div>
            </div>
			
			</div>
           
           <div class="clr"></div> 
        </div>
        
   </div>
   
  
 <div id="footer">All rights reserved. Copyrights &copy; 2010 - 2011 Hungama.org</div>
  </div>
 <div class="fnt11" id="bottom">
 	<div class="bottom1">
    ArtistAloud.com : <?php echo CHtml::link('About us', CController::createUrl("aboutus/index"),array('class'=>'grey99')); ?> | <a class="grey99" href="#">Help</a> | <a class="grey99" href="#">Press</a> | <a class="grey99" href="#">Advertising</a> | <?php echo CHtml::link('Feedback', CController::createUrl("feedback/index"),array('class'=>'grey99')); ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    Artists : <a class="grey99" href="#">Press kits</a> | <a class="grey99" href="#">Exclusive</a> | <a class="grey99" href="#">Artist links</a> | <a class="grey99" href="#">Videos</a></div>
 	
    <div class="bottom2">Terms : <a class="grey99" href="#">Conditions of use</a> | <a class="grey99" href="#">Privacy policy</a> | <?php echo CHtml::link('Payment policy ', CController::createUrl("partners/index"),array('class'=>'grey99')); ?> | <?php echo CHtml::link('Disclaimer', CController::createUrl("disclaimer/index"),array('class'=>'grey99')); ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    Connect Aloud : <a class="grey99" href="#">Facebook</a> | <a class="grey99" href="#">Twitter</a> | <a class="grey99" href="#">Youtube</a></div>
 
 </div>
 </div>
 
 
 
 
 
 
 
 
 
 
 <div id="basic-modal-content-login">
		
		
		
		<div class="login-pop">
	<div class="login-header">
		<div class="log_header"><h2 class="pop-title">Log In</h2></div>
    </div>
    <div class="log-content">
   <form action="" method="post">
   <table width="100%" border="0" cellspacing="15" cellpadding="0">
  <tr>
    <td>Email Id</td>
    <td><div><input type="text" name="Email-ID" class="log_input fnt11" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="text" name="password" class="log_input fnt11"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div><a href="#"><span class="next-img">Login</a></span><span class=" password"><a href="#">Forget Password?</a></span></div></td>
  </tr>
</table>
</form>
</div>
</div>
		
		
		
		
		
		
			  <?php //include 'login-popup.php'; ?>	
        </div>
		<!-- preload the images -->
		<div style='display:none'>
			<img src='images/x.png' alt='' />
		</div>
        
        
        
       
						<!-- modal content -->
								<div id="basic-modal-content-signup">
								
								<div class="sign-up">
							<div class="sign-up-header">
								<div class="log_header"><h2 class="pop-title">Sign Up</h2></div>
							</div> 
							<div class="sign-up-content">
							<div class="sign-up-text">
								<p>If you are a Hungama.com Registered User,you can use your existing <br />
								   Login and Password on this site.However do create a Profile Page by <br />
								   going into Settings in My Accounts after logging in.Explore The Unheard!</p>
								<p><strong style="color:#CCC">All fields are compulsory.</strong></p>
							</div>
							<div class="sign-up-form">
							<form action="" method="get">
							<table width="100%" border="0" cellspacing="12" cellpadding="0">
								  <tr>
									<td><label>Are you</label></td>
									<td><input type="radio" name="user" value="artist" checked="checked" />&nbsp; An Artist <input type="radio" name="user" value="listner" /> A Listner</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								  </tr>
								 
								  <tr>
									<td>First Name</td>
									<td><input type="text" name="firstname" class="log_input fnt11"/></td>
									<td>Last Name</td>
									<td><input type="text" name="lastname" class="log_input fnt11"/></td>
								  </tr>
								  
								  <tr>
									<td>Age</td>
									<td><select name="age" class="wd65 log_input fnt11" >
												<option></option>
												<option value="age1">18-25yr</option>
												<option value="age2">25-45yr</option>
												<option value="age3">45-60yr</option>
												<option value="age4">Above 60</option>
										</select></td>
									<td>Gender</td>
									<td><input type="radio" name="gender" value="male" checked="checked"/>Male
										<input type="radio" name="gender" value="female" />Female</td>
								  </tr>
								  <tr>
									<td>City</td>
									<td><input type="text" name="city"class="log_input fnt11" /></td>
									<td>Country</td>
									<td><select name="country" CLASS="log_input wd122 fnt11">
												<option></option>
												<option value="country1">U.E.A</option>
												<option value="country1">INDIA</option>
												<option value="country2">U.S.A</option>
												<option value="country3">U.K</option>
											</select></td>
								  </tr>
								  <tr>
									<td>Email Id</td>
									<td><input type="text" name="email" class="log_input fnt11"/></td>
									<td>Mobile</td>
									<td><input type="text" name="mobile" class="log_input fnt11"/></td>
								  </tr>
								  <tr>
									<td>&nbsp;</td>
									<td><a href="#"><div class="next-img">Next</div></a></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								  </tr>
								</table>
							</form>
							
						</div> 
						</div>
						</div>


								
								
									<?php //include 'singup-pop.php'; ?>		
								</div>
		<!-- preload the images -->
		<div style='display:none'>
			<img src='images/x.png' alt='' />
		</div>
 

 
 
 
 
 
 
 
 
 
 
 
 <!-- page -->

</body>
</html>