<?php
$this->breadcrumbs=array(
	'Lang Masters',
);

$this->menu=array(
	array('label'=>'Create LangMaster', 'url'=>array('create')),
	array('label'=>'Manage LangMaster', 'url'=>array('admin')),
);
?>

<h1>Lang Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
