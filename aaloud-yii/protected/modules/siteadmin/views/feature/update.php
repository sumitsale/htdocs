<?php
$this->breadcrumbs=array(
	'Features'=>array('index'),
	$model->F_ID=>array('view','id'=>$model->F_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List feature', 'url'=>array('index')),
	array('label'=>'Create feature', 'url'=>array('create')),
	array('label'=>'View feature', 'url'=>array('view', 'id'=>$model->F_ID)),
	array('label'=>'Manage feature', 'url'=>array('admin')),
);
?>

<h1>Update feature <?php echo $model->F_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>