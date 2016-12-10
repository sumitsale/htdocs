<?php
/* @var $this CategoryMasterController */
/* @var $model CategoryMaster */

$this->breadcrumbs=array(
	'Category Masters'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CategoryMaster', 'url'=>array('index')),
	array('label'=>'Create CategoryMaster', 'url'=>array('create')),
	array('label'=>'Update CategoryMaster', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CategoryMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CategoryMaster', 'url'=>array('admin')),
);
?>

<h1>View CategoryMaster #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'date_added',
		'date_modified',
	),
)); ?>
