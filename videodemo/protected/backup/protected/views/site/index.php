<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jquery.js"></script>

<script type="text/javascript">


	$(document).ready(function()
	{
	dataString='';
	
$.ajax
		({
			type: "POST",
			url: "<?php echo Controller::createUrl("Display_video/index"); ?>",
			data: dataString,
			success: function(data) 
			{
			
			// return false;
				if(data !='error')
				{

				// alert(data);
				$("#main-content").html(data);
				}
				else
				{
					alert('Video not uploaded for current time');
				}
			}
        });
        });

</script>

<div id="main-content"></div>
