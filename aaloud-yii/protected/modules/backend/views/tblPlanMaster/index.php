<?php
$this->breadcrumbs=array(
	'Tbl Plan Masters',
);

$this->menu=array(
	array('label'=>'Create TblPlanMaster', 'url'=>array('create')),
	array('label'=>'Manage TblPlanMaster', 'url'=>array('admin')),
);
?>

<h1>Tbl Plan Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
