<?php
$this->breadcrumbs=array(
	'Tbl Category Details'=>array('index'),
	$model->CATEGORY_DETAILS_ID,
);

$this->menu=array(
	array('label'=>'List TblCategoryDetails', 'url'=>array('index')),
	array('label'=>'Create TblCategoryDetails', 'url'=>array('create')),
	array('label'=>'Update TblCategoryDetails', 'url'=>array('update', 'id'=>$model->CATEGORY_DETAILS_ID)),
	array('label'=>'Delete TblCategoryDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CATEGORY_DETAILS_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblCategoryDetails', 'url'=>array('admin')),
);
?>

<h1>View TblCategoryDetails #<?php echo $model->CATEGORY_DETAILS_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CATEGORY_DETAILS_ID',
		'CATEGORY_ID',
		'CONTENT_TYPE_ID',
		'STORE_FRONT_ID',
		'THEME_IMAGE',
		'PARENT_ID',
		'TAG_MAP',
		'STATUS',
		'LAST_UPDATED_ON',
		'LAST_UPDATED_BY',
		'PRIORITY',
		'ISNEW',
		'TRACK_CATELOG_ID',
		'ALBUM_CATELOG_ID',
		'ARTIST_CATELOG_ID',
		'CATEGORY_LANGUAGE_ID',
	),
)); ?>
