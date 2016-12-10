<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Comment_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Comment_id), array('view', 'id'=>$data->Comment_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Artist_id')); ?>:</b>
	<?php echo CHtml::encode($data->Artist_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_id')); ?>:</b>
	<?php echo CHtml::encode($data->User_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Indate')); ?>:</b>
	<?php echo CHtml::encode($data->Indate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Last_Updated')); ?>:</b>
	<?php echo CHtml::encode($data->Last_Updated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->Parent_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Comment_Status')); ?>:</b>
	<?php echo CHtml::encode($data->Comment_Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Type')); ?>:</b>
	<?php echo CHtml::encode($data->Type); ?>
	<br />

	*/ ?>

</div>