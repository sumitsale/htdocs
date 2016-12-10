<?php
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php
	 $start = strtotime('12:00 AM');
    $end   = strtotime('11:59 PM'); 	
	
	$time = array();
	
	for($i = $start;$i<=$end;$i+=1800)
	{
		$time[date('G:i', $i)] = date('G:i', $i);
	}
	
	// echo "<pre>";
	// print_r($time);exit;
	
	?>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'start_time'); ?>
		<?php // echo $form->textField($model,'start_time',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->dropDownList($model,'start_time', $time, array('empty'=>'Select start time'));?>

		<?php echo $form->error($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_time'); ?>
		<?php //echo $form->textField($model,'end_time',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->dropDownList($model,'end_time', $time, array('empty'=>'Select start time'));?>

		<?php echo $form->error($model,'end_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'httpurl'); ?>
		<?php echo $form->textArea($model,'httpurl',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'httpurl'); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'date_added'); ?>
		<?php echo $form->textField($model,'date_added'); ?>
		<?php echo $form->error($model,'date_added'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_modifed'); ?>
		<?php echo $form->textField($model,'date_modifed'); ?>
		<?php echo $form->error($model,'date_modifed'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->