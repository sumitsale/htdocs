<?php
$this->breadcrumbs=array(
	'Footers'=>array('index'),
	$model->footer_section_id,
);

$this->menu=array(
	//array('label'=>'List footer', 'url'=>array('index')),
	//array('label'=>'Create footer', 'url'=>array('create')),
	//array('label'=>'Update footer', 'url'=>array('update', 'id'=>$model->footer_section_id)),
	//array('label'=>'Delete footer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->footer_section_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage footer', 'url'=>array('admin')),
);
?>

<h1>View footer #<?php echo $model->footer_section_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'footer_section_id',
		'footer_section',
		'footer_section_image',
		'footer_section_url',
		'footer_section_text',
		'footer_section_status',
		'footer_section_lastupdate',
	),
)); ?>
