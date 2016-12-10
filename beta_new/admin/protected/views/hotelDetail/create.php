<?php
/* @var $this HotelDetailController */
/* @var $model HotelDetail */

$this->breadcrumbs=array(
	'Hotel Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HotelDetail', 'url'=>array('index')),
	array('label'=>'Manage HotelDetail', 'url'=>array('admin')),
);
?>

<h1>Create HotelDetail</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'hotel'=>$hotel,
			'hotelid'=>$hotelid,'hotel_room'=>$hotel_room,)); ?>