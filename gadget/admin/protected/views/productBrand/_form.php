<?php
/* @var $this ProductBrandController */
/* @var $model ProductBrand */
/* @var $form CActiveForm */
?>
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
	'id'=>'product-brand-form',
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
		<?php echo $form->labelEx($model,'master_category_id'); ?>
		<?php echo $form->dropDownList($model,'master_category_id',CHtml::listData($master_category,'id','name'),array('prompt'=>'Select master category')); ?>
		<?php echo $form->error($model,'master_category_id'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'master_category_name'); ?>
		<?php echo $form->textField($model,'master_category_name',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'master_category_name'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'master_brand_id'); ?>
		<?php echo $form->dropDownList($model,'master_brand_id',CHtml::listData($master_brand,'id','name'),array('prompt'=>'Select master brand')); ?>
		<?php echo $form->error($model,'master_brand_id'); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'master_brand_name'); ?>
		<?php echo $form->textField($model,'master_brand_name',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'master_brand_name'); ?>
	</div>
-->


	<div class="row">
		<?php echo $form->labelEx($model,'product_name'); ?>
		<?php // echo $form->textField($model,'product_name',array('size'=>60,'maxlength'=>1000)); ?>
		<input type="text" name="product_name" value="" size=60>
		<?php echo $form->error($model,'product_name'); ?>
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
		<?php echo $form->labelEx($model,'rating'); ?>
		<select name="rating">
			<option value="">Select rating</option>
			<option value="1" >1</option>
			<option value="2" >2</option>
			<option value="3" >3</option>
			<option value="4" >4</option>
			<option value="5" >5</option>
		</select>
		<?php echo $form->error($model,'rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'available'); ?>
		<select name="available">
			<option value="">Select</option>
			<option value="Yes" >Yes</option>
			<option value="No" >No</option>
		</select>
		<?php echo $form->error($model,'available'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->