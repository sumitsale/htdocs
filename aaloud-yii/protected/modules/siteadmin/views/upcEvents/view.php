<?php /*
$this->breadcrumbs=array(
	'Upc Events'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UpcEvents', 'url'=>array('index')),
	array('label'=>'Create UpcEvents', 'url'=>array('create')),
	array('label'=>'Update UpcEvents', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UpcEvents', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UpcEvents', 'url'=>array('admin')),
); */
?>

<h1>View UpcEvents #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	//	'id',
		'artist_name',
		'event_date',
		'location',
		'city',
	//	'created_date',
	//	'modified_date',
	),
)); ?>
