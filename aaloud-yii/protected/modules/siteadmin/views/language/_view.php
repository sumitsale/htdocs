<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('lang_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->lang_id), array('view', 'id'=>$data->lang_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lang_name')); ?>:</b>
	<?php echo CHtml::encode($data->lang_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('priority')); ?>:</b>
	<?php echo CHtml::encode($data->priority); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('indate')); ?>:</b>
	<?php echo CHtml::encode($data->indate); ?>
	<br />


</div>