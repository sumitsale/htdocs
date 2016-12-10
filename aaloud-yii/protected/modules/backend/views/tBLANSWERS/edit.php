<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tblanswers-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<table>
	
	<?php foreach($displayquestion as $row)
	{?>
	
<tr>
     
     	<tr>
		<td><?php echo $form->labelEx($model3,'QUESTION_ID'); ?></td>
		<td><?php echo $form->textField($model3,'QUESTION_ID',array('size'=>50,'maxlength'=>50,'value'=>$row['QUESTION_ID'])); ?></td>
		
	</tr>



		<td><?php echo $form->labelEx($model3,'MAIN_TAB_ID'); ?></td>
		<td><?php echo $form->dropDownList($model3,'MAIN_TAB_ID', CHtml::listData($sql,'TAB_ID','TAB_NAME'),
		array('prompt'=>'--please select--',
		'options'=>array($row['MAIN_TAB_ID']=>array('selected'=>'selected')),'ajax' => array(
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
		<td><?php echo $form->labelEx($model3,'TAB_ID'); ?></td>
		<td><?php echo $form->dropDownList($model3,'TAB_ID', CHtml::listData( $sql2,'TAB_ID','TAB_NAME'), array('prompt'=>'--please select--','options'=>array($row['TAB_ID']=>array('selected'=>'selected')))); ?>	</td>
		</tr>	
	
	<!--
		<tr>
		<td><?php echo $form->labelEx($model,'QUESTION_ID'); ?></td>
		<td><?php echo $form->textField($model,'QUESTION_ID',array('size'=>12,'maxlength'=>12)); ?></td>
		
	</tr>
	-->
	
	
	
		<tr>
		<td><?php echo $form->labelEx($model3,'QUESTION'); ?></td>
		<td><?php echo $form->textField($model3,'QUESTION',array('size'=>50,'maxlength'=>50,'value'=>$row['QUESTION'])); ?></td>
		
	</tr>
	
<!--	<tr>


       <td><?php echo $form->labelEx($model,'STORE_FRONT_ID'); ?></td>
		<td><?php echo $form->textField($model,'STORE_FRONT_ID',array('size'=>12,'maxlength'=>12)); ?></td>
		
	</tr>
	-->
	
	
	


	<tr>

	    <td><?php echo $form->labelEx($model,'ANSWER'); ?></td>
	    
     
	    
		<td><?php echo $form->textField($model,'ANSWER',array('size'=>50, 'maxlength'=>50,'value'=>$ans)); ?></td>
		
	</tr>

	

	<tr>
		<td><?php echo $form->labelEx($model,'STATUS'); ?></td>
		<td>
			<!--	<?php echo $form->radioButton($model,'STATUS',array('value'=>'1')).'Active' ; ?>
	
				<?php echo $form->radioButton($model,'STATUS',array('value'=>'2')).'Deactive' ; ?>	
		-->
		
		 <?php
                $accountStatus = array('1'=>'Active', '2'=>'Deactive');
                echo $form->radioButtonList($model,'STATUS',$accountStatus,array('separator'=>' '));
        ?>
		</td>
		
		</tr>
		
	<tr>
			<td><?php echo $form->labelEX($model,'STORE_FRONT_ID'); ?></td>
		   <td><?php echo $form->dropDownList($model,'STORE_FRONT_ID', CHtml::listData($sql1,'STORE_FRONT_ID','STORE_FRONT_NAME'), array('prompt'=>'--please select--','options'=>array($row['STORE_FRONT_ID']=>array('selected'=>'selected')))) ?></td>
	</tr>






	<tr>
		<td>  <?php echo CHtml::button('update', array('submit' => array('TBLANSWERS/editupdate'))); ?>  </td>
		
	
		
		<td><?php echo CHtml::resetButton('Cancel', array('id'=>'form-reset-button')); ?></td>
	</tr>
	
	<?php } ?>
	
	
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->