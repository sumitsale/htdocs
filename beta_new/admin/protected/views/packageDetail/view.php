<?php
/* @var $this PackageDetailController */
/* @var $model PackageDetail */

$this->breadcrumbs=array(
	'Package Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List PackageDetail', 'url'=>array('index')),
	//array('label'=>'Add PackageDetail', 'url'=>array('create')),
	//array('label'=>'Update PackageDetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PackageDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage PackageDetail', 'url'=>array('admin')),
);
?>

<h1>View PackageDetail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'package_id',
		'thumbnail_1',
		'thumbnail_2',
		'thumbnail_3',
		'thumbnail_4',
		'thumbnail_5',
		'activity',
		'description',
		'inclusion',
		// 'itinerary_day_1_heading',
		// 'itinerary_day_1_description',
		// 'itinerary_day_2_heading',
		// 'itinerary_day_2_description',
		// 'itinerary_day_3_heading',
		// 'itinerary_day_3_description',
		// 'itinerary_day_4_heading',
		// 'itinerary_day_4_description',
		// 'itinerary_day_5_heading',
		// 'itinerary_day_5_description',
		// 'itinerary_day_6_heading',
		// 'itinerary_day_6_description',
		// 'itinerary_day_7_heading',
		// 'itinerary_day_7_description',
		//'hotel_id',
		'hotel_name',
		'date_added',
		'date_modified',
	),
)); ?>
