<?php
$this->breadcrumbs=array(
	'Tblstorefronts'=>array('index'),
	$model->STORE_FRONT_ID=>array('view','id'=>$model->STORE_FRONT_ID),
	'Update',
);

$this->menu=array(
	//array('label'=>'List TBLSTOREFRONT', 'url'=>array('index')),
	//array('label'=>'Create TBLSTOREFRONT', 'url'=>array('create')),
	//array('label'=>'View TBLSTOREFRONT', 'url'=>array('view', 'id'=>$model->STORE_FRONT_ID)),
	//array('label'=>'Manage TBLSTOREFRONT', 'url'=>array('admin')),
);
?>

<h1> <?php //echo $model->STORE_FRONT_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'country'=>$country,'courrency'=>$courrency)); ?>