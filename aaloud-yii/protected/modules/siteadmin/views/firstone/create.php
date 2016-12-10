<?php
$this->breadcrumbs=array(
	'Firstones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List firstone', 'url'=>array('index')),
	array('label'=>'Manage firstone', 'url'=>array('admin')),
);
?>

<h1>Create firstone</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>