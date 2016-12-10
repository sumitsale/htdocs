<div class="form">  
<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'user-form', 	
'enableAjaxValidation'=>false,
'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	 )); ?>
 	 	<?php echo $form->errorSummary($model1); ?>
<table>

	<table>
				<tr>
					<td colspan="3"><b>Add new image banner</b></td>
				</tr>
	
	
	
				<tr>  		
					<td><?php echo $form->labelEx($model1,'Movie Content ID :'); ?></td>
					<td><?php echo $form->textField($model1,'movie_id',array('size'=>30,'maxlength'=>100)); ?></td>
						<?php echo $form->error($model1,'movie_id'); ?>
				</tr>
	
	
				<tr>
					<td>&nbsp;</td><td>&nbsp;</td>
					
				</tr> 
	
				<tr>
					<td><?php echo $form->labelEx($model1,'Single Image Banner: :'); ?></td>
					<td> </td>
				</tr>
	
				<tr>
	
					<td><?php echo $form->labelEx($model1,'Banner Image :'); ?></td>
					<td><?php echo $form->fileField($model1,'image_path',array('size'=>30,'maxlength'=>100)); ?></td>
						<?php echo $form->error($model1,'image_path'); ?>
	
				</tr>
	
	
				<tr>
					<td><?php echo $form->labelEx($model1,'Current Image :'); ?></td>
					<td> </td>
				</tr>
	

				<tr>
					<td>  </td> 		
					<td>  <?php echo CHtml::submitButton($model1->isNewRecord ? '          Save          ' : 'save'); ?> </td>
		
	            </tr>
		

		
		
	</table>
				

				<tr>
                    <td align="left"><?php echo CHtml::link('Create HD XML ', CController::createUrl('tblmoviemaster/moviehdbanner'), array('class'=>'report')); ?> </td>
                </tr>


</table>

	  <?php $this->endWidget(); ?>
 </div><!-- form -->