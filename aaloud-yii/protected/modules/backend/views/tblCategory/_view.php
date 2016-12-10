<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CATEGORY_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CATEGORY_ID), array('view', 'id'=>$data->CATEGORY_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CATEGORY')); ?>:</b>
	<?php echo CHtml::encode($data->CATEGORY); ?>
	<br />


</div>