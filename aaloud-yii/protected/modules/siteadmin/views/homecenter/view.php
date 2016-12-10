<?php
$this->breadcrumbs=array(
	'Model Homecenters'=>array('index'),
	$model->center_section_id,
);

$this->menu=array(
	//array('label'=>'List model_homecenter', 'url'=>array('index')),
	//array('label'=>'Create model_homecenter', 'url'=>array('create')),
	//array('label'=>'Update model_homecenter', 'url'=>array('update', 'id'=>$model->center_section_id)),
	//array('label'=>'Delete model_homecenter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->center_section_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage model_homecenter', 'url'=>array('admin')),
);
?>

<h1>View model_homecenter #<?php echo $model->center_section_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'center_section_id',
		'center_section',
		'center_section_image',
		'center_section_url',
		'center_section_text',
		'center_section_status',
		'center_section_lastupdate',
	),
)); ?>
