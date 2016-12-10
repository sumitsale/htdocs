<?php
$this->breadcrumbs=array(
	'Store Configs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List StoreConfig', 'url'=>array('index')),
	array('label'=>'Create StoreConfig', 'url'=>array('create')),
	array('label'=>'Update StoreConfig', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StoreConfig', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StoreConfig', 'url'=>array('admin')),
);
?>

<h1>View StoreConfig #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'location',
		'currency',
		'language',
		'website_url',
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
	),
)); ?>
