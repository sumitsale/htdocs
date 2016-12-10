<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'model-presskit-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	
	
)); ?>


					<table cellpadding="3" cellspacing="2" border="0" width="100%">
						<tr>
							<td  align="center" width="5%"><strong>#</strong></td>
							<td  align="left" width="35%">&nbsp;<strong>Artist</strong></td>
							<td  align="left" width="20%">&nbsp;<strong>File</strong></td>
							<td  align="left" width="15%">&nbsp;<strong>Date</strong></td>
							<td  align="center" width="10%"><strong>Status</strong></td>
							<td  align="center" width="15%"><strong>Edit | Delete</strong></td>

						</tr>
						
						
							<b>Page <?php echo $pages->getCurrentPage()+1; ?></b>

						<?php 
						$j=($sample[0]-1)+15;
if($j>$item_count)
{
	$j=$item_count;
}
for($i=($sample[0]-1);$i<$j;$i++){ 

$time=strtotime($result[$i]['Press_News_Date']);
?>   
						
						

						
						

						<?php /*foreach($result as $row)
						{   
						*/
						?>
						
						<tr>
							<td  align="center" width="5%"><?php echo ++$k;?></td>
							<td  align="left" width="35%">&nbsp;<?php echo stripslashes($result[$i]['Artist_Name']);?></td>
                            <td  align="left" width="20%">&nbsp;<a href="../uploads/presskit/<?php echo $row[Pdf_File];?>" target=_blank><?php echo $result[$i][Pdf_File];?></a></td>
                            <td  align="left" width="15%">&nbsp;<?php echo date("M d, Y",$result[$i][Press_Kit_Indate]);?></td>
							<?php /*<td  align="center" width="10%"><a href="presskit_list.php?id=<?php echo $row[Press_Kit_Id]?>&status=<?php echo $row[Press_Kit_Status]?>&resultpage=<?php echo $resultpage?>"><?=$sta?></a></td>  */ ?>
							<td>
							
							<?php if($result[$i]['Press_Kit_Status']=='P') 
					 { 
					  echo Chtml::link('Hide','', array('submit'=>array('Presskit/statuschange'), 'params'=>array('id'=>$result[$i]['Press_Kit_Id'],'status'=>$result[$i]['Press_Kit_Status']), 'style'=>'cursor: pointer; text-decoration: none;',));
					  } 
					  else
					  { ?> <?php echo Chtml::link('Show','', array('submit'=>array('Presskit/statuschange'), 'params'=>array('id'=>$result[$i]['Press_Kit_Id'],'status'=>$result[$i]['Press_Kit_Status']), 'style'=>'cursor: pointer; text-decoration: none;',)); 
					  }?>
							
								
							</td>
							<td  align="center" width="15%">
							
							
								
							<?php 
							echo Chtml::link(
   Edit, 
    '', 
    array(
         'submit'=>array('Presskit/update'), 
         'params'=>array('id'=>$result[$i]['Press_Kit_Id']),
		  'style'=>'cursor: pointer; text-decoration: none;',
    )
);
							?>
							
							
							
							<?php /*<?php echo CHtml::link('Edit', CController::createUrl("Presskit/update?id=".$row['Press_Kit_Id']), array('class'=>'report')); ?>  */?> |  
							
							
							<?php /*<?php echo CHtml::link('Delete', CController::createUrl("Presskit/presslist?id=".$row['Press_Kit_Id']), array('class'=>'report')); ?>
							*/ ?>
							
							<?php 
							echo Chtml::link(
   Delete, 
    '', 
    array(
         'submit'=>array('Presskit/presslist'), 
         'params'=>array('id'=>$result[$i]['Press_Kit_Id']),
		  'style'=>'cursor: pointer; text-decoration: none;',
    )
);
							?>
							
							
							</td>
						</tr>
						
						<?php } ?>


					</table>
					
					
					
					
					
					 <?php $this->widget('CLinkPager', array(
            'currentPage'=>$pages->getCurrentPage(),
            'itemCount'=>$item_count,
            'pageSize'=>$page_size,
            'maxButtonCount'=>10,
            'nextPageLabel'=>'Next &gt;',
            'header'=>'',
			//'htmlOptions'=>array('class'=>'pages'),
        )); ?>
					
					
					
					
					
					




<?php $this->endWidget(); ?>

</div><!-- form -->