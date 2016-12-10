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

<?php 

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-changepassword-form',
	'enableAjaxValidation'=>false,
)); ?>


<table>
	
	<tr>
		<td colspan="2"><h2>Change Password</h2></td>
	</tr>

	<?php echo $form->errorSummary($model); ?>

	<tr align="right">
        <td><?php echo $form->labelEx($model,'Old password :'); ?></td>
        <td><?php echo $form->passwordField($model,'old_password',array('size'=>20,'maxlength'=>100)); ?>
        <?php echo $form->error($model,'old_password'); ?>
		</td>
	</tr>	

	<tr align="right">
        <td><?php echo $form->labelEx($model,'New password :'); ?></td>
        <td><?php echo $form->passwordField($model,'new_password',array('size'=>20,'maxlength'=>100)); ?>
        <?php echo $form->error($model,'new_password'); ?>
		</td>
	</tr>
	
	<tr align="right">
        <td><?php echo $form->labelEx($model,'Confirm password :'); ?></td>
        <td><?php echo $form->passwordField($model,'con_password',array('size'=>20,'maxlength'=>100)); ?>
        <?php echo $form->error($model,'con_password'); ?>
		</td>
	</tr>


	<tr align="right">
		<td> </td>
		<td><?php echo CHtml::submitButton('Change Password'); ?></td>
	<tr>
	

</table>	
<?php $this->endWidget(); ?>

</div><!-- form -->