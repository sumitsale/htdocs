<?php
$this->breadcrumbs=array(
	'Lang Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List LangMaster', 'url'=>array('index')),
	//array('label'=>'Manage LangMaster', 'url'=>array('admin')),
);
?>

<h1>Add Language</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'result'=>$result,'item_count'=>$item_count,'page_size'=>$page_size,'pages'=>$pages,'sample'=>$sample)); ?>