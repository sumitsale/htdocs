<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('footer_section_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->footer_section_id), array('view', 'id'=>$data->footer_section_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('footer_section')); ?>:</b>
	<?php echo CHtml::encode($data->footer_section); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('footer_section_image')); ?>:</b>
	<?php echo CHtml::encode($data->footer_section_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('footer_section_url')); ?>:</b>
	<?php echo CHtml::encode($data->footer_section_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('footer_section_text')); ?>:</b>
	<?php echo CHtml::encode($data->footer_section_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('footer_section_status')); ?>:</b>
	<?php echo CHtml::encode($data->footer_section_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('footer_section_lastupdate')); ?>:</b>
	<?php echo CHtml::encode($data->footer_section_lastupdate); ?>
	<br />


</div>