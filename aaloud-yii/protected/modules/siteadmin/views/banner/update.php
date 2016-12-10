<?php
$this->breadcrumbs=array(
	'Tbl Banner Location Masters'=>array('index'),
	$model->LOCATION_ID=>array('view','id'=>$model->LOCATION_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblBannerLocationMaster', 'url'=>array('index')),
	array('label'=>'Create TblBannerLocationMaster', 'url'=>array('create')),
	array('label'=>'View TblBannerLocationMaster', 'url'=>array('view', 'id'=>$model->LOCATION_ID)),
	array('label'=>'Manage TblBannerLocationMaster', 'url'=>array('admin')),
);
?>

<h1>Update TblBannerLocationMaster <?php echo $model->LOCATION_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>