<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATM_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ATM_ID), array('view', 'id'=>$data->ATM_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATM_TITLE')); ?>:</b>
	<?php echo CHtml::encode($data->ATM_TITLE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATM_DESC')); ?>:</b>
	<?php echo CHtml::encode($data->ATM_DESC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATM_URL')); ?>:</b>
	<?php echo CHtml::encode($data->ATM_URL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATM_MONTH')); ?>:</b>
	<?php echo CHtml::encode($data->ATM_MONTH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATM_YEAR')); ?>:</b>
	<?php echo CHtml::encode($data->ATM_YEAR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATM_INDATE')); ?>:</b>
	<?php echo CHtml::encode($data->ATM_INDATE); ?>
	<br />


</div>