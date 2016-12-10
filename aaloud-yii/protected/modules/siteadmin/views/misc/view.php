<?php
$this->breadcrumbs=array(
	'Tbl Aa Miscs'=>array('index'),
	$model->MISC_ID,
);

$this->menu=array(
	array('label'=>'List TblAaMisc', 'url'=>array('index')),
	array('label'=>'Create TblAaMisc', 'url'=>array('create')),
	array('label'=>'Update TblAaMisc', 'url'=>array('update', 'id'=>$model->MISC_ID)),
	array('label'=>'Delete TblAaMisc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->MISC_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblAaMisc', 'url'=>array('admin')),
);
?>

<h1>View TblAaMisc #<?php echo $model->MISC_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'MISC_ID',
		'EXCLUSIVE_NEWS',
		'FEATURED_ARTIST',
		'LAST_UPDATE',
	),
)); ?>
