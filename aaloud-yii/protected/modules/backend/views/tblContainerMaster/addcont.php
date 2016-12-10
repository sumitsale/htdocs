<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-container-master-form',
	'enableAjaxValidation'=>false,
)); ?>


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


	
<script type="text/javascript">
function goHome()
{
	window.location = '/alloud-yii/index.php/backend/TblContainerMaster/list';
}
</script>
    
    
	<?php echo $form->errorSummary($model); ?>
	<tr>
    <td>
		<?php echo $form->labelEx($model,'CONTAINER_LOCATION'); ?>
    </td>
    <td>
		<?php echo $form->dropDownList($model,'CONTAINER_LOCATION',CHtml::listData($containerlocation,'CONTAINER_LOCATION','CONTAINER_LOCATION'), array('prompt'=>'CONTAINER LOCATION')); ?>

    </td>
		<?php echo $form->error($model,'CONTAINER_LOCATION'); ?>
	</tr>
	<tr>

    <tr>
    <td>
    	<?php echo $form->labelEx($model,'CONTAINER_NAME'); ?>
	</td>
	<td>
    	<?php echo $form->textField($model,'CONTAINER_NAME',array('size'=>50,'maxlength'=>50)); ?>
    	<?php echo $form->error($model,'CONTAINER_NAME'); ?>
	</tr>
    
    <tr>

    <tr>
	<td>&nbsp;</td>
    <td align="center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Submit'); ?>
        <input type="button" id="Cancel" name="Cancel" value="Cancel" onclick="goHome()" /></td>
	</td>

<?php $this->endWidget(); ?>

</div><!-- form -->