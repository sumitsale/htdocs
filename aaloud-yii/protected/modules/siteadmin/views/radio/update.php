<?php
$this->breadcrumbs=array(
	'Tbl Aa Players'=>array('index'),
	$model->PLAYERID=>array('view','id'=>$model->PLAYERID),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblAaPlayer', 'url'=>array('index')),
	array('label'=>'Create TblAaPlayer', 'url'=>array('create')),
	array('label'=>'View TblAaPlayer', 'url'=>array('view', 'id'=>$model->PLAYERID)),
	array('label'=>'Manage TblAaPlayer', 'url'=>array('admin')),
);
?>

<h1>Update TblAaPlayer <?php echo $model->PLAYERID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>