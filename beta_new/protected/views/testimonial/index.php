<div class="col_two">
						<h2><span></span> Testimonial</h2>
						<div class="breadcrums">
							<ul class="breadcrumb">
								<li><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">Home</a>&raquo;</li>
								<li><a href="<?php echo Yii::app()->createUrl('testimonial/index'); ?>" class="active">Testimonial</a></li>
								
							</ul>
						</div>
						<div class="hotel_overview" id="hotel_overview">
							
							
								<div class="hotel_over_wrapper">
									<div class="hotel_nav">
										
										
									</div>
									<div class="rating resp-tabs-container">
										
										<?php if(count($result['testimonial_list'])>0) { ?>
										
										<?php for($i=0;$i<count($result['testimonial_list']);$i++)  { ?>
										
											<div class="place_visit overView left <?php if(($i+1) == count($result['testimonial_list'])) { echo "last";}?>">
												<div class="full_width testim">
														
													<p>
														<?php echo $result['testimonial_list'][$i]['description']; ?>
													</p>
													<h4><?php echo $result['testimonial_list'][$i]['name']; ?></h4>
													<span class="city"><?php echo $result['testimonial_list'][$i]['location']; ?></span>
													<span class="city"><?php echo $result['testimonial_list'][$i]['date']; ?></span>
												</div>
											</div>
											
										<?php } ?>	
											<!--overview-->
										
										
										<div class="pagi">
											<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">
												<li><a href="<?php echo CController::createUrl("Testimonial/index",array('page'=>($result['curr_page'])-1)); ?>" class="first <?php if($result['curr_page'] == 1) { echo "disable"; } ?>" href="#"></a></li>
												<!--<li><a class="fig"></a></li>-->&nbsp;&nbsp;
												<li><a href="<?php echo CController::createUrl("Testimonial/index",array('page'=>($result['curr_page']+1))); ?>" class="last  <?php if($result['curr_page'] == $result['total_page']) { echo "disable"; } ?>" href="#"></a></li>
											</ul>
										</div>
										
										<?php } else { ?>
									
										<?php } ?>
									
									</div>
									
								</div>
							
						</div>
					</div>