
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




<h1>Videos List</h1>
<div>
<table width="100%">
           <tbody><tr>
                    <td align="right"><?php echo CHtml::link('Add Video', CController::createUrl('videos/create'), array('class'=>'report')); ?> </td>
                </tr>
          </tbody></table>

 <table width="100%">
					<tbody>
					<tr>
						<th align="center"><h3>#</h3></th>
                        <th align="left"><h3>Artist Name</h3></th>
                        <th align="center"><h3>VIDEO_DESC</h3></th>
						<th align="center"><h3>Date</h3></th>
						<th align="center"><h3>Status</h3></th>
						<th align="center"><h3>Edit | Delete</h3></th>
                    </tr>

									
							
					<?php 
				foreach($result as $row)
						{ 
					?>
				
				<tr>
				    <td align='center'><?php echo ++$i; ?></td>
					<td align='left'><?php echo $row['VIDEO_ARTIST_TITLE']; ?></td>
					<td align='left'><?php echo $row['VIDEO_DESC']; ?></td>    
					<td align='center'><?php echo date("M d, Y",$row['VIDEO_INDATE']);?></td>
					<td align="center">
					<?php if($row['VIDEO_STATUS']=='P') 
					 { 
					  echo Chtml::link('Hide','', array('submit'=>array('videos/statuschange'), 'params'=>array('id'=>$row['VIDEO_ID'],'status'=>$row['VIDEO_STATUS']), 'style'=>'cursor: pointer; text-decoration: none;',));
					  } 
					  else
					  { ?> <?php echo Chtml::link('Show','', array('submit'=>array('videos/statuschange'), 'params'=>array('id'=>$row['VIDEO_ID'],'status'=>$row['VIDEO_STATUS']), 'style'=>'cursor: pointer; text-decoration: none;',)); 
					  }?>	
					</td>	
				
					<td align="center">
										<?php echo Chtml::link('Edit','', array('submit'=>array('videos/update'), 'params'=>array('id'=>$row['VIDEO_ID']), 'style'=>'cursor: pointer; text-decoration: none;',)); ?> |
										<?php echo Chtml::link('Delete','', array('submit'=>array('videos/videolist'), 'params'=>array('id'=>$row['VIDEO_ID']), 'style'=>'cursor: pointer; text-decoration: none;',)); ?>
					</td> 
										 
				</tr>
				
                <?php  
				}
				
				?>
					</tbody>
 </table>
</div>       
                
                     
<?php $this->endWidget(); ?>
			    
</div><!-- form -->
			
			