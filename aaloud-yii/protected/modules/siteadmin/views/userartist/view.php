<?php
$this->breadcrumbs=array(
	'Userartists'=>array('index'),
	$model->USER_ID,
);

$this->menu=array(
	array('label'=>'List userartist', 'url'=>array('index')),
	array('label'=>'Create userartist', 'url'=>array('create')),
	array('label'=>'Update userartist', 'url'=>array('update', 'id'=>$model->USER_ID)),
	array('label'=>'Delete userartist', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->USER_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage userartist', 'url'=>array('admin')),
);
?>

<h1>View userartist #<?php echo $model->USER_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'USER_ID',
		'USER_TYPE',
		'BAND_NAME',
		'GENRE',
		'BIO',
		'INSPIRATION',
		'META_ARTIST_ID',
		'USER_AGE',
		'USER_GENDER',
		'USER_CITY',
		'USER_COUNTRY',
		'LAST_UPDATED',
	),
)); ?>
