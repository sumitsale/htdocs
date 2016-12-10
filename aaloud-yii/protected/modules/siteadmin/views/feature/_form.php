<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'feature-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CONTENT_TYPE_ID'); ?>
		<?php echo $form->textField($model,'CONTENT_TYPE_ID'); ?>
		<?php echo $form->error($model,'CONTENT_TYPE_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ARTIST_ID'); ?>
		<?php echo $form->textField($model,'ARTIST_ID',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'ARTIST_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LAST_UPDATE'); ?>
		<?php echo $form->textField($model,'LAST_UPDATE'); ?>
		<?php echo $form->error($model,'LAST_UPDATE'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->