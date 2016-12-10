<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-promotion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PROMO_TITLE'); ?>
		<?php echo $form->textField($model,'PROMO_TITLE',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'PROMO_TITLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PLAN_ID'); ?>
		<?php echo $form->textField($model,'PLAN_ID',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'PLAN_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STORE_FRONT_ID'); ?>
		<?php echo $form->textField($model,'STORE_FRONT_ID',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'STORE_FRONT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PROMO_STATUS'); ?>
		<?php echo $form->textField($model,'PROMO_STATUS',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'PROMO_STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PROMO_CREATED'); ?>
		<?php echo $form->textField($model,'PROMO_CREATED'); ?>
		<?php echo $form->error($model,'PROMO_CREATED'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PROMO_MODIFIED'); ?>
		<?php echo $form->textField($model,'PROMO_MODIFIED'); ?>
		<?php echo $form->error($model,'PROMO_MODIFIED'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->