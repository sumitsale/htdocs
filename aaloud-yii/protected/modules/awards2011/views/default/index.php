<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraph.org/schema/">
 <?php
    //session_start();
    ?>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta property="og:type" name="og:type" content="actor" />
    <meta property="og:image" name="og:image" content="http://www.artistaloud.com/dalermehndi/images/logo.png" />
    <meta property="fb:admins" name="fb:admins" content="661511706" />
    <title>Awards 2011</title>
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/awardcss.css"  />

    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/cufon-yui.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/Futura_Md_BT_400.font.js" type="text/javascript"></script>
    <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>-->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jplayer.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jplayer.inspector.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/organictabs.jquery.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.scrollTo-min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.simplemodal.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>



    <script>
      $(function() {
        $("#category_tab").organicTabs();
      });
    </script>
    <script type="text/javascript">
		function fblogout(){
                FB.logout(function(response) {
                    location.reload();
                });
            }
      Cufon.replace('.font_futura', {hover: true, fontFamily:'Futura Md BT'}); // Works without a selector engine
    </script>


    <script type="text/javascript">

      function vote(contentId,nominationfor,curr_genere,fb_userid)
      {
        var param = "contentId=" + contentId+"&nominationfor="+nominationfor+"&curr_genere="+curr_genere+"&ip_address="+fb_userid;
        var cookieid=contentId+nominationfor+curr_genere+fb_userid;
        var username=getCookie(cookieid);
        if (username!=null && username!="")
        {
          alert("you have already voted for this song");
          return false;
        }
															
        ajaxRequest = $.ajax({
          url: "<?php echo CController::createUrl("default/vote"); ?>",
          type: 'POST',
          data: param,
          error: function(){
            alert('error');
            //error message here
          },
          success: function(data){
            setCookie(cookieid,"1","1");
            alert(data);
            //read return javascript variable here;
          }       
        });

      }
	
      function setCookie(c_name,value,exdays)
      {
        var exdate=new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
        document.cookie=c_name + "=" + c_value;
      }


      function getCookie(c_name)
      {
        var i,x,y,ARRcookies=document.cookie.split(";");
        for (i=0;i<ARRcookies.length;i++)
        {
          x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
          y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
          x=x.replace(/^\s+|\s+$/g,"");
          if (x==c_name)
          {
            return unescape(y);
          }
        }
      }
		
		
      function register()
      {
        alert("To cast your vote, please use the Login at the top of the page.");
      }
			
			function logout()
			{
		 ajaxRequest = $.ajax({
									url: "<?php echo CController::createUrl("default/logout");  ?>",
									type: 'POST',
							 
									error: function(){
									alert('error');
										//error message here
									},
									success: function(data){
									 alert('You have successfully Logged Out.');
									 window.location.href=window.location.href;
					 //read return javascript variable here;
									}       
							});
			}
    </script>


    <script type="text/javascript">
      $(document).ready(function(){
        $('#jplayer_main').hide();
        $(".playSong").click(function(){
          $('#jplayer_main').show();
          // here comes the scroll to ka code
          var $paneTarget = $('html');
          $paneTarget.scrollTo( 'div#jplayer_main', 400 );
          return false;
        });
      });
      jQuery(function ($) {
        // Load dialog on click
        $('#basic-modal-login .basic').click(function (e) {
          $('#basic-modal-content-login').modal({
            minHeight:250,
            minWidth: 300
          });
		
          return false;
        });
      });
	  
	  
	   $(document).ready(function(){
		  var maxHeight = 0;
		  var classnm = "#column1,#column2";
			$(classnm).each(function(){
			  var height = $(this).height();
			  if(height > maxHeight)
				maxHeight = height;
			});
			$(classnm).height(maxHeight);
		   // $(".newscol-last").height(maxHeight);
		  });
	  
    </script>

  </head>

  <body>
<div class="wrap">
      <div class="top">
        <!-- Social network start-->
        <div class="fl social_nw">
          <a href="http://www.facebook.com/artistaloud" target="_blank"><span class="social_fb inlineb fl"></span></a>
          <a href="http://www.twitter.com/artistaloud" target="_blank"><span class="social_twi inlineb fl ml5"></span></a>
          <a href="mailto:feedback@artistaloud.com" target="_blank"><span class="social_mail inlineb fl ml5"></span></a>
         <!-- <a href="#" target="_blank"><span class="social_add inlineb ml5"></span></a>-->



<!--<a href="#" target="_blank"><span class="fb_login inlineb ml5"></span></a>-->

          <script type="text/javascript">
            var myPlayList = "";
            $(document).ready(function(){
              $(".play_box a.playSong").click(function(){
                var songUrl = $(this).attr('url');
                var artistImage = $(this).attr('artistImage');
                var songTitle = $(this).attr('songName');   
                $(".jp_img").html('<img src="'+artistImage+'" width="50" heigth="50" />');
                $(".jp-title ul li").html(songTitle);
                
                if(songUrl.length > 0){
                  $("#jquery_jplayer_1").jPlayer("setMedia", {
                    mp3: songUrl,
                    title: songTitle
                  }).jPlayer("play");
                }
                return false;
              });     
            });
									
          </script>
<?php /*
		// See if there is a user from a cookie
		$user = $facebook->getUser();

		if ($user) {
			try {
			// Proceed knowing you have a logged in user who's authenticated.
			$user_profile = $facebook->api('/me');
			} catch (FacebookApiException $e) {
			//echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
			$user = null;
			}
		}
	?>
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId: '<?php echo $facebook->getAppID() ?>',
          cookie: true,
          xfbml: true,
          oauth: true
        });
        FB.Event.subscribe('auth.login', function(response) {
          window.location.reload();
        });
        FB.Event.subscribe('auth.logout', function(response) {
          window.location.reload();
        });
      };
      (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol +
          '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
      }());
    </script>   
	<!--
	<?php if ($user) : ?>
	
		<a  href="javascript:;" class="fb_button fb_button_medium fl ml15" onClick="FB.logout(function(response) {window.location.reload();});" id="LoginBtn" >
        	<span class="fb_button_text inlineb ml5">logout</span>
        </a>
		
	<?php else : ?>
	
		<a class="fbLogin fb_button fb_button_medium fl ml15" href="javascript:;" onClick="FB.login(function(response) {window.location.reload();}, {scope: 'publish_stream,email'});"> 
        	<span class="fb_button_text inlineb ml5">login</span>
        </a>
		
	<?php endif ?>	
	-->
	
	*/?>
	
	<?php if (Yii::app()->session["H_LOGINFROM"]=="F") { ?>
	
		<a  href="javascript:;" class="fb_button fb_button_medium fl ml15" onClick="FB.logout(function(response) {window.location.reload();});" id="LoginBtn" >
        	<span class="fb_button_text inlineb ml5">logout</span>
        </a>
		
	<?php }else { if(!isset(Yii::app()->session["H_LOGINFROM"])){ ?>
	
		<a class="fbLogin fb_button fb_button_medium fl ml15" href="javascript:;" onClick="FB.login(function(response) {window.location.reload();}, {scope: 'publish_stream,email'});"> 
        	<span class="fb_button_text inlineb ml5">login</span>
        </a>
		
	<?php } } ?>	
	
	
	
	
	
	
	
	
                  <!--  <div class="fb-login-button">Login</div>-->
						
          <?php /*
            $this->widget('application.extensions.facebook.FbLogin',
            array(
            'devappid'=>'379633055382921',   //your appilaction id
            'devsecret'=>'4f901cb7c2415e528ac33dda9980402c', //your application secret
            'cookie'=>FALSE,
            )); */
          ?>

          <?php if (!isset(Yii::app()->session["H_LOGINFROM"])) {
								
					?>
            <div id="basic-modal-login" class="inlineb">
              <a href="javascript: void(0)" class="basic menu-link">
                <span class="a_login inlineb ml5"></span>
              </a>
            </div>

          <?php } else { if(Yii::app()->session["H_LOGINFROM"]=="A") { ?>
            <div id="basic-modal-login" class="inlineb">
              <a href="javascript: void(0)" onClick="logout()" class="">
                <span class="a_logout inlineb ml5"></span>
              </a>
            </div>

          <?php }} ?>		

				
					
        </div>
        <!-- Social network start-->

        <!--Player section starts-->
        <div class="fr">

          <?php require_once Yii::app()->theme->basePath . '/include/player.php'; ?> 
          <?php //include 'player.php'; ?>
        </div>
        <!--Player section ends-->

        <div class="cl"></div>
        <!--header starts -->
        <div class="header">
			<a class="abs logo" href="http://www.artistaloud.com/" target="_blank"></a>
			
          <?php if (isset(Yii::app()->session["H_LOGINFROM"])) { ?>
            <div class="user-info abs">Welcome <?php echo Yii::app()->session['H_FULL_NAME']; ?> !</div>
          <?php } ?>
        </div>
        <!-- header ends -->

        <div class="spacer20 cl">&nbsp;</div>
        <div class="spacer10 cl">&nbsp;</div>
        <div class="header_txt ml30 fl font_futura txt_upper">
          <span> This week vote for</span>
          <strong class="txt_fff"><?php echo substr($genreoftheweek[0]['GENERE'], 0, 11); ?></strong>
        </div>
        <div class="bacardi fr">
        
        
        <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.artistaloud.com%2Fawards2011&amp;send=false&amp;layout=button_count&amp;width=110&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=verdana&amp;height=21&amp;appId=155750401164061" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px;" allowTransparency="true"></iframe>
        
        <a href="http://www.artistaloud.com/awards2011" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        
         <?php /*?> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/bacardi_logo.gif" /><?php */?>
        </div>
      </div>

      <div class="spacer10 cl">&nbsp;</div>
      <div class="content_top w100p">
      </div>
      
      
  </div> 


<div class="outer-wrap">
       
      
  <div class="wrap">    
      
      <!--Content part starts -->
      <div class="content txt_fff">

        <!--1st column starts-->
        <div id="column1" class="fl">
          <?php
          $fb_userid = '';
          if (strtoupper(Yii::app()->session['H_LOGINFROM']) == "A") {
            $fb_userid = Yii::app()->session['H_USERID'];
          } 
		  if (strtoupper(Yii::app()->session['H_LOGINFROM']) == "F") {
            $fb_userid = Yii::app()->session['H_USERID'];
          } 
          ?>

          <input type="hidden" id="fb_userid" value="<?php echo $fb_userid; ?>">


          <div id="category_tab">

            <ul class="nav txt_upper">
              <li class="nav_cat"><a href="#best_song" class="current ">Best Song</a></li>
              <li class="nav_cat"><a href="#best_female" class="">Best female</a></li>
              <li class="nav_cat"><a href="#best_male" class="">Best male</a></li>
              <li class="nav_cat last"><a href="#best_group" class="">Best Group</a></li>
            </ul>

            <div class="list-wrap">

              <!--Code for 1st tab -->
              <div id="best_song">
                <div class="spacer20 cl">&nbsp;</div>



                <div class="w100p">

                  <?php for ($i = 0; $i < count($bestsong); $i++) {
					$songxml='';
					$artistxml='';
				  ?>

                    <?php
                    if (file_exists(Yii::app()->basePath . '/../xml/content/songs/song-' . $bestsong[$i]['CONTENT_ID'] . ".xml")) {
                      $songxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/songs/song-' . $bestsong[$i]['CONTENT_ID'] . ".xml");
                    }
                    if (file_exists(Yii::app()->basePath . '/../xml/content/artists/artist-' . $songxml->names->artistName->artistid . ".xml")) {
                      $artistxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/artist-' . $songxml->names->artistName->artistid . ".xml");
                    }
                    ?>

                    <?php if (isset($songxml)) { ?>

                      <div class="list_wraper fl">
                        <div class="album_img fl">
                          <?php
                          $artistImagePath = "";
                          if (strlen($artistxml->images80->image80)>0) {
                            $artistImagePath = $artistxml->images80->image80;
                          } else {
                            $artistImagePath = Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/80x80.jpg";
                          }
                          ?>
                          <img src="<?php echo $artistImagePath; ?>" />
                        </div>
                        <div class="info fl">
                          <!--BEST SONG-->

                          <div class="pl15 pt10">
													
													<?php
														$songname = $songxml->songName;
														if (strlen($songname) > 18) {
															$songname = substr($songxml->songName, 0, 15);
															$songname.="..";
														} else {
															$songname = $songxml->songName;
														}
													?>
													
													<?php
														$artistname = $songxml->names->artistName->name;
														if (strlen($artistname) > 18) {
															$artistname = substr($songxml->names->artistName->name, 0, 15);
															$artistname.="..";
														} else {
															$artistname = $songxml->names->artistName->name;
														}
													?>
													
													

                            <strong class="txt_fff txt_upper"><?php echo $songname; ?></strong><br/>
														<?php if (isset($artistxml->artistName)) {?>
                            <span class="inlineb txt_fff">"<?php echo $artistname; ?>"</span>
														<?php } ?>
                            <div class="spacer6 cl">&nbsp;</div>
                            <div style="font-weight:bold;" class="play_box">
                              <?php
                              $size = count($songxml->paths->path);


                              $t = 0;
                              $songlist = '';
                              $songlist = array();
                              for ($g = 0; $g < $size; $g++) {
                                foreach ($songxml->paths->path[$g]->attributes() as $x => $y) {
                                  if ($x == 'type' && $y == '181' && (strlen($songxml->paths->path[$g]->songpath) > 0)) {

                                    $songlist['fileId'] = $songxml->paths->path[$g]->fileId;
                                    $songlist['songPath'] = $songxml->paths->path[$g]->songpath;
                                    $songlist['songName'] = $songxml->songName;
                                    break;
                                  }
                                }
                              }
                              ?>

                              <?php if (isset($songlist['songPath'])) { ?>
															
															<?php
																	$songname = $songlist['songName'];
																	if (strlen($songname) > 12) {
																		$songname = substr($songlist['songName'], 0, 10);
																		$songname.="..";
																	} else {
																		$songname = $songlist['songName'];
																	}
																?>

                                <a href="javascript:;" 
                                   url="<?php echo $songlist['songPath']; ?>" 	 
                                   songName="<?php echo $songname; ?>" 
                                   artistImage="<?php echo $artistImagePath; ?>"
                                   class="playSong" >
                                  <span class="txt_fff txt_upper preview inlineb" id="play">Preview</span></a>

                              <?php } ?>

                              <?php if (isset(Yii::app()->session["H_LOGINFROM"])) { ?>

                                <a href="javascript:void()" onClick="vote(<?php echo $bestsong[$i]['CONTENT_ID']; ?>,'<?php echo $bestsong[$i]['NOMINATION_FOR']; ?>','<?php echo $bestsong[$i]['GENERE']; ?>',<?php echo $fb_userid; ?>)">
                                  <span class="txt_fff txt_upper vote inlineb">Vote</span>
                                </a>
                              <?php } else { ?>

                                <a href="javascript:void()" onClick="register()">
                                  <span class="txt_fff txt_upper vote inlineb">Vote</span>
                                </a>
                              <?php } ?>


                            </div>
                          </div>
                        </div>	
                      </div>

                    <?php } ?>
                    <?php if (($i + 1) % 2 == 0) { ?>
                      <div class="spacer20 cl">&nbsp;</div>
                      <div class="spacer20 cl">&nbsp;</div>
                    <?php } ?>
                  <?php } ?>
                </div>
               
              </div>
              <!-- 1st tab ends-->

              <!-- 2nd tab starts-->
              <div id="best_female" class="hide">
                <div class="spacer20 cl">&nbsp;</div>

                <div class="w100p">

                  <?php for ($i = 0; $i < count($bestfemale); $i++) { 
				  $songxml='';
				  $artistxml='';
				  ?>


                    <?php
                    if (file_exists(Yii::app()->basePath . '/../xml/content/songs/song-' . $bestfemale[$i]['CONTENT_ID'] . ".xml")) {
                      $songxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/songs/song-' . $bestfemale[$i]['CONTENT_ID'] . ".xml");
                    }
                    if (file_exists(Yii::app()->basePath . '/../xml/content/artists/artist-' . $songxml->names->artistName->artistid . ".xml")) {
                      $artistxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/artist-' . $songxml->names->artistName->artistid . ".xml");
                    }
                    ?>

                    <?php if (isset($songxml) && isset($artistxml)) { ?>

                      <div class="list_wraper fl">
                        <div class="album_img fl">
                          <?php 
															$artistImagePath = "";
														if (strlen($artistxml->images80->image80)>0) {
															$artistImagePath = $artistxml->images80->image80;
														} else {
															$artistImagePath = Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/80x80.jpg";
														}
													?>
													<img src="<?php echo $artistImagePath; ?>" />
                        </div>
                        <div class="info fl">
                          <div class="pl15 pt10">
													
														<?php
														$songname = $songxml->songName;
														if (strlen($songname) > 18) {
															$songname = substr($songxml->songName, 0, 15);
															$songname.="..";
														} else {
															$songname = $songxml->songName;
														}
													?>
													
													<?php
														$artistname = $songxml->names->artistName->name;
														if (strlen($artistname) > 18) {
															$artistname = substr($songxml->names->artistName->name, 0, 15);
															$artistname.="..";
														} else {
															$artistname = $songxml->names->artistName->name;
														}
													?>
													
													
                            <strong class="txt_fff txt_upper"><?php echo $songname; ?></strong><br/>
                            <span class="inlineb txt_fff">"<?php echo $artistname; ?>"</span>
                            <div class="spacer6 cl">&nbsp;</div>
                            <div style="font-weight:bold;" class="play_box">
                              <?php
                              $size = count($songxml->paths->path);


                              $t = 0;
                              $songlist = '';
                              $songlist = array();
                              for ($g = 0; $g < $size; $g++) {
                                foreach ($songxml->paths->path[$g]->attributes() as $x => $y) {
                                  if ($x == 'type' && $y == '181' && (strlen($songxml->paths->path[$g]->songpath) > 0)) {

                                    $songlist['fileId'] = $songxml->paths->path[$g]->fileId;
                                    $songlist['songPath'] = $songxml->paths->path[$g]->songpath;
																		$songlist['songName'] = $songxml->songName;
                                    break;
                                  }
                                }
                              }
                              ?>
                              <?php if (isset($songlist['songPath'])) { ?>
															
															<?php
																	$songname = $songlist['songName'];
																	if (strlen($songname) > 12) {
																		$songname = substr($songlist['songName'], 0, 10);
																		$songname.="..";
																	} else {
																		$songname = $songlist['songName'];
																	}
																?>
															
																<a href="javascript:;" 
                                   url="<?php echo $songlist['songPath']; ?>" 
                                   songName="<?php echo $songname; ?>" 
                                   artistImage="<?php echo $artistImagePath; ?>"
                                   class="playSong" >
                                  <span class="txt_fff txt_upper preview inlineb" id="play">Preview</span></a>

                              <?php } ?>
                              <?php if (isset(Yii::app()->session["H_FULL_NAME"])) { ?>


                                <a href="javascript:void()" onClick="vote(<?php echo $bestfemale[$i]['CONTENT_ID']; ?>,'<?php echo $bestfemale[$i]['NOMINATION_FOR']; ?>','<?php echo $bestfemale[$i]['GENERE']; ?>',<?php echo $fb_userid; ?>)"><span class="txt_fff txt_upper vote inlineb">Vote</span></a>

                              <?php } else { ?>

                                <a href="javascript:void()" onClick="register()">
                                  <span class="txt_fff txt_upper vote inlineb">Vote</span></a>
                              <?php } ?>

                            </div>
                          </div>
                        </div>	
                      </div>

                    <?php } ?>

                    <?php if (($i + 1) % 2 == 0) { ?>
                      <div class="spacer20 cl">&nbsp;</div>
                      <div class="spacer20 cl">&nbsp;</div>
                    <?php } ?>

                  <?php } ?>

                </div>


            


              </div>
              <!--2nd tab ends-->

              <!-- 3rd tab starts-->
              <div id="best_male" class="hide">
                <div class="spacer20 cl">&nbsp;</div>
                <div class="w100p">

                  <?php for ($i = 0; $i < count($bestmale); $i++) { 
				  $songxml='';
				  $artistxml=''; ?>

                    <?php
                    if (file_exists(Yii::app()->basePath . '/../xml/content/songs/song-' . $bestmale[$i]['CONTENT_ID'] . ".xml")) {
                      $songxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/songs/song-' . $bestmale[$i]['CONTENT_ID'] . ".xml");
                    }
                    if (file_exists(Yii::app()->basePath . '/../xml/content/artists/artist-' . $songxml->names->artistName->artistid . ".xml")) {
                      $artistxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/artist-' . $songxml->names->artistName->artistid . ".xml");
                    }
                    ?>

                    <?php if (isset($songxml) && isset($artistxml)) { ?>




                      <div class="list_wraper fl">
                         <div class="album_img fl">
                          <?php 
															$artistImagePath = "";
														if (strlen($artistxml->images80->image80)>0) {
															$artistImagePath = $artistxml->images80->image80;
														} else {
															$artistImagePath = Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/80x80.jpg";
														}
													?>
													<img src="<?php echo $artistImagePath; ?>" />
                        </div>
                        <div class="info fl">
                          <div class="pl15 pt10">
													
														<?php
															$songname = $songxml->songName;
															if (strlen($songname) > 18) {
																$songname = substr($songxml->songName, 0, 15);
																$songname.="..";
															} else {
																$songname = $songxml->songName;
															}
														?>
														
														<?php
															$artistname = $songxml->names->artistName->name;
															if (strlen($artistname) > 18) {
																$artistname = substr($songxml->names->artistName->name, 0, 15);
																$artistname.="..";
															} else {
																$artistname = $songxml->names->artistName->name;
															}
														?>
													
                            <strong class="txt_fff txt_upper"><?php echo $songname; ?></strong><br/>
                            <span class="inlineb txt_fff">"<?php echo $artistname; ?>"</span>
                            <div class="spacer6 cl">&nbsp;</div>
                            <div style="font-weight:bold;" class="play_box">
                              <?php
                              $size = count($songxml->paths->path);


                              $t = 0;
                              $songlist = '';
                              $songlist = array();
                              for ($g = 0; $g < $size; $g++) {
                                foreach ($songxml->paths->path[$g]->attributes() as $x => $y) {
                                  if ($x == 'type' && $y == '181' && (strlen($songxml->paths->path[$g]->songpath) > 0)) {

                                    $songlist['fileId'] = $songxml->paths->path[$g]->fileId;
                                    $songlist['songPath'] = $songxml->paths->path[$g]->songpath;
																		$songlist['songName'] = $songxml->songName;
                                    break;
                                  }
                                }
                              }
                              ?>
                              <?php if (isset($songlist['songPath'])) { ?>
															
																<?php
																	$songname = $songlist['songName'];
																	if (strlen($songname) > 12) {
																		$songname = substr($songlist['songName'], 0, 10);
																		$songname.="..";
																	} else {
																		$songname = $songlist['songName'];
																	}
																?>

                                <a href="javascript:;" 
                                   url="<?php echo $songlist['songPath']; ?>" 
                                   songName="<?php echo $songname; ?>" 
                                   artistImage="<?php echo $artistImagePath; ?>"
                                   class="playSong" >
                                  <span class="txt_fff txt_upper preview inlineb" id="play">Preview</span></a>

                              <?php } ?>

                              <?php if (isset(Yii::app()->session["H_FULL_NAME"])) { ?>
                                <a href="javascript:void()" onClick="vote(<?php echo $bestmale[$i]['CONTENT_ID']; ?>,'<?php echo $bestmale[$i]['NOMINATION_FOR']; ?>','<?php echo $bestmale[$i]['GENERE']; ?>',<?php echo $fb_userid; ?>)"><span class="txt_fff txt_upper vote inlineb">Vote</span></a>
                              <?php } else { ?>
                                <a href="javascript:void()" onClick="register()"><span class="txt_fff txt_upper vote inlineb">Vote</span></a>

                              <?php } ?>

                            </div>
                          </div>
                        </div>	
                      </div>
                    <?php } ?>

                    <?php if (($i + 1) % 2 == 0) { ?>
                      <div class="spacer20 cl">&nbsp;</div>
                      <div class="spacer20 cl">&nbsp;</div>
                    <?php } ?>

                  <?php } ?>


                </div>

         


              </div>
              <!--3rd tab ends-->

              <!-- 3rd tab starts-->
              <div id="best_group" class="hide">
                <div class="spacer20 cl">&nbsp;</div>
                <div class="w100p">

                  <?php for ($i = 0; $i < count($bestgroup); $i++) {
					$songxml='';
					$artistxml='';
				  ?>

                    <?php
                    if (file_exists(Yii::app()->basePath . '/../xml/content/songs/song-' . $bestgroup[$i]['CONTENT_ID'] . ".xml")) {
                      $songxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/songs/song-' . $bestgroup[$i]['CONTENT_ID'] . ".xml");
                      if (file_exists(Yii::app()->basePath . '/../xml/content/artists/artist-' . $songxml->names->artistName->artistid . ".xml")) {
                        $artistxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/artists/artist-' . $songxml->names->artistName->artistid . ".xml");
                      }
                    }
                    ?>

                    <?php if (isset($songxml) && isset($artistxml)) { ?>

                      <div class="list_wraper fl">
                         <div class="album_img fl">
                          <?php 
															$artistImagePath = "";
														if (strlen($artistxml->images80->image80)>0) {
															$artistImagePath = $artistxml->images80->image80;
														} else {
															$artistImagePath = Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/80x80.jpg";
														}
													?>
													<img src="<?php echo $artistImagePath; ?>" />
                        </div>
                        <div class="info fl">
                          <div class="pl15 pt10">
													
													<?php
														$songname = $songxml->songName;
														if (strlen($songname) > 18) {
															$songname = substr($songxml->songName, 0, 15);
															$songname.="..";
														} else {
															$songname = $songxml->songName;
														}
													?>
													
													<?php
														$artistname = $songxml->names->artistName->name;
														if (strlen($artistname) > 18) {
															$artistname = substr($songxml->names->artistName->name, 0, 15);
															$artistname.="..";
														} else {
															$artistname = $songxml->names->artistName->name;
														}
														?>
													
                            <strong class="txt_fff txt_upper"><?php echo $songname; ?></strong><br/>

                            <span class="inlineb txt_fff">"<?php echo $artistname; ?>"</span>

                            <div class="spacer6 cl">&nbsp;</div>
                            <div style="font-weight:bold;" class="play_box">
                              <?php
                              $size = count($songxml->paths->path);


                              $t = 0;
                              $songlist = '';
                              $songlist = array();
                              for ($g = 0; $g < $size; $g++) {
                                foreach ($songxml->paths->path[$g]->attributes() as $x => $y) {
                                  if ($x == 'type' && $y == '181' && (strlen($songxml->paths->path[$g]->songpath) > 0)) {

                                    $songlist['fileId'] = $songxml->paths->path[$g]->fileId;
                                    $songlist['songPath'] = $songxml->paths->path[$g]->songpath;
																		$songlist['songName'] = $songxml->songName;
                                    break;
                                  }
                                }
                              }
                              ?>
                              <?php if (isset($songlist['songPath'])) { ?>
															
															
																<?php
																	$songname = $songlist['songName'];
																	if (strlen($songname) > 12) {
																		$songname = substr($songlist['songName'], 0, 10);
																		$songname.="..";
																	} else {
																		$songname = $songlist['songName'];
																	}
																?>
													
                                <a href="javascript:;" 
                                   url="<?php echo $songlist['songPath']; ?>"																	 
                                   songName="<?php echo $songname; ?>" 
                                   artistImage="<?php echo $artistImagePath; ?>"
                                   class="playSong" >
                                  <span class="txt_fff txt_upper preview inlineb" id="play">Preview</span></a>

                              <?php } ?>
                              <?php if (isset(Yii::app()->session["H_FULL_NAME"])) { ?>
                                <a href="javascript:void()" onClick="vote(<?php echo $bestgroup[$i]['CONTENT_ID']; ?>,'<?php echo $bestgroup[$i]['NOMINATION_FOR']; ?>','<?php echo $bestgroup[$i]['GENERE']; ?>',<?php echo $fb_userid; ?>)"><span class="txt_fff txt_upper vote inlineb">Vote</span></a>
                              <?php } else { ?>
                                <a href="javascript:void()" onClick="register()"><span class="txt_fff txt_upper vote inlineb">Vote</span></a>
                              <?php } ?>
                            </div>
                          </div>
                        </div>	
                      </div>

                    <?php } ?>

                    <?php if (($i + 1) % 2 == 0) { ?>
                      <div class="spacer20 cl">&nbsp;</div>
                      <div class="spacer20 cl">&nbsp;</div>
                    <?php } ?>

                  <?php } ?>
                </div>

          


              </div>
              <!--4th tab ends-->

            </div> <!-- END List Wrap -->

          </div>

        </div>

        <!--2nd column starts-->
        <div id="column2" class="fr">
          <div class="title">
            <strong class="ml15 txt_upper font_futura">Most Voted</strong><br/>
            <strong class="ml15 txt_upper txt_fff font_futura">
              <?php for ($i = 0; $i < count($genreoftheweek); $i++) { ?>
                <?php echo substr($genreoftheweek[$i]['GENERE'], 0, 11); ?>
              <?php } ?>
            </strong>
          </div>
          <div class="spacer10 cl">&nbsp;</div>
          <div class="list_container">
            <div class="sub_title btline_343b91">
              <strong class="ml15 txt_upper font_futura">Best Song</strong><br/>
            </div>
            <div class="list">
              <ol>
                <?php 
								$j=0;
								for ($i = 0; $i < count($mostvotedsong); $i++) { ?>

                  
                    <?php
                    if (file_exists(Yii::app()->basePath . '/../xml/content/songs/song-' . $mostvotedsong[$i]['CONTENT_ID'] . ".xml")) {
                      $songxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/songs/song-' . $mostvotedsong[$i]['CONTENT_ID'] . ".xml");
                    
                    ?><li>
                    <?php
                    if (isset($songxml)) {
										
											
														$songname = $songxml->songName;
														if (strlen($songname) > 27) {
															$songname = substr($songxml->songName, 0, 22);
															$songname.="..";
														} else {
															$songname = $songxml->songName;
														}
												
                      echo $songname;
                    }
                    ?>
                  </li>

                  <?php
                   if (($j+1) %5 == 0) {
                    break;
                  }
									$j++;
                } }
                ?>
              </ol>
            </div>
          </div>
          <div class="spacer20 cl">&nbsp;</div>
          <div class="list_container">
            <div class="sub_title btline_343b91">
              <strong class="ml15 txt_upper font_futura">Best Female</strong><br/>
            </div>
            <div class="list">
              <ol>
                <?php
							
								$j=0;
								for ($i = 0; $i < count($mostvotedfemale); $i++) { ?>

                
                    <?php
                    if (file_exists(Yii::app()->basePath . '/../xml/content/songs/song-' . $mostvotedfemale[$i]['CONTENT_ID'] . ".xml")) {
                      $songxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/songs/song-' . $mostvotedfemale[$i]['CONTENT_ID'] . ".xml");
                    
                    ?>  <li>
                    <?php
                    if (isset($songxml)) {
										
											$artistname = $songxml->names->artistName->name;
														if (strlen($artistname) > 27) {
															$artistname = substr($songxml->names->artistName->name, 0, 22);
															$artistname.="..";
														} else {
															$artistname = $songxml->names->artistName->name;
														}
										
										
                      echo $artistname;
                    }
                    ?>
                  </li>

                  <?php
									 if (($j+1) %5 == 0) {
                    break;
                  }
									$j++;
                 
                } }
                ?>
              </ol>
            </div>
          </div>
          <div class="spacer20 cl">&nbsp;</div>
          <div class="list_container">
            <div class="sub_title btline_343b91">
              <strong class="ml15 txt_upper font_futura">Best Male</strong><br/>
            </div>
            <div class="list">
              <ol>
                <?php 
								$j=0;
								for ($i = 0; $i < count($mostvotedmale); $i++) { ?>

                 
                    <?php
                    if (file_exists(Yii::app()->basePath . '/../xml/content/songs/song-' . $mostvotedmale[$i]['CONTENT_ID'] . ".xml")) {
                      $songxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/songs/song-' . $mostvotedmale[$i]['CONTENT_ID'] . ".xml");
                    
                    ?> <li>
                    <?php
                    if (isset($songxml)) {
										
												$artistname = $songxml->names->artistName->name;
														if (strlen($artistname) > 27) {
															$artistname = substr($songxml->names->artistName->name, 0, 22);
															$artistname.="..";
														} else {
															$artistname = $songxml->names->artistName->name;
														}
										
										
                      echo $artistname;
                    }
                    ?>
                  </li>

                  <?php
									
									if (($j+1) %5 == 0) {
                    break;
                  }
									$j++;
                 
                } }
                ?>
              </ol>
            </div>
          </div>
          <div class="spacer20 cl">&nbsp;</div>
          <div class="list_container">
            <div class="sub_title btline_343b91">
              <strong class="ml15 txt_upper font_futura">Best Group</strong><br/>
            </div>
            <div class="list">
              <ol>
                <?php 
								$j=0;
								for ($i = 0; $i < count($mostvotedgroup); $i++) { ?>

                 
                    <?php
                    if (file_exists(Yii::app()->basePath . '/../xml/content/songs/song-' . $mostvotedgroup[$i]['CONTENT_ID'] . ".xml")) {
                      $songxml = simplexml_load_file(Yii::app()->basePath . '/../xml/content/songs/song-' . $mostvotedgroup[$i]['CONTENT_ID'] . ".xml");
                    
                    ?> <li>
                    <?php
                    if (isset($songxml)) {
										
												$artistname = $songxml->names->artistName->name;
														if (strlen($artistname) > 27) {
															$artistname = substr($songxml->names->artistName->name, 0, 22);
															$artistname.="..";
														} else {
															$artistname = $songxml->names->artistName->name;
														}
										
										
                      echo $artistname;
                    }
                    ?>
                  </li>

                  <?php
									
									if (($j+1) %5 == 0) {
                    break;
                  }
									$j++;
                
                }  }
                ?>
              </ol>
            </div>
          </div>
        </div>
        
        <div class="cl"></div>
        
      </div>

      <div class="cl"></div>
      
    </div>
</div>

<div class="wrap">
<div class="content_bottom w100p"></div>  
      <div class="spacer10 cl"></div>
      <!--Content part ends -->
      <div class="spacer10 cl"></div>

 <!--footer starts-->
      <div class="footer">
        <div class="social_bot ml30">
        
        All rights reserved. Copyrights &copy; 2011 - 2012 Hungama Digital Media Ent. Pvt. Ltd.
        
        
        
        </div>
      </div>
      <!--footer ends-->
</div>

    <div id="basic-modal-content-login">
      <?php //require_once Yii::app()->basePath . '/themes/aaloud/include/login-form.php';  ?>
      <?php echo $this->renderPartial('login-popup'); ?>
    </div >


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



  </body>
</html>
