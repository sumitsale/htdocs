<?php
/* @var $this HotelDetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Hotel Details',
);

$this->menu=array(
	array('label'=>'Create HotelDetail', 'url'=>array('create')),
	array('label'=>'Manage HotelDetail', 'url'=>array('admin')),
);
?>

<h1>Hotel Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
