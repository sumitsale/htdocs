<?php
$this->breadcrumbs=array(
	'Thenews'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Thenews', 'url'=>array('index')),
	//array('label'=>'Manage Thenews', 'url'=>array('admin')),
);
?>

<h1>

</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>