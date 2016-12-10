<?php if(count($data['list'])>0 ) {?>
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
                                  <?php }  } else { ?>
							   
								<?php echo 'No result found'; ?>
							   
							   <?php } ?>
								 


