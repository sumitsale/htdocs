<?php
$this->breadcrumbs=array(
	'Tbl Home Videos',
);

$this->menu=array(
	array('label'=>'Create TblHomeVideo', 'url'=>array('create')),
	array('label'=>'Manage TblHomeVideo', 'url'=>array('admin')),
);
?>

<h1>Tbl Home Videos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
