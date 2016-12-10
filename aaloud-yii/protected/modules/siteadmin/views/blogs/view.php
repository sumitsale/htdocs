<?php
$this->breadcrumbs=array(
	'Artistaloud Blogs'=>array('index'),
	$model->id,
);

$this->menu=array(
    //array('label'=>'List ArtistaloudBlog', 'url'=>array('index')),
	//array('label'=>'Create ArtistaloudBlog', 'url'=>array('create')),
	//array('label'=>'Update ArtistaloudBlog', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete ArtistaloudBlog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage ArtistaloudBlog', 'url'=>array('admin')),
);
?>

<h1>View ArtistaloudBlog #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'blog_title',
		'blog_image',
		'blog_desc',
		'blog_url',
		'date',
	),
)); ?>
