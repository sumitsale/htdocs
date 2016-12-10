<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'footer-form',
	'enableAjaxValidation'=>false,
)); ?>


<?php 

?>


<table>
		<tr>
				<td colspan="3"  align="right">
				<?php echo CHtml::link('Add New', CController::createUrl("Footer/create"), array('class'=>'report')); ?>  
				</td>
        </tr>
</table>




		
			<table>
			
			<?php for($i=0;$i<count($sql);$i++)
				{ ?>
				<tr>
				<td><?php echo $sql[$i]['footer_section']?></td>
				<tr>
				
				<tr>
				<td><?php echo $sql[$i]['footer_section_url']?></td>
				</tr>
				
				<tr>
				<td><?php echo $sql[$i]['footer_section_text']?></td>
				</tr>
				
				<?php 
				if($sql[$i]['footer_section_image']){ ?>
						
						
					<tr>
					<td>
		<a target="_blank" href="<?php echo Yii::app()->baseUrl;?>/images/homefooter/<?php echo $sql[$i]['footer_section_id']; ?>/<?php echo $sql[$i]['footer_section_image'];?>"><?php echo "click image";  ?> </a>
					</td>
					</tr>	
					
						
						
					<?php }
				?>
				
				<?php 
				//echo "<tr><td><a href='homefooter_edit.php?blockId=".$rsp["footer_section_id"]."' target=_blank>Edit</a></td></tr>";
				?>
				
				<tr><td>
											<?php 
													echo Chtml::link(
						   Edit, 
							'', 
													array(
														 'submit'=>array('Footer/update'), 
														 'params'=>array('id'=>$sql[$i]['footer_section_id']),
														  'style'=>'cursor: pointer; text-decoration: none;',
													)
												);
													?>
							
							
							
								<?php echo "<tr><td><hr size='1'></td></tr>"; ?>
				
				<?php } ?>
				
				
				
				
				
			</table>			
							  

<?php $this->endWidget(); ?>

</div><!-- form -->