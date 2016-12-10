<?php
$this->breadcrumbs=array(
	'Tbl Specials'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List TblSpecials', 'url'=>array('index')),
	//array('label'=>'Manage TblSpecials', 'url'=>array('admin')),
);
?>

<h1>Add Specials</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>