<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pow-form',
	'enableAjaxValidation'=>false,
)); ?>








<table>
	<tr>
	<td>
		<?php echo "New This Week (Content id)"; ?>
		
	</td>
					<?php foreach($sql as $row)
					{
					$contentid=$row['CONTENT_ID'];
					$powid=$row['POW_ID'];
					}
					?>

<input type="hidden" name="pow_id" value="<?php echo $powid; ?>">

	<td>
		<?php echo $form->textField($model,'CONTENT_ID',array('size'=>20,'maxlength'=>20,'value'=>$contentid)); ?>
		
		<?php echo $form->error($model,'CONTENT_ID'); ?>  
	</td>

	<?php /*
		<?php echo $form->labelEx($model,'LAST_UPDATE'); ?>
		<?php echo $form->textField($model,'LAST_UPDATE'); ?>
		<?php echo $form->error($model,'LAST_UPDATE'); ?>  */ ?>
	

	<td>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save'); ?>
	</td>
	
	</tr>
</table>
















<?php $this->endWidget(); ?>

</div><!-- form -->