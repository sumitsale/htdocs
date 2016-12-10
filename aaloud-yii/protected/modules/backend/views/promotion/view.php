<?php
$this->breadcrumbs=array(
	'Tbl Promotions'=>array('index'),
	$model->PROMO_ID,
);

$this->menu=array(
	array('label'=>'List TblPromotion', 'url'=>array('index')),
	array('label'=>'Create TblPromotion', 'url'=>array('create')),
	array('label'=>'Update TblPromotion', 'url'=>array('update', 'id'=>$model->PROMO_ID)),
	array('label'=>'Delete TblPromotion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->PROMO_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblPromotion', 'url'=>array('admin')),
);
?>

<h1>View TblPromotion #<?php echo $model->PROMO_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'PROMO_ID',
		'PROMO_TITLE',
		'PLAN_ID',
		'STORE_FRONT_ID',
		'PROMO_STATUS',
		'PROMO_CREATED',
		'PROMO_MODIFIED',
	),
)); ?>
