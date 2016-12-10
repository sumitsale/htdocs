<?php
/* @var $this HotelController */
/* @var $model Hotel */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hotel-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hotel_name'); ?>
		<?php echo $form->textField($model,'hotel_name',array('size'=>50,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'hotel_name'); ?>
	</div>	
	
	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->dropDownList($model,'city',array('Port Blair'=>'Port Blair',
																  'Havelock Island'=>'Havelock Island',
																   'Neil Island'=>'Neil Island',
																   'Diglipur'=>'Diglipur'),array('prompt' => 'Select city')); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail'); ?>
		<?php echo $form->fileField($model,'thumbnail'); ?>
		<?php echo $form->error($model,'thumbnail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('size'=>100,'rows'=>7,'cols'=>40,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_price'); ?>
		<?php echo $form->textField($model,'start_price'); ?>
		<?php echo $form->error($model,'start_price'); ?>
	</div>
	
		<div class="row">
		<?php echo $form->labelEx($model,'price_with_offer'); ?>
		<?php echo $form->textField($model,'price_with_offer'); ?>
		<?php echo $form->error($model,'price_with_offer'); ?>
	</div>
	
	<!--<div class="row">
		<?php echo $form->labelEx($model,'price_with_offer'); ?>
		<?php echo $form->textField($model,'price_with_offer'); ?>
		<?php echo $form->error($model,'price_with_offer'); ?>
	</div>-->
	
	
	<!--<div class="row">
		<?php echo $form->labelEx($model,'day'); ?>
		<?php echo $form->dropDownList($model,'day',array('1 days'=>'1 days',
																  '2 days'=>'2 days',
																   '3 days'=>'3 days',
																   '4 days'=>'4 days',
																   '5 days'=>'5 days',
																	'6 days'=>'6 days',
																	'7 days'=>'7 days'),array('prompt' => 'Select days')); ?>
		<?php echo $form->error($model,'day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'night'); ?>
		<?php echo $form->dropDownList($model,'night',array('1 nights'=>'1 nights',
																'2 nights'=>'2 nights',
																'3 nights'=>'3 nights',
																'4 nights'=>'4 nights',
																'5 nights'=>'5 nights',
																'6 nights'=>'6 nights',
																'7 nights'=>'7 nights'),array('prompt' => 'Select nights')); ?>
		<?php echo $form->error($model,'night'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php //echo $form->textArea($model,'description',array('size'=>100,'rows'=>7,'cols'=>40,'maxlength'=>1000)); ?>
		
		 <?php
            $this->widget('application.components.widgets.XHeditor',array(
                'model'=>$model,
                'modelAttribute'=>'description',
                'showModelAttributeValue'=>false, // defaults to true, displays the value of $modelInstance->attribute in the textarea
                // 'value'=>$model->activity,
				'config'=>array(
                    'id'=>'xh1',
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
		<?php echo $form->labelEx($model,'rating'); ?>
		<?php echo $form->dropDownList($model,'rating',array('one'=>'one','two'=>'two','three'=>'three','four'=>'four','five'=>'five'),array('prompt' => 'Select Rating')); ?>
		<?php echo $form->error($model,'rating'); ?>
	</div>
	
		<div class="row">
		<?php echo $form->labelEx($model,'show_on_site'); ?>
		<?php echo $form->dropDownList($model,'show_on_site',array("Show"=>"Show","Hide"=>"Hide")); ?>
		<?php echo $form->error($model,'show_on_site'); ?>
	</div>

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