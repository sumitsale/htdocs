<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen2.css" media="screen, projection" />
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main1.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
hi


<div id="outer">
  <!--<div id="top">hello This is reserved for top panel</div>-->
  <div id="inner">
   
   <div class="header-wrap">
   		<div class="header">
        	<div class="logo-in"><a href="#"></a></div>
        	<img alt="fb" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/player.gif"></div>
            <div class="banner"> <img alt="fb" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/banner.jpg"></div>
        </div>
   </div>   <div id="navigation">
     


<div class="menuwrap">

<div class="megaMenuContainer wpmega-preset-grey-white megaMenuHorizontal megaMenuOnHover wpmega-withjs wpmega-noconflict megaMenu-withjs" id="megaMenu">
<?php $userId=Yii::app()->user->id;?>
            
           
            
                <?php $this->widget('zii.widgets.CMenu',array(
                    'items'=>array(
					     array('label'=>'Home '.$userId, 'url'=>array('/site/index')),
                        array('label'=>'Hi '.$userId, 'url'=>array('/site/index'),'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'My Cart', 'url'=>array('/site/index1')),
                        array('label'=>'Artists', 'url'=>array('/site/index1')),
                        array('label'=>'Videos', 'url'=>array('/site/index1')),
                        array('label'=>'Specials', 'url'=>array('/site/index1')),
                        array('label'=>'SMS', 'url'=>array('/site/index1')),
                        
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Signup', 'url'=>array('/site/login1'), 'visible'=>Yii::app()->user->isGuest),
                    
                        
                        
        
                        array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                    ),
                )); 
		
				
				?>
                
</div>

<div class="connect fl">Connect
 <a class="ml5" href="#"> <img alt="fb" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/fb.gif"></a> 
 <a class="ml5" href="#"><img alt="tw" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/tw.gif"></a>
 <a class="ml5" href="#"><img alt="yt" src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/yt.gif"></a>
 </div>

<div class="fr search">


<input type="text" onblur="if(this.value==''){this.value='Search...'}" onclick="if(this.value=='Search...'){this.value=''}" value="Search..." class="search_text">

</div>


</div>
   </div>
   <div id="content-in">
   		<div class="content">
        	<div class="content-left fl">
            	
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php //echo $content; ?>
               
                </div>
                
            <div class="content-right fr mb10">
             
<div class="side-in mt10">
<img alt="banner" src="images/temp/300-banner.gif">
</div>

<div class="side-in mt10">
<img alt="banner" src="images/temp/fb-temp.gif">
</div>

<div class="side-in mt10">
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 4,
  interval: 30000,
  width: 300,
  height: 327,
  theme: {
    shell: {
      background: '#000000',
      color: '#bababa'
    },
    tweets: {
      background: '#000000',
      color: '#bababa',
      links: '#f16000'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: 'all'
  }
}).render().setUser('artistaloud').start();
</script><div id="twtr-widget-1" class="twtr-widget twtr-widget-profile"><div style="width: 300px;" class="twtr-doc">            <div class="twtr-hd"><a class="twtr-profile-img-anchor" href="http://twitter.com/intent/user?screen_name=artistaloud" target="_blank"><img src="http://a3.twimg.com/profile_images/1577972560/AA_Logo_PinkRibbon_new_normal.jpg" class="twtr-profile-img" alt="profile"></a>                      <h3>ArtistAloud.com</h3>                      <h4><a href="http://twitter.com/intent/user?screen_name=ArtistAloud" target="_blank">ArtistAloud</a></h4>             </div>            <div class="twtr-bd">              <div style="height: auto;" class="twtr-timeline">                <div class="twtr-tweets">                  <div class="twtr-reference-tweet"></div><div id="tweet-id-4" class="twtr-tweet"><div class="twtr-tweet-wrap">         <div class="twtr-avatar">           <div class="twtr-img"><a href="http://twitter.com/intent/user?screen_name=devensagar" target="_blank"><img src="http://a2.twimg.com/profile_images/1617559373/IMG00099-20111028-2032_normal.jpg" alt="devensagar profile"></a></div>         </div>         <div class="twtr-tweet-text">           <p>             <a class="twtr-user" href="http://twitter.com/intent/user?screen_name=devensagar" target="_blank">devensagar</a> <a target="_blank" href="http://twitter.com/ArtistAloud" data-screen-name="ArtistAloud" class="tweet-url username">@ArtistAloud</a> - listening to Srimallya Maitra's - Tonic past 20days and now it goes in the most fave. list.. Super !             <em>            <a href="http://twitter.com/devensagar/status/132703089026269184" time="Sat Nov 05 06:17:36 +0000 2011" class="twtr-timestamp" target="_blank">4 hours ago</a> ·            <a href="http://twitter.com/intent/tweet?in_reply_to=132703089026269184" class="twtr-reply" target="_blank">reply</a> ·             <a href="http://twitter.com/intent/retweet?tweet_id=132703089026269184" class="twtr-rt" target="_blank">retweet</a> ·             <a href="http://twitter.com/intent/favorite?tweet_id=132703089026269184" class="twtr-fav" target="_blank">favorite</a>             </em>           </p>         </div>       </div></div><div id="tweet-id-3" class="twtr-tweet"><div class="twtr-tweet-wrap">         <div class="twtr-avatar">           <div class="twtr-img"><a href="http://twitter.com/intent/user?screen_name=ArtistAloud" target="_blank"><img src="http://a3.twimg.com/profile_images/1577972560/AA_Logo_PinkRibbon_new_normal.jpg" alt="ArtistAloud profile"></a></div>         </div>         <div class="twtr-tweet-text">           <p>             <a class="twtr-user" href="http://twitter.com/intent/user?screen_name=ArtistAloud" target="_blank">ArtistAloud</a> A brand new episode of <a target="_blank" class="tweet-url hashtag" title="#SFYT" href="http://twitter.com/search?q=%23SFYT">#SFYT</a> with <a target="_blank" href="http://twitter.com/swarathma" data-screen-name="swarathma" class="tweet-url username">@swarathma</a>  <a rel="nofollow" target="_blank" href="http://t.co/usHW8Y9z">http://t.co/usHW8Y9z</a> WATCH NOW!             <em>            <a href="http://twitter.com/ArtistAloud/status/132406839680843776" time="Fri Nov 04 10:40:25 +0000 2011" class="twtr-timestamp" target="_blank">yesterday</a> ·            <a href="http://twitter.com/intent/tweet?in_reply_to=132406839680843776" class="twtr-reply" target="_blank">reply</a> ·             <a href="http://twitter.com/intent/retweet?tweet_id=132406839680843776" class="twtr-rt" target="_blank">retweet</a> ·             <a href="http://twitter.com/intent/favorite?tweet_id=132406839680843776" class="twtr-fav" target="_blank">favorite</a>             </em>           </p>         </div>       </div></div><div id="tweet-id-2" class="twtr-tweet"><div class="twtr-tweet-wrap">         <div class="twtr-avatar">           <div class="twtr-img"><a href="http://twitter.com/intent/user?screen_name=ArtistAloud" target="_blank"><img src="http://a3.twimg.com/profile_images/1577972560/AA_Logo_PinkRibbon_new_normal.jpg" alt="ArtistAloud profile"></a></div>         </div>         <div class="twtr-tweet-text">           <p>             <a class="twtr-user" href="http://twitter.com/intent/user?screen_name=ArtistAloud" target="_blank">ArtistAloud</a> <a target="_blank" href="http://twitter.com/sweet_roop" data-screen-name="sweet_roop" class="tweet-url username">@sweet_roop</a> participate on facebook today :)             <em>            <a href="http://twitter.com/ArtistAloud/status/132403130590691328" time="Fri Nov 04 10:25:40 +0000 2011" class="twtr-timestamp" target="_blank">yesterday</a> ·            <a href="http://twitter.com/intent/tweet?in_reply_to=132403130590691328" class="twtr-reply" target="_blank">reply</a> ·             <a href="http://twitter.com/intent/retweet?tweet_id=132403130590691328" class="twtr-rt" target="_blank">retweet</a> ·             <a href="http://twitter.com/intent/favorite?tweet_id=132403130590691328" class="twtr-fav" target="_blank">favorite</a>             </em>           </p>         </div>       </div></div><div id="tweet-id-1" class="twtr-tweet"><div class="twtr-tweet-wrap">         <div class="twtr-avatar">           <div class="twtr-img"><a href="http://twitter.com/intent/user?screen_name=ArtistAloud" target="_blank"><img src="http://a3.twimg.com/profile_images/1577972560/AA_Logo_PinkRibbon_new_normal.jpg" alt="ArtistAloud profile"></a></div>         </div>         <div class="twtr-tweet-text">           <p>             <a class="twtr-user" href="http://twitter.com/intent/user?screen_name=ArtistAloud" target="_blank">ArtistAloud</a> On a journey with <a target="_blank" href="http://twitter.com/swarathma" data-screen-name="swarathma" class="tweet-url username">@swarathma</a> at 4pm today on <a target="_blank" class="tweet-url hashtag" title="#SFYT" href="http://twitter.com/search?q=%23SFYT">#SFYT</a> tune in! <a rel="nofollow" target="_blank" href="http://t.co/dRx1G16K">http://t.co/dRx1G16K</a>             <em>            <a href="http://twitter.com/ArtistAloud/status/132395052914839552" time="Fri Nov 04 09:53:35 +0000 2011" class="twtr-timestamp" target="_blank">yesterday</a> ·            <a href="http://twitter.com/intent/tweet?in_reply_to=132395052914839552" class="twtr-reply" target="_blank">reply</a> ·             <a href="http://twitter.com/intent/retweet?tweet_id=132395052914839552" class="twtr-rt" target="_blank">retweet</a> ·             <a href="http://twitter.com/intent/favorite?tweet_id=132395052914839552" class="twtr-fav" target="_blank">favorite</a>             </em>           </p>         </div>       </div></div>                  <!-- tweets show here -->                </div>              </div>            </div>            <div class="twtr-ft">              <div><a href="http://twitter.com" target="_blank"><img src="http://widgets.twimg.com/i/widget-logo.png" alt=""></a>                <span><a href="http://twitter.com/artistaloud" style="color:#bababa" class="twtr-join-conv" target="_blank">Join the conversation</a></span>              </div>            </div>          </div></div>
</div>
<div class="side-in mt10">
	<h2 class="mod_title">More artists</h2>
	 <div class=" jcarousel-skin-tango"><div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;"><div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;"><ul class="artist-carousel jcarousel-list jcarousel-list-horizontal" id="more_artists" style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: 0px; width: 604px;">
    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="1"><img width="50" height="50" "="" alt="fb" src="images/temp/t1.gif"></li>
    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="2"><img width="50" height="50" "="" alt="fb" src="images/temp/t2.gif"></li>
    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="3"><img width="50" height="50" "="" alt="fb" src="images/temp/t3.gif"></li>
    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="4"><img width="50" height="50" "="" alt="fb" src="images/temp/t4.gif"></li>
     <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="5"><img width="50" height="50" "="" alt="fb" src="images/temp/t2.gif"></li>
    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="6"><img width="50" height="50" "="" alt="fb" src="images/temp/t1.gif"></li>
    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="7"><img width="50" height="50" "="" alt="fb" src="images/temp/t3.gif"></li>
    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal" style="float: left; list-style: none outside none;" jcarouselindex="8"><img width="50" height="50" "="" alt="fb" src="images/temp/t4.gif"></li>
  </ul></div><div class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal" style="display: block;" disabled="disabled"></div><div class="jcarousel-next jcarousel-next-horizontal" style="display: block;"></div></div></div>
</div>
            </div>
           
           <div class="clr"></div> 
        </div>
        
   </div>
   
  
 <div id="footer">All rights reserved. Copyrights &copy; 2010 - 2011 Hungama.org</div>
  </div>
 <div class="fnt11" id="bottom">
 	<div class="bottom1">
    ArtistAloud.com : <a class="grey99" href="#">About us</a> | <a class="grey99" href="#">Help</a> | <a class="grey99" href="#">Press</a> | <a class="grey99" href="#">Advertising</a> | <a class="grey99" href="#">Feedback</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    Artists : <a class="grey99" href="#">Press kits</a> | <a class="grey99" href="#">Exclusive</a> | <a class="grey99" href="#">Artist links</a> | <a class="grey99" href="#">Videos</a></div>
 	
    <div class="bottom2">Terms : <a class="grey99" href="#">Conditions of use</a> | <a class="grey99" href="#">Privacy policy</a> | <a class="grey99" href="#">Payment policy</a> | <a class="grey99" href="#">Disclaimer</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    Connect Aloud : <a class="grey99" href="#">Facebook</a> | <a class="grey99" href="#">Twitter</a> | <a class="grey99" href="#">Youtube</a></div>
 
 </div>
 </div>
 <!-- page -->

</body>
</html>