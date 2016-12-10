<?php
/* @var $this PackageDetailController */
/* @var $model PackageDetail */
/* @var $form CActiveForm */
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$pacakge,
	'attributes'=>array(
		'id',
		'package_name',
		'category_id',
		'category_name',
		'package_day',
		'package_night',
		'destination',
		'key_feature',
		'package_thumbnail',
		'date_added',
		'date_modified',
	),
)); ?>





<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'package-detail-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_tag'); ?>
		<?php echo $form->textArea($model,'meta_tag',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meta_tag'); ?>
	</div>
	
	<div class="row">
		<?php //echo $form->labelEx($model,'package_id'); ?>
		<?php echo $form->hiddenField($model,'package_id',array('value'=>$packageid)); ?>
		<?php //echo $form->error($model,'package_id'); ?>
	</div>
	
	<div class="row">
		<?php //echo $form->labelEx($model,'package_id'); ?>
		<?php echo $form->hiddenField($model,'package_id',array('value'=>$packageid)); ?>
		<?php //echo $form->error($model,'package_id'); ?>
	</div>	
	

		<div class="row">
		<?php echo "<h1>Package detail slider thumbnail<h1>"; ?>
		<?php //echo $form->hiddenField($model,'package_id',array('value'=>'1')); ?>
		<?php //echo $form->error($model,'package_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_1'); ?>
		<?php echo $form->fileField($model,'thumbnail_1',array('size'=>60,'maxlength'=>500)); ?>
		<?php if($model->thumbnail_1 !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/packagedetail/".$model->thumbnail_1.">".$model->thumbnail_1."</a>"; 
					
					} ?>
		<?php echo $form->error($model,'thumbnail_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_2'); ?>
		<?php echo $form->fileField($model,'thumbnail_2',array('size'=>60,'maxlength'=>500)); ?>
			<?php if($model->thumbnail_2 !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/packagedetail/".$model->thumbnail_2.">".$model->thumbnail_2."</a>"; 
					
					} ?>
		<?php echo $form->error($model,'thumbnail_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_3'); ?>
		<?php echo $form->fileField($model,'thumbnail_3',array('size'=>60,'maxlength'=>500)); ?>
			<?php if($model->thumbnail_3 !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/packagedetail/".$model->thumbnail_3.">".$model->thumbnail_3."</a>"; 
					
					} ?>
		<?php echo $form->error($model,'thumbnail_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_4'); ?>
		<?php echo $form->fileField($model,'thumbnail_4',array('size'=>60,'maxlength'=>500)); ?>
			<?php if($model->thumbnail_4 !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/packagedetail/".$model->thumbnail_4.">".$model->thumbnail_4."</a>"; 
					
					} ?>
		<?php echo $form->error($model,'thumbnail_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_5'); ?>
		<?php echo $form->fileField($model,'thumbnail_5',array('size'=>60,'maxlength'=>500)); ?>
			<?php if($model->thumbnail_5 !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/packagedetail/".$model->thumbnail_5.">".$model->thumbnail_5."</a>"; 
					
					} ?>
		<?php echo $form->error($model,'thumbnail_5'); ?>
	</div>


<div class="row">
		<?php echo "<h1>Overview Details<h1>"; ?>
		<?php //echo $form->hiddenField($model,'package_id',array('value'=>'1')); ?>
		<?php //echo $form->error($model,'package_id'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php //echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		 <?php
            $this->widget('application.components.widgets.XHeditor',array(
                'model'=>$model,
                'modelAttribute'=>'description',
                'showModelAttributeValue'=>false, // defaults to true, displays the value of $modelInstance->attribute in the textarea
                'config'=>array(
                    'id'=>'xh2',
                    'name'=>'description',
                    'tools'=>'mini', // mini, simple, fill or from XHeditor::$_tools
                    'width'=>'60%',
                    //see XHeditor::$_configurableAttributes for more
                ),
				'contentValue'=>$model->description,
            ));
            ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'activity'); ?>
		<?php // echo $form->textArea($model,'activity',array('rows'=>6, 'cols'=>50)); ?>
		
		 <?php
            $this->widget('application.components.widgets.XHeditor',array(
                'model'=>$model,
                'modelAttribute'=>'activity',
                'showModelAttributeValue'=>false, // defaults to true, displays the value of $modelInstance->attribute in the textarea
                // 'value'=>$model->activity,
				'config'=>array(
                    'id'=>'xh1',
                    'name'=>'activity',
                    'tools'=>'mini', // mini, simple, fill or from XHeditor::$_tools
                    'width'=>'60%',
                    //see XHeditor::$_configurableAttributes for more
                ),
				'contentValue'=>$model->activity,
            ));
            ?>
		<?php echo $form->error($model,'activity'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'inclusion'); ?>
		<?php //echo $form->textArea($model,'inclusion',array('rows'=>6, 'cols'=>50)); ?>
		
		 <?php
            $this->widget('application.components.widgets.XHeditor',array(
                'model'=>$model,
                'modelAttribute'=>'inclusion',
                'showModelAttributeValue'=>false, // defaults to true, displays the value of $modelInstance->attribute in the textarea
                'config'=>array(
                    'id'=>'xh3',
                    'name'=>'inclusion',
                    'tools'=>'mini', // mini, simple, fill or from XHeditor::$_tools
                    'width'=>'60%',
                    //see XHeditor::$_configurableAttributes for more
                ),
					'contentValue'=>$model->inclusion,
            ));
            ?>
		<?php echo $form->error($model,'inclusion'); ?>
	</div>
	
	<div class="row">
		<?php echo "<h1>Itinerary Details<h1>"; ?>
		<?php //echo $form->hiddenField($model,'package_id',array('value'=>'1')); ?>
		<?php //echo $form->error($model,'package_id'); ?>
	</div>
<script type="text/javascript">
	
		var itineray_count = "<?php echo (count($package_itinerary)); ?>";
		
		if(itineray_count==0)
		{
		itineray_count =  parseInt(itineray_count)+1;
		}
		
		// function add_more()
		// {
		// alert(1);
		 // var input = '<div id="packages_itinerary_listing"><b>Itinerary day 1 heading</b></br><input type="text" name="itinerary_day_1_heading"></br><b>itinerary day 1 description</b></br><textarea rows="4" cols="50" name="itinerary_day_1_description"></textarea></br></div>';
		// $('#packages_itinerary_listing').append($input);
		
		
		// }
		
		$(document).ready(function(){
		
			$("#add_more").click(function(){
			
			if(itineray_count == 15)
			{
			return false;
			}
			
			itineray_count= parseInt(itineray_count)+1;
				
			 var input = '<div id="packages_itinerary_listing"><b>Itinerary day '+itineray_count+' heading</b></br><input  size="80" type="text" name="itinerary_day_'+itineray_count+'_heading"></br><b>itinerary day '+itineray_count+' description</b></br><textarea rows="5" cols="70" name="itinerary_day_'+itineray_count+'_description"></textarea></br></div>';
	

			$('#packages_itinerary_listing_append').append(input);
		
			});
			
			
			
			
			$('.remove_itinerary').click(function(){
			
			var dataString = 'id='+  $(this).attr('itinerary_id');
			
			$.ajax
		({
			type: "POST",
			url: "<?php echo CController::createUrl("PackageDetail/deleteitinerary"); ?>",
			data: dataString,
			success: function(data) 
			{
		
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
			
				
				
			});
		
		});
		
		
		
	
	</script>
	
	
	<div id="packages_itinerary">
	
	<?php if(count($package_itinerary) == 0) { ?>
		<div id="packages_itinerary_listing">
			<b>Itinerary day 1 heading</b></br>
			<input  size="80" type="text" name="itinerary_day_1_heading"></br>
			<b>itinerary day 1 description</b></br>
			<textarea rows="5" cols="70" name="itinerary_day_1_description"></textarea></br>
		</div>
		<div id="packages_itinerary_listing_append">
		</div>
		
	<?php }

	else {

	
		// echo "<pre>";
		// print_r($package_itinerary);exit;
		for($i=0;$i<count($package_itinerary);$i++) {
		
		?>

		<div id="packages_itinerary_listing">
			<b>Itinerary day <?php echo ($i+1); ?> heading</b></br>
			<input size="80" type="text" name="itinerary_day_<?php echo ($i+1); ?>_heading" value="<?php echo $package_itinerary[$i]['heading']?>"></br>
			<b>itinerary day  <?php echo ($i+1); ?> description</b></br>
			<textarea rows="5" cols="70" name="itinerary_day_<?php echo ($i+1); ?>_description"><?php echo $package_itinerary[$i]['description']?></textarea></br>
		
			<input type="button" name="removeitinerary" class="remove_itinerary" itinerary_id="<?php echo $package_itinerary[$i]['id']; ?>" value="Remove itinerary <?php echo ($i+1);  ?>" class="remove_itinerary" >
				<br>
		</div>		
	
	
	
	<?php } } ?>
		<div id="packages_itinerary_listing_append">
		</div>
		<input type="button" id="add_more" value="Add more">
	</div>
	

	<!--<div class="row">
		<?php echo $form->labelEx($model,'itinerary_day_1_heading'); ?>
		<?php echo $form->textField($model,'itinerary_day_1_heading',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'itinerary_day_1_heading'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itinerary_day_1_description'); ?>
		<?php echo $form->textArea($model,'itinerary_day_1_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'itinerary_day_1_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itinerary_day_2_heading'); ?>
		<?php echo $form->textField($model,'itinerary_day_2_heading',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'itinerary_day_2_heading'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itinerary_day_2_description'); ?>
		<?php echo $form->textArea($model,'itinerary_day_2_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'itinerary_day_2_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itinerary_day_3_heading'); ?>
		<?php echo $form->textField($model,'itinerary_day_3_heading',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'itinerary_day_3_heading'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itinerary_day_3_description'); ?>
		<?php echo $form->textArea($model,'itinerary_day_3_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'itinerary_day_3_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itinerary_day_4_heading'); ?>
		<?php echo $form->textField($model,'itinerary_day_4_heading',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'itinerary_day_4_heading'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itinerary_day_4_description'); ?>
		<?php echo $form->textArea($model,'itinerary_day_4_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'itinerary_day_4_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itinerary_day_5_heading'); ?>
		<?php echo $form->textField($model,'itinerary_day_5_heading',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'itinerary_day_5_heading'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itinerary_day_5_description'); ?>
		<?php echo $form->textArea($model,'itinerary_day_5_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'itinerary_day_5_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itinerary_day_6_heading'); ?>
		<?php echo $form->textField($model,'itinerary_day_6_heading',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'itinerary_day_6_heading'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itinerary_day_6_description'); ?>
		<?php echo $form->textArea($model,'itinerary_day_6_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'itinerary_day_6_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itinerary_day_7_heading'); ?>
		<?php echo $form->textField($model,'itinerary_day_7_heading',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'itinerary_day_7_heading'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itinerary_day_7_description'); ?>
		<?php echo $form->textArea($model,'itinerary_day_7_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'itinerary_day_7_description'); ?>
	</div>-->

	
	<?php 
	
		$option = array();
		
		if($model->hotel_id !='')
		{
			$hotel_id = explode(',',$model->hotel_id);
			
			// echo "<pre>";
			// print_r($hotel_id);
			// print_r($hotel);
			// exit;
			
			
			
			for($i=0;$i<count($hotel_id);$i++)
			{
				$option[$hotel_id[$i]] = array('selected'=>'selected');
			}
		}
		else
		{
			$hotel_id=array();
		}
	
	?>
	
	<?php echo $form->labelEx($model,'hotel_id'); ?>
	
	<?php for($i=0;$i<count($hotel);$i++) { ?>
	
		<input type="checkbox" name="hotel_id[]" 
		<?php if(in_array($hotel[$i]['id'],$hotel_id)) { echo "checked"; } ?>
		value="<?php echo $hotel[$i]['id']; ?>">
			<?php echo " ".$hotel[$i]['hotel_name']; ?>

	
	<?php if($i % 3 ==0) { echo "</ br>"; } } ?>
	
	<!--<div class="row">
		<?php echo $form->labelEx($model,'hotel_id'); ?>
		<?php // echo $form->textField($model,'hotel_id',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->dropDownList($model,'hotel_id',CHtml::listData($hotel,'id','hotel_name'),array('multiple'=>'multiple','options'=>$option),array('prompt'=>'Select Hotel')); ?>
		<?php echo $form->error($model,'hotel_id'); ?>
	</div>-->

		<!--<div class="row">
		<?php echo $form->labelEx($model,'hotel_name'); ?>
		<?php echo $form->textArea($model,'hotel_name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'hotel_name'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'date_added'); ?>
		<?php echo $form->textField($model,'date_added'); ?>
		<?php echo $form->error($model,'date_added'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_modified'); ?>
		<?php echo $form->textField($model,'date_modified'); ?>
		<?php echo $form->error($model,'date_modified'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->