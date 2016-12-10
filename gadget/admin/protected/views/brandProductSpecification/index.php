<?php
/* @var $this BrandProductSpecificationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Brand Product Specifications',
);

$this->menu=array(
	array('label'=>'Create BrandProductSpecification', 'url'=>array('create')),
	array('label'=>'Manage BrandProductSpecification', 'url'=>array('admin')),
);
?>

<h1>Brand Product Specifications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
