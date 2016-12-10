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


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'model-tblaaartist-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	
)); ?>

	

	<?php // echo $form->errorSummary($model); ?>

	<table>
	<?php /*
	<tr>
		<td><?php echo $form->labelEx($model,'Artist_Id'); ?></td>
		<td><?php echo $form->textField($model,'Artist_Id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Artist_Id'); ?></td>
	</tr>
	*/ ?>
	<tr>
		<td><?php echo $form->labelEx($model,'Artist_Name'); ?></td>
		<td>
		
		
		<?php echo $form->textField($model,'Artist_Name',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'Artist_Name'); ?> 
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Artist_Bgcolor'); ?></td>
		<td><?php echo $form->textField($model,'Artist_Bgcolor',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Artist_Bgcolor'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Artist_Bgimage'); ?></td>
		<td><?php echo $form->fileField($model,'Artist_Bgimage',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Artist_Bgimage'); ?></td>
	</tr>
<?php /*
	<tr>
		<td><?php echo $form->labelEx($model,'Artist_Right_Bgcolor'); ?></td>
		<td><?php echo $form->textField($model,'Artist_Right_Bgcolor',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Artist_Right_Bgcolor'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Artist_Right_Bgimage'); ?></td>
		<td><?php echo $form->fileField($model,'Artist_Right_Bgimage',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Artist_Right_Bgimage'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Artist_WAP_Image'); ?></td>
		<td><?php echo $form->fileField($model,'Artist_WAP_Image',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Artist_WAP_Image'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Artist_Twitter'); ?></td>
		<td><?php echo $form->textField($model,'Artist_Twitter',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'Artist_Twitter'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Artist_Facebook'); ?></td>
		<td><?php echo $form->textField($model,'Artist_Facebook',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'Artist_Facebook'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Artist_Flickr'); ?></td>
		<td><?php echo $form->textField($model,'Artist_Flickr',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'Artist_Flickr'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Artist_Caller_Keyword'); ?></td>
		<td><?php echo $form->textField($model,'Artist_Caller_Keyword',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Artist_Caller_Keyword'); ?></td>
	</tr>
	*/ ?>
	
<?php /*
	<tr>
		<td><?php echo $form->labelEx($model,'Artist_Status'); ?></td>
		<td><?php echo $form->textField($model,'Artist_Status',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'Artist_Status'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Artist_Indate'); ?></td>
		<td><?php echo $form->textField($model,'Artist_Indate'); ?>
		<?php echo $form->error($model,'Artist_Indate'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Artist_LastUpdate'); ?></td>
		<td><?php echo $form->textField($model,'Artist_LastUpdate'); ?>
		<?php echo $form->error($model,'Artist_LastUpdate'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'Artist_Hit_Count'); ?></td>
		<td><?php echo $form->textField($model,'Artist_Hit_Count',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Artist_Hit_Count'); ?></td>
	</tr>

	*/ ?>
	
	
	
	<tr colspan="2">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td>
	</tr>
	
	</table>

<?php $this->endWidget(); ?>

</div><!-- form -->