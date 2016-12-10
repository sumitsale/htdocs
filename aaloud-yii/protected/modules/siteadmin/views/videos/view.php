<?php
$this->breadcrumbs=array(
	'Tbl Home Videos'=>array('index'),
	$model->VIDEO_ID,
);

$this->menu=array(
	array('label'=>'List TblHomeVideo', 'url'=>array('index')),
	array('label'=>'Create TblHomeVideo', 'url'=>array('create')),
	array('label'=>'Update TblHomeVideo', 'url'=>array('update', 'id'=>$model->VIDEO_ID)),
	array('label'=>'Delete TblHomeVideo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->VIDEO_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblHomeVideo', 'url'=>array('admin')),
);
?>

<h1>View TblHomeVideo #<?php echo $model->VIDEO_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'VIDEO_ID',
		'VIDEO_ARTIST_TITLE',
		'VIDEO_FILE',
		'VIDEO_DESC',
		'VIDEO_IMAGE',
		'VIDEO_INDATE',
		'VIDEO_STATUS',
	),
)); ?>
