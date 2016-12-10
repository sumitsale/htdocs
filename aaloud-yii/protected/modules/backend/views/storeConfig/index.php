<?php
$this->breadcrumbs=array(
	'Store Configs',
);

$this->menu=array(
	array('label'=>'Create StoreConfig', 'url'=>array('create')),
	array('label'=>'Manage StoreConfig', 'url'=>array('admin')),
);
?>

<h1>Store Configs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
