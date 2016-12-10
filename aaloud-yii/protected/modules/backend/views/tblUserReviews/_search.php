<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<tr>
		<td><?php echo $form->labelEx($model,'Content Type :'); ?></td>
		<td><?php echo $form->dropDownList($model,'CONTENT_TYPE_ID',CHtml::listData($content,'ALBUM_TYPE_ID','ALBUM_TYPE_NAME')); ?></td>
	</tr>
	
	
	
	<tr>
		<td><?php echo $form->labelEx($model,'Filter :'); ?></td>
		<td>  <?php echo $form->dropDownList($model,'STATUS', array('1'=>'Moderated','2'=>'Unmoderated','3'=>'Moderated and Deleted')); ?> </td>
    </tr>

	<tr>
	<td><?php echo $form->labelEx($model,'Content Id :'); ?></td>
	<td><?php echo $form->textField($model,'CONTENT_ID',array('size'=>20,'maxlength'=>100)); ?></td>
	</tr>
	
	<tr>
	<td><?php echo $form->labelEx($model,'Title Search :'); ?></td>
	<td><?php echo $form->textField($model,'REVIEW_TITLE',array('size'=>20,'maxlength'=>100)); ?></td>
	</tr>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->