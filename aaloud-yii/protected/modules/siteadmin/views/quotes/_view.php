<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Quote_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Quote_Id), array('view', 'id'=>$data->Quote_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Quote_Src')); ?>:</b>
	<?php echo CHtml::encode($data->Quote_Src); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Quote_Title')); ?>:</b>
	<?php echo CHtml::encode($data->Quote_Title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Quote')); ?>:</b>
	<?php echo CHtml::encode($data->Quote); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Quote_Image')); ?>:</b>
	<?php echo CHtml::encode($data->Quote_Image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Quote_Status')); ?>:</b>
	<?php echo CHtml::encode($data->Quote_Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Quote_LastUpdate')); ?>:</b>
	<?php echo CHtml::encode($data->Quote_LastUpdate); ?>
	<br />


</div>