<?php
$this->breadcrumbs=array(
	'Artistaloud Blogs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List ArtistaloudBlog', 'url'=>array('index')),
	//array('label'=>'Create ArtistaloudBlog', 'url'=>array('create')),
	//array('label'=>'View ArtistaloudBlog', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage ArtistaloudBlog', 'url'=>array('admin')),
);
?>

<h1>Update Blog </h1>

<?php echo $this->renderPartial('up_form', array('model'=>$model,'row'=>$row,'id'=>$id)); ?>