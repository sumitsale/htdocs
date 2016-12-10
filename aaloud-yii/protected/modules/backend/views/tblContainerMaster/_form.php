<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-container-master-form',
	'enableAjaxValidation'=>false,
)); ?>
	<tr>
    <td colspan="3">
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	</td>
    </tr>
	<?php echo $form->errorSummary($model1); ?>
	
	<tr>
    <td><?php echo $form->labelEx($model1,'QUERY_NAME'); ?></td>
    <td><?php echo $form->textField($model1,'QUERY_NAME',array('size'=>50,'maxlength'=>50)); ?></td>
		<?php echo $form->error($model1,'QUERY_NAME'); ?>
	<td> * </td>
	</tr>
	
	<tr>
		<td><?php echo $form->labelEx($model1,'Query Variant :'); ?></td>
		<td><?php echo $form->dropDownList($model1,'QUERY_VARIANT', array('1'=>'Specific (Overall)','2'=>'Generic  (Categorywise)')); ?> </td>
		<td> * </td>
    </tr>


    <tr>
    <td>
    	<?php echo $form->labelEx($model1,'QUERY_TYPE'); ?>
	</td>
	<td>
    	<?php echo $form->radioButton($model1,'QUERY_TYPE',array('value'=>'1')) . 'Automatic'; ?>
		<?php echo $form->radioButton($model1,'QUERY_TYPE',array('value'=>'2')) . 'Manual'; ?>
	</td>
    	<?php echo $form->error($model1,'QUERY_TYPE'); ?>
	<td> * </td>
	</tr>
    
	<tr>
		<td><?php echo $form->labelEx($model2,'Criteria :'); ?></td>
		<td><?php echo $form->dropDownList($model2,'CRITERIA_ID',CHtml::listData($criteria,'CRITERIA_ID','CRITERIA_TITLE')); ?></td>
		<td> * </td>
		<?php echo $form->error($model2,'CRITERIA_ID'); ?>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model3,'Content Type :'); ?></td>
		<td><?php echo $form->dropDownList($model3,'ALBUM_TYPE_ID',CHtml::listData($content,'ALBUM_TYPE_ID','ALBUM_TYPE_NAME'), array('prompt'=>'Select Content Type')); ?></td>
		<td> * </td>
	</tr>
	
	<tr>
		<td>
			<?php echo $form->labelEx($model1,'Content Type Variation:'); ?>
		</td>
		<td>
			<?php echo $form->radioButton($model1,'ALBUM_TRACK',array('value'=>'1')) . 'Package/Album'; ?>
			<?php echo $form->radioButton($model1,'ALBUM_TRACK',array('value'=>'2')) . 'Track'; ?>
		</td>
			<?php echo $form->error($model1,'ALBUM_TRACK'); ?>
		<td> * </td>
	</tr>
	
	<tr>
		<td><?php echo $form->labelEx($model8,'Category :'); ?></td>
		<td><?php echo $form->dropDownList($model8,'CATEGORY_ID',CHtml::listData($category,'CATEGORY_ID','CATEGORY'), array('prompt'=>'Select Category')); ?></td>
		<td>  </td>
		<?php echo $form->error($model8,'CATEGORY_ID'); ?>
	</tr>
	
	<tr>
		<td><?php echo $form->labelEx($model7,'Genre :'); ?></td>
		<td><?php echo $form->dropDownList($model7,'id',CHtml::listData($genre,'id','title'), array('prompt'=>'Select Genre')); ?></td>
		<td>  </td>
		<?php echo $form->error($model7,'id'); ?>
	</tr>
	

	<tr>
		<td><?php echo $form->labelEx($model5,'Mood :'); ?></td>
        <td><?php echo $form->ListBox($model5,'MOOD_ID',CHtml::listData($mood,'MOOD_ID','MOOD_TITLE'),array('multiple' => 'multiple','size'=>'5'));?></td>
        <td>  </td>
		<?php echo $form->error($model5,'MOOD_ID'); ?>
    </tr>
	
	<tr>
		<td><?php echo $form->labelEx($model6,'Artist :'); ?></td>
        <td><?php echo $form->ListBox($model6,'id',CHtml::listData($artist,'id','title'),array('multiple' => 'multiple','size'=>'5'));?></td>
        <td>  </td>
		<?php echo $form->error($model6,'id'); ?>
    </tr>
	
	<tr>
		<td><?php echo $form->labelEx($model4,'Language :'); ?></td>
		<td><?php echo $form->dropDownList($model4,'LANGUAGE_ID',CHtml::listData($language,'LANGUAGE_ID','LANGUAGE_TITLE'), array('prompt'=>'Select Language')); ?></td>
		<td>  </td>
		<?php echo $form->error($model4,'LANGUAGE_ID'); ?>
	</tr>
	
	<tr>
		<td><?php echo $form->labelEx($model1,'Records in :'); ?></td>
		<td><?php echo $form->dropDownList($model1,'DURATION', array('0'=>'No Restriction','7'=>'Last 7 Days','15'=>'Last 15 Days','30'=>'Last 30 Days','60'=>'Last 60 Days','90'=>'Last 90 Days','120'=>'Last 120 Days','365'=>'Last 365 Days','500'=>'Last 500 Days')); ?> </td>
		<td> * </td>
    </tr>
	
	<tr>
	
	<?php
	foreach($result as $row)
	{?>

	<?php if($row['CRON_FREQUENCY']==""){ echo "6"; }else{ echo $row['CRON_FREQUENCY'];}}?>
    <td><?php echo $form->labelEx($model1,'Cron Frequency :'); ?></td>
    <td><?php echo $form->textField($model1,'CRON_FREQUENCY',array('size'=>20,'maxlength'=>50)); ?> </td>
		<?php echo $form->error($model1,'CRON_FREQUENCY'); ?>
	<td> * </td>
    </tr>
		
	<tr>
    <td><?php echo $form->labelEx($model1,'Ouput Records :'); ?></td>
    <td><?php echo $form->textField($model1,'MAX_RECORDS',array('size'=>20,'maxlength'=>50)); ?> </td>
		<?php echo $form->error($model1,'MAX_RECORDS'); ?>
	<td> * </td>
    </tr>
	
	
	<tr>  
		<td><?php echo $form->labelEx($model1,'Is Top Ten :'); ?></td>
		<td><?php echo $form->checkBox($model1,'IS_TOP_TEN',array('size'=>1,'maxlength'=>1)); ?></td>
		<td> * </td>
		    <?php echo $form->error($model1,'IS_TOP_TEN'); ?>
	</tr>
	
	<tr>  
		<td><?php echo $form->labelEx($model1,'Is Promotional :'); ?></td>
		<td><?php echo $form->checkBox($model1,'IS_PROMOTIONAL',array('size'=>1,'maxlength'=>1)); ?></td>
		<td> * </td>
		    <?php echo $form->error($model1,'IS_PROMOTIONAL'); ?>
	</tr>
	
	<tr><td colspan=3>&nbsp;</td><tr>
	
	<tr>
    <td><?php echo $form->labelEx($model1,'Selected Records :'); ?></td>
    <td><?php echo $form->textField($model1,'MANUAL_RECORDS',array('size'=>80,'maxlength'=>80));?></td>
		<?php echo $form->error($model1,'MANUAL_RECORDS'); ?>
	<td><?php $this->widget('ext.popup.JPopupWindow', array(
        'tagName'=>'button',
        'content'=>'Search',
		'url'=>array('tblContainerMaster/searchquerypopup'),        
        'options'=>array(
            'height'=>500,
            'width'=>800,
            'centerScreen'=>1,
        ),
    ));
?> </td>
    </tr>
	
	
    <tr>
	<td>&nbsp;</td>
    <td colspan=2>
		<?php echo CHtml::submitButton($model1->isNewRecord ? 'Publish Query' : 'Publish Query'); ?>
		&nbsp;&nbsp;&nbsp;
        <?php echo CHtml::submitButton($model1->isNewRecord ? 'Reset' : 'Reset'); ?>
	</td>
	</tr>
<?php $this->endWidget(); ?>

</div><!-- form -->