<?php
$this->breadcrumbs=array(
	'Lang Masters'=>array('index'),
	$model->lang_id=>array('view','id'=>$model->lang_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List LangMaster', 'url'=>array('index')),
	//array('label'=>'Create LangMaster', 'url'=>array('create')),
	//array('label'=>'View LangMaster', 'url'=>array('view', 'id'=>$model->lang_id)),
	//array('label'=>'Manage LangMaster', 'url'=>array('admin')),
);
?>

<h1>Update Language</h1>

<?php echo $this->renderPartial('up_form', array('model'=>$model,'id'=>$id)); ?>