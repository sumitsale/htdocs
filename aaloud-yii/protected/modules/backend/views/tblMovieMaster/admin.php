<?php
$this->breadcrumbs=array(
	'Tbl Movie Masters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblMovieMaster', 'url'=>array('index')),
	array('label'=>'Create TblMovieMaster', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tbl-movie-master-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tbl Movie Masters</h1>

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
	'id'=>'tbl-movie-master-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'metasea_property_id',
		'metasea_content_code',
		'vendor_id',
		'title',
		'rel_date',
		/*
		'rel_date_site',
		'is_hd',
		'censor_certificate',
		'duration',
		'demo_play_time',
		'critic_rating',
		'user_rating',
		'user_rating_count',
		'img_120x170',
		'img_125x195',
		'img_180x255',
		'img_200x110',
		'img_440x225',
		'language',
		'starcast',
		'director',
		'producer',
		'musicdirector',
		'genre',
		'keywords',
		'added_on',
		'updated_on',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
