<?php
$this->breadcrumbs=array(
	'Footers'=>array('index'),
	$model->footer_section_id=>array('view','id'=>$model->footer_section_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List footer', 'url'=>array('index')),
	//array('label'=>'Create footer', 'url'=>array('create')),
	//array('label'=>'View footer', 'url'=>array('view', 'id'=>$model->footer_section_id)),
	//array('label'=>'Manage footer', 'url'=>array('admin')),
);
?>

<?php /*
<h1>Update footer <?php echo $model->footer_section_id; ?></h1>
*/ ?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'id'=>$id)); ?>