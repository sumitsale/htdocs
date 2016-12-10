<?php
$this->breadcrumbs=array(
	'Artistaloud Blogs'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List ArtistaloudBlog', 'url'=>array('index')),
	//array('label'=>'Manage ArtistaloudBlog', 'url'=>array('admin')),
);
?>

<h1>Add Blog</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>