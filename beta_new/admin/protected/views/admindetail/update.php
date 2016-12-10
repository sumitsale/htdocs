<?php
/* @var $this AdmindetailController */
/* @var $model Admindetail */

$this->breadcrumbs=array(
	'Admindetails'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Admindetail', 'url'=>array('index')),
	array('label'=>'Create Admindetail', 'url'=>array('create')),
	array('label'=>'View Admindetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Admindetail', 'url'=>array('admin')),
);
?>

<h1>Update Admindetail <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>