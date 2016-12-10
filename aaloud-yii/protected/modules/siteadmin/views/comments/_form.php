<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comments-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	
	<table>
	<tr>
		<td>
			<?php echo $form->labelEx($model,'artist_id'); ?></td>
		<td><?php echo $form->textField($model,'artist_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'artist_id'); ?></td>
	</tr>

	<tr>
	    <td><?php echo $form->labelEx($model,'user_id'); ?></td>
		<td><?php echo $form->textField($model,'user_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'user_id'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'comment'); ?></td>
		<td><?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment'); ?></td>
	</tr>


	<tr>
		<td><?php echo $form->labelEx($model,'type'); ?></td>
		<td><?php echo $form->textField($model,'type',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'type'); ?></td>
	</tr>

	<tr>
		<td>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</td>
	</tr>
	
	</table>

<?php $this->endWidget(); ?>

</div><!-- form -->