<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Press_Kit_Id'); ?>
		<?php echo $form->textField($model,'Press_Kit_Id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Artist_Id'); ?>
		<?php echo $form->textField($model,'Artist_Id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pdf_File'); ?>
		<?php echo $form->textField($model,'Pdf_File',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Press_Kit_Status'); ?>
		<?php echo $form->textField($model,'Press_Kit_Status',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Press_Kit_Indate'); ?>
		<?php echo $form->textField($model,'Press_Kit_Indate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->