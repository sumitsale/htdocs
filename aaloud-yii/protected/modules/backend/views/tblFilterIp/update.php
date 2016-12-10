<?php
$this->breadcrumbs=array(
	'Tbl Filter Ips'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblFilterIp', 'url'=>array('index')),
	array('label'=>'Create TblFilterIp', 'url'=>array('create')),
	array('label'=>'View TblFilterIp', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblFilterIp', 'url'=>array('admin')),
);
?>

<h1>Update TblFilterIp <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>