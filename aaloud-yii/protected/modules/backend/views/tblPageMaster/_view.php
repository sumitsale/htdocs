<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_title')); ?>:</b>
	<?php echo CHtml::encode($data->page_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_html_name')); ?>:</b>
	<?php echo CHtml::encode($data->page_html_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_section')); ?>:</b>
	<?php echo CHtml::encode($data->page_section); ?>
	<br />


</div>