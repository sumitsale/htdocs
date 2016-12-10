<?php
$this->breadcrumbs=array(
	'Flash Banner Lists',
);

$this->menu=array(
	array('label'=>'Create FlashBannerList', 'url'=>array('create')),
	array('label'=>'Manage FlashBannerList', 'url'=>array('admin')),
);
?>

<h1>Flash Banner Lists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
