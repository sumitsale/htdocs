
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'homepage-left-bottom-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'image1');		?>
		
		<?php echo $form->FileField($model,'image1'); ?>
		<?php echo $form->error($model,'image1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image2'); ?>
		<?php echo $form->FileField($model,'image2'); ?>
		<?php echo $form->error($model,'image2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image3'); ?>
		<?php echo $form->FileField($model,'image3'); ?>
		<?php echo $form->error($model,'image3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image4'); ?>
		<?php echo $form->FileField($model,'image4'); ?>
		<?php echo $form->error($model,'image4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image5'); ?>
		<?php echo $form->FileField($model,'image5'); ?>
		<?php echo $form->error($model,'image5'); ?>
	</div>
<br />

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Banner Upload' : 'Save'); ?>
        
	</div>

<?php $this->endWidget(); ?>


</div><!-- form -->