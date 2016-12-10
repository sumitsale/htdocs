<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'firstone-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php echo "First 1"."<br>"; ?>

<table width="100%">
				
	<tr>
		<td><?php echo "ARTIST ID"; ?></td>
		<td><?php echo $form->textField($model,'ARTIST_ID',array('size'=>25,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'ARTIST_ID'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Artist_Name'); ?></td>
		<td><?php echo $form->textField($model,'Artist_Name',array('size'=>25,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Artist_Name'); ?></td>
	</tr>

	<tr>
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
	</tr>
	
	
				</br>
</table>

<table width="100%">

			<tr>
					<td><?php echo "Artist Id"; ?></td>
					<td><?php echo "Artist Name"; ?></td>
					<td><?php echo "Action"?></td>
			</tr>
			
			
			
						<?php for($i=0;$i<count($sql);$i++)
						{ ?>

										<tr>
											<td><?php echo $sql[$i]['Artist_Id']; ?></td>
											<td><?php echo $sql[$i]['Artist_Name']; ?></td>
											<td>
											
											
												<?php 
													echo Chtml::link(
						   Delete, 
							'', 
													array(
														 'submit'=>array('firstone/delete'), 
														 'params'=>array('id'=>$sql[$i]['Artist_Id']), 'style'=>'cursor: pointer; text-decoration: none;',
													)
												);
													?>
											
											
											
											
											</td>
										</tr>

						<?php    
						} ?>
						
						
						
</table>



<?php $this->endWidget(); ?>

</div><!-- form -->