<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'store-config-storeconfig-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<table>
		<tr>
			<td colspan="3"><b>EDIT STORE CONFIG<b></td>
		</tr>
		
		<tr>
		<td  colspan="3">* indicates all compulsary fields</td>
		</tr>
		<tr>
			<td width="25%">Store Name :</td>
			<td width="50%">Global</td>
			<td width="25%"></td>
		</tr>
		<tr>
			<td colspan="3"></td>
		</tr>
		<tr>
			<td width="25%">Store Location :</td>
					<?php
					$country = Yii::app()->db->createCommand()
					->select('COUNTRY_ID,COUNTRY_NAME')
					->from('tbl_country_master')
					->queryAll();
		

			?>
			
			
			
			<td width="50%"><?php echo $form->dropDownList($model,'location', CHtml::listData($country,'COUNTRY_ID','COUNTRY_NAME'), array('prompt'=>'Select Country')); ?>
			<?php echo $form->error($model,'location'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		
		<tr>
			<td width="25%">Store Currency :</td>
			<td width="50%"><?php echo $form->textField($model,'currency'); ?>
			<?php echo $form->error($model,'currency'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		 
		<tr>
			<td width="25%">Store Language :</td>
			<td width="50%"><?php echo $form->textField($model,'language',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'language'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
		<td colspan="3"><td>
		</tr>
		
		<tr>
			<td width="25%">Website URL :</td>
			<td width="50%"><?php echo $form->textField($model,'website_url',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'website_url'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Secure URL :</td>
			<td width="50%"><?php echo $form->textField($model,'secure_url',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'secure_url'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Website Path :</td>
			<td width="50%"><?php echo $form->textField($model,'website_path',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'website_path'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Website Delivery URL :</td>
			<td width="50%"><?php echo $form->textField($model,'web_del_url',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'web_del_url'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Website Licence URL :</td>
			<td width="50%"><?php echo $form->textField($model,'web_license_url',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'web_license_url'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Wap URL :</td>
			<td width="50%"><?php echo $form->textField($model,'wap_url',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'wap_url'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Template Folder Path :</td>
			<td width="50%"><?php echo $form->textField($model,'temp_folder_path',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'temp_folder_path'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Payment Gateway URL :</td>
			<td width="50%"><?php echo $form->textField($model,'payment_gateway_url',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'payment_gateway_url'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Store Email :</td>
			<td width="50%"><?php echo $form->textField($model,'store_email',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'store_email'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">SMS Header :</td>
			<td width="50%"><?php echo $form->textField($model,'sms_header',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'sms_header'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Response Mode :</td>
			<td width="50%"><?php echo $form->textField($model,'response_mode',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'response_mode'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		
		<tr>
			<td width="25%">Download count :</td>
			<td width="50%"><?php echo $form->textField($model,'download_count',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'download_count'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Mooga Host :</td>
			<td width="50%"><?php echo $form->textField($model,'mooga_host_url',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'mooga_host_url'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Mooga Login :</td>
			<td width="50%"><?php echo $form->textField($model,'mooga_login',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'mooga_login'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Mooga Content :</td>
			<td width="50%"><?php echo $form->textField($model,'mooga_content',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'mooga_content'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Mooga Artist :</td>
			<td width="50%"><?php echo $form->textField($model,'mooga_artist',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'mooga_artist'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Merchant ID :</td>
			<td width="50%"><?php echo $form->textField($model,'merchant_id',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'merchant_id'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Merchant Password :</td>
			<td width="50%"><?php echo $form->textField($model,'merchant_password',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'merchant_password'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Store Parent URL :</td>
			<td width="50%"><?php echo $form->textField($model,'store_payment_url',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'store_payment_url'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Akamai Notification Email :</td>
			<td width="50%"><?php echo $form->textField($model,'aknmai_noti_email',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'aknmai_noti_email'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Change Password URL :</td>
			<td width="50%"><?php echo $form->textField($model,'change_password_url',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'change_password_url'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Contact Us URL(without login) :</td>
			<td width="50%"><?php echo $form->textField($model,'contactus_url_wol',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'contactus_url_wol'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Contacting Us URL(with login) :</td>
			<td width="50%"><?php echo $form->textField($model,'contactus_url_wl',array('size'=>40,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'contactus_url_wl'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="25%">Ecoupons :</td>
			<td width="50%"><?php echo $form->checkbox($model,'ecoupons',array('value'=>1,'UncheckedValue'=>0)); ?>
			<?php echo $form->error($model,'ecoupons'); ?>
			</td>
			<td width="25%"></td>
		</tr>
		<tr>
			<td width="25%">Hungama plays :</td>
			<td width="50%"><?php echo $form->checkbox($model,'hungama_plays',array('value'=>1,'UncheckedValue'=>0)); ?>
			<?php echo $form->error($model,'hungama_plays'); ?>
			</td>
			<td width="25%"></td>
		</tr>
		<tr>
			<td width="25%">Circle wise query :</td>
			<td width="50%"><?php echo $form->checkBox($model,'circle_wise_query',array('value'=>1,'UncheckedValue'=>0)); ?>
			<?php echo $form->error($model,'circle_wise_query'); ?>
			</td>
			<td width="25%"></td>
		</tr>
		<tr>
			<td width="25%">Upload Image :</td>
			<td width="50%"><?php echo $form->FileField($model,'upload_image'); ?>
			<?php echo $form->error($model,'upload_image'); ?>
			</td>
			<td width="25%">*</td>
		</tr>
		<tr>
			<td width="35%"> 
			<?php echo CHtml::submitButton('Update Store'); ?>
			</td>
			<td width="35%">
			<?php echo CHtml::submitButton('Reset'); ?>
			</td>
			<td width="30%"></td>
		</tr>
		
		
	</table>
	
	
	

	<?php /*echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location'); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->textField($model,'currency'); ?>
		<?php echo $form->error($model,'currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php echo $form->textField($model,'language'); ?>
		<?php echo $form->error($model,'language'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website_url'); ?>
		<?php echo $form->textField($model,'website_url'); ?>
		<?php echo $form->error($model,'website_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'secure_url'); ?>
		<?php echo $form->textField($model,'secure_url'); ?>
		<?php echo $form->error($model,'secure_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website_path'); ?>
		<?php echo $form->textField($model,'website_path'); ?>
		<?php echo $form->error($model,'website_path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'web_del_url'); ?>
		<?php echo $form->textField($model,'web_del_url'); ?>
		<?php echo $form->error($model,'web_del_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'web_license_url'); ?>
		<?php echo $form->textField($model,'web_license_url'); ?>
		<?php echo $form->error($model,'web_license_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wap_url'); ?>
		<?php echo $form->textField($model,'wap_url'); ?>
		<?php echo $form->error($model,'wap_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_folder_path'); ?>
		<?php echo $form->textField($model,'temp_folder_path'); ?>
		<?php echo $form->error($model,'temp_folder_path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_gateway_url'); ?>
		<?php echo $form->textField($model,'payment_gateway_url'); ?>
		<?php echo $form->error($model,'payment_gateway_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'store_email'); ?>
		<?php echo $form->textField($model,'store_email'); ?>
		<?php echo $form->error($model,'store_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sms_header'); ?>
		<?php echo $form->textField($model,'sms_header'); ?>
		<?php echo $form->error($model,'sms_header'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'response_mode'); ?>
		<?php echo $form->textField($model,'response_mode'); ?>
		<?php echo $form->error($model,'response_mode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'download_count'); ?>
		<?php echo $form->textField($model,'download_count'); ?>
		<?php echo $form->error($model,'download_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mooga_host_url'); ?>
		<?php echo $form->textField($model,'mooga_host_url'); ?>
		<?php echo $form->error($model,'mooga_host_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mooga_login'); ?>
		<?php echo $form->textField($model,'mooga_login'); ?>
		<?php echo $form->error($model,'mooga_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mooga_content'); ?>
		<?php echo $form->textField($model,'mooga_content'); ?>
		<?php echo $form->error($model,'mooga_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mooga_artist'); ?>
		<?php echo $form->textField($model,'mooga_artist'); ?>
		<?php echo $form->error($model,'mooga_artist'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'merchant_id'); ?>
		<?php echo $form->textField($model,'merchant_id'); ?>
		<?php echo $form->error($model,'merchant_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'merchant_password'); ?>
		<?php echo $form->textField($model,'merchant_password'); ?>
		<?php echo $form->error($model,'merchant_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'store_payment_url'); ?>
		<?php echo $form->textField($model,'store_payment_url'); ?>
		<?php echo $form->error($model,'store_payment_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aknmai_noti_email'); ?>
		<?php echo $form->textField($model,'aknmai_noti_email'); ?>
		<?php echo $form->error($model,'aknmai_noti_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'change_password_url'); ?>
		<?php echo $form->textField($model,'change_password_url'); ?>
		<?php echo $form->error($model,'change_password_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contactus_url_wol'); ?>
		<?php echo $form->textField($model,'contactus_url_wol'); ?>
		<?php echo $form->error($model,'contactus_url_wol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contactus_url_wl'); ?>
		<?php echo $form->textField($model,'contactus_url_wl'); ?>
		<?php echo $form->error($model,'contactus_url_wl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ecoupons'); ?>
		<?php echo $form->textField($model,'ecoupons'); ?>
		<?php echo $form->error($model,'ecoupons'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hungama_plays'); ?>
		<?php echo $form->textField($model,'hungama_plays'); ?>
		<?php echo $form->error($model,'hungama_plays'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'circle_wise_query'); ?>
		<?php echo $form->textField($model,'circle_wise_query'); ?>
		<?php echo $form->error($model,'circle_wise_query'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'upload_image'); ?>
		<?php echo $form->textField($model,'upload_image'); ?>
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
		<?php echo CHtml::submitButton('Submit');*/ ?>
	

<?php $this->endWidget(); ?>

</div><!-- form -->