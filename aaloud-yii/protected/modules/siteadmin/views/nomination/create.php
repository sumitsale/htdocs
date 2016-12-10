<?php
$this->breadcrumbs=array(
	'Tbl Artist Nominations'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List TblArtistNomination', 'url'=>array('index')),
	//array('label'=>'Manage TblArtistNomination', 'url'=>array('admin')),
);
?>

<h1>Create TblArtistNomination</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'genrelist'=>$genrelist)); ?>