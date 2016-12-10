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

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraph.org/schema/">
<head>
 <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
 <meta name="google-site-verification" content="KAyCovSFj_4o5qRiWi8PeIzSAEaoiRJ-cxDpbSp_UDI" />
  <title><?php echo CHtml::encode($this->pageTitle) ?></title>
  
  <link rel="icon" href="<?php echo Yii::app()->baseUrl; ?>/favicon.ico" type="image/x-icon"> 
  
 <!--
 <title>Artist Aloud | Artist detail</title>
-->
 <?php //if (page_id=="home"){ ?>
 
 <?php 
	/*Included Css*/
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/home.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/style.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/jquery.jscrollpane.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/menu/style.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/popup.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/buttons.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/carousel.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/prettyPhoto.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/jplayer.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/slide.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/style-slide.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/spotlight.css');
	
	/*Included Js*/
 //Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
  Yii::app()->getClientScript()->registerCoreScript( 'jquery' );
  Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/json2.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.cookie.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.jsoncookie.js'); 
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/common.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/cufon-yui.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/Molengo_400.font.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.mousewheel.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.jscrollpane.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/superfish.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/supersubs.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.simplemodal.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.easing.1.3.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.hoverIntent.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.jcarousel.min.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.prettyPhoto.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.accordion.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.lazyload.mini.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.filestyle.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.custom_radio_checkbox.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/slide.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.jplayer.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jplayer.playlist.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/cart.js');
  Yii::app()->clientScript->registerScript(
            'global-vars',
            " 
              var baseUrl = 'http://" . $_SERVER['HTTP_HOST'] .Yii::app()->request->scriptUrl."'; 
			   var themeUrl = 'http://" . $_SERVER['HTTP_HOST'] .Yii::app()->theme->baseUrl."';
            ",
            CClientScript::POS_HEAD
          );
 if(Yii::app()->session["H_FULL_NAME"]!=''){
    Yii::app()->clientScript->registerScript(
            'session-global-vars',
            " 
              var sessionState = true; 
            ",
            CClientScript::POS_HEAD
          );
  }else{
    Yii::app()->clientScript->registerScript(
            'session-global-vars',
            " 
              var sessionState = false; 
            ",
            CClientScript::POS_HEAD
          );
  }
 ?>
 <link rel="stylesheet" id="wpmega-basic-css"  href="<?php echo Yii::app()->theme->baseUrl; ?>/css/menu/basic.css" type="text/css" media="all" />
 <link rel="stylesheet" id="wpmega-grey-white-css"  href="<?php echo Yii::app()->theme->baseUrl; ?>/css/menu/greywhite.css" type="text/css" media="all" />
 
 
	
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
	
		 $(document).ready(function(){
          $(".radio").dgStyle();
          //$(".checkbox").dgStyle();
        });
	
        /*Call back for Custom font*/
		Cufon.replace('h2.page-title-block');
		Cufon.replace('h3.sub-page-title-block');
		Cufon.replace('h3.art_title');
		Cufon.replace('h2.artist-title-block');
		Cufon.replace('.font-mole');
		
		jQuery(document).ready(function() {
			jQuery('.artist-wp-carousel, .artist-ag-carousel').jcarousel({
        easing: 'BounceEaseOut',
        animation: 1000,
		scroll: 1
    		});
			
		jQuery('.artist-carousel').jcarousel({
        easing: 'easeInSine',
        animation: 500,
		auto: 2,
		wrap: 'circular',
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
        		
				// Load dialog when click on m-zone
			$('#basic-modal-mzone .basic-mzone').click(function (e) {
				$('#basic-modal-content-mzone').modal({
					minHeight:200,
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
		/*width:800px;*/
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
				
				
				
				$("area[rel^='prettyPhoto']").prettyPhoto({theme:'facebook', deeplinking: false, social_tools:false});
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook', deeplinking: false, social_tools:false});
				$(".gallery-wp:first a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook', deeplinking: false, social_tools:false});
				
				
				
				
			});
			
			
			 $(document).ready(function(){$("a[rel^='info']").prettyPhoto({theme:'pp_default', social_tools:false, deeplinking: false, modal: true, allow_resize: true, default_width: 250, default_height: 250, slideshow: false, overlay_gallery: false, autoplay_slideshow: false, keyboard_shortcuts: false, show_title: true});
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
					width : 120
					});
				});
	</script>
			

            <!--[if IE 9]>
            <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/js/ie9-in.js'></script>
            <![endif]-->
            <!--[if IE 8]>
            <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/js/ie8-in.js'></script>
            <![endif]-->
            <!--[if IE 7]>
            <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/js/ie7-in.js'></script>
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
	/*a.jp-mute:hover {
		background-position:-22px -170px;
	}
	a.jp-volume-max:hover {
		background-position:-22px -186px;
	}*/
	</style>
            <script type="text/javascript">
              //<![CDATA[
              var myPlayList = "";
              $(document).ready(function(){
                myPlayList = new jPlayerPlaylist({
                  jPlayer: "#jquery_jplayer_2",
                  cssSelectorAncestor: "#jp_container_2"
                }, 
                [], //playlist
                {
                  swfPath: "<?php echo Yii::app()->baseUrl; ?>/js",
                  supplied: "mp3",
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
   		   <div class="header-wrap">
   		<div class="header">
        <!-- Panel -->
    		<?php //include 'toppanel-in.php'; ?>    
			
			
<div id="toppanel-in">
  <div id="panel">
    <div class="frame-slider">
      <div class="song-history">
        <div class="fl hist-title font-mole">Songs history - Songs you have heard</div>
        <div class="fr clear-hist font-mole"><a href="" class="orange">Clear History</a></div>
      </div>
      <div class="hist-slider">
        <div class="top_img">
          <ul id="list">
            <?php
							
							$songListHistory = (isset(Yii::app()->request->cookies['songListHistory']->value))?Yii::app()->request->cookies['songListHistory']->value:"";
              //$songListHistory = Yii::app()->request->cookies['songListHistory']->value;
              $songListHistoryArr = json_decode($songListHistory);
              
							if(isset($songListHistoryArr->file_id)){
                $temp = $songListHistoryArr;
                $songListHistoryArr = array(
                    0 => $temp
                );
              }
							
              if(isset($songListHistoryArr) && !(empty ($songListHistoryArr))){
                foreach ($songListHistoryArr as $key => $value) {
							if (file_exists(Yii::app()->basePath . '/../xml/content/songs/' . "song-" . $value->content_id . ".xml")) {							
							$historyxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/songs/' . "song-" .$value->content_id. ".xml");
							}
							if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $value->artist_id . ".xml")) {							
							$artistnamexml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" .$value->artist_id. ".xml");
							}
							//print_r($userxml);exit;
									?>
                  <li>
                    <?php
                    foreach ($historyxml->paths->path as $key => $path) {
                      if ($path->fileId == $value->file_id) {
                        $songPath = $path->songpath;
                        break;
                      }                      
                    }
                    ?>
                    <a href="" class="historyPlay" url="<?php echo $songPath; ?>" file_id="<?php echo $value->file_id; ?>" artist_id="<?php echo $value->artist_id; ?>" content_id="<?php echo $value->content_id; ?>">
                    <div class="song-wrap">
                        <span class="a-name font-mole">
						<?php 
							$artistname = $artistnamexml->artistName;
							if(strlen($artistname)>14)
							{
							$artistname = substr($artistnamexml->artistName,0,12);
							$artistname.="...";
							}
							else
							{
							$artistname = $artistnamexml->artistName;
							}
							echo $artistname;

//echo $historyxml->names->artistName->name;?></span>
                          <div class="a-img">
													<?php if($artistnamexml->images80->image80 !='') { ?>
													<img src="<?php echo $artistnamexml->images80->image80; ?>" />
													<?php } else { ?>
													<img src="<?php echo  Yii::app()->baseUrl."/themes/aaloud/images/Thumbnails/80x80.jpg"; ?>" />
													<?php } ?>
                            <div class="a-play" file_id="<?php echo $value->file_id; ?>" artist_id="<?php echo $value->artist_id; ?>" content_id="<?php echo $value->content_id; ?>">
                              <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" />
                            </div>
                          </div>
                          <div class="a-title"><?php 
													
												$songname = $historyxml->songName;
													if(strlen($songname)>12)
													{
													$songname = substr($historyxml->songName,0,10);
													$songname.="...";
													}
													else
													{
													$songname = $historyxml->songName;
													}
													echo $songname;
													?>
													</div>
                      </div>
                     </a>
                  </li>
                  <?php
                }
              }
            ?>
                 
          </ul>
        </div>
      </div>
    </div>
    <div class="up-image-in">
      <div class="track-info-wrap">
        
				<?php if(isset($songListHistoryArr) && !(empty ($songListHistoryArr))) { ?>
				<?php if (file_exists(Yii::app()->basePath . '/../xml/content/songs/' . "song-" . $songListHistoryArr[0]->content_id . ".xml")) {							
							$historyxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/songs/' . "song-" .$songListHistoryArr[0]->content_id. ".xml");
							}
							if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $songListHistoryArr[0]->artist_id . ".xml")) {							
							$artistnamexml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" .$songListHistoryArr[0]->artist_id. ".xml");
							}
				?>
				
				<?php if ($artistnamexml!='' && $historyxml!='') { ?>
				
        <div class="track-info pad5">
          <div class="track-info-thumb bg-purple pt5 pl5 fl"><img src="<?php echo $artistnamexml->images80->image80; ?>" alt="" /></div>
          <div class="track-info-album fr">
            <div class="art-name font-mole"><?php 
																								$artistname = $artistnamexml->artistName;
																									if(strlen($artistname)>16)
																									{
																									$artistname = substr($artistnamexml->artistName,0,14);
																									$artistname.="..";
																									}
																									else
																									{
																									$artistname = $artistnamexml->artistName;
																									}
																						
																						echo $artistname;

						//echo $artistnamexml->artistName; ?></div>
            <div class="song-name font-mole">"<?php 
																									$songname = $historyxml->songName;
																									if(strlen($songname)>15)
																									{
																									$songname = substr($historyxml->songName,0,13);
																									$songname.="..";
																									}
																									else
																									{
																									$songname = $historyxml->songName;
																									}
																						
																						echo $songname;

						//echo substr($historyxml->songName,0,15); ?>"</div>
            <div class="fb-share mt5 mb5"> 
              <div class="fb-like" data-href="http://www.facebook.com/artistaloud" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false" data-font="tahoma"></div>
            </div>
						<?php	if(Yii::app()->session["H_FULL_NAME"]!=''){ ?>				
						<div class="song-links artistt-foncol2 font-mole"><a href="javascript:;" class="fnt9 w_fff addToCart" 
						content_title="<?php echo $historyxml->songName; ?>" 
						content_id="<?php echo $songListHistoryArr[0]->content_id; ?>" 
						content_type_id="1">Buy</a> .
						<a href="<?php echo CController::createUrl('artist/songinfo', array('contentid'=>$songListHistoryArr[0]->content_id,'fileid'=>$songListHistoryArr[0]->file_id)); ?>?ajax=true&width=250&height=100" class="" title="" rel="info[ajax]">
					 <img alt="Info" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/prettyPhoto/dark_square/bg_black.gif" title="" />Info
					 </a></div>
						<?php }  else {?>
            <div id="basic-modal-login" class="song-links artistt-foncol2 font-mole"><a href="javascript: void(0)" class="fnt9 w_fff basic">Buy</a> . <a href="<?php echo CController::createUrl('artist/songinfo', array('contentid'=>$songListHistoryArr[0]->content_id,'fileid'=>$songListHistoryArr[0]->file_id)); ?>?ajax=true&width=250&height=100" class="" title="" rel="info[ajax]">
					  <img alt="Info" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/prettyPhoto/dark_square/bg_black.gif" title="" />Info
					 </a></div>
						<?php } ?>
          </div>
          <div class="clr"></div>
        </div>
        <div class="rev-exp"><strong>To know More About The Artist</strong> <div class="CL"></div> 
				<?php echo CHtml::link('<strong>Click here</strong>', $this->createUrl('artist/artistdetail',array('name'=>str_replace(' ','-', $artistnamexml->artistName),'id' =>  $songListHistoryArr[0]->artist_id)), array('class' => 'orange')); ?>
				</div>
				<?php } ?>
          <?php  } ?>
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
        	<div class="logo-in"><a href="<?php echo $this->createUrl("site/index"); ?>"></a></div>
        	<!--<div class="rt-player"><img src="images/temp/player.png" alt=""></div>-->
			 <?php require_once Yii::app()->theme->basePath . '/include/column1-top.php'; ?>
			<!--
            <div class="banner"><img src="<?php // echo Yii::app()->theme->baseUrl; ?>/images/temp/banner.jpg" alt="fb" /></div>
			-->
			
        </div>
   </div>
   </div>
   </div>   
   
   <div id="navigation">

	 	<?php require_once Yii::app()->theme->basePath . '/include/menu-home.php'; ?> 

<?php // this part come from view  ?>	 
	 
   </div>
	 
	 
   <div id="content-in">


	<?php echo $content; ?>
               
               
                <div class="content-right fr">
				
				
				 <?php require_once Yii::app()->theme->basePath . '/include/column1-right.php'; ?> 
  <!--           
<div class="side-in mt10">
<img alt="banner" src="<?php //echo Yii::app()->theme->baseUrl;  ?>/images/temp/300-banner.gif">
</div>
-->
<div class="side-in mt10 bg-white">
<!--<img alt="banner" src="<?php //echo Yii::app()->theme->baseUrl;  ?>/images/temp/fb-temp.gif">-->

<!--Facebook like box Start-->
<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fartistaloud&amp;width=292&amp;height=260&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23FFFFFF&amp;stream=false&amp;header=false&amp;appId=128037837274893" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:260px;" allowTransparency="true"></iframe>
<!--Facebook like box End-->


</div>

<div class="side-in mt10">
<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 4,
  interval: 30000,
  width: 300,
  height: 325,
  theme: {
    shell: {
      background: '#343c91',
      color: '#ffffff'
    },
    tweets: {
      background: '#ffffff',
      color: '#7a7a7a',
      links: '#c61656'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    behavior: 'all'
  }
}).render().setUser('ArtistAloud').start();
</script>
</div>


<div class="side-in mt10">
	<h2 class="mod_title">More artists</h2>
	 <div class=" jcarousel-skin-tango"><div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;"><div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;">
	 <ul id="more_artists" class="artist-carousel jcarousel-skin-tango">

					<?php 

						/*$allartist= 	Yii::app()->db2->createCommand()
											->select('ARTIST_ID')
											->from('TBL_ARTIST_ROLE_MAP')
											->where('ARTIST_ROLE_ID=:role_id',array(':role_id'=>31))
											->limit(12)											
											->queryAll();*/	
						
						$resultArr= 	Yii::app()->db2->createCommand()					
									 ->selectdistinct('arm.ARTIST_ID')
										->from('TBL_ARTIST_ROLE_MAP arm')
										->join('TBL_CNT_ART_ROLE_MAP carm', 'arm.ARTIST_ROLE_MAP_ID=carm.ARTIST_ROLE_MAP_ID')
										->join('TBL_CONTENT_RELEASE_DATES crd', 'crd.CONTENT_ID=carm.CONTENT_ID')
										->where('arm.ARTIST_ROLE_ID=:artist_role_id', array('artist_role_id' => 31))
										->order('crd.RELEASE_DATE desc')
										//->limit(12)											
										->queryAll();
										
										$obj=new hideartist;
	
										$hiddenartistid=$obj->hideartist();
										
									$j = 0;
									$allartist = array();
									if (count($resultArr) > 0) {

									  for ($i = 0; $i < count($resultArr); $i++) {

										if (file_exists(Yii::app()->basePath . '/../xml/content/artists/' . "artist-" . $resultArr[$i]['ARTIST_ID'] . ".xml") && (!in_array($resultArr[$i]['ARTIST_ID'], $hiddenartistid))) {

										  $allartist[$j]['ARTIST_ID'] = $resultArr[$i]['ARTIST_ID'];
										  $j+=1;
										  if($j==12){break;}
										}
									  }
									}
										

							foreach($allartist as $index => $artistId){
								$artistId = $artistId['ARTIST_ID'];
								$artistDetails = 	Yii::app()->db2->createCommand()
											->select('af.ARTIST_ID as artistId,f.FILE_PATH as image')
											->from('TBL_ARTIST_FILES af')
											->join('TBL_FILES f','f.FILE_ID=af.FILE_ID')
											->where('af.ARTIST_ID=:artist_id and (af.FILE_SUB_TYPE_ID=2 or af.FILE_SUB_TYPE_ID=33)',
															array(':artist_id'=>$artistId))
											->queryAll();
											
											
											$artistname=Yii::app()->db2->createCommand()
											->select('*')
											->from('TBL_ARTISTS')
											->where('ARTIST_ID=:artistid',array(':artistid'=>$artistId))
											->queryAll();
							?>
							<?php if(isset($artistDetails[0]['image']) !='') { ?> 
								<li>
									<a href="<?php echo CController::createUrl('artist/artistdetail', array('name'=>str_replace(' ','-',$artistname[0]['ARTIST_NAME']),'id'=>$artistId)); ?>">
										<img width="50" height="50" alt="fb" src="<?php echo $artistDetails[0]['image']; ?>">
									</a>
								</li>
								
								<?php } else { ?> 
								<li>
									<a href="<?php echo CController::createUrl('artist/artistdetail', array('name'=>str_replace(' ','-',$artistname[0]['ARTIST_NAME']),'id'=>$artistId)); ?>">
										<img width="50" height="50" alt="fb" src="<?php echo Yii::app()->baseUrl."/themes/aaloud/images/Thumbnails/50x50.jpg"; ?>">
									</a>
								</li>
								
								<?php } ?>
							<?php } ?>

  </ul>
	</div><div class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal" style="display: block;" disabled="disabled"></div><div class="jcarousel-next jcarousel-next-horizontal" style="display: block;"></div></div></div>
</div>


			

			</div>
           <div class="clr"></div> 
        </div>
			
			
           <?php /*
           <div class="clr"></div>  
        </div>  */ ?>
        
   </div>
   
  
 <div id="footer">All rights reserved. Copyrights &copy; 2010 - 2011 Hungama Digital Media Ent. Pvt. Ltd.</div>
  </div>
  
  
 <div id="bottom" class="fnt11">
    <div class="bottom1"> ArtistAloud.com : <?php echo CHtml::link('About us', CController::createUrl("site/aboutus"), array('class' => 'grey99')); ?> 
    | <a href="mailto:help@artistaloud.com" class="grey99">Help</a> 
    | <?php echo CHtml::link('Press', CController::createUrl("news/allnews"), array('class' => 'grey99')); ?>
    | <a href="mailto:advertising@artistaloud.com" class="grey99">Advertising</a> 
    | <?php echo CHtml::link('Feedback', CController::createUrl("site/feedback"), array('class' => 'grey99')); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      Artists : 
     <?php echo CHtml::link('Artists', CController::createUrl("artist/index"), array('class' => 'grey99')); ?>
    | <?php echo CHtml::link('Videos', CController::createUrl("videos/index"), array('class' => 'grey99')); ?>
    </div>
    
    
    <div class="bottom2">Terms : <?php echo CHtml::link('Conditions of use', CController::createUrl("site/conditions"), array('class' => 'grey99')); ?>
    |  <?php echo CHtml::link('Privacy policy', CController::createUrl("site/privacy"), array('class' => 'grey99')); ?>
    | <?php echo CHtml::link('Payment partners ', CController::createUrl("site/partners"), array('class' => 'grey99')); ?> 
    | <?php echo CHtml::link('Disclaimer', CController::createUrl("site/disclaimer"), array('class' => 'grey99')); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      Connect Aloud : <a href="http://www.facebook.com/artistaloud" target="_blank" class="grey99">Facebook</a> 
      | <a href="http://www.twitter.com/artistaloud" target="_blank" class="grey99">Twitter</a> 
      | <a href="http://www.youtube.com/artistaloud" target="_blank" class="grey99">Youtube</a>
      | <a href="http://www.dailymotion.com/artistaloud" target="_blank" class="grey99">Dalilymotion</a>
		</div>
  </div>
 </div>
 

<?php require_once Yii::app()->theme->basePath . '/include/login-form.php'; ?> 

  <!-- modal content -->
		<div id="basic-modal-content-mzone">
            <div class="sign-up-header">
            	<div class="log_header"><h2 class="pop-title">M-Zone</h2></div>
            </div>
            <div class="mzone-content">
            	<strong class="mt5">COMING SOON</strong>
            </div>
    </div>
		
 
 <!-- page -->
 
  <!-- Facebook Common code-->            
<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=128037837274893";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
<!-- Facebook Common code-->  

 <script type="text/javascript">
 var _gaq = _gaq || [];
 _gaq.push(['_setAccount', 'UA-7052069-24']);
 _gaq.push(['_setDomainName', '.artistaloud.com']);
 _gaq.push(['_trackPageview']);
	(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
 
 <!-- the sign up modal form -->
<?php require_once Yii::app()->theme->basePath . '/include/signup-form.php'; ?> 
</body>
</html>