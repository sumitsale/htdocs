<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contactforminfo-form',
	'enableAjaxValidation'=>false,
)); 

?>

 <?php //  echo $this->renderPartial('list', array('result'=>$result)); ?>     



 <table width="100%">
           <tbody><tr>
                    <td align="right"><a href="add_edit_promotions.php">Add Promotions</a></td>
                </tr>
          </tbody></table>
          
          <table border="2" width="100%">
                <tbody><tr>
                    <td align="center" style="font-size: 12px; color: rgb(255, 0, 0);" colspan="3">Add/Edit Promotions Detail.</td>
                </tr>
                <tr>
                    <td align="right" width="130">Promotion Title :</td>
                    <td><?php echo $form->textField($model,'PROMO_TITLE'); ?></td>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                 <tr> 
                    <td align="right" width="130">Plan For :</td>
                    <td><?php echo $form->dropDownList($model1,'PLAN_TITLE', CHtml::listData($plan_title,'PLAN_ID','PLAN_TITLE'), array('prompt'=>'select Plan title')); ?></td>
                	<td>&nbsp;&nbsp;</td>
                 </tr>
                 <tr>
                    <td colspan="3">
                       <div align="center">
							<span class="row buttons">
								<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Submit'); ?>
							</span>
    						<span class="row buttons">
								<?php echo CHtml::resetButton('Reset', array('id'=>'form-reset-button')); ?>
							</span>
    					</div>
                    </td>   
                </tr>
            </tbody></table>
            
            
            <?php $this->endWidget(); ?>
			
			




