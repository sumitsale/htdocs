<?php
/* @var $this PackageRateAndFairController */
/* @var $model PackageRateAndFair */

$this->breadcrumbs=array(
	'Package Rate And Fairs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PackageRateAndFair', 'url'=>array('index')),
	array('label'=>'Create PackageRateAndFair', 'url'=>array('create')),
	array('label'=>'View PackageRateAndFair', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PackageRateAndFair', 'url'=>array('admin')),
);
?>

<h1>Update PackageRateAndFair <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>