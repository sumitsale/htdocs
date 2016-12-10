<!DOCTYPE HTML>
<html>
	<head>
		<title>MET Holiday: Place to Visit</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
			<?php require_once Yii::app()->theme->basePath . '/include/scripts.php'; ?>
			
	</head>
	<!--body oncontextmenu="return false"-->
	<body class="body">
		<section class="pagewidth">
			
			<?php require_once Yii::app()->theme->basePath . '/include/header_home.php'; ?>
				
			<!-- header end here-->
			
			<section class="wrapper inner_page">
				<div class="row">
					
					
					
				<?php echo $content; ?>
					
					
						<?php 
							$model =new Common_model; 
						
							$random_package = $model->fetch_random_package();
							  $random_hotel = $model->fetch_random_hotel();
						// echo "<pre>";print_r($random_hotel);exit;
						?>
					
					<div id="sidebar" class="">
					<div style="margin-top:1px;"  class="aside pack_detail">
						
						<div class="aside pack_detail">
							<div class="weather_place"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/img_add_banner.jpg" height="303" width="220" alt=""></div>
						</div>
						
					</div>
					<div class="advtWrap margin_top">
						<div class="advertise">
							<h4><?php echo $random_package[0]['package_name']?></h4>
							<span class="info">(<?php echo $random_package[0]['package_night'] ?> / <?php echo $random_package[0]['package_day'] ?>)</span>
							<img src="<?php echo Yii::app()->baseUrl; ?>/images/package/<?php echo $random_package[0]['package_thumbnail']; ?>" width="198" height="134">
							<span class="strike"><strike><?php echo $random_package[0]['pricing_with_out_offer']; ?></strike></span>
							<span class="price">Rs, <?php echo $random_package[0]['pricing']; ?></span>
							<span>(Per Person Per Night)</span>
							<a href="<?php echo Yii::app()->createUrl('contact_us/index',array('id'=>$random_package[0]['package_id'],'type'=>'packages')); ?>" class="red" title="Enquiry">ENQUIRY</a>
							<!--<a href="" class="grey" title="Book Online">Book Online</a>-->
						</div>
						
					</div>
					
					<div class="advtWrap margin_top">
						<div class="advertise">
							<h4><?php echo $random_hotel[0]['hotel_name']?></h4>
							
							<img src="<?php echo Yii::app()->baseUrl; ?>/images/hotel/<?php echo $random_hotel[0]['thumbnail']; ?>" width="198" height="134">
							<!--<span class="strike"><strike><?php //echo $random_hotel[0]['pricing_with_out_offer']; ?></strike></span>-->
							<span class="price">Rs, <?php echo $random_hotel[0]['start_price']; ?></span>
							<span>(Per Person Per Night)</span>
							<a href="<?php echo Yii::app()->createUrl('Contact_us/index',array('id'=>$random_hotel[0]['hotel_id'],'type'=>"hotel")); ?>" class="red" title="Enquiry">ENQUIRY</a>
							<!--<a href="" class="grey" title="Book Online">Book Online</a>-->
						</div>
						
					</div>
					
					
			
					</div>
					
				</div>
			</section>
			<!-- wrapper end here-->
				<?php require_once Yii::app()->theme->basePath . '/include/footer.php'; ?>
		</section>
		<!--pagewidth end here-->
		 
		 
	</body>
</html>