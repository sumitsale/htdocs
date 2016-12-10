<?php
/* @var $this BrandMasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Brand Masters',
);

$this->menu=array(
	array('label'=>'Create BrandMaster', 'url'=>array('create')),
	array('label'=>'Manage BrandMaster', 'url'=>array('admin')),
);
?>

<h1>Brand Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
