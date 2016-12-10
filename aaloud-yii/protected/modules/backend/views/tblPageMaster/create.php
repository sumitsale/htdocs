<?php
$this->breadcrumbs=array(
	'Tbl Page Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblPageMaster', 'url'=>array('index')),
	array('label'=>'Manage TblPageMaster', 'url'=>array('admin')),
);
?>

<h1>Create TblPageMaster</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>