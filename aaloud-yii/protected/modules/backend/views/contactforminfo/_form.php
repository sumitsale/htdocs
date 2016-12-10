<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contactforminfo-form',
	'enableAjaxValidation'=>false,
)); ?>
<table>

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

<tr>
	<td colspan="3">
		<p class="note"><span class="required">*</span>indicates all compulsury fields.</p>
	</td>
</tr>
	<?php echo $form->errorSummary($model); ?>
<tr>
	<td width="180px"><?php echo $form->labelEx($model,'contactform_information'); ?></td>
	<td width="350px"><?php echo $form->textArea($model,'contactform_information',array('size'=>60,'maxlength'=>250,'rows'=>10,'cols'=>50)); ?>
    <?php
	/*  $this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$model,
        'attribute'=>'contactform_information', //Model attribute name. Nome do atributo do modelo.
        'options'=>array(
            'width'=>'600',
            'height'=>250,
            'useCSS'=>true,
        ),
        'value'=>$model->description, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
    ));
 */   ?>
    </td>
		<?php echo $form->error($model,'contactform_information'); ?>
	<td><p class="note"><span class="required">*</span>compulsury</p></td>
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
	*/ ?>
<tr>

<td colspan="3">
	<div align="center">
	<span class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Submit'); ?>
	</span>
    <span class="row buttons">
		<?php echo CHtml::resetButton('Reset', array('id'=>'form-reset-button')); ?>
	</span>
    </div>
</td>
</tr>
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->