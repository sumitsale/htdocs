<?php
$this->breadcrumbs=array(
	'Footers',
);

$this->menu=array(
	array('label'=>'Create footer', 'url'=>array('create')),
	array('label'=>'Manage footer', 'url'=>array('admin')),
);
?>

<h1>Footers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
