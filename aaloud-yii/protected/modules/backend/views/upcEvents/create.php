<?php /*
$this->breadcrumbs=array(
	'Upc Events'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UpcEvents', 'url'=>array('index')),
	array('label'=>'Manage UpcEvents', 'url'=>array('admin')),
); */
?>

<h1>Create UpcEvents</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>