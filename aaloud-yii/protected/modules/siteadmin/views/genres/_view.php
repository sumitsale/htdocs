<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('genre_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->genre_id), array('view', 'id'=>$data->genre_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('genre_name')); ?>:</b>
	<?php echo CHtml::encode($data->genre_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('priority')); ?>:</b>
	<?php echo CHtml::encode($data->priority); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('indate')); ?>:</b>
	<?php echo CHtml::encode($data->indate); ?>
	<br />


</div>