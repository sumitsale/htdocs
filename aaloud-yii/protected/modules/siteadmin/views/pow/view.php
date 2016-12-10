<?php
$this->breadcrumbs=array(
	'Pows'=>array('index'),
	$model->POW_ID,
);

$this->menu=array(
	array('label'=>'List pow', 'url'=>array('index')),
	array('label'=>'Create pow', 'url'=>array('create')),
	array('label'=>'Update pow', 'url'=>array('update', 'id'=>$model->POW_ID)),
	array('label'=>'Delete pow', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->POW_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage pow', 'url'=>array('admin')),
);
?>

<h1>View pow #<?php echo $model->POW_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'POW_ID',
		'CONTENT_ID',
		'LAST_UPDATE',
	),
)); ?>
