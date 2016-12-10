<?php
/* @var $this BrandMasterController */
/* @var $model BrandMaster */

$this->breadcrumbs=array(
	'Brand Masters'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List BrandMaster', 'url'=>array('index')),
	array('label'=>'Create BrandMaster', 'url'=>array('create')),
	array('label'=>'Update BrandMaster', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BrandMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BrandMaster', 'url'=>array('admin')),
);
?>

<h1>View BrandMaster #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'date_added',
		'date_modified',
	),
)); ?>
