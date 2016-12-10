<?php
$this->breadcrumbs=array(
	'Genre Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List GenreMaster', 'url'=>array('index')),
	//array('label'=>'Manage GenreMaster', 'url'=>array('admin')),
);
?>

<h1>Add Genre</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'result'=>$result,'item_count'=>$item_count,'page_size'=>$page_size,'pages'=>$pages,'sample'=>$sample)); ?>