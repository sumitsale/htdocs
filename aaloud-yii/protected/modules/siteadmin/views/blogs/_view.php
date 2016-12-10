<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('blog_title')); ?>:</b>
	<?php echo CHtml::encode($data->blog_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('blog_image')); ?>:</b>
	<?php echo CHtml::encode($data->blog_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('blog_desc')); ?>:</b>
	<?php echo CHtml::encode($data->blog_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('blog_url')); ?>:</b>
	<?php echo CHtml::encode($data->blog_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />


</div>