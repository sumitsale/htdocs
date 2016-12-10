<?php
$this->breadcrumbs=array(
	'Tbl Genre Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblGenreMaster', 'url'=>array('index')),
	array('label'=>'Manage TblGenreMaster', 'url'=>array('admin')),
);
?>

<h1>Create TblGenreMaster</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>