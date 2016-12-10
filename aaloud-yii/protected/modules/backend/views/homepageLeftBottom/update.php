<?php
$this->breadcrumbs=array(
	'Homepage Left Bottoms'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HomepageLeftBottom', 'url'=>array('index')),
	array('label'=>'Create HomepageLeftBottom', 'url'=>array('create')),
	array('label'=>'View HomepageLeftBottom', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage HomepageLeftBottom', 'url'=>array('admin')),
);
?>

<h1>Update HomepageLeftBottom <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>