<?php
$this->breadcrumbs=array(
	'Tblanswers'=>array('index'),
	$model->ANSWER_ID,
);

$this->menu=array(
	array('label'=>'List TBLANSWERS', 'url'=>array('index')),
	array('label'=>'Create TBLANSWERS', 'url'=>array('create')),
	array('label'=>'Update TBLANSWERS', 'url'=>array('update', 'id'=>$model->ANSWER_ID)),
	array('label'=>'Delete TBLANSWERS', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ANSWER_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TBLANSWERS', 'url'=>array('admin')),
);
?>

<h1>View TBLANSWERS #<?php echo $model->ANSWER_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ANSWER_ID',
		'QUESTION_ID',
		'STORE_FRONT_ID',
		'ANSWER',
		'MAIN_TAB_ID',
		'TAB_ID',
		'STATUS',
	),
)); ?>
