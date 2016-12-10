

<div class="content-left fl">
            	
                <div class="breadcrumb grey99 fnt11"> Breadcrumbs here.</div>
                
                <div class="page-title mt10 bdrbtm">
                	<h2 class="page-title-block fl">My Profile</h2>
                    <div class="share-elements fr"><img src="<?php echo Yii::app()->theme->baseUrl;  ?>/images/temp/share.gif" alt="" /></div>
                <div class="clr"></div>
                </div>
		   
               
                <div class="clr"></div>
            	<div class="mt25">
                    
                    <div class="fl wd230">
                    	<div class="prof-bdr"><img src="<?php echo Yii::app()->baseUrl;  ?>/images/profileimage/<?php echo $sql[0]['USER_ID']; ?>/<?php echo $sql[0]['PROFILE_IMAGE']; ?>" alt="" /></div>
                    </div>
                    
				<div class="fl">
					<div class="bdrbtm">
                          <div class="fl"><div class="pb10 font-mole fnt22 white"><?php echo $sql1[0]['first_name']."  ".$sql1[0]['last_name'];?></div></div>  
                           <div class="clr"></div>
                    </div>
                    
                    <div class="bdrbtm wd410 pt10 pb10">
                          <div class="prof-title pt10 pb10 font-mole fnt18">About Me</div> 
                          <div class="grey99">
						  <?php echo $sql[0]['ABOUT_YOU'];?>
						  <!--I am James, and I have been a metal music fan from my childhood. This website is giving me the freedom of going to the depths of music which is not heard in the mainstream because of the politics of music companies. ArtistAloud.com is exactly like me.--></div>
                           <div class="clr"></div>
                    </div>
                   
                   	<div class="bdrbtm wd410 pt10 pb10">
                          <div class="prof-title pt10 pb10 font-mole fnt18">Music I Like</div> 
                          <div class="grey99">
						  <?php echo $sql[0]['MUSIC_YOU_LIKE']; ?>
						 <!-- Metal is the major chunk of my liking. But apart from metal music I also listen to punk rock and alternative rock. Some times I also listen to pop music. Some regional music also sounds cool. I never listen to religious music.-->
						  </div>
                           <div class="clr"></div>
                    </div>
                    
                    <div class="bdrbtm wd410 pt10 pb10">
                          <div class="prof-title pt10 pb10 font-mole fnt18">Favourite Artists</div> 
                          <div class="grey99">
						  <!--Obviously I like metal band. I am a fan of Megadeth and Metallica. I also like Iron Maiden, Pantera, Rammstein. In pop music I like Michael Jackson & Madonna. In Country Music I like Bobby Womack. Old classic metal bands like Lynyrd Skynyrd, Deep Purple, Led Zepplin, are also my favourites.
						  -->
						  <?php echo $sql[0]['FAV_ARTIST'];?>
						  </div>
                           <div class="clr"></div>
                    </div>
                   
                  <div class="news"><a class="orange" href="#">Edit Profile</a></div>
                   
                   
                  </div>
                    </div>
                     <div class="clr"></div>
                </div>