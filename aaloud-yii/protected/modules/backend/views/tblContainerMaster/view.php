<?php
$this->breadcrumbs=array(
	'Tbl Container Masters'=>array('index'),
	$model->CONTAINER_ID,
);

$this->menu=array(
	array('label'=>'List TblContainerMaster', 'url'=>array('index')),
	array('label'=>'Create TblContainerMaster', 'url'=>array('create')),
	array('label'=>'Update TblContainerMaster', 'url'=>array('update', 'id'=>$model->CONTAINER_ID)),
	array('label'=>'Delete TblContainerMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CONTAINER_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblContainerMaster', 'url'=>array('admin')),
);
?>

<h1>View TblContainerMaster #<?php echo $model->CONTAINER_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CONTAINER_ID',
		'CONTAINER_LOCATION',
		'CONTAINER_NAME',
		'STORE_FRONT_ID',
	),
)); ?>
