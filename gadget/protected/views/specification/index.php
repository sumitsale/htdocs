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
                                <li><img src="<?php echo Yii::app()->baseUrl; ?>/images/productbrand/big_thumbnail/<?php echo $thumbnail_big[$i]; ?>" title="" /></li>
                                <?php } ?>
                            </ul>
                        </div>
						
						<?php } else {  ?>
						
						
                        <div class="colZero col16 gadgetSlider">
                            <ul class="brandSlides">
                                <li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/brands/brand-slides/slide-02.jpg" title="" /></li>
                                <li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/brands/brand-slides/slide-01.jpg" title="" /></li>
                                <li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/brands/brand-slides/slide-02.jpg" title="" /></li>
                            </ul>
                        </div>
						
						<?php } ?>
						
                        <div class="colZero col8 grabDetails relative">
                            <div class="specificDetails absolute colZero col24 mCustomScrollbar">
                                <h1><?php echo $data['detail'][0]['product_name']; ?></h1>
                                <h3>Gadget Specification</h3>
                                <div class="grabSpecTableWrap">
                                    <table class="specificTable" border="0" cellspacing="0" cellpadding="0">
                                       
									<?php if(count($data['specification_main_category'])>0) { ?>
									
									<?php for($i=0;$i<count($data['specification_main_category']);$i++) {  
									
									$specifiction = $commanmodel->fetch_brand_specification_detail($id,$data['specification_main_category'][$i]['main_title']);
									
									// echo "<pre>";
									// print_r($specifiction);exit;
									?>
									   <tr>
                                            <td>
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
													
													<?php for($j=0;$j<count($specifiction);$j++) { ?>
													
													
													<?php $specifictio_value = explode('||',$specifiction[$j]['specification']); ?>
                                                        <tr>
														<?php if($j == 0) { ?>
                                                            <th class="category" rowspan="9" scope="row"><?php echo $specifiction[$j]['main_title']; ?></th>
                                                        <?php } ?>  
															<td class="key"><?php echo $specifiction[$j]['sub_title']; ?></td>
                                                            <td class="value"><?php echo $specifictio_value[0]; ?></td>
                                                        </tr>
                                                     
													 
													 <?php if(count($specifictio_value)>1) { 
	 // echo "<pre>";print_r($specifictio_value);exit;	
															for($s=1;$s<count($specifictio_value);$s++) {?>
														
														<tr>
                                                            <td class="key">&nbsp;</td>
                                                            <td class="value 1234"><?php echo $specifictio_value[$s]; ?></td>
                                                        </tr>
													 
													 
													 <?php } } ?>
													 
													 <?php } ?>
													 
                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                      <?php } } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="articleContainer colZero col24">
                        <div class="centerContLarge">
                            <div class="colZero col24">
                                <div class="articleHeader">More Popular <?php echo $master_category_name; ?></div>
								
								<?php if(count($data['list'])>0) { ?>
                                
								<ul id="grid" class="grid articleGrid articleGridCol1 reviews effect-2">
                                    
									<?php for($i=0;$i<count($data['list']);$i++) { ?>
									
									<li>
                                        <article class="post">
                                            <div class="articleImgContainer colZero col24">
                                                <a href="grab-it.html">
                                                     <img src="<?php echo Yii::app()->baseUrl; ?>/images/productbrand/thumbnail/<?php echo $data['list'][$i]['thumbnail']; ?>" alt="" />
                                                </a>
                                            </div>
                                            <div class="articleContentWrapper colZero col24">
                                                <h3><a href="grab-it.html"><?php echo $data['list'][$i]['product_name']; ?></a></h3>
                                                <div class="colZero col24 released">
                                                    <span class="key">Release Date:</span>
                                                    <span class="value"><?php echo date("d M Y",strtotime($data['list'][$i]['date_added'])); ?></span>
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
                                                    <a href="review-details.html" class="btn btn-primary btn-primary-hover-none fullWidth">Know More</a>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
									
									 <?php } ?>
									
                                </ul>
								
							<script type="text/javascript">
									

								 var flag = false;
								
								 var master_category_name = "<?php echo $master_category_name; ?>";
								 var master_brand_name = "<?php echo $master_brand_name; ?>";
								 var id = "<?php echo $id; ?>";
								
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
											var dataString = 'start='+start+'&master_category_name='+master_category_name+'&master_brand_name='+master_brand_name+'&id='+id;
			
													$.ajax
												({
													type: "POST",
													url: "<?php echo CController::createUrl("specification/pagination"); ?>",
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