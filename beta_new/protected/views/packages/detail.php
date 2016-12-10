<script>
</script>


<div class="col_two">
						<h2><?php echo $this->detaildata['detail'][0]['package_name'] ?></h2>
						<div class="breadcrums">
							<ul class="breadcrumb">
								<li><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">Home</a>&raquo;</li>
								<li><a href="<?php echo Yii::app()->createUrl('Packages/index'); ?>" class="active">Packages </a>&raquo;</li>
								<li><a href="javascript::void(0);" class="active"><?php echo $result['detail'][0]['package_name']; ?></a></li>
								
							</ul>
						</div>
						<div class="hotel_overview" id="hotel_overview">
							<div class="banner_wrap">

								
								<div class="banner">
									<div class="callbacks_container">
									  <ul id="slider4" class="rslides">
										<?php for($i=1;$i<5;$i++) { ?>
										
											<?php if(isset($result['detail'][0]['thumbnail_'.$i]) && $result['detail'][0]['thumbnail_'.$i] !='') { ?>
										
										<li>
										  <img src="<?php echo Yii::app()->baseUrl; ?>/images/packagedetail/<?php echo $result['detail'][0]['thumbnail_'.$i]; ?>"  height="300" alt="">
										</li>
											<?php } ?>
										<?php } ?>
									  </ul>
									</div>
								</div>
							</div>
							<div id="horizontalTab">
								<div class="hotel_over_wrapper">
									<div class="hotel_nav">
										
										<ul class="resp-tabs-list">
											<li>Overview</li>
											<li>RATE & FAIR</li>
											<li>ITINERARY</li>
											<li>HOTEL INFORMATION</li>
											
											<?php if($result['detail'][0]['category_name'] == "SPECIAL PACKAGES WITH AIR FAIR") { ?>
												
											<?php } ?>
											
										</ul>
									</div>
									<div class="rating resp-tabs-container rate_and_date">
										<div>
											<div class="place_visit overView left">
												<div class="full_width">
													
													
													<?php  echo $result['detail'][0]['activity']; ?>
													
												</div>
											</div>
											<!--overview-->
											<div class="place_visit overView left">
												<div class="full_width">
														
													<?php echo $result['detail'][0]['description']; ?>
													
												</div>
											</div>
											<!--overview-->
											<div class="place_visit overView left last">
												<div class="full_width">
														
													<?php echo $result['detail'][0]['inclusion']; ?>	
													
												</div>
											</div>
											<!--overview-->
										</div>
										
										
										<div id="rate_fair_detail">
									
									
									<?php if($result['detail'][0]['category_name'] == "HONEYMOON PACKAGES") { ?>
									
									<h3>Rates </h3>
									
									<div class="package_shedule text-overflow">
										<table>
											<thead>
												<tr>
													<th>Package Category</th>
													<th>Cost Per Person Couple</th>
												</tr>
											</thead>
											<?php 
											$rate_emp = isset($result['rate_and_fair_data'][0]['rate']) ? $result['rate_and_fair_data'][0]['rate'] : '';
											$rate = json_decode($rate_emp,true); 

											// ECHO "<PRE>";
											// PRINT_R($rate);EXIT;
											if(isset($rate)) {
											
											?>
											<tbody>
<?php if(isset($rate['luxury_cost_per_couple']) || $rate['luxury_cost_per_couple'] > 0) {?>
												<tr>
													<td>Luxury</td>
													<td><?php  echo $rate['luxury_cost_per_couple']; ?></td>
													
												<tr><?php } ?>
<?php if(isset($rate['delux_cost_per_couple']) || $rate['delux_cost_per_couple'] > 0) {?>
												<tr>
													<td>Deluxe</td>
													<td><?php  echo $rate['delux_cost_per_couple']; ?></td>
													
												<tr><?php } ?>
<?php if(isset($rate['standard_cost_per_couple']) || $rate['standard_cost_per_couple'] > 0)  {?>													
<td>Standard</td>
													<td><?php  echo $rate['standard_cost_per_couple']; ?></td>
													
												</tr><?php } ?>
<?php if(isset($rate['cost_saver_cost_per_couple']) || $rate['cost_saver_cost_per_couple'] > 0)  {?>												
<tr>
													<td>Cost Saver</td>
													<td><?php  echo $rate['cost_saver_cost_per_couple']; ?></td>
													
												</tr><?php } ?>
											</tbody>
											<?php }?>
										</table>
									</div>
									<br>
									<?php 
								
								
								$notes_data_temp = ISSET($result['rate_and_fair_data'][0]['rate_and_fair_notes']) ?$result['rate_and_fair_data'][0]['rate_and_fair_notes'] :'';
								$notes_data = explode("||",$notes_data_temp);
								
								?>
								
								<?php if($notes_data !='' ) { ?>
								
								<h2 style='color:red;'>Note:</h2>
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
											<!--<span><?php //if(isset($notes_data_content[0])) { echo $notes_data_content[0]; } ?></span>
											<span> : <?php //if(isset($notes_data_content[1])) { echo $notes_data_content[1]; } ?></span>-->
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
								
									
									<?php } ?>
									
									<?php if($result['detail'][0]['category_name'] == "HOLIDAY PACKAGES") { ?>
									
									<h3>Rates </h3>
									
									<div class="package_shedule text-overflow">
										<table>
											<thead>
												<tr>
													<th>Package Category</th>
													<th>Cost Per Person Or Twin Sharing</th>
													<th>Extra Adult Sharing Same Room</th>
													<th>Child with Extra Bed/Mattress</th>
													<th>Child without Bed</th>
												</tr>
											</thead>
											 <?php 
											$rate_emp = isset($result['rate_and_fair_data'][0]['rate']) ? $result['rate_and_fair_data'][0]['rate'] : '';
											$rate = json_decode($rate_emp,true); 

											// ECHO "<PRE>";
											// PRINT_R($rate);EXIT;
											if(isset($rate)) {
											
											?>
											<tbody>
												<?php if($rate['luxury_cost_per_person'] > 0 || $rate['luxury_extra_adult'] > 0 || $rate['luxury_chiled_extra_bed'] > 0 || $rate['luxury_chiled_without_bed'] > 0)
												{ ?> 
												<tr>
													<td>Luxury</td>
													<td><?php  echo $rate['luxury_cost_per_person']; ?></td>
													<td><?php  echo $rate['luxury_extra_adult']; ?></td>
													<td><?php  echo $rate['luxury_chiled_extra_bed']; ?></td>
													<td><?php  echo $rate['luxury_chiled_without_bed']; ?></td>
												</tr>
												<?php } ?>
												
												<?php if($rate['delux_cost_per_person'] > 0 || $rate['delux_extra_adult'] > 0 || $rate['delux_chiled_extra_bed'] > 0 || $rate['delux_chiled_without_bed'] > 0)
												{ ?> <tr>
													<td>Deluxe</td>
													<td><?php  echo $rate['delux_cost_per_person']; ?></td>
													<td><?php  echo $rate['delux_extra_adult']; ?></td>
													<td><?php  echo $rate['delux_chiled_extra_bed']; ?></td>
													<td><?php  echo $rate['delux_chiled_without_bed']; ?></td>
												</tr><?php } ?>
												<?php if($rate['standard_cost_per_person'] > 0 || $rate['standard_extra_adult'] > 0 || $rate['standard_chiled_extra_bed'] > 0 || $rate['standard_chiled_without_bed'] > 0)
												{ ?><tr>
													<td>Standard</td>
													<td><?php  echo $rate['standard_cost_per_person']; ?></td>
													<td><?php  echo $rate['standard_extra_adult']; ?></td>
													<td><?php  echo $rate['standard_chiled_extra_bed']; ?></td>
													<td><?php  echo $rate['standard_chiled_without_bed']; ?></td>
												</tr><?php } ?>
												<?php if($rate['cost_saver_cost_per_person'] > 0 || $rate['cost_saver_extra_adult'] > 0 || $rate['cost_saver_chiled_extra_bed'] > 0 || $rate['cost_saver_chiled_without_bed'] > 0)
												{ ?> <tr>
													<td>Cost Saver</td>
													<td><?php  echo $rate['cost_saver_cost_per_person']; ?></td>
													<td><?php  echo $rate['cost_saver_extra_adult']; ?></td>
													<td><?php  echo $rate['cost_saver_chiled_extra_bed']; ?></td>
													<td><?php  echo $rate['cost_saver_chiled_without_bed']; ?></td>
												</tr><?php } ?> 
											</tbody>
											
											<?php } ?>
										</table>
									</div>
									
									
									<?php 
								
								
								$notes_data_temp = ISSET($result['rate_and_fair_data'][0]['rate_and_fair_notes']) ?$result['rate_and_fair_data'][0]['rate_and_fair_notes'] :'';
								$notes_data = explode("||",$notes_data_temp);
								
								?>
								
								<?php if($notes_data !='' ) { ?>
								
								<h2 style='color:red;'>Note:</h2> 
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
											<!--<span><?php //if(isset($notes_data_content[0])) { echo $notes_data_content[0]; } ?></span>
											<span> : <?php //if(isset($notes_data_content[1])) { echo $notes_data_content[1]; } ?></span>-->
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
									
								
								
									
									
									<?php } ?>
									
									
									<?php if($result['detail'][0]['category_name'] == "SPECIAL PACKAGES WITH AIR FAIR") { ?>
									
									<h3>Rates & Dates</h3>
									<h6>Check the rates and avalibility from your nearest city</h6>
									<div class="package_custom">
										<label>Package cost from </label>
										
										<select id="select_city">
										  <option value="">Select Nearest City</option>
										  
										  <?php for($c=0;$c<count($result['city']);$c++) {?>
										 
											<option city_name="<?php echo $result['city'][$c]['name']; ?>" package_id="<?php echo $result['rate_and_fair_data'][0]['package_id'] ?>" <?php if($result['city'][$c]['name'] == $result['rate_and_fair_data'][0]['city']) echo "selected=selected"; ?>
											value="<?php echo $result['city'][$c]['name']; ?>">
												
												<?php echo $result['city'][$c]['name']; ?>
											
											</option>
										  
										  <?php } ?>
										  
										</select> 
										
									</div>
									<div class="package_shedule text-overflow">
										<table>
											<thead>
												<tr>
													<th>Package Category</th>
													<th>Cost Per Person Or Twin Sharing</th>
													<th>Extra Adult Sharing Same Room</th>
													<th>Child with Extra Bed/Mattress</th>
													<th>Child without Bed</th>
												</tr>
											</thead>
											<?php 
											
											$rate_temp = isset($result['rate_and_fair_data'][0]['rate']) ? $result['rate_and_fair_data'][0]['rate']  :''; 
											
											$rate = json_decode($rate_temp); 

											if(isset($rate)) {  
											?>
											<tbody>
												<tr>
													<td>Deluxe</td>
													<td><?php  echo $rate->delux_cost_per_person; ?></td>
													<td><?php  echo $rate->delux_extra_adult; ?></td>
													<td><?php  echo $rate->delux_chiled_extra_bed; ?></td>
													<td><?php  echo $rate->delux_chiled_without_bed; ?></td>
												</tr>
												<tr>
													<td>Standard</td>
													<td><?php  echo $rate->standard_cost_per_person; ?></td>
													<td><?php  echo $rate->standard_extra_adult; ?></td>
													<td><?php  echo $rate->standard_chiled_extra_bed; ?></td>
													<td><?php  echo $rate->standard_chiled_without_bed; ?></td>
												</tr>
												<tr>
													<td>Cost Saver</td>
													<td><?php  echo $rate->cost_saver_cost_per_person; ?></td>
													<td><?php  echo $rate->cost_saver_extra_adult; ?></td>
													<td><?php  echo $rate->cost_saver_chiled_extra_bed; ?></td>
													<td><?php  echo $rate->cost_saver_chiled_without_bed; ?></td>
												</tr>
											</tbody>
											
											<?php } ?>
										</table>
									</div>
									
									<br>
									<?php 
								
								
								$notes_data_temp = ISSET($result['rate_and_fair_data'][0]['rate_and_fair_notes']) ?$result['rate_and_fair_data'][0]['rate_and_fair_notes'] :'';
								$notes_data = explode("||",$notes_data_temp);
								
								?>
								
								<?php if($notes_data !='' ) { ?>
								<h2 style='color:red;'>Note:</h2>
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
											<!--<span><?php //if(isset($notes_data_content[0])) { echo $notes_data_content[0]; } ?></span>
											<span> : <?php //if(isset($notes_data_content[1])) { echo $notes_data_content[1]; } ?></span>-->
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
									
							
									
									<?php } ?>
									
								</div>
										
										
										
										
										<div>
										
										<?php for($i=0;$i<(count($result['itinerary']));$i++) { ?>
										
										
										<?php if(isset($result['itinerary'][$i]['heading']) && $result['itinerary'][$i]['heading']!='')
										
										{

										?>
										
										
										
										
											<div class="place_visit overView left <?php if((count($result['itinerary'])) == ($i+1)) { echo "last";} ?> ">
												<div class="full_width">
													<h4><span class="red_txt">DAY <?php echo ($i+1); ?>:</span> <?php echo $result['itinerary'][$i]['heading']; ?></h4>
													<p>
														<?php echo $result['itinerary'][$i]['description']; ?>
													</p>
													
												</div>
											</div>
													
										<?php } ?>		
										
										<?php } ?>									
											
											
										</div>
										
										<div>
										
										<?php  
													$cost_saver_package = json_decode($result['detail'][0]['cost_saver_package'],true);
													
													 if(count($cost_saver_package['list']) > 0) {
												?>
										
												  <div class="place_visit placeVisit left">
												<div class="packageRageRyt">
												  <h5>Standard Packages Hotels & Details</h5>
												  <div class="clearfix"></div>
												</div>
												<table>
												  <thead>
													<tr>
													  <th>Hotel Names</th>
													  <th>City</th>
													  <th>Room Type</th>
													  <th>No Nights</th>
													</tr>
												  </thead>
												  <?php  
													
													// echo "<pre>";print_r($cost_saver);exit;
													
												  ?>
												  <tbody>
												  
												  <?php if(count($cost_saver_package['list']) > 0) {

														for($cs=0;$cs<count($cost_saver_package['list']);$cs++) { ?>
												  
													<tr>
													  <td><a href="javascript:void(0);" data-reveal-id="hotelPopup_st_<?php echo $cs; ?>"><?php echo $cost_saver_package['list'][$cs]['hotel']; ?></a> or similar</td>
													  <td><?php echo $cost_saver_package['list'][$cs]['city']; ?> </td>
													  <td><?php echo $cost_saver_package['list'][$cs]['room_type']; ?> </td>
													  <td><?php echo $cost_saver_package['list'][$cs]['no_of_nights']; ?> </td>
													  </tr>
													  
													  
									 <?php $hotel_popup_data =  $common_model->hotel_detail_by_name($cost_saver_package['list'][$cs]['hotel']); 
													  
													  // echo "<pre>";print_r($hotel_popup_data );exit;
													  ?>
													  
													  <div id="hotelPopup_st_<?php echo $cs; ?>" class="reveal-modal newHotelPoup">
    	<section class="pagewidth inner_drop">
			
			<!-- header end here-->
			
			<section class="wrapper inner_page">
				<div class="row margin_top">
				<div class="wrap">
					<div class="col_two">
						<div class="hotel_overview" id="hotel_overview">	
							<div class="hotel_over_wrapper">
								<div class="hotel_Overview left hotelOverview">
									<h2>Hotel <span>Overview</span></h2>
								<ul>
										<li><?php  if(isset($hotel_popup_data[0]['overview_paragraph_1'])) {  echo $hotel_popup_data[0]['overview_paragraph_1']; }?>
										</li>
										<li><?php if(isset($hotel_popup_data[0]['overview_paragraph_2'])) {    echo $hotel_popup_data[0]['overview_paragraph_2']; } ?>
										</li>
										<li><?php if(isset($hotel_popup_data[0]['overview_paragraph_3'])) {   echo $hotel_popup_data[0]['overview_paragraph_3']; } ?>
										</li>
									</ul>
								</div>
								
								<?php if(isset($hotel_popup_data[0]['hotel_amunities']) && $hotel_popup_data[0]['hotel_amunities']!='') { ?>
								<div class="aminitis" id="hotel_aminities">
									<h2>Hotel <span>Aminities</span></h2>
									
										<?php $hotel_amunities =  explode(',',$hotel_popup_data[0]['hotel_amunities']); 
									
									
									
									
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
									<ul class="no-bullet left large-12" style="background: none repeat scroll 0px 0px rgb(232, 240, 249); padding-top: 10px; padding-bottom: 10px;">
											


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
										
									</ul>
								</div>
								
								<?php } ?>
								
								<?php if(isset($hotel_popup_data[0]['notes_data']) && $hotel_popup_data[0]['notes_data']!='') { ?>
								
								<?php 
								
								
								$notes_data = '';
								$notes_data = explode("||",$hotel_popup_data[0]['notes_data']);
								
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
											<!--<span>Check-out time</span><span> : Until 12:00 pm</span>-->
											<span><?php if(isset($notes_data[$nd])) { echo $notes_data[$nd]; } ?></span>
										</li>
										<?php } ?>
										
									</ul>
								</div>
								
								<?php } ?>
								
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				</div>
			</section>
			
		</section>
			<a class="close-reveal-modal">&#215;</a>
		</div>
													  
													  
													<?php } } ?>
													
												  </tbody>
												</table>
											  </div>
											  
											  <?php } ?>
											  
											  
											   <?php  
													$standard_package = json_decode($result['detail'][0]['standard_package'],true);
													
													 if(count($standard_package['list']) > 0) {
													
												  ?>
											  
											  
											  <div class="place_visit placeVisit left">
												<div class="packageRageRyt">
												  <h5>Standard Packages Hotels & Details</h5>
												  <div class="clearfix"></div>
												</div>
												<table>
												  <thead>
													<tr>
													  <th>Hotel Names</th>
													  <th>City</th>
													  <th>Room Type</th>
													  <th>No Nights</th>
													</tr>
												  </thead>
												 
												  <tbody>
												  
												  <?php if(count($standard_package['list']) > 0) {

														for($cs=0;$cs<count($standard_package['list']);$cs++) { ?>
												  
													<tr>
													  <td><a href="javascript:void(0);" data-reveal-id="hotelPopup_st_<?php echo $cs; ?>"><?php echo $standard_package['list'][$cs]['hotel']; ?></a> or similar</td>
													  <td><?php echo $standard_package['list'][$cs]['city']; ?> </td>
													  <td><?php echo $standard_package['list'][$cs]['room_type']; ?> </td>
													  <td><?php echo $standard_package['list'][$cs]['no_of_nights']; ?> </td>
													  </tr>
													  
													  
									 <?php $hotel_popup_data =  $common_model->hotel_detail_by_name($standard_package['list'][$cs]['hotel']); 
													  
													  // echo "<pre>";print_r($hotel_popup_data );exit;
													  ?>
													  
													  <div id="hotelPopup_st_<?php echo $cs; ?>" class="reveal-modal newHotelPoup">
    	<section class="pagewidth inner_drop">
			
			<!-- header end here-->
			
			<section class="wrapper inner_page">
				<div class="row margin_top">
				<div class="wrap">
					<div class="col_two">
						<div class="hotel_overview" id="hotel_overview">	
							<div class="hotel_over_wrapper">
								<div class="hotel_Overview left hotelOverview">
									<h2>Hotel <span>Overview</span></h2>
								<ul>
										<li><?php  if(isset($hotel_popup_data[0]['overview_paragraph_1'])) {  echo $hotel_popup_data[0]['overview_paragraph_1']; }?>
										</li>
										<li><?php if(isset($hotel_popup_data[0]['overview_paragraph_2'])) {    echo $hotel_popup_data[0]['overview_paragraph_2']; } ?>
										</li>
										<li><?php if(isset($hotel_popup_data[0]['overview_paragraph_3'])) {   echo $hotel_popup_data[0]['overview_paragraph_3']; } ?>
										</li>
									</ul>
								</div>
								
								<?php if(isset($hotel_popup_data[0]['hotel_amunities']) && $hotel_popup_data[0]['hotel_amunities']!='') { ?>
								<div class="aminitis" id="hotel_aminities">
									<h2>Hotel <span>Aminities</span></h2>
									
										<?php $hotel_amunities =  explode(',',$hotel_popup_data[0]['hotel_amunities']); 
									
									
									
									
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
									<ul class="no-bullet left large-12" style="background: none repeat scroll 0px 0px rgb(232, 240, 249); padding-top: 10px; padding-bottom: 10px;">
											


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
										
									</ul>
								</div>
								
								<?php } ?>
								
								<?php if(isset($hotel_popup_data[0]['notes_data']) && $hotel_popup_data[0]['notes_data']!='') { ?>
								
								<?php 
								
								
								$notes_data = '';
								$notes_data = explode("||",$hotel_popup_data[0]['notes_data']);
								
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
											<!--<span>Check-out time</span><span> : Until 12:00 pm</span>-->
											<span><?php if(isset($notes_data[$nd])) { echo $notes_data[$nd]; } ?></span>
										</li>
										<?php } ?>
										
									</ul>
								</div>
								
								<?php } ?>
								
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				</div>
			</section>
			
		</section>
			<a class="close-reveal-modal">&#215;</a>
		</div>
													  
													  
													<?php } } ?>
													
												  </tbody>
												</table>
											  </div>
											  
											  
											 <?php } ?> 
											  
											  
											  <?php  
													$delux_package = json_decode($result['detail'][0]['delux_package'],true);
													
													if(count($delux_package['list']) > 0) {
												  ?>
											  
											  
											  <div class="place_visit placeVisit left">
												<div class="packageRageRyt">
												<h5>Deluxe Packages Hotels & Details</h5>
												<div class="clearfix"></div>
												</div>
												<table>
												  <thead>
													<tr>
													  <th>Hotel Names</th>
													  <th>City</th>
													  <th>Room Type</th>
													  <th>No Nights</th>
													</tr>
												  </thead>
												  <?php  
													
													
													// echo "<pre>";print_r($cost_saver);exit;
													
												  ?>
												  <tbody>
												  
												  <?php if(count($delux_package['list']) > 0) {

														for($cs=0;$cs<count($delux_package['list']);$cs++) { ?>
												  
													<tr>
													  <td><a href="javascript:void(0);" data-reveal-id="hotelPopup_st_<?php echo $cs; ?>"><?php echo $delux_package['list'][$cs]['hotel']; ?> <a>or similar</td>
													  <td><?php echo $delux_package['list'][$cs]['city']; ?> </td>
													  <td><?php echo $delux_package['list'][$cs]['room_type']; ?> </td>
													  <td><?php echo $delux_package['list'][$cs]['no_of_nights']; ?> </td>
													   </tr>
													  
													  
									 <?php $hotel_popup_data =  $common_model->hotel_detail_by_name($delux_package['list'][$cs]['hotel']); 
													  
													  // echo "<pre>";print_r($hotel_popup_data );exit;
													  ?>
													  
													  <div id="hotelPopup_dl_<?php echo $cs; ?>" class="reveal-modal newHotelPoup">
    	<section class="pagewidth inner_drop">
			
			<!-- header end here-->
			
			<section class="wrapper inner_page">
				<div class="row margin_top">
				<div class="wrap">
					<div class="col_two">
						<div class="hotel_overview" id="hotel_overview">	
							<div class="hotel_over_wrapper">
								<div class="hotel_Overview left hotelOverview">
									<h2>Hotel <span>Overview</span></h2>
								<ul>
										<li><?php  if(isset($hotel_popup_data[0]['overview_paragraph_1'])) {  echo $hotel_popup_data[0]['overview_paragraph_1']; }?>
										</li>
										<li><?php if(isset($hotel_popup_data[0]['overview_paragraph_2'])) {    echo $hotel_popup_data[0]['overview_paragraph_2']; } ?>
										</li>
										<li><?php if(isset($hotel_popup_data[0]['overview_paragraph_3'])) {   echo $hotel_popup_data[0]['overview_paragraph_3']; } ?>
										</li>
									</ul>
								</div>
								
								<?php if(isset($hotel_popup_data[0]['hotel_amunities']) && $hotel_popup_data[0]['hotel_amunities']!='') { ?>
								<div class="aminitis" id="hotel_aminities">
									<h2>Hotel <span>Aminities</span></h2>
									
										<?php $hotel_amunities =  explode(',',$hotel_popup_data[0]['hotel_amunities']); 
									
									
									
									
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
									<ul class="no-bullet left large-12" style="background: none repeat scroll 0px 0px rgb(232, 240, 249); padding-top: 10px; padding-bottom: 10px;">
											


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
										
									</ul>
								</div>
								
								<?php } ?>
								
								<?php if(isset($hotel_popup_data[0]['notes_data']) && $hotel_popup_data[0]['notes_data']!='') { ?>
								
								<?php 
								
								
								$notes_data = '';
								$notes_data = explode("||",$hotel_popup_data[0]['notes_data']);
								
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
											<!--<span>Check-out time</span><span> : Until 12:00 pm</span>-->
											<span><?php if(isset($notes_data[$nd])) { echo $notes_data[$nd]; } ?></span>
										</li>
										<?php } ?>
										
									</ul>
								</div>
								
								<?php } ?>
								
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				</div>
			</section>
			
		</section>
			<a class="close-reveal-modal">&#215;</a>
		</div>
													<?php } } ?>
													
												  </tbody>
												</table>
											  </div>
											  
											  <?php } ?>
											  
										</div>
										
										<script>
										
										
										$( document ).ready(function() {
	  // $( "#select_city" ).change(function() {
	  $( "#select_city" ).live( "change", function( event ) {
	var city_name = $('option:selected', this).attr('city_name');
	var package_id = $('option:selected', this).attr('package_id');
	// alert(city_name+ ' '+ package_id);
	
	
										var dataString = 'city_name='+ city_name+'&package_id='+package_id;
										
											$.ajax
											({
												type: "POST",
												url: "<?php echo CController::createUrl("Packages/change_city"); ?>",
												data: dataString,
												success: function(data) 
												{
											
											// alert(data);
											// return false;
													$('#rate_fair_detail').html("");
													$('#rate_fair_detail').html(data);
												}
											});
	

											});
											
											
											
											  // $( "#select_month" ).change(function() {
											  $( "#select_month" ).live( "change", function( event ) {
	var city_name = $("#select_city option:selected").val();
	var package_id = $('option:selected', this).attr('package_id');
	var month = $('option:selected', this).val();
	// alert(city_name+ ' '+ package_id+' '+month);
	
	
										var dataString = 'city_name='+ city_name+'&package_id='+package_id+'&month='+month;
										
											$.ajax
											({
												type: "POST",
												url: "<?php echo CController::createUrl("Packages/change_month"); ?>",
												data: dataString,
												success: function(data) 
												{
											
											// alert(data);
											// return false;
													$('#rate_and_fair_month').html("");
													$('#rate_and_fair_month').html(data);
												}
											});
	

											});
											});
										
										
									</script>
										
										<?php 
										//if($result['detail'][0]['category_name'] == "SPECIAL PACKAGES WITH AIR FAIR" && count($result['rate_and_fair_data']) >0 ) { 
										?>
											
									
								
								
									<?php 
									// }
									?>
									</div>
								</div>
							</div>
						</div>
					</div>

						<script type="text/javascript">
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true,   // 100% fit in a container
					closed: 'accordion', // Start closed if in accordion view
					activate: function(event) { // Callback function if tab is switched
						var $tab = $(this);
						var $info = $('#tabInfo');
						var $name = $('span', $info);

						$name.text($tab.text());

						$info.show();
					}
				});

			});
		</script> 
		
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
		  

