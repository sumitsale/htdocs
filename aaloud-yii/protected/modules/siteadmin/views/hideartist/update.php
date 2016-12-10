<?php
$this->breadcrumbs=array(
	'Hideartists'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Hideartist', 'url'=>array('index')),
	array('label'=>'Create Hideartist', 'url'=>array('create')),
	array('label'=>'View Hideartist', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Hideartist', 'url'=>array('admin')),
);
?>

<h1>Update Hideartist <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>