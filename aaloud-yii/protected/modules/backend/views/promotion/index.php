<?php
$this->breadcrumbs=array(
	'Tbl Promotions',
);

$this->menu=array(
	array('label'=>'Create TblPromotion', 'url'=>array('create')),
	array('label'=>'Manage TblPromotion', 'url'=>array('admin')),
);
?>

<h1>Tbl Promotions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
