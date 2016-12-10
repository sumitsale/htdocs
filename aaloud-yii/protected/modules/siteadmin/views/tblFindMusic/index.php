<?php
$this->breadcrumbs=array(
	'Tbl Find Musics',
);

$this->menu=array(
	array('label'=>'Create TblFindMusic', 'url'=>array('create')),
	array('label'=>'Manage TblFindMusic', 'url'=>array('admin')),
);
?>

<h1>Tbl Find Musics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
