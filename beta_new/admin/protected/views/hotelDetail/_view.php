<?php
/* @var $this HotelDetailController */
/* @var $data HotelDetail */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_id')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('overview_paragraph_1')); ?>:</b>
	<?php echo CHtml::encode($data->overview_paragraph_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('overview_paragraph_2')); ?>:</b>
	<?php echo CHtml::encode($data->overview_paragraph_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('overview_paragraph_3')); ?>:</b>
	<?php echo CHtml::encode($data->overview_paragraph_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_1_type')); ?>:</b>
	<?php echo CHtml::encode($data->room_1_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_1_amunities')); ?>:</b>
	<?php echo CHtml::encode($data->room_1_amunities); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('room_1_thumbnail')); ?>:</b>
	<?php echo CHtml::encode($data->room_1_thumbnail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_1_inclusion')); ?>:</b>
	<?php echo CHtml::encode($data->room_1_inclusion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_2_type')); ?>:</b>
	<?php echo CHtml::encode($data->room_2_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_2_amunities')); ?>:</b>
	<?php echo CHtml::encode($data->room_2_amunities); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_2_thumbnail')); ?>:</b>
	<?php echo CHtml::encode($data->room_2_thumbnail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_2_inclusion')); ?>:</b>
	<?php echo CHtml::encode($data->room_2_inclusion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_3_type')); ?>:</b>
	<?php echo CHtml::encode($data->room_3_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_3_amunities')); ?>:</b>
	<?php echo CHtml::encode($data->room_3_amunities); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_3_thumbnail')); ?>:</b>
	<?php echo CHtml::encode($data->room_3_thumbnail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_3_inclusion')); ?>:</b>
	<?php echo CHtml::encode($data->room_3_inclusion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_amunities')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_amunities); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	*/ ?>

</div>