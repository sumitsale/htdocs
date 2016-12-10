<?php
$this->breadcrumbs=array(
	'Userartists'=>array('index'),
	$model->USER_ID=>array('view','id'=>$model->USER_ID),
	'Update',
);

$this->menu=array(
	//array('label'=>'List userartist', 'url'=>array('index')),
	//array('label'=>'Create userartist', 'url'=>array('create')),
	//array('label'=>'View userartist', 'url'=>array('view', 'id'=>$model->USER_ID)),
	//array('label'=>'Manage userartist', 'url'=>array('admin')),
);
?>



<?php echo $this->renderPartial('_form', array('model'=>$model,'model1'=>$model1,'id'=>$id,'sql'=>$sql,'sql1'=>$sql1,'id'=>$id,'id1'=>$id1,'sql2'=>$sql2)); ?>