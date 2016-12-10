<?php /*
$this->breadcrumbs=array(
	'Contactforminfos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List contactforminfo', 'url'=>array('index')),
	array('label'=>'Create contactforminfo', 'url'=>array('create')),
	array('label'=>'Update contactforminfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete contactforminfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage contactforminfo', 'url'=>array('admin')),
);
*/ ?>

<h1>View contactforminfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'contactform_information',
		
	),
)); ?>
