<?php
$this->breadcrumbs=array(
	'Tbl Find Musics'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List TblFindMusic', 'url'=>array('index')),
	//array('label'=>'Manage TblFindMusic', 'url'=>array('admin')),
);
?>

<h1>Add FindMusic</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>