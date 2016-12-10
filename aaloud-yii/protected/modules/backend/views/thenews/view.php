<?php
$this->breadcrumbs=array(
	'Thenews'=>array('index'),
	$model->name,
);

$this->menu=array(
	//array('label'=>'List Thenews', 'url'=>array('index')),
	//array('label'=>'Create Thenews', 'url'=>array('create')),
	//array('label'=>'Update Thenews', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Thenews', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Thenews', 'url'=>array('admin')),
);
?>

<h1>View Thenews #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'time',
		'site',
	),
)); ?>
