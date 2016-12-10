<?php
$this->breadcrumbs=array(
	'Tbl Filter Ips',
);

$this->menu=array(
	array('label'=>'Create TblFilterIp', 'url'=>array('create')),
	array('label'=>'Manage TblFilterIp', 'url'=>array('admin')),
);
?>

<h1>Tbl Filter Ips</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
