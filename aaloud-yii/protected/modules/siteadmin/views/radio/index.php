<?php
$this->breadcrumbs=array(
	'Tbl Aa Players',
);

$this->menu=array(
	array('label'=>'Create TblAaPlayer', 'url'=>array('create')),
	array('label'=>'Manage TblAaPlayer', 'url'=>array('admin')),
);
?>

<h1>Tbl Aa Players</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
