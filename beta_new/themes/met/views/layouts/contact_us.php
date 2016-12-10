<!DOCTYPE HTML>
<html>

	<head>
		<title>MET Holiday: ENQUIRE</title>
		<link href='images/favicon.jpg' rel='icon'>
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
					
					
					<!--<div class="aside pack_detail">
						<div class="advertise">

							<h4>Short Break To Andaman</h4>
							<span class="info">(03 NIGHTS / 04 DAYS)</span>
							<span class="price">Rs, 5400</span>
							<span>(Per Person Per Night)</span>
							<a href="" title="ENQUIRE">ENQUIRE</a>
							<a href="" class="red" title="Book Online">Book Online</a>
						</div>
						
					</div>-->
					
<div class="advt_col">
					<div class="aside margin_top">
					
					
						<!--<div class="advertise">
							<h4>Fortune Resort Bay Island</h4>
							<span class="price">Rs, 5400</span>
							<span>Per Person</span>
							<a href="">ENQUIRE</a>
						</div>-->
						
						
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
