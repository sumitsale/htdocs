<?php
/* @var $this ReviewController */
/* @var $model Review */

$this->breadcrumbs=array(
	'Reviews'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Review', 'url'=>array('index')),
	array('label'=>'Create Review', 'url'=>array('create')),
	array('label'=>'View Review', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Review', 'url'=>array('admin')),
);
?>

<h1>Update Review <?php echo $model->id; ?></h1>

<?php //$this->renderPartial('_form', array('model'=>$model)); ?>

<script src="<?php echo Yii::app()->baseUrl; ?>/ckeditor/ckeditor.js"></script>

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
			url: "<?php echo CController::createUrl("review/deletethumbnail"); ?>",
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

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
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
		<input type="text" name="title" value="<?php echo $model->title; ?>" size=60>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail'); ?>
		<input type="file" name="thumbnail" value="">
		<?php echo $form->error($model,'thumbnail'); ?>
	</div>

	<?php if($model->thumbnail != '') { ?>
	<div class="row">
	<a target="_blank" href="<?php echo Yii::app()->baseurl.'../../images/review/thumbnail/'.$model->thumbnail; ?>"><?php echo $model->thumbnail; ?></a><br>
	<img src="<?php echo Yii::app()->baseurl.'../../images/review/thumbnail/'.$model->thumbnail; ?>">
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
		<?php echo $form->labelEx($model,'available'); ?>
		<select name="available">
			<option <?php if($model->available == "Yes") { echo "Selected=true" ;} ?> value="Yes" >Yes</option>
			<option  <?php if($model->available == "No") { echo "Selected=true" ;} ?> value="No" >No</option>
		</select>
		<?php echo $form->error($model,'available'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<textarea class="ckeditor" cols="80" id="editor1" name="description" rows="10">
		<?php echo $model->description; ?>
		</textarea>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<input type="text" name="price" size=30 value="<?php echo $model->price; ?>">
		<?php echo $form->error($model,'price'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Update' : 'Save'); ?>
	</div>

	
<?php $this->endWidget(); ?>

</div><!-- form -->