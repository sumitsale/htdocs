<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $this->detail['detail'][0]['place_name']; ?></title>
		<link href='images/favicon.jpg' rel='icon'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
			<?php require_once Yii::app()->theme->basePath . '/include/scripts.php'; ?>
			
	</head>
	<!--body oncontextmenu="return false"-->
	<body class="body">
		<section class="pagewidth">
			
			<?php require_once Yii::app()->theme->basePath . '/include/header_inner.php'; ?>
				
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
					<div class="advt_col">
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
							<span class="strike"><strike>Rs. <?php echo $random_package[0]['pricing_with_out_offer']; ?></strike></span>
							<span class="price">Rs. <?php echo $random_package[0]['pricing']; ?></span>
							<span>(Per Person)</span>
							<a href="<?php echo Yii::app()->createUrl('contact_us/index',array('id'=>$random_package[0]['package_id'],'type'=>'packages')); ?>" class="red" title="ENQUIRE">ENQUIRE</a>
								<a href="<?php echo Yii::app()->createUrl('packages/detail',array(
														'category'=>str_replace('&','and',str_replace(' ','-',strtolower($random_package[0]['category_name']))),'name'=>strtolower(str_replace('&','and',str_replace(' ','-',$random_package[0]['package_name']).'-'.str_replace(' ','',$random_package[0]['package_night']).'-'.str_replace(' ','',$random_package[0]['package_day']))))); ?>" class="grey" title="View Details">View Details</a>
							<!--<a href="" class="grey" title="Book Online">Book Online</a>-->
						</div>
						
					</div>
					
						<div class="advtWrap margin_top">
						<div class="advertise">
							<h4><?php echo $random_hotel[0]['hotel_name']?></h4>
							
							<img src="<?php echo Yii::app()->baseUrl; ?>/images/hotel/<?php echo $random_hotel[0]['thumbnail']; ?>" width="198" height="134">
							<!--<span class="strike"><strike><?php //echo $random_hotel[0]['pricing_with_out_offer']; ?></strike></span>-->
							<span class="price">Rs. <?php echo $random_hotel[0]['start_price']; ?></span>
							<span>(Per Room Per Night)</span>
							<a href="<?php echo Yii::app()->createUrl('Contact_us/index',array('id'=>$random_hotel[0]['hotel_id'],'type'=>"hotel")); ?>" class="red" title="ENQUIRE">ENQUIRE</a>
								<a href="<?php echo Yii::app()->createUrl('Hotels/detail',
													  array(
													  'category'=>strtolower(str_replace('&','and',str_replace(' ','-',$random_hotel[0]['city']))),
													  'name'=>strtolower(str_replace('&','and',str_replace(' ','-',$random_hotel[0]['hotel_name']))))); ?>" class="grey" title="View Details">View Details</a>
							<!--<a href="" class="grey" title="Book Online">Book Online</a>-->
						</div>
						
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
