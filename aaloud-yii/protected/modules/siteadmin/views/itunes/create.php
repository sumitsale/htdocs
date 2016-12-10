<?php
$this->breadcrumbs=array(
	'Tbl Aa Itunes'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List TblAaItunes', 'url'=>array('index')),
	//array('label'=>'Manage TblAaItunes', 'url'=>array('admin')),
);
?>

<h1>Add Itunes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'misc_query'=>$misc_query,
			'result'=>$result,'item_count'=>$item_count,'page_size'=>$page_size,'pages'=>$pages,'sample'=>$sample)); ?>