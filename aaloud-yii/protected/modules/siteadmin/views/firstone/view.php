<?php
$this->breadcrumbs=array(
	'Firstones'=>array('index'),
	$model->ARTIST_ID,
);

$this->menu=array(
	array('label'=>'List firstone', 'url'=>array('index')),
	array('label'=>'Create firstone', 'url'=>array('create')),
	array('label'=>'Update firstone', 'url'=>array('update', 'id'=>$model->ARTIST_ID)),
	array('label'=>'Delete firstone', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ARTIST_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage firstone', 'url'=>array('admin')),
);
?>

<h1>View firstone #<?php echo $model->ARTIST_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ARTIST_ID',
		'Artist_Name',
	),
)); ?>
