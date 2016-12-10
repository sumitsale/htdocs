<?php
$this->breadcrumbs=array(
	'Genre Masters'=>array('index'),
	$model->genre_id,
);

$this->menu=array(
	array('label'=>'List GenreMaster', 'url'=>array('index')),
	array('label'=>'Create GenreMaster', 'url'=>array('create')),
	array('label'=>'Update GenreMaster', 'url'=>array('update', 'id'=>$model->genre_id)),
	array('label'=>'Delete GenreMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->genre_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GenreMaster', 'url'=>array('admin')),
);
?>

<h1>View GenreMaster #<?php echo $model->genre_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'genre_id',
		'genre_name',
		'priority',
		'indate',
	),
)); ?>
