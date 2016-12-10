<?php
$this->breadcrumbs=array(
	'Store Configs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List StoreConfig', 'url'=>array('index')),
	array('label'=>'Create StoreConfig', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('store-config-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Store Configs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'store-config-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'location',
		'currency',
		'language',
		'website_url',
		/*
		'secure_url',
		'website_path',
		'web_del_url',
		'web_license_url',
		'wap_url',
		'temp_folder_path',
		'payment_gateway_url',
		'store_email',
		'sms_header',
		'response_mode',
		'download_count',
		'mooga_host_url',
		'mooga_login',
		'mooga_content',
		'mooga_artist',
		'merchant_id',
		'merchant_password',
		'store_payment_url',
		'aknmai_noti_email',
		'change_password_url',
		'contactus_url_wol',
		'contactus_url_wl',
		'ecoupons',
		'hungama_plays',
		'circle_wise_query',
		'upload_image',
		'created',
		'modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
