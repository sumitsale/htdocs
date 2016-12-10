<script language="Javascript" type="text/javascript">

function showplanMaster(){ 
 var values= document.getElementById('TblStorePlan_PLAN_ID').value;
 if(values==4){
 	document.getElementById('planMaster').style.visibility='visible';
	document.form.pmFlag.value='Y';
 }else{
 	 document.getElementById('planMaster').style.visibility='hidden';
	 document.form.pmFlag.value='N';
 }
}
</script>



 
<div class="form">  
<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'user-form', 	
'enableAjaxValidation'=>false,
	
	 )); ?>
 	 	<?php echo $form->errorSummary($model1); ?>
		<?php
		$txtVoucherSD = trim($_POST['txtVoucherSD'])?trim($_POST['txtVoucherSD']):"";
		$txtVoucherED = trim($_POST['txtVoucherED'])?trim($_POST['txtVoucherED']):"";
		?>
<table>

	<tr>
		<td colspan="3"><h1>Store Plans</h1></td>
	</tr>

	<tr>
		<td colspan="3">
	<p class="note"><b><span class="required">*</span> indicates all compulsary fields.</b></p>
		</td>
	</tr> 

	

	<tr> 		
		<td><?php echo $form->labelEx($model1,'Plan'); ?></td>
		<td><?php echo $form->dropDownList($model1,'PLAN_ID', CHtml::listData($plan,'PLAN_ID','PLAN_TITLE'), array('onchange'=>'showplanMaster();','prompt'=>'Select Plan'));;?>
		<?php echo $form->error($model1,'PLAN_ID'); ?>
		</td>
		
                     
        <td> * </td>             
	</tr>
	
    <tr id="planMaster" style="visibility:hidden;">	
		<td><?php echo $form->labelEx($model1,'Plan Master :'); ?></td>
		<td><?php echo $form->dropDownList($model1,'STEP_MASTER_PLAN_ID',CHtml::listData($result,'PLAN_ID','PLAN_TITLE'), array('prompt'=>'Select Plan Master')); ?>
		<?php echo $form->error($model1,'PLAN_ID'); ?>
		</td>
		<td> * </td>
			
	</tr> 
	
	
	<tr>  		
		<td><?php echo $form->labelEx($model1,'Quantity :'); ?></td>
		<td><?php echo $form->textField($model1,'CONTENT_QTY',array('size'=>30,'maxlength'=>100)); ?> (Note: For Unlimited Put 99999)
		<?php echo $form->error($model1,'CONTENT_QTY'); ?>
		</td>
		
		<td> * </td>
		
	</tr>
	
	
	<tr>  		
		<td><?php echo $form->labelEx($model1,'Price :'); ?></td>
		<td><?php echo $form->textField($model1,'PLAN_PRICE',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model1,'PLAN_PRICE'); ?>
		</td>
		<td> * </td>
		
	</tr>
	
	
	<tr>  		
		<td><?php echo $form->labelEx($model1,'Content Validity :'); ?></td>
		<td><?php echo $form->textField($model1,'CONTENT_VALIDITY',array('size'=>30,'maxlength'=>100)); ?> (Note: For Unlimited Put 999)
		<?php echo $form->error($model1,'CONTENT_VALIDITY'); ?>
		</td>
		<td> * </td>
		
	</tr>
	
	
	<tr>  		
		<td><?php echo $form->labelEx($model1,'Valid For :'); ?></td>
		<td><?php echo $form->textField($model1,'VALID_FOR',array('size'=>30,'maxlength'=>100)); ?> (Note: For Unlimited Put 999)
		<?php echo $form->error($model1,'VALID_FOR'); ?>
		</td>
		<td> * </td>
		
	</tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model1,'Start Date :'); ?></td>
							<?php			
								$txtVoucherSD = date("Y-m-d");				
							?>				
		<td><?php echo $form->textField($model1,'START_DATE',array('size'=>30,'maxlength'=>100,'value'=>$txtVoucherSD)); ?>
		<?php echo $form->error($model1,'START_DATE'); ?>
		</td>
		<td>*</td>
		
	</tr>
	
	
	
	<tr>  		
		<td><?php echo $form->labelEx($model1,'End Date :'); ?></td>
		
							<?php
							if($txtVoucherED == '')
							{	
								$nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+20);
								$txtVoucherED = date("Y-m-d", $nextyear); 
							}
							?>
							
		<td><?php echo $form->textField($model1,'END_DATE',array('size'=>30,'maxlength'=>100,'value'=>$txtVoucherED)); ?>
		<?php echo $form->error($model1,'END_DATE'); ?>
		</td>
		<td>*</td>
		
	</tr>

	
	
	
	<tr>  		
		<td><?php echo $form->labelEx($model1,'Plan Title :'); ?></td>
		<td><?php echo $form->textField($model1,'STORE_PLAN_TITLE',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model1,'STORE_PLAN_TITLE'); ?>
		</td>
		<td>*</td>
		
    </tr>

	
	<tr>  		
		<td><?php echo $form->labelEx($model1,'Plan description :'); ?></td>
		<td><?php echo $form->textarea($model1,'STORE_PLAN_DESC',array('size'=>100,'maxlength'=>100)); ?>
		<?php echo $form->error($model1,'STORE_PLAN_DESC'); ?>
		</td>
		<td>  </td>
		
    </tr>
	
	<tr><td colspan="3"> (Note: if all operators are Unchecked, plan will applicable to all.)</td></tr>
	
	<tr> 	
		<td><?php echo $form->labelEx($model2,'Operators :'); ?></td>
		<td>  
		<?php echo $form->checkBoxList($model2,'OPERATOR_ID',CHtml::listData($operators,'OPERATOR_ID','OPERATOR'));?>
		</td>
		<td>  </td>	
	</tr>
	
	
	
	<tr>  		
		<td><?php echo $form->labelEx($model1,'Affiliate Id  :'); ?></td>
		<td><?php echo $form->textField($model1,'AFFILIATE_ID',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model1,'AFFILIATE_ID'); ?>
		</td>
		<td>  </td>
		
    </tr>

	<tr>  		
		<td><?php echo $form->labelEx($model1,'EUP :'); ?></td>
		<td><?php echo $form->textField($model1,'EUP',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model1,'EUP'); ?>
		</td>
		<td>  </td>
		
	</tr>

	<tr>  		
		<td><?php echo $form->labelEx($model1,'No. of attempts :'); ?></td>
		<td><?php echo $form->textField($model1,'NO_OF_ATTEMPTS',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model1,'NO_OF_ATTEMPTS'); ?>
		</td>
		<td>  </td>
		
	</tr>

	<tr>  		
		<td><?php echo $form->labelEx($model1,'Grace period  :'); ?></td>
		<td><?php echo $form->textField($model1,'GRACE_PERIOD',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model1,'GRACE_PERIOD'); ?>
		</td>
		<td>  </td>
		
	</tr>


	<tr>  		
		<td><?php echo $form->labelEx($model1,'Streaming  :'); ?></td>
		<td><?php echo $form->textField($model1,'STREAMING',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model1,'STREAMING'); ?>
		</td>
		<td>  </td>
		
	</tr>
	


    <tr><td colspan=3>&nbsp;</td></tr> 


    <tr>
		<td>&nbsp;</td>
		<td colspan="2">   		
			<?php echo CHtml::button('       Procced       ', array('submit' => array('TblPlanMaster/planadd')));?> 
		&nbsp;&nbsp;&nbsp;
			<?php echo CHtml::resetButton('          Reset          ', array('id'=>'form-reset-button')); ?>
		</td>
	</tr>
		

		
		
</table>
	  <?php $this->endWidget(); ?>
 </div><!-- form -->