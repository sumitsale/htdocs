<?php
$this->breadcrumbs=array(
	'Tbl Plan Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblPlanMaster', 'url'=>array('index')),
	array('label'=>'Manage TblPlanMaster', 'url'=>array('admin')),
);
?>

<h1>Create TblPlanMaster</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>