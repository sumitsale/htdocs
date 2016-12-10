<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>




<h1>Plan List</h1>
<div>
<table width="100%">
           <tbody><tr>
                    <td align="right"><?php echo CHtml::link('Add Plan', CController::createUrl('tblPlanMaster/planadd'), array('class'=>'report')); ?> </td>
                </tr>
          </tbody></table>
 <table width="100%">
					<tbody><tr>
						<th>Plan Title</th>
                        <th>Content Quantity</th>
                        <th>Plan Price</th>
						<th>Content Validity</th>
						<th>Valid For</th>
						<th>Edit</th>
						<th>Action</th>
						
                    </tr>

									
							
						 <?php 
				/*
				$oldmodule = "";
				foreach($result as $row){ 
				?>
				
				<tr>
				    <td><?php echo $row['PROMO_TITLE']; ?></td>
                    <?php $row_id= $row['PROMO_ID'];?>
				    
				    <td align="center"><?php echo $row['PLAN_TITLE']; ?></td>
					<td align="center"><?php echo CHtml::link('Edit', CController::createUrl("Promotion/list?title=".$row['PROMO_TITLE']."&plan=".$row['PLAN_ID']), array('class'=>'report')); ?> | 	<?php echo CHtml::link('Deactivate', CController::createUrl("Promotion/list?title=".$row['PROMO_ID']."&plan=".$row['PLAN_ID']), array('class'=>'report')); ?>							</td>						
				</tr>
                <?php  
				}//while
				*/
				?>
				</tbody>
 </table>
</div>       
                
         

     

 
            
            
<?php $this->endWidget(); ?>
			
			
       
</div><!-- form -->
			
			