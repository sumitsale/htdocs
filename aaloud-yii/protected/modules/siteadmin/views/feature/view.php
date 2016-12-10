<?php
$this->breadcrumbs=array(
	'Features'=>array('index'),
	$model->F_ID,
);

$this->menu=array(
	array('label'=>'List feature', 'url'=>array('index')),
	array('label'=>'Create feature', 'url'=>array('create')),
	array('label'=>'Update feature', 'url'=>array('update', 'id'=>$model->F_ID)),
	array('label'=>'Delete feature', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->F_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage feature', 'url'=>array('admin')),
);
?>

<h1>View feature #<?php echo $model->F_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'F_ID',
		'CONTENT_TYPE_ID',
		'ARTIST_ID',
		'LAST_UPDATE',
	),
)); ?>
