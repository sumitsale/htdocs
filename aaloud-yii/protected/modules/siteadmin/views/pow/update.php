<?php
$this->breadcrumbs=array(
	'Pows'=>array('index'),
	$model->POW_ID=>array('view','id'=>$model->POW_ID),
	'Update',
);

$this->menu=array(
	//array('label'=>'List pow', 'url'=>array('index')),
	//array('label'=>'Create pow', 'url'=>array('create')),
	//array('label'=>'View pow', 'url'=>array('view', 'id'=>$model->POW_ID)),
	//array('label'=>'Manage pow', 'url'=>array('admin')),
);
?>

<h1>Update pow <?php echo $model->POW_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>