<?php
$this->breadcrumbs=array(
	'Homepage Left Bottoms'=>array('index'),
	'Create',
);


?>

<center><strong>Note - Upload images of size 160px * 70px only!</strong></center>

<?php echo $this->renderPartial('_addimage', array('model'=>$model)); ?>