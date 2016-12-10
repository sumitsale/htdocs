<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'PLAYERID'); ?>
		<?php echo $form->textField($model,'PLAYERID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CONTENTID'); ?>
		<?php echo $form->textField($model,'CONTENTID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CONTENTNAME'); ?>
		<?php echo $form->textField($model,'CONTENTNAME',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRIORITY'); ?>
		<?php echo $form->textField($model,'PRIORITY'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'INDATE'); ?>
		<?php echo $form->textField($model,'INDATE'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->