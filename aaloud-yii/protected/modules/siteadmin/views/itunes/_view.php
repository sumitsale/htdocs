<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ALBUM_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ALBUM_ID), array('view', 'id'=>$data->ALBUM_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ALBUM')); ?>:</b>
	<?php echo CHtml::encode($data->ALBUM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ITUNE_URL')); ?>:</b>
	<?php echo CHtml::encode($data->ITUNE_URL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('INDATE')); ?>:</b>
	<?php echo CHtml::encode($data->INDATE); ?>
	<br />


</div>