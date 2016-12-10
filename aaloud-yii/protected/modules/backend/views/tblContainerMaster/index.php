<?php
$this->breadcrumbs=array(
	'Tbl Container Masters',
);

$this->menu=array(
	array('label'=>'Create TblContainerMaster', 'url'=>array('create')),
	array('label'=>'Manage TblContainerMaster', 'url'=>array('admin')),
);
?>

<h1>Tbl Container Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
