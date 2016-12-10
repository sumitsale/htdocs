





 <?php 
			Yii::app()->clientScript->registerScript(
			'myHideEffect',
			'$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
			CClientScript::POS_READY
			);
			if(Yii::app()->user->hasFlash('success')):?>
			<div class="flash-success">
				<?php echo Yii::app()->user->getFlash('success'); ?>
			</div>
			<?php endif; ?>












<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banner-form',
	'enableAjaxValidation'=>false,
)); ?>
<table>

<tr colspan="3">
	<td><p class="note">Fields with <span class="required">*</span> are required.</p></td>
</tr>

	<?php //echo $form->errorSummary($model); ?>
<tr>
		<td><?php echo $form->labelEx($model,'LOCATION_ID'); ?></td>
		<td><?php echo $form->textField($model,'LOCATION_ID',array('size'=>25,'value'=>'','maxlength'=>25)); ?>
		<?php echo $form->error($model,'LOCATION_ID'); ?></td>
</tr>	


<tr>
	
		<td><?php echo $form->labelEx($model,'BANNER_TEXT'); ?></td>
		<td><?php echo $form->textField($model,'BANNER_TEXT',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'BANNER_TEXT'); ?></td>
</tr>        

<tr>
		<td><?php echo $form->labelEx($model,'BANNER_REDIRECT_URL'); ?></td>
		<td><?php echo $form->textField($model,'BANNER_REDIRECT_URL',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'BANNER_REDIRECT_URL'); ?></td>
</tr>

<tr>
		<td><?php echo $form->labelEx($model,'BANNER_STATUS'); ?></td>
		<td><?php echo $form->textField($model,'BANNER_STATUS',array('size'=>60,'value'=>'','maxlength'=>100)); ?>
		<?php echo $form->error($model,'BANNER_STATUS'); ?></td>
</tr>

<tr colspan="3">
	
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
</tr>

</table>	

<?php $this->endWidget(); ?>

</div><!-- form -->

