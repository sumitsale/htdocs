<?php
/* @var $this HotelDetailController */
/* @var $model HotelDetail */

$this->breadcrumbs=array(
	'Hotel Details'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HotelDetail', 'url'=>array('index')),
	array('label'=>'Create HotelDetail', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#hotel-detail-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Hotel Details</h1>

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
	'id'=>'hotel-detail-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'hotel_id',
		
			/*'overview_paragraph_1',
		'overview_paragraph_2',
		'overview_paragraph_3',
		'room_1_type',
	
		'room_1_amunities',
		'room_1_thumbnail',
		'room_1_inclusion',
		'room_2_type',
		'room_2_amunities',
		'room_2_thumbnail',
		'room_2_inclusion',
		'room_3_type',
		'room_3_amunities',
		'room_3_thumbnail',
		'room_3_inclusion',
		'hotel_amunities',
		'date_added',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
