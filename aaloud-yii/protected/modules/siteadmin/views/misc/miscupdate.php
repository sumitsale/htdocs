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
 
 
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-aa-misc-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<table>	
	

	<?php foreach($misc_query as $row)
					{
					$miscid=$row['MISC_ID'];
					//$excluid=$row['TblAaMisc']['EXCLUSIVE_NEWS'];
					//$fartistid=$row['TblAaMisc']['FEATURED_ARTIST'];
					
					
					}
					?>

<input type="hidden" name="misc_id" value="<?php echo $miscid; ?>">

	<tr>
		<td><?php echo $form->labelEx($model,'Exclusive News'); ?></td>
		<td><?php echo $form->dropDownList($model,'EXCLUSIVE_NEWS',CHtml::listData($exclusive,'Press_id','Press_News_Title'),array('prompt'=>'Select News')); ?>
		<?php echo $form->error($model,'EXCLUSIVE_NEWS'); ?>
		</td>	
	</tr>
	
	<tr>
		<td><?php echo $form->labelEx($model,'Featured Artist'); ?></td>
		<td><?php echo $form->dropDownList($model,'FEATURED_ARTIST',CHtml::listData($fartist,'Artist_Id','Artist_Name'), array('prompt'=>'Select News')); ?>
		<?php echo $form->error($model,'FEATURED_ARTIST'); ?>
		</td>	
	</tr>
	
	<tr>
	<td colspan=2>&nbsp;</td>
	</tr>

	<tr>
		<td> </td>
		<td align="center"><?php echo CHtml::submitButton($model->isNewRecord ? 'save' : '  Update  '); ?>
		&nbsp;
		<?php echo CHtml::resetButton('  Reset Options  ', array('id'=>'form-reset-button')); ?>
		</td>
	</tr>

	
</table>
<?php $this->endWidget(); ?>

</div><!-- form -->