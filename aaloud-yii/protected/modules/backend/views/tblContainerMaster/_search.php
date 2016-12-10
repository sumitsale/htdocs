<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'CONTAINER_ID'); ?>
		<?php echo $form->textField($model,'CONTAINER_ID',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CONTAINER_LOCATION'); ?>
		<?php echo $form->textField($model,'CONTAINER_LOCATION',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CONTAINER_NAME'); ?>
		<?php echo $form->textField($model,'CONTAINER_NAME',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STORE_FRONT_ID'); ?>
		<?php echo $form->textField($model,'STORE_FRONT_ID',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->