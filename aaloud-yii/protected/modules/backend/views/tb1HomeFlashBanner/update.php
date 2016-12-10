<?php
$this->breadcrumbs=array(
	'Tb1 Home Flash Banners'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tb1HomeFlashBanner', 'url'=>array('index')),
	array('label'=>'Create Tb1HomeFlashBanner', 'url'=>array('create')),
	array('label'=>'View Tb1HomeFlashBanner', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tb1HomeFlashBanner', 'url'=>array('admin')),
);
?>

<h1>Update Tb1HomeFlashBanner <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>