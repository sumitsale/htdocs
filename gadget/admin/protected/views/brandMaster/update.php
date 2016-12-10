<?php
/* @var $this BrandMasterController */
/* @var $model BrandMaster */

$this->breadcrumbs=array(
	'Brand Masters'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BrandMaster', 'url'=>array('index')),
	array('label'=>'Create BrandMaster', 'url'=>array('create')),
	array('label'=>'View BrandMaster', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BrandMaster', 'url'=>array('admin')),
);
?>

<h1>Update BrandMaster <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>