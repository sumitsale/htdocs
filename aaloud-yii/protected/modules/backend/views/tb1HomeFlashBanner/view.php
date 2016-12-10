<?php
$this->breadcrumbs=array(
	'Tb1 Home Flash Banners'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Tb1HomeFlashBanner', 'url'=>array('index')),
	//array('label'=>'Create Tb1HomeFlashBanner', 'url'=>array('create')),
	//array('label'=>'Update Tb1HomeFlashBanner', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Tb1HomeFlashBanner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Tb1HomeFlashBanner', 'url'=>array('admin')),
);
?>

<h1>View Tb1HomeFlashBanner #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'url1',
		'url2',
		'url3',
		'url4',
		'url5',
		'flash_file',
		'created',
		'modified',
	),
)); ?>
