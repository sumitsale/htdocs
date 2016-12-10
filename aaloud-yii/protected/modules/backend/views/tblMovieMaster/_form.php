<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-movie-master-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'metasea_property_id'); ?>
		<?php echo $form->textField($model,'metasea_property_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'metasea_property_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'metasea_content_code'); ?>
		<?php echo $form->textField($model,'metasea_content_code',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'metasea_content_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vendor_id'); ?>
		<?php echo $form->textField($model,'vendor_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'vendor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rel_date'); ?>
		<?php echo $form->textField($model,'rel_date'); ?>
		<?php echo $form->error($model,'rel_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rel_date_site'); ?>
		<?php echo $form->textField($model,'rel_date_site'); ?>
		<?php echo $form->error($model,'rel_date_site'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_hd'); ?>
		<?php echo $form->textField($model,'is_hd'); ?>
		<?php echo $form->error($model,'is_hd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'censor_certificate'); ?>
		<?php echo $form->textField($model,'censor_certificate',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'censor_certificate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'duration'); ?>
		<?php echo $form->textField($model,'duration',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'demo_play_time'); ?>
		<?php echo $form->textField($model,'demo_play_time'); ?>
		<?php echo $form->error($model,'demo_play_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'critic_rating'); ?>
		<?php echo $form->textField($model,'critic_rating'); ?>
		<?php echo $form->error($model,'critic_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_rating'); ?>
		<?php echo $form->textField($model,'user_rating'); ?>
		<?php echo $form->error($model,'user_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_rating_count'); ?>
		<?php echo $form->textField($model,'user_rating_count',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'user_rating_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img_120x170'); ?>
		<?php echo $form->textField($model,'img_120x170',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'img_120x170'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img_125x195'); ?>
		<?php echo $form->textField($model,'img_125x195',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'img_125x195'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img_180x255'); ?>
		<?php echo $form->textField($model,'img_180x255',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'img_180x255'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img_200x110'); ?>
		<?php echo $form->textField($model,'img_200x110',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'img_200x110'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img_440x225'); ?>
		<?php echo $form->textField($model,'img_440x225',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'img_440x225'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php echo $form->textField($model,'language',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'language'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'starcast'); ?>
		<?php echo $form->textField($model,'starcast',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'starcast'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'director'); ?>
		<?php echo $form->textField($model,'director',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'director'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'producer'); ?>
		<?php echo $form->textField($model,'producer',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'producer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'musicdirector'); ?>
		<?php echo $form->textField($model,'musicdirector',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'musicdirector'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'genre'); ?>
		<?php echo $form->textField($model,'genre',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'genre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'added_on'); ?>
		<?php echo $form->textField($model,'added_on'); ?>
		<?php echo $form->error($model,'added_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_on'); ?>
		<?php echo $form->textField($model,'updated_on'); ?>
		<?php echo $form->error($model,'updated_on'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->