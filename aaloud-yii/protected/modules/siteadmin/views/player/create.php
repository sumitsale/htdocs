<?php
$this->breadcrumbs=array(
	'Tbl Home Qplayers'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List TblHomeQplayer', 'url'=>array('index')),
	//array('label'=>'Manage TblHomeQplayer', 'url'=>array('admin')),
);
?>

<h1>Add To QuickPlayer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'result'=>$result,
			'misc_query'=>$misc_query,'item_count'=>$item_count,'page_size'=>$page_size,'pages'=>$pages,'sample'=>$sample)); ?>