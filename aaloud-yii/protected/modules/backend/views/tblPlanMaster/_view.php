<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLAN_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PLAN_ID), array('view', 'id'=>$data->PLAN_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLAN_TITLE')); ?>:</b>
	<?php echo CHtml::encode($data->PLAN_TITLE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLAN_DESC')); ?>:</b>
	<?php echo CHtml::encode($data->PLAN_DESC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLAN_FOR')); ?>:</b>
	<?php echo CHtml::encode($data->PLAN_FOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLAN_TYPE')); ?>:</b>
	<?php echo CHtml::encode($data->PLAN_TYPE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLAN_CATALOG')); ?>:</b>
	<?php echo CHtml::encode($data->PLAN_CATALOG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLAN_DOWNLOAD')); ?>:</b>
	<?php echo CHtml::encode($data->PLAN_DOWNLOAD); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PLAN_PURCHASE')); ?>:</b>
	<?php echo CHtml::encode($data->PLAN_PURCHASE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLAN_PACKAGE_TYPE')); ?>:</b>
	<?php echo CHtml::encode($data->PLAN_PACKAGE_TYPE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLAN_CONTENT_TYPE')); ?>:</b>
	<?php echo CHtml::encode($data->PLAN_CONTENT_TYPE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ADDED_ON')); ?>:</b>
	<?php echo CHtml::encode($data->ADDED_ON); ?>
	<br />

	*/ ?>

</div>