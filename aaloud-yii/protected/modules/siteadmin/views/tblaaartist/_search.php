<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Artist_Id'); ?>
		<?php echo $form->textField($model,'Artist_Id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Artist_Name'); ?>
		<?php echo $form->textField($model,'Artist_Name',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Artist_Bgcolor'); ?>
		<?php echo $form->textField($model,'Artist_Bgcolor',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Artist_Bgimage'); ?>
		<?php echo $form->textField($model,'Artist_Bgimage',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Artist_Right_Bgcolor'); ?>
		<?php echo $form->textField($model,'Artist_Right_Bgcolor',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Artist_Right_Bgimage'); ?>
		<?php echo $form->textField($model,'Artist_Right_Bgimage',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Artist_WAP_Image'); ?>
		<?php echo $form->textField($model,'Artist_WAP_Image',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Artist_Twitter'); ?>
		<?php echo $form->textField($model,'Artist_Twitter',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Artist_Facebook'); ?>
		<?php echo $form->textField($model,'Artist_Facebook',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Artist_Flickr'); ?>
		<?php echo $form->textField($model,'Artist_Flickr',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Artist_Caller_Keyword'); ?>
		<?php echo $form->textField($model,'Artist_Caller_Keyword',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Artist_Status'); ?>
		<?php echo $form->textField($model,'Artist_Status',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Artist_Indate'); ?>
		<?php echo $form->textField($model,'Artist_Indate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Artist_LastUpdate'); ?>
		<?php echo $form->textField($model,'Artist_LastUpdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Artist_Hit_Count'); ?>
		<?php echo $form->textField($model,'Artist_Hit_Count',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->