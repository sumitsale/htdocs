<?php
$this->breadcrumbs=array(
	'Tblstorefronts'=>array('index'),
	$model->STORE_FRONT_ID,
);

$this->menu=array(
	//array('label'=>'List TBLSTOREFRONT', 'url'=>array('index')),
	//array('label'=>'Create TBLSTOREFRONT', 'url'=>array('create')),
	//array('label'=>'Update TBLSTOREFRONT', 'url'=>array('update', 'id'=>$model->STORE_FRONT_ID)),
	//array('label'=>'Delete TBLSTOREFRONT', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->STORE_FRONT_ID),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage TBLSTOREFRONT', 'url'=>array('admin')),
);
?>

<h1>View TBLSTOREFRONT #<?php echo $model->STORE_FRONT_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'STORE_FRONT_ID',
		'STORE_FRONT_NAME',
		'COUNTRY_ID',
		'CURRENCY',
		'LANGUAGE_ID',
		'WEBSITE_URL',
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
	),
)); ?>
