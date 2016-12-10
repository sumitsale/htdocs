<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-aa-press-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<table>
	
	<tr> 		
		<td><?php 
		array_unshift($artist,array('ARTIST_ID'=>'-1','ARTIST_NAME'=>'ArtistAloud.com'));
//print_r($artist);
		echo $form->labelEx($model,'Artist : '); ?></td>
		<td><?php echo $form->dropDownList($model,'Press_Artist_id', CHtml::listData($artist,'ARTIST_ID','ARTIST_NAME'), array('prompt'=>'Select Artist'));?>
		<?php echo $form->error($model,'Press_Artist_id'); ?>
		</td>            
	</tr>
	
	<tr>
        <td><?php echo $form->labelEx($model,'News Type : '); ?></td>
        
        <td><?php echo $form->dropDownList($model,'Press_News_Type',array('N'=>'News','E'=>'Exclusive News')); ?>
		<?php echo $form->error($model,'Press_News_Type'); ?>
        </td>
    </tr>
	
	
	
	<tr>
		<td><?php echo $form->labelEx($model,'News Title : '); ?></td>
		<td><?php echo $form->textField($model,'Press_News_Title',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'Press_News_Title'); ?>
		</td>
	</tr>

	

	<tr>
		<td><?php echo $form->labelEx($model,'Date : '); ?></td>
		<td><?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'TblAaPress[Press_News_Date]',
			'model'=>$model,
			'value'=>$model->Press_News_Date,
		// additional javascript options for the date picker plugin
		'options'=>array(
		'dateFormat'=>'yy-m-d',
		'showAnim'=>'fold',
		
						),
						'htmlOptions'=>array(
							'style'=>'height:20px;',
							'readonly'=>'true' 

						),
					));

		?>
		<?php echo $form->error($model,'Press_News_Date'); ?>
		</td>
	</tr>
	
	
	
	<tr>
		<td><?php echo $form->labelEx($model,'News Source : '); ?></td>
		<td><?php echo $form->textField($model,'Press_News_Source',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Press_News_Source'); ?>
		</td>
	</tr>

	
		<tr>
		<td><?php echo $form->labelEx($model,'News : '); ?></td>
		<td><?php $this->widget('application.extensions.ckeditor.CKEditor', array( 
														'model'=>$model, 
														'attribute'=>'Press_News_Content', 
														)); ?> 
			<?php echo $form->error($model,'Press_News_Content'); ?>
		</td>
	</tr>
	
	<tr>
		<td><?php echo $form->labelEx($model,'Snippet : '); ?></td>
		<td><?php $this->widget('application.extensions.ckeditor.CKEditor', array( 
														'model'=>$model, 
														'attribute'=>'Press_News_Featured', 
														)); ?> 
			<?php echo $form->error($model,'Press_News_Featured'); ?>
		</td>
	</tr>
	
	
	<tr>
		<td><?php echo $form->labelEx($model,'Snippet 2(Longer) : '); ?></td>
		<td><?php $this->widget('application.extensions.ckeditor.CKEditor', array( 
														'model'=>$model, 
														'attribute'=>'Press_News_Exclusive', 
														)); ?> 
			<?php echo $form->error($model,'Press_News_Exclusive'); ?>
		</td>
	</tr>

	
	<tr><td colspan=2>&nbsp;</td></tr> 

	<tr align="center" colspan=2>
	<td> </td>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : '  Update News  '); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo CHtml::resetButton('    Clear News    ', array('id'=>'form-reset-button')); ?></td>
	</tr>

	
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->