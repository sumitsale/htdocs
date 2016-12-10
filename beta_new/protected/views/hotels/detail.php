<link href='http://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">

<script type="text/javascript">

	function change_price(price)
	{
		
		$("#right_layout_price").text("");
		$("#right_layout_price").text("Rs. "+price);
		
	}

</script>

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
								<div class="hotel_Overview left hotelOverview">
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
									<h2>SELECT YOUR ROOM</h2>
									<div class="room_aminitis">
										<div class="cols fulLwidth left">
											<div class="col-one newRytMrgn">
												<h3><?php echo $result['hotel_room'][$i]['room_type']; ?></h3>
												<img src="<?php echo Yii::app()->baseUrl; ?>/images/hoteldetail/<?php echo $result['hotel_room'][$i]['thumbnail']; ?>" alt="" width="217" height="160">
											</div>
											<div class="col-two pad_both widthChange">
												<div class="inclusions grid-1 left">
													<h5>Inclusions</h5>
													<?php 
													$inclusion = ''; 
													$inclusion = explode("||",$result['hotel_room'][$i]['inclusion']); ?>
													
													<?php 
													
													// echo "<pre>";
													// print_r($inclusion);exit;
													
													?>
													<?php for($l=0;$l<count($inclusion);$l++) { ?>
													<span><?php echo $inclusion[$l]; ?></span>
													<?php } ?>
													<!--<span>Complimentary Breakfast</span>
													<span>Complimentary Breakfast</span>-->
													<span></span>													
													<h3>Get a 10% Discount on Hotel Booking</h3>
												</div>
												
												<div class="inclusions grid-1 left">
													<h5>Exclusions</h5>
													<?php 
													$exclusion = ''; 
													$exclusion = explode("||",$result['hotel_room'][$i]['exclusion']); ?>
													
													<?php 
													
													// echo "<pre>";
													// print_r($inclusion);exit;
													
													?>
													<?php for($l=0;$l<count($exclusion);$l++) { ?>
													<span><?php echo $exclusion[$l]; ?></span>
													<?php } ?>
													<!--<span>Complimentary Breakfast</span>
													<span>Complimentary Breakfast</span>-->
													<span></span>													
													<h3>Get a 10% Discount on Hotel Booking</h3>
												</div>
												<div class="grid-2 left">
													<div class="price_wrap">
                          	<span class="value"><strike><?php echo "Rs.".$result['hotel_room'][$i]['charges'].""; ?></strike></span>
														<span class="dis_val"><i class="fa fa-rupee"></i> <?php echo $result['hotel_room'][$i]['price_with_offer']; ?> </span>
														<span class="term"> (Per Person Per Night )</span>
														<a title="Enquiry" href="javascript:void(0)" onclick="change_price('<?php echo $result['hotel_room'][$i]['price_with_offer']; ?>');" class="btn btn-submit">select</a>
													</div>
													<a href="javascrip:void(0);" data-reveal-id="myModal_<?php echo $i; ?>" class="newPouplink">Additional CHARGES<span> + </span></a>
												</div>
											</div>
										</div>
										
										
										<!--<div class="accomdation_wrap">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
												quis nostrud exercitation ullamco </p>
										</div>-->
									</div>
								</div>
								<?php 
								$accomodation_charges = '';
								$accomodation_charges = json_decode($result['hotel_room'][$i]['accomodation_charges'],true);
								
								// echo "<pre>";
								// print_r($accomodation_charges);exit;
								
								?>
								<div id="myModal_<?php echo $i; ?>" class="reveal-modal">
											<h5>Additional Charges :</h5>
											<table>
												<thead>
													<tr>
														<th>Extra Adult</th>
														<th>Child with bed (CWB)</th>
														<th>Child no bed (CNB)</th>
														
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><?php  if($accomodation_charges['extra_adult']!= '') { echo $accomodation_charges['extra_adult']; } else { echo "&nbsp"; }  ?></td>
														<td><?php  if($accomodation_charges['chiled_with_bed']!= '') { echo $accomodation_charges['chiled_with_bed']; } else { echo "&nbsp"; }  ?></td>
														<td><?php  if($accomodation_charges['chiled_no_bed']!= '') { echo $accomodation_charges['chiled_no_bed']; } else { echo "&nbsp"; }  ?></td>
												    </tr>
												<!--	<tr>
														<td>&nbsp;</td>
														<td>&nbsp;</td>
														<td>&nbsp;</td>
													
													</tr>-->
													
												</tbody>
											</table>
											<label>Note :</label>
											<?php 
												$notes ='';
												$notes = explode("||",$accomodation_charges['notes']);
											?>
											
											
											<ul>
											<?php for($n=0;$n<count($notes);$n++) { ?>
												<li><?php echo $notes[$n]; ?></li>
												<!--<li>Mandatory Meal Supplement if any on Christmas and New Year Eve.</li>
												<li>GST 1.25% on total booking amount.</li>-->
												<?php } ?>
											</ul>
											<a class="close-reveal-modal">&#215;</a>
										</div>
									
								
								<?php } ?>
								
								
								<div class="aminitis" id="hotel_aminities">
									<h2>Hotel <span>Aminities</span></h2>
									<ul class="no-bullet left large-12">
									<?php $hotel_amunities =  explode(',',$result['detail'][0]['hotel_amunities']); 
									
									
									
									
									$amunitie_ico = array ('Travel Desk'=>'ico_one',
														   'Restaurant'=>'ico_four',
														   'Laundry'=>'ico_seven',
														   '24 Hours Security'=>'ico_ten',
														   'Doctor On Call'=>'ico_twelve',
														   'Wi Fi'=>'ico_fourteen',
														   'Gym'=>'ico_seventeen',
														   '24 Hour Front Desk'=>'ico_two',
														   'Conference Facilities'=>'ico_five',
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
								<?php 
								
								
								$notes_data = '';
								$notes_data = explode("||",$result['detail'][0]['notes_data']);
								
								?>
								
								<?php if($notes_data !='' ) { ?>
								
								<div class="aminitis ">
									<ul class="no-bullet left large-12 Aminiti">
										<?php for($nd =0;$nd<count($notes_data);$nd++) { ?>
										
										<?php 
										
										if(empty($notes_data[$nd]))
										{
										continue;
										}
										
										$notes_data_content = '';
										$notes_data_content = explode(':',$notes_data[$nd]);
										
										
										?>
										<li>
											<!--<span><?php //if(isset($notes_data_content[0])) { echo $notes_data_content[0]; } ?></span><span> : <?php //if(isset($notes_data_content[1])) { echo $notes_data_content[1]; } ?></span>-->
											<span><?php if(isset($notes_data[$nd])) { echo $notes_data[$nd]; } ?></span>
										</li>
										<?php } ?>
										<!--<li>
											<span>No. of Rooms</span><span> : 45</span>
										</li>
										<li>
											<span>Check-in time</span><span> : From 12:00 pm</span>
										</li>
										<li>
											<span>Check-out time</span><span> : Until 12:00 pm</span>
										</li>-->
										
									</ul>
								</div>
								
								<?php } ?>
								
								<?php 
								
								// echo "<pre>";
								// print_r($result);exit;
								if($result['detail'][0]['room_amunitie'] !='')
								{ 
								 
								 $room_amunities =explode(',',$result['detail'][0]['room_amunitie']);
								
								?>
								
								<div class="aminitis " id="hotel_aminities">
									<h2>Room <span>Aminities</span></h2>
									<ul class="no-bullet left large-12 Aminitis">
										<li <?php if(in_array("Air Conditioner", $room_amunities)) { ?> class="active" <?php } ?> >
											
											<a>Air Conditioner</a>
										</li>
										<li <?php if(in_array("Electronic Safe", $room_amunities)) { ?> class="active" <?php } ?> >
											
											<a>Electronic Safe</a>
										</li>
										<li <?php if(in_array("Bath Tub", $room_amunities)) { ?> class="active" <?php } ?> >
										
											<a>Bath Tub</a>
										</li>
										<li <?php if(in_array("Tea/Coffee Maker", $room_amunities)) { ?> class="active" <?php } ?> >
											<a>Tea/Coffee Maker</a>
										</li>
										<li <?php if(in_array("Hot & Cold Running Water", $room_amunities)) { ?> class="active" <?php } ?> >
											<a>Hot & Cold Running Water</a>
										</li>
										<li <?php if(in_array("Balcony / Sit Out", $room_amunities)) { ?> class="active" <?php } ?> >
											<a>Balcony / Sit Out</a>
										</li>
										<li <?php if(in_array("Telephone", $room_amunities)) { ?> class="active" <?php } ?> >
											<a>Telephone</a>
										</li>
										<li <?php if(in_array("Intercom", $room_amunities)) { ?> class="active" <?php } ?> >
											<a>Intercom</a>
										</li>
										<li <?php if(in_array("Hot/cold Water Hair Dryer", $room_amunities)) { ?> class="active" <?php } ?> >
											<a>Hot/cold Water Hair Dryer</a>
										</li>
										<li <?php if(in_array("Mineral Water", $room_amunities)) { ?> class="active" <?php } ?> >
											<a>Mineral Water</a>
										</li>
									<li <?php if(in_array("Mini bar", $room_amunities)) { ?> class="active" ><?php } ?> >
											<a>Mini bar</a>
										</li>
										<li <?php if(in_array("Trouser Press", $room_amunities)) { ?> class="active" <?php } ?> >
											<a>Trouser Press</a>
										</li>
										<li <?php if(in_array("Room Service", $room_amunities)) { ?> class="active" <?php } ?> >
											<a>Room Service</a>
										</li>
										<li <?php if(in_array("Satellite television", $room_amunities)) { ?> class="active" <?php } ?> >
											<a>Satellite television</a>
										</li>
										<li <?php if(in_array("Attached Bath", $room_amunities)) { ?> class="active" <?php } ?> >
											<a>Attached Bath</a>
										</li>
										
									</ul>
									
									<?php } ?>
								
								
								<!--div class="accomdation_wrap">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
										quis nostrud exercitation ullamco </p>
								</div-->
								
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
