<?php
$this->breadcrumbs=array(
	'Tbl Home Qplayers'=>array('index'),
	$model->PLAYERID=>array('view','id'=>$model->PLAYERID),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblHomeQplayer', 'url'=>array('index')),
	array('label'=>'Create TblHomeQplayer', 'url'=>array('create')),
	array('label'=>'View TblHomeQplayer', 'url'=>array('view', 'id'=>$model->PLAYERID)),
	array('label'=>'Manage TblHomeQplayer', 'url'=>array('admin')),
);
?>

<h1>Update TblHomeQplayer <?php echo $model->PLAYERID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>