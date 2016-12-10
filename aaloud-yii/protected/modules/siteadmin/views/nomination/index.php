<?php
$this->breadcrumbs=array(
	'Tbl Artist Nominations',
);

$this->menu=array(
	array('label'=>'Create TblArtistNomination', 'url'=>array('create')),
	array('label'=>'Manage TblArtistNomination', 'url'=>array('admin')),
);
?>

<h1>Tbl Artist Nominations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
