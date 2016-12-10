
<script>




</script>


<div class="col_two">
						<h2><!--<span>ANDAMAN</span>--><?php echo $this->detaildata['detail'][0]['package_name'] ?></h2>
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
									<div class="slider">
										<ul>
										<?php for($i=1;$i<5;$i++) { ?>
										
											<?php if(isset($result['detail'][0]['thumbnail_'.$i]) && $result['detail'][0]['thumbnail_'.$i] !='') { ?>
											
											<li> 	
													<a href="javascript::void(0);"> 
														<img src="<?php echo Yii::app()->baseUrl; ?>/images/packagedetail/<?php echo $result['detail'][0]['thumbnail_'.$i]; ?>"  height="354" alt=""> 
													</a> 
											</li>
											
											
											<?php } ?>
										<?php } ?>
											
										</ul>
										<div class="dots"> <a href="javascript:void(0);" rel="0" class="cur"></a> <a href="javascript:void(0);" rel="1"></a> <a href="javascript:void(0);" rel="2"></a> <a href="javascript:void(0);" rel="3"></a> </div>
										<div class="arrow"> <a href="javascript:void(0);" class="btn-left"></a> <a href="javascript:void(0);" class="btn-right"></a> </div>
									</div>
								</div>
							</div>
							<div id="horizontalTab">
								<div class="hotel_over_wrapper">
									<div class="hotel_nav">
										
										<ul class="resp-tabs-list">
											<li>Overview</li>
											<li>ITINERARY</li>
											<li>HOTEL INFORMATION</li>
											<?php if($result['detail'][0]['category_name'] == "SPECIAL PACKAGES WITH AIR FAIR") { ?>
												<li>RATE & FAIR</li>
											<?php } ?>
											
										</ul>
									</div>
									<div class="rating resp-tabs-container rate_and_date">
										<div>
											<div class="place_visit overView left">
												<div class="full_width">
														<!--<h4>Ross Island</h4>
													<p>
														Viper Island a small serene, beautiful island and witnessed the untold sufferings of
														the freedom fighters had to undergo. Dangerous convicts found guilty of violating the
														rules of the Penal Settlement, were put in fetters and were forced to work with their
														fetters on in this island. The jail in this island called Viper Chain Gang Jail, where 
														prisoners deported from the mainland during British Regime. The Britishers used to harbour 
														convicts here. The first jail was constructed here which was abandoned after the construction
														of Cellular Jail. It has a gallows atop a hillock, where condemned prisoners were hanged. Sher 
														Ali, who killed Lord Mayo, the Viceroy of India in 1872, was also hanged here.
														The island derives its name from the vessel 'Viper' in which Lt. Archibald Blair came to
														the islands in 1768 with the purpose of establishing a Penal Settlement. The vessel, it is believed,
														met with an accident and its wreckage was abandoned near the island. 
													</p>-->
													
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
										for($i=0;$i<count($result['hotel_listing']);$i++) { ?>
										
											<div class="fortune_resort left <?php if(count($result['hotel_listing']) ==($i+1)) { echo "last";} ?> ">
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
														<!--<span class="rate"> Started Of Rs. <?php echo $result['hotel_listing'][$i]['start_price']; ?><br><p>Per Person Per Night</p></br></span>-->
														<p><?php echo $result['hotel_listing'][$i]['description']; ?>
														</p>
													</div>
													<div class="fullwidth margin_top">
														<a href="<?php echo Yii::app()->createUrl('Hotels/detail',array('id'=>$result['hotel_listing'][$i]['id'])); ?>" class="btn btn-submit" title="View Details">View Details</a>
													</div>
												</div>
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
										
										<?php if($result['detail'][0]['category_name'] == "SPECIAL PACKAGES WITH AIR FAIR" && count($result['rate_and_fair_data']) >0 ) { ?>
											
									<div id="rate_fair_detail">
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
											<?php $rate = json_decode($result['rate_and_fair_data'][0]['rate']);  ?>
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
										</table>
									</div>
									
									<div id="rate_and_fair_month">
									
									<div class="package_custom">
										<label>Month & Date </label>
										
										<?php $current_month = date("m");
	
												$month_name = date('F Y');?>
										<select id="select_month">
										  <option value="">Select Month</option>
										 
										 <?php for($m=$current_month;$m<=(12+$current_month);$m++) {  ?>
										 
											<option package_id="<?php echo $result['rate_and_fair_data'][0]['package_id'] ?>" <?php if($month_name ==  $result['rate_and_fair_data'][0]['default_month']) { echo "selected=selected"; }?> value="<?php echo $month_name; ?>"><?php echo $month_name; ?></option>
										 
										 <?php 
										 
										 $month_name = date("F Y", strtotime("+1 month", strtotime($month_name)));} ?>
										 
										</select> 
									</div>
									<div class="schedule text-overflow">
										
										  <table class="week">
											<thead>
											  <tr class="a">
												<td>Monday</td>
												<td>Tuesday</td>
												<td>Wednesday</td>
												<td>Thursday</td>
												<td>Friday</td>
												<td>Saturday</td>
												<td>Sunday</td>
											  </tr>
											</thead>
										  <tbody>
										  <?php 
										  
										  $available_month = json_decode($result['rate_and_fair_data'][0]['available_date']);
										  
										  // echo "<pre>";
										  // print_r($available_month);exit;
										  
										  $default_month =$result['rate_and_fair_data'][0]['default_month'];
										  
										  $first_day_of_month = date("Y-m-d", mktime(0,0,0,date('m',strtotime($default_month)),1,date('Y',strtotime($default_month))));
										 
										  $last_day_of_month  = date('Y-m-d', mktime(0,0,0,date('m',strtotime($default_month))+1,0,date('Y',strtotime($default_month))));
										 
										  $start_week_no = date('W',strtotime($first_day_of_month));
										  
										  $end_week_no   = date('W',strtotime($last_day_of_month));
										  
										  // echo $start_week_no."<br>";
										  // echo $end_week_no."<br>";exit;
										  
										  if($start_week_no>$end_week_no)
										  {
											$end_week_no  = $start_week_no+4;
										  }
										  
										  for($weekno=$start_week_no;$weekno<=$end_week_no;$weekno++) { 
										  
										  if($weekno > 01 && $weekno<10) 
										  {
											if(strpos($weekno, '0') === false)
											  {
												$weekno= "0".$weekno;
											  }
										  }
										  ?>
										  
											<tr>
											<?php for($day=1;$day<=7;$day++) { ?>
											
											  <td <?php  if(isset($available_month->$default_month)) 
															{ 
																if( in_array(date('d F Y', strtotime(date("Y",strtotime($default_month))."W".$weekno.$day)),$available_month->$default_month)) { echo "class='book'";  } } ?>><?php if($default_month == date('F Y', strtotime(date("Y",strtotime($default_month))."W".$weekno.$day))) 
																
																echo date('d', strtotime(date("Y",strtotime($default_month))."W".$weekno.$day)); ?></td>
											  
											<?php } ?>
											</tr>
											
											<?php } ?>
											<!--<tr>
											  <td class="book">7</td>
											  <td>8</td>
											  <td class="book">9</td>
											  <td class="book">10</td>
											  <td>11</td>
											  <td>12</td>
											  <td>13</td>
											</tr>
											
											<tr>
											  <td >14</td>
											  <td>15</td>
											  <td>16</td>
											  <td>17</td>
											  <td>18</td>
											  <td>19</td>
											  <td>20</td>
											</tr>
											<tr>
											  <td>21</td>
											  <td>22</td>
											  <td>23</td>
											  <td>24</td>
											  <td>25</td>
											  <td>26</td>
											  <td>27</td>
											</tr>
											<tr>
											  <td>28</td>
											  <td>29</td>
											  <td>30</td>
											  <td>31</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											</tr>-->
											</tbody>
										  </table>
										 
										  
									</div>
									<div class="package_custom">
										<label>Available Dates </label>
										<span class="avilable"></span>
									</div>
									
									</div>
									
								</div>
								
								
									<?php } ?>
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
		
					   <script type="text/javascript">
		  $(document).omSlider({
			slider: $('.slider'),
			dots: $('.dots'),
			next:$('.btn-right'),
			pre:$('.btn-left'),
			timer: 5000,
			showtime: 1000
		  });
		  </script>