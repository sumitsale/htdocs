<div class="form">


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





<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tblanswers-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<table>
	
	
	
<tr>
		<td><?php echo $form->labelEx($model1,'MAIN_TAB_ID'); ?></td>
		<td><?php echo $form->dropDownList($model1,'MAIN_TAB_ID', CHtml::listData($sql,'TAB_ID','TAB_NAME'), array('prompt'=>'--please select--','ajax' => array(
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
		<td><?php echo $form->labelEx($model1,'TAB_ID'); ?></td>
		<td><?php echo $form->dropDownList($model1,'TAB_ID', CHtml::listData( $sql,'TAB_ID','TAB_NAME'), array('prompt'=>'--please select--')); ?>	</td>
		</tr>	
	
	<!--
		<tr>
		<td><?php echo $form->labelEx($model,'QUESTION_ID'); ?></td>
		<td><?php echo $form->textField($model,'QUESTION_ID',array('size'=>12,'maxlength'=>12)); ?></td>
		
	</tr>
	-->
	
	
	
		<tr>
		<td><?php echo $form->labelEx($model3,'QUESTION'); ?></td>
		<td><?php echo $form->textField($model3,'QUESTION',array('size'=>50,'maxlength'=>50)); ?></td>
		
	</tr>
	
<!--	<tr>


       <td><?php echo $form->labelEx($model,'STORE_FRONT_ID'); ?></td>
		<td><?php echo $form->textField($model,'STORE_FRONT_ID',array('size'=>12,'maxlength'=>12)); ?></td>
		
	</tr>
	-->
	
	
	
	

	<tr>

	    <td><?php echo $form->labelEx($model,'ANSWER'); ?></td>
		<td><?php echo $form->textArea($model,'ANSWER',array('rows'=>6, 'cols'=>50)); ?></td>
		
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
			<td><?php echo $form->labelEX($model1,'STORE_FRONT_ID'); ?></td>
		   <td><?php echo $form->dropDownList($model1,'STORE_FRONT_ID', CHtml::listData($sql1,'STORE_FRONT_ID','STORE_FRONT_NAME')); ?></td>
	</tr>






	<tr>
		<td>   <?php echo CHtml::button('Submit ', array('submit' => array('TBLANSWERS/add')));?></td>
		
	
		
		<td><?php echo CHtml::resetButton('Cancel', array('id'=>'form-reset-button')); ?></td>
	</tr>
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->