<?php
$this->breadcrumbs=array(
	'Upc Events',
);

$this->menu=array(
	array('label'=>'Create UpcEvents', 'url'=>array('create')),
	array('label'=>'Manage UpcEvents', 'url'=>array('admin')),
);
?>

<h1>Upc Events</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
