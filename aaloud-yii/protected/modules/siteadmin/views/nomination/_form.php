<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-artist-nomination-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
<table>	

	<tr>
		<td><?php echo $form->labelEx($model,'GENERE'); ?></td>
		<td><?php echo $form->dropDownList($model,'GENERE',CHtml::listData($genrelist,'GENRE_ID','GENRE_NAME'), array('prompt'=>'Select Genre')); ?>
		<?php echo $form->error($model,'GENERE'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'NOMINATION_FOR'); ?></td>
		<td><?php echo $form->dropDownList($model,'NOMINATION_FOR',array('BS'=>'Best Song','BF'=>'Best Female','BM'=>'Best Male','BG'=>'Best Group','BGNR'=>'Best Genre')); ?>
		<?php echo $form->error($model,'NOMINATION_FOR'); ?></td>
	</tr>
	
	<tr>
		<td><?php echo $form->labelEx($model,'CONTENT_ID'); ?></td>
		<td><?php echo $form->textField($model,'CONTENT_ID',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'CONTENT_ID'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'CONTENT_ID'); ?></td>
		<td><?php echo $form->textField($model,'CONTENT_ID',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'CONTENT_ID'); ?></td>
	</tr>

	<tr>
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
		<td><?php echo CHtml::resetButton('Reset', array('id'=>'form-reset-button')); ?></td>
	</tr>

</table>
<?php $this->endWidget(); ?>

</div><!-- form -->