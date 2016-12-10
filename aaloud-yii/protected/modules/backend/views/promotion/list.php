<h1>Promotion</h1>
<div>
 <table width="100%">
					<tbody><tr>
						<th>Promotion Title</th>
                        <th>Promotion plan</th>
                        <th>Action</th>
                    </tr>

							
							
			<?php 
				foreach($result as $row){ 
				//print_r($result);exit;
				/*
				$result1= Yii::app()->db->createCommand()
				->select('a.PLAN_TITLE,b.STORE_PLAN_TITLE')
				->from('tbl_plan_master a')
				->join('tbl_store_plan b','a.PLAN_ID=b.PLAN_ID')
				->where('STORE_FRONT_ID=:id and a.PLAN_ID=:id1',array(':id'=>STORE_FRONT_ID,':id1'=>$row['PLAN_ID']))
				->queryAll();
				*/
				
				$result1= Yii::app()->db->createCommand()
				->select('a.PROMO_TITLE,b.PLAN_TITLE')
				->from('tbl_promotion a')
				->join('tbl_plan_master b','a.PLAN_ID=b.PLAN_ID')
				->where('STORE_FRONT_ID=:id and a.PLAN_ID=:id1',array(':id'=>STORE_FRONT_ID,':id1'=>$row['PLAN_ID']))
				->queryAll();
				
				$promo_title = $result1[0]['PROMO_TITLE'];
				$plan_title = $result1[0]['PLAN_TITLE'];
					
				
				?>
				
				<tr>
				    <td><?php echo $row['PROMO_TITLE']; ?></td>
                    <?php $row_id= $row['PROMO_ID'];?>
				    
				    <td align="center"><?php echo $plan_title; ?></td>
					<td align="center"><?php echo CHtml::link('Edit', CController::createUrl("Promotion/list?title=".$row['PROMO_TITLE']."&plan=".$row['PLAN_ID']."&id=".$row['PROMO_ID']), array('class'=>'report')); ?> |
                     <?php if($row['PROMO_STATUS']==0) 
					 { 
					  echo CHtml::link('Activate', CController::createUrl("Promotion/statuschange?mode=active&promo_id=".$row['PROMO_ID']."&promostatus=".$row['PROMO_STATUS']), array('class'=>'report'));
					  } 
					  else
					  { ?> <?php echo CHtml::link('Deactivate', CController::createUrl("Promotion/statuschange?mode=inactive&promo_id=".$row['PROMO_ID']."&promostatus=".$row['PROMO_STATUS']), array('class'=>'report')); 
					  }?>							</td>						
				</tr>
                <?php  
				}//while
				
				?>
				</tbody>
 </table>
</div>       
                
      
  <div>          
  <?php  // echo $this->renderPartial('/../promotion/add', array('model'=>$model,'model1'=>$model1,'plan_title'=>$plan_title,)); ?>          
   </div>  
   <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contactforminfo-form',
	'enableAjaxValidation'=>false,
)); 

?>
		<?php echo $form->errorSummary($model); ?>
 <?php //  echo $this->renderPartial('list', array('result'=>$result)); ?>     



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


 <table width="100%">
           <tbody><tr>
                    <td align="right"><?php echo CHtml::link('Add Promotion', CController::createUrl('Promotion/list'), array('class'=>'report')); ?> </td>
                </tr>
          </tbody></table>
          
          <table border="2" width="100%">
                <tbody><tr>
                    <td align="center" style="font-size: 12px; color: rgb(255, 0, 0);" colspan="3">Add/Edit Promotions Detail.</td>
                </tr>
                <tr>
                    <td align="right" width="130">Promotion Title :</td>
                    <td><?php echo $form->textField($model,'PROMO_TITLE',array('value'=>$title)); ?>
					<?php echo $form->error($model,'PROMO_TITLE'); ?>
					</td>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                 <tr> 
                    <td align="right" width="130">Plan For :</td>
                    
                    <td><?php 
					
					echo $form->dropDownList($model1,'PLAN_TITLE', CHtml::listData($plan_title1,'PLAN_ID','PLAN_TITLE'), array('prompt'=>'select Plan title','options'=>array($plan=>array('selected'=>'selected')))); ?>
					<?php echo $form->error($model1,'PLAN_TITLE'); ?>
					</td>
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
			
			
       
     
			
			