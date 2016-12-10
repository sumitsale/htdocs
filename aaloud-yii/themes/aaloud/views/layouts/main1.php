<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

 <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
 <title>Artist Aloud | Home</title>

 <?php //if (page_id=="home"){ ?>
  <?php //Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );?>
 
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/home.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.jscrollpane.css" rel="stylesheet" media="all" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/menu/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" id="wpmega-basic-css"  href="<?php echo Yii::app()->theme->baseUrl; ?>/css/menu/basic.css" type="text/css" media="all" />
<link rel="stylesheet" id="wpmega-grey-white-css"  href="<?php echo Yii::app()->theme->baseUrl; ?>/css/menu/greywhite.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/spotlight.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/popup.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jplayer.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/slide.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style-slide.css" type="text/css" />
 <?php //} ?>

 
     	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.6.4.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/cufon-yui.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/Molengo_400.font.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mousewheel.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jscrollpane.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jcarousal.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.spotlight.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/superfish.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/supersubs.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.simplemodal.js" type="text/javascript"></script>
   	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-personalized-1.6rc4.min.js" type="text/javascript"></script>
     <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/slide.js" type="text/javascript"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jplayer.min.js" type="text/javascript"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jplayer.playlist.min.js" type="text/javascript"></script>
		
		
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.filestyle.js" type="text/javascript"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.custom_radio_checkbox.js" type="text/javascript"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ie7-in.js" type="text/javascript"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ie8-in.js" type="text/javascript"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ie9-in.js" type="text/javascript"></script>
		

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
	background: url(<?php echo Yii::app()->theme->baseUrl; ?>/images/aplayer-bg.png) no-repeat;
}
/*a.jp-mute:hover {
	background-position:-22px -170px;
}
a.jp-volume-max:hover {
	background-position:-22px -186px;
}*/
</style>
	
	<?php $topsongxml =  simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/'."top-10-songs.xml");
	
	$topSongArr = array();
	foreach($topsongxml->songs as $key => $song){
		array_push($topSongArr, $song);
	} ?>
	<?php //echo json_encode($topSongArr); ?>
	

	<script type="text/javascript">
		//<![CDATA[
		$(document).ready(function(){
			new jPlayerPlaylist({
				jPlayer: "#jquery_jplayer_2",
				cssSelectorAncestor: "#jp_container_2"
			}, 
			<?php echo json_encode($topSongArr); ?>
			/*[
				{
					title: "Cro Magnon Man",
					mp3:"http://www.jplayer.org/audio/mp3/TSP-01-Cro_magnon_man.mp3",
					oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg"
				}
			]*/, {
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
	$(document).ready(function() {
	$('.error').hide(); 
$('.error1').hide(); 
$('.error2').hide(); 	
	
	 var fname;
	 var lname;
	 var age;
	 var gender="";
	 var city;
	 var country;
	 var email;
	 var mobile;
	 var brand;
	 var genre;
	 var language;
	 var briefbio;
	 var insp;
	 var track;
	 var nickname;
	 var profileimage;
	 var about;
	 var likemusic;
	 var artistlike;
	 var usertype;
	 var musictrack;
	 var typeuser;
$("#sbt").click(function() {

/*
														$('.error2').hide(); 
														if($('#fname2').val()!='')
														{
														fname = $('#fname2').val();
														lname = $('#lname2').val();
														age = $('#age2').val();
														gender = $('#gender2').val();
														city = $('#city2').val();
														country = $('#country2').val();
														email = $('#email2').val();
														mobile = $('#mobile2').val();
														usertype = $('#usertype2').val();
														}
														
														if($('#fname3').val()!='')
														{
														fname = $('#fname3').val();
														lname = $('#lname3').val();
														age = $('#age3').val();
														gender = $('#gender3').val();
														city = $('#city3').val();
														country = $('#country3').val();
														email = $('#email3').val();
														mobile = $('#mobile3').val();
														usertype = $('#usertype3').val();
														
														brand = $('#brand1').val();
														genre = $('#genre1').val();
														briefbio = $('#briefbio1').val();
														insp = $('#insp1').val();
														track = $('#track1').val();
														}
														*/
														nickname= $('#nickname').val();
																		if (nickname == "") {
																			$("label#nickname_error").show();  
																			$("input#nickname").focus();  
																			return false;  
																		}
																typeuser= $('#usertype3').val();
																	
																		
																		
																		/*
																if(typeuser=='A')
																		{
																	 var music5=$('#musictrack').val();
																	 
																	 var ext = music5.substring(music5.lastIndexOf('.') + 1);
																	
																		if(ext=="mp3")
																			{
																			alert("true");
																			return true;
																			}
																				if(ext!="mp3")
																				{
																				alert("Upload currect file");
																				return false;
																				}
														             	}
																		
																		*/
														
														
														profileimage= $('#profileimage').val();
																		
														about= $('#about').val();
																		if (about == "") {
																			$("label#about_error").show();  
																			$("input#about").focus();  
																			return false;  
																		} 
														likemusic= $('#musiclike').val();
																		if (likemusic == "") {
																			$("label#musiclike_error").show();  
																			$("input#musiclike").focus();  
																			return false;  
																		} 
														artistlike= $('#artistlike').val();
																		if (artistlike == "") {
																			$("label#artistlike_error").show();  
																			$("input#artistlike").focus();  
																			return false;  
																		} 
													
														/*
																var dataString = 'fname='+ fname +'&lname='+ lname +'&age='+ age +'&gender='+ gender +'&city='+ city + '&email=' + email + '&mobile=' + mobile+'&country=' + country+'&nickname=' + nickname+'&profileimage=' + profileimage+'&likemusic=' + likemusic+'&artistlike=' + artistlike+'&brand='+ brand +'&genre='+ genre +'&briefbio='+ briefbio +'&insp='+ insp +'&track='+ track+'&usertype='+usertype;  
														//alert (dataString);return false;  
														$.ajax({  
															type: "POST",  
															url: "<?php echo CController::createUrl("site/signup");  ?>	",  
															data: dataString,  
															success: function(data) {  
																if(data){
																	jQuery.modal.close();
																	window.setTimeout(function() {jQuery('#basic-modal-content-thank').modal()}, 250);																
																	jQuery("#simplemodal-container").animate({ height: 580,width:650, top: 16 }, 500);
																	}
															}  
														});  


*/

////
 


///


document.sign_up_form3.submit();
														return false;  

});
	 
	$("#next2").click(function() {
																$('.error1').hide(); 
																fname = $('#fname1').val();
																lname = $('#lname1').val();
																age = $('#age1').val();
																gender = $('#gender1').val();
																city = $('#city1').val();
																country = $('#country1').val();
																email = $('#email1').val();
																mobile = $('#mobile1').val();
																usertype = $('#usertype1').val();																
																brand = $('#brand').val();
																
																	if (brand == "") {
																			$("label#band_error").show();  
																			$("input#brand").focus();  
																			return false;  
																		}  
																genre = $('#genre').val();
																	if (genre == "") {  
																			$("label#genre_error").show();  
																			$("input#genre").focus();  
																			return false;  
																		} 
																		
																language = $('#language').val();
																	if (language == "") {  
																			$("label#language_error").show();  
																			$("input#language").focus();  
																			return false;  
																		} 
																briefbio = $('#briefbio').val();
																if (briefbio == "") {  
																			$("label#briefbio_error").show();  
																			$("input#briefbio").focus();  
																			return false;  
																		} 
																insp = $('#insp').val();
																	if (insp == "") {  
																			$("label#insp_error").show();  
																			$("input#insp").focus();  
																			return false;  
																		}
																track = $('#track').val();
															 if (track == "") {  
																			$("label#track_error").show();  
																			$("input#track").focus();  
																			return false;  
																		}
																		
																	//musictrack=$('#musictrack').val();
																	
						

																
																jQuery.modal.close();
																	window.setTimeout(function() {jQuery('#basic-modal-content-signup3').modal()}, 250);
																
																	jQuery("#simplemodal-container").animate({ height: 580,width:650, top: 16 }, 500);
															
																		 $('#fname3').val(''+fname+'');
															 $('#lname3').val(''+lname+'');
															 $('#age3').val(''+age+'');
															 $('#gender3').val(''+gender+'');
															 $('#city3').val(''+city+'');
															 $('#country3').val(''+country+'');
															 $('#email3').val(''+email+'');
															 $('#mobile3').val(''+mobile+'');
															 $('#usertype3').val(''+usertype+'');
															 		
															 
																 $('#brand1').val(''+brand+'');
															 $('#genre1').val(''+genre+'');
															 $('#language1').val(''+language+'');
															 $('#briefbio1').val(''+briefbio+'');
															 $('#insp1').val(''+insp+'');
															 $('#track1').val(''+track+'');
															 
															 
															 if(usertype=='A')
																		{
																		$('#artistmusic').show();
																		}
																		else
																		{
																		$('#artistmusic').hide();
																		}
																					 
															// $('#musictrack1').val(''+musictrack+'');
																					 
	});	
		
	 $(".next-img").click(function() {
	 var go = '';
	 var come = '';
															 $('.error').hide(); 
																usertype = $("input:radio[name='usertype']:checked").val();
																//alert(usertype);
																			if (!usertype || usertype=='') {  
																			$("label#usertype_error").show();  
																			$("input#usertype").focus();  
																			return false;  
																		} 	

																fname = $('#fname').val();
																		if (fname == "") {  
																			$("label#fname_error").show();  
																			$("input#fname").focus();  
																			return false;  
																		}  
																lname = $('#lname').val();
																		if (lname == "") {  
																			$("label#lname_error").show();  
																			$("input#lname").focus();  
																			return false;  
																		}  
																age = $('#age').val();
																				if (age == "") {  
																			$("label#age_error").show();  
																			$("input#age").focus();  
																			return false;  
																		}  
																//gender = $('#gender').val();
																gender = $("input:radio[name='gender']:checked").val();
																alert(gender);
																			if (!gender) {  
																			$("label#gender_error").show();  
																			$("input#gender").focus();  
																			return false;  
																		} 
																city = $('#city').val();
																					if (city == "") {  
																			$("label#city_error").show();  
																			$("input#city").focus();  
																			return false;  
																		}
																country = $('#country').val();
																			if (country == "") {  
																			$("label#country_error").show();  
																			$("input#country").focus();  
																			return false;  
																		}
																email = $('#email').val();
																			if (email == "") {  
																			$("label#email_error").show();  
																			$("input#email").focus();  
																			return false;  
																		}
																 var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
																if(reg.test(email) == false) {
 
																			$("label#email_error_val").show();  
																			$("input#email").focus();  
																			return false;
																			}
																			
		/*unique email*/										
					var dataString =  'email=' + email;  
														//alert (dataString);return false;  
														$.ajax({  
															type: "POST", 
															async:false,
															//cache: false,
															
															url: "<?php echo CController::createUrl("site/emailexists");  ?>", 
															
															data: dataString,  
															success: function(data) { 
															
																if(data>0)
																{
																go = 'exists';
																}
																
															
																
															}  
														});
if(go=='exists')
{
$("label#email_error_exists").show();
$("input#email").focus();
return false;
}														



													

																			
																mobile = $('#mobile').val();
									                            if (mobile == "") {  
																			$("label#mobile_error").show();  
																			$("input#mobile").focus();  
																			return false;  
																		}
		if(isNaN(mobile))
{
$("label#mobile_error_val").show();
$("input#mobile").focus();
return false;
}
if((mobile.length < 10) || (mobile.length > 10))
{
$("label#mobile_error_val").show();
$("input#mobile").focus();
return false;
}


/*unique mobile*/										
					var dataStrings =  'mobile=' + mobile;  
														//alert (dataString);return false;  
														$.ajax({  
															type: "POST", 
															async:false,
															//cache: false,
															
															url: "<?php echo CController::createUrl("site/mobexists");  ?>", 
															
															data: dataStrings,  
															success: function(data) { 
															
																if(data>0)
																{
																come = 'exists';
																}
																
															
																
															}  
														});
if(come=='exists')
{
$("label#mobile_error_exists").show();
$("input#mobile").focus();
return false;
}	



																

															if(usertype=='A')
															{
																	jQuery.modal.close();
																	window.setTimeout(function() {jQuery('#basic-modal-content-signup2').modal()}, 250);
																
																	jQuery("#simplemodal-container").animate({ height: 580,width:650, top: 16 }, 500);
																		 $('#fname1').val(''+fname+'');
															 $('#lname1').val(''+lname+'');
															 $('#age1').val(''+age+'');
															 $('#gender1').val(''+gender+'');
															 $('#city1').val(''+city+'');
															 $('#country1').val(''+country+'');
															 $('#email1').val(''+email+'');
															 $('#mobile1').val(''+mobile+'');
															 $('#usertype1').val(''+usertype+'');
															}
															
																if(usertype=='L')
															{
																	jQuery.modal.close();
																	window.setTimeout(function() {jQuery('#basic-modal-content-signup3').modal()}, 250);
																
															 $('#fname2').val(''+fname+'');
															 $('#lname2').val(''+lname+'');
															 $('#age2').val(''+age+'');
															 $('#gender2').val(''+gender+'');
															 $('#city2').val(''+city+'');
															 $('#country2').val(''+country+'');
															 $('#email2').val(''+email+'');
															 $('#mobile2').val(''+mobile+'');
															 $('#usertype2').val(''+usertype+'');
															}
				
															 

	});

	
		$.featureList(
					$("#tabs li a"),
					$("#output li"), {
						start_item	:	0,
						transition_interval : 0
					}
		);

		$('.vdo,.txt').click(function() {
					$('#tabs,#output').hide();
					$('#vdoplay').show();
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
		
			// Load dialog on click
			$('#basic-modal-signup .basic-signup').click(function (e) {
				$('#basic-modal-content-signup').modal();
			//jQuery("#simplemodal-container").animate({width:650, top: 16 }, 500);
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
    </script>
	<script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/js/wpmegamenu.devdeae.js'></script>
	<script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/js/hoverIntentdeae.js'></script>
    <script type="text/javascript">
		/*$(function()
			{
				$('#tab-me').tabs();
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
		#megaMenu{
		/*margin-top:501px;*/
		width:645px;
		float:left;
		
		}
		#megaMenu ul .ss-nav-menu-reg > ul.sub-menu,
		#megaMenu ul .ss-nav-menu-mega ul.sub-menu-1{
			top: auto !important;
			bottom:100% !important;
		}
    </style>
    
    		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook', social_tools:false, deeplinking: false, slideshow: false, autoplay_slideshow: false});				
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

</head>						<?php //End of head here ?>

<body>
<?php

		$genrearray=Yii::app()->db->createCommand()
						->select('*')
						->from('genre_master')
					//	->where('Artist_Status=:id1 or Artist_Status=:id2',array(':id1'=>P,':id2'=>H ))
						->queryAll();
						$totalgenre = count($genrearray);
						
						
		$languagearray=Yii::app()->db->createCommand()
						->select('*')
						->from('lang_master')
					//	->where('Artist_Status=:id1 or Artist_Status=:id2',array(':id1'=>P,':id2'=>H ))
						->queryAll();
						$totallanguage = count($languagearray);
						//print_r($languagearray);
						
		$countryarray=Yii::app()->db->createCommand()
						->select('*')
						->from('country_master')
						->where('status=:id',array(':id'=>'P'))
						->order('name asc')
						->queryAll();
						//print_r($countryarray);exit
						$totalcountry = count($countryarray);

		
						
?>

 <div id="outer">
 
 
 
 
 
 
 
 <div id="toppanel">
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
            
          </ul>
        </div>
      </div>
    </div>
    <div class="up-image">
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
  <div class="logo"><a href="index.php"></a></div>
  <div class="rt-content">
    <div class="playlist-top">
      <div id="jp_container_2" class="jp-audio">
        <div class="jp-type-playlist">
          <div class="jp-playlist scroll-pane">
            <ul>
              <li></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="down-image mt5"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/01_01_ArtistAloud_Homepage_FocusArea1.gif" alt=""> </div>
  </div>
  <div class="l-shadow"></div>
  <div class="r-shadow"></div>
										<?php //include 'spot-home.php'; ?>
										
										
										
										
										
										<div>
  <div id="imgscroll">
    <div id="feature_list">
     
     
     
      <div class="tabcontainerbg">
        <div class="tabcontainer">
          <ul id="tabs" class="fl">
            <li><a href="#"><span>&nbsp;</span><b>&nbsp;</b><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/1_thumb.jpg" alt=""></a></li>
            <li><a href="#"><span>&nbsp;</span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/2_thumb.jpg" alt=""></a></li>
            <li><a href="#"><span>&nbsp;</span><b>&nbsp;</b><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/1_thumb.jpg" alt=""></a></li>
            <li><a href="#"><span>&nbsp;</span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/2_thumb.jpg" alt=""></a></li>
            <li><a href="#"><span>&nbsp;</span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/3_thumb.jpg" alt=""></a></li>
             <li><a href="#"><span>&nbsp;</span><b>&nbsp;</b><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/1_thumb.jpg" alt=""></a></li>
            <li><a href="#"><span>&nbsp;</span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/2_thumb.jpg" alt=""></a></li>
            <li><a href="#"><span>&nbsp;</span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/3_thumb.jpg" alt=""></a></li>
          </ul>
          
           <div class="fr mt4"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/full_song_stream.png" alt=""></a></div>
          
        </div>
      </div>

     
      <ul id="output">
        <li>
          <div class="bgimg1"><a href="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/video.jpg" class="vdo" title="description" rel="prettyPhoto"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/playbig.png" width="85" height="85" alt="" title=""></a></div>
          <div class="detailsa">
            <h2>Raghu Dixit</h2>
            <p>Genre: Alternative Rock<br>
              Language : Hindi<br>
              Raghu Dixit is one voice, one guitar and melodies that are sure to mesmerize...</p>
            <a href="#">More</a> </div>
        </li>
        <li>
          <div class="bgimg2"></div>
          <div class="detailsa">
            <h2>Rishabh Srivastav</h2>
            <p>Genre: Alternative Rock<br>
              Language : Hindi /English<br>
              Rishabh Srivastav is a versatile fusion artist...</p>
            <a href="#">More</a> </div>
        </li>
        <li>
          <div class="bgimg3"><a href="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/video.jpg" class="vdo" title="description" rel="prettyPhoto"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/playbig.png" width="85" height="85" alt="" title=""></a></div>
          <div class="detailsa">
            <h2>Raghu Dixit</h2>
            <p>Genre: Alternative Rock<br>
              Language : Hindi<br>
              Raghu Dixit is one voice, one guitar and melodies that are sure to mesmerize...</p>
            <a href="#">More</a> </div>
        </li>
        <li>
          <div class="bgimg4"></div>
          <div class="detailsa">
            <h2>Rishabh Srivastav</h2>
            <p>Genre: Alternative Rock<br>
              Language : Hindi /English<br>
              Rishabh Srivastav is a versatile fusion artist...</p>
            <a href="#">More</a> </div>
        </li>
        <li>
          <div class="bgimg5"></div>
          <div class="detailsa">
            <h2>Luke Kenny</h2>
            <p>Genre: Alternative Rock<br>
              Language : Hindi<br>
              Raghu Dixit is one voice, one guitar and melodies that are sure to mesmerize...</p>
            <a href="#">More</a> </div>
        </li>
         <li>
          <div class="bgimg6"><a href="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/video.jpg" class="vdo" title="description" rel="prettyPhoto"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/playbig.png" width="85" height="85" alt="" title=""></a></div>
          <div class="detailsa">
            <h2>Raghu Dixit</h2>
            <p>Genre: Alternative Rock<br>
              Language : Hindi<br>
              Raghu Dixit is one voice, one guitar and melodies that are sure to mesmerize...</p>
            <a href="#">More</a> </div>
        </li>
        <li>
          <div class="bgimg7"><a href="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/video.jpg" class="vdo" title="description" rel="prettyPhoto"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/playbig.png" width="85" height="85" alt="" title=""></a></div>
          <div class="detailsa">
            <h2>Raghu Dixit</h2>
            <p>Genre: Alternative Rock<br>
              Language : Hindi<br>
              Raghu Dixit is one voice, one guitar and melodies that are sure to mesmerize...</p>
            <a href="#">More</a> </div>
        </li>
         <li>
          <div class="bgimg8"><a href="<?php echo Yii::app()->theme->baseUrl; ?>/images/temp/video.jpg" class="vdo" title="description" rel="prettyPhoto"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/playbig.png" width="85" height="85" alt="" title=""></a></div>
          <div class="detailsa">
            <h2>Raghu Dixit</h2>
            <p>Genre: Alternative Rock<br>
              Language : Hindi<br>
              Raghu Dixit is one voice, one guitar and melodies that are sure to mesmerize...</p>
            <a href="#">More</a> </div>
        </li>
      </ul>
      <div class="cl spacer0">&nbsp;</div>
    </div>
  </div>
</div>
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
</div>
   
   
   
				<?php // end of header-home.php?>
   
   
   
			   <div id="navigation">		<?php //navigation start here ?>		
				 
				 
				 
				 
<div class="menuwrap">

<div id="megaMenu" class="megaMenuContainer megaMenu-nojs wpmega-preset-grey-white megaMenuHorizontal megaMenuOnHover wpmega-withjs wpmega-noconflict">
<ul id="menu-ubermenu-demo" class="megaMenu">
     <li id="menu-item-183" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-1 ss-nav-menu-item-depth-0 ss-nav-menu-reg"><a href="#"><span class="wpmega-link-title">Hi Samanta (My cart 7)</span></a>
     <ul class="sub-menu sub-menu-1">
        
         <li id="menu-item-186" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><!--<a href="#"><span class="wpmega-link-title">Profile</span></a>--> <?php echo CHtml::link('Profile', CController::createUrl("profile/index"),array('class'=>'wpmega-link-title')); ?></li>
          <li id="menu-item-188" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><!--<a href="#"><span class="wpmega-link-title">Purchased</span></a>-->
		  <?php echo CHtml::link('Purchased', CController::createUrl("purchase/index"),array('class'=>'wpmega-link-title')); ?></li>
          <li id="menu-item-189" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><!--<a href="#"><span class="wpmega-link-title">Settings</span></a>-->
		  <?php echo CHtml::link('Settings', CController::createUrl("setting/index"),array('class'=>'wpmega-link-title')); ?></li>
		  
   <li class="detailsa mycart pl5"><a href="#">Logout</a></li>      
	 </ul>

    </li>
	 
	 <li id="menu-item-48" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-2 ss-nav-menu-item-depth-0 ss-nav-menu-mega"><?php echo CHtml::link('Artists', CController::createUrl("artist/index")); ?> 
      <ul class="sub-menu sub-menu-1">
        <li id="menu-item-61" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1" style="border-right: 1px solid #DDDDDD;"><span class="wpmega-link-title">New Artists</span>
          <ul class="sub-menu sub-menu-2">
		  
		  <?php 		
		$top5artist=Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_aa_artist')
						->where('Artist_Status=:id',array(':id'=>P))
						->order(array('Artist_Indate desc'))
						->queryAll(); 
						
					
						?>
		  <?php for($i=0;$i<5;$i++)
		  { ?>
		  
            <li id="menu-item-62" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">
			
			<?php echo $top5artist[$i]['Artist_Name'];?>
			</span></a></li> <?php } ?>
            
			<!--
			<li id="menu-item-63" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Zedde</span></a></li>
            <li id="menu-item-64" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Uvie</span></a></li>
            <li id="menu-item-65" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Shibani Kashyap</span></a></li>
            <li id="menu-item-66" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Raghu Dixit</span></a></li>
			-->
		 
		 
            <li class="detailsa pt10 pl5"><a href="#"><?php echo CHtml::link('All Artist', CController::createUrl("artist/index")); ?> </a></li>
			
         </ul> </li>
         
         <div style="border:1px solid #dddddd; height:180px; float:left;"></div>
     
        <li id="menu-item-49" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title">Popular Artists</span>
          <ul class="sub-menu sub-menu-2">
            <li id="menu-item-50" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Kailash Kher</span></a></li>
            <li id="menu-item-51" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Sona Mohapatra</span></a></li>
            <li id="menu-item-52" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Suneeta Rao</span></a></li>
            <li id="menu-item-53" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Bandish</span></a></li>
            <li id="menu-item-54" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Raeth</span></a></li>
       
		  <li class="detailsa pt10 pl5"><a href="#"><?php echo CHtml::link('More', CController::createUrl("artist/index")); ?> </a></li>
		  </ul>
        </li>
        
        
        <div style="border:1px solid #dddddd; height:180px; float:left;"></div>
        
        
        <li id="menu-item-85" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title">Languages</span>
          <ul class="sub-menu sub-menu-2">
		  
		    <?php 	
					
		$toplang= 	Yii::app()->db->createCommand()
						->select('*')
						->from('lang_master'
						,array('in', 'priority', 
						array(1,2,3,4,5)))
						->order('priority asc')
						->queryAll();
		
						?>
			
		
								
						
		  <?php for($i=0;$i<5;$i++)
		  { ?>
		  

            <li id="menu-item-86" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><?php echo CHtml::link(''.$toplang[$i]['lang_name'], CController::createUrl("languages/directory?id=".$toplang[$i]['lang_id']), array('class'=>'wpmega-link-title')); ?></li> <?php } ?>
			
			<!--
            <li id="menu-item-87" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">English</span></a></li>
            <li id="menu-item-88" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Marathi</span></a></li>
            <li id="menu-item-89" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Tamil</span></a></li>
            <li id="menu-item-90" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">bengali</span></a></li>
			-->
		
		     <li class="detailsa pt10 pl5"><a href="#"><?php echo CHtml::link('All Languages', CController::createUrl("languages/index")); ?></a></li>
		  </ul>
        </li>
        
        
        <div style="border:1px solid #dddddd; height:180px; float:left;"></div>
        
        
        <li id="menu-item-73" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1" style="border-right:none;"><span class="wpmega-link-title">Alphabetical</span>
        	<div class="clr"></div>
        	<div style="width:280px;">
            	
				<?php echo CHtml::link('A', array('artist/directory', 'char' => A )); ?>
				<?php echo CHtml::link('B', array('artist/directory', 'char' => B )); ?>
				<?php echo CHtml::link('C', array('artist/directory', 'char' => C )); ?>
				<?php echo CHtml::link('D', array('artist/directory', 'char' => D )); ?>
				<?php echo CHtml::link(E, array('artist/directory', 'char' => E )); ?>
				<?php echo CHtml::link(F, array('artist/directory', 'char' => F )); ?>
				<?php echo CHtml::link(G, array('artist/directory', 'char' => G )); ?>
				<?php echo CHtml::link(H, array('artist/directory', 'char' => H )); ?>
				<?php echo CHtml::link(I, array('artist/directory', 'char' => I )); ?>
			    <?php echo CHtml::link(J, array('artist/directory', 'char' => J )); ?>
			    <?php echo CHtml::link(K, array('artist/directory', 'char' => K )); ?>
           		<?php echo CHtml::link(L, array('artist/directory', 'char' => L )); ?>
				<?php echo CHtml::link(M, array('artist/directory', 'char' => M )); ?>
				<?php echo CHtml::link(N, array('artist/directory', 'char' => M )); ?>
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
					
		$topgenre= 	Yii::app()->db->createCommand()
						->select('*')
						->from('genre_master'
						,array('in', 'priority', 
						array(1,2,3,4,5)))
						->order('priority asc')
						->queryAll();
		
						?>
		  <?php for($i=0;$i<5;$i++)
		  { ?>
		   
           		<a href="#"><span class="wpmega-link-title"><?php echo $topgenre[$i]['genre_name'];?> / </span></a>
			<?php } ?>	
				<!--
                <a href="#"><span class="wpmega-link-title">English Rock</span></a> / <a href="#"><span class="wpmega-link-title">Metal</span></a><br /><a href="#"><span class="wpmega-link-title">Light Music</span></a> /<a href="#"><span class="wpmega-link-title">Electronics</span>				 				</a>
                <a href="#"><span class="wpmega-link-title">Alternative Rock</span></a>
				-->
           		</div>
                <ul class="sub-menu sub-menu-2">
                	<li class="detailsa pt10 pl5"><a href="#">All Genres</a></li>
           		</ul> 
               </li>
               
             
               
        </ul>
        
   <li id="menu-item-48" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-2 ss-nav-menu-item-depth-0 ss-nav-menu-mega"><?php echo CHtml::link('Videos', CController::createUrl("videos/index")); ?> 
      <ul class="sub-menu sub-menu-1">
        <li id="menu-item-61" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title">New Videos</span>
          <ul class="sub-menu sub-menu-2">
		  <?php 
				   $video=Yii::app()->db->createCommand()
				   ->select('*')
				   ->from('tbl_home_video')
				   ->where('VIDEO_STATUS=:id',array(':id'=>P))
				   ->order('VIDEO_INDATE desc')
				   ->queryAll();
		  ?>
		  
		  <?php for($i=0;$i<5;$i++)
		  { ?>
		  
            <li id="menu-item-62" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title"><?php echo $video[$i]['VIDEO_ARTIST_TITLE']; ?></span></a></li><?php } ?>
           <!-- <li id="menu-item-63" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Raghu Dixit</span></a></li>
            <li id="menu-item-64" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Vikas Bhalla</span></a></li>
            <li id="menu-item-65" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Zedde</span></a></li>
            <li id="menu-item-66" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Uvie</span></a></li>
			-->
              <li class="detailsa pt10 pl5"><a href="#"><?php echo CHtml::link('All Video', CController::createUrl("videos/index")); ?> </a></li>
		  </ul>
        </li>
        
        <div style="border:1px solid #dddddd; height:180px; float:left;"></div>
        
        <li id="menu-item-49" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title">Popular Videos</span>
          <ul class="sub-menu sub-menu-2">
            <li id="menu-item-50" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Bandish</span></a></li>
            <li id="menu-item-51" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Suneeta Rao</span></a></li>
            <li id="menu-item-52" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Raeth</span></a></li>
            <li id="menu-item-53" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Kalish Kheer</span></a></li>
            <li id="menu-item-54" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2"><a href="#"><span class="wpmega-link-title">Sona Mohapatra</span></a></li>
         
           <li class="detailsa pt10 pl5"><a href="#"><?php echo CHtml::link('All Video', CController::createUrl("videos/index")); ?> </a></li>
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
            	<a href="#"><span class="wpmega-link-title">A</span></a>
                <a href="#"><span class="wpmega-link-title">B</span></a>
                <a href="#"><span class="wpmega-link-title">C</span></a>
                <a href="#"><span class="wpmega-link-title">D</span></a>
                <a href="#"><span class="wpmega-link-title">E</span></a>
                <a href="#"><span class="wpmega-link-title">F</span></a>
                <a href="#"><span class="wpmega-link-title">G</span></a>
                <a href="#"><span class="wpmega-link-title">H</span></a>
                <a href="#"><span class="wpmega-link-title">I</span></a>
            	<a href="#"><span class="wpmega-link-title">J</span></a>
                <a href="#"><span class="wpmega-link-title">K</span></a>
                <a href="#"><span class="wpmega-link-title">L</span></a>
                <a href="#"><span class="wpmega-link-title">M</span></a><br />
           		<a href="#"><span class="wpmega-link-title">N</span></a>
                <a href="#"><span class="wpmega-link-title">O</span></a>
                <a href="#"><span class="wpmega-link-title">P</span></a>
                <a href="#"><span class="wpmega-link-title">Q</span></a>
                <a href="#"><span class="wpmega-link-title">R</span></a>
           		<a href="#"><span class="wpmega-link-title">S</span></a>
                <a href="#"><span class="wpmega-link-title">T</span></a>
                <a href="#"><span class="wpmega-link-title">U</span></a>
                <a href="#"><span class="wpmega-link-title">V</span></a>
                <a href="#"><span class="wpmega-link-title">W</span></a>
                <a href="#"><span class="wpmega-link-title">X</span></a>
                <a href="#"><span class="wpmega-link-title">Y</span></a>
                <a href="#"><span class="wpmega-link-title">Z</span></a>
             </div> 
             
            	<div class="clr ht15"></div>
        		
                <span class="wpmega-link-title">Genres</span>
            	<div class="clr"></div>
          		 <div style="width:280px;padding:0 0 19px 0;">
           		<a href="#"><span class="wpmega-link-title">Classic Indi Pop</span></a>
                <a href="#"><span class="wpmega-link-title">English Rock</span></a> / <a href="#"><span class="wpmega-link-title">Metal</span></a><br /><a href="#"><span class="wpmega-link-title">Light Music</span></a> /<a href="#"><span class="wpmega-link-title">Electronics</span>				 				</a>
                <a href="#"><span class="wpmega-link-title">Alternative Rock</span></a>
           		</div>
                <ul class="sub-menu sub-menu-2">
                	<li class="detailsa pt10 pl5"><a href="#">All Genres</a></li>
     		    </ul>
                </li>
                </ul>
				
				<?php 
					$topspecials= Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_specials')
						->order('indate desc')
						->queryAll();
				//echo "<pre>";
				//print_r($topspecials);exit;
				?>
				
		<li id="menu-item-108" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-4 ss-nav-menu-item-depth-0 ss-nav-menu-mega ss-nav-menu-with-img"><a href="#"><span class="wpmega-link-title">Specials</span></a>
        <ul class="sub-menu sub-menu-1">
          <li id="menu-item-120" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title font-mole">Latest</span>
		  
			  <?php for($i=0;$i<1;$i++)
				{ 
				?>
            <div class="" style="margin-left:10px;"><img src="<?php echo Yii::app()->baseUrl; ?>/images/specials/<?php echo $topspecials[$i]['special_image']; ?>" alt="" /></div>
			
            <div class="clr ht5"></div>
            <ul class="sub-menu sub-menu-2">
              <li class="detailsa  mycart"><a href="<?php echo $topspecials[$i]['special_link']; ?>" target="_blank"><?php echo $topspecials[$i]['special_name']; ?></a></li>
            </ul>
			<?php } ?>
          </li>
          <div style="border:1px solid #dddddd; height:183px; margin-left:3px; float:left;"></div>
          <li id="menu-item-131" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-1"><span class="wpmega-link-title font-mole">More Specials</span>
            <ul class="sub-menu sub-menu-2">
			<?php for($i=1;$i<6;$i++)
				{ 
				?>
              <li id="menu-item-132" class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-depth-2 "><a href="<?php echo $topspecials[$i]['special_link']; ?>" target="_blank"><span class="wpmega-link-title"><?php echo $topspecials[$i]['special_name']; ?></span></a></li>
			  <?php } ?>
              
              <li class="detailsa  mycart"><a href="#">All  Specials</a></li>
            </ul>
          </li>
        </ul>
      </li>		
	 
	
	
	
	
	
		<li class="menu-item menu-item-type-custom menu-item-object-custom ss-nav-menu-item-4 ss-nav-menu-item-depth-0 ss-nav-menu-mega ss-nav-menu-with-img"><a href="#"><span class="wpmega-link-title">M-Zone</span></a>    </li>
		
        <div id="basic-modal-signup" class="fl">
				<a href="#" class="basic-signup menu-link">Sign up</a>
			<?php //echo CHtml::link("Sign up","#signupform", array('id'=>'inline','class'=>'basic-signup menu-link'));  ?>
		</div> 
        <div id="basic-modal-login" class="fl">
			<a href="#" class="basic menu-link">Login</a>
		</div>    
          <div id="" class="fl">
			<?php echo CHtml::link('Upload', CController::createUrl("upload/index"),array('class'=>'basic menu-link')); ?>
		</div> 
  </ul>
  
 
  
  
  
</div>

<div class="connect fl"> <a href="#" class="ml5"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/fb.gif" alt="fb" /></a> <a href="#" class="ml5"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tw.gif" alt="tw" /></a> <a href="#" class="ml5"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/yt.gif" alt="yt" /></a></div>

<div class="fr search">


<input type="text" class="search_text" value="Search..." onclick="if(this.value=='Search...'){this.value=''}" onblur="if(this.value==''){this.value='Search...'}">

</div>


				</div>   <?php // end of menuwrap ?>
				 
				 
				 
				 
			   </div>	<?php //end of navigator?>
			   
			   
			   <div id="content">
					
					<?php echo $content; ?>                <?php //dyanamic part here ?>
					
					
			   
			   </div>
			   
			   
															<?php //footer start ?>
															
															
   <div id="footer">All rights reserved. Copyrights &copy; 2010 - 2011 Hungama.org</div>
 <div id="bottom" class="fnt11">
 	<div class="bottom1">
    ArtistAloud.com : <?php echo CHtml::link('About us', CController::createUrl("aboutus/index"),array('class'=>'grey99')); ?> | <a href="#" class="grey99">Help</a> | <a href="#" class="grey99">Press</a> | <a href="#" class="grey99">Advertising</a> | <?php echo CHtml::link('Feedback', CController::createUrl("feedback/index"),array('class'=>'grey99')); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    Artists : <a href="#" class="grey99">Press kits</a> | <a href="#" class="grey99">Exclusive</a> | <a href="#" class="grey99">Artist links</a> | <a href="#" class="grey99">Videos</a></div>
 	
    <div class="bottom2">Terms : <a href="#" class="grey99">Conditions of use</a> | <a href="#" class="grey99">Privacy policy</a> | <?php echo CHtml::link('Payment policy ', CController::createUrl("partners/index"),array('class'=>'grey99')); ?> | <?php echo CHtml::link('Disclaimer', CController::createUrl("disclaimer/index"),array('class'=>'grey99')); ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    Connect Aloud : <a href="#" class="grey99">Facebook</a> | <a href="#" class="grey99">Twitter</a> | <a href="#" class="grey99">Youtube</a></div>
 
 </div>
 </div>
 
 		
		<!-- modal content -->
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
		<div style='display:none'>
		<div id="basic-modal-content-signup">
		
		<div class="sign-up">
	<div class="sign-up-header">

		<div class="log_header"><h2 class="pop-title">Sign Up</h2></div>
	</div> 
    <div class="sign-up-content" id="signupdiv">
    <div class="sign-up-text">
		<p>If you are a Hungama.com Registered User,you can use your existing <br />
		   Login and Password on this site.However do create a Profile Page by <br />
		   going into Settings in My Accounts after logging in.Explore The Unheard!</p>
		<p><strong style="color:#CCC">All fields are compulsory.</strong></p>
    </div>
    <div class="sign-up-form">
    <form action="" method="get" id="sign_up_form">
    <table width="100%" border="0" cellspacing="12" cellpadding="0">
          <tr>
            <td><label>Are you</label></td>
            <td><input type="radio" name="usertype" value="A"/>&nbsp; An Artist <input type="radio" name="usertype" value="L" checked="checked" /> A Listner</td>
            <td></td>
            <td>&nbsp;</td>
          </tr>
					<tr>
					<td colspan="2"><label class="error" for="usertype" id="usertype_error">This field is required.</label></td>
          <td colspan="2"></td>
					</tr>
					
         
          <tr>
            <td>First Name</td>
            <td><input type="text" name="firstname" id="fname" class="log_input fnt11"/>
						</td>
            <td>Last Name</td>
            <td><input type="text" name="lastname" id="lname" class="log_input fnt11"/></td>
          </tr>
					<tr>
					<td colspan="2"><label class="error" for="fname" id="fname_error">This field is required.</label></td>
          <td colspan="2"><label class="error" for="lname" id="lname_error">This field is required.</label></td>
					</tr>
          <tr>
            <td>Age</td>
            <td><select name="age"  id="age" class="wd65 log_input fnt11" >
                    	<option></option>
						<option value="age1">18-25yr</option>
                        <option value="age2">25-45yr</option>
                        <option value="age3">45-60yr</option>
                        <option value="age4">Above 60</option>
				</select></td>
            <td>Gender</td>
			<td>
            
				<div class="fl"> 
                    <div class="radio" id="box-single">
                    <input type="radio" name="gender" value="M" checked="checked"/>
                    </div>
                    <div class="fl pl5">Male</div>
               </div> 
                <div class="fl ml10">
                 <div class="radio" id="box-single">
                    <input type="radio" name="gender" value="F" />
                    </div>
                    <div class="fl pl5">Female</div>
                </div>
              	</td>
          <!--  <td><input type="radio" name="gender" value="M"/>Male
              	<input type="radio" name="gender" value="F" />Female</td>-->
          </tr>
					<tr>
					<td colspan="2"><label class="error" for="age" id="age_error">This field is required.</label></td>
          <td colspan="2"><label class="error" for="gender" id="gender_error">This field is required.</label></td>
					</tr>
          <tr>
            <td>City</td>
            <td><input type="text" name="city" id="city" class="log_input fnt11" /></td>
            <td>Country</td>
            <td><select name="country" id="country" class="log_input wd122 fnt11">
                    	<option  value="">Select Country</option>
                    	<?php
						for($i=0;$i<$totalcountry;$i++)
						{ ?>
						<option value="<?php echo $countryarray[$i]['name']; ?>"><?php echo $countryarray[$i]['name']; ?></option>
						<?php
						}
						?>
						
                    </select></td>
          </tr>
					<tr>
					<td colspan="2"><label class="error" for="city" id="city_error">This field is required.</label></td>
          <td colspan="2"><label class="error" for="country" id="country_error">This field is required.</label></td>
					</tr>
					
          <tr>
            <td>Email Id</td>
            <td><input type="text" name="email" id="email" class="log_input fnt11"/></td>
            <td>Mobile</td>
            <td><input type="text" name="mobile" id="mobile" class="log_input fnt11"/></td>
          </tr>
				<tr>
					<td colspan="2">
					<label class="error" for="email" id="email_error">This field is required.</label>
					<label class="error" for="email" id="email_error_val">Invalid Email Id.</label>
					<label class="error" for="email" id="email_error_exists">Email Id already exists.</label>
					</td>
          <td colspan="2">
					<label class="error" for="mobile" id="mobile_error">This field is required.</label>
					<label class="error" for="mobile" id="mobile_error_val">Invalid Mobile Number.</label>
					<label class="error" for="mobile" id="mobile_error_exists">Mobile Number already exists.</label>
					</td>
					</tr>
          <tr>
			
					
          <tr>
						<td>&nbsp;</td>
            <td><a href="#"><div id="next-img" class="next-img">Next</div></a></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
	</form>
	
</div> 
</div>
</div>


		
		
			<?php //include 'singup-pop.php'; ?>		
        </div></div>

				
				
				
						<div style='display:none'>
		<div id="basic-modal-content-signup2">
		
		<div class="sign-up">
	<div class="sign-up-header">

		<div class="log_header"><h2 class="pop-title">Sign Up</h2></div>
	</div> 
    <div class="sign-up-content" id="signupdiv">
    <div class="sign-up-text">
		<p>If you are a Hungama.com Registered User,you can use your existing <br />
		   Login and Password on this site.However do create a Profile Page by <br />
		   going into Settings in My Accounts after logging in.Explore The Unheard!</p>
		<p><strong style="color:#CCC">All fields are compulsory.</strong></p>
    </div>
    <div class="sign-up-form">

   <form action="" method="get" id="sign_up_form2">
	
<input type="hidden" id="fname1">
<input type="hidden" id="lname1">
<input type="hidden" id="age1">
<input type="hidden" id="gender1">
<input type="hidden" id="city1">
<input type="hidden" id="country1">
<input type="hidden" id="email1">
<input type="hidden" id="mobile1">
<input type="hidden" id="usertype1">
    <table width="100%" border="0" cellspacing="12" cellpadding="0">
        
					<tr>
            <td>Band/Artist Name</td>
            <td><input type="text" name="band" class="log_input fnt11" id="brand"/></td>
            <td>Genre</td>
            <td><select name="genre" id="genre">
						<option value="">Select Genre</option>
						<?php
						for($i=0;$i<$totalgenre;$i++)
						{ ?>
						<option value="<?php echo $genrearray[$i]['genre_name']; ?>"><?php echo $genrearray[$i]['genre_name']; ?></option>
						<?php
						}
						?>
						
						</select></td>
          </tr>
					
					<tr>
					<td colspan="2"><label class="error1" for="band" id="band_error">This field is required.</label></td>
          <td colspan="2"><label class="error1" for="genre" id="genre_error">This field is required.</label></td>
					</tr>
          
					<tr>
            <td>Brief Bio</td>
            <td><textarea name="bio" id="briefbio"></textarea></td>
            <td>Inspiration</td>
            <td><textarea name="insp" id="insp"></textarea></td>
          </tr>
					
					<tr>
					<td colspan="2"><label class="error1" for="briefbio" id="briefbio_error">This field is required.</label></td>
          <td colspan="2"><label class="error1" for="insp" id="insp_error">This field is required.</label></td>
					</tr>
					
					<tr>
            <td>Track name</td>
            <td><textarea name="track" id="track"></textarea></td>
						 <td>Language</td>
            <td><select name="language" id="language">
						<option value="">Select Language</option>
						<?php
						for($i=0;$i<$totallanguage;$i++)
						{ ?>
						<option value="<?php echo $languagearray[$i]['lang_name']; ?>"><?php echo $languagearray[$i]['lang_name']; ?></option>
						<?php
						}
						?>
						
						</select></td>
          </tr>
		  
		  				
			<tr>
							<td>&nbsp;</td>
							<td><a href="#"><div class="next-img" id="next2">Next</div></a></td>
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
				
						<div id="basic-modal-content-signup3">
		
		<div class="sign-up">
	<div class="sign-up-header">

		<div class="log_header"><h2 class="pop-title">Sign Up</h2></div>
	</div> 
    <div class="sign-up-content" id="signupdiv">
    <div class="sign-up-text">
		<p>If you are a Hungama.com Registered User,you can use your existing <br />
		   Login and Password on this site.However do create a Profile Page by <br />
		   going into Settings in My Accounts after logging in.Explore The Unheard!</p>
		<p><strong style="color:#CCC">All fields are compulsory.</strong></p>
    </div>
    <div class="sign-up-form">
	<form action="<?php echo CController::createUrl("site/register");  ?>" method="POST" id="sign_up_form3"  name="sign_up_form3" enctype="multipart/form-data">

    <input type="hidden" id="fname2" name="fname2">
<input type="hidden" id="lname2" name="lname2">
<input type="hidden" id="age2" name="age2">
<input type="hidden" id="gender2" name="gender2">
<input type="hidden" id="city2" name="city2">
<input type="hidden" id="country2" name="country2">
<input type="hidden" id="email2" name="email2">
<input type="hidden" id="mobile2" name="mobile2">
<input type="hidden" id="usertype2" name="usertype2">

<input type="hidden" id="fname3" name="fname3">
<input type="hidden" id="lname3" name="lname3">
<input type="hidden" id="age3" name="age3">
<input type="hidden" id="gender3" name="gender3">
<input type="hidden" id="city3" name="city3">
<input type="hidden" id="country3" name="country3">
<input type="hidden" id="email3" name="email3">
<input type="hidden" id="mobile3" name="mobile3">
<input type="hidden" id="usertype3" name="usertype3">


<input type="hidden" id="brand1" name="brand1">
<input type="hidden" id="genre1" name="genre1">
<input type="hidden" id="language1" name="language1">
<input type="hidden" id="briefbio1" name="briefbio1">
<input type="hidden" id="insp1" name="insp1">
<input type="hidden" id="track1" name="track1">

<!--<input type="hidden" id="musictrack1" name="musictrack1">-->

    <table width="100%" border="0" cellspacing="12" cellpadding="0">
        
					<tr>
            <td>Nick Name</td>
            <td><input type="text" name="profilename" id="nickname" class="log_input fnt11"/></td>
            <td>Profile Image</td>
            <td><input type="file" id="profileimage" name="profileimage" class="regInput2" /></td>
          </tr>
					<tr>
					<td colspan="2"><label class="error2" for="nickname" id="nickname_error">This field is required.</label></td>
          <td colspan="2"></td>
					</tr>
          
					<tr>
            <td>About You</td>
            <td><textarea name="aboutme" rows="4" class="regInput2" id="about"></textarea></td>
            <td>Music<br /> You Like</td>
            <td><textarea name="likemusic" rows="4" class="regInput2" id="musiclike"></textarea></td>
          </tr>
					<tr>
					<td colspan="2"><label class="error2" for="about" id="about_error">This field is required.</label></td>
          <td colspan="2"><label class="error2" for="musiclike" id="musiclike_error">This field is required.</label></td>
					</tr>
					<tr>
            <td>Favourite Artists</td>
            <td colspan="3"><textarea name="favartist" id="artistlike" rows="4" class="regInput2"></textarea></td>
          </tr>
					<tr>
					<td colspan="4"><label class="error2" for="artistlike" id="artistlike_error">This field is required.</label></td>
         	</tr>
			
			<tr>
							<td colspan="2"><label class="error1" for="track" id="track_error">This field is required.</label></td>
							<td colspan="2"><label class="error1" for="track" id="language_error">This field is required.</label></td>
						
          </tr>
		   <tr id="artistmusic" style="display:none;">
							<td></td>
							
							
							<td colspan="3"><input type="file" id="musictrack" name="song"></td>
		</tr>
					
          <tr>
						<td>&nbsp;</td>
						
						
						<div id="pleaseWait"
						style="position: absolute; display: none;
							left: 40%; top: 40%; width: 240px; height: 60px;
							text-align: center;">
       
						  <img src="<?php echo Yii::app()->baseUrl."/images/animation.gif"; ?>" alt="Please Wait" />
						</div>
						
						
            <td><a href="#"><div class="next-img" id="next3"><input type="button" value="Submit" id="sbt" onclick="javascript:
			if(document.getElementById('profileimage').value != '' ){
			 document.getElementById('pleaseWait').style.display='block';
			return true;}
			"></div></a></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
	</form>
	
</div> 
</div>
</div>

</div>
</div>

		<div style='display:none'>
			
						<div id="basic-modal-content-thank">
		
		<div class="sign-up">
	<div class="sign-up-header">

		<div class="log_header"><h2 class="pop-title">Successfully Registered</h2></div>
	</div> 
    <div class="sign-up-content" id="signupdiv">
    <div class="sign-up-text">
		<p><strong style="color:#CCC">Welcome to Artist Aloud.</strong></p>
		<p>Dear user, thank you for registering with us. Your login credentials are already sent to your registered email id.</p>
		
    </div>
    <div class="sign-up-form">

	
</div> 
</div>
</div>
</div>
		</div>
		<!-- preload the images -->
		<div style='display:none'>
			<img src='images/x.png' alt='' />
		</div>
        

 
</body>
</html>
					
					
			   
			   



