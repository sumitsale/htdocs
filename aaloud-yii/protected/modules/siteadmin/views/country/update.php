<?php
$this->breadcrumbs=array(
	'Country Masters'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List CountryMaster', 'url'=>array('index')),
	//array('label'=>'Create CountryMaster', 'url'=>array('create')),
	//array('label'=>'View CountryMaster', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage CountryMaster', 'url'=>array('admin')),
);
?>

<h1>Update Country</h1>

<?php echo $this->renderPartial('up_form', array('model'=>$model,'id'=>$id)); ?>