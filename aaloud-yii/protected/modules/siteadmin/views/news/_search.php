<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Press_id'); ?>
		<?php echo $form->textField($model,'Press_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Press_Artist_id'); ?>
		<?php echo $form->textField($model,'Press_Artist_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Press_News_Type'); ?>
		<?php echo $form->textField($model,'Press_News_Type',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Press_News_Title'); ?>
		<?php echo $form->textField($model,'Press_News_Title',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Press_News_Date'); ?>
		<?php echo $form->textField($model,'Press_News_Date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Press_News_Source'); ?>
		<?php echo $form->textField($model,'Press_News_Source',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Press_News_Content'); ?>
		<?php echo $form->textArea($model,'Press_News_Content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Press_News_Featured'); ?>
		<?php echo $form->textArea($model,'Press_News_Featured',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Press_News_Exclusive'); ?>
		<?php echo $form->textArea($model,'Press_News_Exclusive',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Press_News_Status'); ?>
		<?php echo $form->textField($model,'Press_News_Status',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Press_Indate'); ?>
		<?php echo $form->textField($model,'Press_Indate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Press_LastUpdate'); ?>
		<?php echo $form->textField($model,'Press_LastUpdate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->