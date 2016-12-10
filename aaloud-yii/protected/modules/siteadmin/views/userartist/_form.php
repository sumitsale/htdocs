<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'userartist-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php //echo $form->errorSummary($model); ?>

	<table width="100%">
	
	<h3>Artist Details</h3>
	<?php /*
	<tr>
		<td><?php echo $form->labelEx($model,'USER_ID'); ?></td>
		<td><?php echo $form->textField($model,'USER_ID',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'USER_ID'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'USER_TYPE'); ?></td>
		<td><?php echo $form->textField($model,'USER_TYPE',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'USER_TYPE'); ?></td>
	</tr>


	<tr>
		<td><?php echo $form->labelEx($model,'BIO'); ?></td>
		<td><?php echo $form->textArea($model,'BIO',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'BIO'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'INSPIRATION'); ?></td>
		<td><?php echo $form->textArea($model,'INSPIRATION',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'INSPIRATION'); ?></td>
	</tr>

	
	
		<tr>
		<td><?php echo $form->labelEx($model,'BAND_NAME'); ?></td>
		<td><?php echo $form->textField($model,'BAND_NAME',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'BAND_NAME'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'GENRE'); ?></td>
		<td><?php echo $form->textField($model,'GENRE',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'GENRE'); ?></td>
	</tr>

	
	<tr>
		<td><?php echo $form->labelEx($model,'META_ARTIST_ID'); ?></td>
		<td><?php echo $form->textField($model,'META_ARTIST_ID',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'META_ARTIST_ID'); ?></td>
	</tr>
<?php /*
	<tr>
		<td><?php echo $form->labelEx($model,'USER_AGE'); ?></td>
		<td><?php echo $form->textField($model,'USER_AGE',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'USER_AGE'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'USER_GENDER'); ?></td>
		<td><?php echo $form->textField($model,'USER_GENDER',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'USER_GENDER'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'USER_CITY'); ?></td>
     	<td><?php echo $form->textField($model,'USER_CITY',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'USER_CITY'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'USER_COUNTRY'); ?></td>
		<td><?php echo $form->textField($model,'USER_COUNTRY',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'USER_COUNTRY'); ?></td>
	</tr>


	<tr>
		<td><?php echo $form->labelEx($model,'LAST_UPDATED'); ?></td>
		<td><?php echo $form->textField($model,'LAST_UPDATED'); ?>
		<?php echo $form->error($model,'LAST_UPDATED'); ?></tr>
	</tr>
	
	*/ ?>
	
	<?php for($i=0;$i<count($sql2);$i++)
	{ ?>
	
		<tr>
				<td>Email </td>
				<td></td>
		</tr>
		
		<tr>
				<td>Full Name </td>
				<td></td>
		</tr>
		
		<tr>
				<td>Mobile  </td>
				<td></td>
		</tr>
		
				<tr>
				<td>Artist City  </td>
				<td><?php echo $sql2[$i]['USER_CITY']; ?></td>
		</tr>
		
				<tr>
				<td>Artist Country  </td>
				<td><?php echo $sql2[$i]['USER_COUNTRY']; ?></td>
		</tr>
		
				<tr>
				<td>Band Name  </td>
				<td><?php echo $sql2[$i]['BAND_NAME']; ?></td>
		</tr>
		
				<tr>
				<td>Band Genre </td>
				<td><?php echo $sql2[$i]['GENRE']; ?></td>
		</tr>
		
				<tr>
				<td>Metasea Artist Id  </td>
				<td><?php echo $sql2[$i]['META_ARTIST_ID']; ?></td>
		</tr>
	
	<?php } ?>
	
	<tr colspan="3">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="hidden" name="id" value="<?php echo $id1; ?>">
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
	</tr>
	
	<tr>
			</br>
	</tr>
	</table>
	<h3>Uploaded Tracks</h3>
	<table width="100%">
	
				<tr>
					<td>Track Name</td>
					<td>Status</td>
					<td>Last Updated</td>
					<td>Upload Track</td>
				</tr>
				
				<?php if(count($sql)!=0)
				{ ?>
				
				<?php for($i=0;$i<count($sql);$i++)
				{ ?>
				
				<tr>
					<td><?php echo $sql[$i]['TRACK_NAME']; ?>
								</td>
					<td><?php if($sql[$i]['MODERATION_STATUS']==A) echo "Approved";  ?></td>
					<td><?php echo $sql[$i]['LAST_UPDATED']; ?></td>
					<td><?php echo $sql[$i]['TRACK_NAME']; ?></td>
				</tr>
				
				<?php } ?>
				
				<?php } else {
				echo "<tr><td colspan='4'><div align='center'>No Tracks Uploaded Previously</div></td></tr>";
				
				}?>
				
				<br>
	</table>

			<h3>Tracks Awaiting Moderation</h3>
			<table width="100%">
			
				<tr>
					<td>Track Name</td>
					<td>Moderation</td>
					<td>Uploaded On</td>
					<td>Approve</td>
					
				</tr>
			
			<?php if(count($sql1)!=0)
			{ ?>
			
			
			<?php for($i=0;$i<count($sql1);$i++)
				{ ?>
				
				<tr>
					<td><?php echo $sql1[$i]['TRACK_NAME']; ?>
								</td>
					<td><?php echo $sql1[$i]['MODERATION_STATUS']; ?></td>
					<td><?php echo date("M d, Y",$sql1[$i]['MODERATED_FILE_INDATE']); ?></td>
					<td>
			<?php echo CHtml::link('Approve', CController::createUrl("Userartist/statuschange?id=".$sql1[$i]['USER_TRACK_ID']), array('class'=>'report')); ?>
					</td>
					
				</tr>
				
				<?php } ?>
				
				<?php } else  {
				echo "<tr><td colspan='4'><div align='center'>No Tracks Uploaded</div></td></tr>";
				
				}?>
			
	
	

				<br>
	</table>
<?php $this->endWidget(); ?>

</div><!-- form -->