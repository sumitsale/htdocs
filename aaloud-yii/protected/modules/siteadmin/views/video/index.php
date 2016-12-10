
<script type="text/javascript">
	$(document).ready(function(){
		$('#yt0').click(function(){
			$('#TblGenres_GENRE_NAME, #TblLanguages_LANGUAGE_TITLE').val('');
		});
		$('#TblArtists_ARTIST_NAME').keyup(function(){
			$('#TblGenres_GENRE_NAME, #TblLanguages_LANGUAGE_TITLE').val('');
		});
	
		var defaultVideoURL = '<?php echo CController::createUrl('defaultvideo/displaySongMinorDetails'); ?>';
		$("#ContentDetails_CONTENT_TITLE").change(function(){
			$.post(defaultVideoURL, {'contentId':$(this).val()}, function(data) {
				$('#TblGenres_GENRE_NAME').val(data.GENRE_NAME);
				$('#TblLanguages_LANGUAGE_TITLE').val(data.LANGUAGE_TITLE);
			}, 'json');
		});
	});
</script>

<?php Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 15000).fadeOut("slow");',
       CClientScript::POS_READY
    );
 if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div><?php
 endif; ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'defaultvideo-form',
	'enableAjaxValidation'=>false,
	//'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	
	
)); ?>


<h1>Add Default Video </h1>

<table>
		<tr>
				
			<td>Artist</td>
				
			<td>
				<?php echo $form->hiddenField($model,'ARTIST_ID'); ?>
															
				<?php 
						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
										'name'=>'TblArtists[ARTIST_NAME]',
										'attribute'=>'ARTIST_NAME',
										'source'=>$this->createUrl('defaultvideo/autocompleteTest'),			
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
														array('defaultvideo/displaysubtag'),
														array(
														 'update'=>'#ContentDetails_CONTENT_TITLE',
															   )
													);
				?>
			</td>
	
		<tr>
			<td>Videos</td>
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
			<td>Language</td>
			<td>			
			  <?php echo $form->textField($language,'LANGUAGE_TITLE'); ?>
				<?php echo $form->error($language,'LANGUAGE_TITLE'); ?>
			</td>
		</tr>
			
		<tr>
			<td>
				<?php echo CHtml::submitButton($model->isNewRecord ? '  Add  ' : 'Save'); ?>
			</td>
		</tr>
							


		</tr>
	
</table>

<table>
		<tr>
				<div id="req_res02"></div>
		</tr>
</table>


<?php $this->endWidget(); ?>