<!DOCTYPE HTML>
<html>
	<head>
		<title>MET Holiday: Package detail</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<?php require_once Yii::app()->theme->basePath . '/include/scripts.php'; ?>
	
	</head>
	
	<!--body oncontextmenu="return false"-->
	<body>
		<section class="pagewidth">
		
				<?php require_once Yii::app()->theme->basePath . '/include/header_inner.php'; ?>
				
			<!-- header end here-->
			
			<section class="wrapper inner_page">
				<div class="row">
					
					
					<?php echo $content; ?>
					
					
						
						
					<?php 
						//echo "<pre>";print_r($this->detaildata);exit;
						?>
						
					<div id="sidebar">
					
					<div class="advtWrap margin_top">
						<div class="advertise">
							<h4><?php echo $this->detaildata['detail'][0]['package_name']?></h4>
							<span class="info">(<?php echo $this->detaildata['detail'][0]['package_night'] ?> / <?php echo $this->detaildata['detail'][0]['package_day'] ?>)</span>
							<img src="<?php echo Yii::app()->baseUrl; ?>/images/package/<?php echo $this->detaildata['detail'][0]['package_thumbnail']; ?>" width="198" height="134">
							<span class="strike"><strike><?php echo $this->detaildata['detail'][0]['pricing_with_out_offer']; ?></strike></span>
							<span class="price">Rs, <?php echo $this->detaildata['detail'][0]['pricing']; ?></span>
							<span>(Per Person Per Night)</span>
							<a href="<?php echo Yii::app()->createUrl('contact_us/index',array('id'=>$this->detaildata['detail'][0]['package_id'],'type'=>'packages')); ?>" class="red" title="Enquiry">ENQUIRY</a>
							<!--<a href="" class="grey" title="Book Online">Book Online</a>-->
						</div>
						
					</div>	
					<div class="aside margin_top">
						
						<div class="advertise margin_top">
							<h4>Why book with us?</h4>
							<ul>
								<li class="active">Expert Assistance with Personal Touch</li>
								<li class="active">Expert Assistance with Personal Touch</li>
								<li class="active">Expert Assistance with Personal Touch</li>
								<li class="active">Expert Assistance with Personal Touch</li>
								<li class="active">Expert Assistance with Personal Touch</li>
							</ul>
						</div>
					</div>
					</div>
				</div>
			</section>
			<!-- wrapper end here-->
			
			<?php require_once Yii::app()->theme->basePath . '/include/footer.php'; ?>
			
		</section>
		<!--pagewidth end here-->
		 <script>
			$(function() {
				$( '#dl-menu' ).dlmenu({
					animationClasses : { classin : 'dl-animate-in-3', classout : 'dl-animate-out-3' }
				});
			});
		</script>
		   <script type="text/javascript">
		  $(document).omSlider({
			slider: $('.slider'),
			dots: $('.dots'),
			next:$('.btn-right'),
			pre:$('.btn-left'),
			timer: 5000,
			showtime: 1000
		  });
		  </script>
		 
	</body>
</html>