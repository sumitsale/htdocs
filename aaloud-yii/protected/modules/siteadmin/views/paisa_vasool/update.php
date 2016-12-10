<?php
$this->breadcrumbs=array(
	'Paisa Vasools'=>array('index'),
	$model->ARTIST_ID=>array('view','id'=>$model->ARTIST_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List paisa_vasool', 'url'=>array('index')),
	array('label'=>'Create paisa_vasool', 'url'=>array('create')),
	array('label'=>'View paisa_vasool', 'url'=>array('view', 'id'=>$model->ARTIST_ID)),
	array('label'=>'Manage paisa_vasool', 'url'=>array('admin')),
);
?>

<h1>Update paisa_vasool <?php echo $model->ARTIST_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>