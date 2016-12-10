<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
		<title>Smart Gadget :: Compare</title>
        
		<meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />       
        
		<?php require_once Yii::app()->theme->basePath . '/include/css.php'; ?>
		<?php require_once Yii::app()->theme->basePath . '/include/script.php'; ?>
		
    </head>
    <body class="">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="  colZero col24">
           <?php require_once Yii::app()->theme->basePath . '/include/header.php'; ?>
           
		   <?php echo $content; ?>
			 
           <?php require_once Yii::app()->theme->basePath . '/include/footer.php'; ?>
        </div>
        
        <script>
            new AnimOnScroll(document.getElementById('grid'), {
                minDuration: 0.4,
                maxDuration: 0.7,
                viewportFactor: 0.2,
               
            });
        </script>

    </body>
</html>
