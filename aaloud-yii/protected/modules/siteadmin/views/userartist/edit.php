<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'userartist-form',
	'enableAjaxValidation'=>false,
)); ?>


<table width="100%">
	
	<h3>Artist Details</h3>
	
	<?php for($i=0;$i<count($sql2);$i++)
	{ ?>
	
		<tr>
				<td>Email </td>
				
				<?php $email=Yii::app()->db->createCommand()
						->selectdistinct('*')
						->from('a_users')
						->where('A_USER_ID=:userid',array(':userid'=>$sql2[$i]['USER_ID']))
						->queryAll();
				
				
				?>
				<td><?php if(isset($email[0]['A_EMAIL_ID'])) { echo $email[0]['A_EMAIL_ID'];} 
				else
				{
				}
				
				?></td>
		</tr>
		
		<tr>
				<td>Full Name </td>
				<td>
				<?php 
				if(isset($email[0]['A_FIRST_NAME']))
				{
				echo $email[0]['A_FIRST_NAME'];
				}
				if(isset($email[0]['A_LAST_NAME']))
				{
				echo $email[0]['A_LAST_NAME'];
				}
				?>
				
				
				
				</td>
		</tr>
		
		<tr>
				<td>Mobile  </td>
				<td>
				<?php 
				if(isset($email[0]['A_MOBILE_NO']))
				{
				echo $email[0]['A_MOBILE_NO'];
				}
				
				?>
				</td>
		</tr>
		
				<tr>
				<td>Artist City  </td>
				<td><?php echo $sql2[$i]['USER_CITY']; ?></td>
		</tr>
		
				<tr>
				<td>Artist Country  </td>
				<td><?php echo $sql2[$i]['USER_COUNTRY']; ?></td>
		</tr>
		<!--
				<tr>
				<td>Band Name  </td>
				<td><?php echo substr($sql2[$i]['BAND_NAME'],0,25); ?></td>
		</tr>
		
				<tr>
				<td>Band Genre </td>
				<td><?php echo substr($sql2[$i]['GENRE'],0,25); ?></td>
		</tr>
		
				<tr>
				<td>Metasea Artist Id  </td>
				<td><?php echo $sql2[$i]['META_ARTIST_ID']; ?></td>
		</tr>
	-->
	<?php } ?>

	<tr colspan="3">
		
		<?php /*
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td> */ ?>
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
					<!--<td>Last Updated</td>-->
					<td>Uploaded On</td>
					<td>Moderated On</td>
					<td>Disapprove</td>
					<td>Download</td>
				</tr>
				
				<?php if(count($sql)!=0)
				{ ?>
				
				<?php for($i=0;$i<count($sql);$i++)
				{ ?>
				
				<tr>
					<td><?php echo substr($sql[$i]['TRACK_NAME'],0,25); ?>
								</td>
					<td><?php if($sql[$i]['MODERATION_STATUS']=="A") echo "Approved";  ?></td>
					<td>
					<?php  echo date("d/m/y : H:i:s",$sql[$i]['TRACK_INDATE']);?>
					</td>
					<td>
					<?php echo date("d/m/y : H:i:s",$sql[$i]['MODERATED_FILE_INDATE']);?>
					</td>
					
					<!--<td><?php echo date("D m,Y",$sql[$i]['LAST_UPDATED']); ?></td>-->
					
					<!--
					<td><?php echo $sql[$i]['TRACK_NAME']; ?></td>-->
					<td>	

	
							<?php 
							
							echo Chtml::link(
						   'disapprove', 
							'', 
							array(
								 'submit'=>array('Userartist/edit'), 
								 'params'=>array('id4'=>$sql[$i]['USER_TRACK_ID'],'id'=>$id,'id1'=>$id1),
								  'style'=>'cursor: pointer; text-decoration: none;',
							)
						);
									
							?>		
									
									
			
					</td>
					
					<td>
					
						<?php 
				
				$pos = strpos($sql[$i]['TRACK_FILE'],"WP");
				
				if($pos === false) { ?>
					
					
		<a target="_blank" href="<?php echo Yii::app()->baseUrl;?>/uploads/tracks/<?php echo $sql[$i]['TRACK_FILE'];?>"><?php echo "Download"; ?> </a>
					
					
					
			<?php } else { ?>
				
				<a target="_blank" href="http://124.153.73.6/awap/uploads/tracks/<?php echo $sql[$i]['TRACK_FILE'];?>"><?php echo "Download"; ?> </a>
				
				<?php } ?>
					
					
					</td>
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
					<td>Disapprove</td>
					<td>Download</td>
					
				</tr>
			
			<?php if(count($sql1)!=0)
			{ ?>
			
			
			<?php for($i=0;$i<count($sql1);$i++)
				{ ?>
				
				<tr>
					<td><?php echo substr($sql1[$i]['TRACK_NAME'],0,25); ?>
								</td>
					<td><?php if($sql1[$i]['MODERATION_STATUS']=='M')
					
					echo "Pending"; ?></td>
					<td>	<?php  echo date("d/m/y : H:i:s",$sql1[$i]['TRACK_INDATE']);?></td>
				
					<td>
					
					
			<?php  /*echo CHtml::link('Approve', CController::createUrl("Userartist/edit?id3=".$sql1[$i]['USER_TRACK_ID']), array('class'=>'report')); */ ?>
			
			<?php //echo $form->labelEx($model1,'MODERATION_STATUS');?>
			<?php //echo $form->radioButtonList($model1,'MODERATION_STATUS',array('A'=>"Aprove",'D'=>"Disaprove")); ?>
			<?php //echo $form->error($model1,'MODERATION_STATUS'); ?>
			
			
			<?php 
			echo Chtml::link(
   'approve', 
    '', 
    array(
         'submit'=>array('Userartist/edit'), 
         'params'=>array('id3'=>$sql1[$i]['USER_TRACK_ID'],'id'=>$id,'id1'=>$id1,'email'=>$email[0]['A_EMAIL_ID'],'fname'=>$email[0]['A_FIRST_NAME']),
		  'style'=>'cursor: pointer; text-decoration: none;',
    )
);
			
	?>	</td>
	

<td>	

	
	<?php 
	
	echo Chtml::link(
   'disapprove', 
    '', 
    array(
         'submit'=>array('Userartist/edit'), 
         'params'=>array('id4'=>$sql1[$i]['USER_TRACK_ID'],'id'=>$id,'id1'=>$id1,'email'=>$email[0]['A_EMAIL_ID'],'fname'=>$email[0]['A_FIRST_NAME']),
		  'style'=>'cursor: pointer; text-decoration: none;',
    )
);
			
	?>		
			
			
			
					</td>
					<td>
					
					
					<?php 
				
				$pos = strpos($sql1[$i]['TRACK_FILE'],"WP");
				
				if($pos === false) { ?>
					
					
					 <a target="_blank" href="<?php echo Yii::app()->baseUrl;?>/uploads/tracks/<?php echo $sql1[$i]['TRACK_FILE'];?>"><?php echo "Download"; ?> </a>
						
					<?php } else { ?>
				
				<a target="_blank" href="http://124.153.73.6/awap/uploads/tracks/<?php echo $sql1[$i]['TRACK_FILE'];?>"><?php echo "Download"; ?> </a>
				
				<?php } ?>
					
	                </td>
				</tr>
				
				<?php } ?>
				
				<?php } else  {
				echo "<tr><td colspan='5'><div align='center'>No Tracks Uploaded</div></td></tr>";
				
				}?>
			
	
	

				<br>
	</table>
<?php $this->endWidget(); ?>

</div><!-- form -->