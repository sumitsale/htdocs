<?php
$this->breadcrumbs=array(
	'Newrelease',
);?>




<script type="text/javascript">
	$(document).ready(function(){
		$('#yt0').click(function(){
			$('#TblGenres_GENRE_NAME, #TblLanguages_LANGUAGE_TITLE').val('');
		});
		$('#TblArtists_ARTIST_NAME').keyup(function(){
			$('#TblGenres_GENRE_NAME, #TblLanguages_LANGUAGE_TITLE').val('');
		});
	
		var newReleaseURL = '<?php echo CController::createUrl('newrelease/displaySongMinorDetails'); ?>';
		$("#ContentDetails_CONTENT_TITLE").change(function(){
			$.post(newReleaseURL, {'contentId':$(this).val()}, function(data) {
				$('#TblGenres_GENRE_NAME').val(data.GENRE_NAME);
				$('#TblLanguages_LANGUAGE_TITLE').val(data.LANGUAGE_TITLE);
			}, 'json');
		});
	});

				
		

	
	
</script>

			<script type="javascript">
			function updateFields(data){
			   $('#TblGenres_GENRE_NAME').html(data.value1);
			   $('#TblLanguages_LANGUAGE_TITLE').html(data.value2);
			</script>

			<script type="text/javascript">
				$(document).ready(function() {
					$("#sub").click(function() {
			//alert('hi');
			
			//var artist_id=$('#TblArtists_ARTIST_ID').val();

			var content_id=$('#ContentDetails_CONTENT_TITLE').val();
			var sel_op = $("#ContentDetails_CONTENT_TITLE option:selected").text();

			var leng = document.getElementById('ContentDetails_CONTENT_ID').options.length;

			var select = document.getElementById("ContentDetails_CONTENT_ID");
			
	
			var strValues = $('#ContentDetails_CONTENT_ID').children('option').map(function(i, e)
			{
			return e.value || e.innerText;
			}).get();
			var ind = strValues.indexOf(content_id);
			if(ind<0)
			{
				if(content_id>0)
				{
					$('#ContentDetails_CONTENT_ID').append(
						$('<option></option>').val(content_id).html(sel_op)
						
					);
				}
			}
			else
			{
			alert('This song is already exists in the list');
			}

			


			$('#TblGenres_GENRE_NAME, #TblLanguages_LANGUAGE_TITLE, #ContentDetails_CONTENT_TITLE, #TblArtists_ARTIST_NAME').val('');
			$('#ContentDetails_CONTENT_TITLE').empty().append('<option>Select a song</option>');


			});
				$("#del").click(function() {
				var sel = $("#ContentDetails_CONTENT_ID").val();
				for (i in sel) { 
					$("#ContentDetails_CONTENT_ID option[value='"+ sel[i] +"']").remove();
				};
					

			});
			});
		
			</script>
			
			
			
			
			<script type="text/javascript">
				$(document).ready(function() {
					$("#gen_xml").click(function() {
				   $("#ContentDetails_CONTENT_ID").each(function(){
            $("#ContentDetails_CONTENT_ID option").attr("selected","selected"); });
		

			});
			});
	
			</script>
			
			<?php 
			Yii::app()->clientScript->registerScript(
			'myHideEffect',
			'$(".flash-success").animate({opacity: 1.0}, 10000).fadeOut("slow");',
			CClientScript::POS_READY
			);
			if(Yii::app()->user->hasFlash('success')):?>
			<div class="flash-success">
				<?php echo Yii::app()->user->getFlash('success'); ?>
			</div>
			<?php endif; ?>	

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'newrelease-form',
	'enableAjaxValidation'=>false,
	//'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	
	
)); ?>


<h1>New Release</h1>


<table>
		<tr>
				
			<td>Artist</td>
				
			<td>
				<?php echo $form->hiddenField($model,'ARTIST_ID'); ?>
															
				<?php 
						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
										'name'=>'TblArtists[ARTIST_NAME]',
										'attribute'=>'ARTIST_NAME',
										'source'=>$this->createUrl('newrelease/autocompleteTest'),			
										'options'=>array(
														'showAnim'=>'fold',
														'select'=>"js:function( event, ui ) {
															$('#label').val(ui.item.label);
															$('#code').val(ui.item.code);
															$('#call_code').val(ui.item.call_code);
															$('#TblArtists_ARTIST_ID').val(ui.item.id);
														}"
													),
										)
									);
				?>
													 		
			</td>
				
			<td>
				<?php
						echo CHtml::ajaxSubmitButton(
													'Submit request',
														array('Newrelease/displaysubtag'),
														array(
														 'update'=>'#ContentDetails_CONTENT_TITLE',
															   )
													);
				?>
			</td>
			
		</tr>	
	
		<tr>
			<td>Song</td>
			<td>    
				<?php echo $form->dropDownList($model1,'CONTENT_TITLE', array() , array('prompt'=>'--please select song--')); ?>
				<?php echo $form->error($model1,'CONTENT_TITLE'); ?>
			</td>
		</tr>							
							
		<tr>
			<td>Genre</td>
			<td>
				<?php echo $form->textField($genre,'GENRE_NAME'); ?>
				<?php echo $form->error($genre,'GENRE_NAME'); ?>
			</td>
		</tr>

		<tr>
			<td>language</td>
			<td>			
			  <?php echo $form->textField($language,'LANGUAGE_TITLE'); ?>
			  <?php echo $form->error($language,'LANGUAGE_TITLE'); ?>
			</td>
		</tr>
			
		<tr>
			<td>
				<?php // echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save'); ?>
			

			  <input type="button" value="Add" id="sub"/>

		
	
			</td>
			
		</tr>
		
		<tr>
			<td>
	
			<?php //$rr = CHtml::listData(Contents::model()->findAll(), 'CONTENT_ID', 'CONTENT_CODE');
			//print_r($rr);exit;
			//echo $form->dropDownList($model1,'CONTENT_ID', CHtml::listData(Contents::model()->findAll(), 'CONTENT_ID', 'CONTENT_CODE'), array('empty'=>;'--please select--'));
			//echo $form->dropDownList($model1,'CONTENT_ID', $con_arr , array('multiple'=>'multiple', 'style'=>'height: 400px', 'style'=>'width: 300px')); ?>
			<select multiple="multiple" style="width: 300px" name="ContentDetails[CONTENT_ID][]" id="ContentDetails_CONTENT_ID">
						<?php
			for($i=0;$i<count($key_arr);$i++)
			{ ?>
			<option value="<?php echo $key_arr[$i]; ?>">
			<?php echo $val_arr[$i]; ?></option>
			<?php
			}
				?>
			</select>

			</td>
			<td> <input type="button" value="Delete" id="del"/></td>
		</tr>	
				
		<tr>
			<td>
			
				 <?php echo CHtml::submitButton('generate xml',array('id'=>'gen_xml')); ?>
			</td>
		</tr>
	
</table>





						
							
						
<?php $this->endWidget(); ?>