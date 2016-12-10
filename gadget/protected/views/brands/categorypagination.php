
  <?php if(count($data['list'])>0) { ?>
  
                          
                               
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
                                                        <a href="<?php echo Yii::app()->createUrl('specification/index')?>">Specification</a> | <a href="<?php echo Yii::app()->createUrl('compare/index')?>">Compare</a>
                                                    </footer>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </li>
								
                               <?php } ?>
							
							<?php }  else {  echo 'No result found'; } ?>
					