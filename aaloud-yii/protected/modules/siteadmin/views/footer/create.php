<?php
$this->breadcrumbs=array(
	'Footers'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List footer', 'url'=>array('index')),
	//array('label'=>'Manage footer', 'url'=>array('admin')),
);
?>

<h1>Create footer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>