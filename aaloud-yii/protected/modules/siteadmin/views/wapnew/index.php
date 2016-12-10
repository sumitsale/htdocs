<?php
$this->breadcrumbs=array(
	'Wapnews',
);

$this->menu=array(
	array('label'=>'Create wapnew', 'url'=>array('create')),
	array('label'=>'Manage wapnew', 'url'=>array('admin')),
);
?>

<h1>Wapnews</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
