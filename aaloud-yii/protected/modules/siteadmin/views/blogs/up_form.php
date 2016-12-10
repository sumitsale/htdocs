<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'artistaloud-blog-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<table>

	<tr>
		<td><?php echo $form->labelEx($model,'Blog Title : '); ?></td>
		<td><?php echo $form->textField($model,'blog_title',array('size'=>100,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'blog_title'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Blog Image : '); ?></td>
		<td><?php echo $form->fileField($model,'blog_image',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'blog_image'); ?>
		<div>
		<a target="_blank" href="<?php echo Yii::app()->baseUrl;?>/images/blogs/<?php echo $row['blog_image'];?>"><?php echo $row['blog_image'];   ?> </a>
		 </div>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Blog Description : '); ?></td>
		<td><?php echo $form->textArea($model,'blog_desc',array('size'=>600,'rows'=>3,'cols'=>5,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'blog_desc'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Blog Url : '); ?></td>
		<td><?php echo $form->textField($model,'blog_url',array('size'=>100,'maxlength'=>800)); ?>
		<?php echo $form->error($model,'blog_url'); ?>
		</td>
	</tr>

	<tr>
		<td>
			<?php echo $form->labelEx($model,'Date'); ?>
		</td>
		<td>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'ArtistaloudBlog[date]',
			'model'=>$model,
			'value'=>$model->date,
		// additional javascript options for the date picker plugin
		'options'=>array(
		'dateFormat'=>'yy-m-dd',
		'showAnim'=>'fold',
		
						),
						'htmlOptions'=>array(
							'style'=>'height:20px;',
							'readonly'=>'true' 

						),
					));

		?>
		<?php echo $form->error($model,'date'); ?>
		</td>
    </tr>
	
	
	
	
	<tr>
	    <td> </td>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<td><?php echo CHtml::submitButton($model->isNewRecord ? '    Add Blog    ' : '   Update Blog   '); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo CHtml::resetButton('  Clear Blog  ', array('id'=>'form-reset-button')); ?></td>
		</td>
	</tr>
	
</table>

<?php $this->endWidget(); ?>

</div><!-- form -->