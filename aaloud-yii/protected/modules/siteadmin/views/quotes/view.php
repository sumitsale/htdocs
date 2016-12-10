<?php
$this->breadcrumbs=array(
	'Tbl Aa Quotes'=>array('index'),
	$model->Quote_Id,
);

$this->menu=array(
	array('label'=>'List TblAaQuote', 'url'=>array('index')),
	array('label'=>'Create TblAaQuote', 'url'=>array('create')),
	array('label'=>'Update TblAaQuote', 'url'=>array('update', 'id'=>$model->Quote_Id)),
	array('label'=>'Delete TblAaQuote', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Quote_Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblAaQuote', 'url'=>array('admin')),
);
?>

<h1>View TblAaQuote #<?php echo $model->Quote_Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Quote_Id',
		'Quote_Src',
		'Quote_Title',
		'Quote',
		'Quote_Image',
		'Quote_Status',
		'Quote_LastUpdate',
	),
)); ?>
