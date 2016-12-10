<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url1')); ?>:</b>
	<?php echo CHtml::encode($data->url1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url2')); ?>:</b>
	<?php echo CHtml::encode($data->url2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url3')); ?>:</b>
	<?php echo CHtml::encode($data->url3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url4')); ?>:</b>
	<?php echo CHtml::encode($data->url4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url5')); ?>:</b>
	<?php echo CHtml::encode($data->url5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flash_file')); ?>:</b>
	<?php echo CHtml::encode($data->flash_file); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	*/ ?>

</div>