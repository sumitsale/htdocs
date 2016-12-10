<?php
$this->breadcrumbs=array(
	'Pows'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List pow', 'url'=>array('index')),
	//array('label'=>'Manage pow', 'url'=>array('admin')),
);
?>

<h1>Create pow</h1>

<?php echo $this->renderPartial('_form', array('model'=>$mode)); ?>