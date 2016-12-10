<?php
$this->breadcrumbs=array(
	'Genre Masters',
);

$this->menu=array(
	array('label'=>'Create GenreMaster', 'url'=>array('create')),
	array('label'=>'Manage GenreMaster', 'url'=>array('admin')),
);
?>

<h1>Genre Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
