<?php
$this->breadcrumbs=array(
	'Tbl Category Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblCategoryDetails', 'url'=>array('index')),
	array('label'=>'Manage TblCategoryDetails', 'url'=>array('admin')),
);
?>

<h1>Create TblCategoryDetails</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>