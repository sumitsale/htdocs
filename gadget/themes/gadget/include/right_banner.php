<?php $commanmodel = new Commanmodel(); 
	
	$banner = $commanmodel->fetch_banner();

?>

<?php if((count($banner)>0)) { ?>



<section class="widget adds colZero col24">
                                <article class="colZero col24">
                                    <a target="_blank" href="<?php echo $banner[0]['url']; ?>">
										<img class="colZero col24" src="<?php echo Yii::app()->baseUrl; ?>/images/banner/<?php echo $banner[0]['thumbnail']; ?>" />
									</a>
                                </article>
</section>

<?php } else { ?>


<section class="widget adds colZero col24">
                                <article class="colZero col24">
                                    <img class="colZero col24" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/add-banner-01.jpg" />
                                </article>
</section>

<?php } ?>