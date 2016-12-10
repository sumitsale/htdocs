<?php
/* @var $this PlaceToVisitController */
/* @var $model PlaceToVisit */

$this->breadcrumbs=array(
	'Place To Visits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PlaceToVisit', 'url'=>array('index')),
	array('label'=>'Manage PlaceToVisit', 'url'=>array('admin')),
);
?>

<h1>Create PlaceToVisit</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>