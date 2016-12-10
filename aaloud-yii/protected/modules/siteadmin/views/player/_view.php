<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLAYERID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PLAYERID), array('view', 'id'=>$data->PLAYERID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONTENTID')); ?>:</b>
	<?php echo CHtml::encode($data->CONTENTID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONTENTNAME')); ?>:</b>
	<?php echo CHtml::encode($data->CONTENTNAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRIORITY')); ?>:</b>
	<?php echo CHtml::encode($data->PRIORITY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('INDATE')); ?>:</b>
	<?php echo CHtml::encode($data->INDATE); ?>
	<br />


</div>