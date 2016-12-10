<?php
$this->breadcrumbs=array(
	'Tbl Category Details',
);

$this->menu=array(
	array('label'=>'Create TblCategoryDetails', 'url'=>array('create')),
	array('label'=>'Manage TblCategoryDetails', 'url'=>array('admin')),
);
?>

<h1>Tbl Category Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
