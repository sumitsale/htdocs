<?php
$this->breadcrumbs=array(
	'Tbl Genre Masters'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblGenreMaster', 'url'=>array('index')),
	array('label'=>'Create TblGenreMaster', 'url'=>array('create')),
	array('label'=>'View TblGenreMaster', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblGenreMaster', 'url'=>array('admin')),
);
?>

<h1>Update TblGenreMaster <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>