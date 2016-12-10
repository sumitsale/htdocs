<?php
$this->breadcrumbs=array(
	'Tbl Home Qplayers'=>array('index'),
	$model->PLAYERID,
);

$this->menu=array(
	array('label'=>'List TblHomeQplayer', 'url'=>array('index')),
	array('label'=>'Create TblHomeQplayer', 'url'=>array('create')),
	array('label'=>'Update TblHomeQplayer', 'url'=>array('update', 'id'=>$model->PLAYERID)),
	array('label'=>'Delete TblHomeQplayer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->PLAYERID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblHomeQplayer', 'url'=>array('admin')),
);
?>

<h1>View TblHomeQplayer #<?php echo $model->PLAYERID; ?></h1>

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
