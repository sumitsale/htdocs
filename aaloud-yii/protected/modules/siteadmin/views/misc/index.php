<?php
$this->breadcrumbs=array(
	'Tbl Aa Miscs',
);

$this->menu=array(
	array('label'=>'Create TblAaMisc', 'url'=>array('create')),
	array('label'=>'Manage TblAaMisc', 'url'=>array('admin')),
);
?>

<h1>Tbl Aa Miscs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
