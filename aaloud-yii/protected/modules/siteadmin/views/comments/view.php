<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->comment_id,
);

$this->menu=array(
	//array('label'=>'List Comments', 'url'=>array('index')),
	//array('label'=>'Create Comments', 'url'=>array('create')),
	//array('label'=>'Update Comments', 'url'=>array('update', 'id'=>$model->Comment_id)),
	//array('label'=>'Delete Comments', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Comment_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Comments', 'url'=>array('admin')),
);
?>

<h1>View Comments #<?php echo $model->comment_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'comment_id',
		'artist_id',
		'user_id',
		'comment',
		'indate',
		'last_updated',
		'parent_id',
		'comment_status',
		'type',
	),
)); ?>
