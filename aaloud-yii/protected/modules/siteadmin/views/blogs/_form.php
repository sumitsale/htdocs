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
		<td><?php echo $form->labelEx($model,'blog_title'); ?></td>
		<td><?php echo $form->textField($model,'blog_title',array('size'=>100,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'blog_title'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'blog_image'); ?></td>
		<td><?php echo $form->fileField($model,'blog_image',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'blog_image'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'blog_desc'); ?></td>
		<td><?php echo $form->textArea($model,'blog_desc',array('size'=>600,'rows'=>3,'cols'=>5,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'blog_desc'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'blog_url'); ?></td>
		<td><?php echo $form->textField($model,'blog_url',array('size'=>100,'maxlength'=>800)); ?>
		<?php echo $form->error($model,'blog_url'); ?>
		</td>
	</tr>

	<tr>
		<td>
			<?php echo $form->labelEx($model,'date'); ?>
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
	
	
	
	
	<tr align="center">
	    <td> </td>
		<td><?php echo CHtml::submitButton($model->isNewRecord ? '    Add Blog    ' : '   Update Blog   '); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo CHtml::resetButton('  Clear Blog  ', array('id'=>'form-reset-button')); ?></td>
		</td>
	</tr>
	
</table>

<?php $this->endWidget(); ?>

</div><!-- form -->