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




<table width="100%"; border="0">

<tr>
		<td colspan="3"  align="right"><?php echo CHtml::link('Add New Keyword', CController::createUrl("TBLSTOREFRONT/addnewkeyword"), array('class'=>'report')); ?>  </td>

</tr>

<tr>
<td>&nbsp;</td>
     <td>      Keyword    </td>
     
     <td>      Delete  </td>
     

</tr>
<?php foreach($sql as $row)
{ ?>
<tr>
<td>&nbsp;</td>
<td>   <?php  echo $row['keyword']; ?> </td>

<td><?php echo CHtml::link('Delete', CController::createUrl("TBLSTOREFRONT/deletekeyword?id=".$row['id']), array('class'=>'report')); }?></td>

</tr>

</table>