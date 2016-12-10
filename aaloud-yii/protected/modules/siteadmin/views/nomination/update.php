<?php
$this->breadcrumbs=array(
	'Tbl Artist Nominations'=>array('index'),
	$model->NOMINATION_ID=>array('view','id'=>$model->NOMINATION_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblArtistNomination', 'url'=>array('index')),
	array('label'=>'Create TblArtistNomination', 'url'=>array('create')),
	array('label'=>'View TblArtistNomination', 'url'=>array('view', 'id'=>$model->NOMINATION_ID)),
	array('label'=>'Manage TblArtistNomination', 'url'=>array('admin')),
);
?>

<h1>Update TblArtistNomination <?php echo $model->NOMINATION_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>