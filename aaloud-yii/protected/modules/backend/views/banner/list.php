
 <?php 
			Yii::app()->clientScript->registerScript(
			'myHideEffect',
			'$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
			CClientScript::POS_READY
			);
			if(Yii::app()->user->hasFlash('success')):?>
			<div class="flash-success">
				<?php echo Yii::app()->user->getFlash('success'); ?>
			</div>
			<?php endif; ?>





<?php
$this->breadcrumbs=array(
	'Banners',
);


?>
<table  width="100%"; border="0">
        <tr>
        		<td colspan="3"  align="right"><?php echo CHtml::link('Add New Banner', CController::createUrl("Banner/addbanner"), array('class'=>'report')); ?>  </td>
        </tr>

</table>

<h1>Banners</h1>

 <table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
				    <td width="24%"><strong>Module</strong></td>
				    <td width="38%"><p><strong>Title</strong></p>    </td>
				    <td width="38%"><strong>Width * Height</strong></td>  
						<td width="38%"><strong>Updated On</strong></td> 
				</tr>
				<?php 
				$oldmodule = "";
				foreach($result as $row){ 
				
				
				?>
				<tr>
				    <td><?php if($oldmodule != $row['LOCATION']) echo ucwords(strtolower($row['LOCATION'])); ?></td>
                
                 
                 <td><?php echo CHtml::link(''.$row['BANNER_MODULE'], CController::createUrl("Banner/edittitle?id=".$row['LOCATION_ID']), array('class'=>'report')); ?></td>
                 
				    <td><?php echo $row['BANNER_TITLE']." ".$row['BANNER_WIDTH'].' * '.$row['BANNER_HEIGHT']; ?></td>
                  
                  
                    <?php 
				
									
							$result1=Yii::app()->db->createCommand()
								->select('UPDATED_ON')
								->from('tbl_banner_storefront')
								->where('LOCATION_ID=:locationid and STORE_FRONT_ID=:id1',array(':locationid'=>$row['LOCATION_ID'] ,':id1'=>1))
								->queryAll();
											
									
									
	
					//print_r($result1);exit; 
					
					foreach($result1 as $rowUpdateon)
					{
					$updatedate=$rowUpdateon['UPDATED_ON'];
						 
					}
					?>
                    <?php
                    $datetime = strtotime($updatedate);
					 $date_format = date('d M Y',$datetime); ?>
					<td><?php echo $date_format; ?></td>  
                    

     
                        
                        					
				</tr>  
				<?php
					$oldmodule = $row['LOCATION'];
				}//while
				
				?>
				</table>
