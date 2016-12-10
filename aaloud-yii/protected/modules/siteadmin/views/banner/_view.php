<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('LOCATION_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->LOCATION_ID), array('view', 'id'=>$data->LOCATION_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LOCATION')); ?>:</b>
	<?php echo CHtml::encode($data->LOCATION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BANNER_MODULE')); ?>:</b>
	<?php echo CHtml::encode($data->BANNER_MODULE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BANNER_TITLE')); ?>:</b>
	<?php echo CHtml::encode($data->BANNER_TITLE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BANNER_WIDTH')); ?>:</b>
	<?php echo CHtml::encode($data->BANNER_WIDTH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BANNER_HEIGHT')); ?>:</b>
	<?php echo CHtml::encode($data->BANNER_HEIGHT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATED')); ?>:</b>
	<?php echo CHtml::encode($data->CREATED); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('MODIFIED')); ?>:</b>
	<?php echo CHtml::encode($data->MODIFIED); ?>
	<br />

	*/ ?>

</div>