<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'flash-banner-list-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'flash_title'); ?>
		<?php echo $form->textField($model,'flash_title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'flash_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flash_section'); ?>
		<?php echo $form->textField($model,'flash_section',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'flash_section'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'xmlpath'); ?>
		<?php echo $form->textField($model,'xmlpath',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'xmlpath'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->