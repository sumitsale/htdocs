<?php
/* @var $this PackageDetailController */
/* @var $model PackageDetail */

$this->breadcrumbs=array(
	'Package Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PackageDetail', 'url'=>array('index')),
	array('label'=>'Create PackageDetail', 'url'=>array('create')),
	array('label'=>'View PackageDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PackageDetail', 'url'=>array('admin')),
);
?>

<h1>Update PackageDetail <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>