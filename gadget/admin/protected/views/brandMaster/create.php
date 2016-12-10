<?php
/* @var $this BrandMasterController */
/* @var $model BrandMaster */

$this->breadcrumbs=array(
	'Brand Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BrandMaster', 'url'=>array('index')),
	array('label'=>'Manage BrandMaster', 'url'=>array('admin')),
);
?>

<h1>Create BrandMaster</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>