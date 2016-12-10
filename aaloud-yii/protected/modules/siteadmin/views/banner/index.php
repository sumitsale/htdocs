<?php
$this->breadcrumbs=array(
	'Tbl Banner Location Masters',
);

$this->menu=array(
	array('label'=>'Create TblBannerLocationMaster', 'url'=>array('create')),
	array('label'=>'Manage TblBannerLocationMaster', 'url'=>array('admin')),
);
?>

<h1>Tbl Banner Location Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
