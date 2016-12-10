<?php
$this->breadcrumbs=array(
	'Tbl Aa Quotes'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List TblAaQuote', 'url'=>array('index')),
	//array('label'=>'Manage TblAaQuote', 'url'=>array('admin')),
);
?>

<h1>Add Quotes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>