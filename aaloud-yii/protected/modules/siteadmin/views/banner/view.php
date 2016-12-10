<?php
$this->breadcrumbs=array(
	'Tbl Banner Location Masters'=>array('index'),
	$model->LOCATION_ID,
);

$this->menu=array(
	array('label'=>'List TblBannerLocationMaster', 'url'=>array('index')),
	array('label'=>'Create TblBannerLocationMaster', 'url'=>array('create')),
	array('label'=>'Update TblBannerLocationMaster', 'url'=>array('update', 'id'=>$model->LOCATION_ID)),
	array('label'=>'Delete TblBannerLocationMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->LOCATION_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblBannerLocationMaster', 'url'=>array('admin')),
);
?>

<h1>View TblBannerLocationMaster #<?php echo $model->LOCATION_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'LOCATION_ID',
		'LOCATION',
		'BANNER_MODULE',
		'BANNER_TITLE',
		'BANNER_WIDTH',
		'BANNER_HEIGHT',
		'CREATED',
		'MODIFIED',
	),
)); ?>
