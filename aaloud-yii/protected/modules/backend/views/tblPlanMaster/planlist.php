
<?php Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
       CClientScript::POS_READY
    );
 if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div><?php
 endif; ?>




<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	
)); ?>




<h1>Plan List</h1>
<div>
<table width="100%">
           <tbody><tr>
                    <td align="right"><?php echo CHtml::link('Add Plan', CController::createUrl('tblPlanMaster/planadd'), array('class'=>'report')); ?> </td>
                </tr>
          </tbody></table>
 <table width="100%">
					<tbody>
					<tr>
						<th align="center"><h3>Plan Title</h3></th>
                        <th align="center"><h3>Content Quantity</h3></th>
                        <th align="center"><h3>Plan Price</h3></th>
						<th align="center"><h3>Content Validity</h3></th>
						<th align="center"><h3>Valid For</h3></th>
						<th align="center"><h3>Edit</h3></th>
						<th align="center"><h3>Action</h3></th>
						
                    </tr>

									
							
						 <?php 
				
				
				foreach($result as $row){ 
				$result1= Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_store_plan p')
						->where('p.STEP_MASTER_PLAN_ID=:id and p.STORE_FRONT_ID=:id1 and p.PLAN_ID=:id2',array(':id'=>$row['PLAN_ID'],':id1'=>STORE_FRONT_ID,':id2'=>4))
						->order('p.PLAN_PRICE DESC')
						->queryAll();
						?>
				
				<tr>
				    <th align='left'><?php echo $row['PLAN_TITLE']; ?></th>
					<td align='center'><?php if($row['CONTENT_QTY']==99999) { echo "Unlimited"; }else { echo $row['CONTENT_QTY'];}?></td>                        
					<td align='center'><?php echo $row['PLAN_PRICE']; ?></td>
					<td align='center'><?php if($row['CONTENT_VALIDITY']==999) { echo "Unlimited"; }else { echo $row['CONTENT_VALIDITY'];}?></td> 
					<td align='center'><?php if($row['VALID_FOR']==999) { echo "Unlimited"; }else { echo $row['VALID_FOR'];}?></td> 
					
                    
				    
				    
					<td align="center"><?php echo CHtml::link('Edit', CController::createUrl('TblPlanMaster/editplan?id='.$row['STORE_PLAN_ID']), array('class'=>'report')); ?> </td> 
					<td align="center">
					<?php if($row['STATUS']==0) 
					 { 
					  echo CHtml::link('Activate', CController::createUrl("TblPlanMaster/statuschange?mode=active&store_id=".$row['STORE_PLAN_ID']."&status=".$row['STATUS']), array('class'=>'report'));
					  } 
					  else
					  { ?> <?php echo CHtml::link('Deactivate', CController::createUrl("TblPlanMaster/statuschange?mode=inactive&store_id=".$row['STORE_PLAN_ID']."&status=".$row['STATUS']), array('class'=>'report')); 
					  }?>	
					</td>						
				</tr>

				<?php
				
				//print_r($result1);exit;
				foreach($result1 as $row1)
			{
				?>
				<tr>
				<td align='center'>Step Charging (<?php echo $row['PLAN_TITLE'];?>)</strong></td>
                        <td align='center'><?php if($row1['CONTENT_QTY']==99999) { echo "Unlimited"; }else { echo $row1['CONTENT_QTY'];}?></td>                       
                        <td align='center'><?php echo $row1['PLAN_PRICE'];?></td>
						<!--<td align='center'><?php //echo $rs_voucher[START_DATE];?></td>
                        <td align='center'><?php //echo $rs_voucher[END_DATE];?></td>-->
                        <td align='center'><?php if($row1['CONTENT_VALIDITY']==999) { echo "Unlimited"; }else { echo $row1['CONTENT_VALIDITY'];}?></td>
                        <td align='center'><?php if($row1['VALID_FOR']==999) { echo "Unlimited"; }else { echo $row1['VALID_FOR'];}?></td>
						<td align="center"><?php echo CHtml::link('Edit', CController::createUrl('TblPlanMaster/editplan?id='.$row1['STORE_PLAN_ID']), array('class'=>'report')); ?> </td> 
						<td align="center">
					<?php if($row1['STATUS']==0) 
					 { 
					  echo CHtml::link('Activate', CController::createUrl("TblPlanMaster/statuschange?mode=active&store_id=".$row1['STORE_PLAN_ID']."&status=".$row1['STATUS']), array('class'=>'report'));
					  } 
					  else
					  { ?> <?php echo CHtml::link('Deactivate', CController::createUrl("TblPlanMaster/statuschange?mode=inactive&store_id=".$row1['STORE_PLAN_ID']."&status=".$row1['STATUS']), array('class'=>'report')); 
					  }?>	
					</td>		
				</tr>
				
				
				<?php
				}
				?>
                <?php  
				}
				
				?>
					</tbody>
 </table>
</div>       
                
                     
<?php $this->endWidget(); ?>
			    
</div><!-- form -->
			
			