<div class="form">  
<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'user-form', 	
		'enableAjaxValidation'=>false,
	 )); ?>
<?php echo $form->errorSummary($model); ?> 	 


<h2><strong>User Review Master</strong></h2>	
<table>
	
	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
		

	
	<tr>
		<td><?php echo $form->labelEx($model1,'Content Type :'); ?></td>
		<td><?php echo $form->dropDownList($model1,'ALBUM_TYPE_ID',CHtml::listData($content,'ALBUM_TYPE_ID','ALBUM_TYPE_NAME'), array('prompt'=>'Select Content Type')); ?></td>
		
	
	</tr>
	
	
	
	
	
	
	<tr>

		<th>   Filter :  </th>
		<td>  <?php echo CHtml::dropDownList('User[seltype]', '', array('Unmoderated'=>'Unmoderated','Moderated'=>'Moderated','Moderated And Deleted'=>'Moderated And Deleted')); ?> </td>

</tr>

	
	
	
	
	
	
	
	<tr>
	<td><?php echo $form->labelEx($model,'Content Id :'); ?></td>
	<td><?php echo $form->textField($model,'CONTENT_ID',array('size'=>20,'maxlength'=>100)); ?></td>
	</tr>
	
	<tr>
	<td><?php echo $form->labelEx($model,'Title Search :'); ?></td>
	<td><?php echo $form->textField($model,'REVIEW_TITLE',array('size'=>20,'maxlength'=>100)); ?></td>
	</tr>
	
	
	
	
	<tr align="right">	
			
			<td colspan=2><?php echo CHtml::submitButton('Submit'); ?></td>		
		
	</tr>	

</table>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<table>
	<tr></tr>
	<tr>
		<th>   Review Title    </th>
    
		<th>    User ID       </th>

		<th>    Full Name     </th>
	
		<th>    Content ID      </th>
	</tr>
	</table>

	<?php foreach($result as $row) 
{

	?>
	
	
	<tr>
	
	 			<td>    <?php echo $row['REVIEW_TITLE'];?> </td>	
	 			
	 			<td>    <?php echo $row['USER_ID'];?>    </td> 
				
				<td>    <?php echo $row['FULL_NAME'];?>    </td> 
				
				<td>    <?php echo $row['CONTENT_ID'];?>    </td>
				
	 			
	 			<td>	<?php echo CHtml::link('View', CController::createUrl("TblUserReviews/manage?id=".$row['id']), array('class'=>'report')); }?></td>
	
	
	</tr>

	

	  <?php $this->endWidget(); ?>
 </div><!-- form -->