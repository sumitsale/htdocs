<div class="content-left fl">
            	
                <div class="breadcrumb grey99 fnt11">
								<?php echo CHtml::link('Home', CController::createUrl("site/index"), array('class' => 'breadcrumb grey99 fnt11')); ?> &#x21d2;
								Profile
								</div>
                
                <div class="page-title mt10 bdrbtm">
                	<h2 class="page-title-block fl">My Profile</h2>
                    <div class="share-elements fr">
                     <div class="fb-like" data-href="http://www.facebook.com/artistaloud" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false" data-font="tahoma"></div>
                    </div>
                <div class="clr"></div>
                </div>
                
               
                <div class="clr"></div>
            	<div class="mt25">
                    
                    <div class="fl wd230">
					
                    	<div class="prof-bdr">
						<?php if(isset($profile[0]['PROFILE_IMAGE']) && $profile[0]['PROFILE_IMAGE']!='') { ?>
						<img src="<?php echo Yii::app()->baseUrl; ?>/images/profileimage/<?php echo $profile[0]['USER_ID']."/".$profile[0]['PROFILE_IMAGE']; ?>"alt="" />
						<?php } else {?>
						<img src="<?php echo Yii::app()->baseUrl . "/themes/aaloud/images/Thumbnails/200x200.jpg"; ?>" />
						<?php }?>
						</div>
						
                    </div>
                    
				<div class="fl">
					<div class="bdrbtm">
											<?php if(!(empty($profile[0]['NICK_NAME']))) { ?>
                          <div class="fl"><div class="pb10 font-mole fnt22 white"><?php echo $profile[0]['NICK_NAME']; ?></div></div> 
											<?php } ?>
                           <div class="clr"></div>
                    </div>
                    
                    <div class="bdrbtm wd410 pt10 pb10">
                          <div class="prof-title pt10 pb10 font-mole fnt18">About Me</div>
													<?php if(!(empty($profile[0]['ABOUT_YOU']))) { ?>
                          <div class="grey99"><?php echo $profile[0]['ABOUT_YOU']; ?></div>
													<?php } ?>
                           <div class="clr"></div>
                    </div>
                   
                   	<div class="bdrbtm wd410 pt10 pb10">
                          <div class="prof-title pt10 pb10 font-mole fnt18">Music I Like</div>
													
													<?php if(!(empty($profile[0]['MUSIC_YOU_LIKE']))) { ?>
                          <div class="grey99"><?php echo $profile[0]['MUSIC_YOU_LIKE']; ?></div>
													<?php } ?>
                           <div class="clr"></div>
                    </div>
                    
                    <div class="bdrbtm wd410 pt10 pb10">
                          <div class="prof-title pt10 pb10 font-mole fnt18">Favourite Artists</div> 
													<?php if(!(empty($profile[0]['FAV_ARTIST']))) { ?>
                          <div class="grey99"><?php echo $profile[0]['FAV_ARTIST']; ?></div>
													<?php } ?>
                           <div class="clr"></div>
                    </div>
                   
                  <div class="news"><!--<a class="orange" href="#">Edit Profile</a></div>-->
                   <?php echo CHtml::link('Edit Profile', CController::createUrl("setting/index"),array('class'=>'orange')); ?>
				   </div>
                   
                  </div>
                    </div>
                     <div class="clr"></div>
</div>