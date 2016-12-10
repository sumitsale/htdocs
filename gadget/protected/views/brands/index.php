  <div class="FL gridsWrap stackDiv">
  
 <?php if(count($data['list'])>0) { ?>
                            <ul id="grid" class="grid brandsList articleGrid effect-2">
							  <?php for($i=0;$i<count($data['list']);$i++) { ?>
                                <li>
                                    <article class="post">
                                        <div class="articleImgContainer colZero col24">
                                            <a href="<?php echo Yii::app()->createUrl('brands/category')?>">
                                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/productbrand/thumbnail/<?php echo $data['list'][$i]['thumbnail']; ?>" alt="" />
                                            </a>
                                        </div>
                                        <div class="articleContentWrapper colZero col24">
                                            <h3><?php echo $data['list'][$i]['master_brand_name']; ?></h3>
                                            <span title="3 Star hotel" class="sprite starRating s<?php  echo $data['list'][$i]['rating']; ?>"></span>
                                        </div>
                                        <div class="postHover text-center">
                                            <div class="countWrap">
                                                <div class="count colZero col24  displayBlock"><?php echo $commanmodel->brand_count_by_category($data['list'][$i]['master_category_name'],$data['list'][$i]['master_brand_name']); ?></div>
                                                <div class="status colZero col24 displayBlock"><?php echo ucfirst($data['list'][$i]['master_category_name']); ?> are available</div>
                                            </div>
                                            <div class="actionRow colZero col24">
                                                <a href="<?php echo Yii::app()->createUrl('brands/category',array('master_category_name'=>$data['list'][$i]['master_category_name'],
												'master_brand_name'=>$data['list'][$i]['master_brand_name']))?>" class="btn btn-primary btn-primary-hover-none fullWidth">Explore more</a>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                <?php } ?>
								 
                            </ul>





							<script type="text/javascript">
									

								 var flag = false;
								
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
											var dataString = 'start='+start;
				
													$.ajax
												({
													type: "POST",
													url: "<?php echo CController::createUrl("brands/pagination"); ?>",
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
												});
										  }
								});
								 
								});

							</script>
							   
							
							<?php }  else { } ?>

                        </div>
                      