<?php
/* @var $this PlaceToVisitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Place To Visits',
);

$this->menu=array(
	array('label'=>'Create PlaceToVisit', 'url'=>array('create')),
	array('label'=>'Manage PlaceToVisit', 'url'=>array('admin')),
);
?>

<h1>Place To Visits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
