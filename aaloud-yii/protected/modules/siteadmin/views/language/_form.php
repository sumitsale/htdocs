<?php
/* code for displaying success msg after login */
    Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
       CClientScript::POS_READY
    );
?>
 
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; 
/* Code for Success msg ends here */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lang-master-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<table>	
	
	<tr>
		<td><?php echo $form->labelEx($model,'lang_name'); ?></td>
		<td><?php echo $form->textField($model,'lang_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'lang_name'); ?>
		</td>
		
	</tr>

	

	<tr align="center">
		<td> </td>
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Add Language' : 'Save'); ?></td>
	</tr>
	
</table>


<?php $this->endWidget(); ?>

</div><!-- form -->