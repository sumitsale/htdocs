<!DOCTYPE HTML>
<html>
	<head>
		<title>MET Holiday: Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<?php require_once Yii::app()->theme->basePath . '/include/scripts.php'; ?>
		
		
		
		
	</head>
	<!--body oncontextmenu="return false"-->
	<body>
		<section class="pagewidth">
			
				<?php require_once Yii::app()->theme->basePath . '/include/header_home.php'; ?>
				
			
			<!-- header end here-->
			
				<?php echo $content; ?>
		
			<!-- wrapper end here-->
				<?php require_once Yii::app()->theme->basePath . '/include/footer.php'; ?>
		</section>
		<!--pagewidth end here-->
		
	</body>
</html>