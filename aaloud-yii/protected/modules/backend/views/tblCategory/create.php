<?php
$this->breadcrumbs=array(
	'Tbl Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblCategory', 'url'=>array('index')),
	array('label'=>'Manage TblCategory', 'url'=>array('admin')),
);
?>

<h1>Create TblCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>