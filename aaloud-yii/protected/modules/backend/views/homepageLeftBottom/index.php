<?php
$this->breadcrumbs=array(
	'Homepage Left Bottoms',
);

$this->menu=array(
	array('label'=>'Create HomepageLeftBottom', 'url'=>array('create')),
	array('label'=>'Manage HomepageLeftBottom', 'url'=>array('admin')),
);
?>

<h1>Homepage Left Bottoms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
