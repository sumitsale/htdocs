<?php
$this->breadcrumbs=array(
	'Tbl Wap Atms'=>array('index'),
	$model->ATM_ID=>array('view','id'=>$model->ATM_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblWapAtm', 'url'=>array('index')),
	array('label'=>'Create TblWapAtm', 'url'=>array('create')),
	array('label'=>'View TblWapAtm', 'url'=>array('view', 'id'=>$model->ATM_ID)),
	array('label'=>'Manage TblWapAtm', 'url'=>array('admin')),
);
?>

<h1>Update TblWapAtm <?php echo $model->ATM_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>