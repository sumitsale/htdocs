<script>

setTimeout(function(){
			
			
			var stab = <?php echo $activetab; ?>
			
			//alert(stab);
			lis = $("ul.resp-tabs-list > li");
			lis.removeClass("resp-tab-active");
			$("ul.resp-tabs-list li[aria-controls='tab_item-"+stab+"']").addClass("resp-tab-active");
			divs = $("#horizontalTab .resp-tabs-container > div");
			divs.removeClass("resp-tab-content-active").removeAttr("style");
			$("#horizontalTab .resp-tabs-container div[aria-labelledby='tab_item-"+stab+"']").addClass("resp-tab-content-active").attr("style","display: block;");


			}, 1000);


</script>

					<div class="col_two">
						<h2><!--<span>our </span>--><?php echo str_replace("-",' ',$type); ?></h2>
						<div class="breadcrums">
							<ul class="breadcrumb">
								<li><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">Home</a>&raquo;</li>
								<li><a href="<?php echo Yii::app()->createUrl('Packages/index'); ?>" class="active">Packages </a></li>
								
							</ul>
						</div>
						<?php if(count($result['list'])) { ?>
						
						<?php for($i=0;$i<count($result['list']);$i++) { ?>
						
						
						<div class="packages">
							<div class="packages_wrap">
									<div class="place_visit placeVisit left npAlign">
										<div class="place_head">
											<div class="grid_one">
												<h4><?php echo $result['list'][$i]['package_name']; ?></h4>
												<span class="pack">(<?php echo $result['list'][$i]['package_night']; ?> / <?php echo $result['list'][$i]['package_day']; ?> )</span>
											</div>
											<div class="grid_two">
												
											</div>
										</div>
										<div class="col-one">
											<img src="<?php echo Yii::app()->baseUrl; ?>/images/package/<?php echo $result['list'][$i]['package_thumbnail']; ?>" alt="<?php echo $result['list'][$i]['package_thumbnail']; ?>" width="219" height="177">
										</div>
										<div class="col-two pad_both">
											<div class="grid_one">
												
												<label>Destination:</label>
												<span class="dest"><?php echo $result['list'][$i]['destination']; ?></span>
												<div class="key_feature">
													<ul>
														<li><h6>Package Includes:</h6></li>
														<?php //$package_inclusion = explode("||",);?>
														<?php echo substr($result['list'][$i]['key_feature'],0,250); ?>...
														<!--<li>Accommodation</li>
														<li>Transfers</li>
														<li>Sightseeing</li>-->
													</ul>
												</div>
												
												
											</div>
											<div class="grid_two">
												<div class="price_wrap pckNewDiv">
													<span class="value">
													<strike>														
														<?php echo "Rs. ".$result['list'][$i]['pricing_with_out_offer'].""; ?>
													</strike>
													</span>
													<span class="dis_value">
													<?php echo "Rs. ".$result['list'][$i]['pricing'].""; ?>
													</span>
                          <a class="btn btn-grey" href="<?php echo Yii::app()->createUrl('packages/detail',array(
														'category'=>str_replace('&','and',str_replace(' ','-',$type)),'name'=>strtolower(str_replace('&','and',str_replace(' ','-',$result['list'][$i]['package_name']).'-'.str_replace(' ','',$result['list'][$i]['package_night']).'-'.str_replace(' ','',$result['list'][$i]['package_day']))))); ?>" title="View Details">VIEW DETAILS</a>
												</div>
												<div class="btn_wrap left pckLft">
													
													<a class="btn btn-submit" href="<?php echo Yii::app()->createUrl('contact_us/index',array('id'=>$result['list'][$i]['id'],'type'=>'packages')); ?>" title="Enquiry">ENQUIRY</a>
												</div>
											</div>
										</div>
									</div>
									
									
								
							</div>
							
							
						</div>
						
						<?php } } else { } ?>
						
						
						
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
					
