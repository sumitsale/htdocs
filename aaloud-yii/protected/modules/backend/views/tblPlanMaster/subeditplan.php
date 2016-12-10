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
'id'=>'user-form', 	
'enableAjaxValidation'=>false,
	
	 )); ?>
 	 	<?php 
		//--hard code to display value--//'value'=>$edit_result['CONTENT_VALIDITY']
		echo $form->errorSummary($model2); ?>
		
<table>	

	<tr>
		<td colspan="3"><h1>Edit Plans</h1></td>
	</tr>

	<tr>  		
		<td><?php echo $form->labelEx($model2,'First Time Subscription SMS :'); ?></td>
		<td><?php echo $form->textarea($model2,'SMS_FIRSTTIME',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model2,'SMS_FIRSTTIME'); ?>
		</td>
		
    </tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model2,'Pre-renewal SMS :'); ?></td>
		<td><?php echo $form->textarea($model2,'SMS_PRE_RENEWAL',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model2,'SMS_PRE_RENEWAL'); ?>
		</td>
		
    </tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model2,'Charging SMS :'); ?></td>
		<td><?php echo $form->textarea($model2,'SMS_CHARGING',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model2,'SMS_CHARGING'); ?>
		</td>
		
		
    </tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model2,'Unsubscription SMS :'); ?></td>
		<td><?php echo $form->textarea($model2,'SMS_UNSUBSCRIPTION',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model2,'SMS_UNSUBSCRIPTION'); ?>
		</td>
		
		
    </tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model2,'Failed SMS :'); ?></td>
		<td><?php echo $form->textarea($model2,'SMS_FAILED',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model2,'SMS_FAILED'); ?>
		</td>
		
		
    </tr>
	
 <tr><td>&nbsp;</td><td>&nbsp;</td>
		
	</tr> 


    <tr>
		<td colspan="3"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   		
		<?php echo CHtml::submitButton($model2->isNewRecord ? '            Proceed            ' : 'Proceed'); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
       <?php echo CHtml::resetButton('          Reset          ', array('id'=>'form-reset-button')); ?>		
		
	
		</td>
	</tr>
		

		
		
</table>
	  <?php $this->endWidget(); ?>
 </div><!-- form -->