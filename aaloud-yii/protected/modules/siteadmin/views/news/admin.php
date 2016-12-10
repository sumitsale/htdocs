<?php
$this->breadcrumbs=array(
	'Tbl Aa Presses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblAaPress', 'url'=>array('index')),
	array('label'=>'Create TblAaPress', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tbl-aa-press-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tbl Aa Presses</h1>

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
	'id'=>'tbl-aa-press-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Press_id',
		'Press_Artist_id',
		'Press_News_Type',
		'Press_News_Title',
		'Press_News_Date',
		'Press_News_Source',
		/*
		'Press_News_Content',
		'Press_News_Featured',
		'Press_News_Exclusive',
		'Press_News_Status',
		'Press_Indate',
		'Press_LastUpdate',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
