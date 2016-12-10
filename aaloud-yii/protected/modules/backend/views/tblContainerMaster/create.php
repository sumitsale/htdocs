<?php /*
$this->breadcrumbs=array(
	'Tbl Container Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblContainerMaster', 'url'=>array('index')),
	array('label'=>'Manage TblContainerMaster', 'url'=>array('admin')),
); */
?>

<h1>Add New Container Details</h1>
<table>
<?php echo $this->renderPartial('addcont', array('model'=>$model,'containerlocation'=>$containerlocation)); ?>
</table>