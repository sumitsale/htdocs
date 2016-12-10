<?php /*
$this->breadcrumbs=array(
	'Tbl Container Masters'=>array('index'),
	$model->CONTAINER_ID=>array('view','id'=>$model->CONTAINER_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblContainerMaster', 'url'=>array('index')),
	array('label'=>'Create TblContainerMaster', 'url'=>array('create')),
	array('label'=>'View TblContainerMaster', 'url'=>array('view', 'id'=>$model->CONTAINER_ID)),
	array('label'=>'Manage TblContainerMaster', 'url'=>array('admin')),
);
*/ ?>

<h1>Update Query </h1>
<table>
<?php echo $this->renderPartial('_form', array(
'model'=>$model,
'model1'=>$model1,
'model2'=>$model2,
'model3'=>$model3,
'model4'=>$model4,
'model5'=>$model5,
'model6'=>$model6,
'model7'=>$model7,
'model8'=>$model8,
'content'=>$content,
'language'=>$language,
'mood'=>$mood,
'artist'=>$artist,
'criteria'=>$criteria,
'result'=>$result,
'genre'=>$genre,
'category'=>$category,

)); ?>
</table>