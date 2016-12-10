<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-category-details-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CATEGORY_ID'); ?>
		<?php echo $form->textField($model,'CATEGORY_ID',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'CATEGORY_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CONTENT_TYPE_ID'); ?>
		<?php echo $form->textField($model,'CONTENT_TYPE_ID',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'CONTENT_TYPE_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STORE_FRONT_ID'); ?>
		<?php echo $form->textField($model,'STORE_FRONT_ID',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'STORE_FRONT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'THEME_IMAGE'); ?>
		<?php echo $form->textField($model,'THEME_IMAGE',array('size'=>60,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'THEME_IMAGE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PARENT_ID'); ?>
		<?php echo $form->textField($model,'PARENT_ID',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'PARENT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TAG_MAP'); ?>
		<?php echo $form->textArea($model,'TAG_MAP',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'TAG_MAP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
		<?php echo $form->error($model,'STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LAST_UPDATED_ON'); ?>
		<?php echo $form->textField($model,'LAST_UPDATED_ON'); ?>
		<?php echo $form->error($model,'LAST_UPDATED_ON'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LAST_UPDATED_BY'); ?>
		<?php echo $form->textField($model,'LAST_UPDATED_BY',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'LAST_UPDATED_BY'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRIORITY'); ?>
		<?php echo $form->textField($model,'PRIORITY',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'PRIORITY'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ISNEW'); ?>
		<?php echo $form->textField($model,'ISNEW',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ISNEW'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TRACK_CATELOG_ID'); ?>
		<?php echo $form->textField($model,'TRACK_CATELOG_ID'); ?>
		<?php echo $form->error($model,'TRACK_CATELOG_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ALBUM_CATELOG_ID'); ?>
		<?php echo $form->textField($model,'ALBUM_CATELOG_ID'); ?>
		<?php echo $form->error($model,'ALBUM_CATELOG_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ARTIST_CATELOG_ID'); ?>
		<?php echo $form->textField($model,'ARTIST_CATELOG_ID'); ?>
		<?php echo $form->error($model,'ARTIST_CATELOG_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CATEGORY_LANGUAGE_ID'); ?>
		<?php echo $form->textArea($model,'CATEGORY_LANGUAGE_ID',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'CATEGORY_LANGUAGE_ID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->