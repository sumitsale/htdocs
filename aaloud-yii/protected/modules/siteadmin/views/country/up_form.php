<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'country-master-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<table>	
	
	
	<tr>
		<td><?php echo $form->labelEx($model,'name'); ?></td>
		<td><?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
		</td>
	</tr>

	

	<tr>
		<td> </td>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Add Country' : 'Update Country'); ?></td>
	</tr>
	
</table>



<?php $this->endWidget(); ?>

</div><!-- form -->