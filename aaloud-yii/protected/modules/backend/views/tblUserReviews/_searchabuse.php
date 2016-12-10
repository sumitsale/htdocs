<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<table>
	<tr>
		<td><?php echo $form->labelEx($model,'Content Type :'); ?></td>
		<td><?php echo $form->dropDownList($model,'CONTENT_TYPE_ID',CHtml::listData($content,'ALBUM_TYPE_ID','ALBUM_TYPE_NAME')); ?></td>
	</tr>
	

	<tr>
		<td colspan=2><?php echo CHtml::submitButton('    Search    '); ?></td>
	</tr>
	
</table>

<?php $this->endWidget(); ?>

</div><!-- search-form -->