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

<h1>Abuse Report</h1>

<tr><td>&nbsp;&nbsp;&nbsp;</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;</td></tr>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchabuse',array(
	'model'=>$model,
	'model1'=>$model1,
	'content'=>$content,		
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-user-reviews-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	 'selectableRows'=>2,

	'columns'=>array(
		//'REVIEW_ID',
		array(
		'class'=>'CCheckBoxColumn',
		'header'=>'Select All',
		'value'=>'$data->REVIEW_ID',
			), 
		'REVIEW_TITLE',
		'CONTENT_ID',
		'FULL_NAME',
		'EMAIL',
		
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
)); 
?>

<tr>&nbsp;</tr>

<table>
	
	<tr>	
		<td><?php echo CHtml::submitButton('Mark Safe'); ?></td>	
        	
		<td><?php echo CHtml::submitButton('Delete Abuse'); ?></td>
        
		<td><?php echo CHtml::submitButton('Accept Abuse'); ?></td>
	</tr>	
	
</table>