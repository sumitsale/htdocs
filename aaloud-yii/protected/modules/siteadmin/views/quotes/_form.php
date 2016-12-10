<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-aa-quote-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<table>
	
	<tr>
		<td><?php echo $form->labelEx($model,'Quote_Src'); ?></td>
		<td><?php echo $form->textField($model,'Quote_Src',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'Quote_Src'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Quote_Title'); ?></td>
		<td><?php echo $form->textField($model,'Quote_Title',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'Quote_Title'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Quote'); ?></td>
		<td><?php echo $form->textField($model,'Quote',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'Quote'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Quote_Image'); ?>
		<td><?php echo $form->fileField($model,'Quote_Image',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Quote_Image'); ?>
		</td>
	</tr>
	
	<tr>
	<td colspan=2>&nbsp;</td>
	</tr> 

	<tr align="center">
		<td> </td>
		<td><?php echo CHtml::submitButton($model->isNewRecord ? '   Add Quotes   ' : '   Update Quotes   '); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo CHtml::resetButton('   Clear Quotes   ', array('id'=>'form-reset-button')); ?></td>
	
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->