<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CATEGORY'); ?>
		<?php echo $form->textField($model,'CATEGORY',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'CATEGORY'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->