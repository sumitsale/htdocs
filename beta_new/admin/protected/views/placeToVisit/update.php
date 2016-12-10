<?php
/* @var $this PlaceToVisitController */
/* @var $model PlaceToVisit */

$this->breadcrumbs=array(
	'Place To Visits'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PlaceToVisit', 'url'=>array('index')),
	array('label'=>'Create PlaceToVisit', 'url'=>array('create')),
	array('label'=>'View PlaceToVisit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PlaceToVisit', 'url'=>array('admin')),
);
?>

<h1>Update PlaceToVisit <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>