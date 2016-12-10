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
	window.location = '/alloud-yii/index.php/backend/TblContainerMaster/show';
}
</script>
    
    
	<?php 
	
	$TEMPLATE_MASTER_ID = $temp_array['TEMPLATE_MASTER_ID'];
	
	
	echo $form->errorSummary($model1); ?>
    
      <tr>
    <td>
    	<b>Template</b>
	</td>
	<td>
    	<?php echo $form->dropDownList($model1,'TEMPLATE_MASTER_ID', CHtml::listData($template,'TEMPLATE_MASTER_ID','TEMPLATE_NAME'), array('prompt'=>'select','options'=>array($TEMPLATE_MASTER_ID=>array('selected'=>'selected')))); ?> </td>
    	<?php echo $form->error($model2,'TEMPLATE_MASTER_ID'); ?>
	</tr>
    
	<tr>
    <td>
		<?php echo $form->labelEx($model1,'TEMPLATE_NAME'); ?>
    </td>
    <td>
		<?php echo $form->textField($model1,'TEMPLATE_NAME',array('size'=>50,'maxlength'=>50,'value'=>$temp_array['TEMPLATE_NAME'])); ?>
    </td>
		<?php echo $form->error($model1,'TEMPLATE_NAME'); ?>
	</tr>


  
     <tr>
	<td>&nbsp;</td>
    <td align="center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Submit'); ?>
        <input type="button" id="Cancel" name="Cancel" value="Cancel" onclick="goHome()" /></td>
	</td>

<?php $this->endWidget(); ?>
