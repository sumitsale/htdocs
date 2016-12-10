<?php
/* @var $this PlaceToVisitController */
/* @var $model PlaceToVisit */

$this->breadcrumbs=array(
	'Place To Visits'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PlaceToVisit', 'url'=>array('index')),
	array('label'=>'Create PlaceToVisit', 'url'=>array('create')),
	array('label'=>'Update PlaceToVisit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PlaceToVisit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlaceToVisit', 'url'=>array('admin')),
);
?>

<h1>View PlaceToVisit #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'meta_tag',
		'place_name',
		'category_name',
		'small_thumbnail',
		'thumbnail_1',
		'thumbnail_2',
		'thumbnail_3',
		'thumbnail_4',
		'thumbnail_5',
		'description',
		'date_added',
		'date_modified',
	),
)); ?>
