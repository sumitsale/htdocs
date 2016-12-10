<header>
				<div class="row header">
					<div class="logo_wap">
						<div class="logo">
							<a href="<?php echo Yii::app()->createUrl('site/index'); ?>" title="Mountain Edge">
								<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img_logo.jpg" alt="Logo">
							</a>
							<div class="shadow">
							</div>
						</div>
						
						<div class="navigation">
							<nav>
								<ul class="simple-toggle">
									<li class="drop">
									<a href="<?php echo Yii::app()->createUrl('Places_to_visit/index'); ?>" <?php  if($this->activemenu == "places") { ?> class="active" <?php } ?> title="Places To Visit">Places To  <br/>Visit<span class="ico"></span></a>
										<div class="dropdownContain">
											<div class="dropOut">
												
												<div class="column_two">
													<ul>
														<li><a href="<?php echo Yii::app()->createUrl('Places_to_visit/index',array('type'=>"islands-at-andaman")); ?>">Islands</a></li>
														<li><a href="<?php echo Yii::app()->createUrl('Places_to_visit/index',array('type'=>"beaches-at-andaman")); ?>">Beaches</a></li>
														<li><a href="<?php echo Yii::app()->createUrl('Places_to_visit/index',array('type'=>"monuments-at-andaman")); ?>">Monuments & Museums</a></li>
														<li><a href="<?php echo Yii::app()->createUrl('Places_to_visit/index',array('type'=>"parks-and-shopping-points")); ?>">Parks & Shopping Points</a></li>
													</ul>
												</div>
											</div>
										</div>
									</li>
									<li class="drop"> <a <?php if($this->activemenu =="packages") { ?>class="active" <?php } ?> href="<?php echo Yii::app()->createUrl('Packages/index'); ?>" title="Our Packages">our <br/>packages<span class="ico op"></span> </a> 
										<div class="dropdownContain">
											<div class="dropOut">
												
												<div class="column_two">
													<ul>
														<li><a href="<?php echo Yii::app()->createUrl('Packages/index',array('type'=>'holiday-packages')); ?>">Holiday Packages</a></li>
														<li><a href="<?php echo Yii::app()->createUrl('Packages/index',array('type'=>'honeymoon-packages')); ?>">Honeymoon Packages</a></li>
														<!--<li><a href="<?php echo Yii::app()->createUrl('Packages/index',array('type'=>'confernesep-lanner')); ?>">Conference Planner</a></li>-->
														
														<li><a href="<?php echo Yii::app()->createUrl('Packages/index',array('type'=>'special-packages-with-air-fair')); ?>">Special Packages with Air Fair</a></li>
														<li><a href="<?php echo Yii::app()->createUrl('Packages/index',array('type'=>'water-sports-packages')); ?>">Water Sports Packages</a></li>
													</ul>
												</div>
											</div>
										</div>
									</li>
									<li class="drop"> <a <?php if($this->activemenu =="hotel") { ?>class="active" <?php } ?> href="<?php echo Yii::app()->createUrl('Hotels/index'); ?>" title="Hotells In Andaman">hotels in <br/> andaman<span class="ico hi"></span> </a>
										
									</li>
									<li class="drop"><a <?php if($this->activemenu =="who_we_are") { ?>class="active" <?php } ?>  href="<?php echo Yii::app()->createUrl('Who_we_are/index'); ?>" title="How Are We">WHO WE <br/>ARE<span class="ico haw"></span> </a>
										
									</li>
									
									<li class="drop last"><a <?php if($this->activemenu =="general_info") { ?>class="active" <?php } ?> href="<?php echo Yii::app()->createUrl('General_info/index'); ?>" title="General Information">general<br/> information<span class="ico gi"></span></a>
										
									</li>
									
								</ul>
							</nav>
						</div>
					</div>
					<div class="mobile_menu">
						
						<div id="dl-menu" class="dl-menuwrapper">
							<button class="dl-trigger">Open Menu</button>
							<ul class="dl-menu">
								<li>
									<a href="<?php echo Yii::app()->createUrl('Places_to_visit/index'); ?>">places to visit</a>
									<ul class="dl-submenu">
										<li><a href="javascript:void(0);">Islands</a></li>
										<li><a href="javascript:void(0);">Beaches</a></li>
										<li><a href="javascript:void(0);">Monuments & Museums</a></li>
										<li><a href="javascript:void(0);">Parks & Shopping Points</a></li>
									</ul>
								</li>
								<li>
									<a href="<?php echo Yii::app()->createUrl('Packages/index'); ?>">our packages</a>
									<ul class="dl-submenu">
										<li><a href="javascript:void(0);">Holiday Packages</a></li>
										<li><a href="javascript:void(0);">Honeymoon Packages</a></li>
										<li><a href="javascript:void(0);">Conference Planner</a></li>
										<li><a href="javascript:void(0);">Special Package with Air Fair</a></li>
									</ul>
								</li>
								<li>
									<a href="<?php echo Yii::app()->createUrl('Hotels/index'); ?>">hotels in andaman</a>
									
								</li>
								<li>
									<a href="#">WHO ARE WE</a>
									
								</li>
								<li>
									<a href="<?php echo Yii::app()->createUrl('General_info/index'); ?>">General Information</a>
									
								</li>
							</ul>
						</div>
					<!-- /dl-menuwrapper -->
					</div>
				</div>
				<!--row header end here-->
				
				<div class="row">
					<div class="col-12 tag_line">
						<!--div class="login">
							<div class="right">
								<div class="login right">
									<a href="javascript:void(0);">Login</a>
									<a href="javascript:void(0);">Register</a>
								</div>
								<div class="search_wrap">
									<form>
										<input type="text"  placeholder="SEARCH" class="search" >
										<input type="submit" class="search_btn" value="">
									</form>
								</div>
							</div>
						</div-->
						<!--div class="col-12">
							<h2>Discover Andaman
							<span>CHIDIYA TAPU</span></h2>
						</div-->
					</div>
					<div class="package_panel">
						<div class="left package_box">
							<span class="mob"></span>
							<?php $model =new Common_model; 
						
							$admin_detail = $model->fetch_admin_detail(); 
							?>
							<span class="mobile_no"><?php echo $admin_detail[0]['contact_no']; ?></span>
							
							<a class="email_add" href="mailto:<?php echo $admin_detail[0]['email']; ?>" ><span class="at_the_rate">@</span><?php echo $admin_detail[0]['email']; ?></a>
							
						</div>
						<div class="secondary_nav left">
							<nav>
								<ul class="nav-bar">
									<li class="" ><a href="<?php echo Yii::app()->createUrl('Packages/index',array('type'=>'holiday-packages')); ?>" title="Holiday Packages"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img_coconut_tree.png" alt=""><span>Holiday Packages</span></a></li>
									<li class="" ><a href="<?php echo Yii::app()->createUrl('Packages/index',array('type'=>'honeymoon-packages')); ?>" title="Honeymoon"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img_love.png" alt=""><span>Honeymoon Packages</span></a></li>
 									<li class=""><a href="<?php echo Yii::app()->createUrl('Packages/index',array('type'=>'special-packages-with-air-fair')); ?>" title="Packages WIth Air Fair"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img_bag.png" alt=""><span>Packages with Air Fair</span></a></li>
									<li class=""><a href="<?php echo Yii::app()->createUrl('Water_spot/index'); ?>" title="Scuba Diving"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img_swim.png" alt=""><span>Water Sports Packages</span></a></li>

								</ul>					
							</nav>
						</div>
						<div class="secondary_nav sec_mob left">
							<nav>
								<ul class="nav-bar">
									<li class="" ><a href="<?php echo Yii::app()->createUrl('Packages/index',array('type'=>'holiday-packages')); ?>" title="Holiday Packages"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img_coconut_tree.png" alt=""><span>Holiday Packages</span></a></li>
									<li class="" ><a href="<?php echo Yii::app()->createUrl('Packages/index',array('type'=>'honeymoon-packages')); ?>" title="Honeymoon"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img_love.png" alt=""><span>Honeymoon Packages</span></a></li>
 									<li class=""><a href="<?php echo Yii::app()->createUrl('Packages/index',array('type'=>'special-packages-with-air-fair')); ?>" title="Packages WIth Air Fair"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img_bag.png" alt=""><span>Packages with Air Fair</span></a></li>
									<li class=""><a href="<?php echo Yii::app()->createUrl('Water_spot/index'); ?>" title="Scuba Diving"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img_swim.png" alt=""><span>Water Sports Packages</span></a></li>

								</ul>					
							</nav>
						</div>
					</div>
					
				</div>
				<!--row  end here-->
				<div class="banner">
					<div class="callbacks_container">
						  <ul id="slider4" class="rslides callbacks callbacks1">
							<li id="callbacks1_s0" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 1000ms ease-in-out 0s;" class="">
							  <img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider02.jpg">
							  <p class="caption" style="top: 201px;">Dazzling Andaman<br><span>4 Days &amp; 3 Nigh<br>Starts at Rs.5400/-</span></p>
							</li>
							<li id="callbacks1_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class="callbacks1_on">
							  <img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider01.jpg">
							  <p class="caption" style="top: 201px;">Fabulous Andaman<br><span>5 DAys &amp; 4 Nihts<br>Starts at Rs.6550/-</span></p>
							</li>
							<li id="callbacks1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 1000ms ease-in-out 0s;" class="">
							  <img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider02.jpg">
							  <p class="caption" style="top: 201px;">Romantic Andaman<br><span>5 Days &amp; 4 Nights<br>Starts at Rs.15000/-</span></p>
							</li>
						  </ul><a class="callbacks_nav callbacks1_nav prev" href="#">Previous</a><a class="callbacks_nav callbacks1_nav next" href="#">Next</a>
					</div>
				</div>
				<!--div class="banner">-
					<div class="slider">
						<ul>
							<li> <a href="javascript:void(0);"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/1.jpg"  height="470" alt=""> </a> </li>
							<li> <a href="javascript:void(0);"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/2.jpg"  height="470" alt=""> </a> </li>
							<li> <a href="javascript:void(0);"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/3.jpg"  height="470" alt=""> </a> </li>
							<li> <a href="javascript:void(0);"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/5.jpg"  height="470" alt=""> </a> </li>
							<li> <a href="javascript:void(0);"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/6.jpg"  height="470" alt=""> </a> </li>
						</ul>
						<div class="dots"> <a href="javascript:void(0);" rel="0" class="cur"></a> <a href="javascript:void(0);" rel="1"></a> <a href="javascript:void(0);" rel="2"></a> <a href="javascript:void(0);" rel="3"></a> </div>
						<div class="arrow"> <a href="javascript:void(0);" class="btn-left"></a> <a href="javascript:void(0);" class="btn-right"></a> </div>
					</div>
				</div-->
			
			</header>


<!--script type="text/javascript">
		  $(document).omSlider({
			slider: $('.slider'),
			dots: $('.dots'),
			next:$('.btn-right'),
			pre:$('.btn-left'),
			timer: 5000,
			showtime: 1000
		  });
		  </script-->
		  
<script type="text/javascript">
  $(document).omSlider({
	slider: $('.slider'),
	dots: $('.dots'),
	next:$('.btn-right'),
	pre:$('.btn-left'),
	timer: 5000,
	showtime: 1000
  });
   $("#slider4").responsiveSlides({
		auto: true,
		pager: false,
		nav: true,
		speed: 1000,
		namespace: "callbacks",
		before: function () {
		  $('.events').append("<li>before event fired.</li>");
		},
		after: function () {
		  $('.events').append("<li>after event fired.</li>");
		}
	  });
  </script>
  <script>
		$(".chosen-select").chosen();
</script>		  
		  
