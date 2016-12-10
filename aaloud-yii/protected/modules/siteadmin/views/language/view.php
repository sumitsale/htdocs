<?php
$this->breadcrumbs=array(
	'Lang Masters'=>array('index'),
	$model->lang_id,
);

$this->menu=array(
	array('label'=>'List LangMaster', 'url'=>array('index')),
	array('label'=>'Create LangMaster', 'url'=>array('create')),
	array('label'=>'Update LangMaster', 'url'=>array('update', 'id'=>$model->lang_id)),
	array('label'=>'Delete LangMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->lang_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LangMaster', 'url'=>array('admin')),
);
?>

<h1>View LangMaster #<?php echo $model->lang_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'lang_id',
		'lang_name',
		'priority',
		'indate',
	),
)); ?>
