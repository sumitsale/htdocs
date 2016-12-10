<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'USER_ID'); ?>
		<?php echo $form->textField($model,'USER_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USER_TYPE'); ?>
		<?php echo $form->textField($model,'USER_TYPE',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BAND_NAME'); ?>
		<?php echo $form->textField($model,'BAND_NAME',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GENRE'); ?>
		<?php echo $form->textField($model,'GENRE',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BIO'); ?>
		<?php echo $form->textArea($model,'BIO',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'INSPIRATION'); ?>
		<?php echo $form->textArea($model,'INSPIRATION',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'META_ARTIST_ID'); ?>
		<?php echo $form->textField($model,'META_ARTIST_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USER_AGE'); ?>
		<?php echo $form->textField($model,'USER_AGE',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USER_GENDER'); ?>
		<?php echo $form->textField($model,'USER_GENDER',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USER_CITY'); ?>
		<?php echo $form->textField($model,'USER_CITY',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USER_COUNTRY'); ?>
		<?php echo $form->textField($model,'USER_COUNTRY',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LAST_UPDATED'); ?>
		<?php echo $form->textField($model,'LAST_UPDATED'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->