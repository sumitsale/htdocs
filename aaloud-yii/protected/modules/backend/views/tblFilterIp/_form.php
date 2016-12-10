<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-filter-ip-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ipfrom'); ?>
		<?php echo $form->textField($model,'ipfrom',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ipfrom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ipto'); ?>
		<?php echo $form->textField($model,'ipto',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ipto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COUNTRY_ID'); ?>
		<?php echo $form->textField($model,'COUNTRY_ID'); ?>
		<?php echo $form->error($model,'COUNTRY_ID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->