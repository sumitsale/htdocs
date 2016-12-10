<?php
$this->breadcrumbs = array(
    'Homeblocks',
);
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.form.js');
?>
<h1>Focus Home popup Selection</h1>

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


<?php
if (Yii::app()->user->hasFlash('success')):
  ?>
  <div class="flash-success">
    <?php echo Yii::app()->user->getFlash('success'); ?>
  </div>
<?php endif; ?>


<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.7.1.min.js"></script>
 <script type="text/javascript">
	
$(document).ready(function()
{
	 $("#videoondemand").click(function() 
		{
			//alert("v");
			$('#live').hide();
			$('#video').show();
			
		});
		
		 $("#liveevent").click(function() 
		{
			// alert("l");
			$('#live').show();
			$('#video').hide();
		});
		
	$("#takeartistid").click(function() {
	
		//	alert("Handler for .click() called.");
			var artistid = $("#TblHomepagePopup_artist_id").val();
			// alert(artistid);
			
			var dataString = 'artist_id='+ artistid;


				$.ajax
		({
			type: "POST",
			url: "<?php echo CController::createUrl("video/displaysubtag"); ?>",
			data: dataString,
			success: function(data) 
			{
			
					$('#videoList').html(data);
					
				
			}
        });
			
	});
		
		
		/*
		$('#TblHomepagePopup_image').bind('change', function() {
		
			var artistid = $("#TblHomepagePopup_artist_id").val();
			// alert(artistid);
			
			var dataString = 'artist_id='+ artistid;


				$.ajax
		({
			type: "POST",
			url: "<?php echo CController::createUrl("video/displaysubtag"); ?>",
			data: dataString,
			success: function(data) 
			{
			
					$('#videoList').html(data);
					
				
			}
        });
		
		});
		
		
		*/
});



 </script>
 
<table width="100%" border="1">
	<tr>
			<td id="videoondemand"><h2>video on demand</h2></td>
			<td id="liveevent"><h2>live event</h2></td>
	</tr>

</table>


<div id="video">
			<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'homepagepopupvideo-form',
					'enableAjaxValidation'=>false,
					'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
				)); ?>

				<table>
				<tr>
					<td>
					
		<input type="hidden" name="type" id="type" value="video" />
		<?php echo $form->hiddenField($model, 'artist_id'); ?> 
		<?php echo $form->labelEx($model,'artist_name'); ?></td>
		<td>
	
		
		<?php
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'name'=>'Hideartist[artistname]',
			//'attribute'=>'artist_name',
			'model'=>$model,
			//'value' => $model1->isNewRecord ? '': $model1->CONTENT_TITLE,
			'source'=>$this->createUrl('Topartists/autocompleteTest'),
			
				'options'=>array(
				'showAnim'=>'fold',
			        'select'=>"js:function( event, ui ) {
           $('#label').val(ui.item.label);
            $('#code').val(ui.item.code);
            $('#call_code').val(ui.item.call_code);
						 $('#TblHomepagePopup_artist_id').val(ui.item.id);
						
        }"
		),
	
			
	)		);  ?>
		
		
		
		
		
		
		<?php echo $form->error($model,'artistname'); ?></td>
		
		<td id="takeartistid"><input type="button" value="select video"></td>
		
		</tr>
		
		<tr>
			<td>
					<?php echo $form->labelEx($model,'image'); ?>
			</td>
		
			<td>
					<?php echo $form->fileField($model,'image',array('size'=>50,'maxlength'=>50)); ?>
			</td>
		
		
		</tr>	
		
		
		
		<tr>
				<td> <?php echo CHtml::label('Video List', 'videoList'); ?> </td>
				<td> <?php echo CHtml::dropDownList('videoList', NULL, array('Select a Video')); ?> </td>
		</tr>
		
		<tr>
				<td><?php echo CHtml::label('Top title', 'toptitle'); ?></td>
				<td><?php echo $form->textField($model,'toptitle',array('size'=>80,'maxlength'=>80)); ?></td>
		</tr>
		
		<tr>
				<td><?php echo CHtml::label('Bottom title', 'bottomtitle'); ?></td>
				<td><?php echo $form->textField($model,'bottomtitle',array('size'=>80,'maxlength'=>80)); ?></td>
		</tr>
		
		
		<tr colspan="2">
				<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save'); ?></td>
		</tr>
		
		</table>
			
			
			<?php $this->endWidget(); ?>
</div>

<div id="live" style="display:none">
			
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'homepagepopuplive-form',
					'enableAjaxValidation'=>false,
					'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
				)); ?>

				<table>
				<tr>
					<td>
					
		<input type="hidden" name="type" id="type" value="live" />
		
		<?php echo "Event name" ?></td>
		
		<td>
		<?php echo $form->textField($model,'artist_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'artistname'); ?></td>
		
		</tr>
		
		<tr>
			<td>
					<?php echo "Event image" ?>
			</td>
		
			<td>
					<?php echo $form->fileField($model,'image',array('size'=>20,'maxlength'=>20)); ?>
			</td>
		
		
		</tr>	
		
		
		<tr>
			<td><?php echo "Event url"; ?></td>
			
			<td><?php echo $form->textField($model,'video_url',array('size'=>80,'maxlength'=>80)); ?></td>
		</tr>
		
		<tr>
			<td><?php echo "Event ipad url"; ?></td>
			
			<td><?php echo $form->textField($model,'ipad_url',array('size'=>80,'maxlength'=>80)); ?></td>
		</tr>
		
		<tr>
			<td><?php echo "More link"; ?></td>
			
			<td><?php echo $form->textField($model,'event_url',array('size'=>80,'maxlength'=>80)); ?></td>
		</tr>
		
		
		<tr>
				<td><?php echo "Top title" ?></td>
				<td><?php echo $form->textField($model,'toptitle',array('size'=>80,'maxlength'=>80)); ?></td>
		</tr>
		
		<tr>
				<td><?php echo "Bottom title"; ?></td>
				<td><?php echo $form->textField($model,'bottomtitle',array('size'=>80,'maxlength'=>80)); ?></td>
		</tr>
		
		
		
		<tr colspan="2">
				<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save'); ?></td>
		</tr>
		
		</table>
			
			
			<?php $this->endWidget(); ?>
			
			
</div>

<script type="text/javascript">

function deletedata(id)
{
	//alert(id);
	
	var idnumber=id;
	
	var dataString = 'id='+ idnumber;


				$.ajax
		({
			type: "POST",
			url: "<?php echo CController::createUrl("Homepagepopup/delete"); ?>",
			data: dataString,
			success: function(data) 
			{
			if(data==200)
				{
					//$('#message').html("You are successfully register");
					//alert("password has been changed successfully");
					window.location.href=window.location.href;
				}
					
				
			}
        });
}

</script>

<br>
<br>
<br>
<h1>Manage popup list</h1></br>
<table width="100%">
		
		<tr>
			<td><h2>Artist/Event name</h2>
			</td>
			
			<td><h2>Type</h2></td>
			<td><h2>Delete</h2></td>
		</tr>
		
		
		<?php 
		
		for($i=0;$i<count($result);$i++) {?>
		<tr>
					<td><?php echo $result[$i]['artist_name']."(".$result[$i]['type'].")"; ?></td>
					<td><?php echo $result[$i]['type']; ?></td>
					<td><a href="javascript:void()" onClick="deletedata(<?php echo $result[$i]['id'];?>)">Delete</a> </td>
		</tr>
		<?php } ?>
	
</table>



<br>
<br>
<br>

<h1>Select publish popup</h1>
 <form method="post" id="select1popup" action="<?php echo $this->createUrl('Homepagepopup/select'); ?>" enctype="multipart/form-data">
<table width="100%">
		<tr>
			
			<td>select publish </td>
			<td>
			
			<select id="" name="defaultpopup"  >
							<option value="">select default popup</option>
							<!--<option value="Monday">Monday</option>-->
							
							<?php
								for ($i = 0; $i<count($result); $i++) { ?>
									
									<option value="<?php echo $result[$i]['id']; ?>"><?php echo $result[$i]['artist_name']; ?></option>
									
									
							<?php  } ?>
							
			</select>
			
			
			
			</td>
			<td><input type="submit" value="Submit" id="submit" /></td>
		
		</tr>
		
		<tr><br></tr>
		<tr>
			
			<td>publish popup</td>
			
			<td><?php if(isset($defaultpopup[0]))
			{ 
					echo $defaultpopup[0]['artist_name'];
			} 
				else
			{
					echo "No any default popup selected";
			}
				
				
			?>
			</td>
			
		</tr>
		
		
</table>
</form>




<form  method="post"  action="<?php echo $this->createUrl('Homepagepopup/generatxml'); ?>">




		<table>
				<tr>
					<td><input type="submit" value="Generate xml" id="submit" /></td>
				</tr>
		</table>
		
		
</form>


</br>
</br>
</br>
<h1>Hide/show homepage popup</h1>
<form  method="post"  action="<?php echo $this->createUrl('Homepagepopup/changepopupstatus'); ?>">




		<table width="100%">
				<tr>
					<td colspan="4">
					
						<input type="submit" value="Change Current status" id="submit" />
					
					</td>
				</tr>
				
				<tr>
						<td colspan="4">
							</br>
						</td>
				</tr>
				
				<tr>
					<td colspan="4">
					<h2>Current status   -    
					
					
					<?php
						
						 if (file_exists(Yii::app()->basePath . '/../xml/frontend/homepopupstatus.xml'))
						 {
							$currnetstatus=simplexml_load_file(Yii::app()->basePath . '/../xml/frontend/homepopupstatus.xml');
							
							// echo "<pre>";
							// print_r($currnetstatus);exit;
							
							if(isset($currnetstatus[0]))
							{
								echo $currnetstatus[0]."</h2>";
							}
						 }
						 else
						 {
							echo "no xml file generated";
						 }
					
					?>
					
					</td>
				
				</tr>
		</table>
		
		
</form>



