<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
		<title>Smart Gadget :: Review More</title>
        
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
		   <div class="animated ui-modal comntsModal" style="">
                <div class="colZero col24 modal-header">
                    <h3>Your Preciuos Comment</h3>
                </div>
                <form class="comntsForm noBorderForm colZero col24">
                    <div class="colZero col24 modal-body">
                        <div class="colZero col24">
                            <input type="text" class="" placeholder="Your nick name goes here" />
                        </div>
                        <div class="colZero col24">
                            <textarea class="" placeholder="Type your comment here"></textarea>
                        </div>
                    </div>
                    <div class="colZero col24 modal-foooter">
                        <div class="formActionRow colZero col24 text-right">
                            <input type="button" id="" class="btn" name="Submit" onclick="" value="Submit" />
                        </div>
                        <div class="colZero col24 note">
                            Note: Your comment will be posted after reviewing our techincal team.
                        </div>
                    </div>
                </form>
            </div>
            <div class="overlay" style=""></div>
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
