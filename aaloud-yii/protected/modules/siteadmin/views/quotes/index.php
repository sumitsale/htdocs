<?php
$this->breadcrumbs=array(
	'Tbl Aa Quotes',
);

$this->menu=array(
	array('label'=>'Create TblAaQuote', 'url'=>array('create')),
	array('label'=>'Manage TblAaQuote', 'url'=>array('admin')),
);
?>

<h1>Tbl Aa Quotes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
