<?php
/* @var $this PackagesController */
/* @var $model Packages */

$this->breadcrumbs=array(
	'Packages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Packages', 'url'=>array('index')),
	array('label'=>'Manage Packages', 'url'=>array('admin')),
);
?>

<h1>Add Packages</h1>

<?php $this->renderPartial('_form', array('model'=>$model,
'category'=>$category,
'hotel'=>$hotel,
)); ?>