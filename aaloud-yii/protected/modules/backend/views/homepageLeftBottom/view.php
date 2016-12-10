<?php
$this->breadcrumbs=array(
	'Homepage Left Bottoms'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List HomepageLeftBottom', 'url'=>array('index')),
	//array('label'=>'Create HomepageLeftBottom', 'url'=>array('create')),
	//array('label'=>'Update HomepageLeftBottom', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete HomepageLeftBottom', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage HomepageLeftBottom', 'url'=>array('admin')),
);
?>

<h1>View HomepageLeftBottom #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'image1',
		'image2',
		'image3',
		'image4',
		'image5',
		'created',
		'modified',
	),
)); ?>
