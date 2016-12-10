<?php
$this->breadcrumbs=array(
	'Footers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List footer', 'url'=>array('index')),
	array('label'=>'Create footer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('footer-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Footers</h1>

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
	'id'=>'footer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'footer_section_id',
		'footer_section',
		'footer_section_image',
		'footer_section_url',
		'footer_section_text',
		'footer_section_status',
		/*
		'footer_section_lastupdate',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
