<?php
$this->breadcrumbs=array(
	'Tbl Promotions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblPromotion', 'url'=>array('index')),
	array('label'=>'Manage TblPromotion', 'url'=>array('admin')),
);
?>

<h1>Create TblPromotion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>