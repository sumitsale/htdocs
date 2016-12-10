<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'MISC_ID'); ?>
		<?php echo $form->textField($model,'MISC_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EXCLUSIVE_NEWS'); ?>
		<?php echo $form->textField($model,'EXCLUSIVE_NEWS',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FEATURED_ARTIST'); ?>
		<?php echo $form->textField($model,'FEATURED_ARTIST',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LAST_UPDATE'); ?>
		<?php echo $form->textField($model,'LAST_UPDATE'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->