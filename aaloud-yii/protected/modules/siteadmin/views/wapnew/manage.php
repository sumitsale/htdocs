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

<?php
/* code for displaying success msg after login */
    Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
       CClientScript::POS_READY
    );
?>
 
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; 
/* Code for Success msg ends here */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'paisa-vasool-form',
	'enableAjaxValidation'=>false,
)); ?>
<h1>WAP New Releases</h1>
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
if(in_array($artistid,$waparray))
{
echo $form->checkBox($wap,'Artist_Status[]',  array('value'=>$artistid,'checked'=>'checked','uncheckValue' => null,));
}
else
{
echo $form->checkBox($wap,'Artist_Status[]',  array('value'=>$artistid,'uncheckValue' => null,));
}
 ?></td>
</tr>
<?php
}
?>
</table>

	<tr>
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update'); ?></td>
	</tr>

<?php $this->endWidget(); ?>
</div>