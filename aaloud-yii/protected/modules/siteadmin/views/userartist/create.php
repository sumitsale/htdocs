<?php
$this->breadcrumbs=array(
	'Userartists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List userartist', 'url'=>array('index')),
	array('label'=>'Manage userartist', 'url'=>array('admin')),
);
?>

<h1>Create userartist</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>