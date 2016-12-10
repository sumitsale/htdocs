<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-aa-quote-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<table>
	
	<tr>
		<td><?php echo $form->labelEx($model,'Quote Author'); ?></td>
		<td><?php echo $form->textField($model,'Quote_Src',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'Quote_Src'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Quote Title'); ?></td>
		<td><?php echo $form->textField($model,'Quote_Title',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'Quote_Title'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Quote'); ?></td>
		<td><?php echo $form->textField($model,'Quote',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'Quote'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Image Upload (107x125) : '); ?>
		<td><?php echo $form->fileField($model,'Quote_Image',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Quote_Image'); ?>
		
		<div>
		<a target="_blank" href="<?php echo Yii::app()->baseUrl;?>/images/quotes/<?php echo $row['Quote_Image'];?>"><?php echo $row['Quote_Image'];   ?> </a>
		 </div>
		
		</td>
	</tr>
	
	<tr>
	<td colspan=2>&nbsp;</td>
	</tr> 

	<tr align="center">
		<td> </td>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<td><?php echo CHtml::submitButton($model->isNewRecord ? '   Add Quotes   ' : '   Update Quotes   '); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo CHtml::resetButton('   Clear Quotes   ', array('id'=>'form-reset-button')); ?></td>
	
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->