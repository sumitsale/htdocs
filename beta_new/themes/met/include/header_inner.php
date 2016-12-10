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
									<li class="drop"><a  <?php  if($this->activemenu == "places") { ?> class="active" <?php } ?> href="<?php echo Yii::app()->createUrl('Places_to_visit/index'); ?>"  title="Places To Visit">Places To  <br/>Visit<span class="ico"></span></a>
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
									<li class="drop"> 
									<a <?php if($this->activemenu =="packages") { ?>class="active" <?php } ?> href="<?php echo Yii::app()->createUrl('Packages/index'); ?>" title="Our Packages">our <br/>packages<span class="ico op"></span> </a> 
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
									<li class="drop"><a <?php if($this->activemenu =="who_we_are") { ?>class="active" <?php } ?> href="<?php echo Yii::app()->createUrl('Who_we_are/index'); ?>" title="How Are We">WHO ARE <br/>WE<span class="ico haw"></span> </a>
										
									</li>
									
									<li class="drop last"><a  <?php if($this->activemenu =="general_info") { ?>class="active" <?php } ?> href="<?php echo Yii::app()->createUrl('General_info/index'); ?>" title="General Information">general<br/> information<span class="ico gi"></span></a>
										
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
									<a href="#">our packages</a>
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
									<a href="#">WHO We Are</a>
									
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
			
			
			</header>

