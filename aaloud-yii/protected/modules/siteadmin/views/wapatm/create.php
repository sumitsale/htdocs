<?php
$this->breadcrumbs=array(
	'Tbl Wap Atms'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List TblWapAtm', 'url'=>array('index')),
	//array('label'=>'Manage TblWapAtm', 'url'=>array('admin')),
);
?>

<h1>Add Wap Atm Details</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'result'=>$result)); ?>