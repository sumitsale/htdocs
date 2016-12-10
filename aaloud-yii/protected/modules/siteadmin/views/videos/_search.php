<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'VIDEO_ID'); ?>
		<?php echo $form->textField($model,'VIDEO_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VIDEO_ARTIST_TITLE'); ?>
		<?php echo $form->textField($model,'VIDEO_ARTIST_TITLE',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VIDEO_FILE'); ?>
		<?php echo $form->textField($model,'VIDEO_FILE',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VIDEO_DESC'); ?>
		<?php echo $form->textField($model,'VIDEO_DESC',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VIDEO_IMAGE'); ?>
		<?php echo $form->textField($model,'VIDEO_IMAGE',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VIDEO_INDATE'); ?>
		<?php echo $form->textField($model,'VIDEO_INDATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VIDEO_STATUS'); ?>
		<?php echo $form->textField($model,'VIDEO_STATUS',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->