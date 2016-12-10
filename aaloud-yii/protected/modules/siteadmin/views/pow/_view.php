<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('POW_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->POW_ID), array('view', 'id'=>$data->POW_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONTENT_ID')); ?>:</b>
	<?php echo CHtml::encode($data->CONTENT_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LAST_UPDATE')); ?>:</b>
	<?php echo CHtml::encode($data->LAST_UPDATE); ?>
	<br />


</div>