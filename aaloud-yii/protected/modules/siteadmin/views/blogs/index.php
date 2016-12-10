<?php
$this->breadcrumbs=array(
	'Artistaloud Blogs',
);

$this->menu=array(
	array('label'=>'Create ArtistaloudBlog', 'url'=>array('create')),
	array('label'=>'Manage ArtistaloudBlog', 'url'=>array('admin')),
);
?>

<h1>Artistaloud Blogs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
