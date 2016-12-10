<?php
$this->breadcrumbs=array(
	'Tblstorefronts',
);

$this->menu=array(
	array('label'=>'Create TBLSTOREFRONT', 'url'=>array('create')),
	array('label'=>'Manage TBLSTOREFRONT', 'url'=>array('admin')),
);
?>

<h1>Tblstorefronts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
