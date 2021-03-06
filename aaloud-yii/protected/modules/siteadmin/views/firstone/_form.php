<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'firstone-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ARTIST_ID'); ?>
		<?php echo $form->textField($model,'ARTIST_ID',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'ARTIST_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Artist_Name'); ?>
		<?php echo $form->textField($model,'Artist_Name',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'Artist_Name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->