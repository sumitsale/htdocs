<?php
/* @var $this PackagesController */
/* @var $model Packages */

$this->breadcrumbs=array(
	'Packages'=>array('index'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'List Packages', 'url'=>array('index')),
	// array('label'=>'Create Packages', 'url'=>array('create')),
	// array('label'=>'Update Packages', 'url'=>array('update', 'id'=>$model->id)),
	// array('label'=>'Delete Packages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	// array('label'=>'Manage Packages', 'url'=>array('admin')),
);
?>

<h1>View Packages #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'package_name',
		'category_id',
		'category_name',
		'package_day',
		'package_night',
		'destination',
		'pricing',
		'key_feature',
		'pricing_with_out_offer',
		// 'rating',
		'package_thumbnail',
		'date_added',
		'date_modified',
	),
)); ?>
