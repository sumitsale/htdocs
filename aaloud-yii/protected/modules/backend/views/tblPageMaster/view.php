<?php
$this->breadcrumbs=array(
	'Tbl Page Masters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblPageMaster', 'url'=>array('index')),
	array('label'=>'Create TblPageMaster', 'url'=>array('create')),
	array('label'=>'Update TblPageMaster', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblPageMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblPageMaster', 'url'=>array('admin')),
);
?>

<h1>View TblPageMaster #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'page_title',
		'page_html_name',
		'page_section',
	),
)); ?>
