<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'LOCATION_ID'); ?>
		<?php echo $form->textField($model,'LOCATION_ID',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LOCATION'); ?>
		<?php echo $form->textField($model,'LOCATION',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BANNER_MODULE'); ?>
		<?php echo $form->textField($model,'BANNER_MODULE',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BANNER_TITLE'); ?>
		<?php echo $form->textField($model,'BANNER_TITLE',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BANNER_WIDTH'); ?>
		<?php echo $form->textField($model,'BANNER_WIDTH',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BANNER_HEIGHT'); ?>
		<?php echo $form->textField($model,'BANNER_HEIGHT',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CREATED'); ?>
		<?php echo $form->textField($model,'CREATED'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MODIFIED'); ?>
		<?php echo $form->textField($model,'MODIFIED'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->