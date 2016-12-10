<?php
$this->breadcrumbs=array(
	'Tbl Aa Itunes'=>array('index'),
	$model->ALBUM_ID,
);

$this->menu=array(
	array('label'=>'List TblAaItunes', 'url'=>array('index')),
	array('label'=>'Create TblAaItunes', 'url'=>array('create')),
	array('label'=>'Update TblAaItunes', 'url'=>array('update', 'id'=>$model->ALBUM_ID)),
	array('label'=>'Delete TblAaItunes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ALBUM_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblAaItunes', 'url'=>array('admin')),
);
?>

<h1>View TblAaItunes #<?php echo $model->ALBUM_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ALBUM_ID',
		'ALBUM',
		'ITUNE_URL',
		'INDATE',
	),
)); ?>
