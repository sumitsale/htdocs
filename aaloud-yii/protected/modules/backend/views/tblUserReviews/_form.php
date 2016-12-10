<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-user-reviews-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CONTENT_ID'); ?>
		<?php echo $form->textField($model,'CONTENT_ID',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'CONTENT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CONTENT_TYPE_ID'); ?>
		<?php echo $form->textField($model,'CONTENT_TYPE_ID',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'CONTENT_TYPE_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STORE_FRONT_ID'); ?>
		<?php echo $form->textField($model,'STORE_FRONT_ID',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'STORE_FRONT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USER_ID'); ?>
		<?php echo $form->textField($model,'USER_ID',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'USER_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FULL_NAME'); ?>
		<?php echo $form->textField($model,'FULL_NAME',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'FULL_NAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMAIL'); ?>
		<?php echo $form->textField($model,'EMAIL',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'EMAIL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USER_IP'); ?>
		<?php echo $form->textField($model,'USER_IP',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'USER_IP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USER_TYPE'); ?>
		<?php echo $form->textField($model,'USER_TYPE',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'USER_TYPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REVIEW_TITLE'); ?>
		<?php echo $form->textField($model,'REVIEW_TITLE',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'REVIEW_TITLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REVIEW_TEXT'); ?>
		<?php echo $form->textArea($model,'REVIEW_TEXT',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'REVIEW_TEXT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REVIEW_ADDEDON'); ?>
		<?php echo $form->textField($model,'REVIEW_ADDEDON'); ?>
		<?php echo $form->error($model,'REVIEW_ADDEDON'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MARK_AS_SAFE'); ?>
		<?php echo $form->textField($model,'MARK_AS_SAFE'); ?>
		<?php echo $form->error($model,'MARK_AS_SAFE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ABUSE'); ?>
		<?php echo $form->textField($model,'ABUSE'); ?>
		<?php echo $form->error($model,'ABUSE'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->