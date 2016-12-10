<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('center_section_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->center_section_id), array('view', 'id'=>$data->center_section_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('center_section')); ?>:</b>
	<?php echo CHtml::encode($data->center_section); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('center_section_image')); ?>:</b>
	<?php echo CHtml::encode($data->center_section_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('center_section_url')); ?>:</b>
	<?php echo CHtml::encode($data->center_section_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('center_section_text')); ?>:</b>
	<?php echo CHtml::encode($data->center_section_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('center_section_status')); ?>:</b>
	<?php echo CHtml::encode($data->center_section_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('center_section_lastupdate')); ?>:</b>
	<?php echo CHtml::encode($data->center_section_lastupdate); ?>
	<br />


</div>