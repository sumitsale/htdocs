<?php
$this->breadcrumbs=array(
	'Tb1 Home Flash Banners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tb1HomeFlashBanner', 'url'=>array('index')),
	array('label'=>'Manage Tb1HomeFlashBanner', 'url'=>array('admin')),
);
?>

<h1>Create Tb1HomeFlashBanner</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>