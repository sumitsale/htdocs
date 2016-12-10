<?php
$this->breadcrumbs=array(
	'Tbl User Reviews'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List TblUserReviews', 'url'=>array('index')),
	//array('label'=>'Manage TblUserReviews', 'url'=>array('admin')),
);
?>

<h1>Create TblUserReviews</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>