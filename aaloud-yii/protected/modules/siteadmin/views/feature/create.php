<?php
$this->breadcrumbs=array(
	'Features'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List feature', 'url'=>array('index')),
	array('label'=>'Manage feature', 'url'=>array('admin')),
);
?>

<h1>Create feature</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>