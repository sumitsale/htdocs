<?php $commanmodel = new Commanmodel(); 
	
	$latest_news = $commanmodel->fetch_latest_news();

?>


<section class="widget latestGadgets colZero col24 ">
                                <h3 class="widgetHeader">Latest News / Gadgets</h3>
                                <ul class="lists colZero col24 mCustomScrollbar">
                                    <?php if(count($latest_news)>0) { ?>
									
									<?php for($i=0;$i<count($latest_news);$i++) { ?>
									
									<li class="colZero col24">
                                        <a href="javascript:void(0);" class="">
                                            <div class="imgWrap FL">
                                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/news/small_thumbnail/<?php echo $latest_news[$i]['thumbnail_small']; ?>" />
                                            </div>
                                            <div class="infoWrap">
                                                <div class="displayTable">
                                                    <div class="tableCell">
                                                        <h3><?php echo $latest_news[$i]['title']; ?></h3>
                                                        <p><?php echo substr(html_entity_decode($latest_news[$i]['description']),0,50); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
									
									<?php } ?>
									
									<?php } ?>
									
                                </ul>
                            </section>