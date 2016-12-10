<?php
$this->breadcrumbs=array(
	'Tbl User Reviews'=>array('index'),
	$model->REVIEW_ID=>array('view','id'=>$model->REVIEW_ID),
	'Update',
);

$this->menu=array(
	//array('label'=>'List TblUserReviews', 'url'=>array('index')),
	//array('label'=>'Create TblUserReviews', 'url'=>array('create')),
	//array('label'=>'View TblUserReviews', 'url'=>array('view', 'id'=>$model->REVIEW_ID)),
	//array('label'=>'Manage TblUserReviews', 'url'=>array('admin')),
);
?>

<h1>Update TblUserReviews <?php echo $model->REVIEW_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>