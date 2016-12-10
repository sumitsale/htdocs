<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('artistid')); ?>:</b>
	<?php echo CHtml::encode($data->artistid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('artistname')); ?>:</b>
	<?php echo CHtml::encode($data->artistname); ?>
	<br />


</div>