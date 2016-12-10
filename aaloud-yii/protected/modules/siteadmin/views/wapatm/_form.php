<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-wap-atm-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<table>
	
	
	<tr>
		<td><?php echo $form->labelEx($model,'ATM_TITLE'); ?></td>
		<td><?php echo $form->textField($model,'ATM_TITLE',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ATM_TITLE'); ?>
		</td>
	</tr>

	<tr>
		<td><?php echo $form->labelEx($model,'ATM_URL'); ?></td>
		<td><?php echo $form->textField($model,'ATM_URL',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'ATM_URL'); ?>
		</td>
	</tr>
	
	
	<tr>
		<td><?php echo $form->labelEx($model,'ATM_DESC'); ?></td>
		<td><?php echo $form->textField($model,'ATM_DESC',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'ATM_DESC'); ?>
		</td>
	</tr>


	<tr>
	<td><?php echo $form->labelEx($model,'Date '); ?></td>
	<td><?php echo $form->dropDownList($model,'ATM_MONTH', array('01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06',
	'07'=>'07','08'=>'08','9'=>'09','10'=>'10','11'=>'11','12'=>'12'),array('prompt'=>'Select Month')); ?>
	<?php echo $form->dropDownList($model,'ATM_YEAR', array('2010'=>'2010','2011'=>'2011','2012'=>'2012'),array('prompt'=>'Select Year')); ?>
	</td>
	</tr>
	
	<tr>
	<td colspan=2>&nbsp;</td>
	</tr>
	

	<tr align="center">
	<td> </td>
	<td>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add Wap Atm' : 'Save'); ?>
		&nbsp;
		<?php echo CHtml::resetButton(' Clear ', array('id'=>'form-reset-button')); ?>
	</td>
	</tr>
		</td>
	</div>
</table>

&nbsp;&nbsp;

<div>
	
 <table width="100%">
					<tbody>
					<tr>
						<th align="left"><h3>Title</h3></th>
						<th align="center"><h3>URL</h3></th>
						<th align="center"><h3>Description</h3></th>
						<th align="center"><h3>Date</h3></th>
						<th align="center"><h3>Delete</h3></th>
					</tr>

												
							
					<?php 
				foreach($result as $row)
						{ 		
					?>
				
				<tr>
				    <td align='center'><?php echo $row['ATM_TITLE']; ?></td>
					<td align='left'><?php echo $row['ATM_URL']; ?></td>     
					<td align='center'><?php echo $row['ATM_DESC']; ?></td>
					<td align='center'><?php echo $row['ATM_MONTH']."/".$row['ATM_YEAR']; ?> </td>
					<td align="center">					
					<?php echo Chtml::link('Delete','', array('submit'=>array('wapatm/del'), 'params'=>array('id'=>$row['ATM_ID']), 'style'=>'cursor: pointer; text-decoration: none;',)); ?>
					</td> 	
				</tr>
				
                <?php  
				   
				}
				
				?>
					</tbody>
 </table>
</div>   

<?php $this->endWidget(); ?>

</div><!-- form -->
