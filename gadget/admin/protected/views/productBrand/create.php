<?php
/* @var $this ProductBrandController */
/* @var $model ProductBrand */

$this->breadcrumbs=array(
	'Product Brands'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductBrand', 'url'=>array('index')),
	array('label'=>'Manage ProductBrand', 'url'=>array('admin')),
);
?>

<h1>Add new ProductBrand</h1>

<?php $this->renderPartial('_form', array('model'=>$model,
										  'master_category'=>$master_category,
										  'master_brand'=>$master_brand)); ?>