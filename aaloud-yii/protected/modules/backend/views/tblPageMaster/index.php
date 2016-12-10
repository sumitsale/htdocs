<?php
$this->breadcrumbs=array(
	'Tbl Page Masters',
);

$this->menu=array(
	array('label'=>'Create TblPageMaster', 'url'=>array('create')),
	array('label'=>'Manage TblPageMaster', 'url'=>array('admin')),
);
?>

<h1>Tbl Page Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
