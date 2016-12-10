<div class="col_two">
						<h2><span>ANDAMAN</span> HOTEL INFORMATION</h2>
						<div class="breadcrums">
							<ul class="breadcrumb">
								<li><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">Home</a>&raquo;</li>
								<li><a href="<?php echo Yii::app()->createUrl('Hotels/index'); ?>" class="active">Andaman Hotel Information</a></li>
								
							</ul>
						</div>
						<div class="hotel_overview" id="hotel_overview">
							<!--<div class="banner_wrap">
								<div class="banner">
									<div class="slider">
										<ul>
											<li> <a href="#"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/inner_slider02.jpg"  height="354" alt=""> </a> </li>
											<li> <a href="#"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/inner_slider01.jpg"  height="354" alt=""> </a> </li>
											<li> <a href="#"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/inner_slider02.jpg"  height="354" alt=""> </a> </li>
											<li> <a href="#"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/inner_slider01.jpg"  height="354" alt=""> </a> </li>
										</ul>
										<div class="dots"> <a href="javascript:void(0);" rel="0" class="cur"></a> <a href="javascript:void(0);" rel="1"></a> <a href="javascript:void(0);" rel="2"></a> <a href="javascript:void(0);" rel="3"></a> </div>
										<div class="arrow"> <a href="javascript:void(0);" class="btn-left"></a> <a href="javascript:void(0);" class="btn-right"></a> </div>
									</div>
								</div>
							</div>-->
							
								<div class="hotel_over_wrapper">
									
									<div class="rating resp-tabs-container">
										
										<div>
										
											<?php
											
											// echo "<pre>";
											// print_r($result);exit;
											
										for($i=0;$i<count($result['hotel_listing']);$i++) { ?>
										
											<div class="fortune_resort left">
												<div class="col-one">
													<img src="<?php echo Yii::app()->baseUrl; ?>/images/hotel/<?php echo $result['hotel_listing'][$i]['thumbnail']; ?>"" alt="<?php echo $result['hotel_listing'][$i]['thumbnail']; ?>" width="220" height="149">
												</div>
												<div class="col-two pad_both">
													<div class="for_head">
														<h4><?php echo $result['hotel_listing'][$i]['hotel_name']; ?></h4>
														<span>(<?php echo $result['hotel_listing'][$i]['address']; ?>)</span>
													</div>
													<div class="for_rate">
														<div class="<?php echo $result['hotel_listing'][$i]['rating']; ?>_rateing">
														</div>
													</div>
													<div class="fullwidth">
														<span class="rate"> Starts Of Rs. <?php echo $result['hotel_listing'][$i]['start_price']; ?><br><p>Per Person Per Night</p></br></span>
														<p><?php echo substr($result['hotel_listing'][$i]['description'],0,400); ?>...
														</p>
													</div>
													<div class="fullwidth margin_top">
														<a href="<?php echo Yii::app()->createUrl('Hotels/detail',
														array('name'=>$result['hotel_listing'][$i]['hotel_name'],'id'=>$result['hotel_listing'][$i]['id'])); ?>" class="btn btn-grey" title="View Details">View Details</a>
													  <a class="btn btn-submit" href="<?php echo Yii::app()->createUrl('contact_us/index',array('id'=>$result['hotel_listing'][$i]['id'],'type'=>"hotel")); ?>" title="Enquiry">ENQUIRY</a>
													</div>
												</div>
											</div>
											
											
											<?php } ?>
										
										
										</div>
										
										
									</div>
								</div>
							
						</div>
					</div>
					
					
						<!--<div class="aside pack_detail">
						<div class="advertise">
							<h4>Short Break To Andaman</h4>
							<span class="info">(03 NIGHTS / 04 DAYS)</span>
							<span class="price">Rs, 5400</span>
							<span>(Per Person Per Night)</span>
							<a href="" class="red" title="Enquiry">ENQUIRY</a>
							<a href=""  title="Book Online">Book Online</a>
						</div>
						
					</div>
					<div class="aside margin_top">
						<div class="advertise">
							<h4>Fortune Resort Bay Island</h4>
							<span class="price">Rs, 5400</span>
							<span>Per Person</span>
							<a href="" class="btn btn-submit">ENQUIRY</a>
						</div>
						<div class="advertise margin_top">
							<h4>Why book with us?</h4>
							<ul>
								<li class="active">Expert Assistance with Personal Touch</li>
								<li class="active">Expert Assistance with Personal Touch</li>
								<li class="active">Expert Assistance with Personal Touch</li>
								<li class="active">Expert Assistance with Personal Touch</li>
								<li class="active">Expert Assistance with Personal Touch</li>
							</ul>
						</div>
					</div>-->
