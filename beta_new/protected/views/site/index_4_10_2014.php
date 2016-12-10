<script src="<?php echo Yii::app()->theme->baseUrl; ?>/scripts/jquery.validate.min.js"></script>


<section class="wrapper">
				<div class="row margin_top">
					<div class="left">
						<div class="widgets">
							<div class="wrap">
								<div class="th">
									<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img_andaman_island.jpg" width="219" height="305" alt="">
									<div class="package_wrap ">
										<h4 class="rdusMargn">About <br> Andaman Islands</h4>
											<span>The Andaman and Nicobar Islands were shrouded in mystery for centuries
											because of their inaccessibility. These are the paragon of beauty and present 
											a landscape full with scenic and picturesque extravaganza.</span>
											<a href="#" title="View Detail">View Detail</a>
										
									</div>
									
								</div>
								
							</div>
						
						</div>
						<div class="holiday_destination ">
							<h2><span>BEST</span> HOLIDAY PACKAGES</h2>
							<div class="holiday">
								<ul>
									<?php for($i=0;$i<3;$i++) { ?>
								
									<li class="col-4">
										<div class="wrap">
											<div class="th">
												<img src="<?php echo Yii::app()->baseUrl; ?>/images/package/<?php echo $result['package_listing'][$i]['package_thumbnail']; ?>" width="219" height="259" alt="<?php echo $result['package_listing'][$i]['package_thumbnail']; ?>">
												<div class="package_wrap black  lst">
													<span class="package_head scuba">
														<a target="_blank" href="<?php echo Yii::app()->createUrl('packages/detail',array('id'=>$result['package_listing'][$i]['id'])); ?>"><?php echo $result['package_listing'][$i]['package_name']; ?></a>
													</span>
													<span class="packageContent">
														<span><?php echo $result['package_listing'][$i]['destination']; ?></span>
														<a href="<?php echo Yii::app()->createUrl('packages/detail',array('id'=>$result['package_listing'][$i]['id'])); ?>" title="View Detail">View Detail</a>
													</span>
												</div>
												<div class="package_wrap green">
													<span class="package_head">
														<a target="_blank" href="<?php echo Yii::app()->createUrl('packages/detail',array('id'=>$result['package_listing'][$i]['id'])); ?>"><?php echo $result['package_listing'][$i]['package_name']; ?></a>
													</span>
													<span class="packageContent">
														<?php echo $result['package_listing'][$i]['package_day']; ?> 
														& <?php echo $result['package_listing'][$i]['package_night']; ?>
														<span>Starts at Rs.<?php echo $result['package_listing'][$i]['pricing'].""; ?></span>
													</span>
												</div>
											</div>
											
										</div>
									</li>
									<?php } ?>
								
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="left  margin_top">
						
						
						<!--div class="widgets advt">
							<div class="weather_place"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img_add_banner.jpg" height="303" width="220" alt=""></div>
						</div-->
						
						<div class="widgets">
							<div class="wrap">
								<div class="th">
									<img width="220" height="304" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img_add_banner.jpg" height="303" width="220" alt="">
									<div class="package_wrap black">
										<h3 class="rdusMargn"><br>Special Offer</h3>
											<span>Get 10% off on all Hotels and Packages.</span>
										
									</div>
									</div>
								</div>
								</div>
											
						<div class="holiday_destination holiDay_deal ">
							<h2><span>SPECIAL</span> HONEYMOON PACKAGES
<label style="float:right;margin-right:39px;">WATER SPORTS</label>
</h2>
							<div class="holiday">
								<ul>
									
									<?php for($i=3;$i<5;$i++) { ?>
								
							
									<li class="col-4">
										<div class="wrap">
											<div class="th">
												<img src="<?php echo Yii::app()->baseUrl; ?>/images/package/<?php echo $result['package_listing'][$i]['package_thumbnail']; ?>" width="219" height="259" alt="<?php echo $result['package_listing'][$i]['package_thumbnail']; ?>">
												<div class="package_wrap black  lst">
													<span class="package_head scuba">
														<a target="_blank" href="<?php echo Yii::app()->createUrl('packages/detail',array('id'=>$result['package_listing'][$i]['id'])); ?>"><?php echo $result['package_listing'][$i]['package_name']; ?></a>
													</span>
													<span class="packageContent">
														<span><?php echo $result['package_listing'][$i]['destination']; ?></span>
														<a href="<?php echo Yii::app()->createUrl('packages/detail',array('id'=>$result['package_listing'][$i]['id'])); ?>" title="View Detail">View Detail</a>
													</span>
												</div>
												<div class="package_wrap green">
													<span class="package_head">
														<a target="_blank" href="<?php echo Yii::app()->createUrl('packages/detail',array('id'=>$result['package_listing'][$i]['id'])); ?>"><?php echo $result['package_listing'][$i]['package_name']; ?></a>
													</span>
													<span class="packageContent">
														<?php echo $result['package_listing'][$i]['package_day']; ?> 
														& <?php echo $result['package_listing'][$i]['package_night']; ?>
														<span>Starts at Rs.<?php echo $result['package_listing'][$i]['pricing'].""; ?></span>
													</span>
												</div>
											</div>
											
										</div>
									</li>
									
										<?php } ?>
									<li class="col-4">
										<div class="wrap">
											<div class="th">
												<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img_scuba.jpg" width="219" height="259">
												<div class="package_wrap black lst">
													<span class="package_head scuba">
														<a target="_blank" href="#">Explore Scuba Diving at Andaman Islands</a>
													</span>
													<span class="packageContent">
															<span>Explore the life under the sea at Andaman Islands with Scuba Diving</span>
														<a href="javascript::void(0);" title="View Detail">View Detail</a>
													</span>
												</div>
												<div class="package_wrap red ">
													<span class="package_head">
														<a target="_blank" href="javascript::void(0);">Explore Scuba Diving at Andaman</a>
													</span>
													
												</div>
											</div>
											
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col_six enquiry_form  margin_top">
						
						
						<script>


							$().ready(function() {

$( "#arrival_time" ).datepicker();
			$( "#departure_time" ).datepicker();
							
							
						
							
							$("#reset_form").click(function(){
							
								 $("#quick_enquiry").find("input[type=text], input[type=select], textarea").val("");
													
													$("#adult").val("");
													$("#chiled").val("");
													$('.chosen-select').val("").trigger('chosen:updated');
							
							});
							
							
							$("#quick_enquiry").validate({
								rules: {
									
									first_name: {
										required: true
									
									},
									email: {
										required: true,
										email:true
									
									},
									
									
								},
								messages: {
								
									first_name: {
										required: "Please enter your name."
									
									},
									email: {
										required: "Please enter your emailid.",
										email: 'Invalid e-mail! ' 
									
									},
									
								},
								
								submitHandler: function(form) {
								
								data =	$("#quick_enquiry").serialize();
								
									$.ajax({
										  type: "POST",
										  url: "<?php echo CController::createUrl("site/quick_enquiry"); ?>",
										  data: data,
										  success: function(data) 
											{
											
												if(data == 1)
												{
													//alert("Thank you!We will contact you soon.");
													
													 $("#quick_enquiry").find("input[type=text], input[type=select], textarea").val("");
													
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
							
							<h2><span>Quick</span>Enquiry</h2>
							<form enctype="multipart/form-data" id="quick_enquiry" method="post" action="<?php echo $this->createUrl('/site/quick_enquiry'); ?>">
							<!--form enctype="multipart/form-data" onsubmit="return ValidatForm()" method="post" action="<?php echo $this->createUrl('/site/quick_enquiry'); ?>"-->
								<ul>
									<li class="first_child">
									  <p class="left">
										<input type="text" id="name" class="textfield" placeholder="Name" name="first_name">
									  </p>
									  <p class="pull-right">
										<input type="text" id="email" class="textfield" placeholder="Email Id" name="email">     
									  </p>
									</li>
									<li>
									 
									  <textarea name="address"  placeholder="Address" rows="3" cols="46"></textarea>
									</li>
									<li>
									  <p class="left">
										<input type="text" name ="arrival_date" placeholder="Arrival Date" class="textfield" id="arrival_time" >
										<span class="date_pic"></span>
									  </p>
									  <p class="pull-right">
										<input type="text" placeholder="Departure Date" name="departure_date" id="departure_time"  class="textfield" >
										<span class="date_pic"></span>										
									  </p>
									</li>
									<li>
									  <p class="left">
										<select name="adult" data-placeholder="Adult" class="chosen-select" tabindex="2">
											<option value=""></option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											
										</select>
									  </p>
									  <p class="pull-right">
										<select name="chiled" data-placeholder="Child" class="chosen-select" tabindex="2">
											<option value=""></option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											
										</select> 
									  </p>
									</li>
									<li>
									 
									  <textarea name="comments"  placeholder="Comment" rows="3" cols="46"></textarea>
									</li>
									<li>
									  <input id="reset_form" type="Reset" value="Reset" class="btn black btn-submit">
									  <input type="submit" button="submit" value="Submit" class="btn btn-submit">
									</li>

								  </ul>
								</form>
						
					</div>
					<div class="col_six full_width no_padding">
						<!--div class="col_six margin_top no_padding">
							<div class="testimonial">
								<h2><span>customer</span>testimonials</h2>
								<p class="blockquote">
									We are thankful to MET Holidays for well organized tour 
									plan for our group. The arrangement for our six days tour,
									was very good for hotel stays, Island trips to Havelock,
									and Baratang and Port Blair
								</p>
							</div>
						</div-->
						<div class="col_six margin_top no_padding">
							<div class="testimonial">
								<h2><span>customer</span>testimonials</h2>
								<marquee onmouseout="this.start();" onmouseover="this.stop();" scrollamount="2" direction="up" height="320px">
        <div class="testimonals-list">
          <ul>
            <li><span class="quote-top"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_blackquote_two.png"></span>
              <p>We are thankful to MET Holidays for well organized tour plan for our group. The arrangement
			  for our six days tour, was very good for hotel stays, Island trips to Havelock, and Baratang and Port Blair.
			   <a href="<?php echo Yii::app()->createUrl('Testimonial/index'); ?>" class="test_read">Read More</a>
			  </p>
              <span class="quote-bottom"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_blackquote_one.png"></span> <strong>- Rohit Khanna</strong>
			 </li>
            <li><span class="quote-top"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_blackquote_two.png"></span>
             <p>We are thankful to MET Holidays for well organized tour plan for our group. The arrangement
			  for our six days tour, was very good for hotel stays, Island trips to Havelock, and Baratang and Port Blair.
			   <a href="<?php echo Yii::app()->createUrl('Testimonial/index'); ?>" class="test_read">Read More</a></p>
              <span class="quote-bottom"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_blackquote_one.png"></span> <strong>- Rohit Khanna</strong>
			 </li>
              
            <li><span class="quote-top"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_blackquote_two.png"></span>
             <p>We are thankful to MET Holidays for well organized tour plan for our group. The arrangement
			  for our six days tour, was very good for hotel stays, Island trips to Havelock, and Baratang and Port Blair.
			   <a href="<?php echo Yii::app()->createUrl('Testimonial/index'); ?>" class="test_read">Read More</a></p>
              <span class="quote-bottom"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_blackquote_one.png"></span> <strong>- Rohit Khanna</strong>
			 </li>
              
              
             <li><span class="quote-top"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_blackquote_two.png"></span>
            <p>We are thankful to MET Holidays for well organized tour plan for our group. The arrangement
			  for our six days tour, was very good for hotel stays, Island trips to Havelock, and Baratang and Port Blair.
			   <a href="<?php echo Yii::app()->createUrl('Testimonial/index'); ?>" class="test_read">Read More</a></p>
              <span class="quote-bottom"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_blackquote_one.png"></span> <strong>- Rohit Khanna</strong>
			 </li>
              
              
            <li><span class="quote-top"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_blackquote_two.png"></span>
            <p>We are thankful to MET Holidays for well organized tour plan for our group. The arrangement
			  for our six days tour, was very good for hotel stays, Island trips to Havelock, and Baratang and Port Blair.
			   <a href="<?php echo Yii::app()->createUrl('Testimonial/index'); ?>" class="test_read">Read More</a></p>
              <span class="quote-bottom"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_blackquote_one.png"></span> <strong>- Rohit Khanna</strong>
			 </li> 
                
                
                  <li><span class="quote-top"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_blackquote_two.png"></span>
            <p>We are thankful to MET Holidays for well organized tour plan for our group. The arrangement
			  for our six days tour, was very good for hotel stays, Island trips to Havelock, and Baratang and Port Blair.
			   <a href="<?php echo Yii::app()->createUrl('Testimonial/index'); ?>" class="test_read">Read More</a></p>
              <span class="quote-bottom"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_blackquote_one.png"></span> <strong>- Rohit Khanna</strong>
			 </li>
             <li><span class="quote-top"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_blackquote_two.png"></span>
            <p>We are thankful to MET Holidays for well organized tour plan for our group. The arrangement
			  for our six days tour, was very good for hotel stays, Island trips to Havelock, and Baratang and Port Blair.
			   <a href="<?php echo Yii::app()->createUrl('Testimonial/index'); ?>" class="test_read">Read More</a></p>
              <span class="quote-bottom"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ico_blackquote_one.png"></span> <strong>- Rohit Khanna</strong>
			 </li>
                
              
          </ul>
        </div>
		
		
		
		<script type="text/javascript">
		  $(document).omSlider({
			slider: $('.slider'),
			dots: $('.dots'),
			next:$('.btn-right'),
			pre:$('.btn-left'),
			timer: 5000,
			showtime: 1000
		  });
		  
		  $( '#dl-menu' ).dlmenu({
					animationClasses : { classin : 'dl-animate-in-3', classout : 'dl-animate-out-3' }
				});
				$(".chosen-select").chosen();	 
		  </script> 
        </marquee>
							</div>
						</div>
						
						<div class="col_six margin_top no_padding">
							<div class="Met_holiday">
								<h2><span>why</span>met holidays?</h2>
								<p >
									<ul>
									  <li>
							  	    Best Deals on Hotels at Andaman.
							  	  </li>
							  	  <li>
							  	    Best Rates on Packages.
							  	  </li>
							  	  <li>
							  	    Flexible Payment options.
							  	  </li>
							  	  <li>
							  	    Expert Assistance with Personal Touch.
							  	  </li>
							  	  <li>
							  	    Fast & Transparency in Booking Procedures.
							  	  </li>
							  	  <li>
							  	    Tailor-made tour Itineraries.
							  	  </li>
							  	  <li>
							  	    Exclusive tour Manager during sightseeing.
							  	  </li>
							  	  <li>
							  	    Local Destination management Company.
							  	  </li>
							  	</ul>  
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<a style="display:none" id="sucessclick" data-reveal-id="sucess" href="javascrip:void(0);">sucess</a>
			<div id="sucess" class="reveal-modal">
											<p>Thank you!We will contact you soon.</p>
			</div>
			<a style="display:none" id="errorclick" data-reveal-id="sucess" href="javascrip:void(0);">error</a>
			<div id="sucess" class="reveal-modal">
											<p>Something went wrong.</p>
			</div>
