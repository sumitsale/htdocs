<div class="form">  
<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'user-form', 	
		'enableAjaxValidation'=>false,
	 )); ?>
<?php echo $form->errorSummary($model); ?> 	 


<h2><strong>Abuse Report</strong></h2>	
<table>
	
	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
		

	
	<tr>
		<td><?php echo $form->labelEx($model,'Content Type :'); ?></td>
		<td><?php echo $form->dropDownList($model,'CONTENT_TYPE_ID',CHtml::listData($content,'ALBUM_TYPE_ID','ALBUM_TYPE_NAME'), array('prompt'=>'Select Content Type')); ?></td>
	</tr>
	
	
	
	
	
	
	<tr>	
		<td colspan=2><?php echo CHtml::submitButton('Submit'); ?></td>		
	</tr>	

</table>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<table>
	<tr></tr>
	<tr>
		<th>   Review Title    </th>
    
		<th>   Content ID       </th>

		<th>   Full Name     </th>
	
		<th>   Email      </th>
	</tr>
	</table>

	
	<table>
	
	<tr>	
			
			<td><?php echo CHtml::submitButton('Mark Safe'); ?></td>		
			<td><?php echo CHtml::submitButton('Delete Abuse'); ?></td>
			<td><?php echo CHtml::submitButton('Accept Abuse'); ?></td>
	</tr>	
	
	</table>
	
	
	
	

	  <?php $this->endWidget(); ?>
 </div><!-- form -->