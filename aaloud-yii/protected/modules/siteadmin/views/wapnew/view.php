<?php
$this->breadcrumbs=array(
	'Wapnews'=>array('index'),
	$model->ARTIST_ID,
);

$this->menu=array(
	array('label'=>'List wapnew', 'url'=>array('index')),
	array('label'=>'Create wapnew', 'url'=>array('create')),
	array('label'=>'Update wapnew', 'url'=>array('update', 'id'=>$model->ARTIST_ID)),
	array('label'=>'Delete wapnew', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ARTIST_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage wapnew', 'url'=>array('admin')),
);
?>

<h1>View wapnew #<?php echo $model->ARTIST_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ARTIST_ID',
	),
)); ?>
