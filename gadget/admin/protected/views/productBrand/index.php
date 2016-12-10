<?php
/* @var $this ProductBrandController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Brands',
);

$this->menu=array(
	array('label'=>'Create ProductBrand', 'url'=>array('create')),
	array('label'=>'Manage ProductBrand', 'url'=>array('admin')),
);
?>

<h1>Product Brands</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
