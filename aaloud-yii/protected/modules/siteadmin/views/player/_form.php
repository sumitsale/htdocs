<?php
/* code for displaying success msg after login */
    Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
       CClientScript::POS_READY
    );
?>
 
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; 
/* Code for Success msg ends here */
?>




<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-home-qplayer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
<table>

		

          <?php 
		  
		  foreach($misc_query as $row)
					{
					$contentid=$row['CONTENTID'];
					
					}
				
					?>

<input type="hidden" name="content_id" value="<?php echo $contentid; ?>">

	

	<tr>
		<td><?php echo $form->labelEx($model,'CONTENTNAME'); ?></td>
		<td><?php echo $form->textField($model,'CONTENTNAME',array('size'=>40,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'CONTENTNAME'); ?>
		</td>
	</tr>

	

	<tr align="center">
		<td></td>
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Add to QuickPlay' : 'Save'); ?></td>
	</tr>
	
</table>
	&nbsp;&nbsp;
	
	
	
	<div>
	
 <table width="100%">
					<tbody>
					<tr>
						<th align="center"><h3>#</h3></th>
                        <th align="left"><h3>Content Title</h3></th>
                        <th align="center"><h3>Indate</h3></th>
						<th align="center"><h3>Priority</h3></th>
						<th align="center"><h3>Delete</h3></th>
                    </tr>

												
							
						<b>Page <?php echo $pages->getCurrentPage()+1; ?></b>

						<?php 
						$z=1;
						$j=($sample[0]-1)+5;
if($j>$item_count)
{
	$j=$item_count;
}
for($i=$sample[0]-1;$i<$j;$i++){


 ?>   			
				
				<tr>
				    <td align='center'><?php echo ++$k; ?></td>
					<td align='left'><?php echo $result[$i]['CONTENTNAME']; ?></td> 			
					<td align='center'><?php echo date("M d, Y",$result[$i]['INDATE']);?></td>
					<td align="center">				
					<?php echo CHtml::link('UP', CController::createUrl("player/priority?ppriority=up&id=".$result[$i]['PLAYERID']."&priority=".($z-1)), array('class'=>'report')); ?> &nbsp;
					<?php echo CHtml::link('DOWN', CController::createUrl("player/priority?ppriority=down&id=".$result[$i]['PLAYERID']."&priority=".($z+1)), array('class'=>'report')); ?> 
					</td> 
					
				
			
					<td align="center">				
					<?php echo Chtml::link('Delete','', array('submit'=>array('player/del'), 'params'=>array('id'=>$result[$i]['PLAYERID']), 'style'=>'cursor: pointer; text-decoration: none;',)); ?> 
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



