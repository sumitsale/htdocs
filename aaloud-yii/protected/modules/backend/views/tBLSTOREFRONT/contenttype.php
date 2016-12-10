
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tblalbumtype-form',
	'enableAjaxValidation'=>false,
)); ?>


<table border="0" width="100%">

<tr colspan="3">
			<td> EDIT STORE CONTENT TYPES</td>
</tr>

<tr colspan="3">
         <td>* indicates all compulsary fields</td>
</tr>

<tr colspan="3">
         <td>    Note : Only fill in the content prices for valid content types for the store, at least one content type pricing needs to be entered</td>
</tr>

<tr>
			<table>
					<tr>
					         <td>&nbsp;</td>
							
					         <td>Content Type</td>		
					</tr>
					<?php  $i = 0;
					//print_r($result1);
					foreach($result as $row1)
					{ 
					
						$result1=Yii::app()->db->createCommand()
						->select('*')
						->from('tbl_store_front_content_pricing')
						->where('STORE_FRONT_ID=:id AND CONTENT_TYPE_ID=:id1', array(':id'=>1,':id1'=>$row1['ALBUM_TYPE_ID']))
						->queryRow();
						//print_r($result1);
						$size = count($result1);
					?>
					<tr>
					
								<td><?php 
								if(isset($size) && $size>1)
								{
								 echo CHtml::activeCheckBox($tblalbumtype,"[$i]ALBUM_TYPE_ID",array('checked'=>true,'value'=>$row1['ALBUM_TYPE_ID'],'uncheckValue' => null,));
								}
								else
								{
								 echo CHtml::activeCheckBox($tblalbumtype,"[$i]ALBUM_TYPE_ID",array('checked'=>false,'value'=>$row1['ALBUM_TYPE_ID'],'uncheckValue' => null,));
								}
								
								?></td>
							
								
								<td><?php echo $form->textField($tblalbumtype,'ALBUM_TYPE_NAME',array('size'=>50,'maxlength'=>50,'value'=>$row1['ALBUM_TYPE_NAME']));
								$i+=1;
								}?>
								
								</td>
	                      		
					</tr>
			</table>
</tr>
<tr colspan="3">
<td>&nbsp;</td>
</tr>



<tr>
			<td>
			               <?php echo CHtml::submitButton('Submit'); ?>
			</td>
			
			<td>
                  <?php echo CHtml::resetButton('Reset', array('id'=>'form-reset-button')); ?>					
			</td>
</tr>
</table>


<?php $this->endWidget(); ?>

</div><!-- form -->