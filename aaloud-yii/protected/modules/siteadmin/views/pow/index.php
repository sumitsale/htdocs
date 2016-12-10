<?php
$this->breadcrumbs=array(
	'Pows',
);

$this->menu=array(
	array('label'=>'Create pow', 'url'=>array('create')),
	array('label'=>'Manage pow', 'url'=>array('admin')),
);
?>

<h1>Pows</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
