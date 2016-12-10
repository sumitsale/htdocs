

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lang-master-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

<table>	
	
	<tr>
		<td><?php echo $form->labelEx($model,'Language : '); ?></td>
		<td><?php echo $form->textField($model,'lang_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'lang_name'); ?>
		</td>
		
	</tr>

	

	<tr align="center">
		<td> </td>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Add Language' : 'Update Language'); ?></td>
	</tr>
	
</table>

<?php $this->endWidget(); ?>

</div><!-- form -->