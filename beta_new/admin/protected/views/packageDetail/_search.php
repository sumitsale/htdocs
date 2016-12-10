<?php
/* @var $this PackageDetailController */
/* @var $model PackageDetail */
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
		<?php echo $form->label($model,'package_id'); ?>
		<?php echo $form->textField($model,'package_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thumbnail_1'); ?>
		<?php echo $form->textField($model,'thumbnail_1',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thumbnail_2'); ?>
		<?php echo $form->textField($model,'thumbnail_2',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thumbnail_3'); ?>
		<?php echo $form->textField($model,'thumbnail_3',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thumbnail_4'); ?>
		<?php echo $form->textField($model,'thumbnail_4',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thumbnail_5'); ?>
		<?php echo $form->textField($model,'thumbnail_5',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activity'); ?>
		<?php echo $form->textArea($model,'activity',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inclusion'); ?>
		<?php echo $form->textArea($model,'inclusion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'itinerary_day_1_heading'); ?>
		<?php echo $form->textField($model,'itinerary_day_1_heading',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'itinerary_day_1_description'); ?>
		<?php echo $form->textArea($model,'itinerary_day_1_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'itinerary_day_2_heading'); ?>
		<?php echo $form->textField($model,'itinerary_day_2_heading',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'itinerary_day_2_description'); ?>
		<?php echo $form->textField($model,'itinerary_day_2_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'itinerary_day_3_heading'); ?>
		<?php echo $form->textField($model,'itinerary_day_3_heading',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'itinerary_day_3_description'); ?>
		<?php echo $form->textArea($model,'itinerary_day_3_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'itinerary_day_4_heading'); ?>
		<?php echo $form->textField($model,'itinerary_day_4_heading',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'itinerary_day_4_description'); ?>
		<?php echo $form->textArea($model,'itinerary_day_4_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'itinerary_day_5_heading'); ?>
		<?php echo $form->textField($model,'itinerary_day_5_heading',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'itinerary_day_5_description'); ?>
		<?php echo $form->textArea($model,'itinerary_day_5_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'itinerary_day_6_heading'); ?>
		<?php echo $form->textField($model,'itinerary_day_6_heading',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'itinerary_day_6_description'); ?>
		<?php echo $form->textArea($model,'itinerary_day_6_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'itinerary_day_7_heading'); ?>
		<?php echo $form->textField($model,'itinerary_day_7_heading',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'itinerary_day_7_description'); ?>
		<?php echo $form->textArea($model,'itinerary_day_7_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_id'); ?>
		<?php echo $form->textField($model,'hotel_id',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_name'); ?>
		<?php echo $form->textArea($model,'hotel_name',array('rows'=>6, 'cols'=>50)); ?>
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