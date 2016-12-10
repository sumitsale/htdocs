<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ANSWER_ID'); ?>
		<?php echo $form->textField($model,'ANSWER_ID',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'QUESTION_ID'); ?>
		<?php echo $form->textField($model,'QUESTION_ID',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STORE_FRONT_ID'); ?>
		<?php echo $form->textField($model,'STORE_FRONT_ID',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ANSWER'); ?>
		<?php echo $form->textArea($model,'ANSWER',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MAIN_TAB_ID'); ?>
		<?php echo $form->textField($model,'MAIN_TAB_ID',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TAB_ID'); ?>
		<?php echo $form->textField($model,'TAB_ID',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->