	
									
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
									
									<br>
									<?php 
								
								
								$notes_data_temp = ISSET($result['rate_and_fair_data'][0]['rate_and_fair_notes']) ?$result['rate_and_fair_data'][0]['rate_and_fair_notes'] :'';
								$notes_data = explode("||",$notes_data_temp);
								
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
											<span><?php if(isset($notes_data_content[0])) { echo $notes_data_content[0]; } ?></span><span> : <?php if(isset($notes_data_content[1])) { echo $notes_data_content[1]; } ?></span>
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
								