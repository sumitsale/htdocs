<?php
$this->breadcrumbs=array(
	'Thenews'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Thenews', 'url'=>array('index')),
	array('label'=>'Create Thenews', 'url'=>array('create')),
	array('label'=>'View Thenews', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Thenews', 'url'=>array('admin')),
);
?>

<h1>Update Thenews <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>