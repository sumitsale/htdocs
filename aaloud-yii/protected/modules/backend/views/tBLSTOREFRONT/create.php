<?php
$this->breadcrumbs=array(
	'Tblstorefronts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TBLSTOREFRONT', 'url'=>array('index')),
	array('label'=>'Manage TBLSTOREFRONT', 'url'=>array('admin')),
);
?>

<h1>Create TBLSTOREFRONT</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'country'=>$country,'courrency'=>$courrency)); ?>