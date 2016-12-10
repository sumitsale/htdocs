<?php
/* @var $this ProductBrandController */
/* @var $model ProductBrand */

$this->breadcrumbs=array(
	'Product Brands'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductBrand', 'url'=>array('index')),
	array('label'=>'Create ProductBrand', 'url'=>array('create')),
	array('label'=>'View ProductBrand', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductBrand', 'url'=>array('admin')),
);
?>

<h1>Update ProductBrand <?php echo $model->id; ?></h1>

<?php //$this->renderPartial('_form', array('model'=>$model)); ?>

<?php 
		$thumbnail_big_array = json_decode($model->thumbnail_big,true); 

		$count = count($thumbnail_big_array) == 0 ? 1 : count($thumbnail_big_array); 
?>
<script type="text/javascript">

	function remove_big_thumbnail(id,thumbnail_id)
	{
			
			var dataString = 'id='+id+'&thumbnail_id='+thumbnail_id;
			
			$.ajax
		({
			type: "POST",
			url: "<?php echo CController::createUrl("productBrand/deletethumbnail"); ?>",
			data: dataString,
			success: function(data) 
			{
			// alert(data);
			// return false;
		
				if(data==200)
				{

				 window.location.href =  window.location.href;

				}
				else
				{
					 window.location.href =  window.location.href;
				}
			}
        })
			
			
	}

	
	count = <?php echo $count; ?>;
	
	
		
		$(document).ready(function(){
		
			$("#add_more").click(function(){
			
			
			count = count+1;
			
			var input = '<div class="row thumbnail_big_'+count+'"><label>Thumbnail big '+count+'</label><input type="file" value="" name="thumbnail_big_'+count+'"></div>';
		
			$('.thumbnail_big_'+(count-1)).append(input);
			
			$('#count').val(count);
			
			});
		
		});
		

</script>

<?php
/* @var $this ProductBrandController */
/* @var $model ProductBrand */
/* @var $form CActiveForm */
?>

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
		<input type="text" name="product_name" value="<?php echo $model->product_name; ?>" size=60>
		<?php echo $form->error($model,'product_name'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail'); ?>
		<input type="file" name="thumbnail" value="">
		<?php echo $form->error($model,'thumbnail'); ?>
	</div>

	
	<?php if($model->thumbnail != '') { ?>
	<div class="row">
	<a target="_blank" href="<?php echo Yii::app()->baseurl.'../../images/productbrand/thumbnail/'.$model->thumbnail; ?>"><?php echo $model->thumbnail; ?></a><br>
	<img src="<?php echo Yii::app()->baseurl.'../../images/productbrand/thumbnail/'.$model->thumbnail; ?>">
	</div>
	<?php } ?>
	
	
	
	
	<?php if(count($thumbnail_big_array)>0) { ?>
	
	<?php for($i=0;$i<count($thumbnail_big_array);$i++) { ?>
	
	<div class="row thumbnail_big_<?php echo ($i+1)?>">
		<label>Thumbnail big <?php echo ($i+1)?></label>
		<input type="file" name="thumbnail_big_<?php echo ($i+1)?>" value="<?php echo $thumbnail_big_array[$i]; ?>">
		<label><a target="_blank" href="<?php echo Yii::app()->baseurl.'../../images/review/big_thumbnail/'.$thumbnail_big_array[$i]; ?>"><?php echo $thumbnail_big_array[$i]; ?></a> - <span style="color: red;" onclick="remove_big_thumbnail(<?php echo $model->id; ?>,<?php echo $i;?>);">Remove</span></label>
	</div>
	
	<?php } ?>
	
	<?php }  else { ?>
	
		
	<div class="row thumbnail_big_1">
		<label>Thumbnail big 1</label>
		<input type="file" name="thumbnail_big_1" value="">
	</div>
	
	<?php } ?>
	
	<div class="rows">
		<input type="hidden" value="<?php echo $count; ?>" id="count" name="count">
		<input type="hidden" value="<?php echo $count; ?>" id="actual_count" name="actual_count">
	</div>
	
	<div class="row">
		<input type="button" value="Add more thumbnail big" name="Add more thumbnail big" id="add_more">
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'rating'); ?>
		<select name="rating">
			<option value="">Select rating</option>
			<option <?php if($model->rating == "1") { echo "Selected=true" ;} ?>  value="1" >1</option>
			<option <?php if($model->rating == "2") { echo "Selected=true" ;} ?>  value="2" >2</option>
			<option <?php if($model->rating == "3") { echo "Selected=true" ;} ?>  value="3" >3</option>
			<option <?php if($model->rating == "4") { echo "Selected=true" ;} ?>  value="4" >4</option>
			<option <?php if($model->rating == "5") { echo "Selected=true" ;} ?>  value="5" >5</option>
		</select>
		<?php echo $form->error($model,'rating'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'available'); ?>
		<select name="available">
			<option <?php if($model->available == "Yes") { echo "Selected=true" ;} ?> value="Yes" >Yes</option>
			<option  <?php if($model->available == "No") { echo "Selected=true" ;} ?> value="No" >No</option>
		</select>
		<?php echo $form->error($model,'available'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->