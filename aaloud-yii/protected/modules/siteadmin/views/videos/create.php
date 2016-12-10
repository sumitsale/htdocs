<?php
$this->breadcrumbs=array(
	'Tbl Home Videos'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List TblHomeVideo', 'url'=>array('index')),
	//array('label'=>'Manage TblHomeVideo', 'url'=>array('admin')),
);
?>

<h1>Add Videos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>