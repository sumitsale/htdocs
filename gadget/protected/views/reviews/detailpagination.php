<?php if(count($data['list'])>0 ) {?>
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
                               <?php }  } else { ?>
							   
								<?php echo 'No result found'; ?>
							   
							   <?php } ?>
							   
							   