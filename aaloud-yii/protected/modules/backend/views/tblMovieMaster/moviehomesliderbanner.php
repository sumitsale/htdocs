<div class="form">  
<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'user-form', 	
'enableAjaxValidation'=>false,
'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	 )); ?>
 	 	<?php echo $form->errorSummary($model2); ?>
<table>

	<table>
				<tr>
					<td colspan="3"><h1>Add new image banner</h1></td>
				</tr>
	
	
	
				<tr>  		
					<td><?php echo $form->labelEx($model2,'Movie Content ID :'); ?></td>
					<td><?php echo $form->textField($model2,'movie_id',array('size'=>30,'maxlength'=>100)); ?></td>
						<?php echo $form->error($model2,'movie_id'); ?>
				</tr>
	
				<tr>  		
					<td><?php echo $form->labelEx($model2,'Movie Content ID :'); ?></td>
					<td><?php echo $form->textField($model2,'movie_id',array('size'=>30,'maxlength'=>100)); ?></td>
						<?php echo $form->error($model2,'movie_id'); ?>
				</tr>
				
				<tr>  		
					<td><?php echo $form->labelEx($model2,'Movie Content ID :'); ?></td>
					<td><?php echo $form->textField($model2,'movie_id',array('size'=>30,'maxlength'=>100)); ?></td>
						<?php echo $form->error($model2,'movie_id'); ?>
				</tr>
				
				<tr>  		
					<td><?php echo $form->labelEx($model2,'Movie Content ID :'); ?></td>
					<td><?php echo $form->textField($model2,'movie_id',array('size'=>30,'maxlength'=>100)); ?></td>
						<?php echo $form->error($model2,'movie_id'); ?>
				</tr>
				
				<tr>  		
					<td><?php echo $form->labelEx($model2,'Movie Content ID :'); ?></td>
					<td><?php echo $form->textField($model2,'movie_id',array('size'=>30,'maxlength'=>100)); ?></td>
						<?php echo $form->error($model2,'movie_id'); ?>
				</tr>
				
				
				
				<tr>
					<td>&nbsp;</td><td>&nbsp;</td>
					
				</tr> 
	
				<tr>
					<td><?php echo $form->labelEx($model2,'Single Image Banner :'); ?></td>
					<td> </td>
				</tr>
				
				<tr>  		
					<td><?php echo $form->labelEx($model2,'Banner URL:'); ?></td>
					<td><?php echo $form->textField($model2,'url',array('size'=>50,'maxlength'=>100)); ?></td>
						<?php echo $form->error($model2,'url'); ?>
				</tr>
				
				<tr>
					<td><?php echo $form->labelEx($model2,'Current URL :'); ?></td>
					<td> </td>
				</tr>
				
	
				<tr>
	
					<td><?php echo $form->labelEx($model2,'Banner Image :'); ?></td>
					<td><?php echo $form->fileField($model2,'image_path',array('size'=>30,'maxlength'=>100)); ?></td>
						<?php echo $form->error($model2,'image_path'); ?>
	
				</tr>
	
	
				<tr>
					<td><?php echo $form->labelEx($model2,'Current Image :'); ?></td>
					<td> </td>
				</tr>
	

				<tr>
					<td>  </td> 		
					<td>  <?php echo CHtml::submitButton($model2->isNewRecord ? '          Save          ' : 'save'); ?> </td>
		
	            </tr>
		

		
		
	</table>
				

				<tr>
                    <td align="left"><?php echo CHtml::link('Create SD XML ', CController::createUrl('tblmoviemaster/moviehomesliderbanner'), array('class'=>'report')); ?> </td>
                </tr>


</table>

	  <?php $this->endWidget(); ?>
 </div><!-- form -->