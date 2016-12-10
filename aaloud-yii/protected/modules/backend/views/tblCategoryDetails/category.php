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
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>




<h1>CATEGORIES</h1>
<div>



                
                                         <table width="100%">
                           <tbody><tr>
                                    <td align="left"><?php echo CHtml::link('Add a Category', CController::createUrl(			                 'tblCategoryDetails/categoryadd'), array('class'=>'report')); ?> </td>
                                </tr>
                          </tbody></table>   
                
                     
                        <tr><td>&nbsp;</td><td>&nbsp;</td>
                            <td>  </td>
                        </tr> 
                 
                        
                      <table width="100%">
                           <tbody><tr>
                                    <td align="left"><?php echo CHtml::link('Create XML ', CController::createUrl('tblCategoryDetails/category'), array('class'=>'report')); ?> </td>
                                </tr>
                          </tbody></table>  





					

 <table width="100%">
					<tbody>
					<tr>
						<th align='center'>Category</th>
                        <th align='center'>Content Type</th>
                        <th align='center'>Priority</th>
						<th align='center'>Edit</th>
						<th align='center'>Active/In-Active</th>	
                    </tr>

									
							
				<?php 
				
				foreach($result as $row){
			
				?>
				
				<tr>
					 <td align='center'><?php echo CHtml::link(''.$row['CATEGORY'], CController::createUrl("TblCategoryDetails/category?parent_id=".$row['CATEGORY_ID']."&catid=".$row['PARENT_ID']), array('class'=>'report')); ?></td>
					
					<td align='center'><?php echo $row['ALBUM_TYPE_NAME']; ?></td>             <td align='center'><?php echo $row['PRIORITY']; ?></td>
					

					<td align="center"><?php echo CHtml::link('Edit', CController::createUrl('TblCategoryDetails/categoryedit?catid1='.$row['CATEGORY_DETAILS_ID'].'&catid2='.$row['CATEGORY_ID']."&parent_id=".$parent_id."&catid=".$catid), array('class'=>'report')); ?> </td> 
					

					<td align="center">
					<?php if($row['STATUS']==0) 
					 { 
					  echo CHtml::link('Activate', CController::createUrl("TblCategoryDetails/statuschange?mode=active&catedetails_id=".$row['CATEGORY_DETAILS_ID']."&status=".$row['STATUS']."&parent_id=".$parent_id."&catid=".$catid), array('class'=>'report'));
					  } 
					  else
					  { ?> <?php echo CHtml::link('InActivate', CController::createUrl("TblCategoryDetails/statuschange?mode=inactive&catedetails_id=".$row['CATEGORY_DETAILS_ID']."&status=".$row['STATUS']."&parent_id=".$parent_id."&catid=".$catid), array('class'=>'report')); 
					  }?>	
					</td>					
				</tr>
				
				<?php  
				}
				
				?>
				</tbody>
 </table>
</div>       
         
		<tr><td>&nbsp;</td><td>&nbsp;</td>
			<td>  </td>
		</tr> 


	<?php /*	 
				
      <table width="100%">
           <tbody><tr>
                    <td align="left"><?php echo CHtml::link('Add a Category', CController::createUrl('tblCategoryDetails/categoryadd?parent_id='.$parent_id), array('class'=>'report')); ?> </td>
                </tr>
          </tbody></table>   

     
		<tr><td>&nbsp;</td><td>&nbsp;</td>
			<td>  </td>
		</tr> 
 
        
	  <table width="100%">
           <tbody><tr>
                    <td align="left"><?php echo CHtml::link('Create XML ', CController::createUrl('tblCategoryDetails/category'), array('class'=>'report')); ?> </td>
                </tr>
          </tbody></table>  


*/?>



		
            
<?php $this->endWidget(); ?>
			
			
       
</div><!-- form -->
			
			