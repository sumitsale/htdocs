<?php
$this->breadcrumbs=array(
	'Tbl Home Qplayers',
);

$this->menu=array(
	array('label'=>'Create TblHomeQplayer', 'url'=>array('create')),
	array('label'=>'Manage TblHomeQplayer', 'url'=>array('admin')),
);
?>

<h1>Tbl Home Qplayers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
