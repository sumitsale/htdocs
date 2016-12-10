<?php
/* @var $this ProductBrandController */
/* @var $model ProductBrand */

$this->breadcrumbs=array(
	'Product Brands'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProductBrand', 'url'=>array('index')),
	array('label'=>'Create ProductBrand', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-brand-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Product Brands</h1>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-brand-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		
		//'master_category_id',
		'master_category_name',
		//'master_brand_id',
		'master_brand_name',
		'product_name',
		'rating',
		'available',
		'date_added',
		// 'date_modified',
		   array(
                        'class'=>'CLinkColumn',
                        'label'=>'specification',
                        'urlExpression'=>'Yii::app()->createUrl("BrandProductSpecification/create",array("product_brand_id"=>$data->id))',
                        'header'=>'Specification',
						),
		/*
		'thumbnail',
		'thumbnail_big',
		
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
