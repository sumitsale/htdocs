<?php
$this->breadcrumbs=array(
	'Tbl Aa Players'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List TblAaPlayer', 'url'=>array('index')),
	//array('label'=>'Manage TblAaPlayer', 'url'=>array('admin')),
);
?>

<h1>Add To RadioPlayer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'result'=>$result,
			'misc_query'=>$misc_query,'item_count'=>$item_count,'page_size'=>$page_size,'pages'=>$pages,'sample'=>$sample)); ?>