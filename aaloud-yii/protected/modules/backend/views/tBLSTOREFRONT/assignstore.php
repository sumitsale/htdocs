<?php
/* code for displaying success msg after login */
    Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
       CClientScript::POS_READY
    );
?>
 
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; 
/* Code for Success msg ends here */
?>





<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tblstorefront-form',
	'enableAjaxValidation'=>false,
)); ?>

<table width="100%" border="0">
<tr>
 			<td colspan="3">
				Assign Store
			</td>
</tr>
<?php foreach($sql as $row)
			{ $name=$row['STORE_FRONT_NAME'];
			 ?>
<tr>
			<td>           store name             </td>
			<td> <?php echo $row['STORE_FRONT_NAME']; }?></td>


</tr>

<tr>
			<td>country</td>
			
			<td>    <?php echo $form->dropDownList($model1,'COUNTRY_NAME',CHtml::listData($country,'COUNTRY_ID','COUNTRY_NAME'), array('prompt'=>'select country')); ?>              </td>
</tr>
<tr>
			

</tr>



<tr colspan="3">
<td></td>
			<td>	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update store'); ?></td>

</tr>

<tr>
		<td colspan="3" align="center">Assign store           </td>

</tr>
<tr>
    <td>    store name              </td>
    
    <td>     country                </td>

     <td>     Delete                </td>
</tr>

<?php foreach($result1 as $row) 
{
	?>
	
	
	<tr>
	
	 			<td>    <?php echo $name; ?>   </td>	
	 						<?php /* 
							<input type="hidden" name="country_id" value="<?php echo $row['COUNTRY_ID']; ?>">*/
							?>
	 			<td>          <?php echo $row['COUNTRY_NAME'];?>               </td> 
	 			
	 			<td><?php echo CHtml::link('Delete', CController::createUrl("TBLSTOREFRONT/delassignstore?id=".$row['COUNTRY_ID']), array('class'=>'report')); }?></td>
	
	
	</tr>

</table>


<?php $this->endWidget(); ?>
