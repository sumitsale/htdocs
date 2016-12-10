<?php
$this->breadcrumbs=array(
	'Firstones',
);

$this->menu=array(
	array('label'=>'Create firstone', 'url'=>array('create')),
	array('label'=>'Manage firstone', 'url'=>array('admin')),
);
?>

<h1>Firstones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
