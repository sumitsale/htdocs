<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'store-config-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->textField($model,'currency',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php echo $form->textField($model,'language',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'language'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website_url'); ?>
		<?php echo $form->textField($model,'website_url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'website_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'secure_url'); ?>
		<?php echo $form->textField($model,'secure_url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'secure_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website_path'); ?>
		<?php echo $form->textField($model,'website_path',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'website_path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'web_del_url'); ?>
		<?php echo $form->textField($model,'web_del_url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'web_del_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'web_license_url'); ?>
		<?php echo $form->textField($model,'web_license_url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'web_license_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wap_url'); ?>
		<?php echo $form->textField($model,'wap_url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'wap_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_folder_path'); ?>
		<?php echo $form->textField($model,'temp_folder_path',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'temp_folder_path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_gateway_url'); ?>
		<?php echo $form->textField($model,'payment_gateway_url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'payment_gateway_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'store_email'); ?>
		<?php echo $form->textField($model,'store_email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'store_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sms_header'); ?>
		<?php echo $form->textField($model,'sms_header',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'sms_header'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'response_mode'); ?>
		<?php echo $form->textField($model,'response_mode',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'response_mode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'download_count'); ?>
		<?php echo $form->textField($model,'download_count',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'download_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mooga_host_url'); ?>
		<?php echo $form->textField($model,'mooga_host_url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mooga_host_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mooga_login'); ?>
		<?php echo $form->textField($model,'mooga_login',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mooga_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mooga_content'); ?>
		<?php echo $form->textField($model,'mooga_content',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mooga_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mooga_artist'); ?>
		<?php echo $form->textField($model,'mooga_artist',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mooga_artist'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'merchant_id'); ?>
		<?php echo $form->textField($model,'merchant_id',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'merchant_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'merchant_password'); ?>
		<?php echo $form->textField($model,'merchant_password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'merchant_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'store_payment_url'); ?>
		<?php echo $form->textField($model,'store_payment_url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'store_payment_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aknmai_noti_email'); ?>
		<?php echo $form->textField($model,'aknmai_noti_email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'aknmai_noti_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'change_password_url'); ?>
		<?php echo $form->textField($model,'change_password_url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'change_password_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contactus_url_wol'); ?>
		<?php echo $form->textField($model,'contactus_url_wol',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'contactus_url_wol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contactus_url_wl'); ?>
		<?php echo $form->textField($model,'contactus_url_wl',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'contactus_url_wl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ecoupons'); ?>
		<?php echo $form->textField($model,'ecoupons',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ecoupons'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hungama_plays'); ?>
		<?php echo $form->textField($model,'hungama_plays',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'hungama_plays'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'circle_wise_query'); ?>
		<?php echo $form->textField($model,'circle_wise_query',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'circle_wise_query'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'upload_image'); ?>
		<?php echo $form->textField($model,'upload_image',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'upload_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->