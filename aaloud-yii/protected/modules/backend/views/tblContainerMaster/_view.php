<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONTAINER_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CONTAINER_ID), array('view', 'id'=>$data->CONTAINER_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONTAINER_LOCATION')); ?>:</b>
	<?php echo CHtml::encode($data->CONTAINER_LOCATION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONTAINER_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->CONTAINER_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STORE_FRONT_ID')); ?>:</b>
	<?php echo CHtml::encode($data->STORE_FRONT_ID); ?>
	<br />


</div>