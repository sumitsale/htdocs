<?php
$this->breadcrumbs=array(
	'Tbl Movie Masters',
);

$this->menu=array(
	array('label'=>'Create TblMovieMaster', 'url'=>array('create')),
	array('label'=>'Manage TblMovieMaster', 'url'=>array('admin')),
);
?>

<h1>Tbl Movie Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
