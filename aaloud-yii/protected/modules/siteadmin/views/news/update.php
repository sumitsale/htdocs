<?php
$this->breadcrumbs=array(
	'Tbl Aa Presses'=>array('index'),
	$model->Press_id=>array('view','id'=>$model->Press_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List TblAaPress', 'url'=>array('index')),
	//array('label'=>'Create TblAaPress', 'url'=>array('create')),
	//array('label'=>'View TblAaPress', 'url'=>array('view', 'id'=>$model->Press_id)),
	//array('label'=>'Manage TblAaPress', 'url'=>array('admin')),
);
?>

<h1>Update News <?php //echo $model->Press_id; ?></h1>

<?php echo $this->renderPartial('up_form', array('model'=>$model,'artist'=>$artist,'id'=>$id)); ?>