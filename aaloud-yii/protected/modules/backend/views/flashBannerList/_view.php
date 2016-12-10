<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flash_title')); ?>:</b>
	<?php echo CHtml::encode($data->flash_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flash_section')); ?>:</b>
	<?php echo CHtml::encode($data->flash_section); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('xmlpath')); ?>:</b>
	<?php echo CHtml::encode($data->xmlpath); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>