<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'PROMO_ID'); ?>
		<?php echo $form->textField($model,'PROMO_ID',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PROMO_TITLE'); ?>
		<?php echo $form->textField($model,'PROMO_TITLE',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PLAN_ID'); ?>
		<?php echo $form->textField($model,'PLAN_ID',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STORE_FRONT_ID'); ?>
		<?php echo $form->textField($model,'STORE_FRONT_ID',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PROMO_STATUS'); ?>
		<?php echo $form->textField($model,'PROMO_STATUS',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PROMO_CREATED'); ?>
		<?php echo $form->textField($model,'PROMO_CREATED'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PROMO_MODIFIED'); ?>
		<?php echo $form->textField($model,'PROMO_MODIFIED'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->