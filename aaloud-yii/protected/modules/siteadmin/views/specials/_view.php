<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('special_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->special_id), array('view', 'id'=>$data->special_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('special_name')); ?>:</b>
	<?php echo CHtml::encode($data->special_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('special_link')); ?>:</b>
	<?php echo CHtml::encode($data->special_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('special_image')); ?>:</b>
	<?php echo CHtml::encode($data->special_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('indate')); ?>:</b>
	<?php echo CHtml::encode($data->indate); ?>
	<br />


</div>