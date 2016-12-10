<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hideartist-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<table>
	<!--<tr>
		<td>
		<?php echo $form->labelEx($model,'artistid'); ?> </td>
		<td><?php echo $form->textField($model,'artistid',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'artistid'); ?></td>
	</tr>-->

	<tr>
		<td>
		<?php echo $form->hiddenField($model, 'artistid'); ?> 
		<?php echo $form->labelEx($model,'artistname'); ?></td>
		<td>
	
		
		<?php
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'name'=>'Hideartist[artistname]',
			//'attribute'=>'artist_name',
			'model'=>$model,
			//'value' => $model1->isNewRecord ? '': $model1->CONTENT_TITLE,
			'source'=>$this->createUrl('Topartists/autocompleteTest'),
			
				'options'=>array(
				'showAnim'=>'fold',
			        'select'=>"js:function( event, ui ) {
           $('#label').val(ui.item.label);
            $('#code').val(ui.item.code);
            $('#call_code').val(ui.item.call_code);
						 $('#Hideartist_artistid').val(ui.item.id);
						
        }"
		),
	
			
	)		);  ?>
		
		
		
		
		
		
		<?php echo $form->error($model,'artistname'); ?></td>
	</tr>

	<tr colspan="2">
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
	</tr>

</table>
<?php $this->endWidget(); ?>

</div><!-- form -->