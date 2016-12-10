
<?php
//echo "<pre>";print_r($result);exit;
 ?>
<div class="col_two">
						<h2><!--<span>Places</span>--> <?php echo $result['detail'][0]['place_name']; ?></h2>
						<div class="breadcrums">
							<ul class="breadcrumb">
								<li><a href="<?php echo Yii::app()->createUrl('site/index'); ?>">Home</a>&raquo;</li>
								<li><a href="<?php echo Yii::app()->createUrl('Places_to_visit/index'); ?>" class="">Place to visit</a>&raquo;</li>
								<li><a href="javascript:void(0);" class="active"><?php echo $result['detail'][0]['place_name']; ?></a></li>
								
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
							<div class="margin-top-30 left places_detail">
								<?php echo $result['detail'][0]['description']; ?>
								
							</div>
						</div>
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
		  </script>
		 