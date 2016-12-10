<?php /*
$this->breadcrumbs=array(
	'Contactforminfos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List contactforminfo', 'url'=>array('index')),
	array('label'=>'Manage contactforminfo', 'url'=>array('admin')),
);
*/
?>
<table border="1px">
<tr>
<td colspan="3">
<b>Add/Update contact information</b>
</td>
</tr>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</table>