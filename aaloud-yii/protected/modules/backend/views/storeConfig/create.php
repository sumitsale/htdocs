<?php
$this->breadcrumbs=array(
	'Store Configs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StoreConfig', 'url'=>array('index')),
	array('label'=>'Manage StoreConfig', 'url'=>array('admin')),
);
?>

<h1>Create StoreConfig</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>