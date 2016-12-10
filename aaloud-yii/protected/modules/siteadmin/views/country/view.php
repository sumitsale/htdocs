<?php
$this->breadcrumbs=array(
	'Country Masters'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CountryMaster', 'url'=>array('index')),
	array('label'=>'Create CountryMaster', 'url'=>array('create')),
	array('label'=>'Update CountryMaster', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CountryMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CountryMaster', 'url'=>array('admin')),
);
?>

<h1>View CountryMaster #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'indate',
		'status',
	),
)); ?>
