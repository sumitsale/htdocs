<?php
$this->breadcrumbs=array(
	'Tbl Categories'=>array('index'),
	$model->CATEGORY_ID,
);

$this->menu=array(
	array('label'=>'List TblCategory', 'url'=>array('index')),
	array('label'=>'Create TblCategory', 'url'=>array('create')),
	array('label'=>'Update TblCategory', 'url'=>array('update', 'id'=>$model->CATEGORY_ID)),
	array('label'=>'Delete TblCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CATEGORY_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblCategory', 'url'=>array('admin')),
);
?>

<h1>View TblCategory #<?php echo $model->CATEGORY_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CATEGORY_ID',
		'CATEGORY',
	),
)); ?>
