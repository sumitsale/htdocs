<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Quote_Id'); ?>
		<?php echo $form->textField($model,'Quote_Id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Quote_Src'); ?>
		<?php echo $form->textField($model,'Quote_Src',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Quote_Title'); ?>
		<?php echo $form->textField($model,'Quote_Title',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Quote'); ?>
		<?php echo $form->textField($model,'Quote',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Quote_Image'); ?>
		<?php echo $form->textField($model,'Quote_Image',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Quote_Status'); ?>
		<?php echo $form->textField($model,'Quote_Status',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Quote_LastUpdate'); ?>
		<?php echo $form->textField($model,'Quote_LastUpdate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->