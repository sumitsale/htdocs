<?php
$this->breadcrumbs=array(
	'Upc Events'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List UpcEvents', 'url'=>array('index')),
	//array('label'=>'Create UpcEvents', 'url'=>array('create')),
	//array('label'=>'View UpcEvents', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage UpcEvents', 'url'=>array('admin')),
);
?>

<h1>Update Events </h1>

<?php echo $this->renderPartial('up_form', array('model'=>$model,'id'=>$id)); ?>