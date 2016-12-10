<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('MISC_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->MISC_ID), array('view', 'id'=>$data->MISC_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EXCLUSIVE_NEWS')); ?>:</b>
	<?php echo CHtml::encode($data->EXCLUSIVE_NEWS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FEATURED_ARTIST')); ?>:</b>
	<?php echo CHtml::encode($data->FEATURED_ARTIST); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LAST_UPDATE')); ?>:</b>
	<?php echo CHtml::encode($data->LAST_UPDATE); ?>
	<br />


</div>