<?php
/* @var $this HotelDetailController */
/* @var $model HotelDetail */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_id'); ?>
		<?php echo $form->textField($model,'hotel_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'overview_paragraph_1'); ?>
		<?php echo $form->textArea($model,'overview_paragraph_1',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'overview_paragraph_2'); ?>
		<?php echo $form->textArea($model,'overview_paragraph_2',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'overview_paragraph_3'); ?>
		<?php echo $form->textArea($model,'overview_paragraph_3',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_1_type'); ?>
		<?php echo $form->textField($model,'room_1_type',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_1_amunities'); ?>
		<?php echo $form->textField($model,'room_1_amunities',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_1_thumbnail'); ?>
		<?php echo $form->textField($model,'room_1_thumbnail',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_1_inclusion'); ?>
		<?php echo $form->textField($model,'room_1_inclusion',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_2_type'); ?>
		<?php echo $form->textField($model,'room_2_type',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_2_amunities'); ?>
		<?php echo $form->textField($model,'room_2_amunities',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_2_thumbnail'); ?>
		<?php echo $form->textField($model,'room_2_thumbnail',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_2_inclusion'); ?>
		<?php echo $form->textField($model,'room_2_inclusion',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_3_type'); ?>
		<?php echo $form->textField($model,'room_3_type',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_3_amunities'); ?>
		<?php echo $form->textField($model,'room_3_amunities',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_3_thumbnail'); ?>
		<?php echo $form->textField($model,'room_3_thumbnail',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_3_inclusion'); ?>
		<?php echo $form->textField($model,'room_3_inclusion',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_amunities'); ?>
		<?php echo $form->textField($model,'hotel_amunities',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_added'); ?>
		<?php echo $form->textField($model,'date_added'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_modified'); ?>
		<?php echo $form->textField($model,'date_modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->