<?php
$this->breadcrumbs=array(
	'Userartists',
);

$this->menu=array(
	array('label'=>'Create userartist', 'url'=>array('create')),
	array('label'=>'Manage userartist', 'url'=>array('admin')),
);
?>

<h1>Userartists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
