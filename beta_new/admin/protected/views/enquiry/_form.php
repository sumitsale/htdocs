<?php
/* @var $this EnquiryController */
/* @var $model Enquiry */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'enquiry-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone'); ?>
		<?php echo $form->textField($model,'telephone',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'telephone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_id'); ?>
		<?php echo $form->textField($model,'email_id',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'email_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'check_in'); ?>
		<?php echo $form->textField($model,'check_in',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'check_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'check_out'); ?>
		<?php echo $form->textField($model,'check_out',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'check_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adult'); ?>
		<?php echo $form->textField($model,'adult',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'adult'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chiled'); ?>
		<?php echo $form->textField($model,'chiled',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'chiled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_of_room'); ?>
		<?php echo $form->textField($model,'no_of_room',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'no_of_room'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estimate_budget'); ?>
		<?php echo $form->textField($model,'estimate_budget',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'estimate_budget'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment_and_reference'); ?>
		<?php echo $form->textField($model,'comment_and_reference',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'comment_and_reference'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_added'); ?>
		<?php echo $form->textField($model,'date_added'); ?>
		<?php echo $form->error($model,'date_added'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_modified'); ?>
		<?php echo $form->textField($model,'date_modified'); ?>
		<?php echo $form->error($model,'date_modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->