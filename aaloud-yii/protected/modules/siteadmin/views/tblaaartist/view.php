<?php
$this->breadcrumbs=array(
	'Model Tblaaartists'=>array('index'),
	$model->Artist_Id,
);

$this->menu=array(
	//array('label'=>'List model_tblaaartist', 'url'=>array('index')),
	//array('label'=>'Create model_tblaaartist', 'url'=>array('create')),
	//array('label'=>'Update model_tblaaartist', 'url'=>array('update', 'id'=>$model->Artist_Id)),
	//array('label'=>'Delete model_tblaaartist', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Artist_Id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage model_tblaaartist', 'url'=>array('admin')),
);
?>

<h1>View model_tblaaartist #<?php echo $model->Artist_Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Artist_Id',
		'Artist_Name',
		'Artist_Bgcolor',
		'Artist_Bgimage',
		'Artist_Right_Bgcolor',
		'Artist_Right_Bgimage',
		'Artist_WAP_Image',
		'Artist_Twitter',
		'Artist_Facebook',
		'Artist_Flickr',
		'Artist_Caller_Keyword',
		'Artist_Status',
		'Artist_Indate',
		'Artist_LastUpdate',
		//'Artist_Hit_Count',
	),
)); ?>
