<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ipfrom')); ?>:</b>
	<?php echo CHtml::encode($data->ipfrom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ipto')); ?>:</b>
	<?php echo CHtml::encode($data->ipto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COUNTRY_ID')); ?>:</b>
	<?php echo CHtml::encode($data->COUNTRY_ID); ?>
	<br />


</div>