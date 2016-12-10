<?php
$this->breadcrumbs=array(
	'Tbl Category Details'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblCategoryDetails', 'url'=>array('index')),
	array('label'=>'Create TblCategoryDetails', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tbl-category-details-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tbl Category Details</h1>

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
	'id'=>'tbl-category-details-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'CATEGORY_DETAILS_ID',
		'CATEGORY_ID',
		'CONTENT_TYPE_ID',
		'STORE_FRONT_ID',
		'THEME_IMAGE',
		'PARENT_ID',
		/*
		'TAG_MAP',
		'STATUS',
		'LAST_UPDATED_ON',
		'LAST_UPDATED_BY',
		'PRIORITY',
		'ISNEW',
		'TRACK_CATELOG_ID',
		'ALBUM_CATELOG_ID',
		'ARTIST_CATELOG_ID',
		'CATEGORY_LANGUAGE_ID',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
