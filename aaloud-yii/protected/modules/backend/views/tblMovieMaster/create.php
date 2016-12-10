<?php
$this->breadcrumbs=array(
	'Tbl Movie Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblMovieMaster', 'url'=>array('index')),
	array('label'=>'Manage TblMovieMaster', 'url'=>array('admin')),
);
?>

<h1>Create TblMovieMaster</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>