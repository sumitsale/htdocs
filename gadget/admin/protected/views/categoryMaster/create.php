<?php
/* @var $this CategoryMasterController */
/* @var $model CategoryMaster */

$this->breadcrumbs=array(
	'Category Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CategoryMaster', 'url'=>array('index')),
	array('label'=>'Manage CategoryMaster', 'url'=>array('admin')),
);
?>

<h1>Create CategoryMaster</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>