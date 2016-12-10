<?php
$this->breadcrumbs=array(
	'Tbl Aa Players'=>array('index'),
	$model->PLAYERID,
);

$this->menu=array(
	array('label'=>'List TblAaPlayer', 'url'=>array('index')),
	array('label'=>'Create TblAaPlayer', 'url'=>array('create')),
	array('label'=>'Update TblAaPlayer', 'url'=>array('update', 'id'=>$model->PLAYERID)),
	array('label'=>'Delete TblAaPlayer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->PLAYERID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblAaPlayer', 'url'=>array('admin')),
);
?>

<h1>View TblAaPlayer #<?php echo $model->PLAYERID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'PLAYERID',
		'CONTENTID',
		'CONTENTNAME',
		'PRIORITY',
		'INDATE',
	),
)); ?>
