<?php
$this->breadcrumbs=array(
	'Wapnews'=>array('index'),
	$model->ARTIST_ID=>array('view','id'=>$model->ARTIST_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List wapnew', 'url'=>array('index')),
	array('label'=>'Create wapnew', 'url'=>array('create')),
	array('label'=>'View wapnew', 'url'=>array('view', 'id'=>$model->ARTIST_ID)),
	array('label'=>'Manage wapnew', 'url'=>array('admin')),
);
?>

<h1>Update wapnew <?php echo $model->ARTIST_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>