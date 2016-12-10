<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-category-form',
	'enableAjaxValidation'=>false,
)); ?>


<table>
<form>
<tr>
<td>Album Name</td>
<td><input type="text" name="name" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><span><?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Submit'); ?></span>
	<span><?php echo CHtml::submitButton($model->isNewRecord ? 'Close' : 'Close'); ?></span></td>
</tr>
</form>
</table>

<?php $this->endWidget(); ?>