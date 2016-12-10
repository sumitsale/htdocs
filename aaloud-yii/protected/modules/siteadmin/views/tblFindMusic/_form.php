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
	'id'=>'tbl-find-music-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<table>
	<!--
	<tr>
		<td><?php// echo $form->labelEx($model,'artist_id'); ?></td>
		<td><?php// echo $form->textField($model,'artist_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php// echo $form->error($model,'artist_id'); ?></td>
	</tr>-->

	<tr>
		<td>
		<?php echo $form->hiddenField($model, 'artist_id'); ?> 
		<?php echo $form->labelEx($model,'artist_name'); ?></td>
		<td><?php 
		
		
		//echo $form->textField($model,'artist_name',array('size'=>60,'maxlength'=>1000));

			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'name'=>'TblFindMusic[artist_name]',
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
						 $('#TblFindMusic_artist_id').val(ui.item.id);
						
        }"
		),
	
			
	)		);





		?>
		<?php echo $form->error($model,'artist_name'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'hungama_link'); ?></td>
		<td><?php echo $form->textField($model,'hungama_link',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'hungama_link'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'ovi_link'); ?></td>
		<td><?php echo $form->textField($model,'ovi_link',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'ovi_link'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'itune_link'); ?></td>
		<td><?php echo $form->textField($model,'itune_link',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'itune_link'); ?></td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'sms_download_link'); ?></td>
		<td><?php echo $form->textField($model,'sms_download_link',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'sms_download_link'); ?></td>
	</tr>

	<tr>
		<td>
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save'); ?>
		</td>
	</tr>

	</table>

<?php $this->endWidget(); ?>


	
</div><!-- form -->