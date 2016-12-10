<?php
$this->breadcrumbs=array(
	'Tbl Plan Masters'=>array('index'),
	$model->PLAN_ID=>array('view','id'=>$model->PLAN_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblPlanMaster', 'url'=>array('index')),
	array('label'=>'Create TblPlanMaster', 'url'=>array('create')),
	array('label'=>'View TblPlanMaster', 'url'=>array('view', 'id'=>$model->PLAN_ID)),
	array('label'=>'Manage TblPlanMaster', 'url'=>array('admin')),
);
?>

<h1>Update TblPlanMaster <?php echo $model->PLAN_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>