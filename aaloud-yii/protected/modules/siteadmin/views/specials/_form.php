<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-specials-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<table>
	
	<tr>
		<td><?php echo $form->labelEx($model,'special_name'); ?></td>
		<td><?php echo $form->textField($model,'special_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'special_name'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'special_link'); ?></td>
		<td><?php echo $form->textField($model,'special_link',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'special_link'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'special_image'); ?></td>
		<td><?php echo $form->fileField($model,'special_image',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'special_image'); ?>
		</td>
	</tr>

	

	<tr>
		<td> </td>
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Add Specials' : 'Update Specials'); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo CHtml::resetButton('  Clear Specials  ', array('id'=>'form-reset-button')); ?></td>
	</tr>

</table>	

<?php $this->endWidget(); ?>

</div><!-- form -->