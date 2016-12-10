<?php
$this->breadcrumbs=array(
	'Tbl Wap Atms'=>array('index'),
	$model->ATM_ID,
);

$this->menu=array(
	array('label'=>'List TblWapAtm', 'url'=>array('index')),
	array('label'=>'Create TblWapAtm', 'url'=>array('create')),
	array('label'=>'Update TblWapAtm', 'url'=>array('update', 'id'=>$model->ATM_ID)),
	array('label'=>'Delete TblWapAtm', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ATM_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblWapAtm', 'url'=>array('admin')),
);
?>

<h1>View TblWapAtm #<?php echo $model->ATM_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ATM_ID',
		'ATM_TITLE',
		'ATM_DESC',
		'ATM_URL',
		'ATM_MONTH',
		'ATM_YEAR',
		'ATM_INDATE',
	),
)); ?>
