<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tb1-home-flash-banner-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'url1'); ?>
		<?php echo $form->textField($model,'url1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url2'); ?>
		<?php echo $form->textField($model,'url2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url3'); ?>
		<?php echo $form->textField($model,'url3',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url4'); ?>
		<?php echo $form->textField($model,'url4',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url5'); ?>
		<?php echo $form->textField($model,'url5',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flash_file'); ?>
		<?php echo $form->textField($model,'flash_file',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'flash_file'); ?>
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