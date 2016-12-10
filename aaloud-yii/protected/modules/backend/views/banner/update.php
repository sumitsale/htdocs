<?php
$this->breadcrumbs=array(
	'Banners'=>array('index'),
	$model->LOCATION_ID=>array('view','id'=>$model->LOCATION_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Banner', 'url'=>array('index')),
	array('label'=>'Create Banner', 'url'=>array('create')),
	array('label'=>'View Banner', 'url'=>array('view', 'id'=>$model->LOCATION_ID)),
	array('label'=>'Manage Banner', 'url'=>array('admin')),
);
?>

<h1>Update Banner <?php echo $model->LOCATION_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>