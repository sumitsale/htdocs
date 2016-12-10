<?php
$this->breadcrumbs=array(
	'Tbl User Reviews'=>array('index'),
	$model->REVIEW_ID,
);

$this->menu=array(
	//array('label'=>'List TblUserReviews', 'url'=>array('index')),
	//array('label'=>'Create TblUserReviews', 'url'=>array('create')),
	//array('label'=>'Update TblUserReviews', 'url'=>array('update', 'id'=>$model->REVIEW_ID)),
	//array('label'=>'Delete TblUserReviews', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->REVIEW_ID),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage TblUserReviews', 'url'=>array('admin')),
);
?>

<h1>View TblUserReviews #<?php echo $model->REVIEW_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'REVIEW_ID',
		'CONTENT_ID',
		'CONTENT_TYPE_ID',
		'STORE_FRONT_ID',
		'USER_ID',
		'FULL_NAME',
		'EMAIL',
		'USER_IP',
		'USER_TYPE',
		'REVIEW_TITLE',
		'REVIEW_TEXT',
		'REVIEW_ADDEDON',
		'STATUS',
		'MARK_AS_SAFE',
		'ABUSE',
	),
)); ?>
