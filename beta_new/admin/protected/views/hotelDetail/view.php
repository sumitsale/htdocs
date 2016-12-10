<?php
/* @var $this HotelDetailController */
/* @var $model HotelDetail */

$this->breadcrumbs=array(
	'Hotel Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'List HotelDetail', 'url'=>array('index')),
	// array('label'=>'Create HotelDetail', 'url'=>array('create')),
	// array('label'=>'Update HotelDetail', 'url'=>array('update', 'id'=>$model->id)),
	// array('label'=>'Delete HotelDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	// array('label'=>'Manage HotelDetail', 'url'=>array('admin')),
);
?>

<h1>View HotelDetail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hotel_id',
		'thumbnail_1',
		'thumbnail_2',
		'thumbnail_3',
		'thumbnail_4',
		'thumbnail_5',
		'overview_paragraph_1',
		'overview_paragraph_2',
		'overview_paragraph_3',
		// 'room_1_type',
		// 'room_1_amunities',
		// 'room_1_thumbnail',
		// 'room_1_inclusion',
		// 'room_2_type',
		// 'room_2_amunities',
		// 'room_2_thumbnail',
		// 'room_2_inclusion',
		// 'room_3_type',
		// 'room_3_amunities',
		// 'room_3_thumbnail',
		// 'room_3_inclusion',
		'hotel_amunities',
		'date_added',
		'date_modified',
	),
)); ?>
