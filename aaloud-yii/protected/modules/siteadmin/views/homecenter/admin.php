<?php
$this->breadcrumbs=array(
	'Model Homecenters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List model_homecenter', 'url'=>array('index')),
	array('label'=>'Create model_homecenter', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('model-homecenter-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Model Homecenters</h1>

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
	'id'=>'model-homecenter-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'center_section_id',
		'center_section',
		'center_section_image',
		'center_section_url',
		'center_section_text',
		'center_section_status',
		/*
		'center_section_lastupdate',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
