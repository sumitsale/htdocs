<?php
$this->breadcrumbs=array(
	'Tbl Home Videos'=>array('index'),
	$model->VIDEO_ID=>array('view','id'=>$model->VIDEO_ID),
	'Update',
);

$this->menu=array(
	//array('label'=>'List TblHomeVideo', 'url'=>array('index')),
	//array('label'=>'Create TblHomeVideo', 'url'=>array('create')),
	//array('label'=>'View TblHomeVideo', 'url'=>array('view', 'id'=>$model->VIDEO_ID)),
	//array('label'=>'Manage TblHomeVideo', 'url'=>array('admin')),
);
?>

<h1>Update Videos</h1>

<?php echo $this->renderPartial('up_form', array('model'=>$model,'row'=>$row,'id'=>$id)); ?>