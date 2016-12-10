<?php
/* @var $this AdmindetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Admindetails',
);

$this->menu=array(
	array('label'=>'Create Admindetail', 'url'=>array('create')),
	array('label'=>'Manage Admindetail', 'url'=>array('admin')),
);
?>

<h1>Admindetails</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
