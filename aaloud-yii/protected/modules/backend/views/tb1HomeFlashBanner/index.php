<?php
$this->breadcrumbs=array(
	'Tb1 Home Flash Banners',
);

$this->menu=array(
	array('label'=>'Create Tb1HomeFlashBanner', 'url'=>array('create')),
	array('label'=>'Manage Tb1HomeFlashBanner', 'url'=>array('admin')),
);
?>

<h1>Tb1 Home Flash Banners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
