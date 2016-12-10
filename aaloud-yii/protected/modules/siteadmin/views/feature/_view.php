<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->F_ID), array('view', 'id'=>$data->F_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONTENT_TYPE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->CONTENT_TYPE_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ARTIST_ID')); ?>:</b>
	<?php echo CHtml::encode($data->ARTIST_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LAST_UPDATE')); ?>:</b>
	<?php echo CHtml::encode($data->LAST_UPDATE); ?>
	<br />


</div>