<?php



?>


</br></br>

<div id="container">Loading the player ...</div>

	<script type="text/javascript">
	jwplayer("container").setup({
	flashplayer: "<?php echo Yii::app()->theme->baseUrl; ?>/js/player.swf",
	file: "<?php echo Yii::app()->baseUrl; ?>/videos/video.mp4",
	height: 200,
	width: 300
	});
	</script>
	
<br><br>