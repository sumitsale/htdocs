<?php
$this->breadcrumbs=array(
	'Model Presskits',
);

$this->menu=array(
	array('label'=>'Create model_presskit', 'url'=>array('create')),
	array('label'=>'Manage model_presskit', 'url'=>array('admin')),
);
?>

<h1>Model Presskits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
