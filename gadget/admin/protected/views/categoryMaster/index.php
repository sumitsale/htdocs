<?php
/* @var $this CategoryMasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Category Masters',
);

$this->menu=array(
	array('label'=>'Create CategoryMaster', 'url'=>array('create')),
	array('label'=>'Manage CategoryMaster', 'url'=>array('admin')),
);
?>

<h1>Category Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
