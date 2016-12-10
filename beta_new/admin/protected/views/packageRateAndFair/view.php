<?php
/* @var $this PackageRateAndFairController */
/* @var $model PackageRateAndFair */

$this->breadcrumbs=array(
	'Package Rate And Fairs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PackageRateAndFair', 'url'=>array('index')),
	array('label'=>'Create PackageRateAndFair', 'url'=>array('create')),
	array('label'=>'Update PackageRateAndFair', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PackageRateAndFair', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PackageRateAndFair', 'url'=>array('admin')),
);
?>

<h1>View PackageRateAndFair #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rate',
		'available_date',
		'package_id',
		'date_added',
		'date_modified',
	),
)); ?>
