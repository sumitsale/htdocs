<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tblstorefront-form',
	'enableAjaxValidation'=>false,
'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	
)); ?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<!--<?php echo $form->errorSummary($model); ?>-->
<table width="100%">
<tr>
<td colspan="3"><h1>EDIT STORE CONFIG</h1></td>
</tr>

<tr>
<td colspan="3">
<p class="note">Fields with <span class="required">*</span> are required.</p>
</td>

</tr>
	<tr>	
		<td align="right"><?php echo $form->labelEx($model,'Store Name :'); ?></td>
		<td><?php echo $form->textField($model,'STORE_FRONT_NAME',array('size'=>60,'maxlength'=>100)); ?></td>
		<!--<?php echo $form->error($model,'STORE_FRONT_NAME'); ?>-->
	</tr>

<tr>
	
		<td align="right"><?php echo $form->labelEx($model,'Store Location :'); ?></td>
		<td><?php echo $form->dropDownList($model,'COUNTRY_ID',CHtml::listData($country,'COUNTRY_ID','COUNTRY_NAME'), array('prompt'=>'select country')); ?></td>
		<td></td>
		<!--<?php echo $form->error($model,'COUNTRY_ID'); ?>-->
</tr>

<tr>


		<td align="right"><?php echo $form->labelEx($model,'Store Currency :'); ?></td>
		<td><?php echo $form->dropDownList($model,'CURRENCY',CHtml::listData($courrency,'CURRENCY','CURRENCY'), array('prompt'=>'select currency'));?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'CURRENCY'); ?>-->
	</tr>
	
	<tr>

	
		<td align="right"><?php echo $form->labelEx($model,'Store Language :'); ?></td>
		<td><?php echo $form->textField($model,'LANGUAGE_ID',array('size'=>3,'maxlength'=>3)); ?></td>
		<!--<?php echo $form->error($model,'LANGUAGE_ID'); ?>-->
	<td>*</td>
	</tr>
	
	
	
	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>

<tr>

		<td align="right"><?php echo $form->labelEx($model,'Website URL :'); ?></td>
		<td><?php echo $form->textField($model,'WEBSITE_URL',array('size'=>60,'maxlength'=>100)); ?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_URL'); ?>-->
</tr>

<tr>

	
		<td align="right"><?php echo $form->labelEx($model,'Secure URL :'); ?></td>
		<td><?php echo $form->textField($model,'WEBSITE_SECURE_URL',array('size'=>60,'maxlength'=>100)); ?></td>
		<td>*</td>
		<!--
		<?php echo $form->error($model,'WEBSITE_SECURE_URL'); ?>-->
	</tr>
	
<tr>
	
		<td align="right"><?php echo $form->labelEx($model,'Website Delivery URL :'); ?></td>
		<td><?php echo $form->textField($model,'WEBSITE_DELIVERY_URL',array('size'=>60,'maxlength'=>100)); ?></td>
		<td>*</td>
	<!--<?php echo $form->error($model,'WEBSITE_DELIVERY_URL'); ?>-->
	</tr>
	
	<tr>


		<td align="right"><?php echo $form->labelEx($model,'Website Licence URL :'); ?></td>
		<td><?php echo $form->textField($model,'WEBSITE_LICENCE_URL',array('size'=>60,'maxlength'=>100)); ?></td>
		<td>*</td><!--
		<?php echo $form->error($model,'WEBSITE_LICENCE_URL'); ?>-->
		</tr>
		
		<tr>

	
		<td align="right"><?php echo $form->labelEx($model,'Wap URL :'); ?></td>
		<td><?php echo $form->textField($model,'WAP_URL',array('size'=>60,'maxlength'=>100)); ?></td>
		<td></td>
	</tr>

	<tr>
		<td align="right"><?php echo $form->labelEx($model,'Payment Gateway URL :'); ?></td>
		<td><?php echo $form->textField($model,'PAYMENT_GATEWAY_URL',array('size'=>60,'maxlength'=>100)); ?></td>
<td>*</td>
<!--		<?php echo $form->error($model,'PAYMENT_GATEWAY_URL'); ?>-->
</tr>


<tr>

<td align="right">		<?php echo $form->labelEx($model,'STORE_PARENT_URL :'); ?></td>
		<td><?php echo $form->textField($model,'STORE_PARENT_URL',array('size'=>60,'maxlength'=>100)); ?></td>
		<td></td>
		<!--
		<?php echo $form->error($model,'STORE_PARENT_URL'); ?>-->
		</tr>

	
<tr>
	<td align="right">
		<?php echo $form->labelEx($model,'MOOGAHOST :'); ?></td>
		<td><?php echo $form->textField($model,'MOOGAHOST',array('size'=>60,'maxlength'=>100)); ?></td>
		<td>*</td><!--<?php echo $form->error($model,'MOOGAHOST'); ?>-->
</tr>

<tr>

	<td align="right">
		<?php echo $form->labelEx($model,'MOOGALOGIN :'); ?></td>
		<td><?php echo $form->textField($model,'MOOGALOGIN',array('size'=>60,'maxlength'=>100)); ?></td>
		<td>*</td><!--<?php echo $form->error($model,'MOOGALOGIN'); ?>-->
		</tr>
		
		<tr><td align="right">
		<?php echo $form->labelEx($model,'MOOGACONTENT :'); ?></td>
		<td><?php echo $form->textField($model,'MOOGACONTENT',array('size'=>60,'maxlength'=>100)); ?></td>
		<td>*</td>
		</tr>  <!--
		<?php echo $form->error($model,'MOOGACONTENT'); ?>-->
	

	<tr>	
	<td align="right"><?php echo $form->labelEx($model,'MOOGAARTIST :'); ?></td>
		<td><?php echo $form->textField($model,'MOOGAARTIST',array('size'=>60,'maxlength'=>100)); ?></td>
		<td>*</td>
		<!--
		<?php echo $form->error($model,'MOOGAARTIST'); ?>-->
	</tr>
	
	<tr>

	<td align="right">		<?php echo $form->labelEx($model,'WEBSITE_PATH :'); ?></td>
		<td><?php echo $form->textField($model,'WEBSITE_PATH',array('size'=>60,'maxlength'=>100)); ?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
	</tr>
	
	<tr>


		<td align="right"><?php echo $form->labelEx($model,'Store Email :'); ?></td>
		<td><?php echo $form->textField($model,'ADMIN_EMAIL',array('size'=>60,'maxlength'=>100)); ?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>
<tr>
		<td align="right"><?php echo $form->labelEx($model,'AKAMAI_NOTIFICATION_URL :'); ?></td>
		<td><?php echo $form->textField($model,'AKAMAI_NOTIFICATION_URL',array('size'=>60,'maxlength'=>100)); ?></td>
	<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		
		</tr>
		
		
<tr>
<td align="right">
	<?php echo $form->labelEx($model,'Template Folder Path :'); ?></td>
		<td><?php echo $form->textField($model,'TEMPLATE_FOLDER',array('size'=>60,'maxlength'=>100)); ?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
	</tr>
	
	
	
	
	
<tr>	
<td align="right">
		<?php echo $form->labelEx($model,'MAX_DOWNLOAD_COUNT :'); ?></td>
		<td><?php echo $form->textField($model,'MAX_DOWNLOAD_COUNT'); ?></td>
	<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>
		
			<?php /*
        <tr>


		<td align="right"><?php echo $form->labelEx($model,'CREATED_ON :'); ?></td>
		<td><?php echo $form->textField($model,'CREATED_ON'); ?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>
		 
		<tr>

	<td align="right">
		<?php echo $form->labelEx($model,'CREATED_BY :'); ?></td>
		<td><?php echo $form->textField($model,'CREATED_BY',array('size'=>9,'maxlength'=>9)); ?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>
		
		<tr>

	<td align="right">
		<?php echo $form->labelEx($model,'UPDATED_ON :'); ?></td>
		<td><?php echo $form->textField($model,'UPDATED_ON'); ?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>
		 
         */ ?>
         
		<tr>
<td align="right">
		<?php echo $form->labelEx($model,'MERCHANT_ID :'); ?></td>
		<td><?php echo $form->textField($model,'MERCHANT_ID',array('size'=>60,'maxlength'=>100)); ?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>
		
		<tr>

<td align="right">
		<?php echo $form->labelEx($model,'MERCHANT_PASSWORD :'); ?></td>
		<td><?php echo $form->passwordField($model,'MERCHANT_PASSWORD',array('size'=>60,'maxlength'=>100)); ?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>
		
		<tr>
<?php /*
<td align="right">
		<?php echo $form->labelEx($model,'STATUS :'); ?></td>
		<td><?php echo $form->textField($model,'STATUS'); ?>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>
		*/ ?>
		<tr>

	<td align="right">
		<?php echo $form->labelEx($model,'EMAILER_PWD_URL :'); ?></td>
		<td><?php echo $form->textField($model,'EMAILER_PWD_URL',array('size'=>60,'maxlength'=>250)); ?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>
		<tr>

	<td align="right">
		<?php echo $form->labelEx($model,'EMAILER_CONTACT_URL :'); ?></td>
		<td><?php echo $form->textField($model,'EMAILER_CONTACT_URL',array('size'=>60,'maxlength'=>250)); ?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>
		
		<tr>

	<td align="right">
		<?php echo $form->labelEx($model,'EMAILER_CONTACTING_URL :'); ?></td>
		<td><?php echo $form->textField($model,'EMAILER_CONTACTING_URL',array('size'=>60,'maxlength'=>250)); ?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>
		
		<tr>

<td align="right">
		<?php echo $form->labelEx($model,'SMS Header :'); ?></td>
		<td><?php echo $form->textField($model,'SMS_HEADER',array('size'=>50,'maxlength'=>50)); ?></td>
	<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>
		
		<tr>
<td align="right">
		<?php echo $form->labelEx($model,'RESPONSE_MODE :'); ?></td>
		<td><?php echo $form->dropDownList($model,'RESPONSE_MODE',array('s'=>'sms','e'=>'email','b'=>'sms and email'),array('size'=>1,'maxlength'=>1)); ?></td>
	<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>
		
		<tr>

<td align="right">
		<?php echo $form->labelEx($model,'ECOUPONS :'); ?></td>
		<td><?php echo $form->checkBox($model,'ECOUPONS',array('size'=>1,'maxlength'=>1)); ?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>
		
		<tr>

	<td align="right">
		<?php echo $form->labelEx($model,'HUNGAMAPLAYS :'); ?></td>
		<td><?php echo $form->checkBox($model,'HUNGAMAPLAYS',array('size'=>1,'maxlength'=>1)); ?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>
		
		<tr>

<td align="right">
		<?php echo $form->labelEx($model,'CIRCLE_WISE_QUERY :'); ?></td>
		<td><?php echo $form->checkBox($model,'CIRCLE_WISE_QUERY',array('size'=>1,'maxlength'=>1)); ?></td>
		<td>*</td>
		<!--<?php echo $form->error($model,'WEBSITE_PATH'); ?>-->
		</tr>

<tr>
     <td align="right"><?php echo $form->labelEx($model,'Image'); ?></td>
		<td><?php echo $form->fileField($model,'image',array('size'=>25,'maxlength'=>25)); ?>
        <?php echo $form->error($model,'image'); ?>
        </td>
		
</tr>


		<tr><td colspan="3">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update store'); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
<?php echo CHtml::resetButton('Reset', array('id'=>'form-reset-button')); ?>		
		
	
		</td></tr>
		
		
		</table>
	

<?php $this->endWidget(); ?>

</div><!-- form -->