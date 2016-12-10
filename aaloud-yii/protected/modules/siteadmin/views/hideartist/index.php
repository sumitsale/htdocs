<?php
$this->breadcrumbs=array(
	'Hideartists',
);

$this->menu=array(
	array('label'=>'Create Hideartist', 'url'=>array('create')),
	array('label'=>'Manage Hideartist', 'url'=>array('admin')),
);
?>

<h1>Hideartists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
