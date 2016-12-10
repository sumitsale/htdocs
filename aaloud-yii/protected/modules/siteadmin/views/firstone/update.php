<?php
$this->breadcrumbs=array(
	'Firstones'=>array('index'),
	$model->ARTIST_ID=>array('view','id'=>$model->ARTIST_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List firstone', 'url'=>array('index')),
	array('label'=>'Create firstone', 'url'=>array('create')),
	array('label'=>'View firstone', 'url'=>array('view', 'id'=>$model->ARTIST_ID)),
	array('label'=>'Manage firstone', 'url'=>array('admin')),
);
?>

<h1>Update firstone <?php echo $model->ARTIST_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>