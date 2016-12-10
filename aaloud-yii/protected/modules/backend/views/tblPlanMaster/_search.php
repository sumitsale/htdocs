<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'PLAN_ID'); ?>
		<?php echo $form->textField($model,'PLAN_ID',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PLAN_TITLE'); ?>
		<?php echo $form->textField($model,'PLAN_TITLE',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PLAN_DESC'); ?>
		<?php echo $form->textField($model,'PLAN_DESC'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PLAN_FOR'); ?>
		<?php echo $form->textField($model,'PLAN_FOR',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PLAN_TYPE'); ?>
		<?php echo $form->textField($model,'PLAN_TYPE',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PLAN_CATALOG'); ?>
		<?php echo $form->textField($model,'PLAN_CATALOG',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PLAN_DOWNLOAD'); ?>
		<?php echo $form->textField($model,'PLAN_DOWNLOAD',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PLAN_PURCHASE'); ?>
		<?php echo $form->textField($model,'PLAN_PURCHASE',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PLAN_PACKAGE_TYPE'); ?>
		<?php echo $form->textField($model,'PLAN_PACKAGE_TYPE',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PLAN_CONTENT_TYPE'); ?>
		<?php echo $form->textField($model,'PLAN_CONTENT_TYPE',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ADDED_ON'); ?>
		<?php echo $form->textField($model,'ADDED_ON'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->