<?php /*
$this->breadcrumbs=array(
	'Contactforminfos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List contactforminfo', 'url'=>array('index')),
	array('label'=>'Create contactforminfo', 'url'=>array('create')),
	array('label'=>'View contactforminfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage contactforminfo', 'url'=>array('admin')),
);
*/
?>


<h1>Add/Update contact information</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>