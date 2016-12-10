<?php
$this->breadcrumbs=array(
	'Model Homecenters',
);

$this->menu=array(
	array('label'=>'Create model_homecenter', 'url'=>array('create')),
	array('label'=>'Manage model_homecenter', 'url'=>array('admin')),
);
?>

<h1>Model Homecenters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
