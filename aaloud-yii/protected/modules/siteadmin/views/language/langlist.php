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




<h1>Language List</h1>

&nbsp;&nbsp;

<div>


<table width="100%">
					<tbody>
					<tr>
						<th align="center"><h3>#</h3></th>
                        <th align="left"><h3>Language</h3></th>
                        <th align="center"><h3>Indate</h3></th>
						<th align="center"><h3>Priority</h3></th>
						<th align="center"><h3>Edit | Delete</h3></th>
                    </tr>

												
							
				

						<?php 
						$z=1;
						$j=($sample[0]-1)+10;
if($j>$item_count)
{
	$j=$item_count;
}
for($i=$sample[0]-1;$i<$j;$i++){


 ?>   			
				
				<tr>
				    <td align='center'><?php echo ++$k; ?></td>
					<td align='left'><?php echo $result[$i]['lang_name']; ?></td> 
					<td align='center'><?php echo date("M d, Y",$result[$i]['indate']);?></td>
					<td align="center">				
					<?php echo CHtml::link('UP', CController::createUrl("language/priority?ppriority=up&id=".$result[$i]['lang_id']."&priority=".($z-1)), array('class'=>'report')); ?> &nbsp;
					<?php echo CHtml::link('DOWN', CController::createUrl("language/priority?ppriority=down&id=".$result[$i]['lang_id']."&priority=".($z+1)), array('class'=>'report')); ?> 
					</td> 
					
				
			
					<td align="center">	

					<?php echo Chtml::link('Edit','', array('submit'=>array('language/update'), 'params'=>array('id'=>$result[$i]['lang_id']), 'style'=>'cursor: pointer; text-decoration: none;',)); ?> |
					<?php echo Chtml::link('Delete','', array('submit'=>array('language/del'), 'params'=>array('id'=>$result[$i]['lang_id']), 'style'=>'cursor: pointer; text-decoration: none;',)); ?> 
					</td> 
					
				</tr>
				
                <?php  
				   $z++;
				   
				}
				
				?>
					</tbody>
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
 
 
 
</div> 


<?php $this->endWidget(); ?>

</div><!-- form -->