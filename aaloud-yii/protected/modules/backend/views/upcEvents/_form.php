<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'upc-events-form',
	'enableAjaxValidation'=>false,
)); ?>
	<table>
    
    
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
    <table>
    
	<?php echo $form->errorSummary($model); ?>
	<tr>
    <td>
		<?php echo $form->labelEx($model,'artist_name'); ?>
    </td>
    <td>
		<?php echo $form->textField($model,'artist_name',array('size'=>50,'maxlength'=>50)); ?>
    </td>
    </tr>
		<?php echo $form->error($model,'artist_name'); ?>
	<tr>
	<td>
		<?php echo $form->labelEx($model,'event_date'); ?>
    </td>
    <td>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'UpcEvents[event_date]',
			'model'=>$model,
			'value'=>$model->event_date,
		// additional javascript options for the date picker plugin
		'options'=>array(
		'dateFormat'=>'yy-m-dd',
		'showAnim'=>'fold',
		
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;',
		'readonly'=>'true' 

    ),
));

?>
    </td>
    </tr>
		<?php echo $form->error($model,'event_date'); ?>
	
	<tr>
	<td>
		<?php echo $form->labelEx($model,'location'); ?>
    </td>
    <td>
		<?php echo $form->textField($model,'location',array('size'=>50,'maxlength'=>50)); ?>
    </td>
    </tr>
		<?php echo $form->error($model,'location'); ?>
	
	<tr>
	<td>
		<?php echo $form->labelEx($model,'city'); ?>
    </td>
    <td>
		<?php echo $form->textField($model,'city',array('size'=>50,'maxlength'=>50)); ?>
    </td>
		<?php echo $form->error($model,'city'); ?>
	</tr>

	<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_date'); ?>
		<?php echo $form->textField($model,'modified_date'); ?>
		<?php echo $form->error($model,'modified_date'); ?>
	</div>
	
	*/?>
    </table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->