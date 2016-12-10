<?php
/* @var $this ProductBrandController */
/* @var $data ProductBrand */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_name')); ?>:</b>
	<?php echo CHtml::encode($data->product_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('master_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->master_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('master_category_name')); ?>:</b>
	<?php echo CHtml::encode($data->master_category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('master_brand_id')); ?>:</b>
	<?php echo CHtml::encode($data->master_brand_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('master_brand_name')); ?>:</b>
	<?php echo CHtml::encode($data->master_brand_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail')); ?>:</b>
	<?php echo CHtml::encode($data->thumbnail); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('thumbnail_big')); ?>:</b>
	<?php echo CHtml::encode($data->thumbnail_big); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rating')); ?>:</b>
	<?php echo CHtml::encode($data->rating); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('available')); ?>:</b>
	<?php echo CHtml::encode($data->available); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	*/ ?>

</div>