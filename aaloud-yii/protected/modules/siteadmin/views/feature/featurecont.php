<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'feature-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<table width="100%">
	
	<tr>
			<td>Select Content Type</td>
			<td>
			<?php echo CHtml::dropDownList('User[contenttype]', '', array('1'=>'Full Songs','999'=>'Ringtones','3'=>'Wallpapers'),array('prompt'=>'--Select--')); ?>
			</td>
			<td> <?php echo CHtml::button('Go ', array('submit' => array('Feature/searchcont'))); ?></td>
	</tr>
	
	
	</table>
	
	
	<br>
	<br>
	<?php /*
	<table width="100%">
	
			<?php for($i=0;$i<count($sql);$i++)
			{
			?>
			<tr>
					<td class="vivpadlr">
					<input type="checkbox" name="artistid[]" value="<?php echo $sql[$i]['Artist_Id']; ?>"></td>
					
					<td><?php echo $sql[$i]['Artist_Name']; ?></td>
			<tr>
			
			<?php } ?>
	</table>
	*/ ?>

	
	<?php $this->endWidget(); ?>

</div><!-- form -->