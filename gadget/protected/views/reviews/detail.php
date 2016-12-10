<section class="wrapper colZero col24">
                <div class="colZero col24 grabSpecPage">
                    <div class="colZero col24 gadgetWrap">
					
					<?php $thumbnail_big = json_decode($data['detail'][0]['thumbnail_big'],true);

						// echo "<pre>";
						// print_r($thumbnail_big);exit;
					if(count($thumbnail_big)>0) {  ?>
					
					
                        <div class="colZero col16 gadgetSlider">
                            <ul class="brandSlides">
								<?php for($i=0;$i<count($thumbnail_big);$i++) { ?>
								
								<li><img src="<?php echo Yii::app()->baseUrl; ?>/images/review/big_thumbnail/<?php echo $thumbnail_big[$i]; ?>" title="" /></li>
                               
								<?php } ?>	
								
                            </ul>
                        </div>
						
						<?php } else { ?>
						
                        <div class="colZero col16 gadgetSlider">
                            <ul class="brandSlides">
                                <li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/brands/brand-slides/slide-02.jpg" title="" /></li>
                                <li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/brands/brand-slides/slide-01.jpg" title="" /></li>
                                <li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/brands/brand-slides/slide-02.jpg" title="" /></li>
                            </ul>
                        </div>
						
						<?php } ?>
						
						
                        <div class="colZero col8 grabDetails relative">
                            <div class="specificDetails absolute colZero col24 mCustomScrollbar reviewDetails">
                                <h1><?php echo $data['detail'][0]['title'];    ?></h1>
                                <div class="price"><span class="INR">Rs.</span><?php echo $data['detail'][0]['price']; ?>/-</div>
                                <div class="colZero col24 row2">
                                    <div class="colZero col12 gadgetBy">
                                        By Smargadget, <?php echo $data['detail'][0]['relased_date']; ?> ago,
                                    </div>
                                    <div class="colZero col12 status">
                                        Available: <?php echo $data['detail'][0]['available']; ?> | Comments: 45
                                    </div>
                                </div>
                                <div class="colZero col24 desc">
                                    <?php echo html_entity_decode($data['detail'][0]['description']); ?> </div>
                            </div>
                            <ul class="gadgetTab absolute colZero col24">
                                <li class="colZero col24 text-center">
                                    <a href="javascript:void(0);" class="displayBlock showComntsModal">Comments</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="articleContainer colZero col24">
                        <div class="centerContLarge">
                            <div class="colZero col24">
                                <div class="articleHeader">More Popular review</div>
                               
								 <?php if(count($data['list'])>0) { ?>
								 
							   <ul id="grid" class="grid articleGrid articleGridCol1 reviews effect-2">
									<?php for($i=0;$i<count($data['list']);$i++) { ?>
								   <li class="review_list">
                                        <article class="post">
                                            <div class="articleImgContainer colZero col24">
                                                <a href="grab-it.html">
                                                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/review/thumbnail/<?php echo $data['list'][$i]['thumbnail']; ?>" alt="" />
                                                </a>
                                            </div>
                                            <div class="articleContentWrapper colZero col24">
                                                <h3><a href="grab-it.html"><?php echo $data['list'][$i]['title']; ?></a></h3>
                                                <div class="colZero col24 released">
                                                    <span class="key">Release Date:</span>
                                                    <span class="value"><?php echo date('d M Y',strtotime($data['list'][$i]['date_added']));?>4</span>
                                                </div>
                                                <div class="colZero col24 reviewStatus">
                                                    <span class="key">Available:</span>
                                                    <span class="value"><?php echo $data['list'][$i]['available']; ?></span>
                                                </div>
                                            </div>
                                            <div class="postHover">
                                                <div class="colZero col24 brandConfig">
                                                    <h3 class="colZero col24 brandName">Nexus 6</h3>
                                                    <div class="colZero col24 row">
                                                        <div class="desc">Basic Information will be placed here</div>
                                                    </div>
                                                    <div class="colZero col24 row">
                                                        <div class="key">Configration</div>
                                                        <div class="value">Android 2.0</div>
                                                        <div class="value">4.5 Hd display</div>
                                                        <div class="value">1 Gb Ram</div>
                                                        <div class="value">Quad core processor</div>
                                                    </div>
                                                    <div class="colZero col24 row">
                                                        <div class="key">Accessories</div>
                                                        <div class="value">Headphone, Charges with usb,</div>
                                                    </div>
                                                </div>

                                                <div class="actionRow colZero col24 text-center">
                                                    <a href="<?php echo Yii::app()->createUrl('reviews/detail',array('id'=>$data['list'][$i]['id']))?>" class="btn btn-primary btn-primary-hover-none fullWidth">Know More</a>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
									<?php } ?>
                                   
                                </ul>
								
								<script type="text/javascript">
									

								 var flag = false;
								 var id = "<?php echo $data['detail'][0]['id']; ?>";
								
								 var limit = 16;
								 var start_index = 0;
								 
									
								$(document).ready(function() {
								 
								$(window).scroll(function() {
										  // make sure u give the container id of the data to be loaded in.
										  if ($(window).scrollTop() + $(window).height() > $("#grid").height() && flag == false) {
											
											flag = true;
											
											var start = parseInt(limit)+ parseInt(start_index);
											// alert(start);
											// return false;
											start_index = start;
											var dataString = 'start='+start+'&id='+id;;
			
													$.ajax
												({
													type: "POST",
													url: "<?php echo CController::createUrl("reviews/detailpagination"); ?>",
													data: dataString,
													success: function(data) 
													{
													
													if(data.indexOf("No result found") >= 0)
													{
													
														flag = true;
														return false;
													}
													
													// alert(data);
													
													// $("ul#grid").prepend(data);
													
													var oldhtml = $("ul#grid").html();
													$("ul#grid").html(oldhtml + data);

													setTimeout(function() {
														  // Do something after 5 seconds
													}, 2000);
													
													  new AnimOnScroll(document.getElementById('grid'), {
														minDuration: 0.4,
														maxDuration: 0.7,
														viewportFactor: 0.2
													});
													
													flag = false;
													}
												})
										  }
								});
								 
								});

							</script>
								
								<?php }  else { } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>