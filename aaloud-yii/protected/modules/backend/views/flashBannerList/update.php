<?php
$this->breadcrumbs=array(
	'Flash Banner Lists'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FlashBannerList', 'url'=>array('index')),
	array('label'=>'Create FlashBannerList', 'url'=>array('create')),
	array('label'=>'View FlashBannerList', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FlashBannerList', 'url'=>array('admin')),
);
?>

<h1>Update FlashBannerList <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>