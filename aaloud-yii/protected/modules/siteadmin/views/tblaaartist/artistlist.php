<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'model-presskit-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	
	
)); ?>


					<table cellpadding="3" cellspacing="2" border="0" width="100%">
						<tr>
							<td  align="center" width="5%"><strong>Artist Id</strong></td>
							<td  align="left" width="35%">&nbsp;<strong>Artist Title</strong></td>
							<td  align="left" width="20%">&nbsp;<strong>Artist BG Image</strong></td>
							<td  align="left" width="15%">&nbsp;<strong>Create Date</strong></td>
							<td  align="left" width="15%">&nbsp;<strong>Last Update</strong></td>
							
							<td  align="center" width="10%"><strong>Action</strong></td>
					

						</tr>
						
						<b>Page <?php echo $pages->getCurrentPage()+1; ?></b>

						<?php 
						$j=($sample[0]-1)+15;
if($j>$item_count)
{
	$j=$item_count;
}
for($i=$sample[0]-1;$i<$j;$i++){ ?>   
						
						
						<?php /*foreach($artistlist as $row)
						{   
						
						
						
						*/
						
						?>
						
						<tr>
							<td align='center'><?php echo $artistlist[$i]['Artist_Id'];?></td>
							<td  align="left" width="35%"><?php echo $artistlist[$i]['Artist_Name'];?></td>
                           
						   
						   
						   <td>
							<?php /*
							<?php if($artistlist[$i]['Artist_Status']=='P') 
					 { 
					 echo Chtml::link('Hide','', array('submit'=>array('Tblaaartist/statuschange'), 'params'=>array('id'=>$artistlist[$i]['Artist_Id'],'status'=>$artistlist[$i]['Artist_Status']), 'style'=>'cursor: pointer; text-decoration: none;',));
					  } 
					  else
					  { ?> <?php  echo Chtml::link('Show','', array('submit'=>array('Tblaaartist/statuschange'), 'params'=>array('id'=>$artistlist[$i]['Artist_Id'],'status'=>$artistlist[$i]['Artist_Status']), 'style'=>'cursor: pointer; text-decoration: none;',)); 
					  }?>
					  */ ?>
					  
					  <a target="_blank" href="<?php echo Yii::app()->baseUrl;?>/images/artist/<?php echo $artistlist[$i]['Artist_Id'];?>/<?php echo $artistlist[$i]['Artist_Bgimage']; ?>"><?php echo $artistlist[$i]['Artist_Bgimage'];   ?> </a>
							
							</td>
												
							
							
							 <td  align="left" width="15%">&nbsp;<?php echo date("M d, Y",$artistlist[$i]['Artist_Indate']);?></td>
						   
						   
						   
						   
						   
                            <td  align="left" width="15%">&nbsp;<?php echo date("M d, Y",$artistlist[$i]['Artist_LastUpdate']);?></td>
							<?php /*<td  align="center" width="10%"><a href="presskit_list.php?id=<?php echo $row[Press_Kit_Id]?>&status=<?php echo $row[Press_Kit_Status]?>&resultpage=<?php echo $resultpage?>"><?=$sta?></a></td>  */ ?>
							
							<td  align="center" width="15%">
							
							
							
								<?php 
							echo Chtml::link(
   'Edit', 
    '', 
    array(
         'submit'=>array('Tblaaartist/update'), 
         'params'=>array('id'=>$artistlist[$i]['Artist_Id']),
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
			'cssFile'=>Yii::app()->theme->baseUrl.'/css/pager.css',
			//'htmlOptions'=>array('class'=>'pages'),
        )); ?>




<?php $this->endWidget(); ?>

</div><!-- form -->