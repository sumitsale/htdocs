<?php
$this->breadcrumbs=array(
	'Paisa Vasools'=>array('index'),
	$model->ARTIST_ID,
);

$this->menu=array(
	array('label'=>'List paisa_vasool', 'url'=>array('index')),
	array('label'=>'Create paisa_vasool', 'url'=>array('create')),
	array('label'=>'Update paisa_vasool', 'url'=>array('update', 'id'=>$model->ARTIST_ID)),
	array('label'=>'Delete paisa_vasool', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ARTIST_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage paisa_vasool', 'url'=>array('admin')),
);
?>

<h1>View paisa_vasool #<?php echo $model->ARTIST_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ARTIST_ID',
	),
)); ?>
