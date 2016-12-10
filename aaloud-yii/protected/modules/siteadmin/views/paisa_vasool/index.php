<?php
$this->breadcrumbs=array(
	'Paisa Vasools',
);

$this->menu=array(
	array('label'=>'Create paisa_vasool', 'url'=>array('create')),
	array('label'=>'Manage paisa_vasool', 'url'=>array('admin')),
);
?>

<h1>Paisa Vasools</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
