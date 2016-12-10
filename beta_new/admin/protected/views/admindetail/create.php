<?php
/* @var $this AdmindetailController */
/* @var $model Admindetail */

$this->breadcrumbs=array(
	'Admindetails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Admindetail', 'url'=>array('index')),
	array('label'=>'Manage Admindetail', 'url'=>array('admin')),
);
?>

<h1>Create Admindetail</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>