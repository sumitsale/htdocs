<?php
$this->breadcrumbs=array(
	'Tbl Aa Miscs'=>array('index'),
	$model->MISC_ID=>array('view','id'=>$model->MISC_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblAaMisc', 'url'=>array('index')),
	array('label'=>'Create TblAaMisc', 'url'=>array('create')),
	array('label'=>'View TblAaMisc', 'url'=>array('view', 'id'=>$model->MISC_ID)),
	array('label'=>'Manage TblAaMisc', 'url'=>array('admin')),
);
?>

<h1>Update TblAaMisc <?php echo $model->MISC_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>