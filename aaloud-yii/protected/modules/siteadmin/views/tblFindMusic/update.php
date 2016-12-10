<?php
$this->breadcrumbs=array(
	'Tbl Find Musics'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblFindMusic', 'url'=>array('index')),
	array('label'=>'Create TblFindMusic', 'url'=>array('create')),
	array('label'=>'View TblFindMusic', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblFindMusic', 'url'=>array('admin')),
);
?>

<h1>Update TblFindMusic <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>