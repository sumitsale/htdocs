<?php
/* @var $this BrandProductSpecificationController */
/* @var $model BrandProductSpecification */

$this->breadcrumbs=array(
	'Brand Product Specifications'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BrandProductSpecification', 'url'=>array('index')),
	array('label'=>'Create BrandProductSpecification', 'url'=>array('create')),
	array('label'=>'Update BrandProductSpecification', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BrandProductSpecification', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BrandProductSpecification', 'url'=>array('admin')),
);
?>

<h1>View BrandProductSpecification #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'brand_product_id',
		'main_title',
		'sub_title',
		'specification',
		'date_added',
		'date_modified',
	),
)); ?>
