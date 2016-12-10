<div class="form">  
<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'user-form', 	
'enableAjaxValidation'=>false,
'htmlOptions'=>array('enctype'=>'multipart/form-data'),	
	 )); ?>
 	 	
<table>

	<tr>  		
	<td> * Please enter valid URL's on separate lines.
	<?php echo CHtml::textarea('Purge', '', array('size'=>100,'rows'=>5,'cols'=>20,'maxlength'=>50)); ?>     </td>	
	</tr>
	
	<tr>
		<td colspan="3"> 
		 <?php echo CHtml::button('Purge', array('submit' => array('TBLANSWERS/purge'))); ?>
		
	
		</td>
	</tr>

	
</table>
	  <?php $this->endWidget(); ?>
 </div><!-- form -->