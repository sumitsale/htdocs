<?php
$this->breadcrumbs=array(
	'Model Tblaaartists'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List model_tblaaartist', 'url'=>array('index')),
	//array('label'=>'Manage model_tblaaartist', 'url'=>array('admin')),
);
?>

<h1>Add Artist</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'id'=>$id)); ?>