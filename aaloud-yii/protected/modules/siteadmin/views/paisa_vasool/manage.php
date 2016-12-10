<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('paisa-vasool-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'paisa-vasool-form',
	'enableAjaxValidation'=>false,
)); ?>
<h1>Paisa Vasools</h1>
<table>
<tr>
<th>Artist Id</th>
<th>Artist Name</th>
<th></th>
<?php
foreach($model_artist as $artist)
{
$artistid = $artist['Artist_Id'];
?>
</tr>
<tr>
<td><?php echo $artistid;   ?></td>
<td><?php echo $artist['Artist_Name'];   ?></td>
<td><?php 
if(in_array($artistid,$vasoolarray))
{
echo $form->checkBox($model_vasool,'Artist_Status[]',  array('value'=>$artistid,'checked'=>'checked','uncheckValue' => null,));
}
else
{
echo $form->checkBox($model_vasool,'Artist_Status[]',  array('value'=>$artistid,'uncheckValue' => null,));
}
 ?></td>
</tr>
<?php
}
?>
</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>