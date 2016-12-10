<?php
$this->breadcrumbs=array(
	'Model Tblaaartists'=>array('index'),
	$model->Artist_Id=>array('view','id'=>$model->Artist_Id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List model_tblaaartist', 'url'=>array('index')),
	//array('label'=>'Create model_tblaaartist', 'url'=>array('create')),
	//array('label'=>'View model_tblaaartist', 'url'=>array('view', 'id'=>$model->Artist_Id)),
	//array('label'=>'Manage model_tblaaartist', 'url'=>array('admin')),
);
?>



<?php echo $this->renderPartial('_form', array('model'=>$model,'id'=>$id)); ?>