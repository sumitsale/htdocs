<?php
$this->breadcrumbs=array(
	'Tbl Category Details'=>array('index'),
	$model->CATEGORY_DETAILS_ID=>array('view','id'=>$model->CATEGORY_DETAILS_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblCategoryDetails', 'url'=>array('index')),
	array('label'=>'Create TblCategoryDetails', 'url'=>array('create')),
	array('label'=>'View TblCategoryDetails', 'url'=>array('view', 'id'=>$model->CATEGORY_DETAILS_ID)),
	array('label'=>'Manage TblCategoryDetails', 'url'=>array('admin')),
);
?>

<h1>Update TblCategoryDetails <?php echo $model->CATEGORY_DETAILS_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>