<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-page-master-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'page_title'); ?>
		<?php echo $form->textField($model,'page_title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'page_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_html_name'); ?>
		<?php echo $form->textField($model,'page_html_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'page_html_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_section'); ?>
		<?php echo $form->textField($model,'page_section',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'page_section'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->