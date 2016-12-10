<?php
/* @var $this AdmindetailController */
/* @var $model Admindetail */

$this->breadcrumbs=array(
	'Admindetails'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Admindetail', 'url'=>array('index')),
	array('label'=>'Create Admindetail', 'url'=>array('create')),
	array('label'=>'Update Admindetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Admindetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Admindetail', 'url'=>array('admin')),
);
?>

<h1>View Admindetail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'contact_no',
	),
)); ?>
