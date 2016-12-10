<?php
/* @var $this CategoryMasterController */
/* @var $model CategoryMaster */

$this->breadcrumbs=array(
	'Category Masters'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CategoryMaster', 'url'=>array('index')),
	array('label'=>'Create CategoryMaster', 'url'=>array('create')),
	array('label'=>'View CategoryMaster', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CategoryMaster', 'url'=>array('admin')),
);
?>

<h1>Update CategoryMaster <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>