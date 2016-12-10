<?php
/* @var $this PackageDetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Package Details',
);

$this->menu=array(
	array('label'=>'Create PackageDetail', 'url'=>array('create')),
	array('label'=>'Manage PackageDetail', 'url'=>array('admin')),
);
?>

<h1>Package Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
