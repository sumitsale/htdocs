<?php
$this->breadcrumbs=array(
	'Tbl Aa Itunes'=>array('index'),
	$model->ALBUM_ID=>array('view','id'=>$model->ALBUM_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblAaItunes', 'url'=>array('index')),
	array('label'=>'Create TblAaItunes', 'url'=>array('create')),
	array('label'=>'View TblAaItunes', 'url'=>array('view', 'id'=>$model->ALBUM_ID)),
	array('label'=>'Manage TblAaItunes', 'url'=>array('admin')),
);
?>

<h1>Update TblAaItunes <?php echo $model->ALBUM_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>