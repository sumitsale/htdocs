<?php
/* @var $this PackageRateAndFairController */
/* @var $model PackageRateAndFair */

$this->breadcrumbs=array(
	'Package Rate And Fairs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PackageRateAndFair', 'url'=>array('index')),
	array('label'=>'Manage PackageRateAndFair', 'url'=>array('admin')),
);
?>

<h1>Create PackageRateAndFair</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>