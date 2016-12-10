<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'metasea_property_id'); ?>
		<?php echo $form->textField($model,'metasea_property_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'metasea_content_code'); ?>
		<?php echo $form->textField($model,'metasea_content_code',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vendor_id'); ?>
		<?php echo $form->textField($model,'vendor_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rel_date'); ?>
		<?php echo $form->textField($model,'rel_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rel_date_site'); ?>
		<?php echo $form->textField($model,'rel_date_site'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_hd'); ?>
		<?php echo $form->textField($model,'is_hd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'censor_certificate'); ?>
		<?php echo $form->textField($model,'censor_certificate',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'duration'); ?>
		<?php echo $form->textField($model,'duration',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'demo_play_time'); ?>
		<?php echo $form->textField($model,'demo_play_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'critic_rating'); ?>
		<?php echo $form->textField($model,'critic_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_rating'); ?>
		<?php echo $form->textField($model,'user_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_rating_count'); ?>
		<?php echo $form->textField($model,'user_rating_count',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'img_120x170'); ?>
		<?php echo $form->textField($model,'img_120x170',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'img_125x195'); ?>
		<?php echo $form->textField($model,'img_125x195',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'img_180x255'); ?>
		<?php echo $form->textField($model,'img_180x255',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'img_200x110'); ?>
		<?php echo $form->textField($model,'img_200x110',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'img_440x225'); ?>
		<?php echo $form->textField($model,'img_440x225',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'language'); ?>
		<?php echo $form->textField($model,'language',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'starcast'); ?>
		<?php echo $form->textField($model,'starcast',array('size'=>60,'maxlength'=>512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'director'); ?>
		<?php echo $form->textField($model,'director',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'producer'); ?>
		<?php echo $form->textField($model,'producer',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'musicdirector'); ?>
		<?php echo $form->textField($model,'musicdirector',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'genre'); ?>
		<?php echo $form->textField($model,'genre',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'added_on'); ?>
		<?php echo $form->textField($model,'added_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_on'); ?>
		<?php echo $form->textField($model,'updated_on'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->