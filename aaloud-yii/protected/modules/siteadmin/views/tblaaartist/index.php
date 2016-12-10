<?php
$this->breadcrumbs=array(
	'Model Tblaaartists',
);

$this->menu=array(
	array('label'=>'Create model_tblaaartist', 'url'=>array('create')),
	array('label'=>'Manage model_tblaaartist', 'url'=>array('admin')),
);
?>

<h1>Model Tblaaartists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
