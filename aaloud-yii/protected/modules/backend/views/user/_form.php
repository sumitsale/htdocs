<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>
  <table>
	<tr>
		<td><?php echo $form->labelEx($model,'username'); ?></td>
		<td><?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?></td>
		<td  class="errorSummary"><?php echo $form->error($model,'username'); ?></td>
	</tr>

 <!--<tr>
		<td><?php //echo $form->labelEx($model,'password'); ?></td>
		<td><?php //echo $form->passwordField($model,'password',array('size'=>20,'maxlength'=>128)); ?></td>
		<td  class="errorSummary"><?php //echo $form->error($model,'password'); ?></td>
	</tr> -->

	<tr>
		<td><?php echo $form->labelEx($model,'email'); ?></td>
		<td><?php echo $form->textField($model,'email',array('size'=>20,'maxlength'=>128)); ?></td>
		<td  class="errorSummary"><?php echo $form->error($model,'email'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'activkey'); ?></td>
		<td><?php echo $form->textField($model,'activkey',array('size'=>20,'maxlength'=>128)); ?></td>
		<td  class="errorSummary"><?php echo $form->error($model,'activkey'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'createtime'); ?></td>
		<td><?php echo $form->textField($model,'createtime'); ?></td>
		<td  class="errorSummary"><?php echo $form->error($model,'createtime'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'lastvisit'); ?></td>
		<td><?php echo $form->textField($model,'lastvisit'); ?></td>
		<td class="errorSummary"><?php echo   $form->error($model,'lastvisit'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'superuser'); ?></td>
		<td><?php echo $form->textField($model,'superuser',array('size'=>20,'maxlength'=>20)); ?></td>
		<td class="errorSummary"><?php  echo $form->error($model,'superuser'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'status'); ?></td>
		<td><?php echo $form->textField($model,'status',array('size'=>20,'maxlength'=>20)); ?></td>
		<td class="errorSummary"><?php echo $form->error($model,'status'); ?></td>
	</tr>

	<tr>
		<td colspan="3"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
	</tr>
  </table>
<?php $this->endWidget(); ?>

