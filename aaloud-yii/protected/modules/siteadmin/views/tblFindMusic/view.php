<?php
$this->breadcrumbs=array(
	'Tbl Find Musics'=>array('index'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'List TblFindMusic', 'url'=>array('index')),
	// array('label'=>'Create TblFindMusic', 'url'=>array('create')),
	// array('label'=>'Update TblFindMusic', 'url'=>array('update', 'id'=>$model->id)),
	// array('label'=>'Delete TblFindMusic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	// array('label'=>'Manage TblFindMusic', 'url'=>array('admin')),
);
?>

<h1>View TblFindMusic #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'artist_id',
		'artist_name',
		'hungama_link',
		'ovi_link',
		'itune_link',
		'sms_download_link',
	),
)); ?>
