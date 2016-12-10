<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Press_Kit_Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Press_Kit_Id), array('view', 'id'=>$data->Press_Kit_Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Artist_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Artist_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pdf_File')); ?>:</b>
	<?php echo CHtml::encode($data->Pdf_File); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Press_Kit_Status')); ?>:</b>
	<?php echo CHtml::encode($data->Press_Kit_Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Press_Kit_Indate')); ?>:</b>
	<?php echo CHtml::encode($data->Press_Kit_Indate); ?>
	<br />


</div>