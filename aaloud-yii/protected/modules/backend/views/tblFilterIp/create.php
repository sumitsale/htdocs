<?php
$this->breadcrumbs=array(
	'Tbl Filter Ips'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblFilterIp', 'url'=>array('index')),
	array('label'=>'Manage TblFilterIp', 'url'=>array('admin')),
);
?>

<h1>Create TblFilterIp</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>