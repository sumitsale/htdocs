
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
						<td width="38%"><strong></strong></td> 
				</tr>
			
			
				
				
				
				<?php 	$oldmodule = "";
						
						$j=($sample[0]-1)+15;
if($j>$item_count)
{
	$j=$item_count;
}
for($i=$sample[0]-1;$i<$j;$i++){


 ?>   			
				
				
				
				
				
				<tr>
				    <td><?php if($oldmodule != $result[$i]['LOCATION']) echo ucwords(strtolower($result[$i]['LOCATION'])); ?></td>
                
                 
                 <td><?php 
								 
								 //echo CHtml::link($row['BANNER_MODULE'],"#", array("submit"=>array('Banner/edittitle', 'id'=>10), 'csrf'=>true));	

								 
echo Chtml::link(
   $result[$i]['BANNER_MODULE'], 
    '', 
    array(
         'submit'=>array('Banner/edittitle'), 
         'params'=>array('id'=>$result[$i]['LOCATION_ID']),
		 'style'=>'cursor: pointer; text-decoration: none;',
    )
);

								


								 
								// echo CHtml::link(''.$row['BANNER_MODULE'], CController::createUrl("Banner/edittitle?id=".$row['LOCATION_ID']), array('class'=>'report')); ?></td>
                 
				    <td><?php echo $result[$i]['BANNER_TITLE']." ".$result[$i]['BANNER_WIDTH'].' * '.$result[$i]['BANNER_HEIGHT']; ?></td>
                  
                  
                    <?php 
				
							/*		
							$result1=Yii::app()->db->createCommand()
								->select('UPDATED_ON')
								->from('tbl_aa_banner_storefront')
								->where('LOCATION_ID=:locationid',array(':locationid'=>$row['LOCATION_ID']))
								->queryAll();
											
									
									
	
					//print_r($result1);exit; 
					
					foreach($result1 as $rowUpdateon)
					{
					$updatedate=$rowUpdateon['UPDATED_ON'];
						 
					}*/
					?>
                    <?php /*	
                    $datetime = strtotime($updatedate);
					 $date_format = date('d M Y',$datetime); */ ?>
					<td><?php //echo $date_format; ?></td>  
                    

     
                        
                        					
				</tr>  
				<?php
					$oldmodule = $result[$i]['LOCATION'];
				}//while
				
				?>
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
 
