<div class="form">  
<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'user-form', 	
'enableAjaxValidation'=>false,
'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	 )); ?>
 	 	<?php echo $form->errorSummary($model); ?>
<table>
	<tr>
		<td colspan="3"><b>ADD CATEGORY</b></td>
	</tr>
	<tr>
		<td colspan="3">
	<p class="note"><b><span class="required">*</span> indicates all compulsary fields.</b></p>		</td>
	</tr> 
	<tr><td>&nbsp;</td><td>&nbsp;</td>
		<td>  </td>
	</tr> 

	<tr>  		
		<td><?php echo $form->labelEx($model1,'Category Name :'); ?></td>
		<td><?php echo $form->textField($model1,'CATEGORY',array('size'=>30,'maxlength'=>100)); ?>			<?php echo $form->error($model1,'CATEGORY'); ?>		</td>
		<td> * </td>
	</tr>
	
	<tr>
		<td><?php echo $form->labelEx($model,'Content Type :'); ?></td>		<td><?php echo $form->dropDownList($model,'CONTENT_TYPE_ID',CHtml::listData($content,'ALBUM_TYPE_ID','ALBUM_TYPE_NAME'), array('prompt'=>'Select Content Type')); ?>		<?php echo $form->error($model,'ALBUM_TYPE_ID'); ?>		</td>
		<td> * </td>
	</tr>
	
	<tr>
		<td><?php echo $form->labelEx($model,'Theme Image'); ?></td>
		<td><?php echo $form->fileField($model,'THEME_IMAGE',array('size'=>30,'maxlength'=>100)); ?>		<?php echo $form->error($model,'THEME_IMAGE'); ?>		</td>
		<td> * </td>
	</tr>
	
	<tr>
		<td><?php echo $form->labelEx($model,'Select Language :'); ?></td>			
        <td><?php 				echo $form->ListBox($model,'CATEGORY_LANGUAGE_ID',CHtml::listData($language,'LANGUAGE_ID','LANGUAGE_TITLE'),array('multiple' => 'multiple'));?>		<?php echo $form->error($model,'LANGUAGE_ID'); ?>		</td>
        <td> * </td>
    </tr>
	<tr>  		
		<td><?php echo $form->labelEx($model,'Priority :'); ?></td>
		<td><?php echo $form->textField($model,'PRIORITY',array('size'=>30,'maxlength'=>100)); ?>		<?php echo $form->error($model,'PRIORITY'); ?>		</td>
		<td> * </td>	    
	</tr>
	<tr>  
		<td><?php echo $form->labelEx($model,'Is Latest :'); ?></td>
		<td><?php echo $form->checkBox($model,'ISNEW',array('size'=>1,'maxlength'=>1)); ?>		<?php echo $form->error($model,'ISNEW'); ?>		</td>
		<td> * </td>
	</tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model,'Tracks Catelog  ids :'); ?></td>
		<td><?php echo $form->textarea($model,'TRACK_CATELOG_ID',array('size'=>100,'maxlength'=>100)); ?>
		Catelog Id's must be comma separated		<?php echo $form->error($model,'TRACK_CATELOG_ID'); ?>		</td>
		<td>  </td>
    </tr>
	
	<tr>  		
		<td><?php echo $form->labelEx($model,'Album Catelog  ids :'); ?></td>
		<td><?php echo $form->textarea($model,'ALBUM_CATELOG_ID',array('size'=>100,'maxlength'=>100)); ?>
		Catelog  Id's must be comma separated		<?php echo $form->error($model,'ALBUM_CATELOG_ID'); ?>		</td>
		<td>  </td>
    </tr>

	<tr>  		
		<td><?php echo $form->labelEx($model,'Artist Content ids :'); ?></td>
		<td><?php echo $form->textarea($model,'ARTIST_CATELOG_ID',array('size'=>100,'maxlength'=>100)); ?>
		Content Id's must be comma separated		<?php echo $form->error($model,'ARTIST_CATELOG_ID'); ?>		</td>
		<td>  </td>
    </tr>
    <tr>	<td colspan=3>&nbsp;</td>
	</tr> 

    <tr>
		<td colspan="3"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    		
		<?php echo CHtml::submitButton($model1->isNewRecord ? '          Add Category          ' : 'Proceed'); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <?php echo CHtml::resetButton('          Reset          ', array('id'=>'form-reset-button')); ?>		
		</td>
	</tr>	
</table>
	  <?php $this->endWidget(); ?>
 </div><!-- form -->