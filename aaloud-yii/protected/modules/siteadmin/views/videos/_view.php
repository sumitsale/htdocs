<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('VIDEO_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->VIDEO_ID), array('view', 'id'=>$data->VIDEO_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VIDEO_ARTIST_TITLE')); ?>:</b>
	<?php echo CHtml::encode($data->VIDEO_ARTIST_TITLE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VIDEO_FILE')); ?>:</b>
	<?php echo CHtml::encode($data->VIDEO_FILE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VIDEO_DESC')); ?>:</b>
	<?php echo CHtml::encode($data->VIDEO_DESC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VIDEO_IMAGE')); ?>:</b>
	<?php echo CHtml::encode($data->VIDEO_IMAGE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VIDEO_INDATE')); ?>:</b>
	<?php echo CHtml::encode($data->VIDEO_INDATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VIDEO_STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->VIDEO_STATUS); ?>
	<br />


</div>