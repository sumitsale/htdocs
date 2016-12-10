<?php
$this->breadcrumbs=array(
	'Genre Masters'=>array('index'),
	$model->genre_id=>array('view','id'=>$model->genre_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List GenreMaster', 'url'=>array('index')),
	//array('label'=>'Create GenreMaster', 'url'=>array('create')),
	//array('label'=>'View GenreMaster', 'url'=>array('view', 'id'=>$model->genre_id)),
	//array('label'=>'Manage GenreMaster', 'url'=>array('admin')),
);
?>

<h1>Update Genre</h1>

<?php echo $this->renderPartial('up_form', array('model'=>$model,
			'id'=>$id)); ?>