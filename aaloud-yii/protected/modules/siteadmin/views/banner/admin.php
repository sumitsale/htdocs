<?php
$this->breadcrumbs=array(
	'Tbl Banner Location Masters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblBannerLocationMaster', 'url'=>array('index')),
	array('label'=>'Create TblBannerLocationMaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tbl-banner-location-master-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tbl Banner Location Masters</h1>

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
	'id'=>'tbl-banner-location-master-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'LOCATION_ID',
		'LOCATION',
		'BANNER_MODULE',
		'BANNER_TITLE',
		'BANNER_WIDTH',
		'BANNER_HEIGHT',
		/*
		'CREATED',
		'MODIFIED',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
