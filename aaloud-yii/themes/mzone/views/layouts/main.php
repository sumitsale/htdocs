<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>M-Zone - Artist Aloud</title>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.jscrollpane.css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/prettyPhoto.css" type="text/css" media="screen" title="" charset="utf-8" />

<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jplayer.css" type="text/css" media="screen" title="" charset="utf-8" />

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/DIN_Medium_500.font.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/organictabs.jquery.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mousewheel.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jscrollpane.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jwplayer.js" type="text/javascript" ></script>
<!--<script src="js/jquery.jplayer.min.js" type="text/javascript">-->
 <script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook', social_tools:false, autoplay_slideshow: false, wmode: 'opaque'});
				$(".preetyPhotoA").prettyPhoto({theme:'facebook', social_tools:false, autoplay_slideshow: false, wmode: 'opaque'});
			});
			</script>
<script type="text/javascript">
        /*Call back for Custom font*/
		Cufon.replace('.font-dinmed');
		/*Tabs call out*/
		 $(function() {
            $("#playlist, #playlist-1").organicTabs({
                "speed": 300
            });
        });
		/*Scroll pane*/
		$(function()
			{
				$('.scroll-pane-after, .scroll-pane-after-1, .scroll-pane-after-2').jScrollPane(
					{
						verticalDragMinHeight: 20,
						verticalDragMaxHeight: 20,
						horizontalDragMinWidth: 20,
						horizontalDragMaxWidth: 20,
						showArrows: true,
						autoReinitialise: true,
						verticalArrowPositions: 'after',
						horizontalArrowPositions: 'after'
					}
				);
			});
</script>
<script type="text/javascript">
$(document).ready(function() {
  //Get all the LI from the #tabMenu UL
  $('#tabMenu li').click(function(){
    //perform the actions when it's not selected
    if (!$(this).hasClass('selected')) {    
	    //remove the selected class from all LI    
	    $('#tabMenu li').removeClass('selected');
	    //Reassign the LI
	    $(this).addClass('selected');
	    //Hide all the DIV in .boxBody
	    $('.boxBody div.parent').slideUp('1500');
	    //Look for the right DIV in boxBody according to the Navigation UL index, therefore, the arrangement is very important.
	    $('.boxBody div.parent:eq(' + $('#tabMenu > li').index(this) + ')').slideDown('1500');
	 }
  });
	//Mouseover effect for Posts, Comments, Famous Posts and Random Posts menu list.
  $('#.boxBody li').click(function(){
    window.location = $(this).children().attr('href');
  });
});
</script>