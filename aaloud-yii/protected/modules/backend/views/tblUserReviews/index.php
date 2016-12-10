<?php
$this->breadcrumbs=array(
	'Tbl User Reviews',
);

$this->menu=array(
	array('label'=>'Create TblUserReviews', 'url'=>array('create')),
	array('label'=>'Manage TblUserReviews', 'url'=>array('admin')),
);
?>

<h1>Tbl User Reviews</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
