<?php
/* @var $this ReviewController */
/* @var $model Review */
/* @var $form CActiveForm */
?>
<script src="<?php echo Yii::app()->baseUrl; ?>/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
	
	count = 1;
	
	
		
		$(document).ready(function(){
		
			$("#add_more").click(function(){
			
			
			count = count+1;
			
			var input = '<div class="row thumbnail_big_'+count+'"><label>Thumbnail big '+count+'</label><input type="file" value="" name="thumbnail_big_'+count+'"></div>';
		
			$('.thumbnail_big_'+(count-1)).append(input);
			
			
			});
		
		});
		

</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'review-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
			<input type="text" name="title" value="" size=60>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail'); ?>
		<input type="file" name="thumbnail" value="">
		<?php echo $form->error($model,'thumbnail'); ?>
	</div>

	<div class="row thumbnail_big_1">
		<label>Thumbnail big 1</label>
		<input type="file" name="thumbnail_big_1" value="">
	</div>
	
	
	<div class="row">
		<input type="button" value="Add more thumbnail big" name="Add more thumbnail big" id="add_more">
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'available'); ?>
		<select name="available">
			<option value="Yes" >Yes</option>
			<option value="No" >No</option>
		</select>
		<?php echo $form->error($model,'available'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<textarea class="ckeditor" cols="80" id="editor1" name="description" rows="10">
		</textarea>
		<?php echo $form->error($model,'description'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<input type="text" name="price" size=30 value="">
		<?php echo $form->error($model,'price'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->