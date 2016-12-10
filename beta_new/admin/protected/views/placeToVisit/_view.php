<?php
/* @var $this PlaceToVisitController */
/* @var $data PlaceToVisit */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('place_name')); ?>:</b>
	<?php echo CHtml::encode($data->place_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_name')); ?>:</b>
	<?php echo CHtml::encode($data->category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('small_thumbnail')); ?>:</b>
	<?php echo CHtml::encode($data->small_thumbnail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail_1')); ?>:</b>
	<?php echo CHtml::encode($data->thumbnail_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail_2')); ?>:</b>
	<?php echo CHtml::encode($data->thumbnail_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail_3')); ?>:</b>
	<?php echo CHtml::encode($data->thumbnail_3); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail_4')); ?>:</b>
	<?php echo CHtml::encode($data->thumbnail_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail_5')); ?>:</b>
	<?php echo CHtml::encode($data->thumbnail_5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	*/ ?>

</div>