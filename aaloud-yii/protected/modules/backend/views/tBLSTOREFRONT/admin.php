<?php
$this->breadcrumbs=array(
	'Tblstorefronts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TBLSTOREFRONT', 'url'=>array('index')),
	array('label'=>'Create TBLSTOREFRONT', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tblstorefront-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tblstorefronts</h1>

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
	'id'=>'tblstorefront-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'STORE_FRONT_ID',
		'STORE_FRONT_NAME',
		'COUNTRY_ID',
		'CURRENCY',
		'LANGUAGE_ID',
		'WEBSITE_URL',
		/*
		'WEBSITE_SECURE_URL',
		'WEBSITE_DELIVERY_URL',
		'WEBSITE_LICENCE_URL',
		'WAP_URL',
		'PAYMENT_GATEWAY_URL',
		'STORE_PARENT_URL',
		'MOOGAHOST',
		'MOOGALOGIN',
		'MOOGACONTENT',
		'MOOGAARTIST',
		'WEBSITE_PATH',
		'ADMIN_EMAIL',
		'AKAMAI_NOTIFICATION_URL',
		'TEMPLATE_FOLDER',
		'MAX_DOWNLOAD_COUNT',
		'CREATED_ON',
		'CREATED_BY',
		'UPDATED_ON',
		'MERCHANT_ID',
		'MERCHANT_PASSWORD',
		'STATUS',
		'EMAILER_PWD_URL',
		'EMAILER_CONTACT_URL',
		'EMAILER_CONTACTING_URL',
		'SMS_HEADER',
		'RESPONSE_MODE',
		'ECOUPONS',
		'HUNGAMAPLAYS',
		'CIRCLE_WISE_QUERY',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
