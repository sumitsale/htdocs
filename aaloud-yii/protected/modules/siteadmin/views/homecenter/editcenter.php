<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'model-homecenter-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
)); ?>

<?php /*
<table>
		<tr>
				<td colspan="3"  align="right">
				<?php echo CHtml::link('Add New Keyword', CController::createUrl("Homecenter/create"), array('class'=>'report')); ?>  
				</td>
        </tr>
</table>

*/ ?>

<table width="100%">
		<?php for($i=0;$i<count($sql);$i++)
		{ ?>
		
		<tr>
			<td><?php echo $sql[$i]['center_section'];?></td>
		</tr>
		
		<tr>
			<td><?php echo $sql[$i]['center_section_url'];?></td>
		</tr>
		
		<tr>
			<td><?php echo $sql[$i]['center_section_text'];?></td>
		</tr>
		
		
		<?php /*if($sql[$i]['center_section_image']){
						echo "<tr><td><a href='../uploads/homecenter/".$sql[$i]['center_section_image']."' target=_blank>Click Image</a></td></tr>";
					} 
					*/
		?>
		
		<tr>
		<td>
		<a target="_blank" href="<?php echo Yii::app()->baseUrl;?>/images/homecenter/<?php echo $sql[$i]['center_section_id']; ?>/<?php echo $sql[$i]['center_section_image'];?>"><?php echo "click image";  ?> </a>
		</td>
		</tr>
		<?php /*
		echo "<tr><td><a href='homecenter_edit.php?blockId=".$sql[$i]['center_section_id']."' target=_blank>Edit</a></td></tr>";
					echo "<tr><td><hr size='1'></td></tr>";
		*/?>
		
		<tr>
		
		<td><?php //echo CHtml::link('Edit', CController::createUrl("Homecenter/update?id=".$sql[$i]['Press_Kit_Id']), array('class'=>'report'));  ?>
		<?php 
							echo Chtml::link(
   Edit, 
    '', 
    array(
         'submit'=>array('Homecenter/update'), 
         'params'=>array('id'=>$sql[$i]['center_section_id']),
		  'style'=>'cursor: pointer; text-decoration: none;',
    )
);
							?>
							<input type="hidden" name="id" value="<?php echo $sql[$i]['center_section_id']; ?>">
		</td>
		</tr>
		
		<?php echo "<tr><td><hr size='1'></td></tr>"; ?>
		
<?php } ?>

</table>



<?php $this->endWidget(); ?>

</div><!-- form -->