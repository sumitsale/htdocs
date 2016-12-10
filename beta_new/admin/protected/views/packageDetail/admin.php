<?php
/* @var $this PackageDetailController */
/* @var $model PackageDetail */

$this->breadcrumbs=array(
	'Package Details'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List PackageDetail', 'url'=>array('index')),
	//array('label'=>'Create PackageDetail', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#package-detail-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Package Details</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'package-detail-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	//	'id',
		'package_id',
		'thumbnail_1',
		'thumbnail_2',
		'thumbnail_3',
		'thumbnail_4',
		/*
		'thumbnail_5',
		'activity',
		'description',
		'inclusion',
		'itinerary_day_1_heading',
		'itinerary_day_1_description',
		'itinerary_day_2_heading',
		'itinerary_day_2_description',
		'itinerary_day_3_heading',
		'itinerary_day_3_description',
		'itinerary_day_4_heading',
		'itinerary_day_4_description',
		'itinerary_day_5_heading',
		'itinerary_day_5_description',
		'itinerary_day_6_heading',
		'itinerary_day_6_description',
		'itinerary_day_7_heading',
		'itinerary_day_7_description',
		'hotel_id',
		'hotel_name',
		'date_added',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
