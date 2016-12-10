<?php
$this->breadcrumbs=array(
	'Tbl Genre Masters'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List TblGenreMaster', 'url'=>array('index')),
	array('label'=>'Create TblGenreMaster', 'url'=>array('create')),
	array('label'=>'Update TblGenreMaster', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblGenreMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblGenreMaster', 'url'=>array('admin')),
);
?>

<h1>View TblGenreMaster #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'display_status',
		'added_on',
		'updated_on',
	),
)); ?>
