<?php
$this->breadcrumbs=array(
	'Model Tblaaartists'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List model_tblaaartist', 'url'=>array('index')),
	array('label'=>'Create model_tblaaartist', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('model-tblaaartist-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Model Tblaaartists</h1>

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
	'id'=>'model-tblaaartist-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Artist_Id',
		'Artist_Name',
		'Artist_Bgcolor',
		'Artist_Bgimage',
		'Artist_Right_Bgcolor',
		'Artist_Right_Bgimage',
		/*
		'Artist_WAP_Image',
		'Artist_Twitter',
		'Artist_Facebook',
		'Artist_Flickr',
		'Artist_Caller_Keyword',
		'Artist_Status',
		'Artist_Indate',
		'Artist_LastUpdate',
		'Artist_Hit_Count',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
