
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'genre-master-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

<table>	
	
	<tr>
		<td><?php echo $form->labelEx($model,'genre_name : '); ?></td>
		<td><?php echo $form->textField($model,'genre_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'genre_name'); ?>
		</td>
	</tr>

	

	<tr align="center">
		<td> </td>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<td><?php echo CHtml::submitButton($model->isNewRecord ? ' Add Genre ' : 'Update Genre'); ?></td>
	</tr>

	
</table>	

<?php $this->endWidget(); ?>

</div><!-- form -->