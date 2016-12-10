<div class="col_two">
						<h2><span>ANDAMAN</span> HOTEL INFORMATION</h2>
						<div class="breadcrums">
							<ul class="breadcrumb">
								<li><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">Home</a>&raquo;</li>
								<li><a href="<?php echo Yii::app()->createUrl('Hotels/index'); ?>" class="active">Andaman Hotel Information</a></li>
								
							</ul>
						
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
						
								<div id="horizontalTab">
							<div class="hotel_overview" id="hotel_overview">
							
								<div class="hotel_over_wrapper">
								<div class="hotel_nav">
										
										<ul class="resp-tabs-list">
											<li>Port Blair</li>
											<li>Havelock Island</li>
											<li>Neil Island</li>
											<li>Diglipur</li>
											
											
										</ul>
									</div>
									
									<div class="rating resp-tabs-container">
										
										<div>
											<?php for($i=0;$i<count($result['PortBlair']);$i++) { ?>
											<div class="fortune_resort left margin_top <?php if(($i+1) == count($result['PortBlair'])) { echo "last"; } ?>">
												<div class="col-one">
													<img src="<?php echo Yii::app()->baseUrl; ?>/images/hotel/<?php echo $result['PortBlair'][$i]['thumbnail']; ?>" alt="<?php echo $result['PortBlair'][$i]['thumbnail']; ?>" width="220" height="149">
												</div>
												<div class="col-two pad_both">
													<div class="for_head">
														<h4><?php echo $result['PortBlair'][$i]['hotel_name']; ?></h4>
														<span>(<?php echo $result['PortBlair'][$i]['address']; ?>)</span>
													</div>
													<div class="for_rate">
														<div class="<?php echo $result['PortBlair'][$i]['rating']; ?>_rateing">
														</div>
													</div>
													<div class="fullwidth">
														<span class="rate"> Started Of Rs. <?php echo $result['PortBlair'][$i]['start_price']; ?><br><p>Per Person Per Night</p></br></span>
														<p><?php echo $result['PortBlair'][$i]['description']; ?>
														</p>
													</div>
													<div class="fullwidth margin_top">
														<a href="<?php echo Yii::app()->createUrl('Hotels/detail',array('id'=>$result['PortBlair'][$i]['id'])); ?>" class="btn btn-grey" title="View Details">View Details</a>
													  <a class="btn btn-submit" href="<?php echo Yii::app()->createUrl('contact_us/index',array('id'=>$result['PortBlair'][$i]['id'],'type'=>"hotel")); ?>" title="Enquiry">ENQUIRY</a>
													</div>
												</div>
											</div>
											
											
											<?php } ?>
									
										</div>
										<div>
											
											<?php for($i=0;$i<count($result['HavelockIsland']);$i++) { ?>
											
											<div class="fortune_resort left margin_top <?php if(($i+1) == count($result['PortBlair'])) { echo "last"; } ?>">
													<div class="col-one">
													<img src="<?php echo Yii::app()->baseUrl; ?>/images/hotel/<?php echo $result['HavelockIsland'][$i]['thumbnail']; ?>"" alt="<?php echo $result['HavelockIsland'][$i]['thumbnail']; ?>" width="220" height="149">
												</div>
												<div class="col-two pad_both">
													<div class="for_head">
														<h4><?php echo $result['HavelockIsland'][$i]['hotel_name']; ?></h4>
														<span>(<?php echo $result['HavelockIsland'][$i]['address']; ?>)</span>
													</div>
													<div class="for_rate">
														<div class="<?php echo $result['HavelockIsland'][$i]['rating']; ?>_rateing">
														</div>
													</div>
													<div class="fullwidth">
														<span class="rate"> Started Of Rs. <?php echo $result['HavelockIsland'][$i]['start_price']; ?><br><p>Per Person Per Night</p></br></span>
														<p><?php echo $result['HavelockIsland'][$i]['description']; ?>
														</p>
													</div>
													<div class="fullwidth margin_top">
														<a href="<?php echo Yii::app()->createUrl('Hotels/detail',array('id'=>$result['HavelockIsland'][$i]['id'])); ?>" class="btn btn-grey" title="View Details">View Details</a>
													  <a class="btn btn-submit" href="<?php echo Yii::app()->createUrl('contact_us/index',array('id'=>$result['HavelockIsland'][$i]['id'],'type'=>"hotel")); ?>" title="Enquiry">ENQUIRY</a>
													</div>
												</div>
											</div>
											
											<?php } ?>
											
										</div>
										
										
										<div>
											
											<?php for($i=0;$i<count($result['NeilIsland']);$i++) { ?>
											
											<div class="fortune_resort left margin_top <?php if(($i+1) == count($result['PortBlair'])) { echo "last"; } ?>">
													<div class="col-one">
													<img src="<?php echo Yii::app()->baseUrl; ?>/images/hotel/<?php echo $result['NeilIsland'][$i]['thumbnail']; ?>"" alt="<?php echo $result['NeilIsland'][$i]['thumbnail']; ?>" width="220" height="149">
												</div>
												<div class="col-two pad_both">
													<div class="for_head">
														<h4><?php echo $result['NeilIsland'][$i]['hotel_name']; ?></h4>
														<span>(<?php echo $result['NeilIsland'][$i]['address']; ?>)</span>
													</div>
													<div class="for_rate">
														<div class="<?php echo $result['NeilIsland'][$i]['rating']; ?>_rateing">
														</div>
													</div>
													<div class="fullwidth">
														<span class="rate"> Started Of Rs. <?php echo $result['NeilIsland'][$i]['start_price']; ?><br><p>Per Person Per Night</p></br></span>
														<p><?php echo $result['NeilIsland'][$i]['description']; ?>
														</p>
													</div>
													<div class="fullwidth margin_top">
														<a href="<?php echo Yii::app()->createUrl('Hotels/detail',array('id'=>$result['NeilIsland'][$i]['id'])); ?>" class="btn btn-grey" title="View Details">View Details</a>
													  <a class="btn btn-submit" href="<?php echo Yii::app()->createUrl('contact_us/index',array('id'=>$result['NeilIsland'][$i]['id'],'type'=>"hotel")); ?>" title="Enquiry">ENQUIRY</a>
													</div>
												</div>
											</div>
											
											<?php } ?>
											
										</div>
										
										
										<div>
											
											<?php for($i=0;$i<count($result['Diglipur']);$i++) { ?>
											
											<div class="fortune_resort left margin_top <?php if(($i+1) == count($result['PortBlair'])) { echo "last"; } ?>">
													<div class="col-one">
													<img src="<?php echo Yii::app()->baseUrl; ?>/images/hotel/<?php echo $result['Diglipur'][$i]['thumbnail']; ?>"" alt="<?php echo $result['Diglipur'][$i]['thumbnail']; ?>" width="220" height="149">
												</div>
												<div class="col-two pad_both">
													<div class="for_head">
														<h4><?php echo $result['Diglipur'][$i]['hotel_name']; ?></h4>
														<span>(<?php echo $result['Diglipur'][$i]['address']; ?>)</span>
													</div>
													<div class="for_rate">
														<div class="<?php echo $result['Diglipur'][$i]['rating']; ?>_rateing">
														</div>
													</div>
													<div class="fullwidth">
														<span class="rate"> Started Of Rs. <?php echo $result['Diglipur'][$i]['start_price']; ?><br><p>Per Person Per Night</p></br></span>
														<p><?php echo $result['Diglipur'][$i]['description']; ?>
														</p>
													</div>
													<div class="fullwidth margin_top">
														<a href="<?php echo Yii::app()->createUrl('Hotels/detail',array('id'=>$result['Diglipur'][$i]['id'])); ?>" class="btn btn-grey" title="View Details">View Details</a>
													  <a class="btn btn-submit" href="<?php echo Yii::app()->createUrl('contact_us/index',array('id'=>$result['Diglipur'][$i]['id'],'type'=>"hotel")); ?>" title="Enquiry">ENQUIRY</a>
													</div>
												</div>
											</div>
											
											<?php } ?>
											
										</div>
										
										
										
										
									</div>
								</div>
							</div>
						</div>
						
						
					</div>
					
					
					