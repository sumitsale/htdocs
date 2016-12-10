<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'footer_section_id'); ?>
		<?php echo $form->textField($model,'footer_section_id',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'footer_section'); ?>
		<?php echo $form->textField($model,'footer_section',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'footer_section_image'); ?>
		<?php echo $form->textField($model,'footer_section_image',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'footer_section_url'); ?>
		<?php echo $form->textField($model,'footer_section_url',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'footer_section_text'); ?>
		<?php echo $form->textField($model,'footer_section_text',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'footer_section_status'); ?>
		<?php echo $form->textField($model,'footer_section_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'footer_section_lastupdate'); ?>
		<?php echo $form->textField($model,'footer_section_lastupdate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->