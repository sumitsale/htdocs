<?php
/* @var $this PackagesController */
/* @var $model Packages */
/* @var $form CActiveForm */

// echo "<pre>";
// print_r($category)

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'packages-form',
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
		<?php echo $form->labelEx($model,'package_name'); ?>
		<?php echo $form->textField($model,'package_name',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'package_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id',CHtml::listData($category,'id','category_name'),array('prompt'=>'Select category')); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'small_description'); ?>
		<?php echo $form->textArea($model,'small_description',array('size'=>100,'rows'=>7,'cols'=>40,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'small_description'); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'category_name'); ?>
		<?php echo $form->textField($model,'category_name',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'category_name'); ?>
	</div>-->
	

	<div class="row">
		<?php echo $form->labelEx($model,'package_day'); ?>
		<?php echo $form->dropDownList($model,'package_day',array('1 days'=>'1 days',
																  '2 days'=>'2 days',
																   '3 days'=>'3 days',
																   '4 days'=>'4 days',
																   '5 days'=>'5 days',
																	'6 days'=>'6 days',
																	'7 days'=>'7 days','8 days' => '8 days'),array('prompt' => 'Select days')); ?>
		<?php echo $form->error($model,'package_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'package_night'); ?>
		<?php echo $form->dropDownList($model,'package_night',array('1 nights'=>'1 nights',
																'2 nights'=>'2 nights',
																'3 nights'=>'3 nights',
																'4 nights'=>'4 nights',
																'5 nights'=>'5 nights',
																'6 nights'=>'6 nights',
																'7 nights'=>'7 nights','8 nights' => '8 nights'),array('prompt' => 'Select nights')); ?>
		<?php echo $form->error($model,'package_night'); ?>
	</div>
	
		<!--<div class="row">
		<?php echo $form->labelEx($model,'rating'); ?>
		<?php echo $form->dropDownList($model,'rating',array('one'=>'one',
																'two'=>'two',
																'three'=>'three',
																'four'=>'four',
																'five'=>'five',
																),array('prompt' => 'Select rating')); ?>
		<?php echo $form->error($model,'rating'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'destination'); ?>
		<?php echo $form->textArea($model,'destination',array('size'=>100,'rows'=>7,'cols'=>40,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'destination'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'pricing_with_out_offer'); ?>
		<?php echo $form->textField($model,'pricing_with_out_offer',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'pricing_with_out_offer'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'pricing'); ?>
		<?php echo $form->textField($model,'pricing',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'pricing'); ?>
	</div>
	
	
		<div class="row">
		<?php echo $form->labelEx($model,'show_on_site'); ?>
		<?php echo $form->dropDownList($model,'show_on_site',array("Show"=>"Show","Hide"=>"Hide")); ?>
		<?php echo $form->error($model,'show_on_site'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array("Show"=>"Show","Hide"=>"Hide")); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'key_feature'); ?>
		<?php //echo $form->textArea($model,'key_feature',array('size'=>100,'rows'=>7,'cols'=>40,'maxlength'=>1000)); ?>
		<?php
            $this->widget('application.components.widgets.XHeditor',array(
                'model'=>$model,
                'modelAttribute'=>'key_feature',
                'showModelAttributeValue'=>false, // defaults to true, displays the value of $modelInstance->attribute in the textarea
                // 'value'=>$model->activity,
				'config'=>array(
                    'id'=>'xh1',
                    'name'=>'key_feature',
                    'tools'=>'mini', // mini, simple, fill or from XHeditor::$_tools
                    'width'=>'60%',
                    //see XHeditor::$_configurableAttributes for more
                ),
				'contentValue'=>$model->key_feature,
            ));
            ?>
			
		<?php echo $form->error($model,'key_feature'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'package_thumbnail'); ?>
		<?php echo $form->fileField($model,'package_thumbnail',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'package_thumbnail'); ?>
	</div>
	
	
	<!--
	<table>
	<tr>	
		<td>
			<br>
			<br>
		</td>
	</tr>
		<tr>
			<td colspan="5"><h2>Cost Saver Packages Hotels & Details</h2></td>
		</tr>
		
		<tr>
				
				<?php for($i=0;$i<count($hotel);$i++) { ?>
				
					<td>
						<input type="checkbox" name="cost_saver[]" <?php if($model->cost_saver_package != '') 
							{ 
								if(in_array($hotel[$i]['id'],explode(",",$model->cost_saver_package))) 
									{ echo "checked"; } 
							} 
							?> value="<?php echo $hotel[$i]['id']; ?>"> 
						<?php echo $hotel[$i]['hotel_name']. ' - '.$hotel[$i]['city'] ; ?>
					</td>
					
					<?php 
					
						if(($i+1) % 3 == 0)
						{
							echo "</tr><tr>";
						}	
					?>
				
				<?php } ?>
		</tr>
		
		
		
		<tr>	
			<td>
				<br>
				<br>
			</td>
		</tr>
		<tr>
			<td colspan="5"><h2>Standard Packages Hotels & Details</h2></td>
		</tr>
		
		<tr>
				
				<?php for($i=0;$i<count($hotel);$i++) { ?>
				
					<td>
						<input type="checkbox" name="standard_package[]" 
						<?php if($model->standard_package != '') 
							{ 
								if(in_array($hotel[$i]['id'],explode(",",$model->standard_package))) 
									{ echo "checked"; } 
							} 
							?>
							
						value="<?php echo $hotel[$i]['id']; ?>"> 
						<?php echo $hotel[$i]['hotel_name']. ' - '.$hotel[$i]['city'] ; ?>
					</td>
					
					<?php 
					
						if(($i+1) % 3 == 0)
						{
							echo "</tr><tr>";
						}	
					?>
				
				<?php } ?>
		</tr>
		
		
		<tr>	
			<td>
				<br>
				<br>
			</td>
		</tr>
		<tr>
			<td colspan="5"><h2>Deluxe Packages Hotels & Details</h2></td>
		</tr>
		
		<tr>
				
				<?php for($i=0;$i<count($hotel);$i++) { ?>
				
					<td>
						<input type="checkbox" name="delux_package[]" 
							<?php if($model->delux_package != '') 
							{ 
								if(in_array($hotel[$i]['id'],explode(",",$model->delux_package))) 
									{ echo "checked"; } 
							} 
							?>
						value="<?php echo $hotel[$i]['id']; ?>"> 
						<?php echo $hotel[$i]['hotel_name']. ' - '.$hotel[$i]['city'] ; ?>
					</td>
					
					<?php 
					
						if(($i+1) % 3 == 0)
						{
							echo "</tr><tr>";
						}	
					?>
				
				<?php } ?>
		</tr>
		
		
	</table>
-->
	<!--<div class="row">
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