<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'footer-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<table>
			<tr>
				<td><?php echo "Footer Title"; ?></td>
				<td><?php echo $form->textField($model,'footer_section',array('size'=>50,'maxlength'=>50)); ?>
						<?php echo $form->error($model,'footer_section'); ?></td>
			</tr>
	
	
	
	<tr>
		<td><?php echo "Footer URL"; ?></td>
		<td><?php echo $form->textField($model,'footer_section_url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'footer_section_url'); ?></td>
	</tr>
	
	
	<tr>
		    <td><?php echo "Footer Text";?></td>
			<td><?php echo $form->textField($model,'footer_section_text',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'footer_section_text'); ?></td>
	</tr>	
	
	
	<tr>
		<td><?php echo "Image Upload (107x125):"; ?></td>
		<td><?php echo $form->fileField($model,'footer_section_image',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'footer_section_image'); ?></td>
	</tr>
	
	
	<tr>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
	</tr>
	
	</table>
	
	<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'footer_section'); ?>
		<?php echo $form->textField($model,'footer_section',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'footer_section'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'footer_section_image'); ?>
		<?php echo $form->textField($model,'footer_section_image',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'footer_section_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'footer_section_url'); ?>
		<?php echo $form->textField($model,'footer_section_url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'footer_section_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'footer_section_text'); ?>
		<?php echo $form->textField($model,'footer_section_text',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'footer_section_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'footer_section_status'); ?>
		<?php echo $form->textField($model,'footer_section_status'); ?>
		<?php echo $form->error($model,'footer_section_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'footer_section_lastupdate'); ?>
		<?php echo $form->textField($model,'footer_section_lastupdate'); ?>
		<?php echo $form->error($model,'footer_section_lastupdate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
*/ ?>
<?php $this->endWidget(); ?>

</div><!-- form -->