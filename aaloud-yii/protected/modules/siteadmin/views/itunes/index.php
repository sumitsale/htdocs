<?php
$this->breadcrumbs=array(
	'Tbl Aa Itunes',
);

$this->menu=array(
	array('label'=>'Create TblAaItunes', 'url'=>array('create')),
	array('label'=>'Manage TblAaItunes', 'url'=>array('admin')),
);
?>

<h1>Tbl Aa Itunes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
