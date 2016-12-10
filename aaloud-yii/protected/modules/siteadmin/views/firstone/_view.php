<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ARTIST_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ARTIST_ID), array('view', 'id'=>$data->ARTIST_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Artist_Name')); ?>:</b>
	<?php echo CHtml::encode($data->Artist_Name); ?>
	<br />


</div>