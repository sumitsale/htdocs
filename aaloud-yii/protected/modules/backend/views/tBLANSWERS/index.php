<?php
$this->breadcrumbs=array(
	'Tblanswers',
);

$this->menu=array(
	array('label'=>'Create TBLANSWERS', 'url'=>array('create')),
	array('label'=>'Manage TBLANSWERS', 'url'=>array('admin')),
);
?>

<h1>Tblanswers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
