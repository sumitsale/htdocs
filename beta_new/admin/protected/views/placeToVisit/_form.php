<?php
/* @var $this PlaceToVisitController */
/* @var $model PlaceToVisit */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'place-to-visit-form',
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
		<?php echo $form->textArea($model,'meta_tag',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'meta_tag'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'place_name'); ?>
		<?php echo $form->textField($model,'place_name',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'place_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_name'); ?>
		<?php echo $form->dropDownList($model,'category_name',array('Islands'=>'Islands',
																'Beaches'=>'Beaches',
																'Monument & Museums'=>'Monument & Museums',
																'Parks & Shopping Points'=>'Parks & Shopping Points',
																),array('prompt' => 'Select category')); ?>
		<?php echo $form->error($model,'category_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'small_thumbnail'); ?>
		<?php echo $form->fileField($model,'small_thumbnail',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'small_thumbnail'); ?>
		
		
			<?php if($model->small_thumbnail !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/placestovisit/".$model->small_thumbnail.">".$model->small_thumbnail."</a>"; 
					
					} ?>
					
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_1'); ?>
		<?php echo $form->fileField($model,'thumbnail_1',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'thumbnail_1'); ?>
		
		
			<?php if($model->thumbnail_1 !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/placestovisit/".$model->thumbnail_1.">".$model->thumbnail_1."</a>"; 
					
					} ?>
					
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_2'); ?>
		<?php echo $form->fileField($model,'thumbnail_2',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'thumbnail_2'); ?>
		
			<?php if($model->thumbnail_2 !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/placestovisit/".$model->thumbnail_2.">".$model->thumbnail_2."</a>"; 
					
					} ?>
					
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_3'); ?>
		<?php echo $form->fileField($model,'thumbnail_3',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'thumbnail_3'); ?>
		
			<?php if($model->thumbnail_3 !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/placestovisit/".$model->thumbnail_3.">".$model->thumbnail_3."</a>"; 
					
					} ?>
					
					
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_4'); ?>
		<?php echo $form->fileField($model,'thumbnail_4',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'thumbnail_4'); ?>
			<?php if($model->thumbnail_4 !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/placestovisit/".$model->thumbnail_4.">".$model->thumbnail_4."</a>"; 
					
					} ?>
					
					
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thumbnail_5'); ?>
		<?php echo $form->fileField($model,'thumbnail_5',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'thumbnail_5'); ?>
		
		<?php if($model->thumbnail_5 !='') {
					
					echo "<a target='_blank' href=".Yii::app()->request->baseUrl."/images/placestovisit/".$model->thumbnail_5.">".$model->thumbnail_5."</a>"; 
					
					} ?>
					
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php // echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		
		
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
                    'width'=>'80%',
					'height'=>"100%",
                    //see XHeditor::$_configurableAttributes for more
                ),
				'contentValue'=>$model->description,
            ));
            ?>
			
			
		<?php echo $form->error($model,'description'); ?>
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