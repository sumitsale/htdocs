<div class="col_two">
						<h2><span><?php echo $result['detail'][0]['hotel_name']; ?></span></h2>
						<div class="breadcrums">
							<ul class="breadcrumb">
									<li><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">Home</a>&raquo;</li>
								<li><a href="<?php echo Yii::app()->createUrl('Hotels/index'); ?>" class="">Andaman Holiday Hotel</a>&raquo;</li>
								<li><a href="javascript::void(0);" class="active"><?php echo $result['detail'][0]['hotel_name']; ?></a></li>
								
							</ul>
						</div>
						<div class="hotel_overview" id="hotel_overview">
							<div class="banner_wrap">
								<div class="banner">
									<div class="slider">
										<ul>
											<?php 
											// echo "<pre>"; print_r($result);exit;
											for($i=1;$i<5;$i++) { ?>
										
											<?php if(isset($result['detail'][0]['thumbnail_'.$i]) && $result['detail'][0]['thumbnail_'.$i] !='') { ?>
											
											
											<li> 	
													<a href="javascript::void(0);"> 
														<img src="<?php echo Yii::app()->baseUrl; ?>/images/hoteldetail/<?php echo $result['detail'][0]['thumbnail_'.$i]; ?>"  height="354" alt=""> 
													</a> 
											</li>
											
											
											<?php } ?>
										<?php } ?></ul>
										<div class="dots"> <a href="javascript:void(0);" rel="0" class="cur"></a> <a href="javascript:void(0);" rel="1"></a> <a href="javascript:void(0);" rel="2"></a> <a href="javascript:void(0);" rel="3"></a> </div>
										<div class="arrow"> <a href="javascript:void(0);" class="btn-left"></a> <a href="javascript:void(0);" class="btn-right"></a> </div>
									</div>
								</div>
							</div>
							<div class="hotel_over_wrapper">
								<div class="hotel_nav">
									<ul>
										<li class="active"><a href="#">hotel overview</a></li>
										<li><a href="#room_type">Room types</a></li>
										<li><a href="#hotel_aminities">Hotel Aminities</a></li>
										<li><a href="#" data-reveal-id="myModal">Cancelation policy</a></li>
									</ul>
								</div>
								<div class="hotel_Overview">
									<h2>Hotel <span>Overview</span></h2>
									<ul>
										<li><?php  echo $result['detail'][0]['overview_paragraph_1']; ?>
										</li>
										<li><?php  echo $result['detail'][0]['overview_paragraph_2']; ?>
										</li>
										<li><?php  echo $result['detail'][0]['overview_paragraph_3']; ?>
										</li>
									</ul>
								</div>
								
								<?php for($i=0;$i<count($result['hotel_room']);$i++) {  
								
								$room_amunities = explode(',',$result['hotel_room'][$i]['room_amunities']);
								// echo "<pre>";
								
								?>
								
								<div class="room_type" id="room_type">
									<h2>Room <span>Type: </span><?php echo $result['hotel_room'][$i]['room_type']; ?></h2>
									<div class="room_aminitis">
										<div class="cols fulLwidth left">
											<div class="col-one">
												<img src="<?php echo Yii::app()->baseUrl; ?>/images/hoteldetail/<?php echo $result['hotel_room'][$i]['thumbnail']; ?>" alt="" width="217" height="129">
											</div>
											<div class="col-two pad_both">
												<h4>Room Aminities</h4>
												<ul>
													<li <?php  if(in_array("Neque porro quisquam1", $room_amunities)) { ?> class="act" <?php } else {  ?> class="inactive" <?php } ?>>Neque porro quisquam1</li>
													<li  <?php  if(in_array("Neque porro quisquam2", $room_amunities)) { ?> class="act" <?php } else {  ?> class="inactive" <?php } ?>>Neque porro quisquam2</li>
													<li  <?php  if(in_array("Neque porro quisquam3", $room_amunities)) { ?> class="act" <?php } else {  ?> class="inactive" <?php } ?>>Neque porro quisquam3</li>
													<li  <?php  if(in_array("Neque porro quisquam4", $room_amunities)) { ?> class="act" <?php } else {  ?> class="inactive" <?php } ?>>Neque porro quisquam4</li>
												</ul>
												<ul class="last">
													<li <?php  if(in_array("Neque porro quisquam", $room_amunities)) { ?> class="act" <?php } else {  ?> class="inactive" <?php } ?>>Neque porro quisquam</li>
													<li <?php  if(in_array("Neque porro quisquam", $room_amunities)) { ?> class="act" <?php } else {  ?> class="inactive" <?php } ?>>Neque porro quisquam</li>
													<li <?php  if(in_array("Neque porro quisquam", $room_amunities)) { ?> class="act" <?php } else {  ?> class="inactive" <?php } ?>>Neque porro quisquam</li>
													<li <?php  if(in_array("Neque porro quisquam", $room_amunities)) { ?> class="act" <?php } else {  ?> class="inactive" <?php } ?>>Neque porro quisquam</li>
													
												</ul>
											</div>
										</div>
										<div class="inclusions grid-1 left">
											
											<h5>Inclusions</h5>
												<p><?php echo $result['hotel_room'][$i]['inclusion']; ?></p>
											
										</div>
										<div class="grid-2 left">
											<div class="price_wrap">
												<span class="value">
													<strike>	
														<?php echo "'Rs.".$result['hotel_room'][$i]['charges']."'"; ?>
													</strike>
												</span>
												<span class="dis_val">Rs. <?php echo $result['hotel_room'][$i]['price_with_offer']; ?> </span>
												<span style="">(Per Room Per Night)</span>
											</div>
											<a data-reveal-id="myModal_<?php echo $i; ?>" href="javascrip:void(0);">ACCOMODATION CHARGES<span> + </span></a>
										</div>
										<div id="myModal_<?php echo $i; ?>" class="reveal-modal">
											<p><?php echo $result['hotel_room'][$i]['accomodation_charges']; ?></p>
										</div>
									</div>
								</div>
								
								<?php } ?>
								
								
								<div class="aminitis" id="hotel_aminities">
									<h2>Hotel <span>Aminities</span></h2>
									<ul class="no-bullet left large-12">
									<?php $hotel_amunities =  explode(',',$result['detail'][0]['hotel_amunities']); 
									
									// echo "<pre>";
									// print_r($hotel_amunities	);exit;
									
									
									$amunitie_ico = array ('Travel Desk'=>'ico_one',
														   'Restaurant'=>'ico_four',
														   'Laundry'=>'ico_seven',
														   '24 Hours Security'=>'ico_ten',
														   'Doctor On Call'=>'ico_twelve',
														   'Wi Fi'=>'ico_fourteen',
														   'Gym'=>'ico_seventeen',
														   '24 Hour Front Desk'=>'ico_two',
														   'Conference Facilitie'=>'ico_five',
														   'Parking'=>'ico_eight',
														   'Catering Services'=>'ico_eleven',
														   'Bar'=>'ico_thirteen',
														   'Internet'=>'ico_fifteen',
														   'Coffee Shop'=>'ico_eighteen',
														   'Air Conditioner'=>'ico_three',
														   'Elevators'=>'ico_six',
														   'Wheel Chair Access'=>'ico_nine',
														   'Benqute Facilities'=>'ico_eleven',
														   'Room Service'=>'ico_eleven',
														   '24 Hour Check in'=>'ico_sixteen',
														   'Pool'=>'ico_nineteen'
														   );
									
									?>
									
									<?php for($i=0;$i<count($hotel_amunities);$i++) { 
									
									if($hotel_amunities[$i] == '0' )
									{
										continue;
									}
									
									?>
										<li>
											<span class="sprite <?php echo $amunitie_ico[$hotel_amunities[$i]]?>"></span>
											<a><?php echo $hotel_amunities[$i]; ?></a>
										</li>
										
									<?php } ?>	
										<!--<li>
											<span class="sprite ico_two"></span>
											<a>24 Hour Front Desk</a>
										</li>
										<li >
											<span class="sprite ico_three"></span>
											<a>Air Conditioner</a>
										</li>
										<li >
											<span class="sprite ico_four"></span>
											<a>Restaurant</a>
										</li>
										<li >
											<span class="sprite ico_five"></span>
											<a>Conference Facilities</a>
										</li>
										<li >
											<span class="sprite ico_six"></span>
											<a>Elevators</a>
										</li>
										<li >
											<span class="sprite ico_seven"></span>
											<a>Laundry</a>
										</li>
										<li >
											<span class="sprite ico_eight"></span>
											<a>Parking</a>
										</li>
										<li >
											<span class="sprite ico_nine"></span>
											<a>Wheel Chair Access</a>
										</li>
										<li >
											<span class="sprite ico_ten"></span>
											<a>24 Hours Security</a>
										</li>
										<li >
											<span class="sprite ico_eleven"></span>
											<a>Catering Services</a>
										</li>
										<li >
											<span class="sprite ico_eleven"></span>
											<a>Benqute Facilities</a>
										</li>
										<li >
											<span class="sprite ico_twelve"></span>
											<a>Doctor On Call </a>
										</li>
										<li >
											<span class="sprite ico_thirteen"></span>
											<a>Bar</a>
										</li>
										<li >
											<span class="sprite ico_eleven"></span>
											<a>Room Service</a>
										</li>
										<li >
											<span class="sprite ico_fourteen"></span>
											<a>Wi Fi</a>
										</li>
										<li >
											<span class="sprite ico_fifteen"></span>
											<a>Internet</a>
										</li>
										<li >
											<span class="sprite ico_sixteen"></span>
											<a>24 Hour Check in</a>
										</li>
										<li >
											<span class="sprite ico_seventeen"></span>
											<a>Gym</a>
										</li>
										<li >
											<span class="sprite ico_eighteen"></span>
											<a>Coffee Shop</a>
										</li>
										<li >
											<span class="sprite ico_nineteen"></span>
											<a>Pool</a>
										</li>-->
										
									</ul>
								</div>
								<div class="accomdation_wrap">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
										quis nostrud exercitation ullamco </p>
								</div>
							</div>
						</div>
					</div>
					<div id="myModal" class="reveal-modal">
						<h1>Hotel Detail</h1>
						<p id="accomodation_changres">Example text</p>
						<a class="close-reveal-modal">&#215;</a>
					</div>
					
					 <script type="text/javascript">
			$(function() {
				// var offset = $("#sidebar").offset();
				// var topPadding = 15;
				// $(window).scroll(function() {
					// if ($(window).scrollTop() > offset.top) {
						// $("#sidebar").stop().animate({
							// marginTop: $(window).scrollTop() - offset.top + topPadding
						// });
					// } else {
						// $("#sidebar").stop().animate({
							// marginTop: 0
						// });
					// };
				// });
			});
		</script>