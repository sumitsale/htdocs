<?php
$this->breadcrumbs=array(
	'Tbl Aa Presses'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List TblAaPress', 'url'=>array('index')),
	//array('label'=>'Manage TblAaPress', 'url'=>array('admin')),
);
?>

<h1>Add News</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'artist'=>$artist)); ?>