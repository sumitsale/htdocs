<?php
$this->breadcrumbs=array(
	'Model Presskits'=>array('index'),
	$model->Press_Kit_Id,
);

$this->menu=array(
	//array('label'=>'List model_presskit', 'url'=>array('index')),
	//array('label'=>'Create model_presskit', 'url'=>array('create')),
	//array('label'=>'Update model_presskit', 'url'=>array('update', 'id'=>$model->Press_Kit_Id)),
	//array('label'=>'Delete model_presskit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Press_Kit_Id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage model_presskit', 'url'=>array('admin')),
);
?>

<h1>View model_presskit #<?php echo $model->Press_Kit_Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Press_Kit_Id',
		'Artist_Id',
		'Pdf_File',
		'Press_Kit_Status',
		'Press_Kit_Indate',
	),
)); ?>
