<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-home-video-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<table>
	<tr>
		<td><?php echo $form->labelEx($model,'Artist Name'); ?></td>
		<td><?php echo $form->textField($model,'VIDEO_ARTIST_TITLE',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'VIDEO_ARTIST_TITLE'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Video Path'); ?></td>
		<td><?php echo $form->textField($model,'VIDEO_FILE',array('size'=>100,'maxlength'=>350)); ?>
		<?php echo $form->error($model,'VIDEO_FILE'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Video Desc'); ?></td>
		<td><?php echo $form->textField($model,'VIDEO_DESC',array('size'=>100,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'VIDEO_DESC'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Image Upload (107x125):'); ?></td>
		<td><?php echo $form->fileField($model,'VIDEO_IMAGE',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'VIDEO_IMAGE'); ?>
		
		<div>
		<a target="_blank" href="<?php echo Yii::app()->baseUrl;?>/images/videos/<?php echo $row['VIDEO_IMAGE'];?>"><?php echo $row['VIDEO_IMAGE'];   ?> </a>
		 </div>
		 
		</td>
	</tr>

	

	<tr align="center">
		
		<td> </td>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<td><?php echo CHtml::submitButton($model->isNewRecord ? '   Add Video   ' : '  Update Video  '); ?>
		&nbsp;&nbsp;
			<?php echo CHtml::resetButton('   Clear Video   ', array('id'=>'form-reset-button')); ?>
		</td>
	</tr>

</table>
<?php $this->endWidget(); ?>

</div><!-- form -->