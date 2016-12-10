<?php
$this->breadcrumbs=array(
	'Tbl User Reviews'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List TblUserReviews', 'url'=>array('index')),
	//array('label'=>'Create TblUserReviews', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tbl-user-reviews-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>User Review Master</h1>

<tr><td>&nbsp;&nbsp;&nbsp;</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;</td></tr>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'model1'=>$model1,
	'content'=>$content,		
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-user-reviews-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'REVIEW_ID',
		
		'REVIEW_TITLE',
		'USER_ID',
		'FULL_NAME',
		'CONTENT_ID',
		//'CONTENT_TYPE_ID',
		//'STORE_FRONT_ID',
		
		
		/*
		'EMAIL',
		'USER_IP',
		'USER_TYPE',
		'REVIEW_TITLE',
		'REVIEW_TEXT',
		'REVIEW_ADDEDON',
		'STATUS',
		'MARK_AS_SAFE',
		'ABUSE',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
