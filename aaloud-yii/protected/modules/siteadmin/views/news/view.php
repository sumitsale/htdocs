<?php
$this->breadcrumbs=array(
	'Tbl Aa Presses'=>array('index'),
	$model->Press_id,
);

$this->menu=array(
	//array('label'=>'List TblAaPress', 'url'=>array('index')),
	//array('label'=>'Create TblAaPress', 'url'=>array('create')),
	array('label'=>'Update TblAaPress', 'url'=>array('update', 'id'=>$model->Press_id)),
	//array('label'=>'Delete TblAaPress', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Press_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage TblAaPress', 'url'=>array('admin')),
);
?>

<h1>View TblAaPress #<?php echo $model->Press_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Press_id',
		'Press_Artist_id',
		'Press_News_Type',
		'Press_News_Title',
		'Press_News_Date',
		'Press_News_Source',
		'Press_News_Content',
		'Press_News_Featured',
		'Press_News_Exclusive',
		'Press_News_Status',
		'Press_Indate',
		'Press_LastUpdate',
	),
)); ?>
