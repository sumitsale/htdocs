<?php
/* @var $this PackageRateAndFairController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Package Rate And Fairs',
);

$this->menu=array(
	array('label'=>'Create PackageRateAndFair', 'url'=>array('create')),
	array('label'=>'Manage PackageRateAndFair', 'url'=>array('admin')),
);
?>

<h1>Package Rate And Fairs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
