<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-home-video-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<table>
	<tr>
		<td><?php echo $form->labelEx($model,'VIDEO_ARTIST_TITLE'); ?></td>
		<td><?php echo $form->textField($model,'VIDEO_ARTIST_TITLE',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'VIDEO_ARTIST_TITLE'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'VIDEO_FILE'); ?></td>
		<td><?php echo $form->textField($model,'VIDEO_FILE',array('size'=>100,'maxlength'=>350)); ?>
		<?php echo $form->error($model,'VIDEO_FILE'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'VIDEO_DESC'); ?></td>
		<td><?php echo $form->textArea($model,'VIDEO_DESC',array('size'=>100,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'VIDEO_DESC'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'VIDEO_IMAGE'); ?></td>
		<td><?php echo $form->fileField($model,'VIDEO_IMAGE',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'VIDEO_IMAGE'); ?>
		</td>
	</tr>

	

	<tr align="center">
		<td> </td>
		<td ><?php echo CHtml::submitButton($model->isNewRecord ? '   Add Video   ' : 'Save'); ?>
		&nbsp;&nbsp;
			<?php echo CHtml::resetButton('   Clear Video   ', array('id'=>'form-reset-button')); ?>
		</td>
	</tr>

</table>
<?php $this->endWidget(); ?>

</div><!-- form -->