<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'CATEGORY_DETAILS_ID'); ?>
		<?php echo $form->textField($model,'CATEGORY_DETAILS_ID',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CATEGORY_ID'); ?>
		<?php echo $form->textField($model,'CATEGORY_ID',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CONTENT_TYPE_ID'); ?>
		<?php echo $form->textField($model,'CONTENT_TYPE_ID',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STORE_FRONT_ID'); ?>
		<?php echo $form->textField($model,'STORE_FRONT_ID',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'THEME_IMAGE'); ?>
		<?php echo $form->textField($model,'THEME_IMAGE',array('size'=>60,'maxlength'=>75)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PARENT_ID'); ?>
		<?php echo $form->textField($model,'PARENT_ID',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TAG_MAP'); ?>
		<?php echo $form->textArea($model,'TAG_MAP',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LAST_UPDATED_ON'); ?>
		<?php echo $form->textField($model,'LAST_UPDATED_ON'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LAST_UPDATED_BY'); ?>
		<?php echo $form->textField($model,'LAST_UPDATED_BY',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRIORITY'); ?>
		<?php echo $form->textField($model,'PRIORITY',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ISNEW'); ?>
		<?php echo $form->textField($model,'ISNEW',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TRACK_CATELOG_ID'); ?>
		<?php echo $form->textField($model,'TRACK_CATELOG_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ALBUM_CATELOG_ID'); ?>
		<?php echo $form->textField($model,'ALBUM_CATELOG_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ARTIST_CATELOG_ID'); ?>
		<?php echo $form->textField($model,'ARTIST_CATELOG_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CATEGORY_LANGUAGE_ID'); ?>
		<?php echo $form->textArea($model,'CATEGORY_LANGUAGE_ID',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->