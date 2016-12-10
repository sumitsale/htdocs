<?php
$this->breadcrumbs=array(
	'Tbl Filter Ips'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblFilterIp', 'url'=>array('index')),
	array('label'=>'Create TblFilterIp', 'url'=>array('create')),
	array('label'=>'Update TblFilterIp', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblFilterIp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblFilterIp', 'url'=>array('admin')),
);
?>

<h1>View TblFilterIp #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ipfrom',
		'ipto',
		'COUNTRY_ID',
	),
)); ?>
