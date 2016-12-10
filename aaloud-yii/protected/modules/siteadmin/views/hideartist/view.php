<?php
$this->breadcrumbs=array(
	'Hideartists'=>array('index'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'List Hideartist', 'url'=>array('index')),
	// array('label'=>'Create Hideartist', 'url'=>array('create')),
	// array('label'=>'Update Hideartist', 'url'=>array('update', 'id'=>$model->id)),
	// array('label'=>'Delete Hideartist', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	// array('label'=>'Manage Hideartist', 'url'=>array('admin')),
);
?>

<h1>View Hideartist #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'artistid',
		'artistname',
	),
)); ?>
