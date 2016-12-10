<?php
$this->breadcrumbs=array(
	'Tbl Banner Location Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblBannerLocationMaster', 'url'=>array('index')),
	array('label'=>'Manage TblBannerLocationMaster', 'url'=>array('admin')),
);
?>

<h1>Create TblBannerLocationMaster</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>