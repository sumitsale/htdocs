<?php
/* @var $this PackageDetailController */
/* @var $model PackageDetail */

$this->breadcrumbs=array(
	'Package Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PackageDetail', 'url'=>array('index')),
	array('label'=>'Manage PackageDetail', 'url'=>array('admin')),
);
?>

<h1>Add PackageDetail</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'hotel'=>$hotel,'pacakge'=>$pacakge,'packageid'=>$packageid,'package_itinerary'=>$package_itinerary,)); ?>