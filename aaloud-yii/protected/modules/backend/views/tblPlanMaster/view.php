<?php
$this->breadcrumbs=array(
	'Tbl Plan Masters'=>array('index'),
	$model->PLAN_ID,
);

$this->menu=array(
	array('label'=>'List TblPlanMaster', 'url'=>array('index')),
	array('label'=>'Create TblPlanMaster', 'url'=>array('create')),
	array('label'=>'Update TblPlanMaster', 'url'=>array('update', 'id'=>$model->PLAN_ID)),
	array('label'=>'Delete TblPlanMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->PLAN_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblPlanMaster', 'url'=>array('admin')),
);
?>

<h1>View TblPlanMaster #<?php echo $model->PLAN_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'PLAN_ID',
		'PLAN_TITLE',
		'PLAN_DESC',
		'PLAN_FOR',
		'PLAN_TYPE',
		'PLAN_CATALOG',
		'PLAN_DOWNLOAD',
		'PLAN_PURCHASE',
		'PLAN_PACKAGE_TYPE',
		'PLAN_CONTENT_TYPE',
		'ADDED_ON',
	),
)); ?>
