<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tblanswers-form',
	'enableAjaxValidation'=>false,
)); ?>


<table border="0" width="100%">
		<tr>
				<td colspan="3">Search Question By Tab wise</td>
		</tr>
		
		<tr>
		      <td>     Main tab:     </td>
		
	         <td>	  <?php echo $form->dropDownList($model1,'MAIN_TAB_ID', CHtml::listData($maintabid,'TAB_ID','TAB_NAME'), array('prompt'=>'--please select--','ajax' => array(
                      'type' => 'POST', //request type
                      'url' => CController::createUrl('TBLANSWERS/displaysubtag'), //url to call.
                      //Style: CController::createUrl('currentController/methodToCall')
                      'update' => '#TBLTABS_TAB_ID', //selector to update
                  //'data'=>'js:javascript statement'
                  //leave out the data key to pass all form values through
                  )
                      )
              );?>	
	         
	         
	         </td>
		</tr>
		
		<tr>
				<td>      sub tag </td>
				<td>    <?php echo $form->dropDownList($model1,'TAB_ID', CHtml::listData($maintabid,'TAB_ID','TAB_NAME'), array('prompt'=>'--please select--')); ?></td>
		</tr>
		
		<tr>
			
				<td>   <?php echo CHtml::button('Submit ', array('submit' => array('TBLANSWERS/submitbutton'))); ?></td>
				<td><?php echo CHtml::resetButton('Cancel', array('id'=>'form-reset-button')); ?></td>
				
		</tr>

</table>

<div style="float:right">
 
      <?php echo CHtml::button('Add new ', array('submit' => array('TBLANSWERS/questionadd'))); ?>
 
 </div>








 <table border="0" width="100%">
		<tr>
			
			<td>Question</td>	
		   <td>Main tab</td>	
		   <td> Sub tab</td>
		   <td> </td>
		
		</tr> 
		<?php foreach($maintabidname as $row)
		{
			$maintabname=$row['TAB_NAME']; 
		} ?>
			
			<?php foreach($tabidname as $row)
			
			{
				$tabidname=$row['TAB_NAME']; 
			}?>
		
		<?php foreach($result as $row)
		{?>
		
		<tr>
				<td><?php echo $row['QUESTION']; ?></td>
				<td><?php echo $maintabname;?></td>
				<td><?php echo $tabidname; ?></td>
				<td><?php echo CHtml::link('edit', CController::createUrl("TBLANSWERS/update?id=".$row['QUESTION_ID'].'&store_id='.$row['STORE_FRONT_ID']));} ?></td>
				
						
		
		</tr>
		
		
 </table> <?php $this->endWidget(); ?>

</div><!-- form -->
 
 
 