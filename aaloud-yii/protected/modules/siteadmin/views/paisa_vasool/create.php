<?php
$this->breadcrumbs=array(
	'Paisa Vasools'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List paisa_vasool', 'url'=>array('index')),
	array('label'=>'Manage paisa_vasool', 'url'=>array('admin')),
);
?>

<h1>Create paisa_vasool</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>