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
		
	         <td>	  <?php echo $form->dropDownList($model1,'MAIN_TAB_ID', CHtml::listData($maintabid,'TAB_ID','TAB_NAME'), array('prompt'=>'--please select--',
	       //  'options'=>array(2=>array('selected'=>'selected')),
	         'ajax' => array(
                      'type' => 'POST', //request type
                      'url' => CController::createUrl('TBLANSWERS/displaysubtag'), //url to call.
                      //Style: CController::createUrl('currentController/methodToCall')
                      'update' => '#TBLTABS_TAB_ID', //selector to update
                  //'data'=>'js:javascript statement'
                  //leave out the data key to pass all form values through
                  )
                      )
              );?>	
	         
             <?php echo $form->error($model1,'MAIN_TAB_ID'); ?>
	         
	         </td>
		</tr>
		
		<tr>
				<td>      Sub tag </td>
				<td>    <?php echo $form->dropDownList($model1,'TAB_ID', CHtml::listData($maintabid,'TAB_ID','TAB_NAME'), array('prompt'=>'--please select--')); ?>
                		  <?php echo $form->error($model1,'TAB_ID'); ?>
                </td>
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
		   <td> Edit </td>
		
		</tr> 

		
		
<?php foreach($result as $row)
      {
         	
			//print_r($row);exit;
			/*
		$sql2="select distinct e.TAB_NAME
          from tbl_tabs e,(SELECT a.QUESTION_ID, a.QUESTION, b.STORE_FRONT_ID, b.MAIN_TAB_ID, b.TAB_ID, b.ANSWER, b.ANSWER_ID, b.STATUS,c.TAB_NAME
			 FROM tbl_answers AS b
          LEFT JOIN tbl_tabs AS c on ( c.TAB_ID = b.MAIN_TAB_ID )
			 LEFT JOIN tbl_questions AS a ON ( a.QUESTION_ID = b.QUESTION_ID )
			 WHERE b.STORE_FRONT_ID =1
			 AND b.STATUS =1 
          and c.TAB_ID=1
			 ORDER BY a.STORE_FRONT_ID ASC) as d
          where e.tab_id=d.tab_id
          and d.tab_id=".$row['TAB_ID'];
		  
		  $connection = Yii::app()->db;
			 $command = $connection->createCommand($sql2);
			 $result1 = $command->queryAll();	
			 */
			 
			 
			 $result1=Yii::app()->db->createCommand()
						->selectDistinct('e.TAB_NAME')
						->from(array('tbl_tabs e', '(SELECT a.QUESTION_ID, a.QUESTION, b.STORE_FRONT_ID, b.MAIN_TAB_ID, b.TAB_ID, b.ANSWER, b.ANSWER_ID, b.STATUS,c.TAB_NAME
			 FROM tbl_answers AS b
          LEFT JOIN tbl_tabs AS c on ( c.TAB_ID = b.MAIN_TAB_ID )
			 LEFT JOIN tbl_questions AS a ON ( a.QUESTION_ID = b.QUESTION_ID )
			 WHERE b.STORE_FRONT_ID =1
			 AND b.STATUS =1 
          and c.TAB_ID=1
			 ORDER BY a.STORE_FRONT_ID ASC) d'))
						
						
					    ->where('e.tab_id=d.tab_id and d.tab_id=:tabid',array(':tabid'=>$row['TAB_ID']) )
			            ->queryAll();
						
			 
			 
			 
			 
			
			foreach($result1 as $row2)
			{
			$subrabname=$row2['TAB_NAME'];
			
			}
			
      	?>
 
		<tr>
				<td><?php echo $row['QUESTION']; ?></td>
				<td><?php echo $row['TAB_NAME'];?></td>
			
				<td><?php echo $subrabname; ?></td>
				<td><?php echo CHtml::link('edit', CController::createUrl("TBLANSWERS/update?id=".$row['QUESTION_ID'].'&store_id='.$row['STORE_FRONT_ID'])); ?></td>
				
						
		
		</tr>
		
		<?php } ?>
		
 </table>
 <?php $this->endWidget(); ?>

</div><!-- form -->
