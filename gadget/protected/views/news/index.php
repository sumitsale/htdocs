<div class="FL gridsWrap">
 <?php if(count($data['list'])>0) { ?>
                            <ul id="grid" class="grid articleGrid reviews effect-2">
                                <?php for($i=0;$i<count($data['list']);$i++) { ?>
								<li class="news_list">
                                    <article class="post">
                                        <div class="articleImgContainer colZero col24">
                                            <a href="grab-it.html">
                                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/news/thumbnail/<?php echo $data['list'][$i]['thumbnail']; ?>" alt="" />
                                            </a>
                                        </div>
                                        <div class="articleContentWrapper colZero col24">
                                            <h3><a href="grab-it.html"><?php echo $data['list'][$i]['title']; ?></a></h3>
                                            <div class="colZero col24 released">
                                                <span class="key">Release Date:</span>
                                                <span class="value"><?php echo date('d M Y',strtotime($data['list'][$i]['date_added']));?></span>
                                            </div>
                                            <div class="colZero col24 reviewStatus">
                                               
                                                
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
                                                <a href="<?php echo Yii::app()->createUrl('news/detail',array('id'=>$data['list'][$i]['id']))?>" class="btn btn-primary btn-primary-hover-none fullWidth">Know More</a>
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
													url: "<?php echo CController::createUrl("news/pagination"); ?>",
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