<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'upc-events-form',
	'enableAjaxValidation'=>false,
)); ?>
	<table>
    
    
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
	<?php echo $form->errorSummary($model); ?>
	
<table>
    

	<tr>
		<td>
			<?php echo $form->labelEx($model,'event_name'); ?>
		</td>
		<td>
			<?php echo $form->textField($model,'event_name',array('size'=>50,'maxlength'=>500)); ?>
			<?php echo $form->error($model,'event_name'); ?>
		</td>
    </tr>
		
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
		<?php echo $form->error($model,'event_date'); ?>
		</td>
    </tr>
		
	<tr>
		<td>
			<?php echo $form->labelEx($model,'event_time'); ?>
		</td>
		<td>
			<?php echo $form->textField($model,'event_time',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'event_time'); ?>
		</td>
    </tr>
	
	<tr>
		<td>
			<?php echo $form->labelEx($model,'location'); ?>
		</td>
		<td>
			<?php echo $form->textField($model,'location',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'location'); ?>
		</td>
    </tr>
		
	
	<tr>
		<td>
			<?php echo $form->labelEx($model,'city'); ?>
		</td>
		<td>
		<?php echo $form->textField($model,'city',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'city'); ?>
		</td>	
	</tr>
	
	<tr>
		<td>
			<?php echo $form->labelEx($model,'url'); ?>
		</td>
		<td>
		<?php echo $form->textField($model,'url',array('size'=>50,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'url'); ?>
		</td>	
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
   
	<tr>
	    <td> </td>
		<td><?php echo CHtml::submitButton($model->isNewRecord ? '   Add Event   ' : 'save'); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo CHtml::resetButton('  Clear Event  ', array('id'=>'form-reset-button')); ?></td>
		</td>
	</tr>

</table>
<?php $this->endWidget(); ?>

</div><!-- form -->