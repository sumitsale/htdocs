<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'addnewkeyword-form',
	'enableAjaxValidation'=>true,
'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	

)); ?>







<!--<?php echo $form->errorSummary($model5); ?>-->

<table>
		<tr>
        <td><?php echo $form->labelEx($model5,'keyword'); ?></td>
        
        <td><?php echo $form->textField($model5,'keyword',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model5,'keyword'); ?>
         </td>
        </tr>

		<tr>
        <td><?php echo $form->labelEx($model5,'url'); ?></td>
        
        <td><?php echo $form->textField($model5,'url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model5,'url'); ?>
         </td>
        </tr>
        
        <tr>
        <td><?php echo $form->labelEx($model5,'type'); ?></td>
        
        <td><?php echo $form->dropDownList($model5,'type',array('Track'=>'Track','Video'=>'Video','Albums'=>'Albums','Artist'=>'Artist','Wallpaper'=>'Wallpaper'),array('prompt'=>'--Select--')); ?>
		<?php echo $form->error($model5,'type'); ?>
         </td>
        </tr>
        
        <tr>
        <td><?php echo $form->labelEx($model5,'fontclass'); ?></td>
        
        <td><?php echo $form->dropDownList($model5,'fontclass',array('9'=>'Font Size 9','12'=>'Font Size 12','14'=>'Font Size 14','16'=>'Font Size 16','18'=>'Font Size 18','20'=>'Font Size 20'),array('prompt'=>'--Select--')); ?>
		<?php echo $form->error($model5,'fontclass'); ?>
         </td>
        </tr>

<tr>
 		<td align="center">   <?php echo CHtml::submitButton($model->isNewRecord ? 'create' : 'save'); ?>    </td>

</tr>

</table>

<?php $this->endWidget(); ?>

<?php /*
<table border="0" width="100%">
<tr>
			<td>Keyword </td>

			<td> <?php echo CHtml::textField('User[keyword]', '', array('size'=>25,'maxlength'=>50)); ?>     </td>
			<td> <?php echo $form->error($model,'keyword'); ?></td>
</tr>

<tr>
         <td>  URL</td>
         <td> <?php echo CHtml::textField('User[url]', '', array('size'=>25,'maxlength'=>50)); ?> </td>

</tr

><tr>

			<td>   type  </td>
			<td>  <?php echo CHtml::dropDownList('User[seltype]', '', array('Track'=>'Track','Video'=>'Video','Albums'=>'Albums','Artist'=>'Artist','Wallpaper'=>'Wallpaper'),array('prompt'=>'--Select--')); ?> </td>

</tr>


<tr>
			<td>  FONT class </td>
			
			<td>   <?php echo CHtml::dropDownList('User[fonttype]', '', array('9'=>'Font Size 9','12'=>'Font Size 12','14'=>'Font Size 14','16'=>'Font Size 16','18'=>'Font Size 18','20'=>'Font Size 20'),array('prompt'=>'--select--')); ?> </td>

</tr>
<tr>
 		<td align="center">   <?php echo CHtml::button('submit', array('submit' => array('tBLSTOREFRONT/storefile'))); ?>     </td>

</tr>
</table>

 */?>


