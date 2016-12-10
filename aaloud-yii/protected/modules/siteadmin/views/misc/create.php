<?php
$this->breadcrumbs=array(
	'Tbl Aa Miscs'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List TblAaMisc', 'url'=>array('index')),
	//array('label'=>'Manage TblAaMisc', 'url'=>array('admin')),
);
?>

<h1>Update</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'exclusive'=>$exclusive,
			'fartist'=>$fartist,'misc_query'=>$misc_query)); ?>