<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'model-presskit-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	
	
)); ?>


					<table cellpadding="3" cellspacing="2" border="0" width="100%">
						<tr>
							<td  align="center" width="5%"><strong>#</strong></td>
							<td  align="left" width="35%">&nbsp;<strong>Band Name</strong></td>
							<td  align="left" width="20%">&nbsp;<strong>Track Moderation</strong></td>
							<td  align="center" width="15%"><strong>Edit</strong></td>

						</tr>

						<?php foreach($sql as $row)
						{   
						
						//print_r($row);exit;
						
						
						
						?>
						
						<tr>
							<td  align="center" width="5%"><?php echo ++$i;?></td>
							<td  align="left" width="35%">&nbsp;<?php echo stripslashes($row[BAND_NAME]);?></td>
                           
						   <?php 
						   
									$sql1=Yii::app()->db->createCommand()
										->select('*')
										->from('tbl_user_artist_tracks a')
										->where('a.MODERATION_STATUS=:m or a.MODERATION_STATUS=:a and a.USER_ID=:userid',array(':m'=>M,':a'=>A,':userid'=>$row['USER_ID']))
										->queryAll();
										
										//print_r($sql1);exit;
						   
						   
								
									
						   
						   ?>
						   
						   
						   
						   <td><?php 
						   
						   	foreach($sql1 as $row1)
									{
											if($row1[MODERATION_STATUS]=="M"){
												$Moderation_Status = "Y";
												}
												elseif($row1[MODERATION_STATUS]=="A"){	
													$Moderation_Status = "A";
												}
												else{
												$Moderation_Status = "NA";
													 }
													 
										
									}
						   
						   
						   
						   echo $Moderation_Status; ?></td>
						   <td></td>
                           
							<?php /*<td  align="center" width="10%"><a href="presskit_list.php?id=<?php echo $row[Press_Kit_Id]?>&status=<?php echo $row[Press_Kit_Status]?>&resultpage=<?php echo $resultpage?>"><?=$sta?></a></td>  */ ?>
						
								</tr>
						
						<?php } ?>


					</table>




<?php $this->endWidget(); ?>

</div><!-- form -->