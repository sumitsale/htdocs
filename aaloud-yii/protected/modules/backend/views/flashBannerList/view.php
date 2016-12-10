<?php
$this->breadcrumbs=array(
	'Flash Banner Lists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FlashBannerList', 'url'=>array('index')),
	array('label'=>'Create FlashBannerList', 'url'=>array('create')),
	array('label'=>'Update FlashBannerList', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FlashBannerList', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FlashBannerList', 'url'=>array('admin')),
);
?>

<h1>View FlashBannerList #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'flash_title',
		'flash_section',
		'xmlpath',
		'created',
		'modified',
	),
)); ?>
