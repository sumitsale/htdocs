<!DOCTYPE HTML>
<html>
		<head>
		<title>MET Holiday : General Information </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
			<?php require_once Yii::app()->theme->basePath . '/include/scripts.php'; ?>
		
		</head>
		<!--body oncontextmenu="return false"-->
		<body>
<section class="pagewidth">
      
	  	<?php require_once Yii::app()->theme->basePath . '/include/header_inner.php'; ?>
		
      <!-- header end here-->
      
	  	<?php echo $content; ?>
  
  
  
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