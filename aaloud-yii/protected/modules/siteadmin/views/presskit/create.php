<?php
$this->breadcrumbs=array(
	'Model Presskits'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List model_presskit', 'url'=>array('index')),
	//array('label'=>'Manage model_presskit', 'url'=>array('admin')),
);
?>

<h1>Add Presskit</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'artistname'=>$artistname)); ?>