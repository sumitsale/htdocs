<?php
$this->breadcrumbs=array(
	'Country Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List CountryMaster', 'url'=>array('index')),
	//array('label'=>'Manage CountryMaster', 'url'=>array('admin')),
);
?>

<h1>Add Country</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'result'=>$result)); ?>