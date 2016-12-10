<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->USER_ID), array('view', 'id'=>$data->USER_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_TYPE')); ?>:</b>
	<?php echo CHtml::encode($data->USER_TYPE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BAND_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->BAND_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GENRE')); ?>:</b>
	<?php echo CHtml::encode($data->GENRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIO')); ?>:</b>
	<?php echo CHtml::encode($data->BIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('INSPIRATION')); ?>:</b>
	<?php echo CHtml::encode($data->INSPIRATION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('META_ARTIST_ID')); ?>:</b>
	<?php echo CHtml::encode($data->META_ARTIST_ID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_AGE')); ?>:</b>
	<?php echo CHtml::encode($data->USER_AGE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_GENDER')); ?>:</b>
	<?php echo CHtml::encode($data->USER_GENDER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_CITY')); ?>:</b>
	<?php echo CHtml::encode($data->USER_CITY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_COUNTRY')); ?>:</b>
	<?php echo CHtml::encode($data->USER_COUNTRY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LAST_UPDATED')); ?>:</b>
	<?php echo CHtml::encode($data->LAST_UPDATED); ?>
	<br />

	*/ ?>

</div>