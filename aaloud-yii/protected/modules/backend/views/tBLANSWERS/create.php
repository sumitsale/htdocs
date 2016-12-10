<?php
$this->breadcrumbs=array(
	'Tblanswers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TBLANSWERS', 'url'=>array('index')),
	array('label'=>'Manage TBLANSWERS', 'url'=>array('admin')),
);
?>

<h1>Create TBLANSWERS</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>