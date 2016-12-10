<?php
$this->breadcrumbs=array(
	'Tbl Specials',
);

$this->menu=array(
	array('label'=>'Create TblSpecials', 'url'=>array('create')),
	array('label'=>'Manage TblSpecials', 'url'=>array('admin')),
);
?>

<h1>Tbl Specials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
