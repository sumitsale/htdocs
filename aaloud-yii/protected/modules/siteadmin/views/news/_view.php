<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Press_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Press_id), array('view', 'id'=>$data->Press_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Press_Artist_id')); ?>:</b>
	<?php echo CHtml::encode($data->Press_Artist_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Press_News_Type')); ?>:</b>
	<?php echo CHtml::encode($data->Press_News_Type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Press_News_Title')); ?>:</b>
	<?php echo CHtml::encode($data->Press_News_Title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Press_News_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Press_News_Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Press_News_Source')); ?>:</b>
	<?php echo CHtml::encode($data->Press_News_Source); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Press_News_Content')); ?>:</b>
	<?php echo CHtml::encode($data->Press_News_Content); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Press_News_Featured')); ?>:</b>
	<?php echo CHtml::encode($data->Press_News_Featured); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Press_News_Exclusive')); ?>:</b>
	<?php echo CHtml::encode($data->Press_News_Exclusive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Press_News_Status')); ?>:</b>
	<?php echo CHtml::encode($data->Press_News_Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Press_Indate')); ?>:</b>
	<?php echo CHtml::encode($data->Press_Indate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Press_LastUpdate')); ?>:</b>
	<?php echo CHtml::encode($data->Press_LastUpdate); ?>
	<br />

	*/ ?>

</div>