<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'thenews-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php //echo $form->errorSummary($model); ?>
	
	<table>

<tr>
	
		<td><?php echo $form->labelEx($model,'name'); ?></td>
		<td><?php echo $form->textField($model,'name',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'name'); ?></td>
	
</tr>

<tr>
	
		<td><?php echo $form->labelEx($model,'time'); ?></td>
		<td>	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'Thenews[time]',
			'model'=>$model,
	'value'=>$model->time,			
			
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
		<?php echo $form->error($model,'time'); ?></td>
	
</tr>

<tr>
	
		<td><?php echo $form->labelEx($model,'site'); ?></td>
		<td><?php echo $form->textField($model,'site',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'site'); ?></td>
</tr>

<tr>
	<div class="row buttons">
	<td colspan="2"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
	</div>
	
	</tr>
	</table>

<?php $this->endWidget(); ?>

</div><!-- form -->