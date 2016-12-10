<?php
/* @var $this BrandProductSpecificationController */
/* @var $data BrandProductSpecification */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_product_id')); ?>:</b>
	<?php echo CHtml::encode($data->brand_product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('main_title')); ?>:</b>
	<?php echo CHtml::encode($data->main_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_title')); ?>:</b>
	<?php echo CHtml::encode($data->sub_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('specification')); ?>:</b>
	<?php echo CHtml::encode($data->specification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />


</div>