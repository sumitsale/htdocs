<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PROMO_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PROMO_ID), array('view', 'id'=>$data->PROMO_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PROMO_TITLE')); ?>:</b>
	<?php echo CHtml::encode($data->PROMO_TITLE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLAN_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PLAN_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STORE_FRONT_ID')); ?>:</b>
	<?php echo CHtml::encode($data->STORE_FRONT_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PROMO_STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->PROMO_STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PROMO_CREATED')); ?>:</b>
	<?php echo CHtml::encode($data->PROMO_CREATED); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PROMO_MODIFIED')); ?>:</b>
	<?php echo CHtml::encode($data->PROMO_MODIFIED); ?>
	<br />


</div>