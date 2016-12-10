<?php
$this->breadcrumbs=array(
	'Tbl Categories'=>array('index'),
	$model->CATEGORY_ID=>array('view','id'=>$model->CATEGORY_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblCategory', 'url'=>array('index')),
	array('label'=>'Create TblCategory', 'url'=>array('create')),
	array('label'=>'View TblCategory', 'url'=>array('view', 'id'=>$model->CATEGORY_ID)),
	array('label'=>'Manage TblCategory', 'url'=>array('admin')),
);
?>

<h1>Update TblCategory <?php echo $model->CATEGORY_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>