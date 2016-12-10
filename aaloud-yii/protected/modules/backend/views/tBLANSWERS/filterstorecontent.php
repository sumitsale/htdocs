<script type="text/javascript">
function validate()
{
   if(document.getElementById('flupld').value=="")
    {
        alert("Please Upload Content csv file");
        document.getElementById('flupld').focus();
        return false;
    }
     return true;
}
</script>

<?php Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
       CClientScript::POS_READY
    );
 if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div><?php
 endif; ?>


<div class="form" >  

<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'user-form', 	
'enableAjaxValidation'=>false,
'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	 )); ?>
	 <?php echo $form->errorSummary($model1); ?>
 	
<table>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Note - Upload only CSV file.</strong></td>
</tr>
</table>

 	
<table>

	<tr>
		<td><?php echo $form->labelEx($model1,'Content CSV File :'); ?></td>
		<td>
		<?php //echo CHtml::fileField('csvfile', 'csvfile', array('size'=>30,'maxlength'=>50)); ?> 
		<?php echo $form->fileField($model1,'csvfile',array('size'=>20,'maxlength'=>100)); ?>
		<?php echo $form->error($model1,'csvfile'); ?>
		</td>	
	
	</tr>
	

	<tr>
		<td colspan="3"> 
		<?php echo CHtml::button('Submit', array('submit' => array('TBLANSWERS/filterstorecontent'))); ?>
		
	
		</td>
	</tr>

	
</table>
	  <?php $this->endWidget(); ?>
 </div><!-- form -->