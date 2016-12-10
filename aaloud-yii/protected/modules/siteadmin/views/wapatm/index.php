<?php
$this->breadcrumbs=array(
	'Tbl Wap Atms',
);

$this->menu=array(
	array('label'=>'Create TblWapAtm', 'url'=>array('create')),
	array('label'=>'Manage TblWapAtm', 'url'=>array('admin')),
);
?>

<h1>Tbl Wap Atms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
