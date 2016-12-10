<?php
$this->breadcrumbs=array(
	'Tbl Movie Masters'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List TblMovieMaster', 'url'=>array('index')),
	array('label'=>'Create TblMovieMaster', 'url'=>array('create')),
	array('label'=>'Update TblMovieMaster', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblMovieMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblMovieMaster', 'url'=>array('admin')),
);
?>

<h1>View TblMovieMaster #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'metasea_property_id',
		'metasea_content_code',
		'vendor_id',
		'title',
		'rel_date',
		'rel_date_site',
		'is_hd',
		'censor_certificate',
		'duration',
		'demo_play_time',
		'critic_rating',
		'user_rating',
		'user_rating_count',
		'img_120x170',
		'img_125x195',
		'img_180x255',
		'img_200x110',
		'img_440x225',
		'language',
		'starcast',
		'director',
		'producer',
		'musicdirector',
		'genre',
		'keywords',
		'added_on',
		'updated_on',
	),
)); ?>
