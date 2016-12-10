<?php
$this->breadcrumbs=array(
	'Thenews',
);

$this->menu=array(
	array('label'=>'Create Thenews', 'url'=>array('create')),
	array('label'=>'Manage Thenews', 'url'=>array('admin')),
);
?>

<h1>Thenews</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
