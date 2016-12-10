<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ANSWER_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ANSWER_ID), array('view', 'id'=>$data->ANSWER_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('QUESTION_ID')); ?>:</b>
	<?php echo CHtml::encode($data->QUESTION_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STORE_FRONT_ID')); ?>:</b>
	<?php echo CHtml::encode($data->STORE_FRONT_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ANSWER')); ?>:</b>
	<?php echo CHtml::encode($data->ANSWER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MAIN_TAB_ID')); ?>:</b>
	<?php echo CHtml::encode($data->MAIN_TAB_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TAB_ID')); ?>:</b>
	<?php echo CHtml::encode($data->TAB_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />


</div>