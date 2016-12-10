<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />

	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="container">
<div id="header">
        	<h2><img width="300" height="100" border="0" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/Hlogo.png"></h2><br>
					
   			 <div id="topmenu">
           														
																		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Dashboard', 'url'=>array('site/index')),
				array('label'=>'Store Manager', 'url'=>array('Schedule/admin')),
				array('label'=>'Query Manager', 'url'=>array('Smspush/admin')),
				
				array('label'=>'Banners', 'url'=>array('banner/list')),
				array('label'=>'Reviews', 'url'=>array('Smspush/admin')),
				array('label'=>'Miscellaneous', 'url'=>array('Smspush/admin')),
				array('label'=>'Contact info', 'url'=>array('contactforminfo/admin')),
				array('label'=>'Movies', 'url'=>array('Smspush/admin')),
				array('label'=>'Games', 'url'=>array('Smspush/admin')),
				array('label'=>'Events', 'url'=>array('UpcEvents/admin')),
				array('label'=>'News', 'url'=>array('Thenews/admin')),
			),
		));
		 ?>
          </div>
      	</div>
<!-- header -->

<!-- mainmenu -->
	<div id="top-panel">
            <div id="panel">
                <ul>
                <?php 
								if(!Yii::app()->user->isGuest){
								?>
                    <li><?php echo CHtml::link('Change Password', CController::createUrl('user/changepassword'), array('class'=>'report')); ?></li>
								<?php } ?>
								<?php 
								if(!Yii::app()->user->isGuest){
								?>
                    <li><?php echo CHtml::link('Logout', CController::createUrl('default/logout'), array('class'=>'report')); ?></li>
								<?php } ?>
									<?php 
								if(Yii::app()->user->isGuest){
								?>
                    <li><a href="login" class="report_seo">Login</a></li>
								<?php } ?>
								
																														                </ul>
            </div>
      	</div>
															<div id="wrapper">
																							<div id="content">
																										<?php $this->widget('zii.widgets.CBreadcrumbs', array(
																							'links'=>$this->breadcrumbs,
																						)); ?><!-- breadcrumbs -->

																						<?php echo $content; ?>
																							</div>
																				
																						<div id="sidebar">
			            	<form method="post" action="store_select.php" name="frmChangeStore">
				<ul>
                	<li>
                    	<select onchange="document.frmChangeStore.submit();" name="storeid">
                        	<option value="1##global">Global</option><option value="2##hungamauk">Hungamauk</option><option value="3##bacardi">Bacardi</option><option value="5##artistaloud">Artistaloud</option><option value="6##hungamaus">Hungamaus</option><option selected="selected" value="7##tataphoton">Tataphoton</option><option value="8##hungamabrunei">Hungamabrunei</option><option value="9##hungamauae">Hungamauae</option><option value="10##hungamamalaysia">Hungamamalaysia</option><option value="11##pepsiindia">Pepsiindia</option><option value="12##kuwait">Kuwait</option><option value="13##hungamasingapore">Hungamasingapore</option><option value="14##brewindia">Brewindia</option><option value="15##samsungindia">Samsungindia</option><option value="16##ndtvindia">Ndtvindia</option><option value="17##ndtvus">Ndtvus</option><option value="18##airtel3g">Airtel3g</option><option value="19##vu">Vu</option><option value="20##reliancegsm">Reliancegsm</option><option value="21##reliance3g">Reliance3g</option><option value="22##aircel3g">Aircel3g</option><option value="23##vodafone3g">Vodafone3g</option><option value="24##tunewiki">Tunewiki</option><option value="25##lgeindia">Lgeindia</option><option value="26##blackberrylounge">Blackberrylounge</option><option value="27##airtelbb">Airtelbb</option><option value="28##tatadocomoodp">Tatadocomoodp</option><option value="29##docomo3g">Docomo3g</option><option value="30##mtsindia">Mtsindia</option><option value="31##lgtvindia">Lgtvindia</option><option value="32##trueroots">Trueroots</option><option value="33##spicegang">Spicegang</option><option value="34##docomovideo">Docomovideo</option><option value="35##nokianolt">Nokianolt</option><option value="36##kiosk">Kiosk</option><option value="37##truerootsuk">Truerootsuk</option><option value="38##truerootsgermany">Truerootsgermany</option><option value="39##truerootsfr">Truerootsfr</option><option value="40##truerootssng">Truerootssng</option><option value="41##truerootshk">Truerootshk</option><option value="42##truerootsca">Truerootsca</option><option value="43##docomodc">Docomodc</option><option value="44##9xm">9xm</option><option value="45##samsungtv">Samsungtv</option>                        	
                        </select>
                    </li>
                </ul>
                </form>
			  				<ul>
                	<li><h3><a class="house" href="store_home.php">Dashboard</a></h3>
                        <ul>
                        	<li><a class="search" href="store_home.php">Change Password</a></li>
                            <li><?php echo CHtml::link('Logout', CController::createUrl('default/logout'), array('class'=>'report')); ?></li>
								
                        </ul>
                    </li>
					<li><h3><a class="house" href="store_config.php">Store Manager</a></h3>
                        <ul>
                        	<li><a class="search" href="store_config.php">Configuration</a></li>
                            <li><a class="search" href="store_content_type.php">Content Type</a></li>
							<li><a class="search" href="store_category.php">Categories</a></li>
                            <li><a class="search" href="plan_list.php">Plan List</a></li>
                            <li><a class="search" href="top_search_content.php">Top Searches</a></li>
							                            <!--<li><a href="store_payment_mode_mapping.php" class="search">Payment Mode Type</a></li>-->
							<!--<a href="store_pricing.php" class="search">Change Pricing</a></li>-->
                        </ul>
                    </li>
					<li><h3><?php echo CHtml::link('Query Manager', CController::createUrl('TblContainerMaster/list'), array('class'=>'report')); ?></h3>
                        <ul>
                        	<li><?php echo CHtml::link('Queries', CController::createUrl('TblContainerMaster/list'), array('class'=>'report')); ?></li>
							<li><?php echo CHtml::link('Containers', CController::createUrl('TblContainerMaster/list'), array('class'=>'report')); ?></li>
						    <li><?php echo CHtml::link('Templates', CController::createUrl('TblContainerMaster/list'), array('class'=>'report')); ?></li>
							<li><?php echo CHtml::link('Mapping', CController::createUrl('TblContainerMaster/mapping'), array('class'=>'report')); ?></li>
                            <li><?php echo CHtml::link('Promotion', CController::createUrl('TblPromotion/list'), array('class'=>'report')); ?></li>
                        </ul>
                    </li>
					<li><h3><a class="house" href="banner_list.php">Banners</a></h3>
                        <ul>
                        	<li><?php echo CHtml::link('Manage', CController::createUrl('banner/list'), array('class'=>'report')); ?></li>
							<li><?php echo CHtml::link('Flash Banners', CController::createUrl('FlashBannerList/list'), array('class'=>'report')); ?></li>			
							
                            <li><?php echo CHtml::link('Homepage', CController::createUrl('homepageLeftBottom/addimage'), array('class'=>'report')); ?></li>
							<li><?php echo CHtml::link('Homepage Flash', CController::createUrl('tb1HomeFlashBanner/home_flash_banner'), array('class'=>'report')); ?></li>
                            
                        </ul>
                    </li>
                    
					<!--<li><h3><a href="search_artist.php" class="house">Artist</a></h3>
                        <ul>
                        	<li><a href="search_artist.php" class="report">Manage</a></li>
                        </ul>
                    </li>-->
                    
					<!--<li><h3><a href="store_vouchers.php" class="house">Vouchers</a></h3>
                        <ul>
                        	<li><a href="store_vouchers.php" class="report">Add</a></li>
							
							<li><a href="store_voucher_list.php" class="report">Download</a></li>
                        </ul>
                    </li>-->
					<li><h3><a class="house" href="user_content_reviews.php">Reviews</a></h3>
						<ul>
							<li><a class="report" href="user_content_reviews.php">Manage</a></li>
							<li><a class="report" href="user_content_review_report_abuse.php">Abuse Report</a></li>
						</ul>
					</li>
					<li><h3><a class="house" href="music_album_of_the_month.php">Miscellaneous</a></h3>
						<ul>
							<li><a class="addorder" href="music_album_of_the_month.php">Album of the Month</a></li>
							<li><a class="addorder" href="video_album_of_the_month.php">Video of the Month</a></li>
							<li><a class="addorder" href="track_album_of_the_week.php">Track of the Week</a></li>
                            <li><a class="addorder" href="artist_album_of_the_month.php">Artist of the Month</a></li>
                            <li><a class="addorder" href="purge.php">Purge URL</a></li>
                            <li><a class="addorder" href="filteredip.php">Filter IP</a></li>
							<!-- <li><a href="answer_list.php" class="addorder">Answers</a></li> -->
                            <li><a class="addorder" href="question_list.php">FAQs</a></li>
                             <li><a class="addorder" href="filter_store_content.php">Filter store content</a></li>
                       </ul>
					</li>
                    
					<li><h3><?php echo CHtml::link('Add/Edit contact info', CController::createUrl('contactforminfo/update/id/1'), array('class'=>'report')); ?></h3>
						<ul>
							<li><?php echo CHtml::link('Add/Edit contact info', CController::createUrl('contactforminfo/update/id/1'), array('class'=>'report')); ?></li>
						</ul>
					</li>
                    <li><h3><a class="house" href="movie_search.php">Movies</a></h3>
						<ul>
							<li><a class="addorder" href="movie_hd_banner.php">HD Home</a></li>
						</ul>
                        <ul>
							<li><a class="addorder" href="movie_home_slider_banner.php">SD Home</a></li>
						</ul>
                         <ul>
							<li><?php echo CHtml::link('Movie Query Manager', CController::createUrl('TblPageMaster/Movie_query_listing'), array('class'=>'report')); ?></li>
						</ul>
                        <ul>
							<li><?php echo CHtml::link('Add Genre Banner', CController::createUrl('TblGenreMaster/add_genre_banner'), array('class'=>'report')); ?></li>
						</ul>
					</li>
                     <li><h3><?php echo CHtml::link('Upcoming events', CController::createUrl('UpcEvents/create'), array('class'=>'report')); ?>Events</a></h3>
						<ul>
							<li><?php echo CHtml::link('Upcoming events', CController::createUrl('UpcEvents/create'), array('class'=>'report')); ?></li>
						</ul>
                      </li>
                    <li><h3><a class="house" href="Thenews.php">News</a></h3>                    
                    
                    <ul>
							<li><?php echo CHtml::link('add news', CController::createUrl('Thenews/create'),array('class'=>'addorder'));?></li>
						</ul>
                    
                    
                    </li>
                    
				</ul> 
                	      
          </div>
					
					</div>
	
														<!-----   -->


	<div id="footer">
	<!--	Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>-->
	</div><!-- footer -->

</div><!-- page -->

</body>
<?php /*
=======
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />

	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="container">
<div id="header">
        	<h2><img width="300" height="100" border="0" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/Hlogo.png"></h2><br>
					
   			 <div id="topmenu">
           														
																		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Dashboard', 'url'=>array('site/index')),
				array('label'=>'Store Manager', 'url'=>array('Schedule/admin')),
				array('label'=>'Query Manager', 'url'=>array('Smspush/admin')),
				
				array('label'=>'Banners', 'url'=>array('banner/list')),
				array('label'=>'Reviews', 'url'=>array('Smspush/admin')),
				array('label'=>'Miscellaneous', 'url'=>array('Smspush/admin')),
				array('label'=>'Contact info', 'url'=>array('contactforminfo/create')),
				array('label'=>'Movies', 'url'=>array('Smspush/admin')),
				array('label'=>'Games', 'url'=>array('Smspush/admin')),
				array('label'=>'Events', 'url'=>array('UpcEvents/create')),
				array('label'=>'News', 'url'=>array('Thenews/admin')),
			),
		));
		 ?>
          </div>
      	</div>
<!-- header -->

<!-- mainmenu -->
	<div id="top-panel">
            <div id="panel">
                <ul>
                <?php 
								if(!Yii::app()->user->isGuest){
								?>
                    <li><?php echo CHtml::link('Change Password', CController::createUrl('user/changepassword'), array('class'=>'report')); ?></li>
								<?php } ?>
								<?php 
								if(!Yii::app()->user->isGuest){
								?>
                    <li><?php echo CHtml::link('Logout', CController::createUrl('default/logout'), array('class'=>'report')); ?></li>
								<?php } ?>
									<?php 
								if(Yii::app()->user->isGuest){
								?>
                    <li><a href="login" class="report_seo">Login</a></li>
								<?php } ?>
								
																														                </ul>
            </div>
      	</div>
															<div id="wrapper">
																							<div id="content">
																										<?php $this->widget('zii.widgets.CBreadcrumbs', array(
																							'links'=>$this->breadcrumbs,
																						)); ?><!-- breadcrumbs -->

																						<?php echo $content; ?>
																							</div>
																				
																						<div id="sidebar">
			            	<form method="post" action="store_select.php" name="frmChangeStore">
				<ul>
                	<li>
                    	<select onchange="document.frmChangeStore.submit();" name="storeid">
                        	<option value="1##global">Global</option><option value="2##hungamauk">Hungamauk</option><option value="3##bacardi">Bacardi</option><option value="5##artistaloud">Artistaloud</option><option value="6##hungamaus">Hungamaus</option><option selected="selected" value="7##tataphoton">Tataphoton</option><option value="8##hungamabrunei">Hungamabrunei</option><option value="9##hungamauae">Hungamauae</option><option value="10##hungamamalaysia">Hungamamalaysia</option><option value="11##pepsiindia">Pepsiindia</option><option value="12##kuwait">Kuwait</option><option value="13##hungamasingapore">Hungamasingapore</option><option value="14##brewindia">Brewindia</option><option value="15##samsungindia">Samsungindia</option><option value="16##ndtvindia">Ndtvindia</option><option value="17##ndtvus">Ndtvus</option><option value="18##airtel3g">Airtel3g</option><option value="19##vu">Vu</option><option value="20##reliancegsm">Reliancegsm</option><option value="21##reliance3g">Reliance3g</option><option value="22##aircel3g">Aircel3g</option><option value="23##vodafone3g">Vodafone3g</option><option value="24##tunewiki">Tunewiki</option><option value="25##lgeindia">Lgeindia</option><option value="26##blackberrylounge">Blackberrylounge</option><option value="27##airtelbb">Airtelbb</option><option value="28##tatadocomoodp">Tatadocomoodp</option><option value="29##docomo3g">Docomo3g</option><option value="30##mtsindia">Mtsindia</option><option value="31##lgtvindia">Lgtvindia</option><option value="32##trueroots">Trueroots</option><option value="33##spicegang">Spicegang</option><option value="34##docomovideo">Docomovideo</option><option value="35##nokianolt">Nokianolt</option><option value="36##kiosk">Kiosk</option><option value="37##truerootsuk">Truerootsuk</option><option value="38##truerootsgermany">Truerootsgermany</option><option value="39##truerootsfr">Truerootsfr</option><option value="40##truerootssng">Truerootssng</option><option value="41##truerootshk">Truerootshk</option><option value="42##truerootsca">Truerootsca</option><option value="43##docomodc">Docomodc</option><option value="44##9xm">9xm</option><option value="45##samsungtv">Samsungtv</option>                        	
                        </select>
                    </li>
                </ul>
                </form>
			  				<ul>
                	<li><h3><a class="house" href="store_home.php">Dashboard</a></h3>
                        <ul>
                        	<li><a class="search" href="store_home.php">Change Password</a></li>
                            <li><?php echo CHtml::link('Logout', CController::createUrl('default/logout'), array('class'=>'report')); ?></li>
								
                        </ul>
                    </li>
					<li><h3><a class="house" href="store_config.php">Store Manager</a></h3>
                        <ul>
                        	<li><a class="search" href="store_config.php">Configuration</a></li>
                            <li><a class="search" href="store_content_type.php">Content Type</a></li>
							<li><a class="search" href="store_category.php">Categories</a></li>
                            <li><a class="search" href="plan_list.php">Plan List</a></li>
                            <li><a class="search" href="top_search_content.php">Top Searches</a></li>
							                            <!--<li><a href="store_payment_mode_mapping.php" class="search">Payment Mode Type</a></li>-->
							<!--<a href="store_pricing.php" class="search">Change Pricing</a></li>-->
                        </ul>
                    </li>
					<li><h3><a class="house" href="query_manager.php">Query Manager</a></h3>
                        <ul>
                        	<li><a class="report" href="query_manager.php">Queries</a></li>
							<li><a class="report" href="container_list.php">Container</a></li>
						    <li><a class="report" href="template_list.php">Templates</a></li>
							<li><a class="report" href="container_template_mapping.php">Mapping</a></li>
                            <li><a class="report" href="add_edit_promotions.php">Promotions</a></li>
                        </ul>
                    </li>
					<li><h3><a class="house" href="banner_list.php">Banners</a></h3>
                        <ul>
                        	<li><?php echo CHtml::link('Manage', CController::createUrl('banner/list'), array('class'=>'report')); ?></li>
							<li><?php echo CHtml::link('Flash Banners', CController::createUrl('FlashBannerList/list'), array('class'=>'report')); ?></li>			
							
                            <li><?php echo CHtml::link('Homepage', CController::createUrl('homepageLeftBottom/addimage'), array('class'=>'report')); ?></li>
							<li><?php echo CHtml::link('Homepage Flash', CController::createUrl('tb1HomeFlashBanner/home_flash_banner'), array('class'=>'report')); ?></li>
                            
                        </ul>
                    </li>
                    
					<!--<li><h3><a href="search_artist.php" class="house">Artist</a></h3>
                        <ul>
                        	<li><a href="search_artist.php" class="report">Manage</a></li>
                        </ul>
                    </li>-->
                    
					<!--<li><h3><a href="store_vouchers.php" class="house">Vouchers</a></h3>
                        <ul>
                        	<li><a href="store_vouchers.php" class="report">Add</a></li>
							
							<li><a href="store_voucher_list.php" class="report">Download</a></li>
                        </ul>
                    </li>-->
					<li><h3><a class="house" href="user_content_reviews.php">Reviews</a></h3>
						<ul>
							<li><a class="report" href="user_content_reviews.php">Manage</a></li>
							<li><a class="report" href="user_content_review_report_abuse.php">Abuse Report</a></li>
						</ul>
					</li>
					<li><h3><a class="house" href="music_album_of_the_month.php">Miscellaneous</a></h3>
						<ul>
							<li><a class="addorder" href="music_album_of_the_month.php">Album of the Month</a></li>
							<li><a class="addorder" href="video_album_of_the_month.php">Video of the Month</a></li>
							<li><a class="addorder" href="track_album_of_the_week.php">Track of the Week</a></li>
                            <li><a class="addorder" href="artist_album_of_the_month.php">Artist of the Month</a></li>
                            <li><a class="addorder" href="purge.php">Purge URL</a></li>
                            <li><a class="addorder" href="filteredip.php">Filter IP</a></li>
							<!-- <li><a href="answer_list.php" class="addorder">Answers</a></li> -->
                            <li><a class="addorder" href="question_list.php">FAQs</a></li>
                             <li><a class="addorder" href="filter_store_content.php">Filter store content</a></li>
                       </ul>
					</li>
                    
					<li><h3><a class="house" href="contactinfo_add.php">Contact Info</a></h3>
						<ul>
							<li><a class="addorder" href="contactinfo_add.php">Add /Edit Contact Info</a></li>
						</ul>
					</li>
                    <li><h3><a class="house" href="movie_search.php">Movies</a></h3>
						<ul>
							<li><a class="addorder" href="movie_hd_banner.php">HD Home</a></li>
						</ul>
                        <ul>
							<li><a class="addorder" href="movie_home_slider_banner.php">SD Home</a></li>
						</ul>
                         <ul>
							<li><a class="addorder" href="movie_query_listing.php">Movie Query Manager</a></li>
						</ul>
                        <ul>
							<li><a class="addorder" href="add_genre_banner.php">Add Genre Banner</a></li>
						</ul>
					</li>
                     <li><h3><a class="house" href="movie_search.php">Events</a></h3>
						<ul>
							<li><?php echo CHtml::link('Upcoming events', CController::createUrl('UpcEvents/create'), array('class'=>'report')); ?></li>
						</ul>
                      </li>
                    <li><h3><a class="house" href="Thenews.php">News</a></h3>                    
                    
                    <ul>
							<li><?php echo CHtml::link('add news', CController::createUrl('Thenews/create'),array('class'=>'addorder'));?></li>
						</ul>
                    
                    
                    </li>
                    
				</ul> 
                	      
          </div>
					
					</div>
	
														<!-----   -->


	<div id="footer">
	<!--	Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>-->
	</div><!-- footer -->

</div><!-- page -->

</body>
>>>>>>> .r1130 */ ?>
</html>