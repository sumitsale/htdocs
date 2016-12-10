<?php
/* @var $this BrandProductSpecificationController */
/* @var $model BrandProductSpecification */

$this->breadcrumbs=array(
	'Brand Product Specifications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BrandProductSpecification', 'url'=>array('index')),
	array('label'=>'Manage BrandProductSpecification', 'url'=>array('admin')),
); 
?>

<h1>Add specification for - <?php echo $product_brand[0]['product_name']; ?></h1>


<?php $this->renderPartial('_form', array('model'=>$model,
'brand_product_specification'=>$brand_product_specification,
'product_brand_id'=>$product_brand_id,
'product_brand'=>$product_brand,
'model1'=>$model1,
)); ?>