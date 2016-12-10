<?php
/* @var $this PackagesController */
/* @var $data Packages */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package_name')); ?>:</b>
	<?php echo CHtml::encode($data->package_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_name')); ?>:</b>
	<?php echo CHtml::encode($data->category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package_day')); ?>:</b>
	<?php echo CHtml::encode($data->package_day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package_night')); ?>:</b>
	<?php echo CHtml::encode($data->package_night); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destination')); ?>:</b>
	<?php echo CHtml::encode($data->destination); ?>
	<br />
	
		<b><?php echo CHtml::encode($data->getAttributeLabel('pricing')); ?>:</b>
	<?php echo CHtml::encode($data->pricing); ?>
	<br />

	<?php
	<b><?php echo CHtml::encode($data->getAttributeLabel('key_feature')); ?>:</b>
	<?php echo CHtml::encode($data->key_feature); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package_thumbnail')); ?>:</b>
	<?php echo CHtml::encode($data->package_thumbnail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	?>

</div>