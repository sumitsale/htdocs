<?php
$this->breadcrumbs=array(
	'Homepage Left Bottoms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HomepageLeftBottom', 'url'=>array('index')),
	array('label'=>'Manage HomepageLeftBottom', 'url'=>array('admin')),
);
?>

<h1>Create HomepageLeftBottom</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>