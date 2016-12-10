<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'STORE_FRONT_ID'); ?>
		<?php echo $form->textField($model,'STORE_FRONT_ID',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STORE_FRONT_NAME'); ?>
		<?php echo $form->textField($model,'STORE_FRONT_NAME',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COUNTRY_ID'); ?>
		<?php echo $form->textField($model,'COUNTRY_ID',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CURRENCY'); ?>
		<?php echo $form->textField($model,'CURRENCY',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LANGUAGE_ID'); ?>
		<?php echo $form->textField($model,'LANGUAGE_ID',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WEBSITE_URL'); ?>
		<?php echo $form->textField($model,'WEBSITE_URL',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WEBSITE_SECURE_URL'); ?>
		<?php echo $form->textField($model,'WEBSITE_SECURE_URL',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WEBSITE_DELIVERY_URL'); ?>
		<?php echo $form->textField($model,'WEBSITE_DELIVERY_URL',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WEBSITE_LICENCE_URL'); ?>
		<?php echo $form->textField($model,'WEBSITE_LICENCE_URL',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WAP_URL'); ?>
		<?php echo $form->textField($model,'WAP_URL',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PAYMENT_GATEWAY_URL'); ?>
		<?php echo $form->textField($model,'PAYMENT_GATEWAY_URL',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STORE_PARENT_URL'); ?>
		<?php echo $form->textField($model,'STORE_PARENT_URL',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MOOGAHOST'); ?>
		<?php echo $form->textField($model,'MOOGAHOST',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MOOGALOGIN'); ?>
		<?php echo $form->textField($model,'MOOGALOGIN',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MOOGACONTENT'); ?>
		<?php echo $form->textField($model,'MOOGACONTENT',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MOOGAARTIST'); ?>
		<?php echo $form->textField($model,'MOOGAARTIST',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WEBSITE_PATH'); ?>
		<?php echo $form->textField($model,'WEBSITE_PATH',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ADMIN_EMAIL'); ?>
		<?php echo $form->textField($model,'ADMIN_EMAIL',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AKAMAI_NOTIFICATION_URL'); ?>
		<?php echo $form->textField($model,'AKAMAI_NOTIFICATION_URL',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TEMPLATE_FOLDER'); ?>
		<?php echo $form->textField($model,'TEMPLATE_FOLDER',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MAX_DOWNLOAD_COUNT'); ?>
		<?php echo $form->textField($model,'MAX_DOWNLOAD_COUNT'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CREATED_ON'); ?>
		<?php echo $form->textField($model,'CREATED_ON'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CREATED_BY'); ?>
		<?php echo $form->textField($model,'CREATED_BY',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UPDATED_ON'); ?>
		<?php echo $form->textField($model,'UPDATED_ON'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MERCHANT_ID'); ?>
		<?php echo $form->textField($model,'MERCHANT_ID',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MERCHANT_PASSWORD'); ?>
		<?php echo $form->textField($model,'MERCHANT_PASSWORD',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMAILER_PWD_URL'); ?>
		<?php echo $form->textField($model,'EMAILER_PWD_URL',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMAILER_CONTACT_URL'); ?>
		<?php echo $form->textField($model,'EMAILER_CONTACT_URL',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMAILER_CONTACTING_URL'); ?>
		<?php echo $form->textField($model,'EMAILER_CONTACTING_URL',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SMS_HEADER'); ?>
		<?php echo $form->textField($model,'SMS_HEADER',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RESPONSE_MODE'); ?>
		<?php echo $form->textField($model,'RESPONSE_MODE',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ECOUPONS'); ?>
		<?php echo $form->textField($model,'ECOUPONS',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HUNGAMAPLAYS'); ?>
		<?php echo $form->textField($model,'HUNGAMAPLAYS',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CIRCLE_WISE_QUERY'); ?>
		<?php echo $form->textField($model,'CIRCLE_WISE_QUERY',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->