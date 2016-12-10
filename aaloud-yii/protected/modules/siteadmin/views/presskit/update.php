<?php
$this->breadcrumbs=array(
	'Model Presskits'=>array('index'),
	//$model->Press_Kit_Id=>array('view','id'=>$model->Press_Kit_Id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List model_presskit', 'url'=>array('index')),
	//array('label'=>'Create model_presskit', 'url'=>array('create')),
	//array('label'=>'View model_presskit', 'url'=>array('view', 'id'=>$model->Press_Kit_Id)),
	//array('label'=>'Manage model_presskit', 'url'=>array('admin')),
);
?>



<?php echo $this->renderPartial('_form', array('model'=>$model,'artistname'=>$artistname,'id'=>$id)); ?>