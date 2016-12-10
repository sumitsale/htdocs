<?php
$this->breadcrumbs=array(
	'Tbl Page Masters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblPageMaster', 'url'=>array('index')),
	array('label'=>'Create TblPageMaster', 'url'=>array('create')),
	array('label'=>'View TblPageMaster', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblPageMaster', 'url'=>array('admin')),
);
?>

<h1>Update TblPageMaster <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>