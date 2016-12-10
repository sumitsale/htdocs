 <div class="FL gridsWrap stackDiv ">
 
  <?php if(count($data['list'])>0) { ?>
  
                            <ul id="grid" class="grid articleGrid brandsInnerList effect-2">
                                <li>
                                    <article class="post">
                                        <div class="postHover noHover text-center">
                                            <div class="displayTable brandNames">
                                                <div class="tableCell">
                                                    <h3 class="text-center truncate"><?php echo $master_brand_name; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </li>
								<?php for($i=0;$i<count($data['list']);$i++) { ?>
                             
								<li>
                                    <article class="post">
                                        <div class="articleImgContainer colZero col24">
                                            <a href="javascript:void(0);">
                                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/productbrand/thumbnail/<?php echo $data['list'][$i]['thumbnail']; ?>" alt="" />
                                            </a>
                                        </div>
                                        <div class="articleContentWrapper colZero col24">
                                            <h3><?php echo $data['list'][$i]['product_name']; ?></h3>
                                            <span title="3 Star hotel" class="sprite starRating s3"></span>
                                        </div>
                                        <div class="postHover text-center">
                                            <div class="displayTable brandNames">
                                                <div class="tableCell">
                                                    <h3 class="text-center truncate"><?php echo $data['list'][$i]['master_brand_name']; ?></h3>
                                                    <footer class="linksRow anchorAnimate whiteAnchorAnimt">
                                                        <a href="<?php echo Yii::app()->createUrl('specification/index',array('master_category_name'=>$data['list'][$i]['master_category_name'],
												'master_brand_name'=>$data['list'][$i]['master_brand_name'],'id'=>$data['list'][$i]['id']))?>">Specification</a> | <a href="<?php echo Yii::app()->createUrl('compare/index')?>">Compare</a>
                                                    </footer>
                                                </div>
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
								 
								
								 var limit = 15;
								 var start_index = 0;
									
								$(document).ready(function() {
								 
								$(window).scroll(function() {
										  // make sure u give the container id of the data to be loaded in.
										  if ($(window).scrollTop() + $(window).height() > $("#grid").height() && flag == false) {
											
											flag = true;
											
											var start = parseInt(limit)+ parseInt(start_index);
											
											// // return false;
											start_index = start;
											// alert(start_index);
											var dataString = 'start='+start+'&master_category_name='+master_category_name+'&master_brand_name='+master_brand_name;
			
													$.ajax
												({
													type: "POST",
													url: "<?php echo CController::createUrl("brands/category_pagination"); ?>",
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