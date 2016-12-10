<?php
$this->breadcrumbs=array(
	'Wapnews'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List wapnew', 'url'=>array('index')),
	array('label'=>'Manage wapnew', 'url'=>array('admin')),
);
?>

<h1>Create wapnew</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>