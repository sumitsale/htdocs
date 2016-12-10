<?php
$this->breadcrumbs=array(
	'Tbl Aa Quotes'=>array('index'),
	$model->Quote_Id=>array('view','id'=>$model->Quote_Id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List TblAaQuote', 'url'=>array('index')),
	//array('label'=>'Create TblAaQuote', 'url'=>array('create')),
	//array('label'=>'View TblAaQuote', 'url'=>array('view', 'id'=>$model->Quote_Id)),
	//array('label'=>'Manage TblAaQuote', 'url'=>array('admin')),
);
?>

<h1>Update Quotes</h1>

<?php echo $this->renderPartial('up_form', array('model'=>$model,'row'=>$row,'id'=>$id)); ?>