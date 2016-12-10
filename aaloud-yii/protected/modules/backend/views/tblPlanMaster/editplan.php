
<div class="form">  
<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'user-form', 	
'enableAjaxValidation'=>false,
'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	 )); ?>
 	 	<?php 
		//--hard code to display value--//'value'=>$edit_result['CONTENT_VALIDITY']
		echo $form->errorSummary($model1); ?>
<table>

	<tr>
		<td colspan="3"><h1>Store Plans</h1></td>
	</tr>

	<tr>
		<td colspan="3">
	<p class="note"><b><span class="required">*</span> indicates all compulsary fields.</b></p>
		</td>
	</tr> 

	

    <tr><td colspan=3>&nbsp;</td>
		
	</tr> 
	
	
	
	
	<?php if($plan_id==4){?>
	
	<tr> 	
		<td><?php echo $form->labelEx($model1,'Plan Master :'); ?></td>
		<td><?php echo $form->dropDownList($model1,'STEP_MASTER_PLAN_ID',CHtml::listData($result,'PLAN_ID','PLAN_TITLE'), array('prompt'=>'Select Plan Master')); ?></td>
		<td> * </td>
			
	</tr> 
	
	<?php  } else {?>
	
	
	<tr> 	
		<td><?php echo $form->labelEx($model1,'Plan Master :'); ?></td>
		<td><?php echo $form->dropDownList($model1,'STEP_MASTER_PLAN_ID',CHtml::listData($result,'PLAN_ID','PLAN_TITLE'), array('prompt'=>'Select Plan Master')); ?></td>
		<td> * </td>
			
	</tr> 
	
	<?php  } ?>
	
	
	
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
		<td>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'TblStorePlan[START_DATE]',
			'model'=>$model1,
			'value'=>$model1->START_DATE,
			// additional javascript options for the date picker plugin
			'options'=>array(
			'dateFormat'=>'yy-m-d',
			'showAnim'=>'fold',
		
							),
			'htmlOptions'=>array(
			'style'=>'height:20px;',
			'readonly'=>'true' 

								),
));?>
	<?php echo $form->error($model1,'START_DATE'); ?>
		</td>
		<td> *</td>	
	</tr>
	
	
	
	
	
	
	<tr>  		
		<td><?php echo $form->labelEx($model1,'End Date :'); ?></td>
		<td><?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'TblStorePlan[END_DATE]',
			'model'=>$model1,
			'value'=>$model1->END_DATE,
			// additional javascript options for the date picker plugin
			'options'=>array(
			'dateFormat'=>'yy-m-d',
			'showAnim'=>'fold',
		
							),
			'htmlOptions'=>array(
			'style'=>'height:20px;',
			'readonly'=>'true' 

								),
							));?>
	<?php echo $form->error($model1,'END_DATE'); ?>
		</td>
		
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
		<td><?php echo $form->textarea($model1,'STORE_PLAN_DESC',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model1,'STORE_PLAN_DESC'); ?>
		</td>
		<td> * </td>
		
    </tr>
	
	
	<tr>
	<td colspan=3>
	(Note:Please use <PACKAGE> for Pack Name,<PRICE> for pack price, <DAYS> for days,<CURRENCY> for currency)</tr>
	</td>
	<tr>  		
		<td><?php echo $form->labelEx($model1,'First Time Subscription SMS :'); ?></td>
		<td><?php echo $form->textarea($model1,'SMS_FIRSTTIME',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model1,'SMS_FIRSTTIME'); ?>
		</td>
		<td>  </td>
    </tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model1,'Pre-renewal SMS :'); ?></td>
		<td><?php echo $form->textarea($model1,'SMS_PRE_RENEWAL',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model1,'SMS_PRE_RENEWAL'); ?>
		</td>
		<td> * </td>
    </tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model1,'Charging SMS :'); ?></td>
		<td><?php echo $form->textarea($model1,'SMS_CHARGING',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model1,'SMS_CHARGING'); ?>
		</td>
		<td> * </td>
		
    </tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model1,'Unsubscription SMS :'); ?></td>
		<td><?php echo $form->textarea($model1,'SMS_UNSUBSCRIPTION',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model1,'SMS_UNSUBSCRIPTION'); ?>
		</td>
		<td> * </td>
		
    </tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model1,'Failed SMS :'); ?></td>
		<td><?php echo $form->textarea($model1,'SMS_FAILED',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model1,'SMS_FAILED'); ?>
		</td>
		<td> * </td>
		
    </tr>
	
	<tr> <td colspan="3">(Note: if all operators are Unchecked, plan will applicable to all.)</td></tr>
	
	<tr> 	
		<td><?php echo $form->labelEx($model2,'Operators :'); ?></td>
		
		<td>  
		<?php  $arr_checked = array();
	
									foreach($operators as $data1)
									{
									$op_id = $data1['OPERATOR_ID'];
									if($Arr_operator[$op_id]['OPERATOR_ID'] == $data1['OPERATOR_ID'])
									{ ?>
								<tr>
                                    	<td style="padding-left:17px;"><?php echo $data1['OPERATOR']; ?></td>

   										
				<td align="center">
					<?php echo CHtml::link('Edit', CController::createUrl('TblPlanMaster/subeditplan?op_id='.$Arr_operator[$data1['OPERATOR_ID']]['OPERATOR_PLAN_ID'].'&id='.$id), array('class'=>'report')); ?> </td>								
										
				<td align="center">
					<?php if($Arr_operator[$data1['OPERATOR_ID']]['STATUS']==0) 
					 { 
					  echo CHtml::link('Activate', CController::createUrl("TblPlanMaster/statuschangeedit?mode=active&op_id=".$Arr_operator[$data1['OPERATOR_ID']]['OPERATOR_PLAN_ID']."&store_id=".$id."&status=".$Arr_operator[$data1['OPERATOR_ID']]['STATUS']), array('class'=>'report'));
					  } 
					  else
					  { ?> 
					  <?php echo CHtml::link('Deactivate', CController::createUrl("TblPlanMaster/statuschangeedit?mode=inactive&op_id=".$Arr_operator[$data1['OPERATOR_ID']]['OPERATOR_PLAN_ID']."&store_id=".$id."&status=".$Arr_operator[$data1['OPERATOR_ID']]['STATUS']), array('class'=>'report')); 
					  }?>
					  </td>
										
										
										
										
										
										
										
										
										
										
										
										
								</tr>
									
					<?php			
									}
									
																	
									}
									
								
							?>
								  <tr><td>
								  <?php echo $form->checkBoxList($model2,'OPERATOR_ID',CHtml::listData($uncheck_array,'OPERATOR_ID','OPERATOR'));?>
								  </td><td>&nbsp;</td></tr>
							
						
		</td>
		<td> </td>	
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
	

    <tr><td>&nbsp;</td><td>&nbsp;</td>
		<td>  </td>
	</tr> 


    <tr>
		<td>&nbsp;</td>
		<td colspan="2">    		
		<?php echo CHtml::submitButton($model1->isNewRecord ? 'Proceed' : '          Update          '); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
       <?php echo CHtml::resetButton('          Reset          ', array('id'=>'form-reset-button')); ?>		
		
	
		</td>
	</tr>
		
		
		
</table>
	  <?php $this->endWidget(); ?>
 </div><!-- form -->
 			
