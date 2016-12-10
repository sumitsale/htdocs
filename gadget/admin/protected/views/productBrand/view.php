<?php
/* @var $this ProductBrandController */
/* @var $model ProductBrand */

$this->breadcrumbs=array(
	'Product Brands'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductBrand', 'url'=>array('index')),
	array('label'=>'Create ProductBrand', 'url'=>array('create')),
	array('label'=>'Update ProductBrand', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductBrand', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductBrand', 'url'=>array('admin')),
);
?>

<h1>View ProductBrand #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_name',
		'master_category_id',
		'master_category_name',
		'master_brand_id',
		'master_brand_name',
		'thumbnail',
		'thumbnail_big',
		'rating',
		'available',
		'date_added',
		'date_modified',
	),
)); ?>
