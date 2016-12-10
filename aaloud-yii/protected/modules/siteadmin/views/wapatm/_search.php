<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ATM_ID'); ?>
		<?php echo $form->textField($model,'ATM_ID',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ATM_TITLE'); ?>
		<?php echo $form->textField($model,'ATM_TITLE',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ATM_DESC'); ?>
		<?php echo $form->textField($model,'ATM_DESC',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ATM_URL'); ?>
		<?php echo $form->textField($model,'ATM_URL',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ATM_MONTH'); ?>
		<?php echo $form->textField($model,'ATM_MONTH'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ATM_YEAR'); ?>
		<?php echo $form->textField($model,'ATM_YEAR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ATM_INDATE'); ?>
		<?php echo $form->textField($model,'ATM_INDATE'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->