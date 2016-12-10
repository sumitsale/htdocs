

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/jquery.validate.min.js"></script>

<div class="col_two">
						<h2>PLAN<span> MY TRIP</span></h2>
						<div class="breadcrums">
							<ul class="breadcrumb">
								<li><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">Home</a>&raquo;</li>
								<li><a href="<?php echo Yii::app()->createUrl('Contact_us/index'); ?>" class="active">Contact Us</a></li>
								
							</ul>
						</div>
						<div class="hotel_overview Contact">
							<div class="contact_info">
								<p>Thanks for choosing us for planning a trip to Andaman Islands.
								Andaman Islands is much famous for its islands, wide sandy beaches, 
								evergreen dense forest, underwater marine life, history, leisure activities 
								like - water sports, scuba diving, snorkeling, sea walk, fishing, etc and is 
								one of the incredible destination for weekends, short and long vacation, leisure,
								etc. In order to propose a best package on your trip to Andaman islands, please 
								share few detail which help us to design a perfect holiday for your team and family.
								The shared details will not be used for any other marketing purpose.</p>
							</div>
							<div class="contact_info">
								<h3><span>selected</span> enquiry</h3>
								<span><?php echo $result[0]['name']; ?></span>
							</div>
							<script>
							
							$().ready(function() {
							
							$( "#check_in" ).datepicker();
							$( "#check_out" ).datepicker();
							$(".chosen-select").chosen();
							
							$("#enquiry_form").validate({
								rules: {
									
									title: {
										required: true
									
									},
									first_name: {
										required: true
										
									
									},
									last_name: {
										required: true
									
									},
									mobile: {
										required: true,
										minlength:10, 
										maxlength:10, 
										number:true 
									
									},/*
									address: {
										required: true
									
									},
									check_in: {
										required: true
									
									},
									chiled: {
										required: true
									
									},
									check_out: {
										required: true
									
									},
									adult: {
										required: true
									
									},
									chiled: {
										required: true
									
									},
									no_of_room: {
										required: true
									
									},
									estimated_budget: {
										required: true
									
									},
									comments: {
										required: true
									
									},*/
										email_id: {
										required: true,
										email:true
									
									},
									
								},
								messages: {
								
									title: {
										required: "Please select title."
									
									},
									first_name: {
										required: "Please selet first name.",
										
									
									},
									last_name: {
										required: "Please enter your last name."
									
									},
									mobile: {
										required: "Please enter your mobile no.",
										minlength: "Invalid mobile.",
										maxlength: "Invalid mobile.",
										number: "Invalid mobile.",
									
									},/*
									departure_date: {
										required: "Please select your departure date.",
										
									
									},
									address: {
										required: "Please enter your address."
									
									},
										check_in: {
										required: "Please select check in value."
									
									},
									check_out: {
										required: "Please select check out value."
									
									},
										adult: {
										required: "Please select how many adult?"
									
									},
										chiled: {
										required: "Please select how many chiled?"
									
									},	
									no_of_room: {
										required: "Please select no of position"
									
									},
									estimated_budget: {
										required: "Please enter you budget"
									
									},
									comments: {
										required: "Please enter your comments."
									
									},*/
										email_id: {
										required: "Please enter your emailid.",
										email: 'Invalid e-mail! ' 
									
									},
									
								},
								
								submitHandler: function(form) {
								
								data =	$("#enquiry_form").serialize();
								
									$.ajax({
										  type: "POST",
										  url: "<?php echo CController::createUrl("Contact_us/submit"); ?>",
										  data: data,
										  success: function(data) 
											{
											
											
												if(data == 1)
												{
													//alert("Thank you!We will contact you soon.");
													
													 $("#enquiry_form").find("input[type=text], input[type=select], textarea").val("");
													
													$("#adult").val("");
													$("#chiled").val("");
													$('.chosen-select').val("").trigger('chosen:updated');
													
													$( "#sucessclick" ).trigger( "click" );
													
												}
												else
												{
														$( "#errorclick" ).trigger( "click" );
												}
											},
										  error: function(data) 
											{
												//alert("Something went wrong.");
												
												$( "#errorclick" ).trigger( "click" );
											}
										});
									
								  }
								});

	

							});
							</script>
								<form enctype="multipart/form-data" id="enquiry_form" method="post" action="<?php echo $this->createUrl('/Contact_us/submit'); ?>">
									
							
							<div class="personal_detail perDetail">
								<h3><span>Personal </span>Details</h3>
								<div class="contact_form right col-11">
									<ul>
									
									<input type="hidden" name="type" value ="<?php echo $type; ?>" >
									<input type="hidden" name="name" value ="<?php echo $result[0]['name']; ?>" >
											<li class="first_child">
												<label>Title <span class="req">*</span></label>
												<p class="left col_one mar_15left">
													<select name="title" data-placeholder="Mr" class="chosen-select" tabindex="2">
													<option value="Mr">Mr</option>
													<option value="Mrs">Mrs</option>
													
												</select> 
												</p>
											  <p class="left col_two">
												<input name="first_name" type="text" class="textfield" placeholder="First Name" name="first_name">
											  </p>
											 <p class="left col_two">
												<input name="last_name" type="text" class="textfield" placeholder="Last Name" name="last_name">  
												
											  </p>
											</li>
											<li class="first_child">
											<label>Mobile<span class="req">*</span></label>
												<p class="full_width left">
													<input name="mobile" type="text" class="textfield">     
												</p>
											</li>
											<li class="first_child">
											<label>Telephone<span class="req">*</span></label>
												<p class="full_width left">
													<input name="telephone" type="text" class="textfield">     
												</p>
											</li>
											<li class="first_child">
											<label>Email ID  <span class="req">*</span></label>
												<p class="full_width left">
													<input type="text" name="email_id" type="text" class="textfield">    
													<!--<span class="error">Please enter proper mobile number </span>	-->												
												</p>
											</li>
											
											<li>
											<label>Address   <span class="req">*</span></label>
												<p class="full_width left">
													<textarea name="address"  rows="3" cols="46"></textarea>
												</p>
											</li>
											

										  </ul>
										
								</div>
							</div>
							<div class="personal_detail travDetail left">
								<h3><span>Travelers</span> Details</h3>
								<div class="contact_form  right col-11">
									
										<ul>
											<li class="first_child">
											<label>Check In <span class="req">*</span></label>
												<p class="full_width left">
													<input name="check_in" id="check_in" type="text" class="textfield">     
												</p>
											</li>
											<li class="first_child">
											<label>Check Out <span class="req">*</span></label>
												<p class="full_width left">
													<input id="check_out" name="check_out" type="text" class="textfield">     
												</p>
											</li>
											<li class="first_child ">
												<label>No. of Travelers  <span class="req">*</span></label>
												<ul class="detailsform">
													<li class="trv_detail trv">
														<label>Adult</label>
														<p class="left">
															<select name="adult" data-placeholder="0" class="chosen-select" tabindex="2">
																<option value=""></option>
																<option value="0">0</option>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
															</select> 
														</p>
													</li>
													<li class="trv_detail trve">
														<label>Children</label>
														<p class="left">
															<select name="chiled" data-placeholder="0" class="chosen-select" tabindex="2">
																<option value=""></option>
																<option value="0">0</option>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
															</select> 
														</p>
													</li>
													<li class="trv_detail">
														<label>No.of Room</label>
														<p class="left mar_15left">
															<select name="no_of_room" data-placeholder="0" class="chosen-select" tabindex="2">
																<option value=""></option>
																<option value="0">0</option>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
															</select> 
														</p>
													</li>
													
												</ul>
											</li>
											<li class="first_child">
											<label>Estimated Budget<span class="req">*</span></label>
												<p class="full_width left">
													<input name="estimated_budget" type="text" class="textfield">     
												</p>
											</li>
											
											<li>
											<label>Comments & reference <span class="req">*</span></label>
												<p class="full_width left">
													<textarea name="comments" rows="3" cols="46"></textarea>
												</p>
											</li>
											
											
											
											<li class="first_child">
												<label>&nbsp;</label>
												<p class="full_width left">
													<input type="submit" value="Submit" class="btn btn-submit">
												</p>
											</li>
										  </ul>
										
										
										
										
										
								</div>
							</div>
							
							</form>
							
						</div>
					</div>
					
					<a style="display:none" id="sucessclick" data-reveal-id="sucess" href="javascrip:void(0);">sucess</a>
			<div id="sucess" class="reveal-modal">
											<p>Thank you!We will contact you soon.</p>
			</div>
			<a style="display:none" id="errorclick" data-reveal-id="sucess" href="javascrip:void(0);">error</a>
			<div id="sucess" class="reveal-modal">
											<p>Something went wrong.</p>
			</div>
