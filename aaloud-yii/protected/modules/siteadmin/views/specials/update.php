<?php
$this->breadcrumbs=array(
	'Tbl Specials'=>array('index'),
	$model->special_id=>array('view','id'=>$model->special_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List TblSpecials', 'url'=>array('index')),
	//array('label'=>'Create TblSpecials', 'url'=>array('create')),
	//array('label'=>'View TblSpecials', 'url'=>array('view', 'id'=>$model->special_id)),
	//array('label'=>'Manage TblSpecials', 'url'=>array('admin')),
);
?>

<h1>Update Specials</h1>

<?php echo $this->renderPartial('up_form', array('model'=>$model,'row'=>$row,'id'=>$id)); ?>