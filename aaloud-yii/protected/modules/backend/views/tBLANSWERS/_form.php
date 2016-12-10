





<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tblanswers-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<table>
	
	
	
<tr>
		<td><?php echo $form->labelEx($model,'MAIN_TAB_ID'); ?></td>
		<td><?php echo $form->textField($model,'MAIN_TAB_ID',array('size'=>12,'maxlength'=>12)); ?></td>
		
</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'TAB_ID'); ?></td>
		<td><?php echo $form->textField($model,'TAB_ID',array('size'=>12,'maxlength'=>12)); ?></td>
		</tr>	
	
	
		<tr>
		<td><?php echo $form->labelEx($model,'QUESTION_ID'); ?></td>
		<td><?php echo $form->textField($model,'QUESTION_ID',array('size'=>12,'maxlength'=>12)); ?></td>
		
	</tr>
	
	<tr>


       <td><?php echo $form->labelEx($model,'STORE_FRONT_ID'); ?></td>
		<td><?php echo $form->textField($model,'STORE_FRONT_ID',array('size'=>12,'maxlength'=>12)); ?></td>
		
	</tr>
	
	<tr>

	    <td><?php echo $form->labelEx($model,'ANSWER'); ?></td>
		<td><?php echo $form->textArea($model,'ANSWER',array('rows'=>6, 'cols'=>50)); ?></td>
		
	</tr>

	

	<tr>
		<td><?php echo $form->labelEx($model,'STATUS'); ?></td>
		<td><?php echo $form->textField($model,'STATUS'); ?></td>
		</tr>

	<tr>
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
	</tr>
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->