<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-banner-location-master-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'LOCATION'); ?>
		<?php echo $form->textField($model,'LOCATION',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'LOCATION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BANNER_MODULE'); ?>
		<?php echo $form->textField($model,'BANNER_MODULE',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'BANNER_MODULE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BANNER_TITLE'); ?>
		<?php echo $form->textField($model,'BANNER_TITLE',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'BANNER_TITLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BANNER_WIDTH'); ?>
		<?php echo $form->textField($model,'BANNER_WIDTH',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'BANNER_WIDTH'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BANNER_HEIGHT'); ?>
		<?php echo $form->textField($model,'BANNER_HEIGHT',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'BANNER_HEIGHT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CREATED'); ?>
		<?php echo $form->textField($model,'CREATED'); ?>
		<?php echo $form->error($model,'CREATED'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MODIFIED'); ?>
		<?php echo $form->textField($model,'MODIFIED'); ?>
		<?php echo $form->error($model,'MODIFIED'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->