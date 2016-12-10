<?php
$this->breadcrumbs=array(
	'Flash Banner Lists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FlashBannerList', 'url'=>array('index')),
	array('label'=>'Manage FlashBannerList', 'url'=>array('admin')),
);
?>

<h1>Create FlashBannerList</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>