<?php
$this->breadcrumbs=array(
	'Model Homecenters'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List model_homecenter', 'url'=>array('index')),
	//array('label'=>'Manage model_homecenter', 'url'=>array('admin')),
);
?>

<h1>Create model_homecenter</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>