<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'model-homecenter-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<table>
	
	<tr>
		<td><?php echo "Block Title"; ?></td>
		<td><?php echo $form->textField($model,'center_section',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'center_section'); ?></td>
	</tr>

	

	<tr>
		<td><?php echo "Block URL"; ?></td>
		<td><?php echo $form->textField($model,'center_section_url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'center_section_url'); ?></td>
	</tr>

	<tr>
		<td><?php echo "Text"; ?></td>
		<td><?php echo $form->textField($model,'center_section_text',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'center_section_text'); ?></td>
	</tr>
	
	
	<tr>
		<td><?php echo "Image Upload (175x175):"; ?></td>
		<td><?php echo $form->fileField($model,'center_section_image',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'center_section_image'); ?>
		
		
		<a target="_blank" href="<?php echo Yii::app()->baseUrl;?>/images/homecenter/<?php echo $id; ?>/<?php echo $id.'.gif';?>"><?php echo "click image";  ?> </a>
		</td>
	</tr>
	
	
<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'center_section_status'); ?>
		<?php echo $form->textField($model,'center_section_status'); ?>
		<?php echo $form->error($model,'center_section_status'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'center_section_lastupdate'); ?>
		<?php echo $form->textField($model,'center_section_lastupdate'); ?>
		<?php echo $form->error($model,'center_section_lastupdate'); ?>
	</div>

	*/ ?>
	
	<tr>
		<td>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
		<td></td>
	</tr>
	
	</table>

<?php $this->endWidget(); ?>

</div><!-- form -->