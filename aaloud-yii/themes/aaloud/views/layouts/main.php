<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="google-site-verification" content="KAyCovSFj_4o5qRiWi8PeIzSAEaoiRJ-cxDpbSp_UDI" />
<title>Independent Music Artists India | Independent Music | Songwriters and Composers – ArtistAloud.com</title> 
<link rel="icon" href="<?php echo Yii::app()->baseUrl; ?>/favicon.ico" type="image/x-icon">
<?php Yii::app()->clientScript->registerMetaTag('Independent artist platform in India. Upload your own music to the only distribution platform for latest music albums, exclusive music records of independent and upcoming bands only at ArtistAloud.com','description'); ?>
<?php Yii::app()->clientScript->registerMetaTag('independent artists, upload, upload music, upload independent music, upload songs, independent music, music India, independent music India, artists, artists in India, parikrama, bappi lahiri, manasi scott, kavita seth, kailash kher, India, music, latest music, new music, bands, bands India, independent bands, exclusive, artist aloud, india','keywords'); ?>

<?php
	/*Included Css*/
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/home.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/jquery.jscrollpane.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/menu/style.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/spotlight.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/popup.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/prettyPhoto.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/jplayer.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/slide.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/style-slide.css');
	Yii::app()->clientScript->registerCSSFile(Yii::app()->theme->baseUrl.'/css/colorbox.css');


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
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jcarousal.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.spotlight.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/superfish.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/supersubs.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.simplemodal.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.prettyPhoto.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/slide.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.jplayer.min.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jplayer.playlist.min.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.filestyle.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.custom_radio_checkbox.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/organictabs.jquery.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/cart.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/wpmegamenu.devdeae.js', CClientScript::POS_END);
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/hoverIntentdeae.js', CClientScript::POS_END);
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.easing.1.3.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.colorbox.js');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery-scroller-v1.min.js');
  
  Yii::app()->clientScript->registerScript(
            'global-vars',
            " 
              var baseUrl = 'http://" . $_SERVER['HTTP_HOST'] .Yii::app()->request->scriptUrl."';
			   var themeUrl = 'http://" . $_SERVER['HTTP_HOST'] .Yii::app()->theme->baseUrl."';
              var isHome = true;
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
        $(document).ready(function(){
          $(".radio").dgStyle();
          //$(".checkbox").dgStyle();
        });
        /*Call back for Custom font*/
        Cufon.replace('h2.title-block');
        Cufon.replace('h2.page-title-block');
        Cufon.replace('.font-mole');
        /*Call back for scrollbar*/
        $(function()
        {
          $('.scroll-pane').jScrollPane({autoReinitialise: true});
        });
		
        jQuery(document).ready(function() {
          jQuery('#list').jcarousel({
            animation: 500,
            scroll: 3
          });
        });
		
        
      </script>
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
 background: url('<?php echo Yii::app()->theme->baseUrl; ?>/images/aplayer-bg.png') no-repeat center center;
}
/*a.jp-mute:hover {
	background-position:-22px -170px;
}
a.jp-volume-max:hover {
	background-position:-22px -186px;
}*/
</style>
<?php
      $topsongxml = simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/' . "top-10-songs.xml");

	  
	  
			//echo "<pre>";
			//print_r($topsongxml);exit;
			
			
      $topSongArr = array();
	  
	  $artistandsongname='';
	  $title='';
	  
	  $top10path='';
	  
	  
	  
	  
	    $homepagepopupstatus='';
	  
	  if (file_exists(Yii::app()->basePath . '/../xml/frontend/homepopupstatus.xml'))
			{
							$currnetstatus=simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/homepopupstatus.xml');
							
							// echo "<pre>";
							// print_r($currnetstatus);exit;
							
							if(isset($currnetstatus[0]))
							{
								$homepagepopupstatus=$currnetstatus[0];
							}
							
			}
	  
	 // echo $homepagepopupstatus;exit;
	  
	  
	  
	  $top_content_id = "";
      foreach ($topsongxml->song as $key => $song) { //print_r($song);
	  
	  $artistandsongname=(string)$song->artistname." - ".(string)$song->title;
	  //$top_content_id .= (string)$song->content_id.",";
	  
	   // $top10path="http://login.hungamatech.com/direct_download_service.php?content_id=".$song->content_id."&content_type_id=1&licence_id=brsI+hEqeSG8ZtJu1Dat4NGb/YJMHO0V8djg77N0+og=&app_id=23&notify=W";
	  //staging
	 
		$top10path="https://secure.hungama.com/direct_download_service.php?content_id=".$song->content_id."&content_type_id=1&licence_id=SK/qo/hgMZhpxp+1uVORCMqQuuxDZYg8Wz2o6xFqblQ=&app_id=25&notify=W&store_id=4";
		//live
	  //echo $top10path;exit;
	 
		if(strlen($artistandsongname)>26)
		{
			$title=$artistandsongname;
		}else
		{
			$title=$artistandsongname;
		}
		
		//echo (string)$top10path;
	  
        $tempArr = array(
            // 'title' => substr((string)$song->title, 0, 28),                      ////just only song name
			 'title' => (string)$title,             //artist name- song name
             'mp3' => (string)$top10path
			//'mp3' => (string)$song->mp3                       //for top 10 full path
        );
        array_push($topSongArr, $tempArr);
      }
	 //$top_content_id = rtrim($top_content_id,",");
      ?>
<?php //echo json_encode($topSongArr);  ?>
<script type="text/javascript">
  //<![CDATA[
  var myPlayList = "";
  $(document).ready(function(){
    myPlayList = new jPlayerPlaylist({
      jPlayer: "#jquery_jplayer_2",
      cssSelectorAncestor: "#jp_container_2"
    }, 
    <?php echo json_encode($topSongArr); ?>, 
    {
      swfPath: "<?php echo Yii::app()->baseUrl; ?>/js",
      supplied: "mp3",
      wmode: "window",
      size: {
        width: "290px"
      }
    });
	
   <?php if(isset($homepagepopupstatus) && $homepagepopupstatus=="show") { ?>
    //myPlayList.option("autoPlay", true);
	<?php } else { ?>
	myPlayList.option("autoPlay", true);
	<?php } ?>
	
  });
  //]]>
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
        $(document).ready(function() {
          $.featureList(
          $("#tabs li a"),
          $("#output li"), {
            start_item	:	0,
            transition_interval : 3000
          }
        );

          $('.vdo,.txt').click(function() {
            $('#tabs,#output').hide();
            $('#vdoplay').show();
            //$("#vdoplay").load('test.html');
          });

          $('.backtoshow').click(function() {
            $('#tabs,#output').show();
            $('#vdoplay').hide();
            $("#vdoplay").html('');
          });

        });
  </script>

  <script type="text/javascript">
	
        jQuery(function ($) {
          // Load dialog on page load
          //$('#basic-modal-content').modal();
		  
		  
		  	// Load dialog when click on m-zone
			$('#basic-modal-mzone .basic-mzone').click(function (e) {
				$('#basic-modal-content-mzone').modal({
					minHeight:200,
					minWidth: 300
				});
				return false;
			});
			
		  // Load dialog when click on Enjoy Full Song Streaming
			$('#basic-modal-fullsong .basic-fullsong, .basic-fullsong').live('click', function (e) {
				$('#basic-modal-content-fullsong').modal({
					minHeight:200,
					minWidth: 300
				});
				return false;
			});
		  
		  
			
        });
  </script>

	<script type="text/javascript">
        $(function()
        {
          /*        $('#tab-me').tabs();
                                              $('#list').jcarousel();
                                      });*/
	
          /*Code for assigning dynamic width to the Playlist on the top.*/
          var a = $(document).width();
          var b= a-336;
          $('.top_img').css('width',b+'px');
          $('.top_scroller').css('width',b+'px');
        });
        $(window).resize(function() {
          /*Code for assigning dynamic width to the Playlist on the top.*/
          var a = $(document).width();
          var b= a-336;
          $('.top_img').css('width',b+'px');
          $('.top_scroller').css('width',b+'px');
        });
        function lessdetail()
        {
          $('#artisthorlist').slideUp(500);
          $('#artistdet').slideUp(500);
          $('.more').show();
          $('.less').hide();
        }
        function moredetail()
        {
          $('#artisthorlist').slideDown(500);
          $('#artistdet').slideDown(500);
          $('.more').hide();
          $('.less').show();
        }
  </script>
	<style>
	#megaMenu {
		/*margin-top:501px;*/
		width:630px;
		float:left;
	}
	#megaMenu ul .ss-nav-menu-reg > ul.sub-menu, #megaMenu ul .ss-nav-menu-mega ul.sub-menu-1 {
		top: auto !important;
		bottom:100% !important;
	}
	</style>
	
 <script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook', social_tools:false, deeplinking: false, slideshow: false, autoplay_slideshow: false});				
        });
        
        $(document).ready(function(){
           /*$("a[rel^='player']").prettyPhoto({theme:'facebook', social_tools:false, deeplinking: false, slideshow: false, autoplay_slideshow: false, default_width: 625,default_height: 360});		
           $("a[rel^='player']").click(function(){
             $("#jquery_jplayer_2").jPlayer("pause");
           })*/
		   $(".inline-vdo").colorbox({
				inline:true, 
				width:"668px",
				height:"420px",
				fixed: 	true,
				onOpen:function(){ 
					//alert('onOpen: colorbox is about to open'); 					
					$("#jquery_jplayer_2").jPlayer("pause");
					playStream($(this).attr('weburl'),$(this).attr('moburl'));
				},
			});
        });
			
			
			 $(document).ready(function(){$("a[rel^='info']").prettyPhoto({theme:'pp_default', social_tools:false, deeplinking: false, modal: true, allow_resize: true, default_width: 250, default_height: 250, slideshow: false, overlay_gallery: false, autoplay_slideshow: false, keyboard_shortcuts: false, show_title: true});
			 });
			
				
			
			
        $(document).ready(function() {
          /*Code for assigning dynamic width to the Playlist on the top.*/
          var a = $(document).width();
          var b= a-313;
          $('.frame-slider').css('width',b+'px');
          $('.top_img').css('width',b+'px');
          /*Code for assigning dynamic width to the Playlist on the top.*/
          /*Code for assigning dynamic width to the "UL" inside Playlist on the top.
                                  var c = document.getElementById('list');
                                  var d = c.getElementsByTagName('li');
                                  e = (d.length * $(d).width()) + (11 * d.length);
                                  $('#list').css('width',e+'px')*/
          /*Code for assigning dynamic width to the "UL" inside Playlist on the top.*/
        });
			
        $(window).resize(function() {
          /*Code for assigning dynamic width to the Playlist on the top.*/
          var a = $(document).width();
          var b= a-313;
          $('.frame-slider').css('width',b+'px');
          $('.top_img').css('width',b+'px');
          /*Code for assigning dynamic width to the Playlist on the top.*/
          /*Code for assigning dynamic width to the "UL" inside Playlist on the top.
                                  var c = document.getElementById('list');
                                  var d = c.getElementsByTagName('li');
                                  e = (d.length * $(d).width()) + (11 * d.length);
                                  $('#list').css('width',e+'px')*/
          /*Code for assigning dynamic width to the "UL" inside Playlist on the top.*/
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
            <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/js/ie9.js'></script>
            <![endif]-->
            <!--[if IE 8]>
            <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/js/ie8.js'></script>
            <![endif]-->
            <!--[if IE 7]>
            <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/js/ie7.js'></script>
            <![endif]-->   
        	
<!-- Facebook Common code-->            
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=128037837274893";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Facebook Common code-->  
     	
</head>

  <?php 
 /*$browser = $_SERVER['HTTP_USER_AGENT'];
   if(stristr($browser, 'MSIE 6.0;')){ ?>
 
  <script type='text/javascript'>
  alert('Your Web Browser is Outdated and Unsupported.Please Upgrade your Browser.');
 
  </script>
  <?php } */?>

	<?php 
 /*$browser = $_SERVER['HTTP_USER_AGENT'];
   if(stristr($browser, 'MSIE 7.0;')){ ?>
 
  <script type='text/javascript'>
 alert('Your Web Browser is Outdated and Unsupported.Please Upgrade your Browser.');
  </script>
  <?php } */?>


<?php //End of head here     ?>


<body>

<div id="outer">
<div id="toppanel">
  <div id="panel">
    <div class="frame-slider">
      <div class="song-history">
        <div class="fl hist-title font-mole">Songs history - Songs you have heard</div>
        <div class="fr clear-hist font-mole"><a href="javascript:;" class="orange">Clear History</a></div>
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
							
									?>
                  <li> 
                    <?php
										if(isset($historyxml) && !(empty ($historyxml))) {
                    foreach ($historyxml->paths->path as $key => $path) {
                      if ($path->fileId == $value->file_id) {
                        $songPath = $path->songpath;
                        break;
                      }                      
                    }
										}
                    ?>
                    <a href="javascript: void(0)" class="historyPlay" url="<?php echo $songPath; ?>" file_id="<?php echo $value->file_id; ?>" artist_id="<?php echo $value->artist_id; ?>" content_id="<?php echo $value->content_id; ?>">
                    <div class="song-wrap">
                        <span class="a-name font-mole"><?php 
												
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
													<?php if($artistnamexml->images80->image80 !='') {?>
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
            <?php /* <li> 
           		<a href="#">
            	<div class="song-wrap">
                	<span class="a-name font-mole">Brian Colaco</span>
                    <div class="a-img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/im6.jpg" />
                    	<div class="a-play"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/scroller_top/bullet.png" width="20" height="20" border="0" /></div>
                    </div>
                    <div class="a-title">Come Holy Spirit</div>
                </div>
               </a>
            </li> */ ?>
            
          </ul>
        </div>
      </div>
    </div>
    <div class="up-image">
	
	
      <div class="track-info-wrap">
			  <?php
			
			if(isset($songListHistoryArr) && !(empty ($songListHistoryArr)))
			{
			?>
        
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
						//echo substr( $historyxml->songName,0,15); ?>"</div>
            <div class="fb-share mt5 mb5">
              <div class="fb-like" data-href="http://www.facebook.com/artistaloud" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false" data-font="tahoma"></div>
            </div>
						<?php	if(Yii::app()->session["H_FULL_NAME"]!=''){ ?>				
						<div class="song-links artistt-foncol2 font-mole"><a href="javascript:;" class="fnt9 w_fff addToCart" 
						content_title="<?php echo $historyxml->songName; ?>" 
						content_id="<?php echo $songListHistoryArr[0]->content_id; ?>" 
						content_type_id="1">Buy</a> . <a href="<?php echo CController::createUrl('artist/songinfo', array('contentid'=>$songListHistoryArr[0]->content_id,'fileid'=>$songListHistoryArr[0]->file_id)); ?>?ajax=true&width=250&height=100" class="" title="" rel="info[ajax]">
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
    <div class="up-image">
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
<!--<div id="top">hello This is reserved for top panel</div>-->
<div id="inner">
  <div id="header-home">
    <div class="logo"><a href="<?php echo $this->createUrl("site/index"); ?>"></a></div>
    <div class="rt-content">
<script type="text/javascript">
    $(document).ready(function() {
      $("a#controlbtn1").click(function(e) {
        e.preventDefault();
        var slidepx=$("div#linkblock1").width() + 10;
    	if ( !$("div#maincontent1").is(':animated') ) { 
			if (parseInt($("div#maincontent1").css('marginLeft'), 10) < slidepx) {
     			$(this).removeClass('close1').html('');
      			margin = "+=" + slidepx;
    		} else {
     			$(this).addClass('close1').html('');
      			margin = "-=" + slidepx;     		
    		}   	
        	$("div#maincontent1").animate({ 
        		marginLeft: margin
      		}, {
                    duration: 'slow',
                    easing: 'easeOutQuint'
                });   	
    	} 
      }); 
    });
</script>
<script type="text/javascript">
$(document).ready(function() {

	//create scroller for each element with "horizontal_scroller" class...
$("#jquery_jplayer_2").bind($.jPlayer.event.play, function(event) { // Add a listener to report the time play began
	  //$("#playBeganAtTime").text("Play began at time = " + event.jPlayer.status.currentTime);
	  //create scroller for each element with "horizontal_scroller" class...
		$('div.jp-playlist li.jp-playlist-current').SetScroller({	
			velocity: 	 60,
			direction: 	 'horizontal',
			startfrom: 	 'right',
			loop:		 'infinite',
			movetype: 	 'linear',
			onmouseover: 'pause',
			onmouseout:  'play',
			onstartup: 	 'play',
			cursor: 	 'pointer'
		});
	});
});
</script>
<style type="text/css">
		/* CSS for the scrollers */
	div.jp-playlist li.jp-playlist-current{
		position:relative;
		height:24px;
		width:275px;
		/*border:#CCCCCC 1px solid;*/
		display:block;
		overflow:hidden;
	}
	div.jp-playlist li.jp-playlist-current div{
		position:absolute;
		white-space:nowrap;
		color:#FFFFFF;
	}

</style>
     
<style type="text/css">
a#controlbtn1{width:22px;height:62px; display:inline-block;}
a#controlbtn1.open1 {background: transparent url(<?php echo Yii::app()->theme->baseUrl; ?>/images/jplayer.blue.monday.gif) no-repeat -96px -7px; height:73px;}
a#controlbtn1.close1 {background: transparent url(<?php echo Yii::app()->theme->baseUrl; ?>/images/jplayer.blue.monday.gif) no-repeat -136px -7px;height:73px;}
div#linkblock1 {float: left;width: 300px;margin-right: -310px;}
div#maincontent1 {position: relative;margin-right: 310px;padding-left:22px;width:300px;}
.abs{ position:absolute;}
.trig{ left:0px; top:34px;}

.buy_btn{ left:0px; top:114px;}
a#buybtn{width:22px;height:52px; display:inline-block;}
a#buybtn.open1 {background: transparent url(<?php echo Yii::app()->theme->baseUrl; ?>/images/jplayer.blue.monday.gif) no-repeat -131px -272px; height:52px;}
a#buybtn.close1 {background: transparent url(<?php echo Yii::app()->theme->baseUrl; ?>/images/jplayer.blue.monday.gif) no-repeat -131px -272px;height:52px;}

</style>
<div id="maincontent1">
    <div id="control1" class="abs trig">
        <a id="controlbtn1" class="open1 close1"  alt=""></a>
    </div>
    
    <div id="buy_btn" class="abs buy_btn">
	
	<?php    if (Yii::app()->session["H_FULL_NAME"] != '') { ?>
	
        <a id="buybtn" class="open1 close1 home-top10-cart" href="javascript:void(0);" alt=""></a>
		
	<?php } else { ?>
	
		<!--<a id="buybtn" class="open1 close1 home-top10-cart" href="javascript:void(0);" alt=""></a>-->
		
	<div id="basic-modal-login"> <a href="javascript: void(0)" id="buybtn" class="fnt9 w_fff basic">Buy</a> </div>
	
	<?php } ?>
		
    </div>
    
    <div id="linkblock1">    
          <div class="playlist-top">
            <div id="jp_container_2" class="jp-audio">
              <div class="jp-type-playlist">
                <div class="jp-playlist scroll-pane">
                  <ul>
                    <li>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>      

<script type="text/javascript">
    $(document).ready(function() {
      $("a#controlbtn").click(function(e) {
        e.preventDefault();
        var slidepx=$("div#linkblock").width() + 10;
    	if ( !$("div#maincontent").is(':animated') ) { 
			if (parseInt($("div#maincontent").css('marginLeft'), 10) < slidepx) {
     			$(this).removeClass('close').html('');
      			margin = "+=" + slidepx;
    		} else {
     			$(this).addClass('close').html('');
      			margin = "-=" + slidepx;     		
    		}   	
        	$("div#maincontent").animate({ 
        		marginLeft: margin
      		}, {
                    duration: 'slow',
                    easing: 'easeOutQuint'
                });   	
    	} 
      }); 
    });
</script>
     
<style type="text/css">
a#controlbtn{width:22px;height:62px; display:inline-block;}
a#controlbtn.open {background: transparent url(<?php echo Yii::app()->theme->baseUrl; ?>/images/jplayer.blue.monday.gif) no-repeat -88px -88px; height:63px;}
a#controlbtn.close {background: transparent url(<?php echo Yii::app()->theme->baseUrl; ?>/images/jplayer.blue.monday.gif) no-repeat -128px -88px; height:63px;}
div#linkblock {float: left;width: 300px;margin-right: -310px;}
div#maincontent {position: relative;margin-right: 310px;padding-left:22px;width:300px;}
.banner1{margin-top:170px;}
</style>
<div class="banner1">
<div id="maincontent">
<div id="control" class="abs trig">
	<a id="controlbtn" class="open close"  alt=""></a>
</div>
<div id="linkblock">
	    <?php require_once Yii::app()->theme->basePath . '/include/home-right-banner.php'; ?> 
      <!--<div class="down-image mt5"> <img src="<?php //echo Yii::app()->theme->baseUrl; ?>/images/01_01_ArtistAloud_Homepage_FocusArea1.gif" alt=""> </div>
	  -->
      </div>
</div>
</div>
    </div>
    <div class="l-shadow"></div>
    <div class="r-shadow"></div>
    <?php //include 'spot-home.php';  ?>
		
		<?php 
					$focusarea =  simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/'."focus.xml");

					?>
    <div>
      <div id="imgscroll">
        <div id="feature_list">
          <div class="tabcontainerbg">
            <div class="tabcontainer">
              
              
              <div class="fl" style="width:135px; margin-top:6px;">
              <a href="http://www.artistaloud.com/gima/" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/gima.png" alt=""></a>
              </div>
              
              <div class="fl" style="width:650px;">
              
              <div style="width:650px; margin:0 auto;">
              
              <ul id="tabs">
							
							<?php 
              foreach ($focusarea as $slideIndex => $slide) {
              //for($i=0;$i<8;$i++) {
?>
                <li>
								
								
								<?php if(strlen($slide->videoPath)!=0) { ?>
								
								<?php if(strlen($slide->thumbnail)>1){ ?>
								<a href="javascript:;"><span>&nbsp;</span>
								<b>&nbsp;</b>
								<img src="<?php echo $slide->thumbnail; ?>" alt=""></a>
								
								
								<?php } else { ?>
								<a href="javascript:;"><span>&nbsp;</span>
								<b>&nbsp;</b>
								<img src="<?php echo Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/80x50.png"; ?>" alt=""></a>
								
								
								<?php } ?>
								<?php } else { if(strlen($slide->thumbnail)>1) { ?>
								
								<a href="javascript:;"><span>&nbsp;</span>
								<img src="<?php echo $slide->thumbnail; ?>" alt=""></a>

								<?php } else { ?>
								<a href="javascript:;"><span>&nbsp;</span>
								<img src="<?php echo Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/80x50.png"; ?>" alt=""></a>
								<?php } } ?>
								</li>
							<?php }  ?>
								
              </ul>
              </div>
              </div>
              
              
       <div id="basic-modal-fullsong" class="fr mt4"><a href="javascript: void(0)" class="basic-fullsong"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/full_song_stream.png" alt=""></a></div>
             
            </div>
          </div>

          <ul id="output">
					<?php $i = 1; foreach ($focusarea as $slideIndex => $slide) { ?>
            <li>
              <!--<div class="bgimg1" style="height:530px;background-image:url(../images/temp/1.jpg);background-repeat:repeat;background-position:center top;"><a href="<?php //echo Yii::app()->theme->baseUrl; ?>/images/temp/video.jpg" class="vdo" title="description" rel="prettyPhoto"><img src="<?php //echo Yii::app()->theme->baseUrl; ?>/images/playbig.png" width="85" height="85" alt="" title=""></a></div>-->
              
			  <?php if(strlen($slide->bigImage)>1) { ?>
			  				
                    <!--Big BG image logic-->
                    <div class="bgimg" style="background-image: url(<?php echo $slide->bigImage; ?>)">
                    <?php } else { ?>
                      <div class="bgimg" style="background-image: url(<?php echo Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/1650x530.jpg"; ?>)">
                    <?php } ?> 
                    
					<!--invisible link block-->
     
                    <?php if($slide->artistId != 0): ?>
 <?php echo CHtml::link('', $this->createUrl('artist/artistdetail',array('id' => $slide->artistId,'name'=>str_replace(' ','-',$slide->artistName))),array('class' => 'center_block')); ?>
				 <?php else : ?>
                	<a href="<?php echo $slide->eventPath; ?>" target="_blank" class="center_block"></a>
                    <?php endif; ?>
                    <!--invisible link block-->
                    
                    
					<!--Video button logic-->
					<?php if($slide->videoPath =="") { ?>
					<?php } else { $genericpath=''; if($slide->artistId=='0') {$genericpath=$slide->videoPath;} else {$genericpath=urlencode($slide->videoPath);} ?>
                    <a href="#player" class="vdo inline-vdo" weburl="<?php echo $genericpath; ?>" moburl="<?php echo $slide->ipadUrl; ?>">
                      <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/playbig.png" width="108" height="33" alt="" title="" />
                    </a>
					<?php } ?>
                    <!--Video button logic-->
                    
             		</div>
                    <!--Big BG image logic-->
                    
              <div class="detailsa">
                
                <h2  class="font-mole">
				<?php 
				$artistName = $slide->artistName;
                  if (strlen($artistName) > 14) {
                    $artistName = substr($slide->artistName, 0, 12);
                    $artistName.="..";
                  } else {
                    $artistName = $slide->artistName;
                  }
				echo $artistName; ?>
                </h2>
                
                <div>
                 
                 <div>
                  <?php if(strlen($slide->genre) != 0): ?>
                    Genre: <?php echo $slide->genre; ?>
                  <?php endif; ?>
                 </div>
                 
                 <div class="mt4"> 
                  <?php if($slide->language != ""): ?>
                   Language : <?php echo $slide->language; ?>
                  <?php endif; ?>
                  </div>
                  
                  <div class="mt4">
                  <?php 
					$tags=strip_tags($slide->description);
					$description = $tags;
					if(strlen($description)>100)
					{
					$description = substr($tags,0,98);
					$description.="..";
					}
					else
					{
					$description = $tags;
					}
					echo $description;
					//$xxx=strip_tags($slide->description);
					//echo substr($xxx,0,60); 
					?>
                      </div>
                </div>
                <div class="mt10 font-mole fnt14">
                <?php if($slide->artistId != 0): ?>
                <?php //echo CHtml::link('More', CController::createUrl("artist/artistdetail/id/" . $slide->artistId)); ?>
		<?php echo CHtml::link('More', $this->createUrl('artist/artistdetail',array('name'=>str_replace(' ','-',$slide->artistName),'id' => $slide->artistId))); ?>
                <?php endif; ?>
                
								
								<?php if($slide->artistId == 0): ?>
								<?php if(($slide->eventPath)!='') { ?>
								<a href="<?php echo $slide->eventPath; ?>" target="_blank">More</a>
								<?php } else { }?>
                <?php endif; ?>
                
                </div>
							</div>
            </li>
						<?php } ?>
						
          </ul>
          <div class="cl spacer0">&nbsp;</div>
        </div>
      </div>
    </div>
  </div>
  <?php // end of header-home.php ?>
  <div id="navigation">
    <?php //navigation start here     ?>
	
	
	
	
  <?php require_once Yii::app()->theme->basePath . '/include/menu-home.php'; ?> 
	
	<!--Home page popup-->
	<?php  

	if(isset($homepagepopupstatus) && $homepagepopupstatus=="show") 
		{
	 
			require_once Yii::app()->theme->basePath . '/include/simple_pop.php'; 
	
		}
		else
		{
			
		} 
		
		?> 
	<!--Home page popup-->
	
	
    <?php // end of menuwrap      ?>
  </div>
  <?php //end of navigator     ?>
  
		<div id="content"> <?php echo $content; ?>
  
    <?php //dyanamic part here   ?>
  </div>
 
  <?php //footer start   ?>
  <div id="footer">All rights reserved. Copyrights &copy; 2011 - 2012 Hungama Digital Media Ent. Pvt. Ltd.</div>
  
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
		
<!-- modal content for Enjoy Full Song Streaming -->
		<div id="basic-modal-content-fullsong">
            <div class="sign-up-header">
            	<div class="log_header"><h2 class="pop-title">M-Zone</h2></div>
            </div>
            <div class="fullsong-content">
            	<strong class="mt5">COMING SOON</strong>
            </div>
    </div>     
		
<script language="javascript" src="http://cdn.vdopia.com/advertisements/js/ivdopia/ivdopia.js"></script>
<script language="javascript">
      function playStream(weburl, moburl)
      {
        var fileURL=weburl;
        // Convert file URL to Connection and Video URL 
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
          web:{width:625,height:350,connectURL:connectURL, videoFileURL:"vdopia"+type+"://0|"+videoFile ,apikey:"6507ff7d020d71a340321ccb6df9bf2b",adFormat:"preroll",runtime:100,title:"Orphan",apitest:false,videoPoster:"<?php echo  Yii::app()->baseUrl."/themes/aaloud/images/video.png"; ?>", category:"EN",autoplay:true},
              
          <!--Player for Ipad-->
          mobile:{width:625,height:350,videoFileURL:moburl,title:"",videoPoster:"<?php echo Yii::app()->baseUrl."/themes/aaloud/images/video.png"; ?>",runtime:100, apikey:"9120d7ef826c62e89e6b554bcfb07f35",title:"",logo:"http://fs02.androidpit.info/aico/x14/23714.png",Skin:"ArtistAloud"}
              
        });
      }
</script>
<div class="hide">
	<div id="vdoplayer"><div id="player"></div></div>
</div>
	
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=128037837274893";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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

<?php require_once Yii::app()->theme->basePath . '/include/signup-form.php'; ?> 
	
</body>

<!--[if lte IE 6]><script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ie6/warning.js"></script><script>window.onload=function(){e("<?php echo Yii::app()->theme->baseUrl; ?>/js/ie6/")}</script><![endif]-->

<!--[if lte IE 7]><script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ie6/warning.js"></script><script>window.onload=function(){e("<?php echo Yii::app()->theme->baseUrl; ?>/js/ie6/")}</script><![endif]-->

</html>
