<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('artist_id')); ?>:</b>
	<?php echo CHtml::encode($data->artist_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('artist_name')); ?>:</b>
	<?php echo CHtml::encode($data->artist_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hungama_link')); ?>:</b>
	<?php echo CHtml::encode($data->hungama_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ovi_link')); ?>:</b>
	<?php echo CHtml::encode($data->ovi_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('itune_link')); ?>:</b>
	<?php echo CHtml::encode($data->itune_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sms_download_link')); ?>:</b>
	<?php echo CHtml::encode($data->sms_download_link); ?>
	<br />


</div>