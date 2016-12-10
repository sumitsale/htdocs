<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMINATION_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NOMINATION_ID), array('view', 'id'=>$data->NOMINATION_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GENERE')); ?>:</b>
	<?php echo CHtml::encode($data->GENERE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMINATION_FOR')); ?>:</b>
	<?php echo CHtml::encode($data->NOMINATION_FOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONTENT_ID')); ?>:</b>
	<?php echo CHtml::encode($data->CONTENT_ID); ?>
	<br />


</div>