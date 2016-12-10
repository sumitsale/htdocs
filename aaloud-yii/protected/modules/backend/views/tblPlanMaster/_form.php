<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-plan-master-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PLAN_TITLE'); ?>
		<?php echo $form->textField($model,'PLAN_TITLE',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'PLAN_TITLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PLAN_DESC'); ?>
		<?php echo $form->textField($model,'PLAN_DESC'); ?>
		<?php echo $form->error($model,'PLAN_DESC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PLAN_FOR'); ?>
		<?php echo $form->textField($model,'PLAN_FOR',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'PLAN_FOR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PLAN_TYPE'); ?>
		<?php echo $form->textField($model,'PLAN_TYPE',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'PLAN_TYPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PLAN_CATALOG'); ?>
		<?php echo $form->textField($model,'PLAN_CATALOG',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'PLAN_CATALOG'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PLAN_DOWNLOAD'); ?>
		<?php echo $form->textField($model,'PLAN_DOWNLOAD',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'PLAN_DOWNLOAD'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PLAN_PURCHASE'); ?>
		<?php echo $form->textField($model,'PLAN_PURCHASE',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'PLAN_PURCHASE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PLAN_PACKAGE_TYPE'); ?>
		<?php echo $form->textField($model,'PLAN_PACKAGE_TYPE',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'PLAN_PACKAGE_TYPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PLAN_CONTENT_TYPE'); ?>
		<?php echo $form->textField($model,'PLAN_CONTENT_TYPE',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'PLAN_CONTENT_TYPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ADDED_ON'); ?>
		<?php echo $form->textField($model,'ADDED_ON'); ?>
		<?php echo $form->error($model,'ADDED_ON'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->