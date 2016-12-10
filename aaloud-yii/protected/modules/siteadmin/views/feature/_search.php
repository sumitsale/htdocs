<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'F_ID'); ?>
		<?php echo $form->textField($model,'F_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CONTENT_TYPE_ID'); ?>
		<?php echo $form->textField($model,'CONTENT_TYPE_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ARTIST_ID'); ?>
		<?php echo $form->textField($model,'ARTIST_ID',array('size'=>20,'maxlength'=>20)); ?>
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