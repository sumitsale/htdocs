<?php
/* @var $this HotelDetailController */
/* @var $model HotelDetail */

$this->breadcrumbs=array(
	'Hotel Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HotelDetail', 'url'=>array('index')),
	array('label'=>'Create HotelDetail', 'url'=>array('create')),
	array('label'=>'View HotelDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage HotelDetail', 'url'=>array('admin')),
);
?>

<h1>Update HotelDetail <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>