<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'model-presskit-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	
	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php 
	//print_r($artistname);
	// echo $form->errorSummary($model); ?>
<table>
	<tr>
		<td><?php echo $form->labelEx($model,'Artist_Id'); ?></td>
		<td><?php echo $form->dropDownList($model,'Artist_Id',CHtml::listData($artistname,'Artist_Id','Artist_Name')); ?>
		<?php echo $form->error($model,'Artist_Id'); ?></td>
	</tr>
	
	<tr>

	    <td><?php echo $form->labelEx($model,'Pdf_File'); ?></td>
		<td><?php echo $form->filefield($model,'Pdf_File',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'Pdf_File'); ?></td>
	</tr>
	
<?php /*
	<tr>
		<td><?php echo $form->labelEx($model,'Press_Kit_Status'); ?></td>
		<td><?php echo $form->textField($model,'Press_Kit_Status',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'Press_Kit_Status'); ?></td>
	</tr>	

	<tr> 
    	<td><?php echo $form->labelEx($model,'Press_Kit_Indate'); ?></td>
		<td><?php echo $form->textField($model,'Press_Kit_Indate'); ?>
		<?php echo $form->error($model,'Press_Kit_Indate'); ?></td>
	</tr>
 
 */ ?>
	<tr colspan="3">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
	</tr>

	</table>
<?php $this->endWidget(); ?>

</div><!-- form -->