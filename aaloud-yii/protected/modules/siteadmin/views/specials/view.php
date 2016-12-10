<?php
$this->breadcrumbs=array(
	'Tbl Specials'=>array('index'),
	$model->special_id,
);

$this->menu=array(
	array('label'=>'List TblSpecials', 'url'=>array('index')),
	array('label'=>'Create TblSpecials', 'url'=>array('create')),
	array('label'=>'Update TblSpecials', 'url'=>array('update', 'id'=>$model->special_id)),
	array('label'=>'Delete TblSpecials', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->special_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblSpecials', 'url'=>array('admin')),
);
?>

<h1>View TblSpecials #<?php echo $model->special_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'special_id',
		'special_name',
		'special_link',
		'special_image',
		'indate',
	),
)); ?>
