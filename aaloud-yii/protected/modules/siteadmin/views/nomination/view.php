<?php
$this->breadcrumbs=array(
	'Tbl Artist Nominations'=>array('index'),
	$model->NOMINATION_ID,
);

$this->menu=array(
	array('label'=>'List TblArtistNomination', 'url'=>array('index')),
	array('label'=>'Create TblArtistNomination', 'url'=>array('create')),
	array('label'=>'Update TblArtistNomination', 'url'=>array('update', 'id'=>$model->NOMINATION_ID)),
	array('label'=>'Delete TblArtistNomination', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->NOMINATION_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblArtistNomination', 'url'=>array('admin')),
);
?>

<h1>View TblArtistNomination #<?php echo $model->NOMINATION_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NOMINATION_ID',
		'GENERE',
		'NOMINATION_FOR',
		'CONTENT_ID',
	),
)); ?>
