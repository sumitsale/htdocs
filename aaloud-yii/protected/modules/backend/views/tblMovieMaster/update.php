<?php
$this->breadcrumbs=array(
	'Tbl Movie Masters'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblMovieMaster', 'url'=>array('index')),
	array('label'=>'Create TblMovieMaster', 'url'=>array('create')),
	array('label'=>'View TblMovieMaster', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblMovieMaster', 'url'=>array('admin')),
);
?>

<h1>Update TblMovieMaster <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>