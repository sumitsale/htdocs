<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tb1-home-flash-banner-home_flash_banner-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	
	<table>
		<tr>
			<td colspan="4">For <a href="http://europa.hungamatech.com">http://europa.hungamatech.com</a> URL use {siteurl} </td>
		</tr>
		<tr>
			<td colspan="4">For <a href="http://login.hungamatech.com">href="http://login.hungamatech.com</a> URL use {secureurl} </td>
		</tr>
		<tr>
			<td colspan="3"><p class="note"><span class="required">*</span>indicates all compulsary fields.</p></td>
			<td></td>
		</tr>
		<tr>
		<td width="20%">Link URL 1</td>
		<td width="2%">:</td>
		<td width="76%"><?php echo $form->textField($model,'url1',array('size'=>70,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url1'); ?>
		</td>
		<td width="2">*</td>
		</tr>
		<tr>
		<td width="20%">Link URL 2</td>
		<td width="2%">:</td>
		<td width="76%"><?php echo $form->textField($model,'url2',array('size'=>70,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url2'); ?>
		</td>
		<td width="2">*</td>
		</tr>
		<tr>
		<td width="20%">Link URL 3</td>
		<td width="2%">:</td>
		<td width="76%"><?php echo $form->textField($model,'url3',array('size'=>70,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url3'); ?>
		</td>
		<td width="2">*</td>
		</tr>
		<tr>
		<td width="20%">Link URL 4</td>
		<td width="2%">:</td>
		<td width="76%"><?php echo $form->textField($model,'url4',array('size'=>70,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url4'); ?>
		</td>
		<td width="2">*</td>
		</tr>
		<tr>
		<td width="20%">Link URL 5</td>
		<td width="2%">:</td>
		<td width="76%"><?php echo $form->textField($model,'url5',array('size'=>70,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url5'); ?>
		</td>
		<td width="2">*</td>
		</tr>
		<tr>
			<td width="20%">Flash File(.swf)</td>
			<td width="2%">:</td>
			<td width="76%"><?php echo $form->FileField($model,'flash_file'); ?>
			<?php echo $form->error($model,'flash_file'); ?>
			</td>
			<td width="2"></td>
		</tr>
		<tr>
		<td colspan="2" width="22%">
		<?php echo CHtml::submitButton('Save'); ?>
		</td>
		<td width="76%"></td>
		<td width="2%"></td>
		</tr>
		</tr>
	
		
	</table>
	<div class="row">
		<?php /*echo $form->labelEx($model,'url1'); ?>
		<?php echo $form->textField($model,'url1'); ?>
		<?php echo $form->error($model,'url1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url2'); ?>
		<?php echo $form->textField($model,'url2'); ?>
		<?php echo $form->error($model,'url2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url3'); ?>
		<?php echo $form->textField($model,'url3'); ?>
		<?php echo $form->error($model,'url3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url4'); ?>
		<?php echo $form->textField($model,'url4'); ?>
		<?php echo $form->error($model,'url4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url5'); ?>
		<?php echo $form->textField($model,'url5'); ?>
		<?php echo $form->error($model,'url5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flash_file'); ?>
		<?php echo $form->textField($model,'flash_file'); ?>
		<?php echo $form->error($model,'flash_file'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); */?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->