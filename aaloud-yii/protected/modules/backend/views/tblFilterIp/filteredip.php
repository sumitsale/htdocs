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
<?php echo $form->errorSummary($model); ?> 	 	
<table>

	<tr>
		<td colspan="4">
			<p class="note"><b><span class="required">*</span> All fields are mandatory</b></p>
		</td>
	</tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model,'IP From  '); ?></td>
		<td><?php echo $form->labelEx($model,'IP To  '); ?></td>
		<td colspan=2><?php echo $form->labelEx($model,'Country Code  '); ?> </td>
		
	</tr>
	
	<tr>	
	    <td><?php echo $form->textField($model,'ipfrom',array('size'=>20,'maxlength'=>100)); ?></td>
		<td><?php echo $form->textField($model,'ipto',array('size'=>20,'maxlength'=>100)); ?></td>		
		<td colspan=2><?php echo $form->dropDownList($model,'COUNTRY_ID',CHtml::listData($country,'COUNTRY_ID','COUNTRY_NAME'), array('prompt'=>'Select Country')); ?></td>		
	</tr>
	
	<tr>	
		<td> </td>	
			<td><?php echo CHtml::submitButton('Save'); ?></td>		
		<td colspan=2> </td>
	</tr>	


	<tr>
		<td colspan="4" align="center">ArrayFilename:/var/www/html/vhosts/www.hungama.com/httpdocs/uploads/filtered_ip_1.txt</td>
	</tr>
	
	<tr>
		<td>    IP From     </td>
    
		<td>    IP To       </td>

		<td>    Country     </td>
	
		<td>    Delete      </td>
	</tr>

<?php foreach($result as $row) 
{

	?>
	
	
	<tr>
	
	 			<td>    <?php echo $row['ipfrom'];?> </td>	
	 			
	 			<td>    <?php echo $row['ipto'];?>    </td> 
				
				<td>    <?php echo $row['COUNTRY_NAME'];?>    </td> 
	 			
	 			<td>	<?php echo CHtml::link('Delete', CController::createUrl("TblFilterIp/delfilterip?id=".$row['id']), array('class'=>'report')); }?></td>
	
	
	</tr>

	
	
	
</table>
	  <?php $this->endWidget(); ?>
 </div><!-- form -->