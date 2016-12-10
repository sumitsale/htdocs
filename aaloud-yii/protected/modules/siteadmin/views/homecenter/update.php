<?php
$this->breadcrumbs=array(
	'Model Homecenters'=>array('index'),
	$model->center_section_id=>array('view','id'=>$model->center_section_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List model_homecenter', 'url'=>array('index')),
	//array('label'=>'Create model_homecenter', 'url'=>array('create')),
	//array('label'=>'View model_homecenter', 'url'=>array('view', 'id'=>$model->center_section_id)),
	//array('label'=>'Manage model_homecenter', 'url'=>array('admin')),
);
?>
<?php /*
<h1>Update model_homecenter <?php echo $model->center_section_id; ?></h1>
*/ ?>
<?php echo $this->renderPartial('updateform', array('model'=>$model,'id'=>$id)); ?>