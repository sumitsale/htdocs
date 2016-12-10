<?php
$this->breadcrumbs=array(
	'Tblanswers'=>array('index'),
	$model->ANSWER_ID=>array('view','id'=>$model->ANSWER_ID),
	'Update',
);

$this->menu=array(
	//array('label'=>'List TBLANSWERS', 'url'=>array('index')),
	//array('label'=>'Create TBLANSWERS', 'url'=>array('create')),
	//array('label'=>'View TBLANSWERS', 'url'=>array('view', 'id'=>$model->ANSWER_ID)),
	//array('label'=>'Manage TBLANSWERS', 'url'=>array('admin')),
);
?>

<h1>Update TBLANSWERS <?php echo $model->ANSWER_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>